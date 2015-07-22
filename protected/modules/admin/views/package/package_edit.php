<?php
$this->breadcrumbs = array(
    'Package' => array('package/list'),
    'Package Edit',
);
 
?>
<div class="col-md-7 col-sm-7">
    <?php if($error){?><p class="error-2" id="error_msg"><i class="fa fa-times-circle icon-error"></i><span class="span-error-2"><?php echo $error;?></span></p><?php }?>
    
    <?php if($success){?><p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo $success;?></span></p><?php }?>
   
    <form action="/admin/package/edit?id=<?php echo $packageObject->id;?>" method="post" class="form-horizontal" onsubmit="return validation();" enctype="multipart/form-data">
     
        <fieldset>
            <legend>Edit Package </legend>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Package Name<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="name" class="form-control" name="Package[name]" value="<?php echo (!empty($packageObject))?$packageObject->name : "";?>">
                    <span id="name_error"></span>
                </div>
            </div>
            
           <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Price<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="amount" class="form-control" name="Package[amount]" value="<?php echo (!empty($packageObject))?$packageObject->amount : "";?>">
                    <span id="amount_error"></span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Description<span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea id="editor1" class="form-control" name="Package[description]"><?php echo (!empty($packageObject))?$packageObject->Description : "";?></textarea>
                    <span id="description_error"></span>
                </div>
            </div>
            
            
            <div class="form-group">
                    <label for="country" class="col-lg-4 control-label">No of Pages </label>
                    <div class="col-lg-8">
                      <input type="text" id="no_of_pages" class="form-control" name="Package[no_of_pages]" value="<?php echo (!empty($packageObject))?$packageObject->no_of_pages : "";?>">
                      
                    </div>
                     
                </div>
            
           
            <div class="form-group">
                    <label for="country" class="col-lg-4 control-label">No of images </label>
                    <div class="col-lg-8">
                     <input type="text" id="no_of_images" class="form-control" name="Package[no_of_images]" value="<?php echo (!empty($packageObject))?$packageObject->no_of_images : "";?>">
                      
                    </div>
                     
                </div>
            
            
            <div class="form-group">
                    <label for="country" class="col-lg-4 control-label">No of forms </label>
                    <div class="col-lg-8">
                     <input type="text" id="no_of_forms" class="form-control" name="Package[no_of_forms]" value="<?php echo (!empty($packageObject))?$packageObject->no_of_forms : "";?>">
                        
                    </div>
                     
                </div>
            
             <div class="form-group">
                <label for="country" class="col-lg-4 control-label">Package Type</label>
                <div class="col-lg-8">
                    <select name="Package[type]" id="type">
                        <option value="">Select Type</option>
                        <option value="1" <?php if(!empty($packageObject->type) && $packageObject->type==1){?> selected="selected" <?php } ?>>Basic</option>  
                        <option value="2" <?php if(!empty($packageObject->type) && $packageObject->type==2){?> selected="selected" <?php } ?>>Advance</option>
                        <option value="3" <?php if(!empty($packageObject->type) && $packageObject->type==3){?> selected="selected" <?php } ?>>Advance PRO</option>
                    </select>
                    <span style="color:red;" id="type_error"></span>
                </div>

            </div>
         <div class="form-group">
                <label for="country" class="col-lg-4 control-label">Package Image</label>
                <div class="col-lg-8">
                    <input type="file" id="image" class="form-control" name="image">
                    <?php if(!empty($packageObject->image)){?> 
                    <img src="/upload/package_image/<?php echo $packageObject->image;?>">
                    <?php }?>
                    <span style="color:red;" id="image_error"></span>
                </div>

            </div>
             <div class="form-group">
                <label for="country" class="col-lg-4 control-label">Reward Points</label>
                <div class="col-lg-8">
                    <input type="text" id="reward_points" class="form-control" name="Package[reward_points]" value="<?php echo (!empty($packageObject))?$packageObject->reward_points : "";?>">
                    <span style="color:red;" id="image_error"></span>
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





<script type="text/javascript">
    function validation()
    {
     var regex = /^\d*(.\d{2})?$/;
     var amount = document.getElementById('amount');
    $("#name_error").html("");
     if ($("#name").val() == "") {
      $("#name_error").html("Enter Package Name");
      $("#name").focus();            
      return false;
    }
    $("#amount_error").html("");
    if ($("#amount").val() == "") {
      $("#amount_error").html("Enter Package Price");
      $("#amount").focus();            
      return false;
    }
    if (!regex.test(amount.value)){
     
      $("#amount_error").html("Enter Valid Package Price");
      $("#amount").focus();            
      return false;
    }
    
    $("#description_error").html("");
     if ($("#editor1").val() == "") {
      $("#description_error").html("Enter Package Description");
      $("#editor1").focus();            
      return false;
    }
    $("#type_error").html("");
        if ($("#type").val() == "") {
            $("#type_error").html("Enter select package type");
            $("#type").focus();
            return false;
        }
        
    }
    </script>
     <script type="text/javascript">
    CKEDITOR.replace( 'editor1' , {
    filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );
</script>
     
     
     
