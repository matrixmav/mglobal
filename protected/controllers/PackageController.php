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

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'payment','domainsearch', 'availabledomain', 'checkout', 'domainadd', 'productcart', 'couponapply', 'loaddomain', 'orderadd', 'thankyou', 'walletcalculation', 'walletcalc'),
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
        $couponObject = Coupon::model()->findByAttributes(array('status' => '1'));
        $packageObject = Package::model()->findByPK(Yii::app()->session['package_id']);
        if ($couponObject->coupon_code == $_REQUEST['coupon_code']) {
            Yii::app()->session['coupon_code'] = $_REQUEST['coupon_code'];

            $packageamount = $packageObject->amount;
            $discountedAmount = $packageObject->amount * $percentage / 100 + Yii::app()->session['amount'];
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
        $transactionArray['transactionId'] = $tarnsactionId;
 
        if (count($transactionObject) > 0) {
            
            Transaction::model()->createTransactionPackage($transactionObject,$transactionArray);
        } else {
            
            $transactionObject = new Transaction;
            Transaction::model()->createTransactionPackage($transactionObject,$transactionArray);
        }
         
         
        
        //$transactionObject->used_rp = 0;
        $orderObject = Order::model()->find(array('condition' => 'user_id =' . Yii::app()->session['userid'] . ' AND transaction_id= ' . $transactionObject->id));

        $orderArray['transaction_id'] = $transactionObject->id;
        $orderArray['user_id'] = Yii::app()->session['userid'];
        $orderArray['domain_price'] = Yii::app()->session['amount'];
        $orderArray['domain'] = Yii::app()->session['domain'];
        $orderArray['package_id'] = Yii::app()->session['package_id'];
        
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
                $rightbar .= '<div class="closeImg"> <a href=""> <i class="fa fa-times"></i></a></div>';
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

                    $SuggestedDomain .= '<div class="searchWrap"><div class="row"><div class="col-sm-7 col-xs-7"><div class="domainName"><p>' . $alldomain->name . "." . $allext . '</p>
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

                $SuggestedDomain .= '<div class="searchWrap searchWrapBlur"><div class="row"><div class="col-sm-7 col-xs-7"><div class="domainName"><p>' . $alldomain->name . "." . $allext . '</p>
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
             
            $transactionId = $_GET['transaction_id'];
            $transactionObject = Transaction::model()->findByAttributes(array('transaction_id' => $transactionId));
            $userObject = User::model()->findByPK(Yii::app()->session['userid']);
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
                    
                    /* code to deduct amount from admin commission wallet*/
                    
                    $adminWalletObject = Wallet::model()->findByAttributes(array('user_id' => 1, 'type' => 3));
                    if($adminWalletObject)
                    {
                        $fromAmountpercent = $packageObject->amount*5/100;
                        $adminWalletObject->fund = ($adminWalletObject->fund) - $fromAmountpercent;
                        $adminWalletObject->update();
                    }
                    
                    
                    /* code to add sponsor transaction*/
                    $postDataArray['transactionId'] = BaseClass::gettransactionID();
                    $postDataArray['userId'] = $sponsorUserObject->id;
                    $postDataArray['mode'] = 'transfer';
                    $postDataArray['actualAmount'] = $packageObject->amount;
                    $postDataArray['paid_amount'] = $fromAmountpercent;
                    $userObject = User::model()->findByPk($sponsorUserObject->id);
                    $transactionObjectSponsor = Transaction::model()->createTransaction($postDataArray, $userObject,1);
                    
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
                 
                $userObjectArr = array();
                $userObjectArr['to_name'] = $sponsorUserObject->full_name;
                $userObjectArr['user_name'] = $userObject->name;
                $config['to'] = $sponsorUserObject->email;
                $config['subject'] = 'Direct Referral Income Credited';
                $config['body'] =  $this->renderPartial('../mailTemp/direct_referral', array('userObjectArr'=>$userObjectArr),true);
                CommonHelper::sendMail($config);
                
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
                $body = '<table width="100%" border="1" align="center"><tr><td colspan="4">Invoice</td></tr><tr><td width="200">Package</td><td width="200">Description</td><td width="200">Duration</td><td width="200">Price</td></tr>';
                $body .='<tr>
                     <td>';
                $body .= $packageObject->name;
                $body .='</td><td>';
                $body .= $description;
                $body .='</td><td>1 Year</td><td>';
                $body .= "$" . $packageObject->amount;
                $body .='</td></tr>';
                $body .='<tr><td>';
                $body .= 'Premium domain purchased';
                $body .= '</td><td>';
                $body .= $orderObject->domain;
                $body .= '</td><td>';
                $body .= '1 Year';
                $body .='</td><td>';
                $body .= $domain_price;
                $body .= '</td></tr>
                <tr>
  	     <td colspan="2"></td>
             <td colspan="2">
    	     <table>
        	<tr>
            <td width="200">Subtotal</td>
              <td width="200">';
                $body .= "$" . $Samount;
                $body .= '</td>';
                $body .= '</tr>';
                $body .= $Couponbody;
                $body .= $RPBody;
                $body .='<tr>
            <td width="200">Total Paid Amount:</td>
              <td width="200">';
                $body .= "$" . $paid_amount;
                $body .= '</td>
            </tr>
        </table>
    </td>
  </tr></table>';

                $html2pdf = Yii::app()->ePdf->HTML2PDF('L', "A4", "en", array(10, 10, 10, 10));
                
                $orderObject = Order::model()->findByPK($orderObject->id);
                $html2pdf->WriteHTML($body);
                $path = Yii::getPathOfAlias('webroot') . "/upload/invoice-pdf/";
                $html2pdf->output($path . $userObject->name . 'invoice.pdf', 'F');
                $config['to'] = $userObject->email;
                $config['subject'] = 'Payment Confirmation';
                $config['body'] = 'Thank you for your order! Your invoice has been attached in this email. Please find' .
                $config['file_path'] = $path . $userObject->name . 'invoice.pdf';
                CommonHelper::sendMail($config);
                
               
            }
            if ($transactionObject->status == 1) {
                unset(Yii::app()->session['transactionid']);
                unset(Yii::app()->session['amount']);
                unset(Yii::app()->session['package_id']);
                unset(Yii::app()->session['transaction_id']);
                unset(Yii::app()->session['domain']);
            }
            $successMsg = "Thank you for your order! Your invoice has been sent to you by email, you should receive it soon.";
            echo "<script>setTimeout(function(){window.location.href='/order/list'},5000);</script>";


        }

        $this->render('thankyou', array('successMsg' => $successMsg
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

}
