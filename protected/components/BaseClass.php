<?php

require_once Yii::app()->basePath . '/components/Mobile_Detect.php';

class BaseClass extends Controller {

    public static $count_slug = 1;
    public $loggedInUser = null;
    public $selectedNavMenu = 1;
    public $randomCategories = null;
    public $dateArr = null;
    public $isMobile = false;

    function init() {
        parent::init();
        $detector = new Mobile_Detect;
        $this->isMobile = $detector->isMobile();
        error_reporting(E_ALL);
        //error_reporting(0);
        //Set language		
        /* if(Yii::app()->getController()->layout =='//layouts/articles'){			
          Yii::app()->language = 'en';
          } */

        //Get login info
        /* if(Yii::app()->user->getstate('user_id')){

          require_once (dirname(Yii::app()->request->scriptFile)."/wordpress/wp-load.php");
          //Session related checks - session timeout
          $current_time = time();
          if(Yii::app()->request->isAjaxRequest==false && isset(Yii::app()->session['login_time']) && ($current_time - Yii::app()->session['login_time']) > Yii::app()->session['sess_timeout'])
          {
          Yii::app()->session['login_time'] = null;
          Yii::app()->session['timed_out'] = 1;
          }

          //$this->loggedInUser = $this->getUserInfoByEmailId(Yii::app()->user->Id);
          } else {
          $this->loggedInUser = null;
          $this->redirect('/admin');
          } */
    }

    public static function isLoggedIn() {
        
        $userId = Yii::app()->session['userid']; // die;
        // $adminObject = User::model()->findByAttributes(array('id' => $userId, 'role_id' => '1'));
        if (!isset($userId)) {
            //ob_start();
            //$this->redirect('/user/login');

            header('Location:/user/login');
            die;
        }
    }
    
    public static function getTempStars($starCount){
        $star = "";
        if($starCount > 0)
        {
        for($i=1; $i<=$starCount; $i++){
            $star .= '<li><i class="glyphicon glyphicon-star star-full"></i></li>';
        }
        }
                
        return $star;
    }
    
    
    /* function to fetch access /*
     * 
     */

    public static function getMemberAccess() {
        try {
            $userId = Yii::app()->session['userid']; // die;
            $accessArr = array();
            $userAccessObject = UserHasAccess::model()->findByAttributes(array('user_id' => $userId));
            if ($userAccessObject) {
                $accessArr = explode(',', $userAccessObject->access);
            }
        } catch (Exception $ex) {
            echo $ex->message();
            exit;
        }
        return $accessArr;
    }

    /* function to send mail /*
     * 
     */

    public static function sendMail($config) {
    
      try {
          

          $url = 'https://rest.nexmo.com/sms/json?' . http_build_query([
                'api_key' => API_KEY,
               'api_secret' => API_SECRET,
              'to' => $config['to'],
              'from' => 'Mglobally',
                'text' => $config['text']
           ]);
            //$url = "";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
         }
       
         catch (Exception $ex) {
            echo $ex->message();
            exit;
        }
          
        return $response;
    }
    
    
    public static function getNewsUpdates()
    {
        $newsObject = News::model()->find(array('condition'=>'status=1','order' => 'created_at DESC','limit' => '1'));
        $news = (!empty($newsObject)) ? $newsObject->news : "";
                
        return $news;
     }

    public static function getUserName() {
        $userId = Yii::app()->session['userid']; // die; 
        $userName = User::model()->findByPK(array('user_id' => $userId));
        if (!empty($userName)) {
            $name = $userName->name;
        } else {
            $name = "";
        }
        return $name;
    }

    public static function walletAmount($id) {
        $userId = Yii::app()->session['userid'];
        $walletObject = Wallet::model()->findAll(array('condition' => 'user_id=' . $userId . ' AND type = ' . $id));

        return $walletObject;
    }

    public static function getPassword() {
        $chars = '0123456789abcd345efghijklmnopq*&%$rstuvwxyzAB345CDEFGH!@#$IJKLMNOPQRSTUVWXYZ$#@!&*';
        $randomString = '';

        for ($i = 0; $i < 8; $i++) {
            $randomString .= $chars[rand(0, strlen($chars) - 1)];
        }

        return $randomString;
    }

