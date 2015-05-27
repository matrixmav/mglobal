<?php

class BuildTempController extends Controller
{
   
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='inner';

 	
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'templates','usertemplates','managewebsite','editheader','userinput'),
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
    
     public function actionIndex()
	{
		$this->render('index');
	}
        
        /*
         * Function to fetch templates
         */
        
        public function actionTemplates()
        {
            $builderObject = BuildTemp::model()->findAll(array('condition'=>'screenshot != ""'));
            Yii::app()->session['orderID'] = $_GET['id'];
            $this->render('templates',array('builderObject'=> $builderObject));
        }
        
        public function actionUserTemplates()
        {
            $builderObject = BuildTemp::model()->findByAttributes(array('template_id'=>'35'));
            
            $this->renderPartial('user_templates',array('builderObject'=> $builderObject));
        }
        
        public function actionManageWebsite()
        {
        $templateObject = new UserHasTemplate;
        $buildTempObject = new BuildTemp;
        if(!empty($_POST))
        {
           $buildertempObject = BuildTemp::model()->findByAttributes(array('template_id'=>$_POST['template_id']));
           $hasbuilderObject = UserHasTemplate::model()->findByAttributes(array('order_id'=>Yii::app()->session['orderID']));
           if($hasbuilderObject)
           {
           $hasbuilderObject->category_id = $buildertempObject->category_id;
           $hasbuilderObject->user_id =  $_POST['user_id'];
           $hasbuilderObject->template_id = $buildertempObject->template_id;
           $hasbuilderObject->temp_header = $buildertempObject->header->header_content;
           $hasbuilderObject->temp_body = $buildertempObject->body->body_content;
           $hasbuilderObject->temp_footer = $buildertempObject->footer->footer_content;
           $hasbuilderObject->order_id = Yii::app()->session['orderID'];
           $hasbuilderObject->publish = 0;
           $hasbuilderObject->created_at = date('Y-m-d');
           $hasbuilderObject->update(false);
           }else{
           $templateObject->category_id = $buildertempObject->category_id;
           $templateObject->user_id =  $_POST['user_id'];
           $templateObject->template_id = $buildertempObject->template_id;
           $templateObject->temp_header = $buildertempObject->header->header_content;
           $templateObject->temp_body = $buildertempObject->body->body_content;
           $templateObject->temp_footer = $buildertempObject->footer->footer_content;
           $templateObject->order_id = Yii::app()->session['orderID'];
           $templateObject->publish = 0;
           $templateObject->created_at = date('Y-m-d');
           $templateObject->save(false);
            }
         }
         
        $builderObjectz = UserHasTemplate::model()->findByAttributes(array('order_id'=>Yii::app()->session['orderID'],'user_id'=>Yii::app()->session['userid']));
        $builderObjectmeta = BuildTemp::model()->findByAttributes(array('template_id'=>$builderObjectz->template_id));
        $this->renderPartial('user_templates',array('builderObject'=> $builderObjectz,'edit'=>1,'builderObjectmeta'=>$builderObjectmeta));    
        }
    
        public function actionEditHeader() 
        {
        $builderObject = UserHasTemplate::model()->findByAttributes(array('order_id'=>Yii::app()->session['orderID'],'user_id'=>Yii::app()->session['userid']));
       
         if(!empty($_POST['Header']))
        {
          
          $builderObject->temp_header =  $_POST['Header']['header_content']; 
          $builderObject->update();
        }
        $this->render('editheader',array('builderObject'=> $builderObject)); 
        }   
        
        public function actionUserInput() 
        {
        $success = "";
        $error = "";
        $this->render('userinput',array('success'=> $success,'$error'=>$error));    
        }
        

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