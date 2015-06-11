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
                                    'contactsetting', 'submitform','addcopyright','addfooter','addheader','pagefooter',
                                    'builder'),
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
    
    
    /*
     * Create Bulider with all these pages.
     */
    
    public function actionBuilder(){
        
        echo $tempID = Yii::app()->session['templateID']; echo "--";
        echo $userID = Yii::app()->session['userid']; 
        echo $orderID = Yii::app()->session['orderID'];
        
        $hasbuilderObject = UserHasTemplate::model()->findByAttributes(array('order_id' => Yii::app()->session['orderID']));
        
        $builderTempId = BuildTemp::model()->findByAttributes(array('template_id' => $tempID));        
        /* Get template JS data */
        $builderObjectJs = BuildTempJs::model()->findAll(array('condition' => 'temp_id ='. $builderTempId->id));       
        /* Get template CSS data */
        $builderObjectCss = BuildTempCss::model()->findAll(array('condition' => 'temp_id ='. $builderTempId->id));
        
        $userPagesObject = UserPages::model()->findAll(array('condition' => 'user_id=' . $userID . ' AND order_id=' . $orderID ));
  
         $tempMenu = $hasbuilderObject->user_menu;
        $i = 1;
        foreach ($userPagesObject as $pages) {
            $pat1 = '*' . $i . '*';
            $pat2 = '$' . $i . '$';
            $tempMenu = str_replace($pat1, strtolower($pages->page_name).".html", $tempMenu);
            $tempMenu = str_replace($pat2, ($pages->page_name), $tempMenu);
            $i++;
        }
       // echo $tempMenu;
        $tempMenu = stripcslashes($tempMenu);
//        print_r($tempMenu); die;
        
        $path = Yii::getPathOfAlias('webroot');       
        /*Create Folder And Permission */        
        if(!file_exists($path."/builder_images/".$userID.'/build'.$orderID)){
            !mkdir($path."/builder_images/".$userID.'/build'.$orderID, 0777, true);
        }
        if(!file_exists($path."/builder_images/".$userID.'/build'.$orderID.'/images/')){
            !mkdir($path."/builder_images/".$userID.'/build'.$orderID.'/images/', 0777, true);
        }
        
        if(!file_exists($path."/builder_images/".$userID.'/build'.$orderID.'/js/')){
            !mkdir($path."/builder_images/".$userID.'/build'.$orderID.'/js/', 0777, true);
        }
        
        if(!file_exists($path."/builder_images/".$userID.'/build'.$orderID.'/css/')){
            !mkdir($path."/builder_images/".$userID.'/build'.$orderID.'/css/', 0777, true);
        }
        
        BaseClass::recurse_copy($path."/user/template/".$builderTempId->folderpath."/images/", $path.'/builder_images/'.$userID.'/build'.$orderID."/images/");
        BaseClass::recurse_copy($path."/user/template/".$builderTempId->folderpath."/js/", $path.'/builder_images/'.$userID.'/build'.$orderID."/js/");
        BaseClass::recurse_copy($path."/user/template/".$builderTempId->folderpath."/css/", $path.'/builder_images/'.$userID.'/build'.$orderID."/css/");
      
        
        /* Create File and write ka code */
        $path = Yii::getPathOfAlias('webroot');               
        foreach($userPagesObject as $userPagesObjectList){
            
            $my_file = $path."/builder_images/".$userID.'/build'.$orderID.'/'.strtolower($userPagesObjectList->page_name).".html";
            $handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);	

$headMeta = '<!DOCTYPE html>
<html lang="en">
<head>
<title>'.$userPagesObjectList->page_name.'</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">' ;
           
            fwrite($handle, $headMeta);  
            
            foreach($builderObjectCss as $builderObjectListCss){
               $data = "\n".'<link rel="stylesheet" href="css/'.$builderObjectListCss->name.'" type="text/css" media="all">' ;           
                //stripslashes($userpagesObject->page_content) ;
                fwrite($handle, $data);
            } 
            foreach($builderObjectJs as $builderObjectListJs){
               $data = "\n".'<script type="text/javascript" src="js/'.$builderObjectListJs->name.'"></script>' ;           
                //stripslashes($userpagesObject->page_content) ;
                fwrite($handle, $data);
            }

            $headMetaEnd = "\n".'</head>';
            $headMetaEnd = "\n".'<body>';
            fwrite($handle, $headMetaEnd);
            
            /* For Header Content */
            $baseURL = Yii::app()->getBaseUrl(true);        
            $dataHeader = stripcslashes($hasbuilderObject->temp_header);        
            
        
$dataHeader .= "<script>    
    $(document).ready(function() {         
        var test = $('.mav_menu').html('".$tempMenu."');         
    });
    </script>";

            
            
            
            
            $data = "\n".str_replace('src="'.$baseURL.'/builder_images/'.$userID.'/'.$builderTempId->template_id.'/', 'src="images/' , $dataHeader);  
            fwrite($handle, $data);           
             
            /* For Page Content */
            $dataContent = stripcslashes($userPagesObjectList->page_content);        
            $data = "\n".str_replace('src="'.$baseURL.'/builder_images/'.$userID.'/'.$builderTempId->template_id.'/', 'src="images/' , $dataContent);  
            fwrite($handle, $data);        

            /* For Footer Content */        
            $data1 = stripcslashes($hasbuilderObject->temp_footer);        
            $data = "\n".str_replace('src="'.$baseURL.'/builder_images/'.$userID.'/'.$builderTempId->template_id.'/', 'src="images/' , $data1);  
            fwrite($handle, $data);
            $bodyEnd = "";
            $bodyEnd .= "\n".'</body>';
            $bodyEnd .= "\n".'</html>';
            fwrite($handle, $bodyEnd);
        }
        
        // define some basics
        echo $rootPath = $path."/builder_images/".$userID.'/build'.$orderID;
        $archiveName = 'build.zip';

        // initialize the ZIP archive
        $zip = new ZipArchive;
        $zip->open($archiveName, ZipArchive::CREATE);

        // create recursive directory iterator
        $files = new RecursiveIteratorIterator (new RecursiveDirectoryIterator($rootPath), RecursiveIteratorIterator::LEAVES_ONLY);

        foreach ($files as $name => $file) {
                $new_filename = $name;
                $zip->addFile($file, $new_filename);
        }

        // close the zip file
        if (!$zip->close()) {
                echo '<p>There was a problem writing the ZIP archive.</p>';
        } else {
                echo '<p>Successfully created the ZIP Archive!</p>';
        }

        
    }


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
        
        if (isset($_POST['template_id'])) {
            Yii::app()->session['templateID'] = $_POST['template_id'];
        } else {
            Yii::app()->session['templateID'] = Yii::app()->session['templateID'];
        }

        $templateObject = new UserHasTemplate;
        $buildTempObject = new BuildTemp;
        if (!empty($_POST)) {

            $tempID = Yii::app()->session['templateID'];
            $userID = Yii::app()->session['userid'];
            $buildertempObject = BuildTemp::model()->findByAttributes(array('template_id' => $tempID));

            $hasbuilderObject = UserHasTemplate::model()->findByAttributes(array('order_id' => Yii::app()->session['orderID']));
           
            /* Copy Image folder to another location */
            $path = Yii::getPathOfAlias('webroot');       
            /*Create Folder And Permission */
            if(!file_exists($path."/builder_images/".$userID)){
                !mkdir($path."/builder_images/".$userID.'/', 0777, true);
            }
            if(!file_exists($path."/builder_images/".$userID.'/'.$tempID)){
                !mkdir($path."/builder_images/".$userID.'/'.$tempID, 0777, true);
            }
            BaseClass::recurse_copy($path."/user/template/".$buildertempObject->folderpath."/images/", $path.'/builder_images/'.$userID.'/'.$tempID);
            
            if ($hasbuilderObject) {                 
                $hasUserTemplatePages = UserHasTemplate::model()->findAll(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID'] . ' AND  template_id = ' . $tempID )) ;
               
                /* Check Conditioin for template is proceed or not */                
                if(count($hasUserTemplatePages) == 0 ){                   
                    $orderId = Yii::app()->session['orderID'];
                    $hasbuilderObject = UserHasTemplate::model()->addAndEdit($hasbuilderObject, $buildertempObject,$orderId,$userID);

                    UserPages::model()->deleteAll(array('condition'=>'user_id = '.$userID .' AND order_id = '.$orderId));
                    UserPages::model()->createNewPages($userID, $orderId, 6, $buildertempObject->body()->body_content,$buildertempObject->template_id);
                }  
                
            } else { 
                $orderId = Yii::app()->session['orderID'];
                $templateObject = UserHasTemplate::model()->addAndEdit($templateObject, $buildertempObject,$orderId,$userID);
                /* Add Home page of website */
                UserPages::model()->createNewPages($userID, $orderId, 6, $buildertempObject->body()->body_content,$buildertempObject->template_id);
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
        if ($_POST) {
            if ($_POST['pages']['page_name'] != '' && $_POST['pages']['page_content'] != '') {
                $userpagesObject->page_name = $_POST['pages']['page_name'];
                $userpagesObject->page_content = addslashes($_POST['pages']['page_content']);
                $userpagesObject->page_form = $_POST['pages']['form_allowed'];
                $userpagesObject->status = $_POST['pages']['status'];
                $userpagesObject->update(false);
                $success .= "Page updated successfully";
            } else {
                $error .= "Please fill required(*) marked fields.";
            }
        }
        $userpagesObjectF = UserPages::model()->findAll(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));
        $orderObject = Order::model()->findByAttributes(array('id' => Yii::app()->session['orderID']));
        
        $this->render('pagedit', array('userpagesObjectF' => $userpagesObjectF, 'success' => $success, 'error' => $error, 'userpagesObject' => $userpagesObject, 'orderObject' => $orderObject));
    }

    public function actionFetchMenu() {
        $responce = "";
        $userId = Yii::app()->session['userid'] ;
        $userpagesObject = UserPages::model()->findAll(array('condition' => 'user_id ='. $userId .' AND order_id = ' .Yii::app()->session['orderID']  .' AND status = 1 ' ));
        
        $buildTempHeader = UserHasTemplate::model()->findByAttributes(array('user_id' => $userId, 'order_id'=>Yii::app()->session['orderID']));

        $bb = stripcslashes(stripcslashes($buildTempHeader->user_menu));
       
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
    public function actionAddHeader(){       
        $error = "";
        $success = "";
        $templateObject = new UserHasTemplate;
        $userhasObject = UserHasTemplate::model()->findByAttributes(array('order_id' => Yii::app()->session['orderID'], 'user_id' => Yii::app()->session['userid']));
               
        if (!empty($_POST) ) {            
            $userhasObject->temp_header = addslashes($_POST['header_code']);           
            $userhasObject->update();
            $success = "Header Updated Successfully";
        }
        
//        $userhasObject = UserHasTemplate::model()->findByAttributes(array('order_id' => Yii::app()->session['orderID'], 'user_id' => Yii::app()->session['userid']));
        $userpagesObject = UserPages::model()->findAll(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));
        $this->render('header', array('success' => $success, 'error' => $error, 'userpagesObject' => $userpagesObject,'userhasObject' => $userhasObject));
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
                    $userhasObject->logo_height = $_POST['height'];
                    $userhasObject->logo_width = $_POST['width'];
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
    
        $responce = '<img height="'.$userhasObject[0]->logo_height.'" width="'.$userhasObject[0]->logo_width.'" src="/user/template/' .$builderObjectmeta->folderpath . '/'. $userhasObject[0]->logo . '">';
        echo $responce;
    }

    public function actionPageContent() { 
        $response = "";        
        $responseForm = "";        
        $userpageObject = UserPages::model()->findBYPK($_REQUEST['page_id']);
        
        if($userpageObject->page_form == 1){            
            $userhasObject = UserHasTemplate::model()->findByAttributes(array('user_id' => Yii::app()->session['userid'] , 'order_id' => Yii::app()->session['orderID']));    
            $responseForm = stripslashes($userhasObject->contact_form);                       
            
        }
        
        $response = stripslashes($userpageObject->page_content);
        echo $response."aaaaa".$responseForm ;

    }
    
    public function actionPageFooter(){         
        $userhasObject = UserHasTemplate::model()->findByAttributes(array('user_id' => Yii::app()->session['userid'] , 'order_id' => Yii::app()->session['orderID']));       
        echo $response = stripslashes($userhasObject->temp_footer); 
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
