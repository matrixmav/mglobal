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
                'actions' => array('index', 'memberaccess','members'),
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
    $emailObject = User::model()->findAll(array('condition'=>'role_id=2 AND name != "admin"'));
    $error ="";
    $success ="";
    $model = new UserHasAccess;
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
    $this->render('/user/member_access',array('emailObject'=>$emailObject,'error'=>$error,'success'=>$success));
    }
    
    /*
     * function to fetch members
     */
    public function actionMembers() {
           $pageSize= 100;
           $model = 
            $dataProvider = new CActiveDataProvider('User', array(
            'criteria' => array(
                'condition' => ('role_id = "2" AND name != "admin" '), 'order' => 'id DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));

        $this->render('/user/members', array(
            'dataProvider' => $dataProvider,
        ));
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
