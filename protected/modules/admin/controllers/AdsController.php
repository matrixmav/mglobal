<?php

class AdsController extends Controller
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
				'actions'=>array('index','view','add','changestatus','edit'),
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

        
        /**
	 * Lists all models.
	 */
	public function actionIndex(){   
            $pageSize= 10;
            $dataProvider = new CActiveDataProvider('Ads', array(
                        'pagination' => array('pageSize' => $pageSize)));
            
            $this->render('index',array(
                'dataProvider'=>$dataProvider,
            ));           
            
	}
        
        /*  Add ads code start here */
        public function actionAdd(){            
         
            $error = "";
            $success = "";
            $baseURL = Yii::app()->getBaseUrl(true);
            
            if ($_POST) {
                $banner = time() . $_FILES['ads_banner']['name'];
                if ($_FILES) {
                    $ext1 = end((explode(".", $banner)));

                    if($ext1 != "jpg" && $ext1 != "png" && $ext1 != "jpeg" ){
                        $error = "Please upload mentioned file type.";
                    }else{                            
                        $path = Yii::getPathOfAlias('webroot'). "/upload/banner/";
                        BaseClass::uploadFile($_FILES['ads_banner']['tmp_name'], $path, time().$_FILES['ads_banner']['name']);
                        $serverPath =  $baseURL . "/upload/banner/";
                        
                        
                        $model = new Ads;
                        $model->attributes = $_POST;                        
                        $model->banner =  $banner;
                        $model->name = $_POST['ads_name'] ;
                        $model->description = $_POST['ads_desc'] ;
                        $model->created_at = date('Y-m-d') ;                              
                        $model->get_code = '<p><img src='.$serverPath.$banner.' height=100 width=100></p>' ;      
                        $model->status = 1 ;                        
                        $success = "<p class='success'>Banner Added Successfully</p>";
                        if(!$model->save(false)){
                            echo "<pre>"; print_r($model->getErrors());exit;
                        }
                    }
                }else{
                    $error = "Please fill required(*) marked fields.";
                }
            }
            $this->render('add', array('success' => $success, 'error' => $error));
        }
        
        
        protected function gridBannerImage($data,$row){ 	
            $bigImagefolder= '/upload/banner/';// folder with uploaded files
            echo "<a data-toggle='modal' href='#zoom_$data->id'>$data->banner</a>".'<div class="modal fade" id="zoom_'.$data->id.'" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog" style="width:500px;">
                    <div class="modal-content">
                        <div class="modal-body" style="width: 500px;overflow: auto;height: 500px;padding: 0;">
                            <img src="'.$bigImagefolder.$data->banner.'">
                        </div>
                    </div>
                </div>
            </div>';
	}
        
        public function actionChangeStatus() {
           if($_REQUEST['id']) {               
                $userprofileObject = Ads::model()->findByPk($_REQUEST['id']);
                if($userprofileObject->status == 1){
                    $userprofileObject->status = 0;
                } else {
                    $userprofileObject->status = 1;
                }
                $userprofileObject->save(false);
                $this->redirect(array('index','successMsg'=>1));
            }
         }
        
        /* Update data*/ 
        public function actionEdit(){
            if($_REQUEST['id']) {                   
                $adsObject = Ads::model()->findByPk($_REQUEST['id']);
                
                $error = "";
                $success = "";
                if ($_POST) {
                    
                    $pageSize= 10;
                    $dataProvider = new CActiveDataProvider('Ads', array(
                                'pagination' => array('pageSize' => $pageSize)));
                    
                    $banner = "";
                    if(isset($_FILES['ads_banner']['name'])){
                        $banner = time() . $_FILES['ads_banner']['name'];                   
                        $ext1 = end((explode(".", $banner)));
                        
                        if($ext1 != "jpg" && $ext1 != "png" && $ext1 != "jpeg" ){
                            $error = "Please upload mentioned file type.";
                        }else{
                            $path = Yii::getPathOfAlias('webroot') . "/upload/banner/";
                            BaseClass::uploadFile($_FILES['ads_banner']['tmp_name'], $path, time() . $_FILES['ads_banner']['name']);
                            $adsObject->banner =  $banner;
                            $adsObject->get_code = '<p><img src='.$path.$banner.' height=100 width=100></p>' ;
                        }
                    }
                    
                    $adsObject->attributes = $_POST;                        
                    $adsObject->name = $_POST['ads_name'] ;
                    $adsObject->description = $_POST['ads_desc'] ;                    
                    $successMsg = 1 ;
                    if(!$adsObject->update(false)){
                        echo "<pre>"; print_r($model->getErrors());exit;
                    }
                    $this->redirect('index?successMsg='.$successMsg,array('dataProvider'=>$dataProvider ));
                }               
                $this->render('edit',array('adsObject' => $adsObject));
            }
            
        } 


         
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Ads;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ads']))
		{
			$model->attributes=$_POST['Ads'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ads']))
		{
			$model->attributes=$_POST['Ads'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Ads('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ads']))
			$model->attributes=$_GET['Ads'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ads the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ads::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ads $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ads-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
