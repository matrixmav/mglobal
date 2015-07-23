<?php
$this->breadcrumbs = array(
    'Category' => array('BuildTemp/categorylist'),
    'Category Add',
);
?>
<div class="col-md-7 col-sm-7">
    <?php if($error){?><p class="error-2" id="error_msg"><i class="fa fa-times-circle icon-error"></i><span class="span-error-2"><?php echo $error;?></span></span><?php }?>
    
    <?php if($success){?><p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo $success;?></span></p><?php }?>
   <div class="portlet box orange   ">
    <div class="portlet-title">
							<div class="caption">
								Add Builder Category
							</div>
    </div>
        <div class="portlet-body form">
    <form action="/admin/BuildTemp/categoryadd" method="post" class="form-horizontal" onsubmit="return validation();">
     
        <fieldset>
            <div class="form-body">
            
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Category Name<span class="require">*</span></label>
                <div class="col-lg-7">
                    <input type="text" id="name" class="form-control" name="Category[name]" >
                    <span id="name_error"></span>
                </div>
            </div>
            </div>
          </fieldset>
 <div class="form-actions right">                     
                  <input type="submit" name="submit" value="Submit" class="btn orange">
                 
            </div>
    
    </form>
</div>
   </div>
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
     
     
