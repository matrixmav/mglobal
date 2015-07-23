<?php

class UserController extends Controller {

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
                'actions' => array('index', 'view', 'changestatus', 'wallet',
                    'creditwallet', 'list', 'debitwallet', 'genealogy', 'add', 'deleteuser', 'edit',
                    'verificationapproval', 'testimonialapproval', 'changeapprovalstatus', 
                    'testimonialapprovalstatus','binarycalculation','resetpassword','binarymail','dashboard'),
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

    public function actionChangeStatus() {
        if ($_REQUEST['id']) {
            $userObject = User::model()->findByPk($_REQUEST['id']);
            if(!empty($userObject) && $userObject->role_id==1)
            {
            if ($userObject->status == 1) {
                $userObject->status = 0;
                $userObject->save(false);
                Yii::app()->user->setFlash('success', "User status changed to Inactive!.");
            } else {
                $masterPin = BaseClass::getUniqInt(5);
                $password = BaseClass::getPassword();
                $userObject->password = md5($password);
                $userObject->master_pin = md5($masterPin);
                $userObject->status = 1;
                $userObject->save(false);
                
                
                
                /*array created for mailing values*/
                
                $userObjectArr = array();
                $userObjectArr['name'] = $userObject->name;
                $userObjectArr['full_name'] = $userObject->full_name;
                $userObjectArr['password'] = $password;
                $userObjectArr['masterPin'] = $masterPin;
                /*code to send mail */ 
                
                $config['to'] = $userObject->email;
                $config['subject'] = 'Login Details';
                $config['body'] =  $this->renderPartial('/mailTemplate/login-details', array('userObjectArr'=>$userObjectArr),true);
                CommonHelper::sendMail($config);
            }
            }else{
             if ($userObject->status == 1) {
                $userObject->status = 0;
                $userObject->save(false);
                Yii::app()->user->setFlash('success', "User status changed to Inactive!.");
            } else {
                 $userObject->status = 1;
                $userObject->save(false);   
            }
            }
                Yii::app()->user->setFlash('success', "User status changed to Active!.");
                
           
           $this->redirect('/admin/user');
        }
    }
    
