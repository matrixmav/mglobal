<?php

class BuildTempController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'inner';

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
                'actions' => array('index', 'templates', 'usertemplates', 'managewebsite', 'editheader', 
                                    'userinput', 'pagedit', 'fetchmenu', 'addlogo', 'pageadd', 'fetchlogo', 'pagecontent',
                                    'contactsetting', 'submitform','addcopyright','addfooter','pagefooter'),
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
     * Function to fetch templates
     */

    public function actionTemplates() {  
        $builderObject = BuildTemp::model()->findAll(array('condition' => 'screenshot != ""'));
        Yii::app()->session['orderID'] = $_GET['id'];
        $this->render('templates', array('builderObject' => $builderObject));
    }

    public function actionUserTemplates() {
        $builderObject = BuildTemp::model()->findByAttributes(array('template_id' => '35'));
        $this->renderPartial('user_templates', array('builderObject' => $builderObject));
    }

    public function actionManageWebsite() {
        $templateObject = new UserHasTemplate;
        $buildTempObject = new BuildTemp;
        $userpages1Object = UserPages::model()->find(array('order' => 'id ASC', 'condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));
        $builderObjectz = UserHasTemplate::model()->findByAttributes(array('order_id' => Yii::app()->session['orderID'], 'user_id' => Yii::app()->session['userid']));

        /* Get template id  */
        $builderTempId = BuildTemp::model()->findByAttributes(array('template_id' => $builderObjectz->template_id));
        
        /* Get template JS data */
        $builderObjectJs = BuildTempJs::model()->findAll(array('condition' => 'temp_id ='. $builderTempId->id));
       
        /* Get template CSS data */
        $builderObjectCss = BuildTempCss::model()->findAll(array('condition' => 'temp_id ='. $builderTempId->id));
        
        $builderObjectmeta = BuildTemp::model()->findByAttributes(array('template_id' => $builderObjectz->template_id));
        $this->renderPartial('user_templates', array('userpages1Object' => $userpages1Object, 'builderObject' => $builderObjectz, 'edit' => 1, 'builderObjectmeta' => $builderObjectmeta ,'builderObjectJs'=>$builderObjectJs,'builderObjectCss'=>$builderObjectCss));
    }

    public function actionEditHeader() {
        $builderObject = UserHasTemplate::model()->findByAttributes(array('order_id' => Yii::app()->session['orderID'], 'user_id' => Yii::app()->session['userid']));

        if (!empty($_POST['Header'])) {

            $builderObject->temp_header = $_POST['Header']['header_content'];
            $builderObject->update();
        }
        $this->render('editheader', array('builderObject' => $builderObject));
    }

    public function actionUserInput() {
        $success = "";
        $error = "";                 
        
        //if (!isset(Yii::app()->session['templateID'])) {
        if (isset($_POST['template_id'])) {
            Yii::app()->session['templateID'] = $_POST['template_id'];
        } else {
            Yii::app()->session['templateID'] = Yii::app()->session['templateID'];
        }

        print_r($_SESSION);
        $templateObject = new UserHasTemplate;
        $buildTempObject = new BuildTemp;
        if (!empty($_POST)) {

            $tempID = Yii::app()->session['templateID'];
            $userID = Yii::app()->session['userid'];
            $buildertempObject = BuildTemp::model()->findByAttributes(array('template_id' => $tempID));

            $hasbuilderObject = UserHasTemplate::model()->findByAttributes(array('order_id' => Yii::app()->session['orderID']));

            if ($hasbuilderObject) {  
                $hasbuilderObject->category_id = $buildertempObject->category_id;
                $hasbuilderObject->user_id = $userID;
                $hasbuilderObject->template_id = $buildertempObject->template_id;
                $hasbuilderObject->temp_header = $buildertempObject->header->header_content;
                $templateObject->user_menu = $buildertempObject->header->menu;
                $hasbuilderObject->temp_body = $buildertempObject->body->body_content;
                $hasbuilderObject->temp_footer = $buildertempObject->footer->footer_content;
                $hasbuilderObject->order_id = Yii::app()->session['orderID'];
                $hasbuilderObject->publish = 0;
                $hasbuilderObject->created_at = date('Y-m-d');
                $hasbuilderObject->update(false);
            } else { 
                $templateObject->category_id = $buildertempObject->category_id;
                $templateObject->user_id = $userID;
                $templateObject->template_id = $buildertempObject->template_id;
                $templateObject->temp_header = $buildertempObject->header->header_content;
                $templateObject->user_menu = $buildertempObject->header->menu;
                $templateObject->temp_body = $buildertempObject->body->body_content;
                $templateObject->temp_footer = $buildertempObject->footer->footer_content;
                $templateObject->order_id = Yii::app()->session['orderID'];
                $templateObject->publish = 0;
                $templateObject->created_at = date('Y-m-d');
                $templateObject->save(false);
                
                /* Add Home page of website */
                for($i=1; $i<6; $i++){
                    $userpagesObject1 = new UserPages;
                    $userpagesObject1->order_id = Yii::app()->session['orderID'];
                    $userpagesObject1->user_id = Yii::app()->session['userid'];
                    $userpagesObject1->page_name = 'Page'.$i;
                    if($i == 1){
                        $userpagesObject1->page_name = 'Home';
                    }
                    $userpagesObject1->page_content = $buildertempObject->body->body_content;
                    $userpagesObject1->created_at = date("Y-m-d");
                    $userpagesObject1->save(false);   
                }
           }
        }
        $userpagesObject = UserPages::model()->findAll(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));
        $this->render('userinput', array('success' => $success, 'error' => $error, 'userpagesObject' => $userpagesObject));
    }

    public function actionpageadd() {
         
        $success = "";
        $error = "";
        $userpagesObject = UserPages::model()->findAll(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));
        $userpagesObject1 = new UserPages;
        
        if (isset($_POST['submit'])) {
           
            if ($_POST['pages']['page_name'] != '' && $_POST['pages']['page_content'] != '') {
                $userpagesObject1->order_id = Yii::app()->session['orderID'];
                $userpagesObject1->user_id = Yii::app()->session['userid'];
                $userpagesObject1->page_name = $_POST['pages']['page_name'];
                $userpagesObject1->page_content = $_POST['pages']['page_content'];
                $userpagesObject1->created_at = date("Y-m-d");
                $userpagesObject1->save(false);
                $success .= "Page added successfully";
            } else {
                $error .= "Please fill required(*) marked fields.";
            }
        }
        $userpagesObject = UserPages::model()->findAll(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));
        $this->render('userinput', array('success' => $success, 'error' => $error, 'userpagesObject' => $userpagesObject));
    }

    public function actionPagedit() {
        $success = "";
        $error = "";
        $userpagesObject = UserPages::model()->findByPK($_REQUEST['id']);
        $userpagesObjectF = UserPages::model()->findAll(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));

        if ($_POST) {
            if ($_POST['pages']['page_name'] != '' && $_POST['pages']['page_content'] != '') {
                $userpagesObject->page_name = $_POST['pages']['page_name'];
                $userpagesObject->page_content = $_POST['pages']['page_content'];
                $userpagesObject->page_form = $_POST['pages']['form_allowed'];
                $userpagesObject->update(false);
                $success .= "Page updated successfully";
            } else {
                $error .= "Please fill required(*) marked fields.";
            }
        }
        $orderObject = Order::model()->findByAttributes(array('id' => Yii::app()->session['orderID']));
        $this->render('pagedit', array('userpagesObjectF' => $userpagesObjectF, 'success' => $success, 'error' => $error, 'userpagesObject' => $userpagesObject, 'orderObject' => $orderObject));
    }

    public function actionFetchMenu() {
        $responce = "";
        $userpagesObject = UserPages::model()->findAll(); 
         
        $buildTempHeader = UserHasTemplate::model()->findByPk(10);
       
        $bb = stripcslashes($buildTempHeader->user_menu);
       
        $i = 1;
        foreach ($userpagesObject as $pages) {
            $pat1 = '*' . $i . '*';
            $pat2 = '$' . $i . '$';
            $bb = str_replace($pat1, $pages->id, $bb);
            $bb = str_replace($pat2, $pages->page_name, $bb);
            $i++;
        }
        echo $bb;  
    }

    
     public function actionAddCopyRight() {
        $error = "";
        $success = "";
        $templateObject = new UserHasTemplate;
        $userhasObject = UserHasTemplate::model()->findByAttributes(array('order_id' => Yii::app()->session['orderID'], 'user_id' => Yii::app()->session['userid']));
        if (!empty($_POST) ) {            
            $userhasObject->copyright = $_POST['copyright'];           
            $userhasObject->update();
            $success = "Copy Right Updated Successfully";
        }
        $userpagesObject = UserPages::model()->findAll(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));
        $this->render('copyright', array('success' => $success, 'error' => $error, 'userpagesObject' => $userpagesObject,'userhasObject' => $userhasObject));
    }
    
    /* For updating footer text */
    public function actionAddFooter(){
        $error = "";
        $success = "";
        $templateObject = new UserHasTemplate;
        $userhasObject = UserHasTemplate::model()->findByAttributes(array('order_id' => Yii::app()->session['orderID'], 'user_id' => Yii::app()->session['userid']));
       
        if (!empty($_POST) ) {            
            $userhasObject->temp_footer = addslashes($_POST['footer_code']);           
            $userhasObject->update();
            $success = "Footer Updated Successfully";
        }
        $userpagesObject = UserPages::model()->findAll(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));
        $this->render('footer', array('success' => $success, 'error' => $error, 'userpagesObject' => $userpagesObject,'userhasObject' => $userhasObject));
    }
    
    
    public function actionAddLogo() {
        $error = "";
        $success = "";
        $templateObject = new UserHasTemplate;
        $userhasObject = UserHasTemplate::model()->findByAttributes(array('order_id' => Yii::app()->session['orderID'], 'user_id' => Yii::app()->session['userid']));
        $builderObjectmeta = BuildTemp::model()->findByAttributes(array('template_id'=>$userhasObject->template_id));
        //echo "<pre>";
        
        if (!empty($_FILES) || !empty($_POST) ) {
            $userhasObject->site_title = addslashes($_POST['site_title']);
            if ($_FILES['logo']['name']) {
                $ext1 = end((explode(".", $_FILES['logo']['name'])));
                if ($ext1 != "jpg" && $ext1 != "png" && $ext1 != "jpeg") {
                    $error .= "Please upload mentioned file type.";
                } else {
                    $fname = time() . $_FILES['logo']['name'];

                    $userhasObject->logo = $fname;
                    $userhasObject->update();
                    $path = Yii::getPathOfAlias('webroot') . "/user/template/".$builderObjectmeta->folderpath."/";
                    BaseClass::uploadFile($_FILES['logo']['tmp_name'], $path, $fname);
                    $success .= "Logo added successfully";
                }
            } 
             $userhasObject->update();
        }
        $userpagesObject = UserPages::model()->findAll(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));       
        $this->render('addlogo', array('success' => $success, 'error' => $error, 'userpagesObject' => $userpagesObject,'userhasObject'=>$userhasObject,'builderObjectmeta'=>$builderObjectmeta));
    }

    public function actionFetchLogo() {
        $responce = "";
        $userhasObject = UserHasTemplate::model()->findAll(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));
        foreach ($userhasObject as $userhas) {
            
        }
        
        
        $builderObjectmeta = BuildTemp::model()->findByAttributes(array('template_id' => $userhas->template_id));
        $responce .= '<img height="100" width="100" src="/user/template/logos/' . $userhas->logo . '">';
        echo $responce;
    }

    public function actionPageContent() { 
        $responce = "";        
        $userpageObject = UserPages::model()->findBYPK($_REQUEST['page_id']);
        
        echo stripslashes($userpageObject->page_content) ; //die;
     // echo  $response = stripslashes($userpageObject->page_content);
         
    }
    
    public function actionPageFooter(){ 
        $userhasObject = UserHasTemplate::model()->findByAttributes(array('user_id' => Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));
        echo $response = stripslashes($userhasObject->temp_footer); die;
    }
            

    function actionContactSetting() {
        $error = "";
        $success = "";
        $userhasObject = UserHasTemplate::model()->find(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));
        if ($_POST) {
            if ($_POST['email'] != '') {
                $userhasObject->contact_email = $_POST['email'];
                $userhasObject->update();
                $success .= "Contact setting updated successfully.";
            } else {
                $error .= "Please fill all required(*)marked fields.";
            }
        }
        $userpagesObject = UserPages::model()->findAll(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));       
        
        $this->render('contactsetting', array('success' => $success, 'error' => $error, 'userhasObject' => $userhasObject,'userpagesObject'=> $userpagesObject));
    }

    public function actionSubmitForm() {
        $error = "";
        $success = "";

        $userhasObject = UserHasTemplate::model()->find(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));
        if ($_REQUEST) {
            if ($_REQUEST['name'] != '' && $_REQUEST['email'] != '' && $_REQUEST['message'] != '') {
                /* $config['to'] = $userhasObject->contact_email; 
                  $config['subject'] = 'Contact Query Submitted' ;
                  $config['body'] = 'Dear Admin! New query submitted on your site '.
                  '<strong>Name:</strong>'.$_POST['name'].'<br/><br/>'.
                  '<strong>Email:</strong>'.$_POST['email'].'<br/><br/>'.
                  '<strong>Message:</strong>'.$_POST['message'].'<br/><br/>';

                  CommonHelper::sendMail($config); */

                echo 1;
            }
        }
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
