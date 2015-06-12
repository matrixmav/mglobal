<?php

class PackageController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'main';

    public function init() {
        BaseClass::isAdmin();
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
                'actions' => array('index', 'view', 'add', 'edit', 'list',
                    'changestatus', 'deletepackage', 'getPackageUpdatedTime'),
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
     * Lists all models.
     */
    public function actionIndex() {
        $todayDate = date('Y-m-d');
        $fromDate = date('Y-m-d');
        $pageSize = Yii::app()->params['defaultPageSize'];
         if (!empty($_POST)) {
         $todayDate = $_POST['from'];
         $fromDate = $_POST['to'];
         $dataProvider = new CActiveDataProvider('Package', array(
                'criteria' => array(
                    'condition' => ('created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '"' ), 'order' => 'id DESC',
                ), 'pagination' => array('pageSize' => $pageSize),
            ));
         }else{
        //$dataProvider = new CActiveDataProvider('Package');
        $dataProvider = new CActiveDataProvider('Package', array(
                'criteria' => array(
                    'condition' => ('created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '"' ), 'order' => 'id DESC',
                ), 'pagination' => array('pageSize' => $pageSize),
            ));
          }
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /*
     * Function to add package in database
     */

    public function actionAdd() {
        $error = "";
        $success = "";
        $msg = 1;
        $packageObject = new Package;
        if ($_POST) {
            if ($_POST['Package']['name'] == '' && $_POST['Package']['amount'] == '' && $_POST['Package']['description'] == '') {
                $error .= "Please fill required(*) marked fields.";
            } else {

                $packageObject->name = $_POST['Package']['name'];
                $packageObject->amount = $_POST['Package']['amount'];
                $packageObject->Description = $_POST['Package']['description'];
                $packageObject->no_of_pages = $_POST['Package']['no_of_pages'];
                $packageObject->no_of_images = $_POST['Package']['no_of_images'];
                $packageObject->no_of_forms = $_POST['Package']['no_of_forms'];
                $packageObject->status = 1;
                $packageObject->created_at = new CDbExpression('NOW()');
                $packageObject->save(false);

                $success .= "Package Successfully Added";
            }
        }



        $this->render('package_add', array('success' => $success, 'error' => $error));
    }

    /*
     * Function to Update package
     */

    public function actionedit() {
        $error = "";
        $success = "";
        $packageObject = Package::model()->findByPK(array('id' => $_GET['id']));
        if ($_POST) {
            if ($_POST['Package']['name'] == '' && $_POST['Package']['amount'] == '' && $_POST['Package']['description'] == '') {
                $error .= "Please fill required(*) marked fields.";
            } else {

                $packageObject->name = $_POST['Package']['name'];
                $packageObject->amount = $_POST['Package']['amount'];
                $packageObject->Description = $_POST['Package']['description'];
                $packageObject->no_of_pages = $_POST['Package']['no_of_pages'];
                $packageObject->no_of_images = $_POST['Package']['no_of_images'];
                $packageObject->no_of_forms = $_POST['Package']['no_of_forms'];
                $packageObject->status = 1;
                $packageObject->created_at = new CDbExpression('NOW()');
                $packageObject->update();

                $success .= "Package Successfully Updated";
                $this->redirect('list', array('success' => $success, 'error' => $error));
            }
        }

        $this->render('package_edit', array('success' => $success, 'error' => $error, 'packageObject' => $packageObject));
    }

    /*
     * Function to fetch Package list
     */

    public function actionList() {

        $model = new Package();
        $pageSize = 10;
        $todayDate = date('Y-m-d');
        $fromDate = date('Y-m-d');
        $status = "1";
        if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            $status = $_POST['res_filter'];
        }


        $dataProvider = new CActiveDataProvider($model, array(
            'criteria' => array(
                'condition' => ('status = "' . $status . '"' ), 'order' => 'id DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));

        $this->render('package_list', array(
            'dataProvider' => $dataProvider, 'msg' => 0
        ));
    }

    /*
     * Function to fetch Package list
     */

    public function actionChangeStatus() {


        if ($_REQUEST['id']) {
            $packageObject = Package::model()->findByPK($_REQUEST['id']);
            if ($packageObject->status == 1) {
                $packageObject->status = 0;
            } else {
                $packageObject->status = 1;
            }
            $packageObject->save(false);
            //$this->redirect('/admin/package/list',array('msg'=>'2'));
            $this->redirect(array('/admin/package/list', 'msg' => 2));
        }
    }

    /*
     * Function to Delete Package list
     */

    public function actionDeletePackage() {
        if ($_REQUEST['id']) {
            $packageObject = Package::model()->findByPK($_REQUEST['id']);
            $packageObject->delete();
            $this->redirect(array('/admin/package/list', 'msg' => 1));
        }
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
     * Get Updated time.
     */
    public function getPackageUpdatedTime($data) {
        return date("g:i a", strtotime($data->update_at));
    }

}
