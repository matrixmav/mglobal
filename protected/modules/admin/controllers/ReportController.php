<?php

class ReportController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
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
                'actions' => array('index', 'view', 'address', 'wallet',
                    'creditwallet', 'package', 'adminsponsor', 'verification',
                    'socialaccount', 'contact', 'transaction','refferal','deposit','trackrefferal','subscriber'),
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

    public function actionTransaction() {
        $model = new MoneyTransfer();
        $pageSize = Yii::app()->params['defaultPageSize'];
        $todayDate = Yii::app()->params['startDate'];
        $fromDate = date('Y-m-d');
        $status = 1;
        if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            $status = $_POST['res_filter'];
        }

        $dataProvider = new CActiveDataProvider($model, array(
            'criteria' => array(
                'condition' => ('created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '" AND status = "' . $status . '"' ), 'order' => 'id DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));

        $this->render('transaction', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionIndex() {
        $model = new User();
        $pageSize = Yii::app()->params['defaultPageSize'];
        $todayDate = Yii::app()->params['startDate'];
        $fromDate = date('Y-m-d');
        $status = 1;
        if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            $status = $_POST['res_filter'];
        }

        $dataProvider = new CActiveDataProvider($model, array(
            'criteria' => array(
                'condition' => ('created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '" AND status = "' . $status . '"' ), 'order' => 'id DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAddress() {
        $model = new UserProfile();
        $pageSize = Yii::app()->params['defaultPageSize'];
        $todayDate = Yii::app()->params['startDate'];
        $fromDate = date('Y-m-d');
         
        if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            
        }

        $dataProvider = new CActiveDataProvider($model, array(
            'criteria' => array(
                'condition' => ('address !="" AND created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '"' ), 'order' => 'id DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));
        
        $this->render('address', array(
            'dataProvider' => $dataProvider,
        ));
        
    }
    
    public function actionDeposit() {
       $loggedInuserName = User::model()->findByPk(Yii::app()->session['userid']);
        $model = User::model()->findAll(array('condition' => 'sponsor_id = "' . $loggedInuserName->name . '"'));
        //$connection = Yii::app()->db;
        $userid = "";
        $userID = 0;
        if ($model) {
            foreach ($model as $user) {
                $userid .= "'" . $user->id . "',";
            }
            $userID = rtrim($userid, ',');
            $condition = 'user_id IN(' . $userID . ') AND ';
        } else {
            $condition = "user_id IN('0') AND ";
        }
        $pageSize = 100;
          
        
        // Date filter.
        if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
        }else{
            $todayDate = '0000-00-00';
            $fromDate = '0000-00-00';
        }   
            $dataProvider = new CActiveDataProvider('Order', array(
            'criteria' => array(
                'condition' => ($condition.'created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '" AND status=1' ), 'order' => 'created_at DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));
        
         
        $totalAmount = "";
        $connection = Yii::app()->db;
        $command = $connection->createCommand("SELECT package.amount FROM `package`,`order` where order.user_id in (".$userID.") AND order.package_id = package.id AND order.created_at >= '" . $todayDate . "' AND order.created_at <= '" . $fromDate . "' AND order.status='1'");
        $row = $command->queryAll();
        
        foreach ($row as $amount) {
            $totalAmount += $amount['amount'] * 5 / 100;
         }

        //$sqlData = new CArrayDataProvider($row, array(
            //'pagination' => array('pageSize' => 100)));
        //$sqlData = $sqlData->getData();
        //$sqlData = $sqlData[0];
        //$dataProvider = new CActiveDataProvider($sqlData, array(
        //'pagination' => array('pageSize' => 10),));
        /* foreach($dataProvider as $data)
          {
          $orderObject =  Order::model()->findByAttributes(array('user_id'=>$data->id));
          $dataProvider['order'] = $orderObject;
          $packageObject =  Package::model()->findByPK($orderObject->package_id);
          $dataProvider['package'] = $packageObject;
          } */



        $this->render('admin_refferal_income', array(
            'dataProvider' => $dataProvider,
            'totalAmount' => $totalAmount,
        ));
        
    }
    
    public function actionTrackRefferal() {
       $error = "";
        $success = "";
        $todayDate = date('Y-m-d');
        $fromDate = date('Y-m-d');
        //$loggedInUserId = Yii::app()->session['userid'];
        //$userObject = User::model()->findByPK($loggedInUserId);
        $pageSize = 100;
        if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            $dataProvider = new CActiveDataProvider('User', array(
                'criteria' => array(
                    'condition' => ('social != "" AND created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '"'), 'order' => 'id DESC',
            )));
        } else {
            $dataProvider = new CActiveDataProvider('User', array(
                'criteria' => array(
                    'condition' => ('social != "" AND created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '"'), 'order' => 'id DESC',
            )));
        }
        $this->render('/report/admintrack_refferal', array(
            'error' => $error, 'success' => $success, 'dataProvider' => $dataProvider
        ));  
    }

    public function actionVerification() {
        $model = new UserProfile();
        $pageSize = Yii::app()->params['defaultPageSize'];
        $todayDate = Yii::app()->params['startDate'];
        $fromDate = date('Y-m-d');
        //By default Pending.
        $status = 0;

        $condition = 'address_proff !="" AND id_proof !="" AND status = ' . $status.' AND created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '"';
        if (!empty($_POST)) {
            $status = $_POST['res_filter'];
            // Add status.
            $condition = ' address_proff !="" AND id_proof !="" AND status = ' . $status;
            if (!empty($_POST['from'])) {
                $todayDate = $_POST['from'];
                $condition .= ' AND created_at >= "' . $todayDate . '"';
            }
            if (!empty($_POST['to'])) {
                $fromDate = $_POST['to'];
                $condition .= ' AND created_at <= "' . $fromDate . '"';
            }
        }
	
        $dataProvider = new CActiveDataProvider($model, array(
            'criteria' => array(
                'condition' => $condition, //('created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '" AND status = "' . $status . '"' ), 'order' => 'id DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));
        $this->render('verification', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdminSponsor() {
        $model = new User();
        $pageSize = Yii::app()->params['defaultPageSize'];
        $todayDate = Yii::app()->params['startDate'];
        $adminSpnId = Yii::app()->params['adminSpnId'];
        $fromDate = date('Y-m-d');
        $status = 1;
        if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            $status = $_POST['res_filter'];


            $dataProvider = new CActiveDataProvider($model, array(
                'criteria' => array(
                    'condition' => ('sponsor_id = "' . $adminSpnId . '" AND created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '" AND status = "' . $status . '"' ), 'order' => 'id DESC',
                ), 'pagination' => array('pageSize' => $pageSize),));
        } else {
            $dataProvider = new CActiveDataProvider($model, array(
                'criteria' => array(
                    'condition' => ('sponsor_id = "' . $adminSpnId . '" AND created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '" AND status = "' . $status . '"' ), 'order' => 'id DESC',
                ), 'pagination' => array('pageSize' => $pageSize),));
        }
        $this->render('adminsponsor', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionPackage() {
        $model = new Package();
        $pageSize = Yii::app()->params['defaultPageSize'];
        $todayDate = Yii::app()->params['startDate'];
        $fromDate = date('Y-m-d');
        $status = 1;
        if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            $status = $_POST['res_filter'];
        }

        $dataProvider = new CActiveDataProvider($model, array(
            'criteria' => array(
                'condition' => ('created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '" AND status = "' . $status . '"' ), 'order' => 'id DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));

        $this->render('package', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionSocialAccount() {
        $model = new User();
        $pageSize = Yii::app()->params['defaultPageSize'];
        $todayDate = Yii::app()->params['startDate'];
        $fromDate = date('Y-m-d');
        $status = 1;
        if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            $status = $_POST['res_filter'];
        }

        $dataProvider = new CActiveDataProvider($model, array(
            'criteria' => array(
                'condition' => ('facebook_id != "" and twitter_id != ""  AND created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '" AND status = "' . $status . '"' ), 'order' => 'id DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));

        $this->render('socialaccount', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionContact() {
        $model = new Contact();
        $pageSize = Yii::app()->params['defaultPageSize'];
        $todayDate = Yii::app()->params['startDate'];
        $fromDate = date('Y-m-d');
        $status = 1;
        if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            
        }

        $dataProvider = new CActiveDataProvider($model, array(
            'criteria' => array(
                'condition' => ('created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '" AND type = "contact"' ), 'order' => 'id DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));
        $this->render('contact', array(
            'dataProvider' => $dataProvider,
        ));
    }

     public function actionSubscriber() {
        $model = new Contact();
        $pageSize = Yii::app()->params['defaultPageSize'];
        $todayDate = Yii::app()->params['startDate'];
        $fromDate = date('Y-m-d');
        $status = 1;
        if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            
        }

        $dataProvider = new CActiveDataProvider($model, array(
            'criteria' => array(
                'condition' => ('created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '" AND type = "subscribe"' ), 'order' => 'id DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));
        $this->render('subscriber', array(
            'dataProvider' => $dataProvider,
        ));
    }
    
     public function actionFeedback() {
        $model = new Feedback();
        $pageSize = Yii::app()->params['defaultPageSize'];
        $todayDate = Yii::app()->params['startDate'];
        $fromDate = date('Y-m-d');
        $status = 1;
        if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            
        }

        $dataProvider = new CActiveDataProvider($model, array(
            'criteria' => array(
                'condition' => ('created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '"' ), 'order' => 'id DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));
        $this->render('subscriber', array(
            'dataProvider' => $dataProvider,
        ));
    }
    
    
    public function actionBugReport() {
        $model = new BugForm();
        $pageSize = Yii::app()->params['defaultPageSize'];
        $todayDate = Yii::app()->params['startDate'];
        $fromDate = date('Y-m-d');
        $status = 1;
        if (!empty($_POST)) {
            $todayDate = $_POST['from'];
            $fromDate = $_POST['to'];
            
        }

        $dataProvider = new CActiveDataProvider($model, array(
            'criteria' => array(
                'condition' => ('created_at >= "' . $todayDate . '" AND created_at <= "' . $fromDate . '"' ), 'order' => 'id DESC',
            ), 'pagination' => array('pageSize' => $pageSize),));
        $this->render('subscriber', array(
            'dataProvider' => $dataProvider,
        ));
    }
    
    
    protected function gridAddressImagePopup($data, $row) {
        $bigImagefolder = Yii::app()->params->imagePath['verificationDoc']; // folder with uploaded files
        echo "<a data-toggle='modal' href='#zoom_$data->id'>$data->address_proff</a>" . '<div class="modal fade" id="zoom_' . $data->id . '" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog" style="width:500px;">
                        <div class="modal-content">
                                <div class="modal-body" style="width: 500px;overflow: auto;height: 500px;padding: 0;">
                                         <img src="' . $bigImagefolder . $data->address_proff . '">
                                                         </div>
                            </div>
                        </div>
                </div>';
    }

    protected function gridIdImagePopup($data, $row) {
        $bigImagefolder = Yii::app()->params->imagePath['verificationDoc']; // folder with uploaded files
        echo "<a data-toggle='modal' href='#zoom_$data->id'>$data->id_proof</a>" . '<div class="modal fade" id="zoom_' . $data->id . '" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog" style="width:500px;">
                        <div class="modal-content">
                                <div class="modal-body" style="width: 500px;overflow: auto;height: 500px;padding: 0;">
                                         <img src="' . $bigImagefolder . $data->id_proof . '">
                                                         </div>
                            </div>
                        </div>
                </div>';
    }

}
