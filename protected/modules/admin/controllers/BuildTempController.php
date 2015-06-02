<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BuildTempController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'main';

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
                'actions' => array('index', 'categoryadd', 'categoryedit', 'categorylist', 'deletecategory',
                                   'changestatus', 'templatelist', 'templateheaderedit', 'templatebodyedit',
                                   'templatefooteredit', 'templateheaderadd', 'templatebodyadd', 'templatefooteradd',
                                   'customcode'),
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

    public function actionIndex() {
        $this->render('index');
    }

    /*
     * function to add builder category
     */

    public function actionCategoryAdd() {
        $error = "";
        $success = "";
        $categoryObject = new BuildCategory;
        if ($_POST) {
            if ($_POST['Category']['name'] != '') {
                $categoryObject->name = $_POST['Category']['name'];
                $categoryObject->status = 1;
                $categoryObject->created_at = date('Y-m-d');
                if ($categoryObject->save(false)) {
                    $this->redirect(array('categorylist', 'msg' => 1));
                }
            } else {
                $error .= "Please fill all required(*) marked fields";
            }
        }
        $this->render('/builder/category_add', array('error' => $error, 'success' => $success));
    }

    /*
     * Function to edit bilder category
     */

    public function actionCategoryEdit() {
        $error = "";
        $success = "";
        if ($_REQUEST['id']) {
            $categoryObject = BuildCategory::model()->findByPk($_REQUEST['id']);
            if ($_POST) {
                if ($_POST['Category']['name'] != '') {
                    $categoryObject->name = $_POST['Category']['name'];
                    $categoryObject->created_at = date('Y-m-d');
                    if ($categoryObject->save(false)) {
                        $this->redirect(array('categorylist', 'msg' => 2));
                    }
                } else {
                    $error .= "Please fill all required(*) marked fields";
                }
            }
        }
        $this->render('/builder/category_edit', array('error' => $error, 'success' => $success, 'categoryObject' => $categoryObject));
    }

    /*
     * Function to list bilder category
     */

    public function actionCategoryList() {
        $dataProvider = new CActiveDataProvider('BuildCategory', array(
            'pagination' => array('pageSize' => 10),
        ));
        $this->render('/builder/category_list', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /*
     * Function to fetch Package list
     */

    public function actionChangeStatus() {


        if ($_REQUEST['id']) {
            $categoryObject = BuildCategory::model()->findByPK($_REQUEST['id']);
            if ($categoryObject->status == 1) {
                $categoryObject->status = 0;
            } else {
                $categoryObject->status = 1;
            }
            $categoryObject->save(false);
            //$this->redirect('/admin/package/list',array('msg'=>'2'));
            $this->redirect(array('/admin/buildtemp/categorylist', 'msg' => 4));
        }
    }

    /*
     * Function to Delete Bilder Category list
     */

    public function actionDeleteCategory() {
        if ($_REQUEST['id']) {
            $categoryObject = BuildCategory::model()->findByPK($_REQUEST['id']);
            $categoryObject->delete();
            $this->redirect(array('/admin/buildtemp/categorylist', 'msg' => 3));
        }
    }

    /*
     * Function to show added templates
     */

    public function actionTemplateList() {
        $dataProvider = new CActiveDataProvider('BuildTemp', array(
            'pagination' => array('pageSize' => 10),
        ));
        $this->render('/builder/template_list', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Function to edit header code
     */
    public function actiontemplateheaderEdit() {
        $error = "";
        $success = "";
       
        if ($_REQUEST['id']) {
            
            //$headerObject = BuildTemp::model()->findByAttributes(array('id'=>$_REQUEST['id']));
            $headerObject = BuildTemp::model()->findByPk($_REQUEST['id']);
                
            if ($_POST) {
                if (!empty($_POST['Template']['header_code'] != '' && $_POST['Template']['template_title'] != '')) {
                    //$headerObject = BuildTemp::model()->findByAttributes(array('temp_header_id'=>$_REQUEST['id']));

                    $headerupdateObject = BuildTempHeader::model()->findByPk($_REQUEST['h_id']);
//                    var_dump($headerupdateObject) ; die;
                    if(!empty($_FILES['screenshot']['name']))
                     {
                        $ext1 = end((explode(".", $_FILES['screenshot']['name']))); 
                        if ($ext1 != "jpg" && $ext1 != "png" && $ext1 != "jpeg") {
                                $error .= "Please upload mentioned file type.";
                        }else{
                        $path = $targetdir."/screenshot/";
                        BaseClass::uploadFile($_FILES['screenshot']['tmp_name'], $path, time() . $_FILES['screenshot']['name']);
                       }
                    $headerObject->screenshot =   time().$_FILES['screenshot']['name'];
                    $headerObject->update();
                    }
                    
                    
                    $headerupdateObject->header_content = addslashes($_POST['Template']['header_code']);
                    $headerupdateObject->template_title = addslashes($_POST['Template']['template_title']);
                    $headerupdateObject->updated_at = date('Y-m-d');
                    if ($headerupdateObject->update()) {
                        $success .= "Header updated successfully";
                    }
                } else {
                    $error .= "Please fill all required(*) marked fields.";
                }
            }
        }
//        var_dump($headerObject) ; die;
        $categoryObject = BuildCategory::model()->findAll();
        $this->render('/builder/template_header_edit', array(
            'headerObject' => $headerObject, 'error' => $error, 'success' => $success, 'categoryObject' => $categoryObject,
        ));
    }

    /**
     * Function to edit body code
     */
    public function actiontemplatebodyEdit() {
        $error = "";
        $success = "";
        if ($_REQUEST['id']) {
            $bodyObject = BuildTemp::model()->findByPk($_REQUEST['id']);

            if ($_POST) {
                if (!empty($_POST['Template']['body_code'] != '')) {
                    $bodyupdateObject = BuildTempBody::model()->findByPk($_REQUEST['b_id']);
                    $bodyupdateObject->body_content = addslashes($_POST['Template']['body_code']);
                    $bodyupdateObject->updated_at = date('Y-m-d');
                    if ($bodyupdateObject->update()) {
                        $success .= "Body updated successfully";
                    }
                } else {
                    $error .= "Please fill all required(*) marked fields.";
                }
            }
        }
        $this->render('/builder/template_body_edit', array(
            'bodyObject' => $bodyObject, 'error' => $error, 'success' => $success
        ));
    }

    /**
     * Function to edit footer code
     */
    public function actiontemplatefooterAdd() {
        $error = "";
        $success = "";
        if ($_REQUEST['id']) {
            $footerObject = BuildTemp::model()->findByPk($_REQUEST['id']);
            if ($_POST) {
                if (!empty($_POST['Template']['footer_code'] != '')) {
                    $footeraddObject = new BuildTempFooter;
                    $footeraddObject->footer_content = addslashes($_POST['Template']['footer_code']);
                    $footeraddObject->updated_at = date('Y-m-d');
                    if ($footeraddObject->save(false)) {
                        $model = BuildTemp::model()->findByPk($footeraddObject->footer_id);
                        $model->temp_body_id = $headeraddObject->id;
                        $model->save(false);
                        $success .= "Body content added successfully";
                    }
                } else {
                    $error .= "Please fill all required(*) marked fields.";
                }
            }
        }
        $this->render('/builder/template_footer_add', array(
            'error' => $error, 'success' => $success
        ));
    }

    /**
     * Function to edit header code
     */
    public function actionTemplateHeaderAdd() {
        $error = "";
        $success = "";
        if ($_POST) {
            $category = $_POST['Template']['category'];
            if (!empty($_POST['Template']['header_code'] != '' && $_POST['Template']['template_title'] != '')) {
               
                $headeraddObject = new BuildTempHeader;
                $bodyaddObject = new BuildTempBody;
                $footeraddObject = new BuildTempFooter;
                $headeraddObject->header_content = addslashes($_POST['Template']['header_code']);
                $headeraddObject->template_title = addslashes($_POST['Template']['template_title']);
                $headeraddObject->created_at = date('Y-m-d');
                if ($headeraddObject->save(false)) {

                    $bodyaddObject->body_content = addslashes($_POST['Template']['body_code']);
                    $bodyaddObject->created_at = date('Y-m-d');
                    $bodyaddObject->save(false);

                    $footeraddObject->footer_content = addslashes($_POST['Template']['footer_code']);
                    $footeraddObject->created_at = date('Y-m-d');
                    $footeraddObject->save(false);
                    
                    /* for removing folder */                    
                    function rmdir_recursive($dir) {
                        foreach (scandir($dir) as $file) {
                            if ('.' === $file || '..' === $file)
                                continue;
                            if (is_dir("$dir/$file"))
                                rmdir_recursive("$dir/$file");
                            else
                                unlink("$dir/$file");
                        }
                        rmdir($dir);
                    }

                    if ($_FILES["cssfolder"]["name"]) {
                        $filename = $_FILES["cssfolder"]["name"];
                        $source = $_FILES["cssfolder"]["tmp_name"];
                        $type = $_FILES["cssfolder"]["type"];

                        $name = explode(".", $filename);
                        $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
                        foreach ($accepted_types as $mime_type) {
                            if ($mime_type == $type) {
                                $okay = true;
                                break;
                            }
                        }

                        $continue = strtolower($name[1]) == 'zip' ? true : false;
                        if (!$continue) {
                            $error .= "The file you are trying to upload is not a .zip file. Please try again.";
                        }

                        /* PHP current path */
                        $path = Yii::getPathOfAlias('webroot') . "/user/template/"; // absolute path to the directory where zipper.php is in
                        $filenoext = basename($filename, '.zip');  // absolute path to the directory where zipper.php is in (lowercase)
                        $filenoext = basename($filenoext, '.ZIP');  // absolute path to the directory where zipper.php is in (when uppercase)
                        $fname = time() . $filenoext;
                        $targetdir = $path . time() . $filenoext; // target directory
                        $targetzip = $path . time() . $filename; // target zip file

                        /* create directory if not exists', otherwise overwrite */
                        /* target directory is same as filename without extension */

                        if (is_dir($targetdir))
                            rmdir_recursive($targetdir);
                        mkdir($targetdir, 0777);

                        /* here it is really happening */

                        if (move_uploaded_file($source, $targetzip)) {
                            $zip = new ZipArchive();
                            $x = $zip->open($targetzip);  // open the zip file to extract
                            if ($x === true) {
                                $zip->extractTo($targetdir); // place in the directory with same name  
                                $zip->close();
                                unlink($targetzip);
                            }
                            $message = "Your .zip file was uploaded and unpacked.";
                        } else {
                            $message = "There was a problem with the upload. Please try again.";
                        }
                    }
                    if ($_FILES['screenshot']['name']) {
                        $ext1 = end((explode(".", $_FILES['screenshot']['name'])));
                        if ($ext1 != "jpg" && $ext1 != "png" && $ext1 != "jpeg") {
                            $error .= "Please upload mentioned file type.";
                        } else {
                            $fileS = time() . $_FILES['screenshot']['name'];
                            $path = $targetdir . "/screenshot/";
                            BaseClass::uploadFile($_FILES['screenshot']['tmp_name'], $path, $fileS);
                        }
                    }
                    
                    $model = new BuildTemp;
                    $model->template_id = $headeraddObject->id;
                    $model->temp_header_id = $headeraddObject->id;
                    $model->temp_body_id = $bodyaddObject->id;
                    $model->temp_footer_id = $footeraddObject->id;
                    $model->status = 0;
                    $model->custom_css = addslashes($_POST['custom_css']);
                    $model->custom_js = addslashes($_POST['custom_js']);                                
                    $model->created_at = date('Y-m-d');
                    $model->updated_at = date('Y-m-d');
                    $model->category_id = $category;
                    $model->folderpath = $fname;
                    $model->screenshot = $fileS;
                    $model->save(false);
                    $tmpId = $model->id  ;
                    
                    /*  Scan and Insert JS  */                  
                    $scanDir = scandir($targetdir.'/js/');                    
                    foreach ($scanDir as $dirName) {
                        if ($dirName === '.' or $dirName === '..') continue;
                        $modelJs = new BuildTempJs ;
                        $modelJs->name = $dirName; 
                        $modelJs->temp_id = $tmpId;
                        $modelJs->created_at = date('Y-m-d');
                        $modelJs->save(false);
                    }
                    
                    $scanDir = scandir($targetdir.'/css/');                    
                    foreach ($scanDir as $dirName) {
                        if ($dirName === '.' or $dirName === '..') continue;
                        $modelCss = new BuildTempCss ;
                        $modelCss->name = $dirName; 
                        $modelCss->temp_id = $tmpId;
                        $modelCss->created_at = date('Y-m-d');
                        $modelCss->save(false);
                    }
                   

                    $success .= "Header content added successfully";
                }
            } else {
                $error .= "Please fill all required(*) marked fields.";
            }
        }

        $categoryObject = BuildCategory::model()->findAll();
        $this->render('/builder/template_header_add', array(
            'error' => $error, 'success' => $success, 'categoryObject' => $categoryObject,
        ));
    }

    /**
     * Function to edit body code
     
    public function actionTemplateBodyAdd() {
        $error = "";
        $success = "";
        if ($_REQUEST['id']) {
            if ($_POST) {
                if (!empty($_POST['Template']['body_code'] != '')) {
                    $bodyaddObject = new BuildTempBody;
                    $bodyaddObject->body_content = $_POST['Template']['body_code'];
                    $bodyaddObject->updated_at = date('Y-m-d');
                    if ($bodyaddObject->save(false)) {
                        $model = BuildTemp::model()->findByPk($bodyaddObject->body_id);
                        $model->temp_body_id = $bodyaddObject->id;
                        $model->update(false);
                        $success .= "Footer content added successfully";
                    }
                } else {
                    $error .= "Please fill all required(*) marked fields.";
                }
            }
        }
        $this->render('/builder/template_body_add', array(
            'error' => $error, 'success' => $success
        ));
    }

    /**
     * Function to edit footer code
     */
    public function actionTemplateFooterEdit() {
        $error = "";
        $success = "";
        if ($_REQUEST['id']) {
            $footerObject = BuildTemp::model()->findByPk($_REQUEST['id']);
            if ($_POST) {
                if (!empty($_POST['Template']['footer_code'] != '')) {
                    $footerupdateObject = BuildTempFooter::model()->findByPk($_REQUEST['f_id']);
                    $footerupdateObject->footer_content = addslashes($_POST['Template']['footer_code']);
                    $footerupdateObject->updated_at = date('Y-m-d');
                    if ($footerupdateObject->update()) {
                        $success .= "Footer updated successfully";
                    }
                } else {
                    $error .= "Please fill all required(*) marked fields.";
                }
            }
        }
        $this->render('/builder/template_footer_edit', array(
            'footerObject' => $footerObject, 'error' => $error, 'success' => $success
        ));
    }
    
    /* Get Custom Css and Js Code */
    public function actionCustomCode(){
      
        $error = "";
        $success = "";
        if ($_REQUEST['id']) {
            $customcode = BuildTemp::model()->findByPk($_REQUEST['id']);

            if ($_POST) {
                if (!empty($_POST['custom_css'] != '')) {
                    $customcode->custom_css = addslashes($_POST['custom_css']);
                    $customcode->custom_js = addslashes($_POST['custom_js']);                    
                    if ($customcode->update()) {
                        $success .= "Custom code has been updated successfully";
                    }
                } else {
                    $error .= "Please fill all required(*) marked fields.";
                }
            }
        }
        $this->render('/builder/customcode', array(
            'customcode' => $customcode, 'error' => $error, 'success' => $success
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
