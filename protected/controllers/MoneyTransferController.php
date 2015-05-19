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
                'actions' => array('index', 'view', 'list', 'transfer', 'autocomplete', 'confirm', 'status', 'userexists', 'fund'),
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

    public function actionTransfer() {

        $userid = Yii::app()->session['userid'];
        if (isset($_POST['transfer'])) {
            $percentage = ($_POST['paid_amount']) / 100;
            $actualamount = ($_POST['paid_amount'] + $percentage);
            $createdtime = new CDbExpression('NOW()');
            $userObject = User::model()->findByAttributes(array('name' => $_POST['username']));
            if (empty($userObject)) {
                $this->redirect(array('moneytransfer/status', 'status' => 'U'));
            }
            $transactionObjuser = new Transaction;
            $transactionObjuser->user_id = $userObject->id;
            $transactionObjuser->mode = $_POST['transactiontype'];//remove
            $transactionObjuser->gateway_id = 1;
            $transactionObjuser->actual_amount = $actualamount;
            $transactionObjuser->paid_amount = $_POST['paid_amount'];
            $transactionObjuser->total_rp = $_POST['rp_points']; //remove
            $transactionObjuser->used_rp = 0; //change this to current Used RPs
            $transactionObjuser->status = 0;
			$transactionObjuser->created_at = $createdtime;
            $transactionObjuser->updated_at = $createdtime;
            if (!$transactionObjuser->save()) {
                echo "<pre>";
                print_r($transactionObjuser->getErrors());
                exit;
            }
             $wallettoObj = Wallet::model()->findByAttributes(array('user_id' => $userObject->id, 'type' => $transactionObjuser->mode));
                if (empty($wallettoObj)) {
                    $wallettoObj = new Wallet;
                    $wallettoObj->type = $transactionObjuser->mode;
                    $wallettoObj->user_id = $userObject->id;
                    $wallettoObj->fund = 0;
                    $wallettoObj->status = 1;
                    $wallettoObj->created_at = $createdtime;
                    $wallettoObj->updated_at = $createdtime;
                    if (!$wallettoObj->save()) {
                        echo "<pre>";
                        print_r($wallettoObj->getErrors());
                        exit;
                    }
                } 
            $moneyTransfertoObj = new MoneyTransfer;
            $moneyTransfertoObj->from_user_id = $userid;
            $moneyTransfertoObj->to_user_id = $userObject->id;
            $moneyTransfertoObj->transaction_id = $transactionObjuser->id;
            $moneyTransfertoObj->fund_type = $_POST['transactiontype'];//1:RP,2:Cash
            $moneyTransfertoObj->comment = $_POST['paid_amount'] . ' to user'; //Ask input to the user
            $moneyTransfertoObj->status = 0;
			$moneyTransfertoObj->wallet_id = $wallettoObj->id;
            $moneyTransfertoObj->created_at = $createdtime;
            $moneyTransfertoObj->updated_at = $createdtime;
            //print_r($moneyTransfertoObjsave); echo $moneyTransfertoObj->id; exit;
            if (!$moneyTransfertoObj->save()) {
                echo "<pre>";
                print_r($moneyTransfertoObj->getErrors());
                exit;
            }
           
            $this->redirect(array('moneytransfer/confirm', 'tu' => base64_encode($transactionObjuser->id), 'a' => base64_encode($actualamount)));
        } else {
             //$adminId = Yii::app()->params['adminId'];
            $walletObject = Wallet::model()->findAllByAttributes(array('user_id' => $userid));
            $this->render('transfer', array('walletObject' => $walletObject));
        }
    }

    public function actionAutocomplete() {
        if ($_GET['username']) {
            $userObject = User::model()->findAll(array(
                'condition' => 't.name LIKE :name',
                'params' => array(':name' => '%' . $_GET['username'] . '%'),
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

    public function actionConfirm() {
		$adminid = Yii::app()->params['adminId'];
		$userid = Yii::app()->session['userid'];
        $createdtime = new CDbExpression('NOW()');
        // echo "<pre>"; print_r($_REQUEST);exit;
        if (isset($_POST['confirm'])) {
            $userObject = User::model()->findByAttributes(array('id' => $userid));
            if ($userObject->master_pin == md5($_POST['master_code'])) {
                $transactionObj = Transaction::model()->findByAttributes(array('id' => $_POST['tu']));

                $moneyobj = MoneyTransfer::model()->findByAttributes(array('transaction_id' => $_POST['tu']));
                // echo '<pre>';print_r($moneyTransferadmObj);exit;
				/* for from user wallet minus */
                $walletRecvObj = Wallet::model()->findByAttributes(array('user_id' => $moneyobj->from_user_id, 'type' => $transactionObj->mode));
                $walletRecvObj->fund = ($walletRecvObj->fund) - ($transactionObj->actual_amount);
                $walletRecvObj->update();
                /* for admin wallet add */
                $wallettoObj = Wallet::model()->findByAttributes(array('id' => $moneyobj->wallet_id));
                
                    $wallettoObj->fund = ($wallettoObj->fund) + ($transactionObj->paid_amount);
                    $wallettoObj->status = 1;
                    $wallettoObj->save();
				$moneyobj->comment = $_POST['comment'];
                $moneyobj->status = 1;
				$moneyobj->wallet_id = $wallettoObj->id;
                $moneyobj->update();
				$transactionObj->status = 1;
                $transactionObj->update();
				
				$transactionObjuser2 = new Transaction;
				$transactionObjuser2->user_id = $adminid;
				$transactionObjuser2->mode = $transactionObj->mode; //remove
				$transactionObjuser2->gateway_id = 1;
				$transactionObjuser2->actual_amount = (($transactionObj->actual_amount)-($transactionObj->paid_amount));
				$transactionObjuser2->paid_amount = (($transactionObj->actual_amount)-($transactionObj->paid_amount));
				$transactionObjuser2->total_rp = 0; //remove
				$transactionObjuser2->used_rp = 0;
				$transactionObjuser2->status = 1;
				$transactionObjuser2->created_at = $createdtime;
				$transactionObjuser2->updated_at = $createdtime;
				if (!$transactionObjuser2->save()) {
					echo "<pre>";
					print_r($transactionObjuser2->getErrors());
					exit;
				}
				 /* for admin wallet add */
                $walletadmObj = Wallet::model()->findByAttributes(array('user_id' =>$adminid, 'type' => $transactionObj->mode));
                if (empty($walletadmObj)) {
                    $walletadmObj = new Wallet;
                    $walletadmObj->type = $transactionObjuser2->mode;
                    $walletadmObj->user_id = $adminid;
                    $walletadmObj->fund = ($transactionObjuser2->paid_amount);
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
				 //add this after the successufll 1st transaction
				$moneyTransferadmObj = new MoneyTransfer;
				$moneyTransferadmObj->from_user_id = $userid;
				$moneyTransferadmObj->to_user_id = $adminid;
				$moneyTransferadmObj->transaction_id = $transactionObjuser2->id;
				$moneyTransferadmObj->fund_type = $transactionObj->mode;;
				$moneyTransferadmObj->comment = $transactionObjuser2->paid_amount . ' commission to admin';
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
                $this->redirect(array('MoneyTransfer/status', 'status' => 'S'));
            } else {

                $this->redirect(array('MoneyTransfer/status', 'status' => 'F'));
            }
        }
        $this->render('confirm');
    }

    public function actionStatus() {


        $this->render('status');
    }

    public function actionFund() {

        if (isset($_POST['addfund'])) {
            $createdtime = new CDbExpression('NOW()');
            $userObject = User::model()->findByAttributes(array('name' => $_POST['username']));
            if (empty($userObject)) {
                $this->redirect(array('MoneyTransfer/status', 'status' => 'U'));
            }
            $walletSenderObj = Wallet::model()->findByAttributes(array('user_id' => $userObject->id, 'type' => $_POST['transactiontype']));
            if (empty($walletSenderObj)) {
                $awalletSenderObj = new Wallet;
                $awalletSenderObj->type = $_POST['transactiontype'];
                $awalletSenderObj->user_id = $userObject->id;
                $awalletSenderObj->fund = $_POST['paid_amount'];
                $awalletSenderObj->status = 1;
                $awalletSenderObj->created_at = $createdtime;
                $awalletSenderObj->updated_at = $createdtime;
                if (!$awalletSenderObj->save()) {
                    echo "<pre>";
                    print_r($awalletSenderObj->getErrors());
                    exit;
                }
            } else {
                /* for to user wallet add */

                $walletSenderObj->fund = ($walletSenderObj->fund) + ($_POST['paid_amount']);
                $walletSenderObj->status = 1;
                $walletSenderObj->update();
            }
            $this->redirect(array('../wallet/list'));
        }
        $this->render('fund');
    }

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
