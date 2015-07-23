<?php
require_once Yii::app()->basePath.'/components/Mobile_Detect.php';
class SiteController extends Controller
{
   
	/**
	 * Declares class-based actions.
	 */
	public $title, $metadescription;
	public $fbOgTags = array();
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
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
				'actions'=>array('index','subscription','profileform'),
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
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex($action = '')
	{   
            
//            $this->layout = '';
//            $detector = new Mobile_Detect;
//            if($detector->isMobile() || $detector->isTablet())
//                $this->redirect(array('/mobile'));
//			
//            $myIdAddress =  '208.109.223.173'; //$_SERVER['REMOTE_ADDR']
//            
//            // geo-localize your visitors
////            $visitorsGeoLocalize = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$myIdAddress));
//            
//            //$cityName = $visitorsGeoLocalize['geoplugin_city'];
//            //$stateName = $visitorsGeoLocalize['geoplugin_city']
//            //$countryName = $visitorsGeoLocalize['geoplugin_countryName'];
//            
//            $hotelModel = Hotel::model();
//            $homeBannerModel = HomeBanner::model();
//            $cityModel = City::model();
//            
//           
//            $cityName = 'new-york'; //TODO: get from geo location
//            $stateName = 'new-york';  
//            $countryName = 'USA';
//            
//            //set localization details in session
//            Yii::app()->session['localization'] = array(
//                'country'=>$countryName,
//                'state'=>$stateName,
//                'city'=>$cityName,
//            );
//            $action = $this->getAction()->getId();
//            $this->loadMetas($action);
//            $condition = array ("slug" => $cityName);
//            //read geo location city
//            $cityObject = $cityModel->getCityByName($condition);
//            // get top 8 cities with the hotel count
//            
//            $stateCondition = array("id" => $stateName);
//            $stateObject = $stateModel = State::model()->getStateByName($stateCondition);

           $basicPackageObject = Package::model()->findAll(array('condition'=>'type=1 AND status=1','order' => 'name ASC','limit' => '3'));
           
           $advancePackageObject = Package::model()->findAll(array('condition'=>'type=2 AND status=1','order' => 'name ASC','limit' => '3'));
           
           $proPackageObject = Package::model()->findAll(array('condition'=>'type=3 AND status=1','order' => 'name ASC','limit' => '3'));
           
           $userProfileObject =  UserProfile::model()->findAll((array('condition'=>'testimonial_status=1 AND testimonials != ""')));
           
           
           
           $membership_type = "";
           if(!empty(Yii::app()->session['userid'])){
           $userObject = User::model()->findByPk(Yii::app()->session['userid']);
           $membership_type = $userObject->membership_type;
           }
           if(!empty(Yii::app()->session['domain'])){
               unset(Yii::app()->session['domain']);
           }
           
           /* function to get stats*/
           
           $siteObject =  SiteStatitics::model()->findAll();
           
          /* Builder Category */
           
           $categoryObject =  BuildCategory::model()->findAll(array('condition'=>'status=1','order' => 'name ASC')); 
           
          /*function to show news feeds*/
          $connection = Yii::app()->db; 
          $command = $connection->createCommand('SELECT build_temp.*,build_temp_header.* , build_category.name as catname FROM `build_temp`,`build_temp_header`,`build_category` where build_temp.temp_header_id = build_temp_header.id AND build_category.id = build_temp.category_id AND build_temp.status =1 ORDER BY build_temp.id DESC LIMIT 0,18');
          $templateObject = $command->queryAll();          
           
           
          $this->render('index',array('templateObject'=>$templateObject,'categoryObject'=> $categoryObject,'siteObject'=> $siteObject , 'membership_type'=>$membership_type,'basicPackageObject'=>$basicPackageObject,'advancePackageObject'=>$advancePackageObject,'proPackageObject'=>$proPackageObject,'profileObject'=>$userProfileObject,)); 
	}
        
        
        
                    
        public function actionSubscription() {
                    
          if(!empty($_REQUEST))  
          {
             $contactObject = new Contact;
             $contactObject->email = $_REQUEST['email'];
             $contactObject->type = "subscribe";
             $contactObject->created_at = date('Y-m-d');
             $contactObject->status = 1;
             $contactObject->save(false);
             /*mail to user*/
             $userObjectArr['email'] = $_REQUEST['email'];
             $config['to'] = $_REQUEST['email'];
             $config['subject'] = 'mGlobally Subscription Confirmed';
             $config['body'] =  $this->renderPartial('//mailTemp/newsletterMail', array('userObjectArr'=>$userObjectArr),true);
              //$config['body'] = 'Hey ' . $userObject->full_name . ',<br/>You recently changed your password. As a security precaution, this notification has been sent to your email addresses.';
             CommonHelper::sendMail($config);
             
              /*mail to user*/
             $config['to'] = 'nehanidhi.2008@gmail.com';
             $config['subject'] = 'mGlobally Subscription Confirmed';
             $config['body'] =  $this->renderPartial('//mailTemp/newsletterMailAdmin', array('userObjectArr'=>$userObjectArr),true);
              //$config['body'] = 'Hey ' . $userObject->full_name . ',<br/>You recently changed your password. As a security precaution, this notification has been sent to your email addresses.';
             CommonHelper::sendMail($config);
             echo 1;
          }else{
            echo 0;
          }
        }
        
