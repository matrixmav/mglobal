<?php
$this->breadcrumbs = array(
    'Template' => array('BuildTemp/templates'),
    'Logo Add',
);
?>
<div class="col-md-7 col-sm-7" id="test">
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
      <form action="/BuildTemp/addlogo" method="post" class="form-horizontal" onsubmit="return validation();" enctype="multipart/form-data">
     
        <fieldset>
            <legend>Edit Pages</legend>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Logo<span class="require">*</span></label>
                <div class="col-lg-8 fileupload fileupload-new">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                    <span class="btn btn-primary btn-file btn-1"><span class="fileupload-new">
                    <input id="logo" type="file" class="" name="logo">
                    </span></span>
                    <span id="logo_error"></span>
                    </div>
                    <span class="example1">(Upload jpg ,png , pdf files only)<br/>
                        <?php if(!empty($userhasObject)){?>
                    <img src="/user/template/logos/<?php echo $userhasObject->logo; ?>">
                    <?php }?></span>  
                    
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
      $("#logo_error").html("");
      if ($("#logo").val() == "") {
      $("#logo_error").html("Please choose logo image.");
      $("#logo").focus();            
      return false;
    }
    
    
   }
    
    </script>
   
     
