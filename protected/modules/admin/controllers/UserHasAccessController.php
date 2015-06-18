<?php

class UserHasAccessController extends Controller {

    public $layout = 'main';

    public function init() {
        //BaseClass::isLoggedIn();
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
                'actions' => array('index', 'memberaccess','members','changeapprovalstatus'),
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

    public function actionIndex() {
         
        $this->render('index');
    }
    
    public function actionMemberAccess() {
    $varString = "";
    $error ="";
    $success ="";
    
    $model = new UserHasAccess;
    if((isset($_GET)) && $_GET['id'] !='')
    {
    $emailObject = User::model()->findBYPK($_GET['id']);
    $UseraccessObject = UserHasAccess::model()->findByAttributes(array('user_id'=>$_GET['id']));
    $accessArr = explode(',',$UseraccessObject->access);
    if(!empty($_POST))
    {
     $accessObject = UserHasAccess::model()->findByAttributes(array('user_id'=>$_POST['admin_id']));
     if(count($_POST['access']) ==0 || $_POST['admin_id']=='')
     {
        $error .= "Please fill required(*)marked fields."; 
     }
     else{
         $access = $_POST['access'];
          
         foreach($access as $access1)
         {
             $varString .= $access1.",";
         }
         $finalString = substr($varString,0,-1);
         if(count($accessObject)==0)
         {
         $model->user_id = $_POST['admin_id'];
         $model->access = $finalString;
         $model->created_at = new CDbExpression('NOW()');
         $model->save(false);
         }else{
         $accessObject->user_id = $_POST['admin_id'];
         $accessObject->access = $finalString;
         $accessObject->created_at = new CDbExpression('NOW()');
         $accessObject->save(false);    
         }
         $success .= "User access permission saved successfully.";
     }
    }
    }else{
      $error .= "Invalid request.";   
    }
    $this->render('/user/member_access',array('emailObject'=>$emailObject,'error'=>$error,'success'=>$success,'accessArr'=>$accessArr));
    }
    
    /*
     * function to fetch members
     */
    public function actionMembers() {
           $status = 0;
           $pageSize= 100;
           if (!empty($_POST)) {
           $status = $_POST['res_filter'];
           }
            $dataProvider = new CActiveDataProvider('User', array(
            'criteria' => array(
                'condition' => ('role_id = "2" AND name != "admin" AND status= "'.$status.'"'), 'order' => 'id DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));

        $this->render('/user/members', array(
            'dataProvider' => $dataProvider,
        ));
    }
    
     public function actionChangeApprovalStatus() {
        if ($_REQUEST['id']) {
            $userprofileObject = User::model()->findByPk($_REQUEST['id']);
            if ($userprofileObject->status == 1) {
                $userprofileObject->status = 0;
            } else {
                $userprofileObject->status = 1;
            }
            $userprofileObject->save(false);
            $this->redirect(array('/admin/UserHasAccess/members', 'successMsg' => 1));
        }
    }
    
    /*
     * function to save access for admin users
     */
    
    

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
