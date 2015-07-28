<?php

class PackageController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'user';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }
    
    public function init() {
        BaseClass::isLoggedIn();
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'payment','domainsearch', 'availabledomain', 'checkout', 'domainadd', 'productcart', 'couponapply', 'loaddomain', 'orderadd', 'thankyou', 'walletthankyou','walletcalculation', 'walletcalc','profilecouponapply','testscript','removecoupon','checkmasterpin'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /*
     * Coupon Code Apply
     * Verify coupon code is valid or not
     */

    function actionCouponApply() {
        $response = '';
        $percentage = 10;
        $couponObject = Coupon::model()->findByAttributes(array('coupon_code'=>$_REQUEST['coupon_code']));
        $packageObject = Package::model()->findByPK(Yii::app()->session['package_id']);
        $couponCodeObject = UserHasCoupon::model()->findByAttributes(array('coupon_id' =>$couponObject->id ,'user_id'=> Yii::app()->session['userid'],'status'=>1));
        if ($couponObject->coupon_code == $_REQUEST['coupon_code'] && count($couponCodeObject)==0) {
            Yii::app()->session['coupon_code'] = $_REQUEST['coupon_code'];

            $packageamount = $packageObject->amount;
            $discountedAmount = $packageObject->amount * $couponObject->amount / 100 + Yii::app()->session['amount'];
            $discountAmountfinal = $packageamount - $discountedAmount;
            $response .= $discountAmountfinal . "_" . $discountedAmount;
        } else {
            $response .= 0;
        }
        echo $response;
    }
   
    
     /*
     * Coupon Code Apply
     * Verify coupon code is valid or not
     */

    function actionProfileCouponApply() {
        $response = '';
        $percentage = 10;
        $couponObject = Coupon::model()->findByAttributes(array('coupon_code'=>$_REQUEST['coupon_code']));
        $packageObject = Package::model()->findByPK($_REQUEST['package_id']);
        $couponCodeObject = UserHasCoupon::model()->findByAttributes(array('coupon_id' =>$couponObject->id ,'user_id'=> Yii::app()->session['userid'],'status'=>1));
         
        if ($couponObject->coupon_code == $_REQUEST['coupon_code'] && count($couponCodeObject)==0) {
            Yii::app()->session['coupon_code'] = $_REQUEST['coupon_code'];

            $packageamount = $packageObject->amount;
            $discountedAmount = $packageObject->amount * $couponObject->amount / 100 + $_REQUEST['domain_price'];
            $discountAmountfinal = $packageamount - $discountedAmount;
            $response .= $discountAmountfinal . "_" . $discountedAmount;
        } else {
            $response .= 0;
        } 
        echo $response;
    }

    /*
     * payement proceed
     * Add order details to database
     */

    function actionOrderAdd() {

        $createdDate = date("Y-m-d");
        $tarnsactionId = BaseClass::gettransactionID();
        if(!empty($_POST) && $_POST['transactionId']){
           $tarnsactionId = $_POST['transactionId'];
        }
        $transactionObject = Transaction::model()->find(array('condition' => 'user_id =' . Yii::app()->session['userid'] . ' AND transaction_id = ' . $tarnsactionId));

        $total = $_POST['totalAmount'] - $_POST['couponDiscount'];
        
        $transactionArray['paidAmount'] = $total;
        $transactionArray['userId'] = Yii::app()->session['userid'];
        $transactionArray['mode'] = 'paypal';
        $transactionArray['actualAmount'] = $_POST['totalAmount'];
        $transactionArray['couponDiscount'] = $_POST['couponDiscount'];
        $transactionArray['couponId'] = Yii::app()->session['coupon_code'];
        $transactionArray['transactionId'] = $tarnsactionId;
 
        if (count($transactionObject) > 0) {
            
            Transaction::model()->createTransactionPackage($transactionObject,$transactionArray);
        } else {
            
            $transactionObject = new Transaction;
            Transaction::model()->createTransactionPackage($transactionObject,$transactionArray);
        }
         
         /*code to create coupon code*/
        if(!empty(Yii::app()->session['coupon_code'])){
        $couponObject = Coupon::model()->findByAttributes(array('coupon_code'=>Yii::app()->session['coupon_code']));
        $couponCodeObject = UserHasCoupon::model()->findByAttributes(array('coupon_id' =>$couponObject->id ,'user_id'=> Yii::app()->session['userid']));
        if(count($couponCodeObject)==0)
        {
            /* code to fetch coupon ID*/
            $couponCodeObject = new UserHasCoupon;
            $couponCodeObject->coupon_id = $couponObject->id;
            $couponCodeObject->user_id = Yii::app()->session['userid'];
            $couponCodeObject->status=0;
            $couponCodeObject->created_at=date('Y-m-d');
            $couponCodeObject->save(false);
        }
    }
        //$transactionObject->used_rp = 0;
        $orderObject = Order::model()->find(array('condition' => 'user_id =' . Yii::app()->session['userid'] . ' AND transaction_id= ' . $transactionObject->id));

        $orderArray['transaction_id'] = $transactionObject->id;
        $orderArray['user_id'] = Yii::app()->session['userid'];
        if(!empty($_REQUEST['package_id']))
        {  
            $orderArray['domain_price'] = $_REQUEST['domain_price'];
            $orderArray['domain'] = $_REQUEST['domain'];
            $orderArray['package_id'] = $_REQUEST['package_id'];
            $orderArray['templateId'] = "";
            
        }else{
             
            $orderArray['domain_price'] = Yii::app()->session['amount'];
            $orderArray['domain'] = Yii::app()->session['domain'];
            $orderArray['package_id'] = Yii::app()->session['package_id'];
            $orderArray['templateId'] = $_POST['templateId'];
        }
        
        
        if (count($orderObject) > 0) {
            Order::model()->addEdit($orderObject,$orderArray);
        } else {
            $orderObject = new Order;
            Order::model()->addEdit($orderObject,$orderArray);
        }
        echo "1-" . $tarnsactionId;
    }

    public function actionDomainAdd() {

        Yii::app()->session['domain'] = $_REQUEST['domain'];
        if ($_REQUEST['amount'] >= 10) {
            Yii::app()->session['amount'] = $_REQUEST['amount'] - 10;
        } else {

            Yii::app()->session['amount'] = "";
        }
        echo Yii::app()->session['domain'] . '_' . Yii::app()->session['amount'];
    }

    /**
     * Display search domain page 
     */
    public function actionDomainSearch() {
        
        $error = "";    
        if (!empty($_GET) && $_GET['package_id']!='') {
           Yii::app()->session['package_id'] = $_GET['package_id'];
        }

         

        $packageObject = Package::model()->findByPK(Yii::app()->session['package_id']);

        $rightbar = '<div id="dca_cart" class="cart-wrapper">
            <div class="cart-header"><span class="ico-cart"></span>My Shopping Cart</div>
            <ul id="domainList" class="cartList cart-list">';
        if (Yii::app()->session['package_id'] == '') {
            $rightbar .= '<li class="empty">Your cart is empty :(</li>';
        } else {
            $rightbar .= '<li class="cart-item">
            
            <span class="domaintxt">';
            
            $rightbar .= $packageObject["name"];
            /* if($add)
              {
              $rightbar .= '</span><br> Domain : ';
              } */
            //$rightbar .= $_REQUEST['domain'];    
            $rightbar .='<div id="domainTaken">';
            
            if (Yii::app()->session['domain'] != '') {
                $rightbar .= Yii::app()->session['domain'];
                $domainNameToDelete = "'".Yii::app()->session['domain']."'";
                $rightbar .= '<div class="closeImg" id="closeImg"> <a onclick="deleteData();" href="#"> <i class="fa fa-times"></i></a></div>';
            }
            
            $rightbar .='</div>
              

            </li>';
        }

        $rightbar .='</ul>
             </form>';

        $rightbar .='<div class="amountWrapper">
            Package Amount:<br>
            <div class="cart-total">
            <span id="total_curr">
            <span id="total"><span class="WebRupee"></span>$<span id="tottal_amt">';
        $rightbar .= number_format($packageObject->amount, 2);
        $rightbar .='</span>
             </div>
             </div>';

        if (Yii::app()->session['amount'] != '') {
            $rightbar .='<div class="amountWrapper">
            Domain Amount:<br>
            <div class="cart-total">
            <span id="total_curr">
            <span id="total"><span class="WebRupee"></span>$<span id="tottal">';
            $rightbar .= number_format(Yii::app()->session['amount'], 2);

            $rightbar .='</span></span>&nbsp;
            </span><br>
            <span class="discounted_price">
            <span id="discounted-total" class="hide"><span class="WebRupee">Rs.</span> 0</span>
            </span>
            </div>
            </div>';
        }
        $rightbar .='<div class="cart-btn-wrapper">
            <button id="checkout" class="btn-flat-green btn-orange" onclick="RedirectCart();">Checkout</button>
            </div>
            </div>';
       
        $SuggestedDomain = "";
        //unset(Yii::app()->session['domain']);
        $userEnteredDomain = "";
        if(!empty(Yii::app()->session['domain']))
        {
        $userEnteredDomain = Yii::app()->session['domain'];
        } 
        if ($userEnteredDomain != '') {
            $doaminArr = explode('.', $userEnteredDomain);
            $domainTakenArray = DomainTemp::model()->findAll(array("condition" => "name LIKE '" . $doaminArr[0] . "%'"));
            $AllDomainArray = array('com', 'net', 'co.in', 'co.uk', 'org');
            $UserDomainPart = explode('.', $userEnteredDomain);


            // $pos = array_search($UserDomainPart[1], $AllDomainArray);
            //unset($AllDomainArray[$pos]);
            //$SuggestedDomain = "<div>Oops!Domain you entered not available.Please choose some other.</div><br/>";

            foreach ($domainTakenArray as $alldomain) {

                foreach ($AllDomainArray as $allext) {
                    $domainName = "'" . $alldomain->name . "." . $allext . "'";
                    $domainNameF = "'" . $alldomain->name . "." . $allext . "'";

                    $SuggestedDomain .= '<div class="searchWrap" id="searchWrapDiv"><div class="row"><div class="col-sm-7 col-xs-7"><div class="domainName"><p>' . $alldomain->name . "." . $allext . '</p>
                                    <div class="txtComent">Get a free DIY for 6 months.<br>Use Coupon: VISA10</div></div></div>
                                    <div class="col-sm-2 col-xs-2">
                                    <p class="priceDomain"> <span>$</span>' . $alldomain->price . '</p></div>
                                    <input type="hidden" name="domain" id="domain" value="' . $alldomain->name . "." . $allext . '">
                                    <input type="hidden" name="amount" id="amount" value="">';

                    if (in_array($domainNameF, $domainTakenArray)) {

                        $SuggestedDomain .= '<div class="col-sm-2 col-xs-2"><span class="btn btn-success">N/A</span></div></div></div>';
                    } else {


                        $SuggestedDomain .= '<div class="col-sm-2 col-xs-2"><button class="btn btn-success" id="test"  onclick="DomainAdd(' . $domainName . ');"  type="button">Add</button>
                    </div></div></div>';
                    }
                }
            }
        }
        

        $this->render('domainsearch', array(
            'rightbar' => $rightbar,
            'suggestedDomain' => $SuggestedDomain,'error'=>$error
        ));
        
    }
    
    /*
     * function to get make payment
     */
    
    public function actionPayment()
    {
        
        $loggedInUserId = Yii::app()->session['userid'];
        $package_id = Yii::app()->session['package_id'];
        $packageObject = Package::model()->findByPK($package_id);
        $walletObject = Wallet::model()->findAll(array('condition' => 'user_id=' . $loggedInUserId . ' AND fund >= "10"'));
         $this->render('payment', array(
            'walletObject' => $walletObject,'packageObject' => $packageObject
           ));
            
        //));
    }

    /**
     * Display search domain page 
     * Search Domain wether it is available or not
     */
    public function actionAvailableDomain() {
        Yii::app()->session['package_id'] = $_REQUEST['package_id'];
        $userEnteredDomain = $_REQUEST['domain'];
        //$domainTakenArray = array('nidhisati.com', 'ram.net', 'sumeet.com', 'suryaasati.com');
        $domainTakenArray = DomainTemp::model()->findAll(array("condition" => "name LIKE '" . $userEnteredDomain . "%'"));
        $AllDomainArray = array('com', 'net', 'co.in', 'co.uk', 'org');
        $UserDomainPart = explode('.', $userEnteredDomain);
        //if (in_array($userEnteredDomain, $domainTakenArray)) {
        /* $pos = array_search($UserDomainPart[1], $AllDomainArray);
          unset($AllDomainArray[$pos]);
          $SuggestedDomain = "<div>Oops!Domain you entered not available.Please choose some other.</div><br/>";
          $SuggestedDomain = '<div class="secondary-result">
          <div class="secondaryDomain resultDomain-wrapper">
          <div class="domain-wrapper ">
          <div class="domainName">' . $UserDomainPart[0] . '.com</div>
          <div class="website-promo orange">Get a free DIY for 6 months.<br>Use Coupon: VISA10</div>
          </div>
          <span class="pricing-wrp">
          <s class="slashprice"><span class="WebRupee">$.</span> 819</s>
          </span>
          <span class="select-domain btn-flat-green">N/A</span>
          </div>
          </div>'; */
        $SuggestedDomain = "";
        foreach ($domainTakenArray as $alldomain) {
            foreach ($AllDomainArray as $allext) {
                $domainName = "'" . $alldomain->name . "." . $allext . "'";

                $SuggestedDomain .= '<div class="searchWrap"><div class="row"><div class="col-sm-7 col-xs-7"><div class="domainName"><p>' . $alldomain->name . "." . $allext . '</p>
                                    <div class="txtComent">Get a free DIY for 6 months.<br>Use Coupon: VISA10</div></div></div>
                                    <div class="col-sm-2 col-xs-2">
                                    <p class="priceDomain"> <span>$</span>' . $alldomain->price . '</p></div>
                                    <input type="hidden" name="domain" id="domain" value="' . $alldomain->name . "." . $allext . '">
                                    <input type="hidden" name="amount" id="amount" value="">
                                    
<div class="col-sm-2 col-xs-2"><button class="btn btn-success"  id="test"  onclick="DomainAdd(' . $domainName . ');"  type="button">Add</button></div>
                              </div>
                        </div>';
            }
        }

        //$SuggestedDomain .= "<a href='".Yii::app()->baseUrl."checkout?domain_id=1'>" . $UserDomainPart[0] . "." . $alldomain . "</a><br/>";
        //} else {

        /* $domainNameF = "'" . $UserDomainPart[0] . ".com'";
          $SuggestedDomain = '<div class="secondary-result cart2">
          <div class="secondaryDomain resultDomain-wrapper">
          <div class="domain-wrapper cart2">
          <p class="domainName">' . $UserDomainPart[0] . '.com</p>
          <div class="website-promo orange">Get a free DIY for 6 months.<br>Use Coupon: WEBSITE199</div>
          </div>
          <span class="pricing-wrp">
          <strong><span class="WebRupee">Rs.</span> 199</strong>/YR<br>
          <div class="slashprice cart1"><span class="WebRupee">Rs.</span> 819</div>
          </span>
          <input type="hidden" name="domain" id="domain1" value="' . $UserDomainPart[0] . '.com">
          <input type="hidden" name="amount" id="amount" value="15">
          <button class="add-to-cart select-domain btn-flat-green" onclick="DomainAdd(' . $domainNameF . ');"  type="button">Add</button>

          </div>
          </div> '; */
        foreach ($AllDomainArray as $alldomain) {
            //$SuggestedDomain .= "<a href='".Yii::app()->baseUrl."checkout?domain_id=1'>" . $UserDomainPart[0] . "." . $alldomain . "</a><br/>";
        }
        //}
        echo $SuggestedDomain;
    }

    public function actionCheckOut() {
        Yii::app()->session['domain_id'] = $_GET['domain_id'];
        $packageObject = Package::model()->findByPK(Yii::app()->session['package_id']);

        $this->render('checkout', array(
            'packageObject' => $packageObject,
        ));
    }

    public function actionProductCart() {
        $package_id = Yii::app()->session['package_id'];
        $packageObject = Package::model()->findByPK($package_id);
        $loggedInUserId = Yii::app()->session['userid'];
        $this->render('cart', array(
            'packageObject' => $packageObject
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Package;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Package'])) {
            $model->attributes = $_POST['Package'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Package'])) {
            $model->attributes = $_POST['Package'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Package');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Package('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Package']))
            $model->attributes = $_GET['Package'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Package the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Package::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Package $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'package-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /*
     * function to save payment user select
     */

    public function actionThankYou() {
        
             
        if (!(empty($_GET))) {
         if($_GET['payment_status']=='success')
            {
            $transactionId = $_GET['transaction_id'];
            $transactionObject = Transaction::model()->findByAttributes(array('transaction_id' => $transactionId));
            if(!empty($transactionObject)){
            //$userObject = User::model()->findByPK(Yii::app()->session['userid']);
                if ($transactionObject->status == 0) {
                    $transactionObject->status = 1;
                    $transactionObject->paid_amount = ($transactionObject->actual_amount) - ($transactionObject->used_rp);
                    $transactionObject->created_at = date('Y-m-d');
                    $transactionObject->update();
                    $orderObject = Order::model()->findByAttributes(array('transaction_id' => $transactionObject->id));
                    $orderObject->status = 1;
                    $orderObject->start_date = date('Y-m-d');
                    $orderObject->end_date = (date('Y') + 1) . date('-m-d');
                    $orderObject->update();



                    $MTObject = MoneyTransfer::model()->findAll(array('condition' => 'transaction_id=' . $transactionObject->id));
                    foreach($MTObject as $mObject){}
                    if(!empty($MTObject))
                    {
                        $mObject->status = 1;
                        $mObject->update();
                        $MTObject1 = Wallet::model()->findByAttributes(array('id' => $mObject->wallet_id));
                        $MTObject1->fund = $MTObject1->fund - $transactionObject->used_rp;    
                        $MTObject1->update();
                    }

                    ob_start();
                    $orderObject = Order::model()->findByAttributes(array('transaction_id' => $transactionObject->id));
                    $userObject = User::model()->findByPk(Yii::app()->session['userid']);

                    /*to get sponsor email*/
                    $packageObject = Package::model()->findByPK($orderObject->package_id);

                    /*code to update coupon*/
                    $couponObject = Coupon::model()->findByAttributes(array('coupon_code'=>$transactionObject->coupon_code));
                    if(!empty($couponObject)){
                    $couponCodeObject = UserHasCoupon::model()->findByAttributes(array('coupon_id' =>$couponObject->id ,'user_id'=> Yii::app()->session['userid']));

                    if(!empty($couponCodeObject)){
                        $couponCodeObject->status = 1;
                        $couponCodeObject->save(false);
                    }

                    }
                    /*code to update membership type*/
                    if($userObject->membership_type =='0'){
                        $userObject->membership_type = $packageObject->type;
                        $userObject->save(false);
                    }       
                    $sponsorUserObject = User::model()->findByAttributes(array('name' => $userObject->sponsor_id));

                     /*sponsor wallet*/
                    try {
                        //deduct from from user wallet
                        $sponsorWalletObject = Wallet::model()->findByAttributes(array('user_id' => $sponsorUserObject->id, 'type' => 3));

                        if($sponsorWalletObject){
                            $fromAmountpercent = $packageObject->amount*5/100;
                            $fromAmount = ($sponsorWalletObject->fund) + $fromAmountpercent;
                            $sponsorWalletObject->fund = $fromAmount;
                            $sponsorWalletObject->update();
                        } else {
                            $fromAmountpercent = $packageObject->amount*5/100;
                            $sponsorWalletObject = Wallet::model()->create($sponsorUserObject->id,$fromAmountpercent,'3');
                        }

                        /* For Binary Commision */
                        $genealogyObject = Genealogy::model()->findByAttributes(array('user_id' => Yii::app()->session['userid']));

                        if(!empty($genealogyObject)){                        
                          $genealogyObject->order_amount = $packageObject->amount;
                          $genealogyObject->order_date = date('Y-m-d');
                          $genealogyObject->save(false);  
                        }


                        /* code to deduct amount from admin commission wallet*/
                        $adminWalletObject = Wallet::model()->findByAttributes(array('user_id' => 1, 'type' => 3));
                        /*if($adminWalletObject)
                        {
                            $fromAmountpercent = $packageObject->amount*5/100;
                            $adminWalletObject->fund = ($adminWalletObject->fund) - $fromAmountpercent;
                            $adminWalletObject->update();
                        }
                        */

                        /* code to add sponsor transaction*/
                        $postDataArray['transactionId'] = BaseClass::gettransactionID();
                        $postDataArray['userId'] = $sponsorUserObject->id;
                        $postDataArray['mode'] = 'transfer';
                        $postDataArray['actualAmount'] = $packageObject->amount;
                        $postDataArray['paid_amount'] = $fromAmountpercent;
                        $userSposorObject = User::model()->findByPk($sponsorUserObject->id);
                        $transactionObjectSponsor = Transaction::model()->createTransaction($postDataArray, $userSposorObject,1);

                        /* code to add moneytransfer */

                        $createdTime = new CDbExpression('NOW()');
                        $moneyTransfertoObj = new MoneyTransfer;
                        $moneyTransfertoObj->from_user_id = 1;
                        $moneyTransfertoObj->to_user_id = $sponsorUserObject->id;
                        $moneyTransfertoObj->transaction_id = $transactionObjectSponsor->id;
                        $moneyTransfertoObj->fund_type = 2;//1:RP,2:Cash
                        $moneyTransfertoObj->fund = $fromAmountpercent;//1:RP,2:Cash
                        $moneyTransfertoObj->comment = "Direct Commision Transfered";
                        $moneyTransfertoObj->status = 1;
                        $moneyTransfertoObj->wallet_id = $adminWalletObject->id;
                        $moneyTransfertoObj->to_wallet_id = $sponsorWalletObject->id;
                        $moneyTransfertoObj->created_at = $createdTime;
                        $moneyTransfertoObj->updated_at = $createdTime;
                        if(!$moneyTransfertoObj->save()){
                            echo "<pre>";
                            print_r($moneyTransfertoObj->getErrors());
                        exit;
                        }
                    } catch (Exception $ex) {
                        $ex->getMessage();
                        exit;
                    }
                    
                    /* Create template code start here */
                    if($orderObject->templateId != 0){
                        $buildertempObject = BuildTemp::model()->findByAttributes(array('template_id' => $orderObject->templateId));
                        /* Copy Image folder to another location */
                        $path = Yii::getPathOfAlias('webroot');  
                        $userID = Yii::app()->session['userid'] ;
                        $tempID = $orderObject->templateId ;
                        /*Create Folder And Permission */
                        if(!file_exists($path."/builder_images/".$userID)){
                            !mkdir($path."/builder_images/".$userID.'/', 0777, true);
                        }
                        if(!file_exists($path."/builder_images/".$userID.'/'.$tempID)){
                            !mkdir($path."/builder_images/".$userID.'/'.$tempID, 0777, true);
                        }
                        BaseClass::recurse_copy($path."/user/template/".$buildertempObject->folderpath."/images/", $path.'/builder_images/'.$userID.'/'.$tempID);

                        /* Number of pages creation*/
                        $pageCount = BaseClass::pagesCount($orderObject->id);
                        $orderId = Yii::app()->session['orderID'];
                        $hasbuilderObject = UserHasTemplate::model()->addTemplate( $buildertempObject,$orderObject->id,$userID);
                        UserPages::model()->createNewPages($userID, $orderObject->id, $pageCount, $buildertempObject->body()->body_content,$buildertempObject->template_id);
                    }

                    
                    /* Insert Ads */                                        
                    $userId = Yii::app()->session['userid'];
                    $next_year = strtotime('+299 day'); //For next 300 day
                    $current_time = time();
                    $userAdsObject = UserSharedAd::model()->findByAttributes(array('user_id' => $userId , 'order_id' => $orderObject->id ));


                    $values = array();
                    for ($i = 0;$i < 300 ;$i++){
                        if($i == 0){
                            $current_time = strtotime('+0 day', $current_time);                        
                        }else{
                            $current_time = strtotime('+1 day', $current_time);
                        }
                        
                        $randAds = Ads::model()->find(array('select'=>'*', 'limit'=>'1', 'order'=>'rand()'));
                        $valueArray[] = '("'.Yii::app()->session['userid'].'","'.$orderObject->id.'","'.date('Y-m-d', $current_time).'","'.$randAds->id.'","0","'.date('Y-m-d').'")' ;
                    }
                     $values = implode(',', $valueArray);
                    if(count($values)>0){
                        $sql = 'INSERT INTO user_shared_ad (user_id , order_id , date ,ad_id ,status ,created_at) VALUES '. $values;
                        $command = Yii::app()->db->createCommand($sql);
                        echo $command->execute();
                    }
                    
                    $description = substr($packageObject->Description, 20);
                    $Couponbody = "";
                    if ($transactionObject->coupon_discount != '0') {
                        $Couponbody .= '<tr>
                <td width="200">Coupon Discount</td>
                  <td width="200">';
                        $Couponbody .= $transactionObject->coupon_discount;
                        $Couponbody .='</td>
                </tr>';
                    }
                    $RPBody = "";
                    if ($transactionObject->used_rp != 0) {
                        $RPBody .= '<tr>
                <td width="200">Used RP /Cash</td>
                  <td width="200">';
                        $RPBody .= number_format($transactionObject->used_rp, 2);
                        $RPBody .= '</td>
                </tr>';
                    }
                    if ($orderObject->domain_price != '0') {
                        $domain_price = "$" . number_format($orderObject->domain_price, 2);
                    } else {
                        $domain_price = "N/A";
                    }
                    $Samount = number_format($packageObject->amount + $orderObject->domain_price, 2);
                    $paid_amount = number_format($transactionObject->paid_amount, 2);

                    /*code to fetch profile */
                    $userProfileObject = UserProfile::model()->findByAttributes(array('user_id' => $userObject->id));

                    $invoiceArr = array();
                    $invoiceArr['package_name'] = $packageObject->name;
                    $invoiceArr['package_price'] = number_format($packageObject->amount,2);
                    $invoiceArr['Description'] = $packageObject->Description;
                    $invoiceArr['name'] = $userObject->name;
                    $invoiceArr['transaction_id'] = $transactionObject->transaction_id;
                    $invoiceArr['full_name'] = $userObject->full_name;
                    $invoiceArr['address'] = $userProfileObject->address;
                    $invoiceArr['email'] = $userObject->email;
                    $invoiceArr['domain'] = $orderObject->domain;
                    $invoiceArr['domain_price'] = $domain_price;
                    $invoiceArr['Samount'] = $Samount;
                    $invoiceArr['paid_amount'] = $paid_amount;
                    $invoiceArr['RPBody'] = $transactionObject->used_rp;
                    $invoiceArr['Couponbody'] = $transactionObject->coupon_discount;
                    $invoiceArr['created_at'] = $transactionObject->created_at;


                    //$body = Package::model()->createInvoice($invoiceArr);

                    $html2pdf = Yii::app()->ePdf->HTML2PDF('P', "A4", "en", array(10, 10, 10, 10));
                    $orderObject = Order::model()->findByPK($orderObject->id);
                    $userObjectArr1 = array();
                    $userObjectArr1['full_name'] = $userObject->name;
                    //$fp = fopen("/mailTemp/invoice.php","r");
                    $body = $this->renderPartial('../mailTemp/invoice', array('invoiceArr'=>$invoiceArr),true);
                    $html2pdf->WriteHTML($body);
                    $path = Yii::getPathOfAlias('webroot') . "/upload/invoice-pdf/";
                    $fileName = $userObject->name .'_'.time(). 'invoice.pdf';
                    $html2pdf->output($path . $fileName, 'F');
                    $config['to'] = $userObject->email;
                    $config['subject'] = 'Payment Confirmation';
                    $config['body'] = $this->renderPartial('../mailTemp/paymentsuccess', array('userObjectArr'=>$userObjectArr1),true);
                    $config['file_path'] = $path . $fileName;
                    CommonHelper::sendMail($config);


                    $userObjectArr = array();
                    $userObjectArr['to_name'] = $sponsorUserObject->full_name;
                    $userObjectArr['user_name'] = $userObject->name;
                    $config1['to'] = $sponsorUserObject->email;
                    $config1['subject'] = 'Direct Referral Income Credited';
                    $config1['body'] =  $this->renderPartial('../mailTemp/direct_referral', array('userObjectArr'=>$userObjectArr),true);
                    CommonHelper::sendMail($config1);
                    
                    $configMsg['to'] = $userObject->country_code.$userObject->phone; 
                    $configMsg['text'] = "Congratulation!!  
Your package purchase is successful.  You can login into your account and start building your web site. Refer Friends and earn rewards.";
                    $responce = BaseClass::sendMail($configMsg);
                    
                    $configMsg['to'] = $sponsorUserObject->country_code.$sponsorUserObject->phone; 
                    $configMsg['text'] = "Congratulation!!!  
We are pleased to inform you that your direct referral commissions have credited to your wallet successfully.";
                    $responce = BaseClass::sendMail($configMsg);

                    if ($transactionObject->status == 1) {
                        unset(Yii::app()->session['transactionid']);
                        unset(Yii::app()->session['amount']);
                        unset(Yii::app()->session['package_id']);
                        unset(Yii::app()->session['transaction_id']);
                        unset(Yii::app()->session['coupon_code']);
                        unset(Yii::app()->session['domain']);
                    } 
                }
            }
            $successMsg = "Thank you for your order! Your invoice has been sent to you by email, you should receive it soon.";
            echo "<script>setTimeout(function(){window.location.href='/order/list'},5000);</script>";
              } else{
                $userObject = User::model()->findByPk(Yii::app()->session['userid']);
                $userObjectArr = array();
                $userObjectArr['to_name'] = $userObject->full_name;
                $config1['to'] = $userObject->email;
                $config1['subject'] = 'Mglobally Transaction Falied';
                $config1['body'] =  $this->renderPartial('../mailTemp/failed_transaction', array('userObjectArr'=>$userObjectArr),true);
                CommonHelper::sendMail($config1); 
                 unset(Yii::app()->session['transactionid']);
                unset(Yii::app()->session['amount']);
                unset(Yii::app()->session['package_id']);
                unset(Yii::app()->session['transaction_id']);
                unset(Yii::app()->session['coupon_code']);
                unset(Yii::app()->session['domain']);
                
                $successMsg = "Your Transaction hase been cancelled.";
            echo "<script>setTimeout(function(){window.location.href='/order/list'},5000);</script>";
            }
          }

        $this->render('thankyou', array('successMsg' => $successMsg
        ));
    }
    
    public function actionWalletThankYou() {
        
     if (!empty($_GET)) {
             
        if($_GET['status']=='success')
            {    
            
            $transactionId = $_GET['transaction_id'];
            $transactionObject = Transaction::model()->findByAttributes(array('transaction_id' => $transactionId));
            $userObject = User::model()->findByPK(Yii::app()->session['userid']);
	    if($transactionObject->status == 0) {
            $transactionObject->status = 1;
             $transactionObject->created_at = date('Y-m-d');
            $transactionObject->update();
			
	 try {
                    //deduct from to user wallet
                    $toUserWalletObject = Wallet::model()->findByAttributes(array('user_id' => Yii::app()->session['userid'], 'type' => 1));
                    $adminWalletObject = Wallet::model()->findByAttributes(array('user_id' => 1, 'type' => 1));
                    if($toUserWalletObject){
                        //echo "<pre>";echo $transactionObject->paid_amount;exit;
                         $toAmount = ($toUserWalletObject->fund) + ($transactionObject->paid_amount);
                        $toUserWalletObject->fund = $toAmount;
                        $toUserWalletObject->update();
                    } else {
                        //echo "nn";exit;
                        Wallet::model()->create(Yii::app()->session['userid'],$transactionObject->paid_amount,1);
                        $toUserWalletObject = Wallet::model()->findByAttributes(array('user_id' => Yii::app()->session['userid'], 'type' => 1));
                    
                    }
                } catch (Exception $ex) {
                    $ex->getMessage();
                    exit;
                }		
				
	 try {	
                $moneyTransferDataArray['fund'] = $transactionObject->paid_amount;
                $moneyTransferDataArray['comment'] = "Wallet Amount Transfered";
                $moneyTransferDataArray['walletId'] = $adminWalletObject->id;
                $moneyTransferDataArray['toWalletId'] = $toUserWalletObject->id;
                $moneyTransferDataArray['fromUserId'] = 1;
                $moneyTransferDataArray['fundType'] = 1;	
	        $adminMoneyTransferObject = MoneyTransfer::model()->createMoneyTransfer($moneyTransferDataArray, $userObject, $transactionObject->id, $transactionObject->paid_amount,1);
                }   catch (Exception $ex) {
                    
                    
                    $ex->getMessage();
                    exit;
                }  
                $userObjectArr = array();
                $userObjectArr['to_name'] = $userObject->name;
                $userObjectArr['full_name'] = $userObject->full_name;
                $userObjectArr['from_name'] = "Admin";
                $userObjectArr['date'] = $transactionObject->created_at;
                $userObjectArr['fund'] = $transactionObject->actual_amount;
                $userObjectArr['transactionId'] = $transactionObject->transaction_id;
                $config['to'] = $userObject->email;
                $config['subject'] = 'Cash wallet recharged successfully.';
                $config['body'] =  $this->renderPartial('../mailTemp/fund_transfer', array('userObjectArr'=>$userObjectArr),true);
                CommonHelper::sendMail($config);
        }
            $successMsg = "Your cash has been added to your wallet. Please check";
            echo "<script>setTimeout(function(){window.location.href='/wallet/fundwallet'},5000);</script>";

            }else{
                $userObject = User::model()->findByPk(Yii::app()->session['userid']);
                $userObjectArr = array();
                $userObjectArr['to_name'] = $userObject->full_name;
                $config1['to'] = $userObject->email;
                $config1['subject'] = 'Mglobally Transaction Falied';
                $config1['body'] =  $this->renderPartial('../mailTemp/failed_wallet_transaction', array('userObjectArr'=>$userObjectArr),true);
                CommonHelper::sendMail($config1); 
             $successMsg = "Your transaction has been cancelled.";
            echo "<script>setTimeout(function(){window.location.href='/wallet/fundwallet'},5000);</script>";
        }
        }
      $this->render('wallethankyou', array('successMsg' => $successMsg
        ));
      
    }

    /*
     * function to save transaction data
     */

    public function actionWalletCalc() {
        if ($_REQUEST) {
            
            $transactionObject = Transaction::model()->findByAttributes(array('transaction_id' => $_REQUEST['transactionId']));
            
            if ($transactionObject) {
                $transactionObject->paid_amount = $_REQUEST['payableAmount'];
                $transactionObject->used_rp = $_REQUEST['totalusedRP'];
                $transactionObject->update();
            }
            $delete = MoneyTransfer::model()->deleteAll('transaction_id = ' . $transactionObject->id);
             
                $finalArtr = explode('-', $_REQUEST['wallet']);
                $moneytransferObject = new MoneyTransfer;
                /* $MTObject->transaction_id = $transactionObject->id;
                  $MTObject->to_user_id = 1;
                  $MTObject->from_user_id = Yii::app()->session['userid'];
                  $MTObject->wallet_id = $finalArtr[0];
                  $MTObject->fund = $finalArtr[1];
                  $MTObject->comment = "Package Purchased";
                  $MTObject->status = 0;
                  $MTObject->update();
                  }else{ */
                $moneytransferObject->transaction_id = $transactionObject->id;
                $moneytransferObject->to_user_id = 1;
                $moneytransferObject->from_user_id = Yii::app()->session['userid'];
                $moneytransferObject->wallet_id = $finalArtr[0];
                $moneytransferObject->fund = $_REQUEST['totalusedRP'];
                $moneytransferObject->comment = "Package Purchased";
                $moneytransferObject->status = 0;
                $moneytransferObject->created_at = date('Y-m-d');
                $moneytransferObject->save(false);
                
                
                /* } */
              
            echo 1;
        }
    }
    
    public function actionremoveCoupon() {
        
        if(!empty($_REQUEST['couponRemove']) && $_REQUEST['couponRemove']=='yes')
        {
            unset(Yii::app()->session['coupon_code']);
            echo 1;
        }else{
            echo 0;
        }
        
    }
    
    public function actiontestScript() { 
        	$datetime= gmdate('Y-m-d H:i:s');
                
	//$url = "https://test.httpapi.com/api/domains/available.json?auth-userid=600184&api-key=A2DQVwO3Aye7iZyPXKWzYY9LGIRJbl1q&domain-name=nidhi&tlds=co.uk";
	//echo $url;
 //echo '<br>';
                $url = "https://test.httpapi.com/api/resellers/generate-token.json?auth-userid=600184&api-key=A2DQVwO3Aye7iZyPXKWzYY9LGIRJbl1q&ip=192.168.1.105";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER,
		array("Content-type: text/html" ));
	       curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	       curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_POST, true);
		//curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

		$json_response = curl_exec($curl);

		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                curl_close($curl);

			 $response = json_decode($json_response, true);
			 echo '<pre>';
			 print_r($response);
			 echo '<br>';
        $datetime= gmdate('Y-m-d H:i:s');
	$url = "https://test.httpapi.com/api/domains/v5/suggest-names.json?auth-userid=600184&api-key=A2DQVwO3Aye7iZyPXKWzYY9LGIRJbl1q&keyword=ram";
	//echo $url;
 //echo '<br>';
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER,
				array("Content-type: text/html" ));
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_POST, true);
		//curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

		$json_response = curl_exec($curl);

		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

			
		curl_close($curl);

			 $response = json_decode($json_response, true);
			  echo '<pre>';
			 print_r($json_response);exit; 
    }
    public function actionCheckMasterPin() {
        
        if(!empty($_REQUEST['masterpin']))
        {
           $userObject = User::model()->findByPK(Yii::app()->session['userid']);
           if(!empty($userObject) && $userObject->master_pin == md5($_REQUEST['masterpin']))
           {
               echo 1;
               
           }else{
               echo 0;
           }
        }
        
    }
    
}
