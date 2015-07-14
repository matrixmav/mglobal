 <?php
$this->breadcrumbs = array(
    'Account' => array('profile/updateprofile'),
    'Verification',
);

?>
<div class="col-md-7 col-sm-7">
    <div class="error" id="error_msg" style="display: none;"></div>
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
   <div class="portlet box orange   ">
    <div class="portlet-title">
							<div class="caption">
								Verification
							</div>
    </div>
        <div class="portlet-body form">
    <form action="/profile/documentverification" method="post" class="form-horizontal" <?php if(empty($userObject->address_proff)){?>onsubmit="return validation();" <?php }?> enctype = "multipart/form-data">
     
        <fieldset>
            <div class="form-body">
            <div class="form-group">
                <label class="col-lg-4 control-label" for="firstname">Upload / Update ID Proof <span class="require">*</span></label>
                <div class="col-lg-6 col-xs-8 fileupload fileupload-new">
                     <div data-provides="fileupload" class="fileupload fileupload-new">
                       <span class="fileupload-new"><input type="file" id="id_proof" class="form-control11" name="id_proof"></span>
                     <div class="form_error" id="id_error"></div>
                     </div>
                    <p class="help-block">(Upload jpg ,png files only)</p>
                </div>
                <div class="col-lg-2 col-xs-4">
                        <?php 
                        if(!empty($userObject) && $userObject->id_proof!=''){?>
                        <span class="example">
                            <a href="/upload/verification-document/<?php echo $userObject->id_proof;?>" target="_blank"><img src="/upload/verification-document/<?php echo $userObject->id_proof;?>" width="50" height="50"></a></span>
                        <?php }?>
                    <div id="id_error" class="form_error"></div>
                </div>
            </div>
         
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Upload / Update Address Proof <span class="require">*</span></label>
                <div class="col-lg-6 col-xs-8 fileupload fileupload-new">
                     <div data-provides="fileupload" class="fileupload fileupload-new">
                        <span class="fileupload-new"><input type="file" id="address_proof" class="form-control11" name="address_proof"></span><div id="address_error" class="form_error"></div></div>
                    <p class="help-block">(Upload jpg ,png files only)</p>
                </div>
                   <div class="col-lg-2 col-xs-4">
                             <?php if(!empty($userObject) && $userObject->address_proff!=''){?>
                    <span class="example"><a href="/upload/verification-document/<?php echo $userObject->address_proff;?>" target="_blank"><img src="/upload/verification-document/<?php echo $userObject->address_proff;?>" width="50" height="50"></a></span>
                    <?php }?>
                     
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Master Pin<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="master_pin" class="form-control" name="UserProfile[master_pin]">
                    <div id="master_pin_error" class="form_error"></div>
                </div>
            </div>
            </div>
        </fieldset>

        <div class="form-actions pad10 right">                     
               <input type="submit" name="submit" value="Update" class="btn orange">
                 
            </div>
    
    </form>
</div>
   </div>
</div>

<script>
      function validation()
     {
        document.getElementById("id_error").innerHTML = "";
        if(document.getElementById("id_proof").value == ''){             
            document.getElementById("id_error").innerHTML = "Please choose ID proof from your computer.";
            document.getElementById("id_proof").focus();
            return false;
        }
        
        document.getElementById("address_error").innerHTML = "";
        if(document.getElementById("address_proof").value == ''){
            document.getElementById("address_error").innerHTML = "Please choose address proof from your computer.";
            document.getElementById("address_proof").focus();
            return false;
        }
        
        if(document.getElementById("master_pin").value==''){
            document.getElementById("master_pin_error").innerHTML = "Please enter master pin.";
            document.getElementById("master_pin").focus();
            return false;
        }
    }
</script>