    public static function getPasswordAdmin() {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ$#@!&*';
        $randomString = '';

        for ($i = 0; $i < 8; $i++) {
            $randomString .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $randomString;
    }

    public static function transactionStatus() {
        $userId = Yii::app()->session['userid'];
        $transactionObject = Transaction::model()->findByAttributes(array('user_id' => $userId));

        return $transactionObject;
    }

    public static function isUserHavingActiveOrder() {
        $userId = Yii::app()->session['userid'];
        $transactionObject = Order::model()->findByAttributes(array('user_id' => $userId, 'status' => 1));

        return $transactionObject;
    }

    public static function gettransactionID() {

        $transactionObject = Transaction::model()->findAll(array('order' => 'id DESC', 'limit' => '1'));

        if (count($transactionObject) > 0) {
            $transactionObject = $transactionObject[0];
            $lastid = substr($transactionObject->transaction_id, 2, 5);
            $incementID = $lastid + 1;
            if (strlen($incementID) > 5) {
                $incementID = '12345';
            }
            $generateid = Yii::app()->params['transactionIdPrefix'] . $incementID . Yii::app()->params['transactionIdPostfix'];
        } else {
            $generateid = Yii::app()->params['transactionIdPrefix'] . '12345' . Yii::app()->params['transactionIdPostfix'];
        }
        return $generateid;
    }

    public static function getUnredMails($userId) {

        return Mail::model()->count(array('condition' => 'to_user_id=' . $userId . ' AND status = 0'));
    }

    /* public static function getUnredMails($userId) {
      $count = Mail::model()->count(array(
      'condition' => 'to_user_id = :uid AND status = :status',
      'params' => array(
      ':uid' => $userId,
      ':status' => 0,
      ),
      ));
      return $count;
      /*return Mail::model()->count(array('condition' => 'from_user_id=' . $userId . ' AND status = 0'));} */

    public static function isAdmin() {
        $userId = Yii::app()->session['userid'];
        $adminObject = User::model()->findByAttributes(array('id' => $userId, 'role_id' => '2'));
        if (!$adminObject) {
            header('Location:/admin');
            die;
        }
    }

    public static function getWalletList() {
        return array(
            '1' => 'Cash',
            '2' => 'RP Wallet',
            '3' => 'Commission'
        );
    }

    /*
     * method for getting the list of admins
     * 
     */

    public static function getAdmin() {

        $records = User::model()->findAll(array('condition' => "`role_id` = 1"));
        $adminArr = array();
        foreach ($records as $record) {
            $adminArr[] = $record->email;
        }
        return $adminArr;
    }

    /*
     * method for getting the list of admins
     * 
     */

    public static function getAdmins() {

        $records = User::model()->findAll(array('condition' => "`role_id` = 1"));
        $adminArr = array();
        foreach ($records as $record) {
            $adminArr[] = $record->email;
        }
        return $adminArr;
    }

    public static function getAuthors() {

        $records = User::model()->findAll(array('condition' => "`role_id` = 3"));
        $adminArr = array();
        foreach ($records as $record) {
            $adminArr[] = $record->email;
        }
        return $adminArr;
    }

    /*
     * method for getting the access rules based on the uaer role
     */

    public static function getAccess($userRoleId) {

        //check user role id
    }

    /**
     * General function to generate random string
     * @return string of random Session id for a user.
     * @author Vinayak Phal
     */
    public static function generateSessionId() {
        return md5(uniqid(microtime(), true));
    }

    // print an array in formated way
    public static function pr($param) {
        echo "<pre>";
        print_r($param);
        echo "</pre>";
    }

    public static function uploadFile($sourceFile, $destinationFolder, $destinationFileName) {
        if (!is_dir($destinationFolder)) {
            mkdir($destinationFolder, 0755, true);
        }
        try {
            move_uploaded_file($sourceFile, $destinationFolder . $destinationFileName);
            return $destinationFileName;
        } catch (Exception $e) {
            return null;
        }
    }

    public static function generateNewNameOfImage($image_name) {
        $extension = substr($image_name, strrpos($image_name, '.') + 1);
        $name = md5(date("Y-m-d") * mt_rand());
        return $name . "." . $extension;
    }

    public static function resizeImage($CurWidth, $CurHeight, $MaxSize, $DestFolder, $SrcImage, $Quality, $ImageType) {
        //Check Image size is not 0
        if ($CurWidth <= 0 || $CurHeight <= 0) {
            return false;
        }

        //Construct a proportional size of new image
        $ImageScale = min($MaxSize / $CurWidth, $MaxSize / $CurHeight);
        $NewWidth = ceil($ImageScale * $CurWidth);
        $NewHeight = ceil($ImageScale * $CurHeight);
        $NewCanves = imagecreatetruecolor($NewWidth, $NewHeight);

        // Resize Image
        if (imagecopyresampled($NewCanves, $SrcImage, 0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight)) {
            switch (strtolower($ImageType)) {
                case 'image/png':
                    imagepng($NewCanves, $DestFolder);
                    break;
                case 'image/gif':
                    imagegif($NewCanves, $DestFolder);
                    break;
                case 'image/jpeg':
                case 'image/pjpeg':
                    imagejpeg($NewCanves, $DestFolder, $Quality);
                    break;
                default:
                    return false;
            }
            //Destroy image, frees memory	
            if (is_resource($NewCanves)) {
                imagedestroy($NewCanves);
            }
            return true;
        }
    }

//This function corps image to create exact square images, no matter what its original size!
    public static function cropImage($CurWidth, $CurHeight, $iSize, $DestFolder, $SrcImage, $Quality, $ImageType) {
        //Check Image size is not 0
        if ($CurWidth <= 0 || $CurHeight <= 0) {
            return false;
        }

        //abeautifulsite.net has excellent article about "Cropping an Image to Make Square"
        //http://www.abeautifulsite.net/blog/2009/08/cropping-an-image-to-make-square-thumbnails-in-php/
        if ($CurWidth > $CurHeight) {
            $y_offset = 0;
            $x_offset = ($CurWidth - $CurHeight) / 2;
            $square_size = $CurWidth - ($x_offset * 2);
        } else {
            $x_offset = 0;
            $y_offset = ($CurHeight - $CurWidth) / 2;
            $square_size = $CurHeight - ($y_offset * 2);
        }

        $NewCanves = imagecreatetruecolor($iSize, $iSize);
        if (imagecopyresampled($NewCanves, $SrcImage, 0, 0, $x_offset, $y_offset, $iSize, $iSize, $square_size, $square_size)) {
            switch (strtolower($ImageType)) {
                case 'image/png':
                    imagepng($NewCanves, $DestFolder);
                    break;
                case 'image/gif':
                    imagegif($NewCanves, $DestFolder);
                    break;
                case 'image/jpeg':
                case 'image/pjpeg':
                    imagejpeg($NewCanves, $DestFolder, $Quality);
                    break;
                default:
                    return false;
            }
            //Destroy image, frees memory	
            if (is_resource($NewCanves)) {
                imagedestroy($NewCanves);
            }
            return true;
        }
    }

    /////////////////////////////////SLUG Functions/////////////////////////////////////////////

    private static function my_str_split($string) {
        $slen = strlen($string);
        for ($i = 0; $i < $slen; $i++) {
            $sArray[$i] = $string{$i};
        }
        return $sArray;
    }

    private static function noDiacritics($string) {
        //cyrylic transcription
        $cyrylicFrom = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
        $cyrylicTo = array('A', 'B', 'W', 'G', 'D', 'Ie', 'Io', 'Z', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'Ch', 'C', 'Tch', 'Sh', 'Shtch', '', 'Y', '', 'E', 'Iu', 'Ia', 'a', 'b', 'w', 'g', 'd', 'ie', 'io', 'z', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'ch', 'c', 'tch', 'sh', 'shtch', '', 'y', '', 'e', 'iu', 'ia');


        $from = array("Á", "À", "Â", "Ä", "Ă", "Ā", "Ã", "Å", "Ą", "Æ", "Ć", "Ċ", "Ĉ", "Č", "Ç", "Ď", "Đ", "Ð", "É", "È", "Ė", "Ê", "Ë", "Ě", "Ē", "Ę", "Ə", "Ġ", "Ĝ", "Ğ", "Ģ", "á", "à", "â", "ä", "ă", "ā", "ã", "å", "ą", "æ", "ć", "ċ", "ĉ", "č", "ç", "ď", "đ", "ð", "é", "è", "ė", "ê", "ë", "ě", "ē", "ę", "ə", "ġ", "ĝ", "ğ", "ģ", "Ĥ", "Ħ", "I", "Í", "Ì", "İ", "Î", "Ï", "Ī", "Į", "Ĳ", "Ĵ", "Ķ", "Ļ", "Ł", "Ń", "Ň", "Ñ", "Ņ", "Ó", "Ò", "Ô", "Ö", "Õ", "Ő", "Ø", "Ơ", "Œ", "ĥ", "ħ", "ı", "í", "ì", "i", "î", "ï", "ī", "į", "ĳ", "ĵ", "ķ", "ļ", "ł", "ń", "ň", "ñ", "ņ", "ó", "ò", "ô", "ö", "õ", "ő", "ø", "ơ", "œ", "Ŕ", "Ř", "Ś", "Ŝ", "Š", "Ş", "Ť", "Ţ", "Þ", "Ú", "Ù", "Û", "Ü", "Ŭ", "Ū", "Ů", "Ų", "Ű", "Ư", "Ŵ", "Ý", "Ŷ", "Ÿ", "Ź", "Ż", "Ž", "ŕ", "ř", "ś", "ŝ", "š", "ş", "ß", "ť", "ţ", "þ", "ú", "ù", "û", "ü", "ŭ", "ū", "ů", "ų", "ű", "ư", "ŵ", "ý", "ŷ", "ÿ", "ź", "ż", "ž");
        $to = array("A", "A", "A", "A", "A", "A", "A", "A", "A", "AE", "C", "C", "C", "C", "C", "D", "D", "D", "E", "E", "E", "E", "E", "E", "E", "E", "G", "G", "G", "G", "G", "a", "a", "a", "a", "a", "a", "a", "a", "a", "ae", "c", "c", "c", "c", "c", "d", "d", "d", "e", "e", "e", "e", "e", "e", "e", "e", "g", "g", "g", "g", "g", "H", "H", "I", "I", "I", "I", "I", "I", "I", "I", "IJ", "J", "K", "L", "L", "N", "N", "N", "N", "O", "O", "O", "O", "O", "O", "O", "O", "CE", "h", "h", "i", "i", "i", "i", "i", "i", "i", "i", "ij", "j", "k", "l", "l", "n", "n", "n", "n", "o", "o", "o", "o", "o", "o", "o", "o", "o", "R", "R", "S", "S", "S", "S", "T", "T", "T", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "W", "Y", "Y", "Y", "Z", "Z", "Z", "r", "r", "s", "s", "s", "s", "B", "t", "t", "b", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "w", "y", "y", "y", "z", "z", "z");

        $from = array_merge($from, $cyrylicFrom);
        $to = array_merge($to, $cyrylicTo);

        $newstring = str_replace($from, $to, $string);
        return $newstring;
    }

    public static function makeSlugs($string, $maxlen = 0) {
        $newStringTab = array();
        $string = trim($string);
        $string = strtolower(BaseClass::noDiacritics($string));
        if (function_exists('str_split')) {
            $stringTab = str_split($string);
        } else {
            $stringTab = BaseClass::my_str_split($string);
        }

        //$numbers=array("0","1","2","3","4","5","6","7","8","9","-");
        // Added by Sandeep Sen for greater than 9 duplicate entry 
        // 2nd Jan 2014
        $numbers = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "-");

        //$numbers=array("0","1","2","3","4","5","6","7","8","9");

        foreach ($stringTab as $letter) {
            if (in_array($letter, range("a", "z")) || in_array($letter, $numbers)) {
                $newStringTab[] = $letter;
                //print($letter);
            } elseif ($letter == " ") {
                $newStringTab[] = "-";
            }
        }

        if (count($newStringTab)) {
            $newString = implode($newStringTab);
            if ($maxlen > 0) {
                $newString = substr($newString, 0, $maxlen);
            }
            $newString = BaseClass::removeDuplicates('--', '-', $newString);
        } else {
            $newString = '';
        }

        return $newString;
    }

