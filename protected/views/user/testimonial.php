<?php
$this->breadcrumbs = array(
    'Account' => array('profile/updateprofile'),
    'Testimonial',
);

?>

<div class="col-md-7 col-sm-7">
   
    <?php if($error){?><p class="error-2" id="error_msg"><i class="fa fa-times-circle icon-error"></i><span class="span-error-2"><?php echo $error;?></span></p><?php }?>

    <?php if($success){?><p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo $success;?></span></p><?php }?>
   <div class="portlet box orange   ">
    <div class="portlet-title">
							<div class="caption">
								Testimonial
							</div>
    </div>
        <div class="portlet-body form">
<form action="/profile/testimonial" method="post" class="form-horizontal" onsubmit="return validation();">
     
        <fieldset>
             <div class="form-body">
            <div class="form-group">
                <label class="col-lg-4 control-label" for="firstname">Testimonial <span class="require">*</span></label>
                <div class="col-lg-7">
                    <textarea id="testimonial" name="UserProfile[testimonials]" class="form-control" ><?php echo (!empty($profileObject))?$profileObject->testimonials : "";?></textarea>
                    <div id="testimonial_error" class="form_error"></div>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Master Pin<span class="require">*</span></label>
                <div class="col-lg-7">
                    <input type="password" id="master_pin" class="form-control" name="UserProfile[master_pin]">
                    <div id="master_pin_error" class="form_error"></div>
                </div>
            </div>
             </div>
        </fieldset>
 <div class="form-actions right">                     
                 <input type="submit" name="submit" value="Update" class="btn orange">
                 
            </div>
       
    
    </form>
</div>
   </div>
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