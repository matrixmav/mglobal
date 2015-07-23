<style>
    .portlet.box.orange{ max-width:1200px;margin-top:10px;padding-bottom:20px !important;}
    .portlet.box > .portlet-title{margin-bottom: 20px;}
    .form-group{padding-right:10px;}
    
    </style>
<?php
$this->breadcrumbs = array(
    'Template' => array('BuildTemp/templatelist'),
    'Template Header Edit',
);
?>
<div class="col-md-7 col-sm-7">
    <a class="btn btn-primary" href="/admin/BuildTemp/templateheaderedit?id=<?php echo $headerObject->id;?>">Header Edit</a>&nbsp;&nbsp;<a class="btn btn-info" href="/admin/BuildTemp/templatebodyedit?id=<?php echo $headerObject->id;?>">Body Edit</a>&nbsp;&nbsp;<a class="btn btn-success" href="/admin/BuildTemp/templatefooteredit?id=<?php echo $headerObject->id;?>">Footer Edit</a>&nbsp;&nbsp;<a class="btn btn-warning" href="/admin/BuildTemp/customcode?id=<?php echo $headerObject->id;?>" >Custom CSS/JS</a>
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
   
    <form action="/admin/BuildTemp/templateheaderedit?h_id=<?php echo $headerObject->temp_header_id;?>&id=<?php echo $_GET['id'];?>" method="post" class="form-horizontal" onsubmit="return validation();">
     <div class="portlet box orange">
         <div class="portlet-title">
							<div class="caption">
								Edit Template Header
							</div>
    </div>
        <fieldset>
           
            
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Category<span class="require">*</span></label>
                <div class="col-lg-8">
                    <select name="Template[category]" id="category">
                        <option value="">Select Category</option>
                        <?php if(!empty($categoryObject))
                        {
                            foreach($categoryObject as $category)
                                {?>
                        <option value="<?php echo $category->id; ?>" <?php if($headerObject->category_id == $category->id){ ?> selected="selected" <?php }?>><?php echo $category->name; ?></option>    
                            <?php }
                        }?>
                    </select>
                    <span id="header_code_error"></span>
                </div>
            </div>
            
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Template Title<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input id="title" type="text" class="form-control" name="Template[template_title]" value="<?php echo (!empty($headerObject->header->template_title)) ? stripcslashes($headerObject->header->template_title) : ""; ?>" >
                    <span id="header_code_error"></span>
                </div>
            </div>
            
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Header Code<span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea id="header_code" class="form-control" name="Template[header_code]" rows="10" cols="300"><?php echo (!empty($headerObject->header->header_content)) ? stripcslashes($headerObject->header->header_content) : ""; ?></textarea>
                    <span id="header_code_error"></span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Upload Template Screenshot<span class="require">*</span></label>
                <div class="col-lg-8">
                  <input type="file" name="screenshot" id="screenshot">
                  <?php if($headerObject->screenshot !=''){?><img height="150" src="/user/template/<?php echo $headerObject->folderpath; ?>/screenshot/<?php echo $headerObject->screenshot;?>"><?php }?>
                    <span id="screenshot_error"></span>
                </div>
            </div>
             
        </fieldset>

    <div class="row">
            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                <input type="submit" name="submit" value="Submit" class="btn red">
                 
            </div>
        </div>
         </div>
    </form>
</div>

<script type="text/javascript">
    function validation()
    {
      $("#header_code_error").html("");
      if ($("#header_code").val() == "") {
        $("#header_code_error").html("Enter Header Code");
        $("#header_code").focus();            
        return false;
      }
    }
</script>
     
     