    private static function checkSlug($sSlug) {
        if (ereg("^[a-zA-Z0-9]+[a-zA-Z0-9\_\-]*$", $sSlug)) {
            return true;
        }
        return false;
    }

    private static function removeDuplicates($sSearch, $sReplace, $sSubject) {
        $i = 0;
        do {
            $sSubject = str_replace($sSearch, $sReplace, $sSubject);
            $pos = strpos($sSubject, $sSearch);
            $i++;
            if ($i > 100) {
                die('removeDuplicates() loop error');
            }
        } while ($pos !== false);

        return $sSubject;
    }

    public static function Slugunique($model, $name, $id) {
        $slug = BaseClass::makeSlugs($name);
        $addSql = ($id > 0) ? " and id!=" . $id : "";
        $flag = $model::model()->find("slug='$slug' $addSql");
        if ($flag) {
            $id = $flag->id;
            if ($flag->id != '') {
                $no = substr($slug, strrpos($slug, strrchr($slug, "-")));
                if (is_numeric($no))
                    $slug_data = substr($slug, 0, strrpos($slug, "-"));
                else
                    $slug_data = $slug;

                $data = $slug_data . "-" . BaseClass::$count_slug;
                BaseClass::$count_slug++;

                $slug = BaseClass::Slugunique($model, $data, $id);
            }
        }

        return $slug;
    }

    public static function getDays($year) {

        $num_of_days = array();
        $total_month = 12;

        /* if($year == date('Y'))
          $total_month = date('m');
          else
          $total_month = 12; */

        for ($m = 1; $m <= $total_month; $m++) {
            $num_of_days[$m] = cal_days_in_month(CAL_GREGORIAN, $m, $year);
        }

        return $num_of_days;
    }

    public static function getSlug($model, $string) {
        #$slug=$this->makeSlugs($string);
        #$model=$model;
        $slug = $this->slugCoursesUnique($model, $data, $theme, $cId);
        return $slug;
    }

    public static function removeApos($data) {
        $array_replace1 = array("’");
        $array_replace_by1 = array("'");
        $data = str_replace($array_replace1, $array_replace_by1, $data);
        return $data;
    }

    public static function createSlug($model) {
        $data = $model::model()->findAll("slug IS NULL");
        foreach ($data as $dat) {
            if ($model == 'Wiki')
                $string = $dat->title;
            else
                $string = $dat->name;
            #$string=trim($string);
            $slug = $this->makeSlugs($string);
            $model = $model;
            $slug = $this->Slugunique($model, $slug, 0);
            $dat->slug = $slug;
            #echo "<br>";
            $dat->save();
        }
    }

    public static function getRestUrl($slug) {
        return substr($slug, (strrpos($slug, "-") + 1));
    }

    public static function setRestUrl($id) {
        $model = Restaurant::model()->findbyPk($id);
        return $model->url . "-" . mb_strtolower($model->cities->name) . "-" . $model->id;
    }