    public function actionDashboard() {
       
      $transactionActiveObject = Order::model()->findAll(array('condition' => 'status= 1'));
      $activeCount = count($transactionActiveObject);
      
      $transactionInactiveObject = Order::model()->findAll(array('condition' => 'status= 0 '));
      $InactiveCount = count($transactionInactiveObject);
      
      $total =  $activeCount +  $InactiveCount;
      
      $userObject = User::model()->findAll(array('condition' => 'sponsor_id= "admin"'));
      $userCount = count($userObject);
      $userDate = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d") - 7, date("Y")));
      $userObject1 = User::model()->findAll(array('condition' => 'created_at BETWEEN "'.date('Y-m-d').'" AND '.$userDate));
      
      $str=  '';
      for($i = 1; $i < 7; $i++)
      {
       $j =  $i*7;   
       
       $date = date('Y-m-d', mktime(0, 0, 0, date("m") , date("d") - $j, date("Y")));
       
       $date2 = date('Y-m-d', mktime(0, 0, 0, date("m") , date("d") - 14, date("Y")));
       
       $date1 = date('d/m/y', mktime(0, 0, 0, date("m") , date("d") - $j, date("Y")));
       
       $userObject = User::model()->findAll(array('condition' => 'created_at BETWEEN "'.$date.'" AND "'.$date2.'"'));
       
         $str .= "['".$date1."', ".count($userObject)."],";
              
      }
      $strFinal = rtrim("['".$date = date('d-m-y')."', ".count($userObject1)."],".$str,',');
      
      /*code to fetch package code*/
       $strMonth = '';
       for($i = 1; $i < 10; $i++)
       {
           
        $dateP = date('m', mktime(0, 0, 0, date("m")-$i , date("d"), date("Y")));
        
        $datePStr = date('M', mktime(0, 0, 0, date("m")-$i , date("d"), date("Y")));
        
        $dateCureent = date('m', mktime(0, 0, 0, date("m") , date("d"), date("Y")));
        
        $packageObject1 = Order::model()->findAll(array('condition' => 'MONTH(created_at) = "'.$dateP.'"'));
        
        $packageObjectCurrent = Order::model()->findAll(array('condition' => 'MONTH(created_at) = "'.$dateCureent.'"'));
        
        $strMonth .= "['".$datePStr."', ".count($packageObject1)."],";
                   
       } 
       
        $packageStr = rtrim("['".$date = date('M')."', ".count($packageObjectCurrent)."],".$strMonth,',');
      
        $this->render('/user/dashboard',array('activeCount'=>$activeCount,'InactiveCount'=> $InactiveCount,'total'=>$total,'userCount'=>$userCount,'str'=>$strFinal,'packageStr'=>$packageStr));
    }

    
    public function actionBinaryCalculation() {        
        
        $adminId = 1;
        $parentObject = Genealogy::model()->findByAttributes(array('user_id' => $adminId)); 
        $parentObject = BaseClass::setPurchaseNode($parentObject);       
        if($parentObject){
            $currentUserId = Yii::app()->session['userid'] ;        
            $genealogyLeftListObject = BaseClass::getGenoalogyTreeChild($currentUserId, "'left'");          
            $genealogyRightListObject = BaseClass::getGenoalogyTreeChild($currentUserId, "'right'");
             
               
            $this->render('viewGenealogy',array(
                        'genealogyLeftListObject'=>$genealogyLeftListObject,
                        'genealogyRightListObject'=>$genealogyRightListObject,
                        'currentUserId'=>$currentUserId,
                        'msg'=> "Binary Calculaton Generated Successfully."
            ));

            
        }
    }
    
   
    public static function binaryMail($parentObject) {
                $userObject = User::model()->findByPk($parentObject->user_id);
                $userObjectArr = array();
                $userObjectArr['to_name'] = $userObject->full_name;
                $userObjectArr['user_name'] = $userObject->name;
                $config['to'] = $userObject->email;
                $config['subject'] = 'Binary Income Credited';
                $config['body'] =  Yii::app()->controller->renderPartial('//mailTemp/binary_commission', array('userObjectArr'=>$userObjectArr),true);
                CommonHelper::sendMail($config); 
                return 1;
    }
        

   
    public function actionGenealogy() {
        $emailObject = User::model()->findAll(array('condition' => 'sponsor_id = "admin"'));

//        if (!empty($_GET)) {
//            $currentUserId = $_GET['id'];
//            $userObject = User::model()->findByPK($currentUserId);
//
//            $genealogyListObject = BaseClass::getGenoalogyTree($currentUserId);
//            $this->render('viewGenealogy', array(
//                'genealogyListObject' => $genealogyListObject,
//                'currentUserId' => $currentUserId,
//                'userObject' => $userObject,
//                'emailObject' => $emailObject
//            ));
//        } else {
//            $currentUserId = 1;
//            $userObject = User::model()->findByPK($currentUserId);
//            $genealogyListObject = BaseClass::getGenoalogyTree($currentUserId);
//            $this->render('viewGenealogy', array(
//                'genealogyListObject' => $genealogyListObject,
//                'currentUserId' => $currentUserId,
//                'userObject' => $userObject,
//                'emailObject' => $emailObject
//            ));
//        }
        
            if(!empty($_GET['id'])){            
                    $currentUserId = $_GET['id'] ;        
                    $genealogyLeftListObject = BaseClass::getGenoalogyTreeChild($currentUserId, "'left'");          
                    $genealogyRightListObject = BaseClass::getGenoalogyTreeChild($currentUserId, "'right'");
                    $this->render('viewGenealogy',array(
                                'genealogyLeftListObject'=>$genealogyLeftListObject,
                                'genealogyRightListObject'=>$genealogyRightListObject,
                                'currentUserId'=>$currentUserId
                    ));
                }else{                
                    $currentUserId = Yii::app()->session['userid'] ;        
                    $genealogyLeftListObject = BaseClass::getGenoalogyTreeChild($currentUserId, "'left'");          
                    $genealogyRightListObject = BaseClass::getGenoalogyTreeChild($currentUserId, "'right'");
                    $this->render('viewGenealogy',array(
                                'genealogyLeftListObject'=>$genealogyLeftListObject,
                                'genealogyRightListObject'=>$genealogyRightListObject,
                                'currentUserId'=>$currentUserId
                    ));
                }
        
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new User;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new User;
        $pageSize = Yii::app()->params['defaultPageSize'];
        $successMsg = "";

        $dataProvider = new CActiveDataProvider('User', array(
            'criteria' => array(
                'condition' => ('name != "admin"'), 'order' => 'id DESC',
            ), 'pagination' => array('pageSize' => $pageSize),
        ));

        $selected = null;
        if (!empty($_POST['search'])) {
            if (strtolower($_POST['search']) == 'active') {
                $selected = "status_active";
            }
            if (strtolower($_POST['search']) == 'inactive') {
                $selected = "status_inactive";
            }            

            //$dataProvider = CommonHelper::search(isset($_REQUEST['search']) ? $_REQUEST['search'] : "", $model, array('full_name', 'email', 'phone', 'sponsor_id', 'status'), array(), isset($_REQUEST['selected']) ? $_REQUEST['selected'] : "");
            $dataProvider = CommonHelper::search(isset($_REQUEST['search']) ? $_REQUEST['search'] : "", $model, array('full_name', 'email', 'phone', 'sponsor_id'), array(), isset($selected) ? $selected : "");
        }
        $this->render('index', array(
            'dataProvider' => $dataProvider, 'successMsg' => $successMsg
        ));
    }

