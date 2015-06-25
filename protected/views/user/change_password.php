<?php
$this->breadcrumbs = array(
    'Account' => array('profile/changepassword'),
    'Security Settings',
);

?>

<div class="col-md-6 col-sm-6">
    <div class="error" id="error_msg" style="display: none;"></div>
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
<?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
    <form action="/profile/changepassword" method="post" class="form-horizontal" onsubmit="return validation();">
     
        <fieldset>
            <legend>Change Password</legend>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Old Password<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="old_password" class="form-control" name="UserProfile[old_password]">
                    <div id="old_error_msg" class="form_error"></div>
                </div>
            </div>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">New Password<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="new_password" class="form-control" name="UserProfile[new_password]">
                    <div id="new_error_msg" class="form_error"></div>
                </div>
            </div>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Confirm Password<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="confirm_password" class="form-control" name="UserProfile[confirm_password]">
                    <div id="confirm_error_msg" class="form_error"></div>
                </div>
            </div>
             
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Master Pin<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="master_pin" class="form-control" name="UserProfile[master_pin]">
                    <div id="master_error_msg" class="form_error"></div>
                </div>
            </div>
        </fieldset>

    <div class="row">
            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                      
                <input type="submit" name="submit" value="Change" class="btn red">
                 
            </div>
        </div>
    </form>
</div>
<div class="col-md-6 col-sm-6">
    <div class="error" id="error_msg" style="display: none;"></div>
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
<?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
    <form action="/profile/changepin" method="post" class="form-horizontal" onsubmit="return validationPin();">
     
        <fieldset>
            <legend>Change Master Pin</legend>
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

    <div class="row">
            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                      
                <input type="submit" name="submit" value="Change" class="btn red">
                 
            </div>
        </div>
    </form>
</div>






