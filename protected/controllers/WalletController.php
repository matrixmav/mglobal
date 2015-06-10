<?php

class WalletController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='inner';

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
				'actions'=>array('index','view','list','rpwallet','commisionwallet','fundwallet','countrpwallet','countcommisionwallet','countfundwallet'),
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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionList() {
        $loggedInUserId = Yii::app()->session['userid'];

        $dataProvider = new CActiveDataProvider('Wallet', array(
            'criteria' => array(
                'condition' => ('user_id = ' . $loggedInUserId), 'order' => 'id DESC',
        )));
        $this->render('list', array('dataProvider' => $dataProvider));
    }

    /**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Wallet;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Wallet']))
		{
			$model->attributes=$_POST['Wallet'];
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

		if(isset($_POST['Wallet']))
		{
			$model->attributes=$_POST['Wallet'];
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
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Wallet');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
        
        
         /*
         * this will fetch rp wallet
         */
        public function actionRpWallet()
        {
           $model = "MoneyTransfer";   
          $loggedInUserId = Yii::app()->session['userid'];
          $walletobject = Wallet::model()->findByAttributes(array('user_id'=>$loggedInUserId,'type'=>2));
          if($walletobject)
           {
               $wid = $walletobject->id;
           }else{
             $wid = 0;  
           }
           $pageSize = Yii::app()->params['defaultPageSize'];
           $todayDate = date('Y-m-d');
           $fromDate = date('Y-m-d');
           if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            
            $dataProvider = new CActiveDataProvider($model, array(
                'criteria' => array(
                    'condition' => ('to_user_id = '.$loggedInUserId. ' OR from_user_id = '.$loggedInUserId.' AND wallet_id='.$wid.' AND created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '"' ), 'order' => 'id DESC',
                ), 'pagination' => array('pageSize' => 10),
            ));
        } else {

            $dataProvider = new CActiveDataProvider($model, array(
                'criteria' => array(
                    'condition' => ('to_user_id = '.$loggedInUserId. ' OR from_user_id = '.$loggedInUserId.' AND wallet_id='.$wid.' AND created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '"'), 'order' => 'id DESC',
                ),
                'pagination' => array('pageSize' => $pageSize),
            ));
        }
          /*$dataProvider = new CActiveDataProvider('MoneyTransfer',array(

                                        'criteria'=>array(
                                                        'condition'=> ('to_user_id = '.$loggedInUserId. ' OR from_user_id = '.$loggedInUserId.' AND wallet_id='.$wid),'order'=>'id DESC',
                                        )));*/
          
          
            $this->render('rpwallet',array('dataProvider'=>$dataProvider));
        }
        
         /*
         * this will fetch commision wallet
         */
        public function actionCommisionWallet()
        {
           $model = "MoneyTransfer";   
          $loggedInUserId = Yii::app()->session['userid'];
          $walletobject = Wallet::model()->findByAttributes(array('user_id'=>$loggedInUserId,'type'=>3));
          if($walletobject)
           {
               $wid = $walletobject->id;
           }else{
             $wid = 0;  
           }
           $pageSize = Yii::app()->params['defaultPageSize'];
           $todayDate = date('Y-m-d');
           $fromDate = date('Y-m-d');
           if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            
            $dataProvider = new CActiveDataProvider($model, array(
                'criteria' => array(
                    'condition' => ('to_user_id = '.$loggedInUserId. ' OR from_user_id = '.$loggedInUserId.' AND wallet_id='.$wid.' AND created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '"' ), 'order' => 'id DESC',
                ), 'pagination' => array('pageSize' => 10),
            ));
        } else {

            $dataProvider = new CActiveDataProvider($model, array(
                'criteria' => array(
                    'condition' => ('to_user_id = '.$loggedInUserId. ' OR from_user_id = '.$loggedInUserId.' AND wallet_id='.$wid.' AND created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '"'), 'order' => 'id DESC',
                ),
                'pagination' => array('pageSize' => $pageSize),
            ));
        }
            $this->render('commisionwallet',array('dataProvider'=>$dataProvider));
        }
        
         /*
         * this will fetch fund wallet
         */
        public function actionFundWallet()
        {
            $model = "MoneyTransfer";   
          $loggedInUserId = Yii::app()->session['userid'];
          $walletobject = Wallet::model()->findByAttributes(array('user_id'=>$loggedInUserId,'type'=>1));
          if($walletobject)
           {
               $wid = $walletobject->id;
           }else{
             $wid = 0;  
           }
           $pageSize = Yii::app()->params['defaultPageSize'];
           $todayDate = date('Y-m-d');
           $fromDate = date('Y-m-d');
           if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            
            $dataProvider = new CActiveDataProvider($model, array(
                'criteria' => array(
                    'condition' => ('to_user_id = '.$loggedInUserId. ' OR from_user_id = '.$loggedInUserId.' AND wallet_id='.$wid.' AND created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '"' ), 'order' => 'id DESC',
                ), 'pagination' => array('pageSize' => 10),
            ));
           } else {

            $dataProvider = new CActiveDataProvider($model, array(
                'criteria' => array(
                    'condition' => ('to_user_id = '.$loggedInUserId. ' OR from_user_id = '.$loggedInUserId.' AND wallet_id='.$wid.' AND created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '"'), 'order' => 'id DESC',
                ),
                'pagination' => array('pageSize' => $pageSize),
            ));
        }
            $this->render('fundwallet',array('dataProvider'=>$dataProvider));
        
        }
        
        
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Wallet('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Wallet']))
			$model->attributes=$_GET['Wallet'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Wallet the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Wallet::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Wallet $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='wallet-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
