<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="' <?php echo Yii::app()->getBaseUrl(true) ;?> . '/css/main.css">
<?php
/* @var $this GenealogyController */
/* @var $model Genealogy */

$regVar = '/user/registration/?spid=';
$treeVar = '/admin/user/genealogy/';

$this->breadcrumbs = array(
    'Genealogies'
);
?>


<?php if(empty($error)){ ?> 

<?php 
$currentUserId = base64_decode($currentUserId);
$userObject = User::model()->findByAttributes(array('id' => $currentUserId)); 

if (!empty($_GET['id'])) {
    echo '<div class="row"><div class="col-md-12"><span><a onclick="window.history.back(-1);" style="float:right;font-size:16px;color:#f15c2b;cursor:pointer;">Go Back >></a></span></div></div>';
}
?>
<div class="">
    <div class="row">
        <div class="col-md-6">
            <div class="expiration margin-topDefault confirmMenu" style="display:inline-block;">
                <form action="" class="form-inline">
                    <input type="text" class="form-control dvalid" name="name"  onchange="getFullName(this.value);" id="search_username"  value="<?php echo $userObject->full_name; ?>" />
                    <span id="search_fullname">&nbsp;</span>
                    <input type="button" name="submit" value="Search" onclick="submitform();" class="btn btn-success confirmOk">
                </form>
            </div>
        </div>
        <div class="col-md-3">
            <?php 
            if(isset($_POST['submit'])){
                echo '<p class="btn green"> Binary Generated Successfully</p>';
            }
            
            ?>
            <p id="loader"></p>
        </div>
        <div class="col-md-3">
            <form action="binarycalculation" method="post" class="form-inline">                
                <input type="submit" name="submit" class="btn orange btn-primary confirmOk" value="Generate Binary Commission">
            </form>
        </div>

    </div>
    <span>
        <?php $empty = "sm-blank"; //no Package 
        $smBlack = '<a class="sm-blank" href="#"><div><span></span></div></a>';
        ?>

        <div class="col-sm-8 col-xs-12">
            <div class="row mytree">
                <ul>
                    <li>
                        <?php 
                            $userObject = User::model()->findByAttributes(array('id' => $currentUserId  )); 
                            $getColor =  BaseClass::getPackageName($currentUserId);
                            $getUserPurchase = BaseClass::getLeftRightPurchase($currentUserId);
                          
                        ?>
                        <a href="" class="<?php echo $getColor; ?>">
                        <div>
                            <span class="myPop" data-container="body" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content=""><?php echo $userObject->name; ?>
                                <div id="popover_content_wrapper" style="display: none; ">
                                    <ul class="packageDetail">
<!--                                        <li><p>Total Left Registration</p><span> <?php  //print_r($getUserInfoLeft); ?></span> </li>
                                        <li><p>Total Right Registration</p><span> <?php //print_r($getUserInfoRight); ?></span> </li>-->
                                        <li><p>Total Left Purchase</p><span> <?php echo $getUserPurchase->left_purchase; ?></span> </li>
                                        <li><p>Total Right Purchase</p><span> <?php echo $getUserPurchase->right_purchase; ?></span> </li>
                                    </ul>
                                </div>
                            </span>
                        </div>
                    </a>
                        <ul>
                            <li>
                                <?php   
                                if (count($genealogyLeftListObject) > 0 && $genealogyLeftListObject != 'no') {
                                    $getColor = BaseClass::getPackageName($genealogyLeftListObject[0]->user_id);
                                    //$getUserInfo = BaseClass::getLeftRightMember($currentUserId);
                                    ?>
                                    <a class="<?php echo $getColor; ?>" href="<?php echo $treeVar . '?id=' . base64_encode($genealogyLeftListObject[0]->user_id); ?>"><div><span><?php echo $genealogyLeftListObject[0]->user->name; ?></span></div></a>
                                    <ul>
                                        <?php $genealogyLeftLeftListObject = BaseClass::getGenoalogyTreeChild(base64_encode($genealogyLeftListObject[0]->user_id), "'left'"); ?>
                                        <?php
                                        if (count($genealogyLeftLeftListObject) > 0 ) {
                                            $getColor = BaseClass::getPackageName($genealogyLeftLeftListObject[0]->user_id);
                                            ?>
                                            <li><a class="<?php echo $getColor; ?>" href="<?php echo $treeVar . '?id=' . base64_encode($genealogyLeftLeftListObject[0]->user_id); ?>"><div><span><?php echo $genealogyLeftLeftListObject[0]->user->name; ?></span></div></a></li>
                                        <?php } else { ?>
                                            <li><a class="<?php echo $empty; ?>" href="<?php echo $regVar . $genealogyLeftListObject[0]->user->name; ?>&position=left"><div><span>+</span></div></a></li>    
                                        <?php } ?>     
                                        
                                        <?php $genealogyLeftRighttListObject = BaseClass::getGenoalogyTreeChild(base64_encode($genealogyLeftListObject[0]->user_id), "'right'"); ?>   
                                        <?php
                                        
                                        if (count($genealogyLeftRighttListObject) > 0 && $genealogyLeftRighttListObject != 'no' ) {
                                            $getColor = BaseClass::getPackageName($genealogyLeftRighttListObject[0]->user_id);
                                            ?>
                                            <li><a class="<?php echo $getColor; ?>" href="<?php echo $treeVar . '?id=' . base64_encode($genealogyLeftRighttListObject[0]->user_id); ?>"><div><span><?php echo $genealogyLeftRighttListObject[0]->user->name; ?></span></div></a></li>
                                        <?php } else { ?>
                                            <li><a class="<?php echo $empty; ?>" href="<?php echo $regVar . $genealogyLeftListObject[0]->user->name; ?>&position=right"><div><span>+</span></div></a></li>   
                                    <?php } ?> 
                                    </ul>
                            <?php } else { ?>
                                    <a class="<?php echo $empty; ?>" href="<?php echo $regVar . $userObject->name; ?>&position=left"><div><span>+</span></div></a>
                                    <ul>
                                        <li><?php echo $smBlack ; ?></li>  
                                        <li><?php echo $smBlack ; ?></li>  
                                    </ul>
                                </li>

                        <?php } ?>
                    </li>
                    <li> 
                        <?php
                        if (count($genealogyRightListObject) > 0 && $genealogyRightListObject != 'no') {
                            $getColor = BaseClass::getPackageName($genealogyRightListObject[0]->user_id);
                            ?>
                            <a class="<?php echo $getColor; ?>" href="<?php echo $treeVar . '?id=' . base64_encode($genealogyRightListObject[0]->user_id); ?>"><div><span><?php echo $genealogyRightListObject[0]->user->name; ?></span></div></a>
                            <ul>
                                <?php $genealogyRightLeftListObject = BaseClass::getGenoalogyTreeChild(base64_encode($genealogyRightListObject[0]->user_id), "'left'"); ?>
                                <?php
                                if (count($genealogyRightLeftListObject) > 0 && $genealogyRightLeftListObject != 'no') {
                                    $getColor = BaseClass::getPackageName($genealogyRightLeftListObject[0]->user_id);
                                    ?>
                                    <li><a class="<?php echo $getColor; ?>" href="<?php echo $treeVar . '?id=' . base64_encode($genealogyRightLeftListObject[0]->user_id); ?>"><div><span><?php echo $genealogyRightLeftListObject[0]->user->name; ?></span></div></a></li>
                                <?php } else { ?>
                                    <li><a class="<?php echo $empty; ?>" href="<?php echo $regVar . $genealogyRightListObject[0]->user->name; ?>&position=left"><div><span>+</span></div></a></li>  
                                <?php } ?>     

                                <?php $genealogyRightRighttListObject = BaseClass::getGenoalogyTreeChild(base64_encode($genealogyRightListObject[0]->user_id), "'right'"); ?>   
                                <?php
                                if (count($genealogyRightRighttListObject) > 0 && $genealogyRightRighttListObject != 'no' ) {
                                    $getColor = BaseClass::getPackageName($genealogyRightRighttListObject[0]->user_id);
                                    ?>
                                    <li><a class="<?php echo $getColor; ?>" href="<?php echo $treeVar . '?id=' . base64_encode($genealogyRightRighttListObject[0]->user_id); ?>"><div><span><?php echo $genealogyRightRighttListObject[0]->user->name; ?></span></div></a></li>
                        <?php } else { ?>
                                    <li><a class="<?php echo $empty; ?>" href="<?php echo $regVar . $genealogyRightListObject[0]->user->name; ?>&position=right"><div><span>+</span></div></a></li>
                        <?php } ?> 
                            </ul>
                        <?php } else { ?>
                            <a class="<?php echo $empty; ?>" href="<?php echo $regVar . $userObject->name; ?>&position=right"><div><span>+</span></div></a>
                            <ul>
                                <li><?php echo $smBlack ; ?></li>  
                                <li><?php echo $smBlack ; ?></li>  
                            </ul>
                        </li>
                <?php } ?>
                    </li>
                </ul>
               
                </li>
                </ul>
            </div> 
        </div>

 <?php }else {                    
        echo '<p style="padding: 25px 41px 37px;" class="error error-new"><span class="span-error">'.$error.'</span></p>';
       } ?>
    <div class="row">

        <div class="col-sm-12 detailPackage">
            <h4>PACKAGE DETAILED INFORMATION</h4>
            <div class="row">
                <div class="col-sm-3 col-xs-12">
                    <table>
                        <tr>
                            <th>
                        <div class="basicP">
                            <div class="colorBox">
                                <span style="color: #cccccc;">&#x2B22;</span>
                                <img class="img-responsive" src="/images/activeM.png">
                            </div>
                            <p> User</p>
                        </div>
                        </th>
                        </tr>
                        <tr>
                            <th>
                        <div class="basicP">
                            <div class="colorBox">
                                <span style="color: #a6a6a6;">&#x2B22;</span>
                                <img class="img-responsive" src="/images/activeM.png">
                            </div>
                            <p>  User inactive</p>
                        </div>
                        </th>
                        </tr>
                        <tr>
                            <th>
                        <div class="basicP">
                            <div class="colorBox">
                                <span style="color: #727272;">&#x2B22;</span>
                                <img class="img-responsive" src="/images/activeM.png">
                            </div>
                            <p> User Active</p>
                        </div>
                        </th>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <table>
                        <tr>
                            <th>
                        <div class="basicP">
                            <div class="colorBox">
                                <span style="color: #8fd900;">&#x2B22;</span>
                                <img class="img-responsive" src="/images/activeM.png">
                            </div>
                            <p>  Basic Packages 1</p>
                        </div>
                        </th>
                        </tr>
                        <tr>
                            <th>
                        <div class="basicP">
                            <div class="colorBox">
                                <span style="color: #db5300;">&#x2B22;</span>
                                <img class="img-responsive" src="/images/activeM.png">
                            </div>
                            <p>  Basic Packages 2</p>
                        </div>
                        </th>
                        </tr>
                        <tr>
                            <th>
                        <div class="basicP">
                            <div class="colorBox">
                                <span style="color: #dce903;">&#x2B22;</span>
                                <img class="img-responsive" src="/images/activeM.png">
                            </div>
                            <p> Basic Packages 3</p>
                        </div>
                        </th>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-3 col-xs-12">

                    <table>
                        <tr>
                            <th>
                        <div class="basicP">
                            <div class="colorBox">
                                <span style="color: #0377ea;">&#x2B22;</span>
                                <img class="img-responsive" src="/images/activeM.png">
                            </div>
                            <p> Advanced Packages 1</p>
                        </div>
                        </th>
                        </tr>
                        <tr>
                            <th>
                        <div class="basicP">
                            <div class="colorBox">
                                <span style="color: #9137ea;">&#x2B22;</span>
                                <img class="img-responsive" src="/images/activeM.png">
                            </div>
                            <p>  Advanced Packages 2</p>
                        </div>
                        </th>
                        </tr>
                        <tr>
                            <th>
                        <div class="basicP">
                            <div class="colorBox">
                                <span style="color: #00c0ec;">&#x2B22;</span>
                                <img class="img-responsive" src="/images/activeM.png">
                            </div>
                            <p>Advanced Packages 3</p>
                        </div>
                        </th>
                        </tr>
                    </table>

                </div>
                <div class="col-sm-3 col-xs-12">

                    <table>
                        <tr>
                            <th>
                        <div class="basicP">
                            <div class="colorBox">
                                <span style="color: #ea9000;">&#x2B22;</span>
                                <img class="img-responsive" src="/images/activeM.png">
                            </div>
                            <p> Advanced Pro 1</p>
                        </div>
                        </th>
                        </tr>
                        <tr>
                            <th>
                        <div class="basicP">
                            <div class="colorBox">
                                <span style="color: #00c265;">&#x2B22;</span>
                                <img class="img-responsive" src="/images/activeM.png">
                            </div>
                            <p> Advanced Pro 2 </p>
                        </div>
                        </th>
                        </tr>
                        <tr>
                            <th>
                        <div class="basicP">
                            <div class="colorBox">
                                <span style="color: #e90000;">&#x2B22;</span>
                                <img class="img-responsive" src="/images/activeM.png">
                            </div>
                            <p> Advanced Pro 3</p>
                        </div>
                        </th>
                        </tr>
                    </table>

                </div>


            </div>
            <h4></h4>
        </div>
    </div>

</div>
<link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/main.css">

<input type="hidden" name='userSearch' value='' id='search_user_id'>
<script type="text/javascript">
    function showusergeneo(userVal) {
        location.href = "/admin/user/genealogy?id=" + userVal;
    }
    function submitform() {
        var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}
        var id = $('#search_user_id').val();
       
        if (id != '') {
            location.href = "/admin/user/genealogy?id=" + Base64.encode(id) ;
        }
    }
    function generateBinary() {
        $.ajax({
            type: "post",
            url: "/admin/genealogy/binarycalculation",
            data: "adminId=" + 1,
            dataType: "json",
            beforeSend: function () {
                $('#loader').html('loading...');
            },
            success: function (msg) {
              alert(msg);
                $('#loader').html(msg);
               // window.location.href = "/admin/user/genealogy?msg=1";
            }
        });
    }
   
   
   
</script>
<script type="text/javascript" src="/js/transaction.js"></script>
<link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true) ;?>/css/main.css">
 <script type="text/javascript">
$(document).ready(function(){
  $('.myPop').popover({ 
    html : true,
    content: function() {
      return $('#popover_content_wrapper').html();
    }
  });
});
</script>
<style>
    .tooltip.fade.bottom.in{left:45% !important; display: block !important;}
</style>