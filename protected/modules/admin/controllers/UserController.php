<?php

class UserController extends Controller
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
				'actions'=>array('index','view','changestatus','wallet',
                                    'creditwallet','list','debitwallet','genealogy','add','deleteuser','edit','verificationapproval','testimonialapproval','changeapprovalstatus','testimonialapprovalstatus'),
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

        public function actionChangeStatus(){
            if($_REQUEST['id']) {
                $userObject = User::model()->findByPk($_REQUEST['id']);
                if($userObject->status == 1){
                    $userObject->status = 0;
                } else {
                    $userObject->status = 1;
                }
                $userObject->save(false);
                $this->redirect('/admin/user');
            }
            
        }

        public function actionGenealogy(){
             if(!empty($_GET)){            
                $currentUserId = $_GET['id'] ;        
                $genealogyListObject = BaseClass::getGenoalogyTree($currentUserId);          
                $this->render('viewGenealogy',array(
                            'genealogyListObject'=>$genealogyListObject,
                            'currentUserId'=>$currentUserId
                ));
            }else{                
                $currentUserId = 1 ;        
                $genealogyListObject = BaseClass::getGenoalogyTree($currentUserId);          
                $this->render('viewGenealogy',array(
                            'genealogyListObject'=>$genealogyListObject,
                            'currentUserId'=>$currentUserId
                ));
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
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
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

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
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
	 * Lists all models.
	 */
        public function actionIndex() {
            $model = new User;
            $pageSize = 10;
            $successMsg = "";
            
            $dataProvider=new CActiveDataProvider('User', array(
                        'pagination' => array('pageSize' => $pageSize),
            ));
            if(!empty($_POST['search'])) { 
                $dataProvider = CommonHelper::search(isset($_REQUEST['search'])?$_REQUEST['search']:"", $model, array('full_name','email','	phone','sponsor_id'), array(), isset($_REQUEST['selected'])?$_REQUEST['selected']:"");
            }
            $this->render('index',array(
                    'dataProvider'=>$dataProvider,'successMsg'=>$successMsg
            )); 
        }

        public function actionList(){
           $model = new User;
            $pageSize = 10;
            
            $dataProvider=new CActiveDataProvider('User', array(
                        'pagination' => array('pageSize' => $pageSize),
            ));
            if(!empty($_POST['search'])) { 
                $dataProvider = CommonHelper::search(isset($_REQUEST['search'])?$_REQUEST['search']:"", $model, array('full_name','email','	phone','sponsor_id'), array(), isset($_REQUEST['selected'])?$_REQUEST['selected']:"");
            }
            $this->render('index',array(
                    'dataProvider'=>$dataProvider,
            )); 
        }

        public function actionWallet() {
            
            $model = new Wallet;
            $pageSize = 10;
//           $roomObject = Wallet::model()->with('user')->findByAttributes(array('name'=>1,'status'=>1));
           
           
//            $roomOptionCondition = array('condition' => 'room_id =' . $roomId);
            
            $walletType = 1;//Cash wallet
            if(!empty($_POST['walletType'])){
                $walletType = $_POST['walletType'];
            }
            
           
             $dataProvider = new CActiveDataProvider($model, array(
                'criteria' => array(
                    'condition' => ('type = ' . $walletType . ' AND status = 1' ), 'order' => 'id DESC',
                ), 'pagination' => array('pageSize' => $pageSize),));
             
            if (!empty($_POST)) {
                $userObject = User::model()->findByAttributes(array('name'=>$_POST['search']));
                $condition = 'type = ' . $walletType ." AND status = 1";
                if(!empty($userObject)){
                    $condition = 'type = ' . $walletType . ' AND user_id = '. $userObject->id ." AND status = 1";
                }
                $dataProvider = new CActiveDataProvider($model, array(
                    'criteria' => array(
                    'condition' => ($condition), 'order' => 'id DESC',
                ), 'pagination' => array('pageSize' => $pageSize),));
            }
            
            $this->render('walletList',array(
                    'dataProvider'=>$dataProvider,
                    'walletType'=>$walletType
            ));
        }
        
        public function actionCreditWallet(){ 
            if($_POST) { 
                $userId = $_POST['userId'];
                $type = $_POST['wallet_type'];
                $fundAmount = $_POST['fund'];
                $walletObject = Wallet::model()->findByAttributes(array('user_id'=>$userId,'type'=>$type));
                if(!empty($walletObject)){
                  $fundAmount = ($fundAmount+$walletObject->fund);
                } else {
                    $walletObject = new Wallet;
                }
                $walletObject->user_id = $userId;
                $walletObject->fund = $fundAmount;
                $walletObject->type =$type;//fund added by admin
                $walletObject->status = 1;//success
                $walletObject->created_at = new CDbExpression('NOW()');
                $walletObject->updated_at = new CDbExpression('NOW()');
                if(!$walletObject->save()){
                    echo "<pre>"; print_r($walletObject->getErrors());exit;
                }
                $this->redirect('/admin/user/wallet');
            }
            $userId = $_GET['id'];
            $userObject = User::model()->findByPk($userId);
            $this->render('creditwallet',array('userObject'=>$userObject));
        }

        public function actionDebitWallet(){ 
            if($_POST) { 
                $userId = $_POST['userId'];
                $type = $_POST['wallet_type'];
                $fundAmount = $_POST['fund'];
                $walletObject = Wallet::model()->findByAttributes(array('user_id'=>$userId,'type'=>$type));
                if(!empty($walletObject)){
                  $fundAmount = ($walletObject->fund-$fundAmount);
                } else {
                    $walletObject = new Wallet;
                }
                $walletObject->user_id = $userId;
                $walletObject->fund = $fundAmount;
                $walletObject->type =$type;//fund added by admin
                $walletObject->status = 1;//success
                $walletObject->created_at = new CDbExpression('NOW()');
                $walletObject->updated_at = new CDbExpression('NOW()');
                if(!$walletObject->save()){
                    echo "<pre>"; print_r($walletObject->getErrors());exit;
                }
                $this->redirect('/admin/user/wallet');
            }
            $userId = $_GET['id'];
            $userObject = User::model()->findByPk($userId);
            $this->render('debitwallet',array('userObject'=>$userObject));
        }
        /**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        /*
         * Function to add multiple admin by superadmin
         */
        
        public function actionAdd()
        {
            $success = "";
            $error="";
            $countryObject = Country::model()->findAll();
            
            $this->render('user_add',array(
			'countryObject'=>$countryObject,'error'=>$error,'success'=>$success
		));
        }
        
       
         
         /*
          * Function to Delete Users from list
          */
         public function actionDeleteUser() {
           if($_REQUEST['id']) {
                $userObject = User::model()->findByPK($_REQUEST['id']);
                $userprofileObject = UserProfile::model()->findByAttributes(array('user_id'=>$_REQUEST['id']));
                $userObject->delete();
                if($userprofileObject)
                {
                $userprofileObject->delete();
                }
                $this->redirect(array('/admin/user/index','successMsg'=>2));
            }  
         }
         
         /*
          * Function to fetch verification document
          */
         
         public function actionVerificationApproval()
         {
            $model = new UserProfile();
            $pageSize = 10;
            $todayDate = date('Y-m-d');
            $fromDate = date('Y-m-d');
            $status = 1;
            if (!empty($_POST)) {
                $todayDate = $_POST['from'];
                $fromDate = $_POST['to'];
                $status = $_POST['res_filter'];
            }
            $dataProvider = new CActiveDataProvider($model, array(
	    				'pagination' => array('pageSize' => 10),
				));
             
            $this->render('verification_approval',array(
                    'dataProvider'=>$dataProvider,
            ));
              
         }
         
         public function actionChangeApprovalStatus() {
           if($_REQUEST['id']) {
                $userprofileObject = UserProfile::model()->findByPk($_REQUEST['id']);
                if($userprofileObject->document_status == 1){
                    $userprofileObject->document_status = 0;
                } else {
                    $userprofileObject->document_status = 1;
                }
                $userprofileObject->save(false);
                $this->redirect(array('/admin/user/verificationapproval','successMsg'=>1));
            }
         }
         /*
          * Function to fetch verification document
          */
         
         public function actionTestimonialApproval() {
             $model = new UserProfile();
            $pageSize = 10;
            $todayDate = date('Y-m-d');
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
            $this->render('testimonial_approval',array(
                    'dataProvider'=>$dataProvider,
            ));
              
         }
         
         
          public function actionTestimonialApprovalStatus() {
           if($_REQUEST['id']) {
                $userprofileObject = UserProfile::model()->findByPk($_REQUEST['id']);
                if($userprofileObject->testimonial_status == 1){
                    $userprofileObject->testimonial_status = 0;
                } else {
                    $userprofileObject->testimonial_status = 1;
                }
                $userprofileObject->save(false);
                $this->redirect(array('/admin/user/testimonialapproval','successMsg'=>1));
            }
         }



         /*
          * Function to update user records
          */
         public  function actionEdit()
         {
            
             $error ="";
             $success ="";
             if($_REQUEST['id']) {  
             $userObject = User::model()->findByPK($_REQUEST['id']); 
              $profileObject = UserProfile::model()->findByAttributes(array('user_id'=>$_REQUEST['id']));
           if($_REQUEST['id'] && $_POST) { 
               
           /*Updating User info*/
            $userObject->full_name = $_POST['UserProfile']['full_name'];
            $userObject->email = $_POST['UserProfile']['email'];
            $userObject->phone = $_POST['UserProfile']['phone'];
            $userObject->date_of_birth = $_POST['UserProfile']['date_of_birth'];
            $userObject->skype_id = $_POST['UserProfile']['skype_id'];
            $userObject->facebook_id = $_POST['UserProfile']['facebook_id'];
            $userObject->twitter_id = $_POST['UserProfile']['twitter_id'];
            $userObject->updated_at = new CDbExpression('NOW()');
            $userObject->update();
                
           /*Updating User profile data*/
                
                $profileObject->address = $_POST['UserProfile']['address'];
                $profileObject->street = $_POST['UserProfile']['street'];
                $profileObject->city_name = $_POST['UserProfile']['city_name'];
                $profileObject->state_name = $_POST['UserProfile']['state_name'];
                $profileObject->country_id = $_POST['UserProfile']['country_id'];
                $profileObject->zip_code = $_POST['UserProfile']['zip_code'];

                $profileObject->updated_at = new CDbExpression('NOW()');
                $profileObject->update();
                if($userObject->update() && $profileObject->update() )
                {
                  $this->redirect(array('/admin/user/index','successMsg'=>3));  
                }
           }
             }
           
           $countryObject = Country::model()->findAll();
            
            $this->render('user_edit',array(
			'countryObject'=>$countryObject,'error'=>$error,'success'=>$success,'userObject'=>$userObject,'profileObject'=>$profileObject
		));
             
         }


                 /**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function getOnClickEvent($data, $row){
            $fullName = "'".$data->name."'";
    echo '<a onclick="OpenChatBox('.$fullName.')">Click to chat</a>';
}
}
