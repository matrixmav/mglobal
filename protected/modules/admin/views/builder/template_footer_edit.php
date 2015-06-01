<?php
$this->breadcrumbs = array(
    'Template' => array('BuildTemp/templatelist'),
    'Template Footer Edit',
);
?>
<div class="col-md-7 col-sm-7">
    <a class="btn btn-primary" href="/admin/BuildTemp/templateheaderedit?id=<?php echo $footerObject->id;?>">Header Code Edit</a>&nbsp;&nbsp;<a class="btn btn-info" href="/admin/BuildTemp/templatebodyedit?id=<?php echo $footerObject->id;?>">Body Code Edit</a>&nbsp;&nbsp;<a class="btn btn-success" href="/admin/BuildTemp/templatefooteredit?id=<?php echo $footerObject->id;?>">Footer Code Edit</a>
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
   
    <form action="/admin/BuildTemp/templatefooteredit?f_id=<?php echo $footerObject->temp_footer_id;?>&id=<?php echo $_GET['id'];?>" method="post" class="form-horizontal" onsubmit="return validation();">
     
        <fieldset>
            <legend>Edit Template Footer</legend>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Footer Code<span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea id="footer_code" class="form-control" name="Template[footer_code]" cols="20" rows="10"><?php echo (!empty($footerObject->footer->footer_content)) ? $footerObject->footer->footer_content : ""; ?></textarea>
                    <span id="header_code_error"></span>
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
      $("#header_code_error").html("");
      if ($("#footer_code").val() == "") {
      $("#header_code_error").html("Enter Footer Code");
      $("#footer_code").focus();            
      return false;
    }
    }
    </script>
     
     
