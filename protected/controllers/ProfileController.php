<?php

class ProfileController extends Controller {

    public $layout = 'inner';

    public function init() {
        
        BaseClass::isLoggedIn();
    }

    public function actionIndex() {

        $dataProvider = new CActiveDataProvider('User');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'address', 'fetchstate', 'fetchcity', 'testimonial', 'updateprofile', 'documentverification', 'summery', 'dashboard', 'changepassword','changepin','inviterefferal'),
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

    /*
     * Function to update user address
     * 
     */

    public function actionAddress() {
        $model = new UserProfile;
        $error = "";
        $success = "";
        $profileObject = UserProfile::model()->findByAttributes(array('user_id' => Yii::app()->session['userid']));
        $userObject = User::model()->findByPK(array('id' => Yii::app()->session['userid']));
        if (isset($_POST['UserProfile'])) {
            if (count($_POST['UserProfile']) > 0) {
                if (md5($_POST['UserProfile']['master_pin']) == $userObject->master_pin) {
                    $profileObject->address = $_POST['UserProfile']['address'];
                    $profileObject->street = $_POST['UserProfile']['street'];
                    $profileObject->city_name = $_POST['UserProfile']['city_name'];
                    $profileObject->state_name = $_POST['UserProfile']['state_name'];
                    $profileObject->country_id = $_POST['UserProfile']['country_id'];
                    $profileObject->zip_code = $_POST['UserProfile']['zip_code'];

                    $profileObject->updated_at = new CDbExpression('NOW()');
                    $profileObject->update();
                    $success .= "Address Updated Successfully";
                } else {
                    $error .= "Incorrect master pin.";
                }
            } else {
                $error .= "Please fill required(*) marked fields.";
            }
        }

        $countryObject = Country::model()->findAll();
        $cityObject = City::model()->findAll();
        $stateObject = State::model()->findAll();
        $profileObject = UserProfile::model()->findByAttributes(array('user_id' => Yii::app()->session['userid']));
        $this->render('/user/address', array('countryObject' => $countryObject,
            'cityObject' => $cityObject, 'stateObject' => $stateObject, 'profileObject' => $profileObject, 'success' => $success, 'error' => $error));
    }

    /*
     * Function to update user address
     * 
     */

    public function actionTestimonial() {
        $error = "";
        $success = "";
        $userObject = User::model()->findByPK(array('id' => Yii::app()->session['userid']));
        $profileObject = UserProfile::model()->findByAttributes(array('user_id' => Yii::app()->session['userid']));
        if (isset($_POST['UserProfile'])) {
            if ($_POST['UserProfile']['testimonials'] == '') {
                $error .= "Please fill required(*) marked fields.";
            } else {
                if (md5($_POST['UserProfile']['master_pin']) == $userObject->master_pin) {

                    $profileObject->testimonials = $_POST['UserProfile']['testimonials'];
                    $profileObject->testimonial_status = '0';

                    if ($profileObject->update()) {
                        /* $config['to'] = $userObject->email; 
                          $config['subject'] = 'New testimonial added.';
                          $config['body'] = 'Dear Admin , <br/> New testimonial added in mglobal site.Please approve.';
                          $test = mail($config['to'],$config['subject'],$config['body']);
                          CommonHelper::sendMail($config); */
                        $success .= "Testimonial Updated Successfully.";
                    }
                } else {
                    $error .= "Incorrect master pin.";
                }
            }
        }

        $this->render('/user/testimonial', array('profileObject' => $profileObject, 'success' => $success, 'error' => $error));
    }

    /*
     * Function to update user address
     * 
     */

