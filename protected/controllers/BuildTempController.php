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
                                    'builder','buildercreate','menusetting'),
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
     * Create Bulider with all these pages.
     */
    
    public function actionBuilder(){
        
        if (isset($_POST['master_pin'])) {
		
		$error = "";			
		$masterkey = $_POST['master_pin'];
		
		$getUserObject = User::model()->findByAttributes(array('id' => Yii::app()->session['userid'], 'status' => 1 ,'master_pin' => md5($masterkey) ));
		
                if (!empty($getUserObject)) {				
                    
                    $tempId = base64_decode($_GET['t']);         
                    $userId = base64_decode($_GET['u']); 
                    $orderId = base64_decode($_GET['o']);

                    $hasbuilderObject = UserHasTemplate::model()->findByAttributes(array('order_id' => $orderId ));        
                    $builderTempId = BuildTemp::model()->findByAttributes(array('template_id' => $tempId));        
                    
                    /* For all pages */
                    $userPagesObjectAll = UserPages::model()->findAll(array('condition' => 'user_id=' . $userId . ' AND order_id=' . $orderId ));

                    /* For only parent pages */
                    $userPagesObject = UserPages::model()->findAll(array('condition' => 'user_id=' . $userId . ' AND parent = 0 AND order_id=' . $orderId ));
                    $menuHtml ="";
                    $mainMenu =  explode(',',$hasbuilderObject->user_menu) ;
                    $p = 1; 
                    $ul = "";
                    $li = "";
                    if(isset($mainMenu[0])){ $ul = stripslashes($mainMenu[0]); }
                    if(isset($mainMenu[1])){ $li = stripslashes($mainMenu[1]); }
                    
                    $menuHtml .= '<ul '.$ul.'>';
                    foreach ($userPagesObject as $data){

                        $menuHtml .= '<li'.$li.'>';
                        if($p == 1){
                            $pageLink = "index.html";
                        }else{
                            $pageLink = strtolower($data->page_name).".html" ;
                        }                                   
                        $menuHtml .= '<a href='.$pageLink.'>'.$data->page_name.'</a>' ;
                        $userpagesObjectAll = UserPages::model()->findAll('parent ='. $data->id);
                        if(count($userpagesObjectAll) > 0){
                            $menuHtml .= '<ul>';
                                foreach ($userpagesObjectAll as $dataSecond){
                                    $menuHtml .= '<li>'
                                    . '<a href='.strtolower($dataSecond->page_name).".html".'>'.$dataSecond->page_name.'</a>'
                                    .'</li>';
                                }    
                            $menuHtml .= '</ul>';
                        }
                        $menuHtml .=  '</a></li>';    
                        $p++;
                    }
                    $menuHtml .=  '</ul><div class="clear"></div>';

                    $path = Yii::getPathOfAlias('webroot');       
                    /*Create Folder And Permission */        
                    if(!file_exists($path."/builder_images/".$userId.'/build'.$orderId)){
                        !mkdir($path."/builder_images/".$userId.'/build'.$orderId, 0777, true);
                    }
                    if(!file_exists($path."/builder_images/".$userId.'/build'.$orderId.'/images/')){
                        !mkdir($path."/builder_images/".$userId.'/build'.$orderId.'/images/', 0777, true);
                    }

                    if(!file_exists($path."/builder_images/".$userId.'/build'.$orderId.'/js/')){
                        !mkdir($path."/builder_images/".$userId.'/build'.$orderId.'/js/', 0777, true);
                    }

                    if(!file_exists($path."/builder_images/".$userId.'/build'.$orderId.'/css/')){
                        !mkdir($path."/builder_images/".$userId.'/build'.$orderId.'/css/', 0777, true);
                    }

                    BaseClass::recurse_copy($path."/user/template/".$builderTempId->folderpath."/images/", $path.'/builder_images/'.$userId.'/build'.$orderId."/images/");
                    BaseClass::recurse_copy($path."/user/template/".$builderTempId->folderpath."/js/", $path.'/builder_images/'.$userId.'/build'.$orderId."/js/");
                    BaseClass::recurse_copy($path."/user/template/".$builderTempId->folderpath."/css/", $path.'/builder_images/'.$userId.'/build'.$orderId."/css/");

                    /* Create File and write ka code */
                    $path = Yii::getPathOfAlias('webroot');               
                    $pageName= 1;
                    foreach($userPagesObjectAll as $userPagesObjectList){
                        if($pageName == 1 ){
                            $my_file = $path."/builder_images/".$userId.'/build'.$orderId."/index.html";
                        }else{
                            $my_file = $path."/builder_images/".$userId.'/build'.$orderId.'/'.strtolower($userPagesObjectList->page_name).".html";
                        }    
                        $handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);	
                        
                        $html = '<html>'."\n". '<head>';
                        fwrite($handle, $html);
                        
                        $headMeta = stripcslashes($hasbuilderObject->head_content) ;                        
                        $siteTitle = "";
                        if($hasbuilderObject->site_title){
                            $siteTitle = " | ".$hasbuilderObject->site_title ;
                        }                        
                        $dataHead = str_replace( '<title>Home</title>' , '<title>'.$userPagesObjectList->page_name.$siteTitle.'</title>' , $headMeta);  
                        fwrite($handle, $dataHead);
                        
                        $headMetaEnd = "\n". '</head>'."\n".'<body>';
                        fwrite($handle, $headMetaEnd);

                        /* For Header Content */
                        $baseURL = Yii::app()->getBaseUrl(true);        
                        $dataHeader = stripcslashes($hasbuilderObject->temp_header); 
                        $logoImage = '<img height="'.$hasbuilderObject->logo_height.'" width="'.$hasbuilderObject->logo_width.'" src="/user/template/' .$builderTempId->folderpath . '/'. $hasbuilderObject->logo . '">'; 
                        $removeSpaces = preg_replace('/\s+/', ' ', $dataHeader); // for replacing issue
                        $logoReplace = preg_replace('#<div class="mav_logo">(.*?)</div>#', stripslashes($logoImage) , $removeSpaces);
                        $dataHeader = preg_replace('#<div class="mav_menu">(.*?)</div>#', $menuHtml , $logoReplace);

                        $data = "\n".str_replace('src="'.$baseURL.'/builder_images/'.$userId.'/'.$builderTempId->template_id.'/', 'src="images/' , $dataHeader);  
                        fwrite($handle, $data);           

                        /* For Page Content */
                        if($userPagesObjectList->page_form == 1 ){

                            copy($path."/user/contact.php", $path.'/builder_images/'.$userId.'/build'.$orderId."/contact.php");
                            
                            $data = file_get_contents($path.'/builder_images/'.$userId.'/build'.$orderId."/contact.php");
                            $hasbuilderObject->contact_email ;                    
                            $newdata = str_replace('gmail.com', $hasbuilderObject->contact_email, $data);
                            file_put_contents($path.'/builder_images/'.$userId.'/build'.$orderId."/contact.php", $newdata);

                            $dataContent = stripcslashes($hasbuilderObject->contact_form);        
                            $data = "\n".str_replace('src="'.$baseURL.'/builder_images/'.$userId.'/'.$builderTempId->template_id.'/', 'src="images/' , $dataContent);  
                        }else{
                            $dataContent = stripcslashes($userPagesObjectList->page_content);        
                            $data = "\n".str_replace('src="'.$baseURL.'/builder_images/'.$userId.'/'.$builderTempId->template_id.'/', 'src="images/' , $dataContent);  
                        }

                        fwrite($handle, $data);        

                        /* For Footer Content */        
                        $data1 = stripcslashes($hasbuilderObject->temp_footer);        
                        $data = "\n".str_replace('src="'.$baseURL.'/builder_images/'.$userId.'/'.$builderTempId->template_id.'/', 'src="images/' , $data1);  
                        fwrite($handle, $data);
                        $bodyEnd = "";
                        $bodyEnd .= "\n".'</body>';
                        $bodyEnd .= "\n".'</html>';
                        fwrite($handle, $bodyEnd);
                        $pageName++;
                    }

                    // define some basics
                    $rootPath = $path."/builder_images/".$userId.'/build'.$orderId;
                    $archiveName = 'hey.zip';

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
                        '<p>There was a problem writing the ZIP archive.</p>';
                    } else {
                        '<p>Successfully created the ZIP Archive!</p>';
                    }
                    
                    $builderObject = UserHasTemplate::model()->findByAttributes(array('order_id' => $orderId, 'user_id' => Yii::app()->session['userid']));

                    $builderObject->publish = 1 ;
                    $builderObject->update();
                    
//                    echo "<script> alert('Thank You. Your site has been publish') </script>";                 
                    $this->redirect(array('order/list?m=msg'));    

                }else{    
                   $this->redirect(array('/BuildTemp/builder?m=msg&o='.$_GET['o']."&u=".$_GET['u']."&t=".$_GET['t']));
                }
            }

            if(isset($_GET['t']) && isset($_GET['u']) &&  isset($_GET['o'])) {
                echo "hey";
                $this->render('buildtemp');
            }        
    }
    

    public function actionMenuSetting(){
        $error = "";
        $success = "";
        $userhasObject = UserHasTemplate::model()->find(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));
        
        if ($_POST) {
            $arr = json_decode(stripslashes($_POST['nestable1']),true) ;
            foreach ($arr as $key => $jsons) { // This will search in the 2 jsons
                foreach ($jsons as $key => $first) {
                    if (is_array($first) || is_object($first)) {
                        foreach ($first as $key => $second) {
                            foreach ($second as $key => $third) {
                                $userpagesObject = UserPages::model()->findByPk($third);
                                $userpagesObject->parent = $firstParent;
                                $userpagesObject->save();                                
                            }
                        }  // And then goes print 16,16,8 ...
                    } else {
                        $firstParent = "";
                        echo $first; // This will show jsut the value f each key like "var1" will print 9
                        $userpagesObject = UserPages::model()->findByPk($first);
                        $userpagesObject->parent = 0;
                        $userpagesObject->save();  
                        $firstParent .= $first;
                    }
                }
            }
            $success = "Update Successfully.";
        }        
        $userpagesObject = UserPages::model()->findAll(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID'] . ' AND parent = 0 ' ));       
        $this->render('menusetting', array('success' => $success, 'error' => $error, 'userhasObject' => $userhasObject,'userpagesObject'=> $userpagesObject));
   
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
        $id = array_keys($_GET);
        if($id){
            $pageId = $id[0] ;
        }
        
        $templateObject = new UserHasTemplate;
        $buildTempObject = new BuildTemp;
        $userpages1Object = UserPages::model()->find(array('order' => 'id ASC', 'condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));
        $builderObjectz = UserHasTemplate::model()->findByAttributes(array('order_id' => Yii::app()->session['orderID'], 'user_id' => Yii::app()->session['userid']));

        /* Get template id  */
        $builderTempId = BuildTemp::model()->findByAttributes(array('template_id' => $builderObjectz->template_id));        
        $builderObjectmeta = BuildTemp::model()->findByAttributes(array('template_id' => $builderObjectz->template_id));
        
        /*Logo Image */
        $responce = "";
        $userhasObject = UserHasTemplate::model()->findAll(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));
        
        $builderObjectmeta = BuildTemp::model()->findByAttributes(array('template_id' => $userhasObject[0]->template_id));
    
        $logoImage = '<img height="'.$userhasObject[0]->logo_height.'" width="'.$userhasObject[0]->logo_width.'" src="/user/template/' .$builderObjectmeta->folderpath . '/'. $userhasObject[0]->logo . '">'; 
        
        /* For Getting Menu */
        $responce = "";
        $userId = Yii::app()->session['userid'] ;
        $userpagesObject = UserPages::model()->findAll(array('condition' => 'user_id ='. $userId .' AND order_id = ' .Yii::app()->session['orderID']  .' AND status = 1 AND parent = 0 ' ));        
        $buildTempHeader = UserHasTemplate::model()->findByAttributes(array('user_id' => $userId, 'order_id'=>Yii::app()->session['orderID']));
        $mainMenu =  explode(',',$buildTempHeader->user_menu) ;

        $ul = "";
        $li = "";
        if(isset($mainMenu[0])){ $ul = stripslashes($mainMenu[0]); }
        if(isset($mainMenu[1])){ $li = stripslashes($mainMenu[1]); }
        $menuHtml ="";
        $menuHtml .= '<ul '.$ul.' >';
        foreach ($userpagesObject as $data){            
            $menuHtml .= '<li '.$li.' >
                    <a href='.$data->id.'>'.$data->page_name.'</a>' ;
                        $userpagesObjectAll = UserPages::model()->findAll('parent ='. $data->id);
                        if(count($userpagesObjectAll) > 0){
                            $menuHtml .= '<ul>';
                                foreach ($userpagesObjectAll as $dataSecond){
                                    $menuHtml .= '<li>'
                                    . '<a href='.$dataSecond->id.'>'.$dataSecond->page_name.'</a>'
                                    .'</li>';
                                }    
                            $menuHtml .= '</ul>';
                        }
                 $menuHtml .=  '</a></li>';                
        }
         $menuHtml .=  '</ul><div class="clear"></div>';
  
//        $menuHtml ;
//        die;
        /* For Getting Page Content */
        $response = "";        
        $responseForm = "";        
        $userpageObject = UserPages::model()->findBYPK($pageId);
        
        if($userpageObject->page_form == 1){            
            $userhasObject = UserHasTemplate::model()->findByAttributes(array('user_id' => Yii::app()->session['userid'] , 'order_id' => Yii::app()->session['orderID']));    
            $responseForm = stripslashes($userhasObject->contact_form);  
        }
        
        $response = stripslashes($userpageObject->page_content);
        $pageContent = $response ;
        
        $this->renderPartial('user_templates', array('userpages1Object' => $userpages1Object, 'builderObject' => $builderObjectz, 'edit' => 1,'builderObjectmeta' => $builderObjectmeta ,
            'builderTempId'=>$builderTempId,'menuHtml'=>$menuHtml,"pageContent"=>$pageContent ,'logoImage' =>$logoImage , 'responseForm' => $responseForm));
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
            /* Number of pages creation*/
            $pageCount = BaseClass::pagesCount(Yii::app()->session['orderID']);
            
            if ($hasbuilderObject) {                 
                $hasUserTemplatePages = UserHasTemplate::model()->findAll(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID'] . ' AND  template_id = ' . $tempID )) ;
               
                /* Check Conditioin for template is proceed or not */                
                if(count($hasUserTemplatePages) == 0 ){                   
                    $orderId = Yii::app()->session['orderID'];
                    $hasbuilderObject = UserHasTemplate::model()->addAndEdit($hasbuilderObject, $buildertempObject,$orderId,$userID);

                    UserPages::model()->deleteAll(array('condition'=>'user_id = '.$userID .' AND order_id = '.$orderId));
                    UserPages::model()->createNewPages($userID, $orderId, $pageCount, $buildertempObject->body()->body_content,$buildertempObject->template_id);
                }  
                
            } else { 
                $orderId = Yii::app()->session['orderID'];
                $templateObject = UserHasTemplate::model()->addAndEdit($templateObject, $buildertempObject,$orderId,$userID);
                /* Add Home page of website */
                UserPages::model()->createNewPages($userID, $orderId, $pageCount, $buildertempObject->body()->body_content,$buildertempObject->template_id);
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
    
//    public function actionPageFooter(){         
//        $userhasObject = UserHasTemplate::model()->findByAttributes(array('user_id' => Yii::app()->session['userid'] , 'order_id' => Yii::app()->session['orderID']));       
//        echo $response = stripslashes($userhasObject->temp_footer); 
//    }
    
    function actionContactSetting() {
        $error = "";
        $success = "";
        $userhasObject = UserHasTemplate::model()->find(array('condition' => 'user_id=' . Yii::app()->session['userid'] . ' AND order_id=' . Yii::app()->session['orderID']));
        if ($_POST) {
            if ($_POST['email'] != '') {
                $userhasObject->contact_email = $_POST['email'];
                $userhasObject->contact_form = addslashes($_POST['contact']);
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
