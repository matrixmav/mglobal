<?php
/* @var $this GenealogyController */
/* @var $model Genealogy */

$regVar  = '/user/registration/?spid=' ;
$treeVar = '/genealogy/';

$this->breadcrumbs=array(
	'Genealogies'=>array('index'),
        "Tree"
); ?>
<div class="row">
	
                        <div class="col-md-12">
							 <span><?php if(!empty($_GET) && $_GET['id']!=''){?><a onclick="window.history.back(-1);" style="float:right;font-size:16px;color:#f15c2b;cursor:pointer;text-decoration:none;">Go Back >></a><?php } ?></span>
						</div>
</div>

    <div class="row">
        <!-- <div class="col-lg-12">
            <div class="tree">
                <ul>
                    <li>
                        <?php $userObject = User::model()->findByAttributes(array('id' => $currentUserId  )); ?>
                        <a href="#" data-hint="This is a success hint that fades in" class="hint-top-s-small-t-notice"><?php echo $userObject->name; ?></a>
                        <ul>
                            <li>
                                <?php if(count($genealogyLeftListObject) > 0 ){ ?>
                                <a href="<?php echo $treeVar.'?id='.$genealogyLeftListObject[0]->user_id; ?>"><?php echo $genealogyLeftListObject[0]->user->name; ?></a>
                                <ul>
                                    <?php $genealogyLeftLeftListObject = BaseClass::getGenoalogyTreeChild($genealogyLeftListObject[0]->user_id, "'left'"); ?>
                                    <?php if(count($genealogyLeftLeftListObject) > 0 ){ ?>
                                        <li><a href="<?php echo $treeVar.'?id='.$genealogyLeftLeftListObject[0]->user_id; ?>"><?php echo $genealogyLeftLeftListObject[0]->user->name; ?></a></li>
                                    <?php }else{ ?>
                                         <li><a href="<?php echo $regVar.$genealogyLeftListObject[0]->user->name ; ?>&position=left">+</a></li>    
                                    <?php } ?>     
                                     
                                    <?php $genealogyLeftRighttListObject = BaseClass::getGenoalogyTreeChild($genealogyLeftListObject[0]->user_id, "'right'"); ?>   
                                    <?php if(count($genealogyLeftRighttListObject) > 0 ){ ?>
                                        <li><a href="<?php echo $treeVar.'?id='.$genealogyLeftRighttListObject[0]->user_id; ?>"><?php echo $genealogyLeftRighttListObject[0]->user->name; ?></a></li>
                                    <?php }else{ ?>
                                         <li><a href="<?php echo $regVar.$genealogyLeftListObject[0]->user->name ; ?>&position=right">+</a></li>   
                                    <?php } ?> 
                                </ul>
                                <?php } else { ?>
                                    <a href="<?php echo $regVar.$userObject->name; ?>&position=left">+</a>
                                <?php } ?>
                            </li>
                            <li> 
                                <?php if(count($genealogyRightListObject) > 0 ){ ?>
                                <a href="<?php echo $treeVar.'?id='.$genealogyRightListObject[0]->user_id; ?>"><?php echo $genealogyRightListObject[0]->user->name; ?> </a>
                                <ul>
                                    <?php $genealogyRightLeftListObject = BaseClass::getGenoalogyTreeChild($genealogyRightListObject[0]->user_id, "'left'"); ?>
                                    <?php if(count($genealogyRightLeftListObject) > 0 ){ ?>
                                        <li><a href="<?php echo $treeVar.'?id='.$genealogyRightLeftListObject[0]->user_id; ?>"><?php echo $genealogyRightLeftListObject[0]->user->name; ?></a></li>
                                    <?php }else{ ?>
                                         <li><a href="<?php echo $regVar.$genealogyRightListObject[0]->user->name ; ?>&position=left">+</a></li>   
                                    <?php } ?>     
                                     
                                    <?php $genealogyRightRighttListObject = BaseClass::getGenoalogyTreeChild($genealogyRightListObject[0]->user_id, "'right'"); ?>   
                                    <?php if(count($genealogyRightRighttListObject) > 0 ){ ?>
                                        <li><a href="<?php echo $treeVar.'?id='.$genealogyRightRighttListObject[0]->user_id; ?>"><?php echo $genealogyRightRighttListObject[0]->user->name; ?></a></li>
                                    <?php }else{ ?>
                                         <li><a href="<?php echo $regVar.$genealogyRightListObject[0]->user->name ; ?>&position=right">+</a></li>   
                                    <?php } ?> 
                                </ul>
                                <?php } else { ?>
                                    <a href="<?php echo $regVar.$userObject->name; ?>&position=right">+</a>
                                <?php } ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>			
        </div> -->
        <div class="col-sm-8 col-xs-12">
            
            <div class="mytree">
                <h3>Genealogy Binary</h3>
                <ul>
                    <li>
                        <a href="" class="sm-red"><div><span>Parent1</span></div></a>
                        <ul class="newdiv">
                            <li>
                                <a href="" class="sm-navy"><div><span>Parent1</span></div></a>
                                <ul>
                                    <li><a href="" class="sm-blue"><div><span>Parent1</span></div></a></li>
                                    <li><a href="" class="sm-greenLight"><div><span>Parent1</span></div></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="sm-green"><div><span>Parent1</span></div></a>
                                <ul>
                                    <li><a href="" class="sm-purple"><div><span>Parent1</span></div></a></li>
                                    <li><a href="" class="sm-blank"><div><span>+</span></div></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
             <div class="col-sm-4 col-xs-12">
                 <ul class="packageDetail">
                     <li><p>Total Packages</p><span> 122</span> </li>
                     <li><p>Total Packages Today</p><span> 122</span> </li>
                      <li><p>Total Registration</p><span> 122</span> </li>
                     
                 </ul>
             </div>
    </div>