    public function actionList() {
        $model = new User;
        $pageSize = 10;

        $dataProvider = new CActiveDataProvider('User', array(
            'pagination' => array('pageSize' => $pageSize),
        ));
        if (!empty($_POST['search'])) {
            $dataProvider = CommonHelper::search(isset($_REQUEST['search']) ? $_REQUEST['search'] : "", $model, array('full_name', 'email', '	phone', 'sponsor_id'), array(), isset($_REQUEST['selected']) ? $_REQUEST['selected'] : "");
        }
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionWallet() {

        $model = new Wallet;
        $pageSize = 100;
//           $roomObject = Wallet::model()->with('user')->findByAttributes(array('name'=>1,'status'=>1));
//            $roomOptionCondition = array('condition' => 'room_id =' . $roomId);

        $walletType = "";
        //Cash wallet
        if (!empty($_POST['walletType'])) {
             $walletType = $_POST['walletType'];
        if($walletType !='')
        {
            $wallet = 'type = "'.$walletType.'"';
        }else{
            $wallet = 'type IN (1,2,3)'; 
        }   
        $dataProvider = new CActiveDataProvider($model, array(
            'criteria' => array(
                'condition' => ($wallet.'AND status = 1' ), 'order' => 'id DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));
        }  
            $dataProvider = new CActiveDataProvider($model, array(
            'criteria' => array(
                'condition' => ('type IN (1,2,3) AND status = 1' ), 'order' => 'id DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));    
            
         
        if (!empty($_POST)) {
            $walletType = $_POST['walletType'];
        if($walletType !='')
        {
            $wallet = 'type = "'.$walletType.'"';
        }else{
            $wallet = 'type IN (1,2,3)'; 
        }   
            $userObject = "";
          if(!empty($_POST['search']))
          {
            $userObject = User::model()->findByAttributes(array('name' => $_POST['search']));
          }          
            $condition = $wallet. " AND status = 1";
            if (!empty($userObject)) {
                $condition = $wallet.' AND user_id = ' . $userObject->id . " AND status = 1";
            }
  
            $dataProvider = new CActiveDataProvider($model, array(
                'criteria' => array(
                    'condition' => ($condition), 'order' => 'id DESC',
                ), 'pagination' => array('pageSize' => $pageSize),));
        }
        //print_r($dataProvider); exit;
        $this->render('walletList', array(
            'dataProvider' => $dataProvider,
            'walletType' => $walletType
        ));
    }

    public function actionCreditWallet() { 
        $error = "";
        if ($_POST) {
            $userId = $_POST['userId'];
           if($userId != 0)
           {
            $userObject = User::model()->findByPk($userId);
            $type = $_POST['walletId'];
            $fundAmount = $_POST['paid_amount'];
            $postDataArray = $_POST;
            $transactionObject = Transaction::model()->createTransaction($postDataArray, $userObject,'admin');
            $transactionObject = Transaction::model()->findByPk($transactionObject->id);
            
            
            
            /*user wallet object*/
            $walletObject = Wallet::model()->findByAttributes(array('user_id' => $userId, 'type' => $type));
            
            if (!empty($walletObject)) {
                $fundAmount = ($fundAmount + $walletObject->fund);
                $walletObject->fund = $fundAmount;
                $walletObject->update();
            } else {
                $walletObject = Wallet::model()->create($userId,$fundAmount,$type);
            }
            $postDataArray['walletId'] = $walletObject->id;
            $adminWalletObject = Wallet::model()->findByAttributes(array('user_id' => 1, 'type' => $type));
            $postDataArray['toWalletId'] = $adminWalletObject->id;
            $moneyTransferObject = MoneyTransfer::model()->createMoneyTransfer($postDataArray, $userObject, $transactionObject->id, $transactionObject->paid_amount,'admin');
            $toUserObjectMail = User::model()->findByPK($moneyTransferObject->to_user_id);
            
             try{
             /*user wallet object*/
              $adminWalletObject = Wallet::model()->findByAttributes(array('user_id' => Yii::app()->session['userid'], 'type' => $type));
              if(!empty($adminWalletObject))
              {
                 if($userId != '1'){
                 $adminWalletObject->fund = ($adminWalletObject->fund) - ($transactionObject->paid_amount);
                 $adminWalletObject->update(false);
                 }
             }}catch (Exception $ex) {
                    $ex->getMessage();
                    exit;
                }
                $userObjectArr['to_name'] = $toUserObjectMail->name;
                $userObjectArr['full_name'] = $toUserObjectMail->full_name;
                $userObjectArr['from_name'] = 'Super Admin';
                $userObjectArr['date'] = $transactionObject->created_at;
                $userObjectArr['fund'] = $transactionObject->paid_amount;
                $userObjectArr['transactionId'] = $transactionObject->transaction_id;
                /*mail to user*/
                $config['to'] = $toUserObjectMail->email;
                $config['subject'] = 'Fund Transfered';
                $config['body'] =  $this->renderPartial('../mailTemplate/fund_transfer', array('userObjectArr'=>$userObjectArr),true);
                CommonHelper::sendMail($config);
            
            $this->redirect('/admin/user/wallet?successmsg=1');
        }else{
            $error .= "User does not exist.";
        }
        }
        
        if(!empty($_GET))
        {
        $userId = $_GET['id'];
        }else{
         $userId = 0;   
        }
        $userObject = User::model()->findByPk($userId);
        
        $this->render('creditwallet', array('userObject' => $userObject,'error'=>$error));
    }

    public function actionDebitWallet() {
        if ($_POST) {
            $userId = $_POST['userId'];
            $userObject = User::model()->findByPk($userId);
            $type = $_POST['walletId'];
            $fundAmount = $_POST['paid_amount'];
            if($_POST['comment']== '')
            {
               $_POST['comment'] = 'Fund deducted by admin'; 
            }
            $postDataArray = $_POST;
             
            $transactionObject = Transaction::model()->createTransaction($postDataArray, $userObject,'admin');
            $transactionObject = Transaction::model()->findByPk($transactionObject->id);
            $walletObject = Wallet::model()->findByAttributes(array('user_id' => $userId, 'type' => $type));
            $adminWalletObject = Wallet::model()->findByAttributes(array('user_id' => 1, 'type' => $type));
            $postDataArray['toWalletId'] = $adminWalletObject->id;
            if (!empty($walletObject)) {
                $fundAmount = ($walletObject->fund - $fundAmount);
                $postDataArray['walletId'] = $walletObject->id;
                
                $moneyTransferObject = MoneyTransfer::model()->createMoneyTransfer($postDataArray, $userObject, $transactionObject->id, $transactionObject->paid_amount,'admin');
             
            } else {
                $walletObject = new Wallet;
            }
            
            $walletObject->user_id = $userId;
            $walletObject->fund = $fundAmount;
            $walletObject->type = $type; //fund added by admin
            $walletObject->status = 1; //success
            $walletObject->created_at = new CDbExpression('NOW()');
            $walletObject->updated_at = new CDbExpression('NOW()');
            if (!$walletObject->save()) {
                echo "<pre>";
                print_r($walletObject->getErrors());
                exit;
                var_dump($postDataArray);exit;
             $moneyTransferObject = MoneyTransfer::model()->createMoneyTransfer($postDataArray, $userObject, $transactionObject->id, $transactionObject->paid_amount,'admin');
                
            }
            try{
             /*user wallet object*/
              $adminWalletObject = Wallet::model()->findByAttributes(array('user_id' => Yii::app()->session['userid'], 'type' => $type));
              if(!empty($adminWalletObject))
              {
                 $adminWalletObject->fund = ($adminWalletObject->fund) + ($transactionObject->paid_amount);
                 $adminWalletObject->update(false);
             }}catch (Exception $ex) {
                    $ex->getMessage();
                    exit;
                }
                $userObjectArr = array();
                $toUserObjectMail = User::model()->findByPK($moneyTransferObject->to_user_id);
                $userObjectArr['to_name'] = $toUserObjectMail->name;
                $userObjectArr['full_name'] = $toUserObjectMail->full_name;
                $userObjectArr['from_name'] = 'Super Admin';
                $userObjectArr['date'] = $transactionObject->created_at;
                $userObjectArr['fund'] = $transactionObject->paid_amount;
                $userObjectArr['transactionId'] = $transactionObject->transaction_id;
                 
                /*mail to user*/
                $config['to'] = $toUserObjectMail->email;
                $config['subject'] = 'Fund Deducted';
                $config['body'] =  $this->renderPartial('../mailTemplate/fund_transfer', array('userObjectArr'=>$userObjectArr),true);
                CommonHelper::sendMail($config);
              $this->redirect('/admin/user/wallet?successmsg=2');
        }
        $userId = $_GET['id'];
        $userObject = User::model()->findByPk($userId);
        $this->render('debitwallet', array('userObject' => $userObject));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return User the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /*
     * Function to add multiple admin by superadmin
     */

    public function actionAdd1() {
        $success = "";
        $error = "";
        $countryObject = Country::model()->findAll();

        $this->render('user_add', array(
            'countryObject' => $countryObject, 'error' => $error, 'success' => $success
        ));
    }

    /*
     * Function to Delete Users from list
     */

    public function actionDeleteUser() {
        if ($_REQUEST['id']) {
            $userObject = User::model()->findByPK($_REQUEST['id']);
            $userprofileObject = UserProfile::model()->findByAttributes(array('user_id' => $_REQUEST['id']));
            $userObject->delete();
            if ($userprofileObject) {
                $userprofileObject->delete();
            }
            $this->redirect(array('/admin/user/index', 'successMsg' => 2));
        }
    }

    /*
     * Function to fetch verification document
     */

    public function actionVerificationApproval() {
        $model = new UserProfile();
        $pageSize = Yii::app()->params['defaultPageSize'];
        $todayDate = date('Y-m-d');
        $fromDate = date('Y-m-d');
        $status = "0";
        if (!empty($_POST) && $_POST['res_filter'] != '') {

            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            $status = $_POST['res_filter'];
              if($status  != 'all')
            {
              $cond = 'updated_at >= "' . $todayDate . '" AND updated_at <= "' . $fromDate .'" AND document_status = "' . $status . '" AND id_proof != "" AND address_proff != ""';
            }else{
              $cond = 'updated_at >= "' . $todayDate . '" AND updated_at <= "' . $fromDate .'" AND document_status IN (1,0) AND id_proof != "" AND address_proff != ""';
            }
             
            $dataProvider = new CActiveDataProvider($model, array(
                'criteria' => array(
                    'condition' => ($cond), 'order' => 'id DESC',
                ), 'pagination' => array('pageSize' => $pageSize),
            ));
        } else {
           
            $dataProvider = new CActiveDataProvider($model, array(
                'criteria' => array(
                    'condition' => ('created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate .'" AND id_proof != "" AND address_proff != "" AND document_status = "' . $status . '"'), 'order' => 'id DESC',
                ),
                'pagination' => array('pageSize' => $pageSize),
            ));
        }
        $this->render('verification_approval', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionChangeApprovalStatus() {
        if ($_REQUEST['id']) {
            $userprofileObject = UserProfile::model()->findByPk($_REQUEST['id']);
            if ($userprofileObject->document_status == 1) {
                $userprofileObject->document_status = 0;
            } else {
                $userprofileObject->document_status = 1;
            }
            $userprofileObject->save(false);
            $this->redirect(array('/admin/user/verificationapproval', 'successMsg' => 1));
        }
    }

    /*
     * Function to fetch verification document
     */

    public function actionTestimonialApproval() {
        $model = new UserProfile();
        $pageSize = Yii::app()->params['defaultPageSize'];
        $todayDate = date('Y-m-d');
        $fromDate = date('Y-m-d');
        $status = 0;
        if (!empty($_POST)) {

            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            $status = $_POST['res_filter'];
            $dataProvider = new CActiveDataProvider($model, array(
                'criteria' => array(
                    'condition' => ('testimonials !="" AND updated_at >= "' . $todayDate . '" AND updated_at <= "' . $fromDate . '"  AND testimonial_status = "' . $status . '" ' ), 'order' => 'id DESC',
                ), 'pagination' => array('pageSize' => $pageSize),
            ));
        } else {

            $dataProvider = new CActiveDataProvider($model, array(
                'criteria' => array(
                    'condition' => ('testimonials !="" AND updated_at >= "' . $todayDate . '" AND updated_at <= "' . $fromDate . '" AND testimonial_status = "' . $status . '"'), 'order' => 'id DESC',
                ),
                'pagination' => array('pageSize' => $pageSize),
            ));
        }
        $this->render('testimonial_approval', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionTestimonialApprovalStatus() {
        if ($_REQUEST['id']) {
            $userprofileObject = UserProfile::model()->findByPk($_REQUEST['id']);
            if ($userprofileObject->testimonial_status == 1) {
                $userprofileObject->testimonial_status = 0;
            } else {
                $userprofileObject->testimonial_status = 1;
            }
            $userprofileObject->save(false);
            
            $this->redirect(array('/admin/user/testimonialapproval', 'successMsg' => 1));
        }
    }

    /*
     * Function to update user records
     */

    public function actionEdit() {

        $error = "";
        $success = "";
        if ($_REQUEST['id']) {
            $userObject = User::model()->findByPK($_REQUEST['id']);
            $profileObject = UserProfile::model()->findByAttributes(array('user_id' => $_REQUEST['id']));
            if ($_REQUEST['id'] && $_POST) {
                if ($_POST['UserProfile']['address'] != '' && $_POST['UserProfile']['street'] != '' && $_POST['UserProfile']['city_name'] != '' && $_POST['UserProfile']['state_name'] != '' && $_POST['UserProfile']['country_id'] != '' && $_POST['UserProfile']['zip_code'] != '' && $_POST['UserProfile']['phone'] != '') {
                    /* Updating User info */
                    $userObject->full_name = $_POST['UserProfile']['full_name'];
                    $userObject->email = $_POST['UserProfile']['email'];
                    $userObject->phone = $_POST['UserProfile']['phone'];
                    $userObject->date_of_birth = $_POST['UserProfile']['date_of_birth'];
                    $userObject->skype_id = $_POST['UserProfile']['skype_id'];
                    $userObject->facebook_id = $_POST['UserProfile']['facebook_id'];
                    $userObject->country_id = $_POST['UserProfile']['country_id'];
                    $userObject->twitter_id = $_POST['UserProfile']['twitter_id'];
                    $userObject->updated_at = new CDbExpression('NOW()');
                    $userObject->update();

                    /* Updating User profile data */

                    $profileObject->address = $_POST['UserProfile']['address'];
                    $profileObject->street = $_POST['UserProfile']['street'];
                    $profileObject->city_name = $_POST['UserProfile']['city_name'];
                    $profileObject->state_name = $_POST['UserProfile']['state_name'];
                    $profileObject->country_id = $_POST['UserProfile']['country_id'];
                    $profileObject->zip_code = $_POST['UserProfile']['zip_code'];

                    $profileObject->updated_at = new CDbExpression('NOW()');
                    $profileObject->update();
                    if ($userObject->update() && $profileObject->update()) {
                        $this->redirect(array('/admin/user/index', 'successMsg' => 3));
                    }
                } else {
                    $error .="Please fill all required(*) marked fields.";
                }
            }
        }

        $countryObject = Country::model()->findAll();

        $this->render('user_edit', array(
            'countryObject' => $countryObject, 'error' => $error, 'success' => $success, 'userObject' => $userObject, 'profileObject' => $profileObject
        ));
    }

    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function getOnClickEvent($data, $row) {
        $fullName = "'" . $data->name . "'";
        echo '<a onclick="OpenChatBox(' . $fullName . ')">Click to chat</a>';
    }
    
    public function actionResetPassword() { 
        $error = "";
        $success = "";
        $userObject = User::model()->findByPK(Yii::app()->session['userid']);
        if (!empty($_POST)) {
            if ($_POST['UserProfile']['old_password'] != '' && $_POST['UserProfile']['new_password'] != '' && $_POST['UserProfile']['confirm_password'] != '') {
                 
                    if ($userObject->password != md5($_POST['UserProfile']['old_password'])) {
                        $error .= "Incorrect old password";
                    } else {
                        $userObject->password = md5($_POST['UserProfile']['new_password']);
                        if ($userObject->update()) {
                            /*$userObjectArr = array();
                            $userObjectArr['full_name'] = $userObject->full_name;
                            $userObjectArr['name'] = $userObject->name;
                            $userObjectArr['ip'] = Yii::app()->params['ip'];
                            $userObjectArr['new_password'] = $_POST['UserProfile']['new_password'];
                            $success .= "Your password changed successfully";
                            $config['to'] = $userObject->email;
                            $config['subject'] = 'mGlobally Password Changed';
                            $config['body'] =  $this->renderPartial('//mailTemp/change_password', array('userObjectArr'=>$userObjectArr),true);
                        
                            //$config['body'] = 'Hey ' . $userObject->full_name . ',<br/>You recently changed your password. As a security precaution, this notification has been sent to your email addresses.';
                            CommonHelper::sendMail($config);*/
                            $success .= "Your password changed successfully";
                        }
                    }
                 
            } else {
                $error .="Please fill all required(*) marked fields.";
            }
        }

        $this->render('resetpassword', array(
            'error' => $error, 'success' => $success,
        ));
      
    }

    protected function gridAddressImagePopup($data, $row) {
        $bigImagefolder = Yii::app()->params->imagePath['verificationDoc']; // folder with uploaded files
        echo "<a data-toggle='modal' href='#zoom_$data->id'>Click to open</a>" . '<div class="modal fade" id="zoom_' . $data->id . '" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog" style="width:500px;">
                        <div class="modal-content">
                                <div class="modal-body" style="width: 500px;overflow: auto;height: 500px;padding: 0;">
                                         <img src="' . $bigImagefolder . $data->address_proff . '">
                                                         </div>
                            </div>
                        </div>
                </div>';
    }

    protected function gridIdImagePopup($data, $row) {
        $bigImagefolder = Yii::app()->params->imagePath['verificationDoc']; // folder with uploaded files
        echo "<a data-toggle='modal' href='#zoom_$data->id'>Click to open</a>" . '<div class="modal fade" id="zoom_' . $data->id . '" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog" style="width:500px;">
                        <div class="modal-content">
                                <div class="modal-body" style="width: 500px;overflow: auto;height: 500px;padding: 0;">
                                         <img src="' . $bigImagefolder . $data->id_proof . '">
                                                         </div>
                            </div>
                        </div>
                </div>';
    }
    
    
    public function actionAdd() {
        $error ="";
        $success ="";
        if ($_POST) {            
            /* Already Exits */
            $userObject = User::model()->findByAttributes(array('name' => $_POST['name']));
            if (count($userObject) == 0) {
                $userObject = User::model()->findByAttributes(array('name' => $_POST['sponsor_id']));
                $masterPin = BaseClass::getUniqInt(5);
                $model = new User;
                $model->attributes = $_POST;
                $password = "mg@1234";
                $model->role_id = 2;

                $model->password = BaseClass::md5Encryption($password);
                $model->sponsor_id = $_POST['sponsor_id'];
                $model->master_pin = BaseClass::md5Encryption($masterPin);
                $model->created_at = date('Y-m-d');


                if (!$model->save(false)) {
                    echo "<pre>";
                    print_r($model->getErrors());
                    exit;
                }
                $modelUserProfile = new UserProfile();
                $modelUserProfile->user_id = $model->id;
                $modelUserProfile->created_at = date('Y-m-d');
                $modelUserProfile->referral_banner_id = 1;
                $modelUserProfile->save(false);

                $accessObject = new UserHasAccess;
                $accessObject->user_id = $model->id;
                $accessObject->access = "dashboard";
                $accessObject->created_at = date('Y-m-d');
                $accessObject->save();
                $success = "User Created Successfully.";
            }
            
        }
        $spnId = "";
        if ($_GET) {
            if (!empty($arra)) {
                $spnId = $arra[0];
            } else {
                $spnId = $_GET['spid'];
            }
        }
        $countryObject = Country::model()->findAll();

        $this->render('user_add', array('countryObject' => $countryObject, 'spnId' => $spnId,'error' => $error,'success'=>$success));
    }
    

}
