<?php
$this->breadcrumbs = array(
    'Invite Refferals'
);
?>

<div class="row">
    <div class="col-md-12">
            <?php echo CHtml::link(Yii::t('translation', 'SMS'), '/mail', array("class" => "btn  green margin-right-20  red")); ?>
            <?php echo CHtml::link(Yii::t('translation', 'Email') . ' <i class="fa fa-plus"></i>', '/mail/compose', array("class" => "btn  green margin-right-20")); ?>
            <?php echo CHtml::link(Yii::t('translation', 'Facebook'), '/mail/sent', array("class" => "btn  green margin-right-20")); ?>
            <?php echo CHtml::link(Yii::t('translation', 'Google+'), '/mail/sent', array("class" => "btn  green margin-right-20")); ?>
    </div>
</div> 
<div class="col-md-7 col-sm-7">
    <div class="error" id="error_msg" style="display: none;"></div>
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
    <form action="/profile/updateprofile" method="post" class="form-horizontal" onsubmit="return validation();">
     
        <fieldset>
            <legend>Update Profile</legend>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Sponsor ID</label>
                <div class="col-lg-8">
                    <input type="text" id="name" class="form-control" name="UserProfile[sponsor_id]" value="<?php echo (!empty($userObject))? $userObject->sponsor_id:"";?>" readonly="readonly">
                </div>
            </div>
              </form>
</div>