<div class="row">
    
    <div class="col-sm-10 col-sm-offset-1 detailPackage">
        <h4>PACKAGE DETAILED INFORMATION</h4>
        <div class="row">
            <div class="col-sm-4">
                <table>
                    <tr>
                        <th>
                    <div class="basicP">
                        <img src="/images/basic-p1.png">
                            Basic Packages 1
                    </div>
                        </th>
                    </tr>
                     <tr>
                         <th>
                    <div class="basicP">
                        <img src="/images/basic-p2.png">
                            Basic Packages 2
                    </div>
                        </th>
                    </tr>
                     <tr>
                        <th>
                    <div class="basicP">
                        <img src="/images/basic-p3.png">
                            Basic Packages 3
                    </div>
                        </th>
                    </tr>
                </table>
            </div>
             <div class="col-sm-4">
               
                   <table>
                    <tr>
                        <th>
                    <div class="basicP">
                        <img src="/images/advance-p1.png">
                            Advanced Packages 1
                    </div>
                        </th>
                    </tr>
                     <tr>
                         <th>
                    <div class="basicP">
                        <img src="/images/advance-p2.png">
                            Advanced Packages 2
                    </div>
                        </th>
                    </tr>
                     <tr>
                        <th>
                    <div class="basicP">
                        <img src="/images/advance-p3.png">
                            Advanced Packages 3
                    </div>
                        </th>
                    </tr>
                </table>
                   
                </div>
            <div class="col-sm-4">
                
                   <table>
                    <tr>
                        <th>
                    <div class="basicP">
                        <img src="/images/advance-pro1.png">
                            Advanced Pro 1
                    </div>
                        </th>
                    </tr>
                     <tr>
                         <th>
                    <div class="basicP">
                        <img src="/images/advance-pro2.png">
                            Advanced Pro 2
                    </div>
                        </th>
                    </tr>
                     <tr>
                        <th>
                    <div class="basicP">
                        <img src="/images/advance-pro3.png">
                            Advanced Pro 3
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
<link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true) ;?>/css/main.css">
<link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/hint.css">