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
                'actions' => array('index', 'view', 'list', 'redirect', 'invoice', 'checkinvestment'),
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

    public function actionRedirect() {
        $orderID = end((explode("/", $_SERVER['REQUEST_URI'])));
        $userObject = User::model()->findByPK(Yii::app()->session['userid']);
        $builderObject = WebsiteadminAdminUsers::model()->findByAttributes(array('username' => $userObject->name . $orderID));
        $builderweblogObject1 = WebsiteadminWeblog::model()->findByAttributes(array('user' => $userObject->name . $orderID));
        $buildertemplateObject1 = WebsiteadminUserTemplates::model()->findByAttributes(array('user' => $userObject->name . $orderID));
        if (count($builderObject) > 0) {

            $builderObject->first_name = $userObject->full_name;
            $builderObject->username = $userObject->name . $orderID;
            $builderObject->type = "Basic";
            $builderObject->password = md5('12345');
            $builderObject->update();

            $buildertemplateObject1->name = $userObject->full_name;
            $buildertemplateObject1->user = $userObject->name . $orderID;
            $buildertemplateObject1->update();

            /* User entry in builder weblog */

            $builderweblogObject1->user = $userObject->name . $orderID;
            $builderweblogObject1->update();
        } else {

            $builderObject1 = new WebsiteadminAdminUsers();
            $builderObject1->first_name = $userObject->full_name;
            $builderObject1->username = $userObject->name . $orderID;
            $builderObject1->type = "Basic";
            $builderObject1->password = md5('12345');
            $builderObject1->save(false);

            /* User entry in builder templates */
            $buildertemplateObject = new WebsiteadminUserTemplates();
            $buildertemplateObject->name = $userObject->full_name;
            $buildertemplateObject->user = $userObject->name . $orderID;
            $buildertemplateObject->save(false);

            /* User entry in builder weblog */
            $builderweblogObject = new WebsiteadminWeblog();
            $builderweblogObject->user = $userObject->name . $orderID;
            $builderweblogObject->save(false);
        }

        //$criteria = new CDbCriteria;
//            $criteria->addCondition("status=1");
//            $criteria->addCondition("country_id=".$country_id);
//            $states=State::model()->findAll($criteria);
        //$pageSize = 10;
        //$dataProvider = new CActiveDataProvider('Order', array(
        //'criteria'=>$criteria,
        //'pagination' => array('pageSize' => $pageSize),
        //));
        Yii::app()->session['order_id'] = $orderID;
        Yii::app()->session['username1'] = $userObject->name . $orderID;
        header('Location:/builder/USERSADMIN/index.php?category=home&user=' . $userObject->name . $orderID . '&order_id=' . $orderID);
        //$orderObject = Order::model()->findAll();
        //echo "<pre>"; print_r();exit;
        //$this->render('list',array('dataProvider'=>$dataProvider));
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
            'orderObject' => $orderObject,
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
           $loggedInuserName = Yii::app()->session['username'];
           $model = User::model()->findAll(array('condition'=>'sponsor_id = "'.$loggedInuserName.'"'));
           $connection = Yii::app()->db;
           $userid="";
           foreach($model as $user)
           {
            $userid .= "'".$user->id."',";
           }
           $userID = rtrim($userid,',');
           $command = $connection->createCommand('select user.position,order.created_at,order.status,user.full_name,user.id,order.package_id,package.amount,package.name from `user`,`order`,`package` WHERE order.user_id IN('.$userID.') AND user.id = order.user_id AND order.package_id = package.id ');
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
          }*/
            
        $this->render('checkinvestment', array(
            'dataProvider' => $sqlData,
        ));
    }

}
