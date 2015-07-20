<?php

class SiteStatiticsControllerController extends Controller
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
        
          $this->render('/user/getfacts', array(
            'error' => $error,
        ));
        
    }
}