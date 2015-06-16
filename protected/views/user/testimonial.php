<?php
$this->breadcrumbs = array(
    'Account' => array('profile/updateprofile'),
    'Testimonial',
);

?>

<div class="col-md-7 col-sm-7">
   
<?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
<?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
    <form action="/profile/testimonial" method="post" class="form-horizontal" onsubmit="return validation();">
     
        <fieldset>
            <legend>Testimonial</legend>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="firstname">Testimonial <span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea id="testimonial" name="UserProfile[testimonials]" class="form-control" ><?php echo (!empty($profileObject))?$profileObject->testimonials : "";?></textarea>
                    <div id="testimonial_error" class="form_error"></div>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Master Pin<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="master_pin" class="form-control" name="UserProfile[master_pin]">
                    <div id="master_pin_error" class="form_error"></div>
                </div>
            </div>
        </fieldset>

    <div class="row">
            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                      
                <input type="submit" name="submit" value="Update" class="btn red">
                 
            </div>
        </div>
    </form>
</div>
<script>
    function validation(){        
        var testimonial = requiredField('testimonial', 'testimonial_error', 'Please enter your testimonial text.');        
        if (testimonial == false) {            
            return false;
        }
                
        var masterPin = requiredField('master_pin', 'master_pin_error', 'Enter master pin');       
        if (masterPin == false) {            
            return false;
        } 
    }
</script>