<?php
$this->breadcrumbs = array(
     
    'Change Password',
);
?>
<div class="col-md-7 col-sm-7">
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
                <form class="form-horizontal form-without-legend" method="post" name="LoginForm" id=LoginForm" role="form" onsubmit="return validation()">
                
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
                <div class="row">
                  <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                    <button type="submit" class="btn btn-primary red">Change Password</button>
                  </div>
                </div>
                
              </form>
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