        public function actionprofileForm() {
                    
          if(!empty($_REQUEST))  
          {
             $mediaObject = new MediaCenter;
             $mediaObject->email = $_REQUEST['email'];
             $mediaObject->type = "Our Profile";
             $mediaObject->add_date = date('Y-m-d');
             $contactObject->save(false);
             $path = Yii::getPathOfAlias('webroot') . "/images/mediacenter/";
             /*mail to user*/
             $userObjectArr['email'] = $_REQUEST['email'];
             $userObjectArr['name'] = $_REQUEST['name'];
             $userObjectArr['type'] = "Our Profile";
             $config['to'] = $_REQUEST['email'];
             $config['subject'] = 'mGlobally Company Profile Download';
             $config['body'] =  $this->renderPartial('//mailTemp/newsletterMail', array('userObjectArr'=>$userObjectArr),true);
             $config['file_path'] = $path . "profile.ppsx";
             CommonHelper::sendMail($config);
              echo 1;
          }else{
            echo 0;
          }
        }
        
        public function actionbusinessForm() {
                    
          if(!empty($_REQUEST))  
          {
             $mediaObject = new MediaCenter;
             $mediaObject->email = $_REQUEST['email'];
             $mediaObject->type = "Business Plan";
             $mediaObject->add_date = date('Y-m-d');
             $contactObject->save(false);
             $path = Yii::getPathOfAlias('webroot') . "/images/mediacenter/";
             /*mail to user*/
             $userObjectArr['email'] = $_REQUEST['email'];
             $userObjectArr['name'] = $_REQUEST['name'];
             $userObjectArr['type'] = "Business Plan";
             $config['to'] = $_REQUEST['email'];
             $config['subject'] = 'mGlobally Business Plans Brochure Download';
             $config['body'] =  $this->renderPartial('//mailTemp/newsletterMail', array('userObjectArr'=>$userObjectArr),true);
             $config['file_path'] = $path . "Business plans brochure.pdf";
             CommonHelper::sendMail($config);
              echo 1;
          }else{
            echo 0;
          }
        }
        
        
        public function actionbrochureForm() {
                    
          if(!empty($_REQUEST))  
          {
             $mediaObject = new MediaCenter;
             $mediaObject->email = $_REQUEST['email'];
             $mediaObject->type = "Brochure";
             $mediaObject->add_date = date('Y-m-d');
             $contactObject->save(false);
             $path = Yii::getPathOfAlias('webroot') . "/images/mediacenter/";
             /*mail to user*/
             $userObjectArr['email'] = $_REQUEST['email'];
             $userObjectArr['name'] = $_REQUEST['name'];
             $userObjectArr['type'] = "Company Brochure";
             $config['to'] = $_REQUEST['email'];
             $config['subject'] = 'mGlobally Corporate Brochure Download';
             $config['body'] =  $this->renderPartial('//mailTemp/newsletterMail', array('userObjectArr'=>$userObjectArr),true);
             $config['file_path'] = $path . "e_brochure.pdf";
             CommonHelper::sendMail($config);
              echo 1;
          }else{
            echo 0;
          }
        }
        
       
        /**
	 *This is action label
	 */
	public function actionLabel()
	{
		$this->render('label');
	}
	
	/**
	 *This is action furniture
	 */
	public function actionFurniture()
	{
		$this->render('furniture');
	}


        public function actionError() {
            
            $error = Yii::app()->errorHandler->error;

            if( $error )
            {
                $this->layout = 'user';
                $this -> render( 'error', array( 'error' => $error ) );
            }
        }
        
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		if(isset($_GET['mobile']))
		{
			$url = Yii::app()->getBaseUrl(true)."/mobile";
		}else {
			$url = Yii::app()->homeUrl;
		}
                unset(Yii::app()->session['username']);
		$this->redirect($url);
	}
        
        public function getVisitorLocation($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
//            function ip_info() {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        
        $purpose = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
        $support = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city" => @$ipdat->geoplugin_city,
                            "state" => @$ipdat->geoplugin_regionName,
                            "country" => @$ipdat->geoplugin_countryName,
                            "country_code" => @$ipdat->geoplugin_countryCode,
                            "continent" => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        }

        return $output;
    }
    protected function loadMetas($action = 'index'){
    
    	if(!empty(Yii::app()->session['localization']['city']))
    	{
    		$title = Yii::app()->session['localization']['city'];
    		$desc = "";
    		$image = "";
    		
    	}elseif (!empty(Yii::app()->session['localization']['state']))
    	{
    		$title = Yii::app()->session['localization']['state'];
    		$desc = "";
    		$image = "";
    	}elseif (!empty(Yii::app()->session['localization']['country']))
    	{
    		$title = Yii::app()->session['localization']['country'];
    		$desc = "";
    		$image = "";
    	}else {
    		$title = Yii::app()->params['sitename'];
    		$desc = "";
    		$image = "";
    	}
    	$fbOgTags = array();
    	$fbOgTags['title'] = $title;
    	$fbOgTags['description'] = $desc;
    	$fbOgTags['image'] = $image;
    	$fbOgTags['site_name'] = Yii::app()->params['sitename'];
    	$this->fbOgTags = $fbOgTags;
    	//echo '<pre>';print_r($this->fbOgTags);exit;
    }
}