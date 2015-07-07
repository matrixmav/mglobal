<?php
//echo "cool";exit;
class MoneyTransferController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'inner';

    public function init() {
        BaseClass::isLoggedIn();
    }

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
                'actions' => array('index', 'view', 'list', 'transfer', 'autocomplete', 
                    'confirm', 'status', 'userexists', 'fund', 'transactions', 'autoadmin',
                    'adrpfund','addcash','walletconfirm'),
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

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionList() {

        $dataProvider = new CActiveDataProvider('MoneyTransfer', array(
            'pagination' => array('pageSize' => 10),
        ));
        $this->render('list', array('dataProvider' => $dataProvider));
    }

    public function actionTransactions() {

        $dataProvider = new CActiveDataProvider('MoneyTransfer', array(
            'pagination' => array('pageSize' => 10),
        ));
        $this->render('transactions', array('dataProvider' => $dataProvider));
    }

    /* code for money transfer in user view */

    public function actionTransfer() {
        
        $error = "";
        $loggedInUserId = Yii::app()->session['userid'];
        $frontUserObject = User::model()->findByPk($loggedInUserId);
        if(!empty($frontUserObject)){
        $frontName = $frontUserObject->name;
        
        }
        if (isset($_POST['transfer'])) { //echo "cool";exit;
            if ($_POST['paid_amount'] < 10) {
                $error = "Sorry! you can not transfer amount less then $10";
            } else {
                $postDataArray = $_POST;
                $toUserId = $postDataArray['search_user_id'];
                $walletType = $postDataArray['walletId'];
                $fund = $postDataArray['paid_amount'];  
                $userObject = User::model()->findByPk($toUserId);
                if (empty($userObject)) {
                    $this->redirect(array('moneytransfer/status', 'status' => 'U'));
                }
                //getFund Wallet
                $fromUserWalletObject = Wallet::model()->findByAttributes(array('user_id'=>$loggedInUserId, 'type'=>$walletType));
                if(!$fromUserWalletObject){
                    //create wallet for to user
                    $fund = 0;
                    $fromUserWalletObject = Wallet::model()->create($loggedInUserId,$fund,$walletType);
                }
                $postDataArray['walletId'] = $fromUserWalletObject->id;
                $toUserWalletObject = Wallet::model()->findByAttributes(array('user_id'=>$toUserId, 'type'=>$walletType));
                if(!$toUserWalletObject){
                    //create wallet for to user
                    $newWalletFund = "0";
                    $toUserWalletObject = Wallet::model()->create($toUserId,$newWalletFund,$walletType);
                }
                $postDataArray['toWalletId'] = $toUserWalletObject->id;
                //create transaction record entry
                $transactionObjectect = Transaction::model()->createTransaction($postDataArray, $userObject);

                //create money transfer record entry
                $moneyTransferObject = MoneyTransfer::model()->createMoneyTransfer($postDataArray, $userObject, $transactionObjectect->id, $transactionObjectect->paid_amount);
                $this->redirect(array('MoneyTransfer/confirm', 'tu' => base64_encode($moneyTransferObject->id), 'a' => base64_encode($transactionObjectect->paid_amount)));
            }
        }
        $userObject = User::model()->findAll(array('condition'=>'role_id = 1 AND status = 1 AND id !='.$loggedInUserId));
        $this->render('transfer', 
                array('userObject'=>$userObject,
                    'error' => $error,
                    'userId'=>$loggedInUserId,'frontName'=>$frontName));
    }

    /* autocomplete of username for user view excluding logged in user and admin */

    public function actionAutocomplete() {
        if ($_GET['username']) {
            $adminid = Yii::app()->params['adminId'];
            $userObject1 = User::model()->findByAttributes(array('id' => Yii::app()->session['userid']));
            $userObject2 = User::model()->findByAttributes(array('id' => $adminid));
            $userObject = User::model()->findAll(array(
                'condition' => 't.name LIKE :name and t.name != :admin and t.name != :login',
                'params' => array(':name' => '%' . $_GET['username'] . '%', ':login' => $userObject2->name, ':admin' => $userObject1->name),
            ));
            $newuserobj = array();
            $i = 0;
            foreach ($userObject as $user) {
                $newuserobj[$i] = $user->name;
                $i++;
            }
            echo json_encode($newuserobj);
        } else {
            $userObject = User::model()->findAll();
            $newuserobj = array();
            $i = 0;
            foreach ($userObject as $user) {
                $newuserobj[$i] = $user->name;
                $i++;
            }
            echo json_encode($newuserobj);
        }
    }

    /* autocomplete of username for admin including logged in user and admin */

    public function actionAutoAdmin() {
        if ($_GET['adusername']) {
            $adminid = Yii::app()->params['adminId'];
            $userObject = User::model()->findAll(array(
                'condition' => 't.name LIKE :name',
                'params' => array(':name' => '%' . $_GET['adusername'] . '%'),
            ));
            $newuserobj = array();
            $i = 0;
            foreach ($userObject as $user) {
                $newuserobj[$i] = $user->name;
                $i++;
            }
            echo json_encode($newuserobj);
        } else {
            $userObject = User::model()->findAll();
            $newuserobj = array();
            $i = 0;
            foreach ($userObject as $user) {
                $newuserobj[$i] = $user->name;
                $i++;
            }
            echo json_encode($newuserobj);
        }
    }

    /* redirected url after transfer, 2nd step in transfer */

    public function actionConfirm() {
        $adminid = Yii::app()->params['adminId'];
        $userid = Yii::app()->session['userid'];
        $createdtime = new CDbExpression('NOW()');
        $error = "";
        
        if (isset($_POST['confirm'])) {
            $userObject = User::model()->findByAttributes(array('id' => $userid));
            if ($userObject->master_pin == md5($_POST['master_code'])) {

                // fetching existing transaction 
                $moneyTransferObject = MoneyTransfer::model()->findByAttributes(array('id' => $_POST['tu']));
                
                // fetching existing money transfer 
                $transactionObject = Transaction::model()->findByPk($moneyTransferObject->transaction_id);
                
                // for from user wallet minus 
                $walletObject = Wallet::model()->findByPk($moneyTransferObject->wallet_id);
                try {
                    //deduct from to user wallet
                    $toUserWalletObject = Wallet::model()->findByAttributes(array('user_id' => $moneyTransferObject->to_user_id, 'type' => $walletObject->type));
                    
                    if($toUserWalletObject){
                        //echo "<pre>";echo $transactionObject->paid_amount;exit;
                        $toAmount = ($toUserWalletObject->fund) + ($transactionObject->actual_amount);
                        $toUserWalletObject->fund = $toAmount;
                        $toUserWalletObject->update($moneyTransferObject->to_user_id,$transactionObject->actual_amount,$walletObject->type);
                    } else {
                        //echo "nn";exit;
                        Wallet::model()->create($moneyTransferObject->to_user_id,$transactionObject->actual_amount,$walletObject->type);
                    }
                } catch (Exception $ex) {
                    $ex->getMessage();
                    exit;
                }
                try {
                    //deduct from from user wallet
                    $fromUserWalletObject = Wallet::model()->findByAttributes(array('user_id' => $moneyTransferObject->from_user_id, 'type' => $walletObject->type));
                    if($fromUserWalletObject){
                        if($fromUserWalletObject->fund > 0){
                            $fromAmount = ($fromUserWalletObject->fund) - ($transactionObject->paid_amount);
                        }
                        $fromUserWalletObject->fund = $fromAmount;
                        $fromUserWalletObject->update();
                    } else {
                         Wallet::model()->create($moneyTransferObject->from_user_id,$transactionObject->actual_amount,$walletObject->type);
                    }
                } catch (Exception $ex) {
                    $ex->getMessage();
                    exit;
                }
                $transactionObject->status = 1;
                $transactionObject->save();
                $message = $_POST['comment'];
                //Admin transaction
                $postDataArray['mode'] = 'transfer';
                $postDataArray['paid_amount'] = BaseClass::getPercentage($transactionObject->paid_amount,1);
                //Super Admin Id is !1: Need to call from param file
                $adminId = 1;
                $adminObject = User::model()->findByPk($adminId);
                $adminWalletObject = Wallet::model()->findByAttributes(array('type' => $walletObject->type, 'user_id'=> $adminId));
                
                //Create transaction for Admin
                $adminTransactionObject = Transaction::model()->createTransaction($postDataArray, $adminObject,1);
                $moneyTransferDataArray['fund'] = BaseClass::getPercentage($transactionObject->actual_amount,1);
                $moneyTransferDataArray['comment'] = $message;
                $moneyTransferDataArray['walletId'] = $toUserWalletObject->id;
                $moneyTransferDataArray['toWalletId'] =$adminWalletObject->id;
                $moneyTransferDataArray['fundType'] = $walletObject->type;
                $adminPercentage = BaseClass::getPercentage($transactionObject->actual_amount,1);
                
                $adminWalletObject->fund = ($adminWalletObject->fund+$adminPercentage);
                $adminWalletObject->save(false);
                //create money transfer record entry
                $adminMoneyTransferObject = MoneyTransfer::model()->createMoneyTransfer($moneyTransferDataArray, $adminObject, $adminTransactionObject->id, $adminTransactionObject->paid_amount,1);
                
                //user money transfer change status
                $moneyTransferObject->status = 1; //setting success
                $moneyTransferObject->save();

                //user money transfer change status
                $adminMoneyTransferObject->status = 1; //setting success
                $adminMoneyTransferObject->save();
                $userObjectArr = array();
                $toUserObjectMail = User::model()->findByPK($moneyTransferObject->to_user_id);
                $fromUserObjectMail = User::model()->findByPK($userid);
                $userObjectArr['to_name'] = $toUserObjectMail->name;
                $userObjectArr['full_name'] = $toUserObjectMail->full_name;
                $userObjectArr['from_name'] = $fromUserObjectMail->name;
                $userObjectArr['date'] = $transactionObject->created_at;
                $userObjectArr['fund'] = $transactionObject->actual_amount;
                $userObjectArr['transactionId'] = $transactionObject->transaction_id;
                
                /*mail to user*/
                $config['to'] = $toUserObjectMail->email;
                $config['subject'] = 'Fund Transfered';
                $config['body'] =  $this->renderPartial('//mailTemp/fund_transfer', array('userObjectArr'=>$userObjectArr),true);
                CommonHelper::sendMail($config);
                
                /*mail for from user*/
                
                $config['to'] = $fromUserObjectMail->email;
                $config['subject'] = 'Fund Transfered';
                $config['body'] =  $this->renderPartial('//mailTemp/fund_transfer', array('userObjectArr'=>$userObjectArr),true);
                CommonHelper::sendMail($config);
                
                $this->redirect(array('MoneyTransfer/status', 'transactionId' => $transactionObject->id));
            } else {
                $error = "Incorrect master pin";
                //$this->redirect(array('MoneyTransfer/status', 'status' => 'F'));
            }
        }
        $this->render('confirm',array('error'=> $error));
    }

    public function actionStatus() {
        $transactionObjectect = Transaction::model()->findByPk($_GET['transactionId']);
        $this->render('status', array('transactionObject' => $transactionObjectect));
    }

    /* add fund functionality for admin */

    public function actionFund() {
        $success = '';
        $adminid = Yii::app()->params['adminId'];
        if (isset($_POST['addfund'])) {
            $createdtime = new CDbExpression('NOW()');
            $userObject = User::model()->findByAttributes(array('name' => $_POST['username']));
            if (empty($userObject)) {
                $this->redirect(array('MoneyTransfer/status', 'status' => 'U'));
            }

            /* creating transaction object */

            $transactionObjectuser = new Transaction;
            $transactionObjectuser->user_id = $userObject->id;
            $transactionObjectuser->mode = $_POST['transactiontype']; //remove
            $transactionObjectuser->gateway_id = 1;
            $transactionObjectuser->coupon_discount = 0;
            $transactionObjectuser->actual_amount = $_POST['paid_amount'];
            $transactionObjectuser->paid_amount = $_POST['paid_amount'];
            $transactionObjectuser->total_rp = 0; //remove
            $transactionObjectuser->used_rp = 0; //change this to current Used RPs
            $transactionObjectuser->status = 1;
            $transactionObjectuser->created_at = $createdtime;
            $transactionObjectuser->updated_at = $createdtime;
            if (!$transactionObjectuser->save()) {
                echo "<pre>";
                print_r($transactionObjectuser->getErrors());
                exit;
            }

            /* adding a user wallet if not exists */

            $wallettoObj = Wallet::model()->findByAttributes(array('user_id' => $userObject->id, 'type' => $_POST['transactiontype']));
            if (empty($wallettoObj)) {
                $wallettoObj = new Wallet;
                $wallettoObj->type = $transactionObjectuser->mode;
                $wallettoObj->user_id = $userObject->id;
                $wallettoObj->fund = $_POST['paid_amount'];
                $wallettoObj->status = 1;
                $wallettoObj->created_at = $createdtime;
                $wallettoObj->updated_at = $createdtime;
                if (!$wallettoObj->save()) {
                    echo "<pre>";
                    print_r($wallettoObj->getErrors());
                    exit;
                }
            } else {
                /* for to user wallet add */

                $wallettoObj->fund = ($wallettoObj->fund) + ($_POST['paid_amount']);
                $wallettoObj->status = 1;
                $wallettoObj->update();
            }
            if ($userObject->id != $adminid) {
                /* adding a admin wallet if not exists */

                $walletadmObj = Wallet::model()->findByAttributes(array('user_id' => $adminid, 'type' => $_POST['transactiontype']));
                if (empty($wallettoObj)) {
                    $walletadmObj = new Wallet;
                    $walletadmObj->type = $transactionObjectuser->mode;
                    $walletadmObj->user_id = $userObject->id;
                    $walletadmObj->fund = $_POST['paid_amount'];
                    $walletadmObj->status = 1;
                    $walletadmObj->created_at = $createdtime;
                    $walletadmObj->updated_at = $createdtime;
                    if (!$walletadmObj->save()) {
                        echo "<pre>";
                        print_r($walletadmObj->getErrors());
                        exit;
                    }
                } else {
                    /* for to user wallet add */

                    $walletadmObj->fund = ($walletadmObj->fund) - ($_POST['paid_amount']);
                    $walletadmObj->status = 1;
                    $walletadmObj->update();
                }
            }
            /* adding a money transfer object */

            $moneyTransfertoObj = new MoneyTransfer;
            $moneyTransfertoObj->from_user_id = $adminid;
            $moneyTransfertoObj->to_user_id = $userObject->id;
            $moneyTransfertoObj->transaction_id = $transactionObjectuser->id;
            $moneyTransfertoObj->fund_type = $_POST['transactiontype']; //1:RP,2:Cash
            $moneyTransfertoObj->comment = $_POST['paid_amount'] . ' to user'; //Ask input to the user
            $moneyTransfertoObj->status = 1;
            $moneyTransfertoObj->wallet_id = $wallettoObj->id;
            $moneyTransfertoObj->created_at = $createdtime;
            $moneyTransfertoObj->updated_at = $createdtime;
            //print_r($moneyTransfertoObjsave); echo $moneyTransfertoObj->id; exit;
            if (!$moneyTransfertoObj->save()) {
                echo "<pre>";
                print_r($moneyTransfertoObj->getErrors());
                exit;
            }

            $success .= "Fund Added Successfully";
        }
        $userObject = User::model()->findByAttributes(array('id' => $adminid));
        $walletObject = Wallet::model()->findAllByAttributes(array('user_id' => $adminid));
        $this->render('fund', array('walletObject' => $walletObject, 'success' => $success, 'username' => $userObject->name));
    }

    /* checking for valid user at validation time */

    public function actionUserExists() {
        $userObject = User::model()->findByAttributes(array('name' => $_GET['u']));
        if (empty($userObject)) {
            echo 'notexists';
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new MoneyTransfer;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['MoneyTransfer'])) {
            $model->attributes = $_POST['MoneyTransfer'];
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

        if (isset($_POST['MoneyTransfer'])) {
            $model->attributes = $_POST['MoneyTransfer'];
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
        $dataProvider = new CActiveDataProvider('MoneyTransfer');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new MoneyTransfer('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['MoneyTransfer']))
            $model->attributes = $_GET['MoneyTransfer'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return MoneyTransfer the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = MoneyTransfer::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param MoneyTransfer $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'money-transfer-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionAddCash() {
        $error = "";
        $userObject = User::model()->findByPk(Yii::app()->session['userid']);
        if(!empty($_POST))
        {
         if($userObject->master_pin != md5($_POST['master_pin'])) 
          {
              $error .= "Incorrect master pin";
          }else{
              $type = 1;
            $_POST['walletId'] = '1';  
            $postDataArray = $_POST; 
            $transactionObject = Transaction::model()->createTransaction($postDataArray, $userObject,'admin');
            $this->redirect(array('MoneyTransfer/walletconfirm', 'tId' => base64_encode($transactionObject->transaction_id),'am' => base64_encode($transactionObject->paid_amount)));
            }
        }
        $this->render('addcash', array(
            'error' => $error,
        ));
         
    }
    
    public function actionWalletConfirm() {
        $error = "";
        $this->render('walletconfirm', array(
            'error' => $error,
        ));
         
    }
    
    public function actionAdRpFund(){
        $userid = Yii::app()->session['userid'];

        if($_POST){
            $existingShareObject = UserSharedAd::model()->findByAttributes(array('user_id'=>$userid, 'date'=>date('Y-m-d')));
            echo $existingShareObject->status ; die;
            if((!empty($existingShareObject->status) && $existingShareObject->status == 1)){
                return 1;
            }
            $orderObject = Order::model()->findByAttributes(array('user_id' => $userid, 'status'=>1));
            $shareCommissionAmount = $orderObject->package()->reward_points;
            
            $existingShareObject->user_id = $userid;
            $existingShareObject->ad_id = $_POST['adId'];
            $existingShareObject->social_id = $_POST['socialId'];
            $existingShareObject->status = 1;
            $existingShareObject->created_at = new CDbExpression('NOW()');
            $existingShareObject->updated_at = new CDbExpression('NOW()');
            if(!$existingShareObject->save(false)){
                echo "<pre>";
                print_r($existingShareObject->getErrors());
            }
            
            $postDataArray['transactionId'] = BaseClass::gettransactionID();
            $postDataArray['userId'] = $userid;
            $postDataArray['mode'] = 'rp';
            $postDataArray['actualAmount'] = $shareCommissionAmount;
            $postDataArray['paid_amount'] = $shareCommissionAmount;
            $userObject = User::model()->findByPk($userid);
            
            
            $transactionObject = Transaction::model()->createTransaction($postDataArray, $userObject,1);
            $transactionId = $transactionObject->id;
            
            $fromUserWalletObject = Wallet::model()->findByAttributes(array('user_id' => $userid, 'type' => 2));
            if($fromUserWalletObject){
                $fromAmount = ($fromUserWalletObject->fund) + $shareCommissionAmount;
                $fromUserWalletObject->fund = $fromAmount;
                $fromUserWalletObject->update();
            } else {
                $fromUserWalletObject =  Wallet::model()->create($userid,$shareCommissionAmount,2);
            }
                    
            $postDataArray['comment'] = 'Shared RP';
            $postDataArray['walletId'] = $fromUserWalletObject->id;
            $postDataArray['fundType'] = 1;
            $postDataArray['toWalletId'] = $fromUserWalletObject->id;
            $moneyTransferObject = MoneyTransfer::model()->createMoneyTransfer($postDataArray, $userObject,$transactionId,1,$role='1');
            return 1;
        }
    }

}
