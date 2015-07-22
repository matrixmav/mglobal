<?php
$this->breadcrumbs = array(
    'Account' => array('profile/changepassword'),
    'Security Settings',
);

?>

<div class="col-md-6 col-sm-6">
    <div class="error" id="error_msg" style="display: none;"></div>
    
    
    <?php if(!empty($error)){?><p class="error-2" id="error_msg"><i class="fa fa-times-circle icon-error"></i><span class="span-error-2"><?php echo $error;?></span></p><?php }?>
    
    
        <?php if(!empty($success)){?><p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo $success;?></span></p><?php }?>

<div class="portlet box orange ">
    <div class="portlet-title">
							<div class="caption">
								Change Password
							</div>
    </div>
    <div class="portlet-body form">
    <form action="/profile/changepassword" method="post" class="form-horizontal" onsubmit="return validation();">
     
        <fieldset>
           <div class="form-body">
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Old Password<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="old_password" class="form-control" name="UserProfile[old_password]">
                    <div id="oldpassword_error_msg" class="form_error"></div>
                </div>
            </div>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">New Password<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="new_password" class="form-control" name="UserProfile[new_password]">
                    <div id="newpassword_error_msg" class="form_error"></div>
                </div>
            </div>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Confirm Password<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="confirm_password" class="form-control" name="UserProfile[confirm_password]">
                    <div id="confirmpassword_error_msg" class="form_error"></div>
                </div>
            </div>
             
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Master Pin<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="master_pin" class="form-control" name="UserProfile[master_pin]">
                    <div id="masterpassword_error_msg" class="form_error"></div>
                </div>
            </div>
        </fieldset>

 
           <div class="form-actions right">                     
                <input type="submit" name="submit" value="Change" class="btn orange">
                 
            </div>
       
    </form>
    </div>
</div>
</div>
<div class="col-md-6 col-sm-6">
    <div class="error" id="error_msg" style="display: none;"></div>
    <?php if(!empty($_GET['errorMsg'])){?><div class="error" id="error_msg"><?php echo $_GET['errorMsg'];?></div><?php }?>
    <?php if(!empty($_GET['successMsg'])) {?><div class="success" id="error_msg"><?php echo $_GET['successMsg'];?></div><?php }?>
    <div class="portlet box orange   ">
    <div class="portlet-title">
							<div class="caption">
								Change Master Pin
							</div>
    </div>
        <div class="portlet-body form">
    <form action="/profile/changepin" method="post" class="form-horizontal" onsubmit="return validationPin();">
     
        <fieldset>
            <div class="form-body">
              <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Old Master Pin<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="old_master_pin" class="form-control" name="UserProfile[old_master_pin]">
                    <div id="old_error_msg" class="form_error"></div>
                </div>
            </div>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">New Master Pin<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="new_master_pin" class="form-control" name="UserProfile[new_master_pin]">
                    <div id="new_error_msg" class="form_error"></div>
                </div>
            </div>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Confirm Master Pin<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="confirm_master_pin" class="form-control" name="UserProfile[confirm_master_pin]">
                    <div id="confirm_error_msg" class="form_error"></div>
                </div>
            </div>
             
           
        </fieldset>

             <div class="form-actions right">                     
                <input type="submit" name="submit" value="Change" class="btn orange">
                 
            </div>
            </div>
    
    </form>
</div>
</div>