    public static function leadmanager($model, $action) {
        if (isset($model) && !empty($model)) {
            $fields_string = "";
            $noOfPersons = $model->nb_person;
            $type = ($model->occasion < 14) ? 2 : 1;
            $budget = $model->budget;
            $event_date = $model->reservation_time;
            $phone = $model->telephone;
            $email = $model->email;
            $full_name = utf8_encode($model->name);
            $act = Yii::app()->params['leadMap'][$action];
            $form_id = Yii::app()->params['leadmanager'][$act];
            $category = 23;
            if ($type == 2)
                $category = 24;
            $company = utf8_encode($model->company);
            $comments = utf8_encode("null");

            $url = 'http://leadmanager.fr/index.php?r=leads/create';
            $fields = array(
                'Leads[form_id]' => $form_id,
                'Leads[pax]' => $noOfPersons,
                'Leads[budget]' => $budget,
                'Leads[description]' => $comments,
                'Leads[title]' => $category,
                'Leads[category]' => $category,
                'Leads[contact_person]' => $full_name,
                'Leads[contact_telephone]' => $phone,
                'Leads[contact_email_id]' => $email,
                'Leads[occasion]' => $model->occasion,
                'Leads[website_id]' => '42',
                'Leads[company_name]' => $company,
                'Leads[event_date]' => $event_date,
            );
            //url-ify the data for the POST
            foreach ($fields as $key => $value) {
                $fields_string .= $key . '=' . $value . '&';
            }
            rtrim($fields_string, '&');
            $ch = curl_init();
            #$fields_string=urldecode($str)
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, count($fields));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //execute post
            $result = curl_exec($ch);
            #echo "<pre>";print_r($result);echo "</pre>";
            //close connection
            curl_close($ch);
        }
    }

    function is_bot_detected() {
        //echo $_SERVER['HTTP_USER_AGENT'];exit;
        if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider/i', $_SERVER['HTTP_USER_AGENT'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Generate Unique integer
     * 
     * @param int $limit
     * @return int
     */
    public static function getUniqInt($limit = 6) {
        $randNumber = substr(number_format(time() * rand(), 0, '', ''), 0, $limit);
        return $randNumber;
    }

    public static function getHotelLimit($count) {
        if ($count == 1) {
            return 5;
        } elseif ($count == 2) {
            return 4;
        } else {
            return 6;
        }
    }

    public static function isCustomerFieldDataExisted($field1, $Value1) {
        $customreObject = Customer::model()->findByAttributes(array($field1 => $Value1), 'is_subscribed=1');
        if ($customreObject) {
            return TRUE;
        } else {
            return false;
        }
    }

    /**
     * formate date
     * 
     * @param date $date
     * @return date
     */
    public static function convertDateFormate($date) {
        $inputDate = new DateTime($date);
        $fromtime1 = $inputDate->format('h:iA');
        $fromtime = $inputDate->format('h:i A');
        $explodeInputDate = explode(":", $fromtime);
        if ($explodeInputDate[1] == "00 AM" || $explodeInputDate[1] == "00 PM") {
            $explodesecond = explode(" ", $explodeInputDate[1]);
            $fromtime1 = $explodeInputDate[0] . $explodesecond[1];
        }
        return $fromtime1;
    }

    public static function breakDateFormate($date) {
        $inputDate = new DateTime($date);
        $fromtime = $inputDate->format('h:i:a');

        return $fromtime;
    }

    /**
     * calculate Percentage
     * 
     * @param int $value1
     * @param int $value2
     * @return int
     */
    public static function getPercentage($value1, $value2, $flag = 0) {
        $percentage = ($value1 * $value2) / 100;
        return $percentage;
        /* if($flag){
          if(($value1!=0 && $value1!='') && ($value2!=0 && $value2!='')) {
          return $percentage = ($value1 * $value2) / 100;
          } else {
          return 0;
          }
          return $percentage = substr((($value1 / $value2)*100),0,2);
          }else {
          if(($value1!=0 && $value1!='') && ($value2!=0 && $value2!=''))
          return $percentage = substr((($value1 / $value2)*100),0,2);
          else
          return 0;
          return $percentage = substr((($value1 / $value2)*100),0,2);
          } */
    }

    public static function getDirectCommission($userName) {
        $percent = Yii::app()->params['percent'];
        /* On User Basis get referral id */
        $sponserId = "'" . $userName . "'";
        $userChieldListObject = User::model()->findAll(array('condition' => 'sponsor_id = ' . $sponserId));
        $totalCommission = 0.00;
        foreach ($userChieldListObject as $userChieldObject) {
            $orderObject = Order::getOrderByValue('user_id', $userChieldObject->id);
            if (!empty($orderObject->package()->amount)) {
                $totalCommission = BaseClass::getPercentage($orderObject->package()->amount, $percent, 1);
            }
            $totalCommission+=$totalCommission;
        }
        return $totalCommission;
    }

    public static function getReCaptcha() {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 5; $i++) {
            $randomString .= $chars[rand(0, strlen($chars) - 1)];
        }
        $_SESSION['captcha'] = strtolower($randomString);
        return $_SESSION['captcha'];
    }

    /**
     * Send SMS
     * 
     * @param number $toNumber
     * @param string $message
     * @return response
     */
    public static function sendSMS($toNumber, $message) {
        //echo $toNumber;
        $api_key = Yii::app()->params['smsConfig']['api_key'];
        $api_secret = Yii::app()->params['smsConfig']['api_secret'];
        $from = Yii::app()->params['smsConfig']['from'];
        $apiUrl = Yii::app()->params['smsConfig']['apiUrl'];
        $message = urlencode($message);
        //constructing url
        $url = $apiUrl . "$api_key&api_secret=$api_secret&from=$from&to=$toNumber&text=$message";
        $smsResponse = Yii::app()->curl->run($url);
        return json_decode($smsResponse);
    }

    public static function md5Encryption($data) {
        return md5($data);
    }

    public static function currencyConvert($from, $to, $amo11) {
        // process API and convert
        //$currency = json_decode(file_get_contents('http://rate-exchange.appspot.com/currency?from=' . $from . '&to=' . $to));
        //return number_format(($currency->rate * $amount), 2, '.', '');
    }

    public static function getmenusections($emailadd) { //echo Yii::app()->user->getState('username');exit;
        $result['sections'] = array();
        $result['psections'] = array();
        $result['section_url'] = array();
        $result['section_ids'] = array();
        $result['section_rurl'] = array();


        if ($emailadd == "") {
            echo "You have been logged out. <a href='/admin'>242424Click here to login again.</a>";
            $adURL = Yii::app()->params['AdminDir'];
            $this->redirect('/' . $adURL . '/default/logout');
        }

        $user = AdminUser::model()->find("email_address='" . $emailadd . "'");
        if ($user->type == 'dayuse') {
            $cat = AduserCataccess::model()->find("aduser_id=" . $user->id);
            if ($cat != NULL) {
                $section = SectionAccess::model()->findAll("category_id=" . $cat->category_id);
                foreach ($section as $ky => $sec) {
                    $secname = AdminSection::model()->find("id=" . $sec->section_id);
                    array_push($result['psections'], $secname->parent_section_id);
                    array_push($result['sections'], $secname->section_name);
                    array_push($result['section_url'], $secname->section_url);

                    if ($secname->section_url != NULL)
                        array_push($result['section_rurl'], $secname->section_url);

                    array_push($result['section_ids'], $secname->id);
                }
                $result['psections'] = array_unique($result['psections']);
            }
        }
        return $result;
    }

    public static function getadminImg($emailadd) {
        if ($emailadd == "") {
            echo "You have been logged out. <a href='/admin'>Click here to login again.</a>";
            $adURL = Yii::app()->params['AdminDir'];
            $this->redirect('/' . $adURL . '/default/logout');
        }
        $adimg = array();

        $user = AdminUser::model()->findAll("login_status=1 and type='dayuse'");
        if ($user != NULL) {
            foreach ($user as $ky => $us) {
                $str = $us->user_icon . ":" . $us->first_name;
                array_push($adimg, $str);
            }
        }

        return $adimg;
    }

    public static function manager_redirect($manager_id) {
        $return_url = Yii::app()->params['manager_homeUrl'];
        // check the manager has any contract review pending or not
        $hotel_access = HotelAccess::model()->findAll("user_id=" . $manager_id);
        if ($hotel_access != NULL) {
            foreach ($hotel_access as $ky => $acc):
                // check any of the hotel contract_status is 0
                $hotel = Hotel::model()->find("id=" . $acc->hotel_id);

                if ($hotel->contract_status == 0) {
                    // set the session for the contract id
                    Yii::app()->user->setState('contract_hotel_id', $acc->hotel_id);

                    // Redirect to the contract page
                    $return_url = '/hotel/contract';
                }
            endforeach;
        }

        return $return_url;
    }

    public static function getCountryList() {
        return $countryObject = Country::model()->findAll();
    }

    public static function getCountryDropdown() {
        $country_info = array();
        $dcrit = "";
        $i = 0;
        //US should come first and then the other country should come in alphabetical order
        $default_country = YII::app()->params['default']['countryId'];
        $dcountry = Country::model()->findByPk($default_country);
        if ($dcountry != NULL) {
            $i++;
            $country_info[$i]['id'] = $dcountry->id;
            $country_info[$i]['name'] = $dcountry->name;
            $country_info[$i]['slug'] = $dcountry->slug;
            $country_info[$i]['iso_code'] = $dcountry->iso_code;
            $country_info[$i]['country_code'] = $dcountry->country_code;
            $country_info[$i]['flag_name'] = $dcountry->flag_name;
            $dcrit = " and id!=" . $default_country;
        }
        $criteria = new CDbCriteria();
        $criteria->condition = "status =1" . $dcrit;
        $criteria->order = "iso_code ASC";

        $country = Country::model()->findAll($criteria);
        if ($country != NULL) {
            foreach ($country as $cn):
                $i++;
                $country_info[$i]['id'] = $cn->id;
                $country_info[$i]['name'] = $cn->name;
                $country_info[$i]['slug'] = $cn->slug;
                $country_info[$i]['iso_code'] = $cn->iso_code;
                $country_info[$i]['country_code'] = $cn->country_code;
                $country_info[$i]['flag_name'] = $cn->flag_name;
            endforeach;
        }

        return $country_info;
    }

    public static function getlastDate($month, $year) {
        $last_day = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        return $last_date = $year . "-" . $month . "-" . $last_day;
    }

    public static function downloadFile($outputFilePath) {

        header('Content-Description: File Transfer');

        header('Cache-Control: public, must-revalidate, max-age=0'); // HTTP/1.1
        header('Pragma: public');
        header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        // force download dialog
        header('Content-Type: application/force-download');
        header('Content-Type: application/octet-stream', false);
        header('Content-Type: application/download', false);
        header('Content-Type: application/pdf', false);
        // use the Content-Disposition header to supply a recommended filename
        header('Content-Disposition: attachment; filename="' . basename($outputFilePath) . '";');
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile($outputFilePath);
    }

    public static function getSelectedArrTime($arrTime) {
        $arrTimeArray = explode(":", $arrTime);
        $hotelArrivalTimeArray = Yii::app()->params['hotelArrivalTimeKeyValue'];
        foreach ($hotelArrivalTimeArray as $key => $arrTime) {
            if ($arrTimeArray[0] == $key) {
                return $arrTime;
                break;
            }
        }
    }

    public static function createArrivalArray($toTime, $fromTime) {
        $toTime = date("G", strtotime($toTime));
        $fromTime = date("G", strtotime($fromTime));
        $arrayTime = array();
        $toTime = ($toTime - 1);
        $fromTime = ($fromTime - 1);
        $j = $toTime;
        for ($i = $toTime; $i < $fromTime; $i++) {
            $j++;
            $toTimeFormate = date("G:i", strtotime($i));
            $fromTimeFormate = date("G:i", strtotime($j));
            $arrayTime[$i] = date("gA", strtotime($i . ":00")) . " - " . date("gA", strtotime($j . ":00"));
        }
        return $arrayTime;
    }

    public static function convertTime($time) {
        //return date("G:i A", strtotime($time));
        return date("g:i A", strtotime($time));
    }

    public static function convertStandardDateFormate($originalDate) {
        return $newDate = date("d/m/Y", strtotime($originalDate));
    }

    public static function getRoomReservation($room_id, $hotel_id, $arrtime1, $bkdate, $adminsection = 0) {
        $return = array();
        $orf = 0;

        $room_status_color = Yii::app()->params->room_status_color;
        $room_status = Yii::app()->params->room_status;

        $criteriaroom = new CDbCriteria();
        $criteriaroom->addColumnCondition(array('room_id' => $room_id, 'res_date' => $bkdate));
        $criteriaroom->addInCondition('reservation_status', array(1, 2));
        $checkroomreservation = Reservation::model()->count($criteriaroom);
        $availability = RoomAvailability::model()->findByAttributes(array('room_id' => $room_id, 'availability_date' => $bkdate));

        $reservedrooms = $checkroomreservation;
        $allroomavailable = $availability->nb_rooms;
        $roomcount = $allroomavailable - $reservedrooms; //Return value

        $return['roomcount'] = $roomcount;
        //Rooms :  $roomcount/$allroomavailable |
        $createurl = FALSE;
        //If Room status is free sale no need to check anything it will be always available
        if ($availability->room_status == "free_sale") {
            $roomclass = "";
            $roombutton = "book now";
            $orf = 0;
            $createurl = TRUE;
            $admin_roomclass = "green";
            $admin_roombutton = "Book now";
            $room_no_stat = "";
            $rmcolor = $room_status_color[$availability->room_status];
            $rmstatus = $room_status[$availability->room_status];
        } else {
            if ($availability->room_status == "closed") {
                $roomclass = "notAvailable";
                $roombutton = "closed";
                $admin_roomclass = "notAvailable";
                $admin_roombutton = "Closed";
                $admin_rowColor = $room_status_color['closed'];
                $room_no_stat = "";
                $rmcolor = $room_status_color[$availability->room_status];
                $rmstatus = $room_status[$availability->room_status];
            } else {
                //Rooms are available for booking
                if ($reservedrooms < $allroomavailable) {
                    if ($availability->room_status == "request") {
                        //Request type room
                        $orf = 1;
                        $roomclass = "onRequest";
                        $roombutton = "on request";
                        $createurl = TRUE;
                        $admin_roomclass = "btn-primary";
                        $admin_roombutton = "On Request";
                        $admin_rowColor = $room_status_color['request'];
                        $rmcolor = $room_status_color[$availability->room_status];
                        $rmstatus = $room_status[$availability->room_status];
                    } else {
                        //Open type room
                        $orf = 0;
                        $roomclass = "";
                        $roombutton = "book now";
                        $createurl = TRUE;
                        $admin_roomclass = "green";
                        $admin_roombutton = "Book now";
                        $admin_rowColor = $room_status_color['open'];
                        $rmcolor = $room_status_color[$availability->room_status];
                        $rmstatus = $room_status[$availability->room_status];
                    }
                    $room_no_stat = "Rooms :  " . $roomcount . "/" . $allroomavailable . " |";
                } else {
                    //Room not available now it depends upon room exhaust status
                    if ($room->exhausted_status == "closed") {
                        $roomclass = "notAvailable";
                        $roombutton = "closed";
                        $admin_roomclass = "notAvailable";
                        $admin_roombutton = "Closed";
                        $admin_rowColor = $room_status_color['closed'];
                        $room_no_stat = "Rooms :  Exhausted |";
                        $rmcolor = $room_status_color[$room->exhausted_status];
                        $rmstatus = $room_status[$room->exhausted_status];
                    } else {
                        //Request type room
                        $orf = 1;
                        $roomclass = "onRequest";
                        $roombutton = "on request";
                        $createurl = TRUE;
                        $admin_roomclass = "btn-primary";
                        $admin_roombutton = "On Request";
                        $admin_rowColor = $room_status_color['request'];
                        $room_no_stat = "Rooms :  Exhausted |";
                        $rmcolor = $room_status_color[$room->exhausted_status];
                        $rmstatus = $room_status[$room->exhausted_status];
                    }
                }
            }
        }

        $url = ($adminsection) ? "admin/reservation/create" : "reservation/create";

        $href = ($createurl) ? Yii::app()->createUrl($url, array('roomId' => $room_id, 'date' => $bkdate, 'hotelId' => $hotel_id, 'arrtime' => $arrtime1, 'orf' => $orf)) : "javascript:void(0)";

        $return['roomclass'] = $roomclass;
        $return['roombutton'] = $roombutton;
        $return['admin_roomclass'] = $admin_roomclass;
        $return['admin_roombutton'] = $admin_roombutton;
        $return['admin_rowColor'] = $rmcolor;
        $return['room_status'] = $rmstatus;
        $return['room_no_stat'] = $room_no_stat;
        $return['href'] = $href;
        $return['buttontype'] = $createurl;
        $return['orf'] = $orf;


        return $return;
    }

    public static function getGenoalogyTree($userId) {
        $genealogyListObject = Genealogy::model()->findAll(array('condition' => 'parent = "' . $userId . '"'));
        return $genealogyListObject;
    }

    public static function getGenoalogyTreeChild($userId, $position) {
        $genealogyListObject = Genealogy::model()->findAll(array('condition' => 'parent = ' . $userId . ' AND position = ' . $position, 'order' => 'position asc'));
        return $genealogyListObject;
    }

    public static function getBinaryTreeChild($userId, $date, $position) {
        $genealogyListObject = Genealogy::model()->findAll(array('condition' => 'parent = ' . $userId . ' AND position = ' . $position . 'AND updated_at = "2015-05-19" ', 'order' => 'position asc'));
        return $genealogyListObject;
    }

    public static function getBinaryCalculationChild($userId, $position) {
        $genealogyListObject = BinaryCommissionTest::model()->findAll(array('condition' => 'parent = ' . $userId . ' AND position = "' . $position.'"', 'order' => 'position asc'));
        return $genealogyListObject;
    }
    
    
    public static function getLeftRightNode($binaryCommissionObject,$position){
//        echo "<pre>"; print_r($binaryCommissionObject->user_id);exit;
        if($position == 'left'){
            echo "left: ".$binaryCommissionObject->order_amount."</br>";
            Yii::app()->session['totalLeftCount'] = Yii::app()->session['totalLeftCount']+$binaryCommissionObject->order_amount;
        } else {
            echo "right : ".$binaryCommissionObject->order_amount."</br>"   ;
            Yii::app()->session['totalRightCount'] = Yii::app()->session['totalRightCount']+$binaryCommissionObject->order_amount;
        }
//        echo $binaryCommissionObject->user_id;
        self::binaryCalculation($binaryCommissionObject->user_id,$binaryCommissionObject->position);
    }

    //1. find the right and left node for user
    //2. Find the extreem right for right node 
    //3. Find the extreem Left for left node
    //4. Calculate the purchased amount
    //5. Compare both and leftamount - rightamount
         //remaining amount carryforward. 
    
    public static function binaryCalculation($userId,$position) {
//        echo "------------".$userId."----------";
        $binaryCommissionLeftObject = BinaryCommissionTest::model()->findByAttributes(array('parent' => $userId, 'position' => $position));
        if(!empty($binaryCommissionLeftObject)){
            self::getLeftRightNode($binaryCommissionLeftObject, $binaryCommissionLeftObject->position);
            return 1;
        }
        return 0;
    }

    


    /**
     * Generate Binary calculation
     * 
     * @param int $userId
     * @return int
     */
    public static function getBinaryTest($userId) {
        
        $binaryCommissionLeftObject = BinaryCommissionTest::model()->findByAttributes(array('parent' => $userId, 'position' => 'left'));
        $binaryCommissionRightObject = BinaryCommissionTest::model()->findByAttributes(array('parent' => $userId, 'position' => 'right'));

        if (!empty($binaryCommissionLeftObject) && !empty($binaryCommissionRightObject)) {

            $commissionAmount = $binaryCommissionRightObject->order_amount;
            if ($binaryCommissionLeftObject->order_amount <= $binaryCommissionRightObject->order_amount) {
                $commissionAmount = $binaryCommissionLeftObject->order_amount;
            }
            $parentCommissionObject = BinaryCommissionTest::model()->findByAttributes(array('user_id' => $userId));
                      
            $getPercentage = self::getPercentage($commissionAmount, 10);
            // self::createBinaryTransaction($userId,$getPercentage);
            $parentCommissionObject->commission_amount = ($parentCommissionObject->commission_amount + $getPercentage);
            $parentCommissionObject->save(false);
            self::getBinaryTest($binaryCommissionRightObject->user_id);
            self::getBinaryTest($binaryCommissionLeftObject->user_id);
        } else {
            return 1;
        }
    }    
    
    
    
    public static function parentParentCommission($userId) {
//        echo "parent Id :" . $userId;
        //read parent object
        $parentCommissionObject = BinaryCommissionTest::model()->findByAttributes(array('user_id' => $userId));
        //verify parent object
        if($parentCommissionObject){
            echo "My parent Id:" . $parentCommissionObject->user_id."</br>";
            echo "Commission Amount : ".$parentCommissionObject->commission_amount."</br>";
               self::parentParentCommission($parentCommissionObject->parent);
               $addParentAmountObject = BinaryCommissionTest::model()->findByAttributes(array('user_id' => $parentCommissionObject->parent));
               if($addParentAmountObject){
                    $addParentAmountObject->commission_amount = ($addParentAmountObject->commission_amount+$parentCommissionObject->commission_amount);
                    $addParentAmountObject->save(false);
               }
//                echo "Parent Parent: ". $commissionObject->parent."</br>";
            //find commission for parent
//            $commissionObject = BinaryCommissionTest::model()->findByAttributes(array('user_id' => $parentCommissionObject->parent));
//            //get commission amount
//            if(!empty($commissionObject)){
//                echo "</br>Amound: ".$commissionAmount = $commissionObject->commission_amount ."</br>";
//                //run loop and pass parent id
//                self::parentParentCommission($commissionObject->parent);
//                echo "Parent Parent: ". $commissionObject->parent."</br>";
//            }
        
//           $parentCommissionObject = BinaryCommissionTest::model()->findAll(array('parent' => $parentCommissionObject->parent));
//           if(count($parentCommissionObject) >1){
//               
//           }
           
        }
//        echo "<pre>";
//        print_r($parentCommissionObject->parent);exit;
//        
//        $binaryCommissionLeftObject = BinaryCommissionTest::model()->findByAttributes(array('user_id' => $userId, 'position' => 'left'));
//        $binaryCommissionRightObject = BinaryCommissionTest::model()->findByAttributes(array('user_id' => $userId, 'position' => 'right'));
//        echo "<pre>";
//          print_r($binaryCommissionLeftObject);
//          echo "<pre>";
//          print_r($binaryCommissionRightObject);exit;
//        if (!empty($binaryCommissionLeftObject) && !empty($binaryCommissionRightObject)) {
//        
//                    echo "<pre>";
//                    echo $binaryCommissionLeftObject->parent;
//                            echo $binaryCommissionRightObject->parent;
////        print_r($binaryCommissionLeftObject->parent);exit;
//        } exit;
        
//        if ($parentCommissionObject) {
//            $parentParentCommissionObject = BinaryCommissionTest::model()->findByAttributes(array('parent' => $parentCommissionObject->parent));
//            self::getParentTotalAmount($parentParentCommissionObject->parent);
//            //self::parentParentCommission($parentParentCommissionObject->parent);
//        }
//        echo "<pre>";
//        print_r($parentParentCommissionObject);
//        exit;
    }

    public static function getParentTotalAmount($userId) {
        $binaryCommissionLeftObject = BinaryCommissionTest::model()->findByAttributes(array('parent' => $userId, 'position' => 'left'));
        $binaryCommissionRightObject = BinaryCommissionTest::model()->findByAttributes(array('parent' => $userId, 'position' => 'right'));

        $commissionAmount = $binaryCommissionRightObject->commission_amount;
        if ($binaryCommissionLeftObject->commission_amount <= $binaryCommissionRightObject->commission_amount) {
            $commissionAmount = $binaryCommissionLeftObject->commission_amount;
        }
        $parentCommissionObject = BinaryCommissionTest::model()->findByAttributes(array('user_id' => $userId));
        $getTotalPercentage = (2*$commissionAmount);
        $parentCommissionObject->commission_amount = ($parentCommissionObject->commission_amount + $getTotalPercentage);
        $parentCommissionObject->save(false);
    }

    public static function createBinaryTransaction($userId, $getPercentage) {

        $postDataArray['paid_amount'] = $getPercentage;
        /* code to fetch parent data */
        $userObject = User::model()->findByPk($userId);

        /* code to fetch parent wallet */
        $toUserWalletObject = Wallet::model()->findByAttributes(array('user_id' => $userId, 'type' => 3));
        if (!$toUserWalletObject) {
            //create wallet for to user
            $fund = 0;
            $toUserWalletObject = Wallet::model()->create($userId, $fund, 3);
        } else {
            $toUserWalletObject->fund = ($toUserWalletObject->fund) + ($getPercentage);
            $toUserWalletObject->save(false);
        }

        /* code to fetch admin wallet data */

        $fromUserWalletObject = Wallet::model()->findByAttributes(array('user_id' => 1, 'type' => 3));
        if ($fromUserWalletObject) {
            $fromUserWalletObject->fund = ($fromUserWalletObject->fund) - ($getPercentage);
            $fromUserWalletObject->save(false);
        }

        $transactionObjectect = Transaction::model()->createTransaction($postDataArray, $userObject);
        if ($transactionObjectect) {
            $postDataArray['comment'] = "Binary Commission Transfered";
            $postDataArray['walletId'] = $fromUserWalletObject->id;
            $postDataArray['toWalletId'] = $toUserWalletObject->id;
            $moneyTransferObject = MoneyTransfer::model()->createMoneyTransfer($postDataArray, $userObject, $transactionObjectect->id, $transactionObjectect->paid_amount);
        }
        return true;
    }

    public static function getRandPosition() {
        $randValue = mt_rand(1, 2);
        return $randValue;
    }

    public static function recurse_copy($src, $dst) {
//        echo "assd"; die;
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if (is_dir($src . '/' . $file)) {
                    recurse_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
        return $dir;
    }
    
    /* For the Left Right Binary */
    public function getLeftRightPurchase($totalPurchase){
        $geneObject = Genealogy::model()->findByAttributes(array('user_id' => $totalPurchase ));
        return $geneObject ;
    }

    /* For the get User List */
    public function getLeftRightMember($userId , $position){
        $geneObject = Genealogy::model()->findByAttributes(array('parent' => $userId , 'position' => $position ));
        $userCountIncrement = 0 ;
        if (count($geneObject)) {
            $userCount = User::model()->count(); 
            for ($i = 1; $i <= $userCount; $i++) {
                if ($i == 1) {
                    $geneObjectNode = Genealogy::model()->findByAttributes(array('parent' => $geneObject->user_id, 'position' => $position));
                    if (count($geneObjectNode)) {
                        $userCountIncrement++;
                        $userId = $geneObjectNode->user_id;                        
                    } else {
                        $userCountIncrement++;
                        $userId = $geneObject->user_id;
                        break;
                    }
                } else {
                    $geneObjectNode = Genealogy::model()->findByAttributes(array('parent' => $userId, 'position' => $position ));
                    if (count($geneObjectNode)) {
                        $userCountIncrement++;
                        $userId = "";
                        $userId .= $geneObjectNode->user_id;
                    } else {
                        $userCountIncrement++;
                        $userId;
                        break;
                    }
                }
                
            }
            return $userCountIncrement;
        } 
    }    

    /* For the package info */
    public static function getPackageName($getPackageName) {
        
        $orderListObject = Order::model()->findByAttributes(array('status' => 1 , 'user_id' => $getPackageName),array('order' => 'package_id DESC'));
        $userObject = User::model()->findByPk($getPackageName);
       
        $color = "sm-nothing";
        
        if($userObject->status == 0 ){
           $color = "sm-user-inactive";
        }
        if($userObject->status == 1 ){
            $color = "sm-user-active";
        }        
        $orderArray = array();                 
        
        if (count($orderListObject) > 0) {
            $myAmount = 0;
            $type = $orderListObject->package_id; 
            if ($type == 1) {
                $color = "sm-basicp1"; //Basic Packages 2
            } else if ($type == 2) {
                $color = "sm-basicp2"; //Basic Packages 3
            } else if ($type == 3) {
                $color = "sm-basicp3"; //Advance Packages 1
            } else if ($type == 4) {
                $color = "sm-advancep1"; //Advance Packages 1
            } else if ($type == 5) {
                $color = "sm-advancep2"; //Advance Packages 2
            } else if ($type == 6) {
                $color = "sm-advancep3"; //Advance Packages 3
            } else if ($type == 7) {
                $color = "sm-pro1"; //Advance Pro Packages 1
            } else if ($type == 8) {
                $color = "sm-pro2"; //Advance Pro Packages 2
            } else if ($type == 9) {
                $color = "sm-pro3"; //Advance Pro Packages 3
            } else {
               // $color = "sm-zzz"; //No Purchase 
            }             
            
        }
        return $color;
    }
    
    public static function buildWebsiteHeader() {
       
        $orderObject = Order::model()->findByAttributes(array('id' =>  $_SESSION['orderID'] ));
        
        $packgeId = $orderObject->package_id ;
        
       $link = '<div class="row setingBox"><a href="/BuildTemp/addlogo" class="btn orange">Logo Setting</a>    
        <!--<a href="/BuildTemp/addheader" class="btn orange">Header Setting</a>-->    
        <a href="/BuildTemp/contactsetting" class="btn orange">Contact Settings</a> 
        <a href="/BuildTemp/addfooter" class="btn orange">Footer Setting</a>'; 
       if($packgeId == '4' || $packgeId == '5' || $packgeId == '6' ){
           $link .='<a href="/BuildTemp/menusetting" class="btn orange">Menus Setting</a>';
       }
        $link .= '</div>';
        return $link;
    }
    
    /**
     * find last purchase node
     * 
     * @param int $nodeId - input node
     */
    public static function setPurchaseNode($parentObject) {
        $nodeId = $parentObject->user_id;
        $todayDate = date('Y-m-d');
        //$date = date('Y-m-d');
        //find left present | not
        //$totalLeftPurchase = 0;
        $binaryCommissionObjectLeft = Genealogy::model()->findByAttributes(array('parent' => $nodeId,'position'=>'left')); 
        
        if($binaryCommissionObjectLeft){
            //echo "<pre>"; print_r($binaryCommissionObjectLeft);//exit;
            //  $totalLeftPurchase = $binaryCommissionObjectLeft->order_amount;
           //echo "Left Id: ".$binaryCommissionObjectLeft->user_id;
           //echo "Left :".$binaryCommissionObjectLeft->order_amount;
            if($todayDate==$binaryCommissionObjectLeft->order_date){
                $binaryCommissionObjectLeft = self::setPurchaseNode($binaryCommissionObjectLeft);
                $parentObject->left_purchase = $binaryCommissionObjectLeft->total_purchase_amount;
                $parentObject->left_user = $binaryCommissionObjectLeft->left_user + 1;
                $parentObject->save(false);
            } else {
                $binaryCommissionObjectLeft = self::setPurchaseNode($binaryCommissionObjectLeft);
            }
        }
        //echo $totalLeftPurchase;
        // exit;
        //find right present | not
                
        $binaryCommissionObjectRight = Genealogy::model()->findByAttributes(array('parent' => $nodeId,'position'=>'right')); 
        if($binaryCommissionObjectRight){
            //echo "Left Id: ".$binaryCommissionObjectRight->user_id;
           //echo "Left :".$binaryCommissionObjectRight->order_amount;
            if($todayDate==$binaryCommissionObjectRight->order_date){
                $binaryCommissionObjectRight = self::setPurchaseNode($binaryCommissionObjectRight);
                $parentObject->right_purchase = $binaryCommissionObjectRight->total_purchase_amount;
                $parentObject->right_user = $binaryCommissionObjectRight->right_user + 1;
                $parentObject->save(false);
            } else {
                $binaryCommissionObjectRight = self::setPurchaseNode($binaryCommissionObjectRight);
            }
        }
//        exit;
        // Total Purchase amount
        $totalPurchase = ($parentObject->right_purchase + $parentObject->left_purchase+ $parentObject->order_amount);
        $parentObject->total_purchase_amount = $totalPurchase;
        $parentObject->save(false);
        //binary calculation
        $parentObject = self::setBinary($parentObject);
        return $parentObject;
    }
    
    /**
     * Calculate Binary for specific node
     * 
     * @param objectd $parentObject
     * @return object
     */
    public static function setBinary($parentObject){
        $nodeId = $parentObject->user_id;
        $isValidNode = self::binaryEligible($nodeId);
        //binary calculation percentage
        $binaryPercentage = 0.1;
      
        //is valid node
        if($isValidNode){
            $leftNodeAmount = $parentObject->left_purchase+$parentObject->left_carry;
            $rightNodeAmount = $parentObject->right_purchase+$parentObject->right_carry;
            if($leftNodeAmount == $rightNodeAmount){
                $binaryAmount = ($leftNodeAmount*$binaryPercentage);
                $parentObject->left_carry = 0;
                $parentObject->right_carry = 0;
            }
            if($leftNodeAmount < $rightNodeAmount){
                $binaryAmount = ($leftNodeAmount*$binaryPercentage);
                $parentObject->left_carry = 0;
                $parentObject->right_carry = ($rightNodeAmount - $leftNodeAmount);
            }
            if($leftNodeAmount > $rightNodeAmount){
                $binaryAmount = ($rightNodeAmount*$binaryPercentage);
                $parentObject->right_carry = 0;
                $parentObject->left_carry = ($leftNodeAmount-$rightNodeAmount);
            }
            if($parentObject->id !='1') {
                $limit = self::cappingLimit($parentObject->user_id);
                if($limit !=''){
                if($binaryAmount > $limit) {
                    $parentObject->commission_amount = $limit;
                    $parentObject->right_carry = 0;
                    $parentObject->left_carry = 0;
                } else{
                    $parentObject->commission_amount = $binaryAmount;   
                }
                }else{
                 $parentObject->commission_amount = $binaryAmount;    
                }
            } else {
                $parentObject->commission_amount = $binaryAmount;    
            }
            if($binaryAmount > $limit) {
            $binaryAmount = $limit;
            }else{
            $binaryAmount = $binaryAmount;  
            }
           
            $parentObject->save(false);
            if($binaryAmount !=0) {
            self::createCommissionTransaction($binaryAmount,$parentObject);
            
            }
            
        }
        return $parentObject;
        
    }
    public static function cappingLimit($parentObject)
    {
        $limit = "";
        $orderObject = Order::model()->findByAttributes(array('user_id'=> $parentObject),array('order' => 'id DESC'));
          if(!empty($orderObject)) 
          {
            /* packageObject*/
            
            //$packageObject = Package::model()->findByPk($orderObject->package_id);
            //$orderObject->package()->type;
            if($orderObject->package()->type==1)
            {
                $limit = 1000;
            }
            if($orderObject->package()->type==2)
            {
                $limit = 1500;
            }
            if($orderObject->package()->type==3)
            {
                $limit = 2500;
            }
          }
            
            return $limit;
    }
    
    public static function createCommissionTransaction($binaryAmount,$parentObject) {
            $nodeId = $parentObject->user_id;  
            $postDataArray['paid_amount'] = $binaryAmount;
            $userObject = User::model()->findByAttributes(array('id' => $parentObject->user_id));
            $transactionObjectect = Transaction::model()->createTransaction($postDataArray, $userObject,'admin');
            /* wallet object */
            $walletObject = Wallet::model()->findByAttributes(array('user_id' => $nodeId, 'type' => 3)); 
            if(!empty($walletObject))
            {
                $walletObject->fund = $walletObject->fund + $binaryAmount;
                $walletObject->save(false);
            }else{
                $walletObject = Wallet::model()->create($nodeId,$binaryAmount,3);
            }
            $postDataArray['userId'] = $nodeId;
            $adminWalletObject = Wallet::model()->findByAttributes(array('user_id' => 1, 'type' => 3));
            $postDataArray['toWalletId'] = $adminWalletObject->id;
            $postDataArray['userId'] = $nodeId;
            $postDataArray['walletId'] = $walletObject->id;
            $postDataArray['fromUserId'] = 1;
            $postDataArray['comment'] = 'Binary Commission Transfered.'; 
            $moneyTransferObject = MoneyTransfer::model()->createMoneyTransfer($postDataArray, $userObject, $transactionObjectect->id, $transactionObjectect->paid_amount,'admin');  
            $userMailObject = UserController::binaryMail($parentObject);
            //$mailSent = User::model()->binaryMail($parentObject);
            return 1;   
            
            }
    
    /**
     * Check binary node both the purchase amount for given node
     * 
     * @param int $nodeId
     * @return boolean | amount
     */
    public static function binaryEligible($nodeId){
        return true; 
//        //find the left node amount
//        $binaryCommissionObjectLeft = BinaryCommissionTest::model()->findByAttributes(array('parent' => $nodeId,'position'=>'left'));   
//        //find left node amount
//        $binaryCommissionObjectRight = BinaryCommissionTest::model()->findByAttributes(array('parent' => $nodeId ,'position'=>'right'));
//        if (!empty($binaryCommissionObjectLeft) && !empty($binaryCommissionObjectRight)) {
//            //send both node purchase amount
//            return true;
//        }
//        return false;
    }

    public static function pagesCount($orderId){
        $pageLimit = Order::model()->findByAttributes(array('id' => $orderId));
            
            if($pageLimit->package_id == 1){
                $pages = 1 ;
            }else if($pageLimit->package_id == 2){
                $pages = 3 ;
            }else if($pageLimit->package_id == 4){
                $pages = 5 ;
            }else if($pageLimit->package_id == 5){
                $pages = 10 ;
            }else if($pageLimit->package_id == 6){
                $pages = 15 ;
            }else if($pageLimit->package_id == 7){
                $pages = 20 ;
            }else{
                $pages = 2 ;
            }
            return $pages ;
    }
    
    public static function getNode($parentObject) {
        $nodeId = $parentObject;
        $todayDate = date('Y-m-d');
        //find left present | not
       
        $binaryCommissionObjectLeft = Genealogy::model()->findByAttributes(array('parent' => $nodeId,'position'=>'left')); 
        $j = 0;
        $k = 0;   
        if($binaryCommissionObjectLeft){
            $j = $j+1;
            $binaryCommissionObjectLeft = self::getNode($binaryCommissionObjectLeft->user_id);
         }
        //echo $totalLeftPurchase;
        // exit;
        //find right present | not
            
        $binaryCommissionObjectRight = Genealogy::model()->findByAttributes(array('parent' => $nodeId,'position'=>'right')); 
        if($binaryCommissionObjectRight){
            $k = $k+1;
            echo $binaryCommissionObjectRight->user_id;
            $binaryCommissionObjectRight = self::getNode($binaryCommissionObjectRight->user_id);
          }
//        exit;
        // Total Purchase amount
        //$totalPurchase = ($parentObject->right_purchase + $parentObject->left_purchase+ $parentObject->order_amount);
        //$parentObject->total_purchase_amount = $totalPurchase;
        //$parentObject->save(false);
        //binary calculation
        //$parentObject = self::setBinary($parentObject);
          echo $j;
          echo $k;
        return $j.'_'.$k;
    }
    
    public static function mySelfCount(){
        $userId = 262;
        $leftGenealogyCount = self::getLeftRightMember($userId, 'left');
        $rightGenealogyCount = self::getLeftRightMember($userId, 'right');
        
        echo "<pre>"; print_r($leftGenealogyCount);
        echo "<pre>"; print_r($rightGenealogyCount);
        
        
        
        
        
        
        
        
        exit;
    }
            
    
}
