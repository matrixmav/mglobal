<?php

class GenealogyController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='inner';
        public function init() {
            BaseClass::isLoggedIn();
        }
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
				'actions'=>array('index','view','binarycalculation'),
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
        
        public function actionBinaryCalculation(){
                $adminId = 1;   
                Yii::app()->session['totalLeftCount'] = "";
                Yii::app()->session['totalRightCount'] = "";
                 BaseClass::getBinaryTest(1);
                //Admin
                BaseClass::binaryCalculation($adminId,'left');
                BaseClass::binaryCalculation($adminId,'right');
                //total count
                echo "</br>Total Left Amount:".$tatalLeftAmount = Yii::app()->session['totalLeftCount'];
                echo "</br>Total Right Amount:".$tatalRightAmount = Yii::app()->session['totalRightCount'];
                //get minimum value
                $minimumAmount = min($tatalLeftAmount, $tatalRightAmount);
                //get the Maximum value
                $maximumAmount = max($tatalLeftAmount, $tatalRightAmount);
                //get the percentage
                $actualCommission = BaseClass::getPercentage($tatalLeftAmount+$tatalRightAmount, 10);
                //get carry forward amount
                $carryAmount = ($maximumAmount-$minimumAmount); 
                //insert in to database
                $binaryCommissionObject = BinaryCommissionTest::model()->findByAttributes(array('user_id'=>$adminId));
                if(!empty($binaryCommissionObject)){
                    $binaryCommissionObject->commission_amount = ($binaryCommissionObject->commission_amount+$actualCommission);
                    $binaryCommissionObject->carry_amount = $carryAmount;
                    $binaryCommissionObject->save(false);
                }
                
                $orderListObject = Order::model()->findAll(array('select'=>'t.user_id','distinct'=>true));
//                $orderListObject = BinaryCommissionTest::model()->findAll(array('select'=>'t.user_id','distinct'=>true));
                foreach($orderListObject as $orderObject) {
                    Yii::app()->session['totalLeftCount'] = "";
                    Yii::app()->session['totalRightCount'] = "";
                    if($orderObject->user_id == 1){
                        continue;
                    }
                    if($orderObject->user_id == 91){
                        continue;
                    }
                    $parentObject = BinaryCommissionTest::model()->findByAttributes(array('user_id'=>$orderObject->user_id));
                    if(empty($parentObject)) {
                        continue;
                    }
                    BaseClass::binaryCalculation($parentObject->parent,'left');
                    BaseClass::binaryCalculation($parentObject->parent,'right');
                    
//                    BaseClass::binaryCalculation($orderObject->user_id,'left');
//                    BaseClass::binaryCalculation($orderObject->user_id,'right');
                    //total count
                    $tatalLeftAmount = Yii::app()->session['totalLeftCount'];
                    $tatalRightAmount = Yii::app()->session['totalRightCount'];
                    //get minimum value
                    $minimumAmount = min($tatalLeftAmount, $tatalRightAmount);
                    //get the Maximum value
                    $maximumAmount = max($tatalLeftAmount, $tatalRightAmount);
                    $actualCommission = 0;
                    //get the percentage
                    $actualCommission = BaseClass::getPercentage($minimumAmount, 10);
                    //get carry forward amount
                    $carryAmount = ($minimumAmount-$maximumAmount); 
                    //insert in to database
                    $binaryCommissionObject = BinaryCommissionTest::model()->findByAttributes(array('user_id'=>$orderObject->user_id));
                    if(!empty($binaryCommissionObject)){
                        echo "*********************************".$binaryCommissionObject->user_id."*********************************";
                        $binaryCommissionObject->commission_amount = $actualCommission;
                        $binaryCommissionObject->carry_amount = $carryAmount;
                        $binaryCommissionObject->save(false);
                    }
                }
//                BaseClass::getBinaryTest(1);
                echo "done!!";
                    exit;
                
//                if($binaryCommissionObject){
                    echo "Binary Generated Successfully";exit;
//                }
            //}
            
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
		$model=new Genealogy;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Genealogy']))
		{
			$model->attributes=$_POST['Genealogy'];
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

		if(isset($_POST['Genealogy']))
		{
			$model->attributes=$_POST['Genealogy'];
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
	public function actionIndex(){  
           // print_r($_GET);
            if(!empty($_GET['id'])){            
                $currentUserId = $_GET['id'] ;        
                $genealogyLeftListObject = BaseClass::getGenoalogyTreeChild($currentUserId, "'left'");          
                $genealogyRightListObject = BaseClass::getGenoalogyTreeChild($currentUserId, "'right'");
                $this->render('view',array(
                            'genealogyLeftListObject'=>$genealogyLeftListObject,
                            'genealogyRightListObject'=>$genealogyRightListObject,
                            'currentUserId'=>$currentUserId
                ));
            }else{                
                $currentUserId = Yii::app()->session['userid'] ;        
                $genealogyLeftListObject = BaseClass::getGenoalogyTreeChild($currentUserId, "'left'");          
                $genealogyRightListObject = BaseClass::getGenoalogyTreeChild($currentUserId, "'right'");
                $this->render('view',array(
                            'genealogyLeftListObject'=>$genealogyLeftListObject,
                            'genealogyRightListObject'=>$genealogyRightListObject,
                            'currentUserId'=>$currentUserId
                ));
            }
           
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Genealogy('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Genealogy']))
			$model->attributes=$_GET['Genealogy'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Genealogy the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Genealogy::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Genealogy $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='genealogy-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionBinary(){
             
        }
}
