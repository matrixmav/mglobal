<?php
$this->breadcrumbs = array(
    'Account' => array('profile/updateprofile'),
    'Change Master Pin',
);

?>

<div class="col-md-7 col-sm-7">
    <div class="error" id="error_msg" style="display: none;"></div>
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
<?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
    <form action="/profile/changepin" method="post" class="form-horizontal" onsubmit="return validation();">
     
        <fieldset>
            <legend>Change Master Pin</legend>
              <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Old Master Pin<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="old_master_pin" class="form-control" name="UserProfile[old_master_pin]">
                    <div id="old_error_msg"></div>
                </div>
            </div>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">New Master Pin<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="new_master_pin" class="form-control" name="UserProfile[new_master_pin]">
                    <div id="new_error_msg"></div>
                </div>
            </div>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Confirm Master Pin<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="confirm_master_pin" class="form-control" name="UserProfile[confirm_master_pin]">
                    <div id="confirm_error_msg"></div>
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
<script>
     function validation()
    {
        $("#old_error_msg").html("");
        if($("#old_master_pin").val()=='')
        {
            $("#old_error_msg").html("Please enter your old master pin.");
            $("#old_master_pin").focus();
            return false;
        }
         $("#new_error_msg").html("");
         if($("#new_master_pin").val()=='')
        {
            $("#new_error_msg").html("Please enter your new master pin.");
            $("#new_master_pin").focus();
            return false;
        }
        $("#confirm_error_msg").html("");
        if($("#confirm_master_pin").val()=='')
        {
            $("#confirm_error_msg").html("Please enter your confirm master pin.");
            $("#confirm_master_pin").focus();
            return false;
        }
       
    }
</script>


