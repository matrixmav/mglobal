<?php

class OrderController extends Controller {

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
                'actions' => array('index', 'view', 'list', 'redirect', 'invoice', 'checkinvestment', 'refferalincome','pendingpayment'),
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

    public function actionList() {
        $userId = Yii::app()->session['userid'];
        $pageSize = 10;
        $dataProvider = new CActiveDataProvider('Order', array(
            'criteria' => array(
                'condition' => ('user_id = ' . $userId ), 'order' => 'id DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));


        $orderObject = Order::model()->findAll(array('condition' => 'user_id=' . $userId));
        $this->render('list', array('dataProvider' => $dataProvider, 'orderObject' => $orderObject));
    }

    public function getLabel($data, $row) {
        echo "CButtonColumn1";
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
        $model = new Order;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Order'])) {
            $model->attributes = $_POST['Order'];
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

        if (isset($_POST['Order'])) {
            $model->attributes = $_POST['Order'];
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
        $dataProvider = new CActiveDataProvider('Order');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /*
     * function to generate invoice
     */

    public function actionInvoice() {
        if (!empty($_GET)) {
            $order_id = $_GET['id'];
        }
        $orderObject = Order::model()->findByPK($order_id);

        $this->renderPartial('invoice', array(
            'orderObject' => $orderObject
        ));
        /* $dataProvider =  "";   
          $html2pdf = Yii::app()->ePdf->HTML2PDF();
          $html2pdf->writeHTML('testingvggg');
          $html2pdf->output('etc2.pdf',EYiiPdf::OUTPUT_TO_BROWSER); */
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Order('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Order']))
            $model->attributes = $_GET['Order'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Order the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Order::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Order $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'order-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /*
     * Function to fetch user investment
     */

    public function actionCheckInvestment() {
        $loggedInuserName = User::model()->findByPk(Yii::app()->session['userid']);
        $model = User::model()->findAll(array('condition' => 'sponsor_id = "' . $loggedInuserName->name . '"'));
        $connection = Yii::app()->db;
        $userid = "";
        
        if (!empty($_POST)) {
        $todayDate = $_POST['from'];
        $fromDate = $_POST['to'];
        }else{
        $todayDate = date('Y-m-d');
        $fromDate = date('Y-m-d');   
        }
        if ($model) {
            foreach ($model as $user) {
                $userid .= "'" . $user->id . "',";
            }
            $userID = rtrim($userid, ',');
            $condition = 'order.user_id IN(' . $userID . ') AND ';
        } else {
            $condition = "order.user_id IN('0') AND ";
        }
        $command = $connection->createCommand('select user.position,order.created_at,order.status,user.full_name,user.id,order.package_id,transaction.paid_amount,package.name from `user`,`order`,`package`,`transaction` WHERE ' . $condition . ' user.id = order.user_id AND order.package_id = package.id AND transaction.user_id = user.id AND order.status="1" AND transaction.mode != "transfer" AND order.created_at >= "' . $todayDate . '" AND order.created_at <= "' . $fromDate . '"');

        // Date filter.
        if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            $command = $connection->createCommand('select user.position,order.created_at,order.status,user.full_name,user.id,order.package_id,transaction.paid_amount,package.name from `user`,`order`,`package`,`transaction` WHERE ' . $condition . ' user.id = order.user_id AND order.package_id = package.id AND transaction.user_id = user.id AND order.status="1" AND transaction.mode != "transfer" AND order.created_at >= "' . $todayDate . '" AND order.created_at <= "' . $fromDate . '"');
        }

        $row = $command->queryAll();

        $sqlData = new CArrayDataProvider($row, array(
            'pagination' => array('pageSize' => 10)));
        //$sqlData = $sqlData->getData();
        //$sqlData = $sqlData[0];
        //$dataProvider = new CActiveDataProvider($sqlData, array(
        //'pagination' => array('pageSize' => 10),));
        /* foreach($dataProvider as $data)
          {
          $orderObject =  Order::model()->findByAttributes(array('user_id'=>$data->id));
          $dataProvider['order'] = $orderObject;
          $packageObject =  Package::model()->findByPK($orderObject->package_id);
          $dataProvider['package'] = $packageObject;
          } */

        $this->render('checkinvestment', array(
            'dataProvider' => $sqlData,
        ));
    }

    /*
     * function to fetch direct income
     */

    public function actionRefferalIncome() {
        $loggedInuserName = User::model()->findByPk(Yii::app()->session['userid']);
        $model = User::model()->findAll(array('condition' => 'sponsor_id = "' . $loggedInuserName->name . '"'));
        //$connection = Yii::app()->db;
        $userid = "";
        $userID = 0;
        if ($model) {
            foreach ($model as $user) {
                $userid .= "'" . $user->id . "',";
            }
            $userID = rtrim($userid, ',');
            $condition = 'user_id IN(' . $userID . ') AND ';
        } else {
            $condition = "user_id IN('0') AND ";
        }
        $pageSize = 100;
          
        
        // Date filter.
        if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
        }else{
            $todayDate = '0000-00-00';
            $fromDate = '0000-00-00';
        }   
            $dataProvider = new CActiveDataProvider('Order', array(
            'criteria' => array(
                'condition' => ($condition.'created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '" AND status=1' ), 'order' => 'created_at DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));
        
         
        $totalAmount = "";
        $connection = Yii::app()->db;
        $command = $connection->createCommand("SELECT package.amount FROM `package`,`order` where order.user_id in (".$userID.") AND order.package_id = package.id AND order.created_at >= '" . $todayDate . "' AND order.created_at <= '" . $fromDate . "' AND order.status='1'");
        $row = $command->queryAll();
        
        foreach ($row as $amount) {
            $totalAmount += $amount['amount'] * 5 / 100;
         }

        //$sqlData = new CArrayDataProvider($row, array(
            //'pagination' => array('pageSize' => 100)));
        //$sqlData = $sqlData->getData();
        //$sqlData = $sqlData[0];
        //$dataProvider = new CActiveDataProvider($sqlData, array(
        //'pagination' => array('pageSize' => 10),));
        /* foreach($dataProvider as $data)
          {
          $orderObject =  Order::model()->findByAttributes(array('user_id'=>$data->id));
          $dataProvider['order'] = $orderObject;
          $packageObject =  Package::model()->findByPK($orderObject->package_id);
          $dataProvider['package'] = $packageObject;
          } */



        $this->render('directincome', array(
            'dataProvider' => $dataProvider,
            'totalAmount' => $totalAmount,
        ));
    }
    
    
    protected function GetButtonTitle($data, $row) {
        $userId = Yii::app()->session['userid'];
        $userhasObject = UserHasTemplate::model()->find(array('condition' => 'order_id=' . $data['id']));
        $orderObject = Order::model()->find(array('condition' => 'id=' . $data['id']));
        
        if($orderObject->status==1) {
        if (!empty($userhasObject) && $userhasObject->publish == 1) {
//            $title = '<a href="' . $data['domain'] . '" title="Visit Website" target="_blank" class="btn green fa fa-edit margin-right15">Visit Website</a>';
            $title = '<a href= "/builder_images/'.$userId.'/build'.$data['id'].'" title="Visit Website" target="_blank" class="btn green fa fa-edit margin-right15">Visit Website</a>';
        } else {
            $title = '<a href="/BuildTemp/templates/?id=' . $data->id . '" title="Build Website" target="_blank" class="btn red fa fa-edit margin-right15">Build Website</a>';
        }
        }else{
        $title = '<a class="btn red fa fa-edit margin-right15" href="#">N/A</a>';
            
        }
        echo $title;
    }
    
      protected function GetInvoiceButtonTitle($data, $row) {
         $id = $data->id;
         $userId = Yii::app()->session['userid'];
        $userhasObject = UserHasTemplate::model()->find(array('condition' => 'order_id=' . $data['id']));
        $orderObject = Order::model()->find(array('condition' => 'id=' . $data['id']));
        if($orderObject->status==1)
        {
        $title = '<a href="/order/invoice?id='.$id.'" title="Visit Website" target="_blank" class="btn red fa fa-edit margin-right15">Invoice</a>';
        }else{
        $title = '<a class="btn red fa fa-edit margin-right15" href="#">N/A</a><br/><br/><a class="btn green fa fa-edit margin-right15 fancybox" href="/order/pendingpayment?id='.$id.'" data-toggle="modal">Make Payment</a>';
         }
        echo $title;
    }
    
    public function actionPendingPayment() {
        if(!empty($_GET['id']))
        {
        $orderObject = Order::model()->findByPk($_GET['id']);
        $transactionObject = Transaction::model()->findByAttributes(array('id'=>$orderObject->transaction_id));
        $loggedInUserId = Yii::app()->session['userid'];
        $package_id = Yii::app()->session['package_id'];
        $packageObject = Package::model()->findByPK($package_id);
        $walletObject = Wallet::model()->findAll(array('condition' => 'user_id=' . $loggedInUserId . ' AND fund >= "10"'));
        }
       $this->render('pendingPayment', array(
            'orderObject' => $orderObject,
            'transactionObject' => $transactionObject,
            'walletObject'=>$walletObject,
            'packageObject' =>$packageObject
             
        )); 
    }
    

}
