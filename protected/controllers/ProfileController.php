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
                'actions' => array('index', 'address', 'fetchstate', 
                    'fetchcity', 'testimonial', 'updateprofile', 
                    'documentverification', 'summery', 'dashboard', 
                    'changepassword', 'changepin', 'inviterefferal', 
                    'trackrefferal','getrefferalchartdata'),
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
        //$model = new UserProfile;
        $errorMsg = "";
        $successMsg = "";
        $profileObject = UserProfile::model()->findByAttributes(array('user_id' => Yii::app()->session['userid']));
        $userObject = User::model()->findByPK(array('id' => Yii::app()->session['userid']));
        if (isset($_POST['UserProfile'])) {
            if (count($_POST['UserProfile']) > 0) {
                if (md5($_POST['UserProfile']['master_pin']) == $userObject->master_pin) {
                    $profileObject->address = $_POST['UserProfile']['address'];
                    $profileObject->street = $_POST['UserProfile']['street'];
                    $profileObject->city_name = $_POST['UserProfile']['city_name'];
                    $profileObject->state_name = $_POST['UserProfile']['state_name'];
                    $profileObject->zip_code = $_POST['UserProfile']['zip_code'];
                    $profileObject->updated_at = new CDbExpression('NOW()');
                    $profileObject->update();
                    $successMsg .= "Address Updated Successfully";
                    $this->redirect('/profile/updateprofile?successMsg=' . $successMsg);
                } else {
                    $errorMsg .= "Incorrect master pin.";
                    $this->redirect('/profile/updateprofile?errorMsg=' . $errorMsg);
                }
            } else {
                $errorMsg .= "Please fill required(*) marked fields.";
                $this->redirect('/profile/updateprofile?errorMsg=' . $errorMsg);
            }
        }

        $countryObject = Country::model()->findAll();
        $cityObject = City::model()->findAll();
        $stateObject = State::model()->findAll();
        $profileObject = UserProfile::model()->findByAttributes(array('user_id' => Yii::app()->session['userid']));
        $this->render('/user/address', array('countryObject' => $countryObject,
            'cityObject' => $cityObject, 'stateObject' => $stateObject, 'profileObject' => $profileObject, 'successMsg' => $successMsg, 'errorMsg' => $errorMsg));
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
                    $profileObject->updated_at = new CDbExpression('NOW()');
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
        $transactionObject = Transaction::model()->findByAttributes(array('user_id' => Yii::app()->session['userid'],'status'=>1));
        $edit = "yes";
        if (!empty($transactionObject)) {
            $edit = "no";
        }
        //print_r($_POST['UserProfile']);exit;
        if (isset($_POST['UserProfile'])) {
            if ($_POST['UserProfile'] == '') {
                $error .= "Please fill required(*) marked fields.";
            } else {

                if (md5($_POST['UserProfile']['master_pin']) == $userObject->master_pin) {
                    $dob = date("Y-m-d", strtotime($_POST['UserProfile']['date_of_birth']));
                    $userObject->full_name = $_POST['UserProfile']['full_name'];
                    $userObject->email = $_POST['UserProfile']['email'];
                    $userObject->phone = $_POST['UserProfile']['phone'];
                    $userObject->date_of_birth = $dob;
                    $userObject->country_id = $_POST['UserProfile']['country_id'];
                    $userObject->country_code = $_POST['UserProfile']['country_code'];
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
        $profileAddressObject = UserProfile::model()->findByAttributes(array('user_id' => Yii::app()->session['userid']));
        $countryObject = BaseClass::getCountryList();
        $this->render('/user/updateprofile', array('userObject' => $userObject,
            'countryObject' => $countryObject,
            'success' => $success,
            'profileAddressObject' => $profileAddressObject,
            'error' => $error, 'edit' => $edit));
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

        if ($_POST && $_FILES['id_proof']['name'] != '' && $_FILES['address_proof']['name'] != '') {
            $profileObject->id_proof = time() . $_FILES['id_proof']['name'];
            $profileObject->address_proff = time() . $_FILES['address_proof']['name'];
            $profileObject->updated_at = new CDbExpression('NOW()');
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
     * This will load user dashboard
     */

    public function actionDashboard() {

        if (!empty(Yii::app()->session['domain'])) {
            unset(Yii::app()->session['domain']);
        }
        $loggedInUserId = Yii::app()->session['userid'];
        $orderObject = Order::model()->findAll(array('condition' => 'user_id = ' . $loggedInUserId . ' And  status = 1 '));

        // Get all Dashboard Counts.
        $userDashInfo = $this->getUserCountDetails($loggedInUserId);

        // Get all user Dashboard(Sidebar) Notifications.       
        $userNotifications['lastsentmsg'] = $this->getDashboardNotifications('Mail', 'from_user_id', $loggedInUserId);
        $userNotifications['transaction_order'] = $this->getDashboardNotifications('Transaction', 'user_id', $loggedInUserId);
        $userNotifications['transaction_fund'] = $this->getDashboardNotifications('Transaction', 'user_id', $loggedInUserId);
        $userNotifications['package_purchased'] = $this->getDashboardNotifications('Order', 'user_id', $loggedInUserId);

        //Get referral chart Data.
        //$monthVal = date('n');

        
//            echo "<pre>"; print_r($userRefferalCharData);exit;

        $this->render('/user/dashboard', array(
            'orderObject' => $orderObject,
            'userDetails' => $userDashInfo,
            'userNotifications' => $userNotifications,
        ));
    }

    public function actionChangePassword() {
        $error = "";
        $success = "";
        $userObject = User::model()->findByPK(array('id' => Yii::app()->session['userid']));
        if (!empty($_POST)) {
            if ($_POST['UserProfile']['old_password'] != '' && $_POST['UserProfile']['new_password'] != '' && $_POST['UserProfile']['confirm_password'] != '') {
                if (md5($_POST['UserProfile']['master_pin']) == $userObject->master_pin) {
                    if ($userObject->password != md5($_POST['UserProfile']['old_password'])) {
                        $error .= "Incorrect old password";
                    } else {
                        $userObject->password = md5($_POST['UserProfile']['new_password']);
                        if ($userObject->update()) {
                            $userObjectArr = array();
                            $userObjectArr['full_name'] = $userObject->full_name;
                            $userObjectArr['name'] = $userObject->name;
                            $userObjectArr['ip'] = Yii::app()->params['ip'];
                            $userObjectArr['new_password'] = $_POST['UserProfile']['new_password'];
                            $success .= "Your password changed successfully";
                            $configMsg['to'] = $userObject->country_code.$userObject->phone; 
                            $configMsg['text'] = "Your master Pin Changed";
                            $responce = BaseClass::sendMail($configMsg);
                            $config['to'] = $userObject->email;
                            $config['subject'] = 'mGlobally Password Changed';
                            $config['body'] = $this->renderPartial('//mailTemp/change_password', array('userObjectArr' => $userObjectArr), true);

                            //$config['body'] = 'Hey ' . $userObject->full_name . ',<br/>You recently changed your password. As a security precaution, this notification has been sent to your email addresses.';
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
            'error' => $error, 'success' => $success,
        ));
    }

    /*
     * Function to change master pin
     */

    public function actionChangePin() {
        $errorMsg = "";
        $successMsg = "";
        $userObject = User::model()->findByPK(array('id' => Yii::app()->session['userid']));

        if (!empty($_POST)) {
            if ($_POST['UserProfile']['old_master_pin'] != '' && $_POST['UserProfile']['new_master_pin'] != '' && $_POST['UserProfile']['confirm_master_pin'] != '') {

                if ($userObject->master_pin != md5($_POST['UserProfile']['old_master_pin'])) {
                    $errorMsg .= "Incorrect old master pin";
                    $this->redirect('/profile/changepassword?errorMsg=' . $errorMsg);
                } else {
                    $userObject->master_pin = md5($_POST['UserProfile']['new_master_pin']);

                    if ($userObject->update()) {
                        $userObjectArr = array();
                        $userObjectArr['full_name'] = $userObject->full_name;
                        $userObjectArr['name'] = $userObject->name;
                        $userObjectArr['ip'] = Yii::app()->params['ip'];
                        $userObjectArr['new_master_pin'] = $_POST['UserProfile']['new_master_pin'];
                        $successMsg .= "Your pin changed successfully";
                        $config['to'] = $userObject->email;
                        $config['subject'] = 'mGlobally Master Pin Changed';
                        $config['body'] = $this->renderPartial('//mailTemp/change_pin', array('userObjectArr' => $userObjectArr), true);
                        //$config['body'] = 'Hey ' . $userObject->full_name . ',<br/>You recently changed your master pin. As a security precaution, this notification has been sent to your email addresses.';
                        CommonHelper::sendMail($config);
                        $this->redirect('/profile/changepassword?successMsg=' . $successMsg);
                    }
                }
            } else {
                $errorMsg .="Please fill all required(*) marked fields.";
                $this->redirect('/profile/changepassword?errorMsg=' . $errorMsg);
            }
        }

        $this->render('/user/change_master_pin', array(
            'errorMsg' => $errorMsg, 'successMsg' => $successMsg,
        ));
    }

    /*
     * function to invite refferals
     */

    public function actionInviteRefferal() {
        $error = "";
        $success = "";
        $userObject = User::model()->findByPK(Yii::app()->session['userid']);
        $link = Yii::app()->params['baseUrl'] . '/user/registration?spid=' . $userObject->name . '--email';
        if (!empty($_POST)) {
            if ($_POST['email'] != '') {
                $emailArr = $_POST['email'];
                $emailArray = explode(',', $emailArr);
                $userObjectArr = array();
                foreach ($emailArray as $email) {
                    $userObjectArr['full_name'] = $userObject->full_name;
                    $userObjectArr['name'] = $userObject->name;
                    $userObjectArr['email'] = $email;
                    $linkToSend = '<a href="' . $link . '">Click here to register now</a>';
                    $userObjectArr['link'] = $linkToSend;
                    $config['to'] = $email;
                    $config['subject'] = 'mGlobally Invitation From ' . $userObject->name;
                    $config['body'] = $this->renderPartial('//mailTemp/invitereffral', array('userObjectArr' => $userObjectArr), true);
                    CommonHelper::sendMail($config);
                }
                $success .= "Email sent successfully.";
            } else {
                $error .= "Email field can not be blank.";
            }
        }

        $this->render('/user/invite_refferals', array(
            'error' => $error, 'success' => $success, 'userObject' => $userObject
        ));
    }

    public function actionTrackRefferal() {
        $error = "";
        $success = "";
        $todayDate = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") - 1, date("Y")));
        $fromDate = date('Y-m-d');
        $loggedInUserId = Yii::app()->session['userid'];
        $userObject = User::model()->findByPK($loggedInUserId);
        $pageSize = 100;
        if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            $dataProvider = new CActiveDataProvider('User', array(
                'criteria' => array(
                    'condition' => ('sponsor_id="' . $userObject->name . '" AND social != "" AND created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '"'), 'order' => 'id DESC',
            )));
        } else {
            $dataProvider = new CActiveDataProvider('User', array(
                'criteria' => array(
                    'condition' => ('sponsor_id="' . $userObject->name . '" AND social != "" AND created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '"'), 'order' => 'id DESC',
            )));
        }
        $this->render('/user/track_refferal', array(
            'error' => $error, 'success' => $success, 'dataProvider' => $dataProvider
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

    /**
     * Function to get all user dashboard(Sidebar) Notifications.
     */
    public function getDashboardNotifications($model, $colName, $loggedInUserId) {
        $lastUpdatedTime = NULL;

        $modelObject = $model::model()->findAll(array('order' => 'updated_at DESC', 'limit' => 1, 'condition' => "$colName = :userId", 'params' => array(':userId' => $loggedInUserId)));
        if (isset($modelObject) && !empty($modelObject)) {
            $modelObject = $modelObject[0]; // Single array : LIMIT 1.
            $lastUpdatedTime = CommonHelper::getTimeAgo(strtotime($modelObject['updated_at']));
        }
        return $lastUpdatedTime;
    }

    /**
     * Get Current User Dashboard Count details. Eg: Refferal Under Me.
     */
    public function getUserCountDetails($loggedInUserId) {
        $userDetails = array();
        $userObject = User::model()->findByPK(array('id' => $loggedInUserId));
        $userDetails['refferal_count'] = User::model()->count('sponsor_id = :spon_id', array(':spon_id' => $userObject->name));
        $userDetails['addshare_count'] = UserSharedAd::model()->count('user_id = :userId AND social_id = :socId AND date < :cur_date', array(':userId' => $loggedInUserId, ':cur_date' => date('Y-m-d'), ':socId' => 1));
        $userDetails['addlapsed_count'] = UserSharedAd::model()->count('user_id = :userId AND social_id = :socId AND date < :cur_date', array(':userId' => $loggedInUserId, ':cur_date' => date('Y-m-d'), ':socId' => 0));
        $userDetails['transaction_order'] = Transaction::model()->count('user_id = :userId AND mode <> :mode', array(':userId' => $loggedInUserId, ':mode' => 'transfer'));
        $userDetails['transaction_fund'] = MoneyTransfer::model()->count('from_user_id = :userId OR to_user_id = :userId', array(':userId' => $loggedInUserId));
        $userDetails['package_purchased'] = Order::model()->count('user_id = :userId', array(':userId' => $loggedInUserId));

        return $userDetails;
    }

    /**
     * Function to get user chart refferal data.
     */
    public function actionGetRefferalChartData() {
        $loggedInUserId = Yii::app()->session['userid'];
        $monthArray = array(1,2,3,4,5);
        $currentYear = date('Y');
        $currentMonth = date('m');
        $toDay = date('01');
        $fromDay = date('31');
        
            $userObject = User::model()->findByPK(array('id' => $loggedInUserId));
            $userRefferalDetails = User::model()->findAllByAttributes(array('sponsor_id' => $userObject->name));
            $refferalIds = array();
            $type['base'] = 0;
            $type['advance'] = 0;
            $type['pro'] = 0;
            $myResultArray = array();
            if (isset($userRefferalDetails) && !empty($userRefferalDetails)) {
                $basePackageArray = array(1,2,3);
                $advPackageArray = array(4,5,6);
                $proPackageArray = array(7,8,9);
                foreach ($userRefferalDetails as $Object) {  
                    for ($x = 1; $x <= 6; $x++) { 
                        $myDate = strtotime(date("d/m/Y", strtotime($currentMonth)) . "+".$x." months");
                        $myMonth = date("m",$myDate); 
                        $toDate = $currentYear."-".$myMonth."-".$toDay;
                        $fromDate = $currentYear."-".$myMonth."-".$fromDay;

                        $attribs = array('user_id'=>$Object->id ,'status'=>'1');
                        $criteria = new CDbCriteria(array('order'=>'start_date DESC','limit'=>1));
                        $criteria->addBetweenCondition('start_date', $toDate, $fromDate);
                        $orderObject = Order::model()->findAllByAttributes($attribs, $criteria);

                       if(count($orderObject)>0) {  
                           $orderObject = $orderObject[0];
                           if(in_array($orderObject->package()->type, $basePackageArray)){
                                $type['base']++;
                           }
                           if(in_array($orderObject->package()->type, $advPackageArray)){
                                $type['advance']++;
                           }
                           if(in_array($orderObject->package()->type, $proPackageArray)){
                                $type['pro']++;
                           }
                        } else {
                           continue;
                       }
                       $myDataArray['month'] = $myMonth;
                       $myDataArray['type'] = $type;
                       array_push($myResultArray, $myDataArray);
                    }
                     
            }

        }
//        echo 1;exit;
        echo CJSON::encode($myResultArray);exit;
    }
}
