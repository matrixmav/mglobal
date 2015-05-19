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
	public function actionIndex() {
            $model = new User();
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

            $this->render('index', array(
                'dataProvider' => $dataProvider,
            ));
        }

    public function actionAddress()
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
                'criteria' => array(
                    'condition' => ('created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '" AND status = "' . $status . '"' ), 'order' => 'id DESC',
                ), 'pagination' => array('pageSize' => $pageSize),));
            $this->render('address',array(
                    'dataProvider'=>$dataProvider,
            ));
	}
        
        public function actionVerification(){
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
            $this->render('verification',array(
                    'dataProvider'=>$dataProvider,
            ));
        }

        public function actionAdminSponsor()
	{  
            $model = new User();
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
                    'condition' => ('sponsor_id = 12345 AND created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '" AND status = "' . $status . '"' ), 'order' => 'id DESC',
                ), 'pagination' => array('pageSize' => $pageSize),));
            $this->render('adminsponsor',array(
                    'dataProvider'=>$dataProvider,
            ));
	}
        public function actionPackage()
	{
            $model = new Package();
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
           
            $this->render('package',array(
                    'dataProvider'=>$dataProvider,
            ));
	}
        public function actionSocialAccount()
	{   
            $model = new User();
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
                    'condition' => ('facebook_id != "" and twitter_id != ""  AND created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '" AND status = "' . $status . '"' ), 'order' => 'id DESC',
                ), 'pagination' => array('pageSize' => $pageSize),));
            
            $this->render('socialaccount',array(
                    'dataProvider'=>$dataProvider,
            ));
	}
        public function actionContact()
	{  
            $model = new Contact();
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
            $this->render('contact',array(
                    'dataProvider'=>$dataProvider,
            ));
	}
	
        protected function gridAddressImagePopup($data,$row)
	{ 	
            $bigImagefolder=Yii::app()->params->imagePath['varificationDoc'];// folder with uploaded files
            echo "<a data-toggle='modal' href='#zoom_$data->id'>$data->address_proff</a>".'<div class="modal fade" id="zoom_'.$data->id.'" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog" style="width:500px;">
                        <div class="modal-content">
                                <div class="modal-body" style="width: 500px;overflow: auto;height: 500px;padding: 0;">
                                         <img src="'.$bigImagefolder.$data->address_proff.'">
                                                         </div>
                            </div>
                        </div>
                </div>';
	}
        protected function gridIdImagePopup($data,$row)
	{ 	
            $bigImagefolder=Yii::app()->params->imagePath['varificationDoc'];// folder with uploaded files
            echo "<a data-toggle='modal' href='#zoom_$data->id'>$data->id_proof</a>".'<div class="modal fade" id="zoom_'.$data->id.'" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog" style="width:500px;">
                        <div class="modal-content">
                                <div class="modal-body" style="width: 500px;overflow: auto;height: 500px;padding: 0;">
                                         <img src="'.$bigImagefolder.$data->id_proof.'">
                                                         </div>
                            </div>
                        </div>
                </div>';
	}
}