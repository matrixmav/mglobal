<?php

class ReportController extends Controller
{
    /**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','address','wallet',
                                    'creditwallet','package','adminsponsor','verification',
                                    'socialaccount','contact'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionIndex()
	{
            $model = new User();
            $pageSize = 10;
            $dataProvider=new CActiveDataProvider($model, array(
                        'pagination' => array('pageSize' => $pageSize),
            ));
            if(!empty($_POST['search'])) { 
                $dataProvider = CommonHelper::search(isset($_REQUEST['search'])?$_REQUEST['search']:"", $model, array('full_name','email','	phone','sponsor_id'), array(), isset($_REQUEST['selected'])?$_REQUEST['selected']:"");
            }
            $this->render('index',array(
                    'dataProvider'=>$dataProvider,
            ));
	}
        public function actionAddress()
	{
            $model = new UserProfile();
            $pageSize = 10;
            
            $testObject = UserProfile::model()->findAll();
            $dataProvider=new CActiveDataProvider($model, array(
                        'pagination' => array('pageSize' => $pageSize),
            ));
            if(!empty($_POST['search'])) { 
                $dataProvider = CommonHelper::search(isset($_REQUEST['search'])?$_REQUEST['search']:"", $model, array('full_name','email','	phone','sponsor_id'), array(), isset($_REQUEST['selected'])?$_REQUEST['selected']:"");
            }
            $this->render('address',array(
                    'dataProvider'=>$dataProvider,
            ));
	}
        
        public function actionVerification(){
            $model = new UserProfile();
            $pageSize = 10;
            
            $dataProvider=new CActiveDataProvider($model, array(
                        'pagination' => array('pageSize' => $pageSize),
            ));
            if(!empty($_POST['search'])) { 
                $dataProvider = CommonHelper::search(isset($_REQUEST['search'])?$_REQUEST['search']:"", $model, array('full_name','email','	phone','sponsor_id'), array(), isset($_REQUEST['selected'])?$_REQUEST['selected']:"");
            }
            $this->render('verification',array(
                    'dataProvider'=>$dataProvider,
            ));
        }

        public function actionAdminSponsor()
	{  
            $model = new User();
            $pageSize = 10;

            $dataProvider = new CActiveDataProvider('User',array(
                    'criteria'=>array(
                                    'condition'=> ('sponsor_id = 12345 and status = 1'  ),'order'=>'id DESC'),
                                    'pagination' => array('pageSize' => $pageSize),
                    ));
            if(!empty($_POST['search'])) { 
                $dataProvider = CommonHelper::search(isset($_REQUEST['search'])?$_REQUEST['search']:"", $model, array('full_name','email','phone','sponsor_id'), array(), isset($_REQUEST['selected'])?$_REQUEST['selected']:"");
            }
            $this->render('adminsponsor',array(
                    'dataProvider'=>$dataProvider,
            ));
	}
        public function actionPackage()
	{
            $model = new Package();
            $pageSize = 10;
            $dataProvider=new CActiveDataProvider($model, array(
                        'pagination' => array('pageSize' => $pageSize),
            ));
           
            $this->render('package',array(
                    'dataProvider'=>$dataProvider,
            ));
	}
        public function actionSocialAccount()
	{  
            $model = new User();
            $pageSize = 10;

            $dataProvider = new CActiveDataProvider('User',array(
                    'criteria'=>array(
                                    'condition'=> ('sponsor_id = 12345 and status = 1'  ),'order'=>'id DESC'),
                                    'pagination' => array('pageSize' => $pageSize),
                    ));
            if(!empty($_POST['search'])) { 
                $dataProvider = CommonHelper::search(isset($_REQUEST['search'])?$_REQUEST['search']:"", $model, array('full_name','email','phone','sponsor_id'), array(), isset($_REQUEST['selected'])?$_REQUEST['selected']:"");
            }
            $this->render('socialaccount',array(
                    'dataProvider'=>$dataProvider,
            ));
	}
        public function actionContact()
	{  
            $model = new Contact();
            $pageSize = 10;

            $dataProvider = new CActiveDataProvider('Contact',array(
                    'criteria'=>array(
                                    'condition'=> ('s+tatus = 1'  ),'order'=>'id DESC'),
                                    'pagination' => array('pageSize' => $pageSize),
                    ));
            if(!empty($_POST['search'])) { 
                $dataProvider = CommonHelper::search(isset($_REQUEST['search'])?$_REQUEST['search']:"", $model, array('full_name','email','phone','sponsor_id'), array(), isset($_REQUEST['selected'])?$_REQUEST['selected']:"");
            }
            $this->render('contact',array(
                    'dataProvider'=>$dataProvider,
            ));
	}
	
}