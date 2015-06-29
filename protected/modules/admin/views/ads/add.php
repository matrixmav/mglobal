<?php
$this->breadcrumbs = array(
    'Ads' => array('add'),
    'Add',
);

?>
<div class="col-md-6 col-sm-6">
    <div class="error" id="error_msg" style="display: none;"></div>    
    <div class="portlet box red   ">
    <div class="portlet-title">
							<div class="caption">
								Add Ads
							</div>
    </div>
        <div class="portlet-body form">
    <form action="" method="post" class="form-horizontal" onsubmit="return validation();" enctype = "multipart/form-data">
     
        <?php if(!empty($success)){ echo $success ; }  ?>
        <?php if(!empty($error)){ echo $error; }  ?>
        <fieldset>
            <div class="form-body">
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Name</label>
                <div class="col-lg-8">
                    <input type="text" id="ads_name" class="form-control" name="ads_name" >                
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Description</label>
                <div class="col-lg-8">
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
                   <input type="submit" name="submit" value="Update" class="btn red">
                 
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
