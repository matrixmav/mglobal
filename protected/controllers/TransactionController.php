<?php

class TransactionController extends Controller {

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
                'actions' => array('index', 'view', 'list', 'rpwallet', 'commisionwallet', 'fundwallet'),
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

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Transaction;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Transaction'])) {
            $model->attributes = $_POST['Transaction'];
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

        if (isset($_POST['Transaction'])) {
            $model->attributes = $_POST['Transaction'];
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
        $dataProvider = new CActiveDataProvider('Transaction');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /*
     * this will fetch all transactions
     */

    public function actionList() {
        $model = new MoneyTransfer();
        $pageSize = Yii::app()->params['defaultPageSize'];
        $todayDate = Yii::app()->params['startDate'];
        $fromDate = date('Y-m-d');
        $status = 1;
        if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            $status = $_POST['res_filter'];
        }

        $dataProvider = new CActiveDataProvider($model, array(
            'criteria' => array(
                'condition' => ('created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '" AND status = "' . $status . '"' ), 'order' => 'id DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));

        $this->render('list', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function getSerialNumber($row, $data) {
        $this->i++;
        echo $this->i;
    }

    /*
     * this will fetch rp wallet
     */

    public function actionRpWallet() {
        $loggedInUserId = Yii::app()->session['userid'];
        $dataProvider = new CActiveDataProvider('MoneyTransfer', array(
            'criteria' => array(
                'condition' => ('to_user_id = ' . $loggedInUserId . ' OR from_user_id = ' . $loggedInUserId . ' AND wallet_id=1'), 'order' => 'id DESC',
        )));
        $this->render('rpwallet', array('dataProvider' => $dataProvider));
    }

    /*
     * this will fetch commision wallet
     */

    public function actionCommisionWallet() {
        $loggedInUserId = Yii::app()->session['userid'];
        $dataProvider = new CActiveDataProvider('MoneyTransfer', array(
            'criteria' => array(
                'condition' => ('to_user_id = ' . $loggedInUserId . ' OR from_user_id = ' . $loggedInUserId . ' AND wallet_id=2'), 'order' => 'id DESC',
        )));
        $this->render('commisionwallet', array('dataProvider' => $dataProvider));
    }

    /*
     * this will fetch fund wallet
     */

    public function actionFundWallet() {
        $loggedInUserId = Yii::app()->session['userid'];
        $dataProvider = new CActiveDataProvider('MoneyTransfer', array(
            'criteria' => array(
                'condition' => ('to_user_id = ' . $loggedInUserId . ' OR from_user_id = ' . $loggedInUserId . ' AND wallet_id=3'), 'order' => 'id DESC',
        )));
        $this->render('fundwallet', array('dataProvider' => $dataProvider));
    }

    /*
     * Manages all models.
     */

    public function actionAdmin() {
        $model = new Transaction('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Transaction']))
            $model->attributes = $_GET['Transaction'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Transaction the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Transaction::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Transaction $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'transaction-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
