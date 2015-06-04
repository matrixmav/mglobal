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
                'actions' => array('index', 'view', 'domainsearch', 'availabledomain', 'checkout', 'domainadd', 'productcart', 'couponapply', 'loaddomain', 'orderadd', 'thankyou', 'walletcalculation', 'walletcalc'),
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
        $tarnsactionID = BaseClass::gettransactionID();
        $transactionObject = new Transaction;
        if (Yii::app()->session['transactionid'] == '') {
            Yii::app()->session['transactionid'] = $tarnsactionID;
        }

        $transactionObject1 = Transaction::model()->find(array('condition' => 'user_id =' . Yii::app()->session['userid'] . ' AND transaction_id= ' . Yii::app()->session['transactionid']));

        $total = $_REQUEST['totalAmount'] - $_REQUEST['coupon_discount'];

        if ($transactionObject1) {

            $transactionObject1->transaction_id = Yii::app()->session['transactionid'];
            $transactionObject1->mode = 'paypal';
            $transactionObject1->actual_amount = $_REQUEST['totalAmount'];
            $transactionObject1->paid_amount = $total;
            $transactionObject1->coupon_discount = $_REQUEST['coupon_discount'];
            $transactionObject1->total_rp = 0;
            $transactionObject1->used_rp = 0;
            $transactionObject1->status = 0;
            $transactionObject1->gateway_id = 1;
            $transactionObject1->updated_at = new CDbExpression('NOW()');
            $transactionObject1->update();
        } else {


            $transactionObject->user_id = Yii::app()->session['userid'];
            $transactionObject->transaction_id = Yii::app()->session['transactionid'];
            $transactionObject->mode = 'paypal';
            $transactionObject->actual_amount = $_REQUEST['totalAmount'];
            $transactionObject->paid_amount = $total;
            $transactionObject->coupon_discount = $_REQUEST['coupon_discount'];
            $transactionObject->total_rp = 0;
            $transactionObject->used_rp = 0;
            $transactionObject->status = 0;
            $transactionObject->gateway_id = 1;
            $transactionObject->created_at = new CDbExpression('NOW()');
            $transactionObject->save(false);
        }
        $transactionID = $transactionObject->id;

        if ($transactionID != '') {
            Yii::app()->session['transaction_id'] = $transactionObject->id;
        } else {
            Yii::app()->session['transaction_id'] = $transactionObject1->id;
        }
        //$transactionObject->used_rp = 0;
        $orderObject = new Order;
        $orderObject1 = Order::model()->find(array('condition' => 'user_id =' . Yii::app()->session['userid'] . ' AND transaction_id= ' . Yii::app()->session['transaction_id']));

        if (count($orderObject1) > 0) {
            $orderObject1->user_id = Yii::app()->session['userid'];
            $orderObject1->package_id = Yii::app()->session['package_id'];
            $orderObject1->domain = Yii::app()->session['domain'];
            $orderObject1->domain_price = Yii::app()->session['amount'];
            $orderObject1->transaction_id = Yii::app()->session['transaction_id'];
            $orderObject1->status = 0;
            $orderObject1->start_date = new CDbExpression('NOW()');
            $orderObject1->end_date = new CDbExpression('NOW()');
            $orderObject1->updated_at = new CDbExpression('NOW()');
            $orderObject1->update();
        } else {
            $orderObject->user_id = Yii::app()->session['userid'];
            $orderObject->package_id = Yii::app()->session['package_id'];
            $orderObject->domain = Yii::app()->session['domain'];
            $orderObject->domain_price = Yii::app()->session['amount'];
            $orderObject->transaction_id = Yii::app()->session['transaction_id'];
            $orderObject->status = 0;
            $orderObject->start_date = new CDbExpression('NOW()');
            $orderObject->end_date = new CDbExpression('NOW()');
            $orderObject->created_at = new CDbExpression('NOW()');
            $orderObject->save(false);
        }

        echo 1;
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



        if (Yii::app()->session['package_id'] == '') {

            Yii::app()->session['package_id'] = $_GET['package_id'];
        }

        $Package_id = Yii::app()->session['package_id'];

        $packageObject = Package::model()->findByPK($Package_id);

        $rightbar = '<div id="dca_cart" class="cart-wrapper">
            <div class="cart-header"><span class="ico-cart"></span>My Shopping Cart</div>
            <ul id="domainList" class="cartList cart-list">';
        if ($Package_id == '') {
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
        $userEnteredDomain = Yii::app()->session['domain'];
        $domainTakenArray = DomainTemp::model()->findAll(array("condition"=>"name LIKE '".$userEnteredDomain."%'"));
        $AllDomainArray = array('com', 'net', 'co.in', 'co.uk', 'org');
        $UserDomainPart = explode('.', $userEnteredDomain);


        // $pos = array_search($UserDomainPart[1], $AllDomainArray);
        //unset($AllDomainArray[$pos]);
        //$SuggestedDomain = "<div>Oops!Domain you entered not available.Please choose some other.</div><br/>";
        $SuggestedDomain = "";
        foreach ($domainTakenArray as $alldomain) {
            foreach($AllDomainArray as $allext){ 
                $domainName = "'" . $alldomain->name . "." . $allext . "'";
              
            $domainName = "'" . $alldomain->name . "." . $allext . "'";
            $domainNameF = "'" . $alldomain->name . "." . $allext . "'";

            $SuggestedDomain .= '<div class="secondary-result">
                            <div class="secondaryDomain resultDomain-wrapper">
                                 <div class="domain-wrapper cart2">
                                    <p class="domainName">' . $alldomain->name . "." . $allext  . '</p>
                                    <div class="website-promo orange">Get a free DIY for 6 months.<br>Use Coupon: VISA10</div>
                                 </div>
                                 <span class="pricing-wrp">
                                    <div class="slashprice cart1"><span class="WebRupee">$</span>'.$alldomain->price.'</div>
                                   </span>
                                      <input type="hidden" name="domain" id="domain" value="' . $alldomain->name . "." . $allext  . '">
                                    <input type="hidden" name="amount" id="amount" value="">';
                                       
            if (in_array($domainNameF, $domainTakenArray)) {

                $SuggestedDomain .= '<span class="select-domain btn-flat-green">N/A</span>';
            } else {


                $SuggestedDomain .= '<button class="add-to-cart select-domain btn-flat-green" id="test"  onclick="DomainAdd(' . $domainName . ');"  type="button">Add</button>';
            }
            $SuggestedDomain .= '</div></div>';


            //$SuggestedDomain .= "<a href='".Yii::app()->baseUrl."checkout?domain_id=1'>" . $UserDomainPart[0] . "." . $alldomain . "</a><br/>";
        }
        }




        $this->render('domainsearch', array(
            'rightbar' => $rightbar,
            'suggestedDomain' => $SuggestedDomain,
        ));
    }

    /**
     * Display search domain page 
     * Search Domain wether it is available or not
     */
    public function actionAvailableDomain() {
        Yii::app()->session['package_id'] = $_REQUEST['package_id'];
        $userEnteredDomain = $_REQUEST['domain'];
        //$domainTakenArray = array('nidhisati.com', 'ram.net', 'sumeet.com', 'suryaasati.com');
        $domainTakenArray = DomainTemp::model()->findAll(array("condition"=>"name LIKE '".$userEnteredDomain."%'"));
        $AllDomainArray = array('com', 'net', 'co.in', 'co.uk', 'org');
        $UserDomainPart = explode('.', $userEnteredDomain);
        //if (in_array($userEnteredDomain, $domainTakenArray)) {
            /*$pos = array_search($UserDomainPart[1], $AllDomainArray);
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
                        </div>';*/
          $SuggestedDomain = "";
            foreach ($domainTakenArray as $alldomain) {
              foreach($AllDomainArray as $allext){ 
                $domainName = "'" . $alldomain->name . "." . $allext . "'";
              
                $SuggestedDomain .= '<div class="secondary-result">
                            <div class="secondaryDomain resultDomain-wrapper">
                                 <div class="domain-wrapper cart2">
                                    <p class="domainName">' . $alldomain->name . "." . $allext . '</p>
                                    <div class="website-promo orange">Get a free DIY for 6 months.<br>Use Coupon: VISA10</div>
                                 </div>
                                 <span class="pricing-wrp">
                                    <div class="slashprice cart1"><span class="WebRupee">$</span> '.$alldomain->price .'</div>
                                   </span>
                                   <input type="hidden" name="domain" id="domain" value="' . $alldomain->name . "." . $allext  . '">
                                   <input type="hidden" name="amount" id="amount" value="">
                                    <button class="add-to-cart select-domain btn-flat-green" id="test"  onclick="DomainAdd(' . $domainName . ');"  type="button">Add</button>
                              </div>
                        </div>';
                        }}

                //$SuggestedDomain .= "<a href='".Yii::app()->baseUrl."checkout?domain_id=1'>" . $UserDomainPart[0] . "." . $alldomain . "</a><br/>";
             
        //} else {
            
            /*$domainNameF = "'" . $UserDomainPart[0] . ".com'";
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
                        </div> ';*/
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
            $walletObject = Wallet::model()->findAll(array('condition' => 'user_id=' . $loggedInUserId . ' AND fund >= "10"'));
            $this->render('cart', array(
                'packageObject' => $packageObject, 'walletObject' => $walletObject
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
        if ($_GET) {
            $transactionObject = Transaction::model()->findByAttributes(array('transaction_id' => $_GET['transaction_id']));

            $userObject = Transaction::model()->findByPK(Yii::app()->session['userid']);
            if ($transactionObject->status == 0) {
                $transactionObject->status = 1;
                $transactionObject->created_at = date('Y-m-d');
                $transactionObject->update();
                $orderObject = Order::model()->findByAttributes(array('transaction_id' => $transactionObject->id));
                $orderObject->status = 1;
                $orderObject->start_date = date('Y-m-d');
                $orderObject->end_date = (date('Y') + 1) . date('-m-d');
                $orderObject->update();
                $MTObject = MoneyTransfer::model()->findAll(array('condition' => 'transaction_id=' . $transactionObject->id));
                foreach ($MTObject as $mtObject) {
                    $mtObject->status = 1;
                    $mtObject->update();
                    $MTObject1 = Wallet::model()->findByAttributes(array('id' => $mtObject->wallet_id));
                    $MTObject1->fund = $MTObject1->fund - $mtObject->fund;
                    $MTObject1->update();
                }
            
            ob_start();
            $orderObject = Order::model()->findByAttributes(array('transaction_id' => $transactionObject->id));
            $userObject = User::model()->findByPK(Yii::app()->session['userid']);
            $packageObject = Package::model()->findByPK($orderObject->package_id);
            $body = "sdsds";

            $html2pdf = Yii::app()->ePdf->HTML2PDF();
            $orderObject = Order::model()->findByPK($orderObject->id);
            $html2pdf->WriteHTML($body);
            $path = Yii::getPathOfAlias('webroot') . "/upload/invoice-pdf/";
            $html2pdf->output($path . $userObject->name . 'invoice.pdf', 'F');
            $config['to'] = $userObject->email;
//                $config['subject'] = 'Payment Confirmation' ;
//                $config['body'] = 'Thank you for your order! Your invoice has been attached in this email. Please find'.
//                $config['attachment'] = '/upload/invoice-pdf/'.$userObject->name.'invoice.pdf';        
//                CommonHelper::sendMail($config);
            unset(Yii::app()->session['transactionid']);
            unset(Yii::app()->session['amount']);
            unset(Yii::app()->session['package_id']);
            unset(Yii::app()->session['transaction_id']);
            unset(Yii::app()->session['domain']);
            }
        }

        $successMsg = "Thank you for your order! Your invoice has been sent to you by email, you should receive it soon.";
        $this->render('thankyou', array('successMsg' => $successMsg
        ));
    }

    /*
     * function to save transaction data
     */

    public function actionWalletCalc() {
        if ($_REQUEST) {
            $transactionObject = Transaction::model()->findByAttributes(array('transaction_id' => Yii::app()->session['transactionid']));
            if ($transactionObject) {
                $transactionObject->paid_amount = $_REQUEST['payableAmount'];
                $transactionObject->used_rp = $_REQUEST['totalusedRP'];
                $transactionObject->update();
            }
            $delete = MoneyTransfer::model()->deleteAll('transaction_id = ' . $transactionObject->id);
            $wallet = explode(',', rtrim($_REQUEST['wallet'], ','));
            foreach ($wallet as $walletObj => $key) {
                $finalArtr = explode('-', $key);
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
                $moneytransferObject->fund = $finalArtr[1];
                $moneytransferObject->comment = "Package Purchased";
                $moneytransferObject->status = 0;
                $moneytransferObject->created_at = date('Y-m-d');
                $moneytransferObject->save(false);

                /* } */
            }
            echo 1;
        }
    }

}
