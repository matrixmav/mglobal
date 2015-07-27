<?php
$this->breadcrumbs = array(
    'Template' => array('BuildTemp/templatelist'),
    'Template Body Edit',
);
?>
<div class="col-md-7 col-sm-7">
    <div class="row">
        <div class="actionBtn"><a class="btn btn-primary" href="/admin/BuildTemp/templateheaderedit?id=<?php echo $bodyObject->id;?>">Header Edit</a></div>
            &nbsp;&nbsp;
                <div class="actionBtn"><a class="btn btn-info" href="/admin/BuildTemp/templatebodyedit?id=<?php echo $bodyObject->id;?>">Body Edit</a></div>
                    &nbsp;&nbsp;
                        <div class="actionBtn"><a class="btn btn-success" href="/admin/BuildTemp/templatefooteredit?id=<?php echo $bodyObject->id;?>">Footer Edit</a></div>
                            &nbsp;&nbsp;
                            <div class="actionBtn"><a class="btn btn-warning" href="/admin/BuildTemp/customcode?id=<?php echo $bodyObject->id;?>" >Custom CSS/JS</a></div>
    </div>
    
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
    <div class="portlet box orange   ">
    <div class="portlet-title">
							<div class="caption">
								Edit Template Body
							</div>
    </div>
   <div class="portlet-body form">
    <form action="/admin/BuildTemp/templatebodyedit?b_id=<?php echo $bodyObject->temp_body_id;?>&id=<?php echo $_GET['id'];?>" method="post" class="form-horizontal" onsubmit="return validation();">
     
        <fieldset>
         
            <div class="form-body">
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Body Code<span class="require">*</span></label>
                <div class="col-lg-7">
                    <textarea id="body_code" class="form-control" name="Template[body_code]" cols="20" rows="20"><?php echo (!empty($bodyObject->body->body_content)) ? stripslashes($bodyObject->body->body_content) : ""; ?></textarea>
                    <span id="header_code_error"></span>
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
      $("#header_code_error").html("");
      if ($("#body_code").val() == "") {
      $("#header_code_error").html("Enter Body Code");
      $("#body_code").focus();            
      return false;
    }
    }
    </script>
     
     
