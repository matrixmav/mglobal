<?php
$this->breadcrumbs = array(
     
    'Change Password',
);
?>
<div class="col-md-6 col-sm-6">
    <?php if($error){?><p class="error-2" id="error_msg"><i class="fa fa-times-circle icon-error"></i><span class="span-error-2"><?php echo $error;?></span><p><?php }?>
    <?php if($success){?><p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo $success;?></span></p><?php }?>
     <div class="portlet box orange   ">
         <div class="portlet-title">
							<div class="caption">
								Change Password
							</div>
    </div>
                <form class="form-horizontal form-without-legend" method="post" name="LoginForm" id=LoginForm" role="form" onsubmit="return validation()">
                <div class="form-body">
                    <fieldset>
            <div class="form-body">
                <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Old Password<span class="require">*</span></label>
                <div class="col-lg-7">
                    <input type="password" id="old_password" class="form-control" name="UserProfile[old_password]">
                    <div id="oldpassword_error_msg" class="form_error"></div>
                </div>
            </div>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">New Password<span class="require">*</span></label>
                <div class="col-lg-7">
                    <input type="password" id="new_password" class="form-control" name="UserProfile[new_password]">
                    <div id="newpassword_error_msg" class="form_error"></div>
                </div>
            </div>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Confirm Password<span class="require">*</span></label>
                <div class="col-lg-7">
                    <input type="password" id="confirm_password" class="form-control" name="UserProfile[confirm_password]">
                    <div id="confirmpassword_error_msg" class="form_error"></div>
                </div>
            </div>
                </div>
                </div>
                    </fieldset>
                <div class="form-actions right">                     
                   <input type="submit" name="submit" value="Update" class="btn orange ">
                 
            </div>
                
              </form>
            </div>
</div>
<script>
 function validation()
    {
        $("#oldpassword_error_msg").html("");
        if($("#old_password").val()=='')
        {
            $("#oldpassword_error_msg").html("Please enter your old password.");
            $("#old_password").focus();
            return false;
        }
         $("#newpassword_error_msg").html("");
         if($("#new_password").val()=='')
        {
            $("#newpassword_error_msg").html("Please enter your new password.");
            $("#new_password").focus();
            return false;
        }
        $("#confirmpassword_error_msg").html("");
        if($("#confirm_password").val()=='')
        {
            $("#confirmpassword_error_msg").html("Please enter your confirm password.");
            $("#confirm_password").focus();
            return false;
        }
        $("#confirmpassword_error_msg").html("");
        if($("#confirm_password").val() != $("#new_password").val())
        {
            $("#confirmpassword_error_msg").html("New password and confirm password must be same.");
            $("#confirm_password").focus();
            return false;
        }
        
    }
</script>