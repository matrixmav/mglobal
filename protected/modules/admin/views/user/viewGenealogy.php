<?php
/* @var $this GenealogyController */
/* @var $model Genealogy */

$regVar = '/user/registration/?spid=';
$treeVar = '/admin/user/genealogy/';


$this->breadcrumbs = array(
    'Genealogies'
);
?>

<?php
$userObject = User::model()->findByAttributes(array('id' => $currentUserId));
echo '<link rel="stylesheet" href="' . Yii::app()->getBaseUrl(true) . '/css/main.css">';
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
                    <input type="button" name="submit" value="Search" onclick="submitform();" class="btn btn-primary confirmOk">
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
                <input type="submit" name="submit" class="btn red btn-primary confirmOk" value="Generate Binary Commission">
            </form>
            
            <!--<a href="" id="generateCommission" class="btn red" onclick="generateBinary()">Generate Binary Commission</a>-->

        </div>


    </div>
    <span>
        <?php $empty = "sm-blank"; //no Package
        ?>

        <div class="col-sm-8 col-xs-12">
            <div class="row mytree">
                <ul>
                    <li>
                        <?php $userObject = User::model()->findByAttributes(array('id' => $currentUserId)); ?>
                        <a href="" class="sm-red"><div><span><?php echo $userObject->name; ?></span></div></a>
                        <ul>
                            <li>
                                <?php
                                if (count($genealogyLeftListObject) > 0) {
                                    $getColor = BaseClass::getPackageName($genealogyLeftListObject[0]->user_id);
                                    ?>
                                    <a class="<?php echo $getColor; ?>" href="<?php echo $treeVar . '?id=' . $genealogyLeftListObject[0]->user_id; ?>"><div><span><?php echo $genealogyLeftListObject[0]->user->name; ?></span></div></a>
                                    <ul>
                                        <?php $genealogyLeftLeftListObject = BaseClass::getGenoalogyTreeChild($genealogyLeftListObject[0]->user_id, "'left'"); ?>
                                        <?php
                                        if (count($genealogyLeftLeftListObject) > 0) {
                                            $getColor = BaseClass::getPackageName($genealogyLeftLeftListObject[0]->user_id);
                                            ?>
                                            <li><a class="<?php echo $getColor; ?>" href="<?php echo $treeVar . '?id=' . $genealogyLeftLeftListObject[0]->user_id; ?>"><div><span><?php echo $genealogyLeftLeftListObject[0]->user->name; ?></span></div></a></li>
                                        <?php } else { ?>
                                            <li><a class="<?php echo $empty; ?>" href="<?php echo $regVar . $genealogyLeftListObject[0]->user->name; ?>&position=left"><div><span>+</span></div></a></li>    
                                        <?php } ?>     

                                        <?php $genealogyLeftRighttListObject = BaseClass::getGenoalogyTreeChild($genealogyLeftListObject[0]->user_id, "'right'"); ?>   
                                        <?php
                                        if (count($genealogyLeftRighttListObject) > 0) {
                                            $getColor = BaseClass::getPackageName($genealogyLeftRighttListObject[0]->user_id);
                                            ?>
                                            <li><a class="<?php echo $getColor; ?>" href="<?php echo $treeVar . '?id=' . $genealogyLeftRighttListObject[0]->user_id; ?>"><div><span><?php echo $genealogyLeftRighttListObject[0]->user->name; ?></span></div></a></li>
                                        <?php } else { ?>
                                            <li><a class="<?php echo $empty; ?>" href="<?php echo $regVar . $genealogyLeftListObject[0]->user->name; ?>&position=right"><div><span>+</span></div></a></li>   
                                    <?php } ?> 
                                    </ul>
<?php } else { ?>
                                    <a class="<?php echo $empty; ?>" href="<?php echo $regVar . $userObject->name; ?>&position=left"><div><span>+</span></div></a>
                                    <ul>
                                        <li><a class="sm-blank" href="#"><div><span></span></div></a></li>  
                                        <li><a class="sm-blank" href="#"><div><span></span></div></a></li>
                                    </ul>
                                </li>

                        <?php } ?>
                    </li>
                    <li> 
                        <?php
                        if (count($genealogyRightListObject) > 0) {
                            $getColor = BaseClass::getPackageName($genealogyRightListObject[0]->user_id);
                            ?>
                            <a class="<?php echo $getColor; ?>" href="<?php echo $treeVar . '?id=' . $genealogyRightListObject[0]->user_id; ?>"><div><span><?php echo $genealogyRightListObject[0]->user->name; ?></span></div></a>
                            <ul>
                                <?php $genealogyRightLeftListObject = BaseClass::getGenoalogyTreeChild($genealogyRightListObject[0]->user_id, "'left'"); ?>
                                <?php
                                if (count($genealogyRightLeftListObject) > 0) {
                                    $getColor = BaseClass::getPackageName($genealogyRightLeftListObject[0]->user_id);
                                    ?>
                                    <li><a class="<?php echo $getColor; ?>" href="<?php echo $treeVar . '?id=' . $genealogyRightLeftListObject[0]->user_id; ?>"><div><span><?php echo $genealogyRightLeftListObject[0]->user->name; ?></span></div></a></li>
                                <?php } else { ?>
                                    <li><a class="<?php echo $empty; ?>" href="<?php echo $regVar . $genealogyRightListObject[0]->user->name; ?>&position=left"><div><span>+</span></div></a></li>  
                                <?php } ?>     

                                <?php $genealogyRightRighttListObject = BaseClass::getGenoalogyTreeChild($genealogyRightListObject[0]->user_id, "'right'"); ?>   
                                <?php
                                if (count($genealogyRightRighttListObject) > 0) {
                                    $getColor = BaseClass::getPackageName($genealogyRightRighttListObject[0]->user_id);
                                    ?>
                                    <li><a class="<?php echo $getColor; ?>" href="<?php echo $treeVar . '?id=' . $genealogyRightRighttListObject[0]->user_id; ?>"><div><span><?php echo $genealogyRightRighttListObject[0]->user->name; ?></span></div></a></li>
    <?php } else { ?>
                                    <li><a class="<?php echo $empty; ?>" href="<?php echo $regVar . $genealogyRightListObject[0]->user->name; ?>&position=right"><div><span>+</span></div></a></li>
    <?php } ?> 
                            </ul>
<?php } else { ?>
                            <a class="<?php echo $empty; ?>" href="<?php echo $regVar . $userObject->name; ?>&position=right"><div><span>+</span></div></a>
                            <ul>
                                <li><a class="sm-blank" href="#"><div><span></span></div></a></li>  
                                <li><a class="sm-blank" href="#"><div><span></span></div></a></li>
                            </ul>

                        </li>

<?php } ?>
                    </li>
                </ul>
                </li>
                </ul>
            </div> 
        </div>
        <!--        
                     <div class="col-sm-4 col-xs-12">
                         <ul class="packageDetail">
                             <li><p>Total Packages</p><span> 122</span> </li>
                             <li><p>Total Packages Today</p><span> 122</span> </li>
                              <li><p>Total Registration</p><span> 122</span> </li>
                             
                         </ul>
                     </div>-->


        <div class="row">

            <div class="col-sm-12 detailPackage">
                <h4>PACKAGE DETAILED INFORMATION</h4>
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                        <table>
                            <tr>
                                <th>
                            <div class="basicP">
                                <img src="/images/blank.png">
                                <p> User</p>
                            </div>
                            </th>
                            </tr>
                            <tr>
                                <th>
                            <div class="basicP">
                                <img src="/images/inactive.png">
                                <p>  User inactive</p>
                            </div>
                            </th>
                            </tr>
                            <tr>
                                <th>
                            <div class="basicP">
                                <img src="/images/active.png">
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
                                <img src="/images/basic-p1.png">
                                <p> Basic Packages 1</p>
                            </div>
                            </th>
                            </tr>
                            <tr>
                                <th>
                            <div class="basicP">
                                <img src="/images/basic-p2.png">
                                <p>  Basic Packages 2</p>
                            </div>
                            </th>
                            </tr>
                            <tr>
                                <th>
                            <div class="basicP">
                                <img src="/images/basic-p3.png">
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
                                <img src="/images/advance-p1.png">
                                <p> Advanced Packages 1</p>
                            </div>
                            </th>
                            </tr>
                            <tr>
                                <th>
                            <div class="basicP">
                                <img src="/images/advance-p2.png">
                                <p>  Advanced Packages 2</p>
                            </div>
                            </th>
                            </tr>
                            <tr>
                                <th>
                            <div class="basicP">
                                <img src="/images/advance-p3.png">
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
                                <img src="/images/advance-pro1.png">
                                <p> Advanced Pro 1</p>
                            </div>
                            </th>
                            </tr>
                            <tr>
                                <th>
                            <div class="basicP">
                                <img src="/images/advance-pro2.png">
                                <p> Advanced Pro 2 </p>
                            </div>
                            </th>
                            </tr>
                            <tr>
                                <th>
                            <div class="basicP">
                                <img src="/images/advance-pro3.png">
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
        var id = $('#search_user_id').val();
        if (id != '') {
            location.href = "/admin/user/genealogy?id=" + id;
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