    public function actionUpdateProfile() {
        $error = "";
        $success = "";
        $userObject = User::model()->findByPK(array('id' => Yii::app()->session['userid']));
        $transactionObject = Transaction::model()->findByAttributes(array('user_id' => Yii::app()->session['userid']));
        $edit = "yes";
        if (!empty($transactionObject) && $transactionObject->status == '1') {
            $edit = "no";
        }
        //print_r($_POST['UserProfile']);exit;
        if (isset($_POST['UserProfile'])) {
            if ($_POST['UserProfile'] == '') {
                $error .= "Please fill required(*) marked fields.";
            } else {
                
                   if (md5($_POST['UserProfile']['master_pin']) == $userObject->master_pin) {
                    $dob = date("Y-m-d",strtotime($_POST['UserProfile']['date_of_birth']));    
                    $userObject->full_name = $_POST['UserProfile']['full_name'];
                    $userObject->email = $_POST['UserProfile']['email'];
                    $userObject->phone = $_POST['UserProfile']['phone'];
                    $userObject->date_of_birth = $dob;
                    $userObject->skype_id = $_POST['UserProfile']['skype_id'];
                    $userObject->facebook_id = $_POST['UserProfile']['facebook_id'];
                    $userObject->twitter_id = $_POST['UserProfile']['twitter_id'];
                    if ($userObject->update()) {
                        $success .= "Profile Updated Successfully.";
                    }
                } else {
                    $error .= "Incorrect master pin.";
                }
            }
        }
        $this->render('/user/updateprofile', array('userObject' => $userObject, 'success' => $success, 'error' => $error, 'edit' => $edit));
    }

    /*
     * Function to upload document for verification
     * 
     */

    public function actionDocumentVerification() {
        $error = "";
        $success = "";
        $profileObject = UserProfile::model()->findByAttributes(array('user_id' => Yii::app()->session['userid']));
        $userObject = User::model()->findByPK(Yii::app()->session['userid']);

        if ($_POST) {
            $profileObject->id_proof = time() . $_FILES['id_proof']['name'];
            $profileObject->address_proff = time() . $_FILES['address_proof']['name'];
            if ($_FILES) {
                if (md5($_POST['UserProfile']['master_pin']) == $userObject->master_pin) {
                    $ext1 = end((explode(".", $profileObject->id_proof)));
                    $ext2 = end((explode(".", $profileObject->address_proff)));

                    if ($ext1 != "jpg" && $ext1 != "png" && $ext1 != "jpeg" && $ext1 != "pdf" || $ext2 != "jpg" && $ext2 != "png" && $ext2 != "jpeg" && $ext2 != "pdf") {
                        $error = "Please upload mentioned file type.";
                    } else {

                        if ($profileObject->update()) {
                            $path = Yii::getPathOfAlias('webroot') . "/upload/verification-document/";
                            BaseClass::uploadFile($_FILES['id_proof']['tmp_name'], $path, time() . $_FILES['id_proof']['name']);
                            BaseClass::uploadFile($_FILES['address_proof']['tmp_name'], $path, time() . $_FILES['address_proof']['name']);
                            $success = "Documents Updated Successfully";
                        }
                    }
                } else {
                    $error .= "Incorrect master pin.";
                }
            } else {
                $error = "Please fill required(*) marked fields.";
            }
        }


        $this->render('/user/verification', array('success' => $success, 'error' => $error, 'userObject' => $profileObject));
    }

    /*
     * To fetch state name according to country

      public function actionFetchState()
      {

      $stateObject = State::model()->findAll(array('condition'=>'country_id='.$_REQUEST['country_id']));

      $stateHTML = "<option value=''>Select State</option>";
      foreach($stateObject as $state) {
      $stateHTML .= "<option value='".$state->id."'>".ucwords($state->name)."</option>";
      }
      echo $stateHTML;

      }

      /*
     * To fetch state name according to country

      public function actionFetchCity()
      {
      $cityObject = City::model()->findAll(array('condition'=>'state_id='.$_REQUEST['state_id']));
      $cityHTML = "<option value=''>Select City</option>";
      foreach($cityObject as $city) {
      $cityHTML .= "<option value='".$city->id."'>".ucwords($city->name)."</option>";
      }
      echo $cityHTML;
      }

      /*
     * This will load user dashboard
     */

