<?php
$this->breadcrumbs = array(
    'Ads' => array('add'),
    'Add',
);

?>
<div class="col-md-7 col-sm-7">
    <div class="error" id="error_msg" style="display: none;"></div>    
    <form action="" method="post" class="form-horizontal" onsubmit="return validation();" enctype = "multipart/form-data">
     
        <?php if(!empty($success)){ echo $success ; }  ?>
        <fieldset>
            <legend>Add Ads</legend>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Name</label>
                <div class="col-lg-6">
                    <input type="text" id="ads_name" class="form-control" name="ads_name" >                
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Description</label>
                <div class="col-lg-6">
                    <input type="text" id="ads_desc" class="form-control" name="ads_desc" >                
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="firstname">Upload Banner </label>
                <div class="col-lg-8 fileupload fileupload-new">
                     <div data-provides="fileupload" class="fileupload fileupload-new">
                         <span class="btn btn-primary btn-file btn-1"><span class="fileupload-new"><input type="file" id="ads_banner" class="form-control11" name="ads_banner"></span></div>
                    <span class="example1">(Upload jpg ,png , pdf files only)</span> 
                   
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
