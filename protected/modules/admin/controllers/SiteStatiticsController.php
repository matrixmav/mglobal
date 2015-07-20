<?php

class SiteStatiticsController extends Controller
{
	 
 
    
     public $layout = 'main';

     public function init() {
        BaseClass::isAdmin();
     }
     
     
	public function actionIndex()
	{
		$this->render('index');
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
                'actions' => array('index', 'getfacts'),
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
        
 
    public function actionGetfacts() {
        $success ="";
        $error = "";
        
        $siteObject = SiteStatitics::model()->findAll();
        $model = new SiteStatitics;
        
        if(!empty($_POST) && $_POST['total_registration']!='' && $_POST['package_bought']!='' && $_POST['commission_given']!='' && $_POST['project_completed']!='')
        { 
           if(count($siteObject) > 0)
           {
               $siteObject->total_registration = $_POST['total_registration'];
               $siteObject->package_bought = $_POST['package_bought'];
               $siteObject->commission_given = $_POST['commission_given'];
               $siteObject->total_project = $_POST['project_completed'];
               $siteObject->add_date = date('Y-m-d');
               $siteObject->save(false);
               $success = "Information Updated Successfully.";
               
           }else{
               
               $model->total_registration = $_POST['total_registration'];
               $model->package_bought = $_POST['package_bought'];
               $model->commission_given = $_POST['commission_given'];
               $model->total_project = $_POST['project_completed'];
               $model->add_date = date('Y-m-d');
               $model->save(false);
               $success = "Information Added Successfully.";
           }
            
        }else{
            $error = "Please fill all required (*) marked fields.";
            
        }   
        
          $this->render('/user/statitics', array(
            'error' => $error,
            'siteObject'=>$siteObject,
              'success'=>$success,
        ));
        
    }
}