<?php
/* @var $this GenealogyController */
/* @var $model Genealogy */

$regVar  = '/user/registration/?spid=' ;
$treeVar = '/genealogy/';

$this->breadcrumbs=array(
	'Genealogies'=>array('index'),
        "Tree"
); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
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
                                         <li><a href="<?php echo $regVar.$genealogyLeftListObject[0]->user->name ; ?>&position=left">+</a></li>   
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
                                         <li><a href="<?php echo $regVar.$genealogyRightListObject[0]->user->name ; ?>&position=right">+</a></li>   
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
        </div>
    </div>
</div>
<link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true) ;?>/css/main.css">
<link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/hint.css">