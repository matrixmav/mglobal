<?php

class NewsController extends Controller
{
	
        public $layout = 'main';

        public function init() {
            BaseClass::isAdmin();
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
                'actions' => array('index', 'add', 'edit', 'changestatus', 'list'),
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
    
       public function actionIndex()
	{
		$this->render('index');
	}
        
        public function actionAdd() {
        if(!empty($_POST))
        {
            
        }    
        $this->render('news_add', array('error' => $error,'success'=>$success));    
        }
        
       
    /*
     * Function to fetch News list
     */

    public function actionList() {
        $status = 1;
        $pageSize = Yii::app()->params['defaultPageSize'];
         if (!empty($_POST)) {
         $status = $_POST['res_filter'];
          
         $dataProvider = new CActiveDataProvider('News', array(
                'criteria' => array(
                   'condition' => ('status = "' . $status . '"' ), 'order' => 'id DESC',
                ), 'pagination' => array('pageSize' => $pageSize),
            ));
          
         }else{
        //$dataProvider = new CActiveDataProvider('Package');
        $dataProvider = new CActiveDataProvider('News', array(
                'criteria' => array(
                    'condition' => ('status = "' . $status . '"' ), 'order' => 'id DESC',
                ), 'pagination' => array('pageSize' => $pageSize),
            ));
         
          }

        $this->render('news_list', array(
            'dataProvider' => $dataProvider, 'msg' => 0
        ));
    }

}