    public function actionDashboard() {
        $loggedInUserId = Yii::app()->session['userid'];
        $orderObject = Order::model()->findAll(array('condition' => 'user_id=' . $loggedInUserId));
        $this->render('/user/dashboard', array(
            'orderObject' => $orderObject,
        ));
    }

    public function actionChangePassword() {
        $error = "";
        $success = "";
        $userObject = User::model()->findByPK(array('id' => Yii::app()->session['userid']));
        if (!empty($_POST)) {
          if($_POST['UserProfile']['old_password']!='' && $_POST['UserProfile']['new_password']!='' && $_POST['UserProfile']['confirm_password']!='' )  
          {
              if (md5($_POST['UserProfile']['master_pin']) == $userObject->master_pin) {
            if($userObject->password != md5($_POST['UserProfile']['old_password']))
            {
               $error .= "Incorrect old password"; 
            }else{
             $userObject->password = md5($_POST['UserProfile']['new_password']);   
             if ($userObject->update()) {
                $success .= "Your password changed successfully"; 
                $config['to'] = $userObject->email;
                $config['subject'] = 'mGlobally Password Changed' ;
                $config['body'] = 'Hey '.$userObject->full_name.',<br/>You recently changed your password. As a security precaution, this notification has been sent to your email addresses.';
                CommonHelper::sendMail($config);
             }  
            }
            } else {
                $error .= "Incorrect master pin";
            }
        } else {
            $error .="Please fill all required(*) marked fields.";
        }
        }
        
        $this->render('/user/change_password', array(
            'error' => $error,'success' => $success,
        ));
    }
    
    /*
     * Function to change master pin
     */
    public function actionChangePin()
    { 
        $error = "";
        $success = "";
        $userObject = User::model()->findByPK(array('id' => Yii::app()->session['userid']));
         
        if (!empty($_POST)) {
          if($_POST['UserProfile']['old_master_pin']!='' && $_POST['UserProfile']['new_master_pin']!='' && $_POST['UserProfile']['confirm_master_pin']!='' )  
          {
             
             if($userObject->master_pin != md5($_POST['UserProfile']['old_master_pin']))
             {
               $error .= "Incorrect old master pin"; 
             }else{
             $userObject->master_pin = md5($_POST['UserProfile']['new_master_pin']);
             
             if ($userObject->update()) {
                 
                $success .= "Your pin changed successfully"; 
                $config['to'] = $userObject->email;
                $config['subject'] = 'mGlobally Master Pin Changed' ;
                $config['body'] = 'Hey '.$userObject->full_name.',<br/>You recently changed your master pin. As a security precaution, this notification has been sent to your email addresses.';
                CommonHelper::sendMail($config);
             }  
            }
             
        } else {
            $error .="Please fill all required(*) marked fields.";
        }
        }
        
        $this->render('/user/change_master_pin', array(
            'error' => $error,'success' => $success,
        ));   
        
    }
    
    /*
     * function to invite refferals
     */
    public function actionInviteRefferal()
    {
       $error = "";
        $success = "";
        $userObject = User::model()->findByPK(Yii::app()->session['userid']);
        $link =   Yii::app()->params['baseUrl'] . '/user/registration?spid='.$userObject->name.'--email';
        if(!empty($_POST))
        {
          if($_POST['email']!='')
          {
            $emailArr = $_POST['email'];
            $emailArray = explode(',',$emailArr);
            
            foreach($emailArray as $email)
            {
                $config['to'] = $email;
                $config['subject'] = 'mGlobally Invitation From '.$userObject->name ;
                $config['body'] = 'Hey '.$email.',<br/>Click in below mentioned linkto register in Mglobally<br/><a href="'.$link.'">Click Here</a>';
                CommonHelper::sendMail($config);  
            }
           $success .= "Email sent successfully.";   
          }else{
              $error .= "Email field can not be blank.";
          }
        }
        
       $this->render('/user/invite_refferals', array(
            'error' => $error,'success' => $success,'userObject'=>$userObject
        ));  
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
