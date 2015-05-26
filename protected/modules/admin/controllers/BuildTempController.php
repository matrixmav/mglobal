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
                'actions' => array('index', 'categoryadd', 'categoryedit', 'categorylist','deletecategory','changestatus'),
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
        $this->render('/builder/category_edit', array('error' => $error, 'success' => $success,'categoryObject'=>$categoryObject));
    }

    /*
     * Function to list bilder category
     */

    public function actionCategoryList() {
       $dataProvider = new CActiveDataProvider('BuildCategory', array(
                 'pagination' => array('pageSize' => 10),
				));
       $this->render('/builder/category_list',array(
                    'dataProvider'=>$dataProvider,
            ));
    }

     /*
          * Function to fetch Package list
          */
         public function actionChangeStatus() {
             
            
           if($_REQUEST['id']) {
               $categoryObject = BuildCategory::model()->findByPK($_REQUEST['id']);
                if($categoryObject->status == 1){
                    $categoryObject->status = 0;
                } else {
                    $categoryObject->status = 1;
                }
                $categoryObject->save(false);
                //$this->redirect('/admin/package/list',array('msg'=>'2'));
                $this->redirect(array('/admin/buildtemp/categorylist','msg'=>4));
            }  
         }
         
         /*
          * Function to Delete Bilder Category list
          */
         public function actionDeleteCategory() {
           if($_REQUEST['id']) {
               $categoryObject = BuildCategory::model()->findByPK($_REQUEST['id']);
                $categoryObject->delete();
                $this->redirect(array('/admin/buildtemp/categorylist','msg'=>3));
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
