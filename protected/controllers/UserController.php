<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='user';

        public function init() {
            //BaseClass::isLoggedIn();
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

				'actions'=>array('index','view','registration','isuserexisted','forgetpassword','login','changepassword','404','success','loginregistration','dashboard','isemailexisted','issponsorexisted','thankyou','binary','facebook','twitter','callback','checkinvestment'), 
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
        
        public function actionTwitter(){
				
		$twitter = Yii::app()->twitter->getTwitter();
		$request_token = $twitter->getRequestToken();
		//print_r($request_token); exit;
		//set some session info
		Yii::app()->session['oauth_token'] = $token =           $request_token['oauth_token'];
		Yii::app()->session['oauth_token_secret'] = $request_token['oauth_token_secret'];
		
		if($twitter->http_code == 200){
			//get twitter connect url
			$url = $twitter->getAuthorizeURL($token);
			//send them
			$this->redirect($url);
		}else{
			//error here
			$this->redirect(Yii::app()->homeUrl);
		}
	}
	
	public function actionCallback() {
            
		/* If the oauth_token is old redirect to the connect page. */
		if (isset($_REQUEST['oauth_token']) && Yii::app()->session['oauth_token'] !== $_REQUEST['oauth_token']) {
			Yii::app()->session['oauth_status'] = 'oldtoken';
		}
	
		/* Create TwitteroAuth object with app key/secret and token key/secret from default phase */
		$twitter = Yii::app()->twitter->getTwitterTokened(Yii::app()->session['oauth_token'], Yii::app()->session['oauth_token_secret']);
			
		/* Request access tokens from twitter */
		$access_token = $twitter->getAccessToken($_REQUEST['oauth_verifier']);
			
		/* Save the access tokens. Normally these would be saved in a database for future use. */
		Yii::app()->session['access_token'] = $access_token;
	
		/* Remove no longer needed request tokens */
		unset(Yii::app()->session['oauth_token']);
		unset(Yii::app()->session['oauth_token_secret']);
	
		if (200 == $twitter->http_code) {
			/* The user has been verified and the access tokens can be saved for future use */
			Yii::app()->session['status'] = 'verified';
	
			//get an access twitter object
			$twitter = Yii::app()->twitter->getTwitterTokened($access_token['oauth_token'],$access_token['oauth_token_secret']);
	
			//get user details
			$twuser= $twitter->get("account/verify_credentials"); //echo '<pre>'; print_r($twuser); exit;
			                        
                        $twitterAuthId = $twuser->id;
			$fulltName     = $twuser->name;
			$username      = $twuser->screen_name;
			$userLocation  = $twuser->location;

			$userModel = new User();
			
                        $currnetUserObject = User::model()->findByAttributes(array('unique_id'=>$twitterAuthId,'status'=>1));
                        
			if(count($currnetUserObject) < 1 ){ 		
			
                            $userObject = User::model()->findByAttributes(array('name' => 'admin'));
                            $masterPin = BaseClass::getUniqInt(5); 
                            $getPosition = BaseClass::getRandPosition();

                            if($getPosition == 1 ){ $getPosition = 'left' ; }else{ $getPosition = 'right' ; }

                            $model = new User;
                            $model->attributes = $_POST;
                            $model->password = BaseClass::md5Encryption($masterPin);  
                            $model->sponsor_id = 'admin' ;
                            $model->full_name = $fulltName ;
                            $model->name = $username ;
                            $model->unique_id = $twitterAuthId;                        
                            $model->position = $getPosition ;
                            $model->master_pin = BaseClass::md5Encryption($masterPin);
                            $model->created_at = date('Y-m-d') ;
                            $model->role_id = 1 ;
                            $model->status = 1 ;                       

                            /* Condition for they have the child or not */
                            $geneObject = Genealogy::model()->findByAttributes(array('parent' =>$userObject->id,'position'=>$getPosition));
                            
                            if(count($geneObject)){
                                $userId = "";
                                for($i = 1; $i <= 1000 ; $i++ ){                    

                                    if( $i == 1 ){                       
                                        $geneObjectNode = Genealogy::model()->findByAttributes(array('parent' => $geneObject->user_id ,'position' => $getPosition ) );
                                        if(count($geneObjectNode)){                               
                                            $userId = $geneObjectNode->user_id ;                        
                                        }else{                                
                                            $userId =  $geneObject->user_id;  
                                            break;
                                        }
                                    }else{                        
                                        $geneObjectNode = Genealogy::model()->findByAttributes(array('parent' => $userId ,'position' => $getPosition ) );                            
                                        if(count($geneObjectNode)){
                                            $userId = "";
                                            $userId .= $geneObjectNode->user_id;                            
                                        }else{                                
                                            $userId ;
                                            break;
                                        }
                                    }
                                } 

                            }else{
                               $userId =  $userObject->id; 
                            }       

                            if(!$model->save(false)){
                                echo "<pre>"; print_r($model->getErrors());exit;
                            }

                            $modelUserProfile = new UserProfile();
                            $modelUserProfile->user_id = $model->id ;
                            $modelUserProfile->city_name = $userLocation ;
                            $modelUserProfile->created_at = date('Y-m-d') ;
                            $modelUserProfile->referral_banner_id = 1 ;
                            $modelUserProfile->save(false);

                            /* Geneology */
                            $userObjectId = User::model()->findByAttributes(array('sponsor_id' => 'admin' ));
                            //echo 
                            $modelGenealogy = new Genealogy();
                            $modelGenealogy->parent = $userId ; 
                            $modelGenealogy->user_id = $model->id ; 
                            $modelGenealogy->sponsor_user_id = $userObjectId->id;                 
                            $modelGenealogy->position = $getPosition;                 
                            $modelGenealogy->save(false);

                           $currnetUserObject = User::model()->findByAttributes(array('unique_id'=>$twitterAuthId,'status'=>1));
                            Yii::app()->session['userid'] = $currnetUserObject->id;
                            Yii::app()->session['username'] = $currnetUserObject->name;
                            $this->redirect("/profile/dashboard");
                            
			}
			else{				
                            Yii::app()->session['userid'] = $currnetUserObject->id;
                            Yii::app()->session['username'] = $currnetUserObject->name;
                            $this->redirect("/profile/dashboard");
			}
			
	
		} else {
                    $this->redirect(Yii::app()->homeUrl);
		}
	}
                
        public function actionFacebook(){
            
            require(__DIR__ . '/../vendor/fb_tw/facebook/facebook.php');
            require(__DIR__ . '/../vendor/fb_tw/config/fbconfig.php');

            $facebook = new Facebook(array(
            'appId' => APP_ID,
            'secret' => APP_SECRET,
            ));

            $user = $facebook->getUser();

            if ($user) {
               try{
                    // Proceed knowing you have a logged in user who's authenticated.
                    $user_profile = $facebook->api('/me');
                } catch (FacebookApiException $e) {
                    error_log($e);
                    $user = null;
                }

                if (!empty($user_profile )) {
                    # User info ok? Let's print it (Here we will be adding the login and registering routines)
                    
                    $currnetUserObject = User::model()->findByAttributes(array('unique_id'=>$user_profile['id'],'status'=>1));
                  
                    if(count($currnetUserObject) < 1 ){ // Is present in database or not                        
                        // Check Validation for user name and email id unique or not
                        $checkUserInfo = User::model()->findByAttributes(array('name'=>$user_profile['first_name'],'email'=>$user_profile['email']));
                        if(count($checkUserInfo) < 1 ){   
                            
                            $userObject = User::model()->findByAttributes(array('name' => 'admin'));
                            $masterPin = BaseClass::getUniqInt(5); 
                            $getPosition = BaseClass::getRandPosition();

                            if($getPosition == 1 ){ $getPosition = 'left' ; }else{ $getPosition = 'right' ; }

                            $model = new User;
                            $model->attributes = $_POST;
                            $model->password = BaseClass::md5Encryption($masterPin);  
                            $model->sponsor_id = 'admin' ;
                            $model->email = $user_profile['email'] ;
                            $model->full_name = $user_profile['name'] ;
                            $model->name = $user_profile['first_name'] ;
                            $model->unique_id = $user_profile['id'] ;                        
                            $model->position = $getPosition ;
                            $model->master_pin = BaseClass::md5Encryption($masterPin);
                            $model->date_of_birth = '2011-05-04'; 
                            $model->created_at = date('Y-m-d') ;
                            $model->role_id = 1 ;
                            $model->status = 1 ;                       

                            /* Condition for they have the child or not */
                            $geneObject = Genealogy::model()->findByAttributes(array('parent' =>$userObject->id,'position'=>$getPosition));
                            //echo "<pre>"; print_r($geneObject);
                            //die;
                            if(count($geneObject)){
                                $userId = "";
                                for($i = 1; $i <= 1000 ; $i++ ){                    

                                    if( $i == 1 ){                       
                                        $geneObjectNode = Genealogy::model()->findByAttributes(array('parent' => $geneObject->user_id ,'position' => $getPosition ) );
                                        if(count($geneObjectNode)){                               
                                            $userId = $geneObjectNode->user_id ;                        
                                        }else{                                
                                            $userId =  $geneObject->user_id;  
                                            break;
                                        }
                                    }else{                        
                                        $geneObjectNode = Genealogy::model()->findByAttributes(array('parent' => $userId ,'position' => $getPosition ) );                            
                                        if(count($geneObjectNode)){
                                            $userId = "";
                                            $userId .= $geneObjectNode->user_id;                            
                                        }else{                                
                                            $userId ;
                                            break;
                                        }
                                    }
                                } 

                            }else{
                               $userId =  $userObject->id; 
                            }       

                            if(!$model->save(false)){
                                echo "<pre>"; print_r($model->getErrors());exit;
                            }

                            $modelUserProfile = new UserProfile();
                            $modelUserProfile->user_id = $model->id ;
                            $modelUserProfile->created_at = date('Y-m-d') ;
                            $modelUserProfile->referral_banner_id = 1 ;
                            $modelUserProfile->save(false);

                            /* Geneology */
                            $userObjectId = User::model()->findByAttributes(array('sponsor_id' => 'admin' ));
                            //echo 
                            $modelGenealogy = new Genealogy();
                            $modelGenealogy->parent = $userId ; 
                            $modelGenealogy->user_id = $model->id ; 
                            $modelGenealogy->sponsor_user_id = $userObjectId->id;                 
                            $modelGenealogy->position = $getPosition;                 
                            $modelGenealogy->save(false);

                            $currnetUserObject = User::model()->findByAttributes(array('unique_id'=>$user_profile['id'],'status'=>1));
                            Yii::app()->session['userid'] = $currnetUserObject->id;
                            Yii::app()->session['username'] = $currnetUserObject->name;
                            $this->redirect("/profile/dashboard");
                        }else{
                            $error = "<p class='error'>Invalid User Name</p>"; 
                            $this->render("login",array("msg"=>$error));
                        }    
                    }else{
                        Yii::app()->session['userid'] = $currnetUserObject->id;
                        Yii::app()->session['username'] = $currnetUserObject->name;
                        $this->redirect("/profile/dashboard");
                    }
                } else {
                    # For testing purposes, if there was an error, let's kill the script
                    die("There was an error.");
                }
            } else {
                # There's no active session, let's generate one
                $login_url = $facebook->getLoginUrl(array( 'scope' => 'email'));
                header("Location: " . $login_url);
            }
        }
        
        
        /* User Login Strat Here */
        public function actionLogin(){ 
            $error = "";

            // collect user input data
            if(isset($_POST['name']) && isset($_POST['password'])){

                $model = new User;
                $error = "";
                $username =  $_POST['name'];
                $password =  $_POST['password'];
                $masterkey = $_POST['masterkey'];

                if((!empty($username)) && (!empty($password))  && (!empty($masterkey))) {
                    $getUserObject = User::model()->findByAttributes(array('name'=>$username,'status'=>1));
                    if(!empty($getUserObject)){
                        $flagPassword ='';
                        $flagMaster ='';

                        if($getUserObject->password == md5($password)) { // Check Password
                            $flagPassword = 'password';                                    
                        }
                        if($getUserObject->master_pin == md5($masterkey)){ // Check master key
                            $flagMaster = 'masterkey';
                        }

                        if($flagPassword == 'password' && $flagMaster == 'masterkey' ){
                            $identity = new UserIdentity($username,$password);                                                                               
                            if($identity->userAuthenticate())
                            Yii::app()->user->login($identity);
                            Yii::app()->session['userid'] = $getUserObject->id;
                            Yii::app()->session['username'] = $getUserObject->name;
                            
                            if(Yii::app()->session['package_id']!='') {
                                $this->redirect("/package/domainsearch");  
                            } else {
                                $this->redirect("/profile/dashboard");
                            }
                        }else {
                           // echo "0"; 
                            $error = "<p class='error'>Invalid Information</p>"; 
                        }
                    }else{
                    $error = "<p class='error'>Invalid User Name</p>"; 
                    }
                }

            }
                $this->render("login",array("msg"=>$error));
 }
        
        public function actionRegistration(){
            
            $error = "";
            if($_POST){                 
               
                $userObject = User::model()->findByAttributes(array('name' => $_POST['sponsor_id']));
                $masterPin = BaseClass::getUniqInt(5); 
                $model = new User;
                $model->attributes = $_POST;
                $model->password = BaseClass::md5Encryption($_POST['password']);  
                $model->sponsor_id = $_POST['sponsor_id'] ;
                $model->master_pin = BaseClass::md5Encryption($masterPin);
                $model->date_of_birth = $_POST['y']."-".$_POST['m']."-".$_POST['d']; 
                $model->created_at = date('Y-m-d') ;
                if($_POST['admin']==1)
                {
                $model->role_id = 3 ;
                }else{
                $model->role_id = 2 ;    
                }
                if($_POST['admin']==1)
                {
                $model->status = 3 ;
                }else{
                $model->status = 2 ;    
                }

                /* Condition for they have the child or not */
                $geneObject = Genealogy::model()->findByAttributes(array('parent' =>$userObject->id,'position'=>$_POST['position']));
                //echo "<pre>"; print_r($geneObject);
                //die;
                if(count($geneObject)){
                    $userId = "";
                    for($i = 1; $i <= 1000 ; $i++ ){                    

                        if( $i == 1 ){                       
                            $geneObjectNode = Genealogy::model()->findByAttributes(array('parent' => $geneObject->user_id ,'position' => $_POST['position'] ) );
                            if(count($geneObjectNode)){                               
                                $userId = $geneObjectNode->user_id ;                        
                            }else{                                
                                $userId =  $geneObject->user_id;  
                                break;
                            }
                        }else{                        
                            $geneObjectNode = Genealogy::model()->findByAttributes(array('parent' => $userId ,'position' => $_POST['position'] ) );                            
                            if(count($geneObjectNode)){
                                $userId = "";
                                $userId .= $geneObjectNode->user_id;                            
                            }else{                                
                                $userId ;
                                break;
                            }
                        }
                    } 

                }else{
                   $userId =  $userObject->id; 
                }       

            $rand= BaseClass::md5Encryption(date('YmdHis'),5); // For the activation link
            $model->activation_key = $rand ;


            if(!$model->save(false)){
                echo "<pre>"; print_r($model->getErrors());exit;
            }

            $modelUserProfile = new UserProfile();
            $modelUserProfile->user_id = $model->id ;
            $modelUserProfile->created_at = date('Y-m-d') ;
            $modelUserProfile->referral_banner_id = 1 ;
            $modelUserProfile->save(false);

            /* Geneology */
            $userObjectId = User::model()->findByAttributes(array('sponsor_id' => $_POST['sponsor_id'] ));
            //echo 
            $modelGenealogy = new Genealogy();
            $modelGenealogy->parent = $userId ; 
            $modelGenealogy->user_id = $model->id ; 
            $modelGenealogy->sponsor_user_id = $userObjectId->id;                 
            $modelGenealogy->position = $_POST['position'];                 
            $modelGenealogy->save(false);

            $successMsg = "<p class='success'>You have successfully registered. Please check your email to activate your account</p>"; 
            /*  For Genealogy Data */

            /*$modelGenealogy = new Genealogy();
            $modelGenealogy->user_id = $model->id ; 
            $modelGenealogy->sponsor_user_id = $_POST['sponsor_id'] ; 
            $modelGenealogy->position = $_POST['position'] ; 
            $modelGenealogy->save(); */

//                $config['to'] = $model->email; 
//                $config['subject'] = 'Registration Confirmation' ;
//                $config['body'] = 'Congratulations! You have been registered successfully on our site '.
//                        '<strong>Your Master Pin:</strong>'.$masterPin.'<br/><br/>'.
//                        '<strong>Please click the link below to activate your account:</strong><br/><br/>'.
//                        Yii::app()->request->baseUrl.'/user/confirmAction?activation_key='.$rand;
//                var_dump($config);
//                CommonHelper::sendMail($config);
            //$this->render('login', array('successMsg'=> $successMsg));
            //$this->redirect('login');

                if($_POST['admin']==1)
                {
                $this->redirect(array('admin/user/index','successMsg'=>1));
                 }else{
                $this->redirect(array('login','successMsg'=>$successMsg)); 
                 }

            } 
            $spnId = "";
            if($_GET){
                $spnId = $_GET['spid'];
            }
            $countryObject = Country::model()->findAll();
            
            $this->render('registration',array('countryObject'=>$countryObject,'spnId'=>$spnId,'error'=>$error));
        }


        /* User Forget Password Strat Here */
        public function actionForgetPassword(){
            $msg = "";
            if(isset($_POST['email']) && $_POST['email'] !='' ){
                $email = $_POST['email'];
                $getUserObject = User::model()->findByAttributes(array('email'=>$email));                
                if(count($getUserObject) == 1 ){
                    $userObject = new User;                    
                    $userObject = User::model()->findByPk($getUserObject->id);
                    $forgetKey = base64_encode($getUserObject->name."--".$getUserObject->date_of_birth);   
                    $userObject->forget_key = $forgetKey ; 
                    $userObject->forget_status = 1 ; 
                    $userObject->update();
                    $msg = "<p class='success'>Please check your email to activate your account</p>";                    
                    if(!$userObject->update(false)){
                        echo "<pre>"; print_r($model->getErrors());exit;
                    } 
                    
//                    $config['to'] =  $email; 
//                    $config['subject'] = 'Password reset On HKbase' ;
//                    $config['body'] = 'Youre receiving this e-mail because you requested a password reset for your user account .  '.                            
//                            '<strong>Please go to the following page and choose a new password:</strong><br/><br/>'.
//                            Yii::app()->request->baseUrl.'/user/confirmAction?activation_key='.$forgetKey;
//                    var_dump($config);
//                    $test = mail($config['to'],$config['subject'],$config['body']);
//                    echo "<pre>"; print_r($test);exit;
//                    CommonHelper::sendMail($config);
                    
                }else{
                    $msg = "<p class='error'>Please Enter Your Valid Email Address.</p>";
                }                
            }    
            $this->render('forgetpassword',array('msg' => $msg));
        }
        
        /* User Forget Password Submit Form Strat Here */
        public function actionChangePassword(){
            if(isset($_POST['password']) && isset($_POST['confirm_password'])){                                   
                $msg = '';
                $getUserObject = new User;
                $getUserObject = User::model()->findByAttributes(array('forget_key'=> $_POST['userId'] )); 
                if($_POST['password']== $_POST['confirm_password'] ){ //for checking password matching                    
                  
                    $userObject = User::model()->findByPk($getUserObject->id);
                    $userObject->forget_key =  '' ;
                    $userObject->forget_status =  0 ;
                    $userObject->password = md5($_POST['password']);
                    $userObject->update();
                    $msg = "<p class='success'>Your password has been changed successfully</p>";
                    $this->render('success',array('msg' => $msg)); 
                }
            }            
                
            if(isset($_GET['id'])){                                                     
                $decodeId =  $_GET['id'];
                $getUserObject = new User;
                $getUserObject = User::model()->findByAttributes(array('forget_key'=>$decodeId ));                                
                
                if(count($getUserObject) > 1 ){
                   $this->render('changepassword',array('userId' => $_GET['id'])); 
                }else{                   
                    $this->render('404'); 
                }                                       
            }              
            
            
        }
        
        public function actionThankyou(){
            $userId = 3 ;
            $userObject = User::getUserById($userId);
            $totalCommission = BaseClass::getDirectCommission($userObject->name);
            $this->render('thankyou',array('getValue'=>$totalCommission ,'userObject'=>$userObject));            
        }
        
        public function actionBinary(){
            
            $percent = 10;
            $currentUserId = 3 ;        
            $currentDate = '2015-05-19';
            $genealogyLeftListObject = BaseClass::getBinaryTreeChild($currentUserId, $currentDate ,"'left'");          
            $genealogyRightListObject = BaseClass::getBinaryTreeChild($currentUserId, $currentDate ,"'right'");
             echo "<pre>";
             print_r($genealogyRightListObject); 
            
            if(count($genealogyLeftListObject) > 0  &&  count($genealogyRightListObject) > 0 ){               
                echo $genealogyLeftListObject[0]->order_amount;                                
                echo $genealogyRightListObject[0]->user_id;
                if($genealogyLeftListObject[0]->order_amount > $genealogyRightListObject[0]->order_amount){
                    $totalCommission = BaseClass::getPercentage($genealogyRightListObject[0]->order_amount , $percent, 1 ); 
                }else{
                    $totalCommission = BaseClass::getPercentage($genealogyLeftListObject[0]->order_amount, $percent, 1 ); 
                }
                echo $totalCommission ;
            }
            
            for($i=0 ; $i< 10 ; $i++){
                
            }
            
            
            
            
            
            die;
            echo "<pre>";
            print_r($genealogyLeftListObject);
            print_r($genealogyRightListObject);
            
            die;
            
            
            
            
            $userObject = User::getUserById($loggedInUserId);
                       
            
            
        }
        
        public function actionIsUserExisted(){
            if($_POST){
                $userObject = User::model()->findByAttributes(array('name' => $_POST['username']));
                if(count($userObject) > 0){
                    echo "1"; exit;
                } else {
                    echo "0"; exit;
                }
            }
        }
        
        public function actionIsEmailExisted(){            
            if($_POST){
                $userObject = User::model()->findByAttributes(array('email' => $_POST['email']));
                if(count($userObject) > 0){
                    echo "1"; exit;
                } else {
                    echo "0"; exit;
                }
            }
        }
        
        public function actionIsSponsorExisted(){            
            if($_POST){                                              
                $userObject = User::model()->findByAttributes(array('name' => $_POST['sponsor_id']));                
                if(count($userObject) > 0){
                    echo "1"; exit;
                } else {
                    echo "0"; exit;
                }
            }
        }
        
        
       public function actionloginregistration()
       {
           $spnId = Yii::app()->params['adminSpnId'];
           Yii::app()->session['package_id'] = (!empty($_GET)) ? $_GET['package_id'] : "";
            
            $countryObject = Country::model()->findAll();
//            echo "<pre>";print_r($countryObject);exit;
            $this->render('login-registration',array('countryObject'=>$countryObject,'spnId'=>$spnId));
       }
        
        /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id){
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
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
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
        
        /*
         * Function to fetch user investment
         */
        
        public function actionCheckInvestment()
        {
          $loggedInuserName = Yii::app()->session['username'];
           $dataProvider = new CActiveDataProvider('User', array(
                'criteria' => array(
                    'condition' => ('sponsor_id = "' . $loggedInuserName.'"' ), 'order' => 'id DESC',
                ), 'pagination' => array('pageSize' => 10),));
            
          $this->render('checkinvestment',array(
			'dataProvider'=>$dataProvider,
		)); 
        }
        
        
}
