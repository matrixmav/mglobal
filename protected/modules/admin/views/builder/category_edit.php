<?php
$this->breadcrumbs = array(
    'Category' => array('BuildTemp/categorylist'),
    'Category Add',
);

?>
<div class="col-md-7 col-sm-7">
    <?php if($error){?><p class="error-2" id="error_msg"><i class="fa fa-times-circle icon-error"></i><span class="span-error-2"><?php echo $error;?></span></p><?php }?>
    <?php if($success){?><p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo $success;?></span></p><?php }?>
   
    <form action="/admin/BuildTemp/categoryedit?id=<?php echo $categoryObject->id;?>" method="post" class="form-horizontal" onsubmit="return validation();">
     
        <fieldset>
            <legend>Add Builder Category</legend>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Category Name<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="name" class="form-control" name="Category[name]" value="<?php echo (!empty($categoryObject->name)) ? $categoryObject->name : "";?>">
                    <span id="name_error"></span>
                </div>
            </div>
          </fieldset>

    <div class="row">
            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                <input type="submit" name="submit" value="Submit" class="btn red">
                 
            </div>
        </div>
    </form>
</div>





<script type="text/javascript">
    function validation()
    {
      $("#name_error").html("");
      if ($("#name").val() == "") {
      $("#name_error").html("Enter Category Name");
      $("#name").focus();            
      return false;
    }
        
    }
    </script>
     
     
