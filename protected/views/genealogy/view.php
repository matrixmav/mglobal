<?php
/* @var $this GenealogyController */
/* @var $model Genealogy */

$regVar  = '/user/registration/?spid=' ;
$treeVar = '/genealogy/';

$this->breadcrumbs=array(
	'Genealogies'=>array('index'),
        "Tree"
); 

/* For Define node Color */
$empty = "sm-blank" ; //no Package
 
?>
<div class="row">

    <div class="col-md-12">
        <span><?php if (!empty($_GET) && $_GET['id'] != '') { ?><a onclick="window.history.back(-1);" style="float:right;font-size:16px;color:#f15c2b;cursor:pointer;text-decoration:none;">Go Back >></a><?php } ?></span>
    </div>
</div>
<div class="row">
    <div class="col-sm-8 col-xs-12">
        <div class="row mytree">
            <ul>
                <li>
                    <?php 
                    $userObject = User::model()->findByAttributes(array('id' => $currentUserId  )); 
                    $getColor =  BaseClass::getPackageName($currentUserId);
                    $getUserInfoRight = BaseClass::getLeftRightMember($currentUserId ,'right');
                    $getUserInfoLeft = BaseClass::getLeftRightMember($currentUserId ,'left');                          
                    ?>
                    <a href="" class="<?php echo $getColor ; ?>"><div><span class="myPop" data-container="body" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content=""><?php echo $userObject->name; ?>
                                <div id="popover_content_wrapper" style="display: none; ">
                                    <ul class="packageDetail">
                                                       <li><p>Total Packages</p><span> 122</span> </li>
                                                       <li><p>Total Packages Today</p><span> 122</span> </li>
                                                        <li><p>Total Registration</p><span> 122</span> </li>

                                                   </ul>
                                  </div>
                            </span></div></a>
                    <ul>
                        <li>
                            <?php
                                if(count($genealogyLeftListObject) > 0 ){
                                  $getColor =  BaseClass::getPackageName($genealogyLeftListObject[0]->user_id);                                        
                            ?>
                            <a class="<?php echo $getColor ; ?>" href="<?php echo $treeVar.'?id='.$genealogyLeftListObject[0]->user_id; ?>"><div><span><?php echo $genealogyLeftListObject[0]->user->name; ?></span></div></a>
                            <ul>
                                <?php $genealogyLeftLeftListObject = BaseClass::getGenoalogyTreeChild($genealogyLeftListObject[0]->user_id, "'left'"); ?>
                                <?php if(count($genealogyLeftLeftListObject) > 0 ){ 
                                    $getColor =  BaseClass::getPackageName($genealogyLeftLeftListObject[0]->user_id);
                                    ?>
                                    <li><a class="<?php echo $getColor ; ?>" href="<?php echo $treeVar.'?id='.$genealogyLeftLeftListObject[0]->user_id; ?>"><div><span><?php echo $genealogyLeftLeftListObject[0]->user->name; ?></span></div></a></li>
                                <?php }else{ ?>
                                     <li><a class="<?php echo $empty ; ?>" href="<?php echo $regVar.$genealogyLeftListObject[0]->user->name ; ?>&position=left"><div><span>+</span></div></a></li>    
                                <?php } ?>     

                                <?php $genealogyLeftRighttListObject = BaseClass::getGenoalogyTreeChild($genealogyLeftListObject[0]->user_id, "'right'"); ?>   
                                <?php if(count($genealogyLeftRighttListObject) > 0 ){ 
                                     $getColor =  BaseClass::getPackageName($genealogyLeftRighttListObject[0]->user_id); 
                                    ?>
                                    <li><a class="<?php echo $getColor ; ?>" href="<?php echo $treeVar.'?id='.$genealogyLeftRighttListObject[0]->user_id; ?>"><div><span><?php echo $genealogyLeftRighttListObject[0]->user->name; ?></span></div></a></li>
                                <?php }else{ ?>
                                    <li><a class="<?php echo $empty   ; ?>" href="<?php echo $regVar.$genealogyLeftListObject[0]->user->name ; ?>&position=right"><div><span>+</span></div></a></li>   
                                <?php } ?> 
                            </ul>
                            <?php } else { ?>
                                <a class="<?php echo $empty ; ?>" href="<?php echo $regVar.$userObject->name; ?>&position=left"><div><span>+</span></div></a>
                                    <ul>
                                        <li><a class="sm-blank" href="#"><div><span></span></div></a></li>  
                                        <li><a class="sm-blank" href="#"><div><span></span></div></a></li>
                                    </ul>
                                </li>
                                
                            <?php } ?>
                        </li>
                        <li> 
                            <?php if(count($genealogyRightListObject) > 0 ){                                    
                                 $getColor =  BaseClass::getPackageName($genealogyRightListObject[0]->user_id);                                    
                                ?>
                            <a class="<?php echo $getColor ; ?>" href="<?php echo $treeVar.'?id='.$genealogyRightListObject[0]->user_id; ?>"><div><span><?php echo $genealogyRightListObject[0]->user->name; ?> </span></div></a>
                            <ul>
                                <?php $genealogyRightLeftListObject = BaseClass::getGenoalogyTreeChild($genealogyRightListObject[0]->user_id, "'left'"); ?>
                                <?php if(count($genealogyRightLeftListObject) > 0 ){ 
                                    $getColor =  BaseClass::getPackageName($genealogyRightLeftListObject[0]->user_id); 
                                    ?>
                                    <li><a class="<?php echo $getColor ; ?>" href="<?php echo $treeVar.'?id='.$genealogyRightLeftListObject[0]->user_id; ?>"><div><span><?php echo $genealogyRightLeftListObject[0]->user->name; ?> </span></div></a></li>
                                <?php }else{ ?>
                                     <li><a class="<?php echo $empty ; ?>" href="<?php echo $regVar.$genealogyRightListObject[0]->user->name ; ?>&position=left"><div><span>+</span></div></a></li>  
                                <?php } ?>     

                                <?php $genealogyRightRighttListObject = BaseClass::getGenoalogyTreeChild($genealogyRightListObject[0]->user_id, "'right'"); ?>   
                                <?php if(count($genealogyRightRighttListObject) > 0 ){
                                    $getColor =  BaseClass::getPackageName($genealogyRightRighttListObject[0]->user_id); 
                                    ?>
                                    <li><a class="<?php echo $getColor ; ?>" href="<?php echo $treeVar.'?id='.$genealogyRightRighttListObject[0]->user_id; ?>"><div><span><?php echo $genealogyRightRighttListObject[0]->user->name; ?></span></div></a></li>
                                <?php }else{ ?>
                                     <li><a class="<?php echo $empty ; ?>" href="<?php echo $regVar.$genealogyRightListObject[0]->user->name ; ?>&position=right"><div><span>+</span></div></a></li>
                                <?php } ?> 
                            </ul>
                            <?php } else { ?>
                                <a class="<?php echo $empty ; ?>" href="<?php echo $regVar.$userObject->name; ?>&position=right"><div><span>+</span></div></a>
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
</div>
        
<!--           <div class="col-sm-4 col-xs-12">
                 <ul class="packageDetail">
                     <li><p>Total Packages</p><span> 122</span> </li>
                     <li><p>Total Packages Today</p><span> 122</span> </li>
                      <li><p>Total Registration</p><span> 122</span> </li>
                     
                 </ul>
             </div>
    -->

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