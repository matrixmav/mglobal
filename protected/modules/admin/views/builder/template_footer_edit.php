<?php
$this->breadcrumbs = array(
    'Template' => array('BuildTemp/templatelist'),
    'Template Footer Edit',
);
?>
<div class="col-md-7 col-sm-7">
     <div class="row">
    <div class="actionBtn"><a class="btn btn-primary" href="/admin/BuildTemp/templateheaderedit?id=<?php echo $footerObject->id;?>">Header Edit</a></div>
        &nbsp;&nbsp;
       <div class="actionBtn"> <a class="btn btn-info" href="/admin/BuildTemp/templatebodyedit?id=<?php echo $footerObject->id;?>">Body Edit</a></div>
        &nbsp;&nbsp;
       <div class="actionBtn"> <a class="btn btn-success" href="/admin/BuildTemp/templatefooteredit?id=<?php echo $footerObject->id;?>">Footer Edit</a></div>
        &nbsp;&nbsp;
        <div class="actionBtn">   <a class="btn btn-warning" href="/admin/BuildTemp/customcode?id=<?php echo $footerObject->id;?>" >Custom CSS/JS</a></div>
     </div>
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
    <div class="portlet box orange   ">
   <div class="portlet-title">
							<div class="caption">
								Edit Template Footer
							</div>
    </div>
   <div class="portlet-body form">
    <form action="/admin/BuildTemp/templatefooteredit?f_id=<?php echo $footerObject->temp_footer_id;?>&id=<?php echo $_GET['id'];?>" method="post" class="form-horizontal" onsubmit="return validation();">
     
        <fieldset>
            <legend></legend>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Footer Code<span class="require">*</span></label>
                <div class="col-lg-7">
                    <textarea id="footer_code" class="form-control" name="Template[footer_code]" cols="20" rows="10"><?php echo (!empty($footerObject->footer->footer_content)) ? stripcslashes($footerObject->footer->footer_content) : ""; ?></textarea>
                    <span id="header_code_error"></span>
                </div>
            </div>
            
           
             
        </fieldset>
 <div class="form-actions right">                     
                     <input type="submit" name="submit" value="Submit" class="btn orange">
                 
            </div>
    
    </form>
</div>
    </div>





<script type="text/javascript">
    function validation()
    {
      $("#header_code_error").html("");
      if ($("#footer_code").val() == "") {
      $("#header_code_error").html("Enter Footer Code");
      $("#footer_code").focus();            
      return false;
    }
    }
    </script>
     
     
