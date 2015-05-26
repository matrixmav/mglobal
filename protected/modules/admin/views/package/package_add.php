<?php
$this->breadcrumbs = array(
    'Package' => array('package/packageadd'),
    'Package Add',
);
?>
<div class="col-md-7 col-sm-7">
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
   
    <form action="/admin/package/packageadd" method="post" class="form-horizontal" onsubmit="return validation();">
     
        <fieldset>
            <legend>Add Package</legend>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Package Name<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="name" class="form-control" name="Package[name]" >
                    <span id="name_error"></span>
                </div>
            </div>
            
           <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Price<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="amount" class="form-control" name="Package[amount]">
                    <span id="amount_error"></span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Description<span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea id="description" class="form-control" name="Package[description]"></textarea>
                    <span id="description_error"></span>
                </div>
            </div>
            
            
          <div class="form-group">
                    <label for="country" class="col-lg-4 control-label">No of Pages </label>
                    <div class="col-lg-8">
                      <input type="text" id="no_of_pages" class="form-control" name="Package[no_of_pages]" >
                      
                    </div>
                     
                </div>
            
           
            <div class="form-group">
                    <label for="country" class="col-lg-4 control-label">No of images </label>
                    <div class="col-lg-8">
                     <input type="text" id="no_of_images" class="form-control" name="Package[no_of_images]">
                      
                    </div>
                     
                </div>
            
            
            <div class="form-group">
                    <label for="country" class="col-lg-4 control-label">No of forms </label>
                    <div class="col-lg-8">
                     <input type="text" id="no_of_forms" class="form-control" name="Package[no_of_forms]">
                        
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
     if ($("#description").val() == "") {
      $("#description_error").html("Enter Package Description");
      $("#description").focus();            
      return false;
    }
        
    }
    </script>
     
     
