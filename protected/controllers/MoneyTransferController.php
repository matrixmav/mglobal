<?php

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
                'actions' => array('index', 'view', 'list', 'transfer', 'autocomplete', 'confirm', 'status', 'userexists', 'fund', 'transactions', 'autoadmin'),
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
        $userid = Yii::app()->session['userid'];
        if (isset($_POST['transfer'])) {
            
        if($_POST['paid_amount'] < 10)
        {
           $error = "Sorry! you can not transfer amount less then $10";
        }else{
            $postDataArray = $_POST;
            $userName = $postDataArray['username'];
            $userObject = User::model()->findByAttributes(array('name' => $userName));
//            echo "<pre>"; print_r($userObject);exit;
            if (empty($userObject)) {
                $this->redirect(array('moneytransfer/status', 'status' => 'U'));
            }
            //create transaction record entry
            $transactionObject = Transaction::model()->createTransaction($postDataArray, $userObject);

            //create money transfer record entry
            $moneyTransferObject = MoneyTransfer::model()->createMoneyTransfer($postDataArray, $userObject, $transactionObject->id,$transactionObject->paid_amount);
            $this->redirect(array('MoneyTransfer/confirm', 'tu' => base64_encode($moneyTransferObject->id), 'a' => base64_encode($transactionObject->paid_amount)));
        } 
        }
            //$adminId = Yii::app()->params['adminId'];
            $walletObject = Wallet::model()->findWalletByUserId($userid);
            $this->render('transfer', array('walletObject' => $walletObject,'error'=>$error));
         
         
     
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
//         echo "<pre>"; print_r($_REQUEST);exit;
        if (isset($_POST['confirm'])) { 
            $userObject = User::model()->findByAttributes(array('id' => $userid));
            if ($userObject->master_pin == md5($_POST['master_code'])) {
              
                /* fetching existing transaction */

                $moneyobj = MoneyTransfer::model()->findByAttributes(array('id' => $_POST['tu']));
                /* fetching existing money transfer */
                $transactionObj = Transaction::model()->findByPk($moneyobj->transaction_id);
                /* for from user wallet minus */
//                $walletRecvObj = Wallet::model()->findByAttributes(array('user_id'=>$userid,'id'=>$moneyobj->wallet_id));
//                echo "<pre>"; print_r($moneyobj);
//                $walletRecvObj2 = Wallet::model()->findByAttributes(array('user_id'=>$userid,'type'=>$walletRecvObj->type));
//                  echo "<pre>"; print_r($walletRecvObj2);exit;
                $walletObject = Wallet::model()->findByPk($moneyobj->wallet_id);  
                $walletRecvObj2 = Wallet::model()->findByAttributes(array('user_id'=>$moneyobj->to_user_id,'type'=>$walletObject->type));
                
//                echo "<pre>"; print_r($walletObject);exit;
                  
                
                 $remainingAmount = ($walletObject->fund) - ($transactionObj->paid_amount);
                 $walletObject->fund = $remainingAmount;
                 if(!$walletObject->update()){
                    echo "<pre>";
                    print_r($walletObject->getErrors());
                    exit;
                 }
                 if(count($walletRecvObj2) == 0) {
                    $walletObject1 = new Wallet;
                    $walletObject1->user_id = $moneyobj->to_user_id;
                    $walletObject1->fund = $transactionObj->actual_amount;
                    $walletObject1->type = $walletObject->type;
                    $walletObject1->created_at = $createdtime;
                    $walletObject1->updated_at = $createdtime;
                    $walletObject1->save(false);
                }  
                /* for admin wallet add */
                $wallettoObj = Wallet::model()->findByAttributes(array('id' => $moneyobj->wallet_id));
                $wallettoObj->fund = ($wallettoObj->fund) + ($transactionObj->paid_amount);
                $wallettoObj->status = 1;
                $wallettoObj->save();
                $moneyobj->comment = $_POST['comment'];
                $moneyobj->status = 1;
                $moneyobj->wallet_id = $wallettoObj->id;
                $moneyobj->update(false);
                $transactionObj->status = 1;
                $transactionObj->update();
                /* creating new transaction object for admin */
                $fundA = $transactionObj->paid_amount*1/100;
                $transactionObjuser2 = new Transaction;
                $tarnsactionID = BaseClass::gettransactionID();
                $transactionObjuser2->gateway_id = 1;
                $transactionObjuser2->mode = 'transfer';
                $transactionObjuser2->user_id = $adminid;
                $transactionObjuser2->status = 1;
                $transactionObjuser2->actual_amount = $fundA;
                $transactionObjuser2->paid_amount = $fundA;
                $transactionObjuser2->transaction_id = $tarnsactionID;
                $transactionObjuser2->created_at = $createdtime;
                $transactionObjuser2->updated_at = $createdtime;
                if (!$transactionObjuser2->save(false)) {
                    echo "<pre>";
                    print_r($transactionObjuser2->getErrors());
                    exit;
                }
                //var_dump($transactionObj);exit;
                /* for admin wallet add */
                $walletadmObj = Wallet::model()->findByAttributes(array('user_id' => $adminid, 'type' => $walletObject->type));
                if (empty($walletadmObj)) {
                    $walletadmObj = new Wallet;
                    $walletadmObj->type = $walletObject->type;
                    $walletadmObj->user_id = $adminid;
                    $walletadmObj->fund = $fundA;
                    $walletadmObj->status = 1;
                    $walletadmObj->created_at = $createdtime;
                    $walletadmObj->updated_at = $createdtime;
                    if (!$walletadmObj->save()) {
                        echo "<pre>";
                        print_r($walletadmObj->getErrors());
                        exit;
                    }
                } else {
                    $walletadmObj->fund = ($walletadmObj->fund) + ($transactionObjuser2->paid_amount);
                    $walletadmObj->status = 1;
                    $walletadmObj->save();
                }
                /* creating new money transfer object for admin */
                
                $moneyTransferadmObj = new MoneyTransfer;
                $moneyTransferadmObj->from_user_id = $userid;
                $moneyTransferadmObj->to_user_id = $adminid;
                $moneyTransferadmObj->transaction_id = $transactionObjuser2->id;
                $moneyTransferadmObj->fund_type = $moneyobj->wallet_id;
                $moneyTransferadmObj->fund = $fundA;
                $moneyTransferadmObj->comment = $fundA.'commission to admin';
                $moneyTransferadmObj->wallet_id = $walletadmObj->id;
                $moneyTransferadmObj->status = 1;
                $moneyTransferadmObj->created_at = $createdtime;
                $moneyTransferadmObj->updated_at = $createdtime;
                //print_r($moneyTransferadmObjsave); echo $moneyTransferadmObj->id; exit;
                if (!$moneyTransferadmObj->save()) {
                    echo "<pre>";
                    print_r($moneyTransferadmObj->getErrors());
                    exit;
                }

                //exit();
                    $this->redirect(array('MoneyTransfer/status', 'transactionId' => $transactionObj->id));
            } else {

                $this->redirect(array('MoneyTransfer/status', 'status' => 'F'));
            }
        }
        $this->render('confirm');
    }

    public function actionStatus() {
        $transactionObject = Transaction::model()->findByPk($_GET['transactionId']);
        $this->render('status',array('transactionObject'=>$transactionObject));
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

            $transactionObjuser = new Transaction;
            $transactionObjuser->user_id = $userObject->id;
            $transactionObjuser->mode = $_POST['transactiontype']; //remove
            $transactionObjuser->gateway_id = 1;
            $transactionObjuser->coupon_discount = 0;
            $transactionObjuser->actual_amount = $_POST['paid_amount'];
            $transactionObjuser->paid_amount = $_POST['paid_amount'];
            $transactionObjuser->total_rp = 0; //remove
            $transactionObjuser->used_rp = 0; //change this to current Used RPs
            $transactionObjuser->status = 1;
            $transactionObjuser->created_at = $createdtime;
            $transactionObjuser->updated_at = $createdtime;
            if (!$transactionObjuser->save()) {
                echo "<pre>";
                print_r($transactionObjuser->getErrors());
                exit;
            }

            /* adding a user wallet if not exists */

            $wallettoObj = Wallet::model()->findByAttributes(array('user_id' => $userObject->id, 'type' => $_POST['transactiontype']));
            if (empty($wallettoObj)) {
                $wallettoObj = new Wallet;
                $wallettoObj->type = $transactionObjuser->mode;
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
                    $walletadmObj->type = $transactionObjuser->mode;
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
            $moneyTransfertoObj->transaction_id = $transactionObjuser->id;
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

}
