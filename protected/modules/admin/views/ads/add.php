<?php
$this->breadcrumbs = array(
    'Ads' => array('add'),
    'Add',
);

?>

<div class="col-md-6 col-sm-6">
    <?php if(!empty($success)){?> <p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2">
<?php echo $success ;?> </span></p><?php }  ?>
        <?php if(!empty($error)){ ?><p class="error-2" id="error_msg"><i class="fa fa-times-circle icon-error"></i><span class="span-error-2"> <?php echo $error; ?></span></p> <?php  }  ?>
    <div class="error" id="error_msg" style="display: none;"></div>    
    <div class="portlet box orange   ">
    <div class="portlet-title">
							<div class="caption">
								Add Ads
							</div>
    </div>
        
        <div class="portlet-body form">
    <form action="" method="post" class="form-horizontal" onsubmit="return validation();" enctype = "multipart/form-data">
     
        
        <fieldset>
            <div class="form-body">
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Name</label>
                <div class="col-lg-7">
                    <input type="text" id="ads_name" class="form-control" name="ads_name" >                
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Description</label>
                <div class="col-lg-7">
                    <input type="text" id="ads_desc" class="form-control" name="ads_desc" >                
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="firstname">Upload Banner </label>
                <div class="col-lg-6 col-xs-8 fileupload fileupload-new">
                     <div data-provides="fileupload" class="fileupload fileupload-new">
                        <span class="fileupload-new"><input type="file" id="ads_banner" class="form-control11" name="ads_banner"></span></div>
                      <p class="help-block">(Upload jpg ,png files only)</p>
                </div>
                <div class="col-lg-2 col-xs-4">
                             <?php if(!empty($userObject) && $userObject->address_proff!=''){?>
                    <span class="example"><a href="/upload/verification-document/<?php echo $userObject->address_proff;?>" target="_blank"><img src="/upload/verification-document/<?php echo $userObject->address_proff;?>" width="50" height="50"></a></span>
                    <?php }?>
                     <div id="address_error" class="form_error"></div>
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
</div>

<script>
     function validation(){        
        if(document.getElementById("ads_name").value==''){
            document.getElementById("error_msg").style.display="block";
            document.getElementById("error_msg").innerHTML = "Please Enter Ads Name.";
            document.getElementById("ads_name").focus();
            return false;
        }
        
        if(document.getElementById("ads_banner").value==''){
            document.getElementById("error_msg").style.display="block";
            document.getElementById("error_msg").innerHTML = "Please choose Banner Image.";
            document.getElementById("ads_banner").focus();
            return false;
        }
        
    }
</script>
