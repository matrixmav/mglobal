<?php
$this->breadcrumbs = array(
    'Template' => array('buildtemp/templatelist'),
    'Template  Add',
);
?>
<div class="col-md-7 col-sm-7" id="test">
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
   
    <form action="/admin/buildtemp/templateheaderadd" method="post" class="form-horizontal" onsubmit="return validation();" enctype="multipart/form-data">
     
        <fieldset>
            <legend>Add Template</legend>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Upload Zip Folder includes(css,images,js)<span class="require">*</span></label>
                <div class="col-lg-8">
                  <input type="file" name="cssfolder" id="cssfolder">
                    <span id="cssfolder_error"></span>
                </div>
            </div>
            
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Upload Template Screenshot<span class="require">*</span></label>
                <div class="col-lg-8">
                  <input type="file" name="screenshot" id="screenshot">
                    <span id="screenshot_error"></span>
                </div>
            </div>
            
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Category<span class="require">*</span></label>
                <div class="col-lg-8">
                    <select name="Template[category]" id="category">
                        <option value="">Select Category</option>
                        <?php if(!empty($categoryObject))
                        {
                            foreach($categoryObject as $category)
                                {?>
                        <option value="<?php echo $category->id; ?>" ><?php echo $category->name; ?></option>    
                            <?php }
                        }?>
                    </select>
                    <span id="category_error"></span>
                </div>
            </div>
            
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Template Title<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input id="template_title" type="text" class="form-control" name="Template[template_title]">
                    <span id="template_title_error"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Header Code<span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea id="header_code" class="form-control" name="Template[header_code]" style="width: 482px; height: 248px;"></textarea>
                    <span id="header_code_error"></span>
                </div>
            </div>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Body Code<span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea id="body_code" class="form-control" name="Template[body_code]" style="width: 482px; height: 248px;"></textarea>
                    <span id="body_code_error"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Footer Code<span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea id="footer_code" class="form-control" name="Template[footer_code]" style="width: 482px; height: 248px;"></textarea>
                    <span id="footer_code_error"></span>
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
      $("#cssfolder_error").html("");
      if ($("#cssfolder").val() == "") {
      $("#cssfolder_error").html("Please upload css zip folder.");
      $("#cssfolder").focus();            
      return false;
    }
    
    $("#screenshot_error").html("");
      if ($("#screenshot").val() == "") {
      $("#screenshot_error").html("Please upload template screenshot.");
      $("#screenshot").focus();            
      return false;
    }
     
      $("#category_error").html("");
      if ($("#category").val() == "") {
      $("#category_error").html("Please select template category");
      $("#category").focus();            
      return false;
    }
     $("#template_title_error").html("");
      if($("#template_title").val() == "") {
      $("#template_title_error").html("Please enter template title");
      $("#template_title").focus();            
      return false;
    }
      $("#header_code_error").html("");
      if ($("#header_code").val() == "") {
      $("#header_code_error").html("Please enter Header Code");
      $("#header_code").focus();            
      return false;
    }
    $("#header_code_error").html("");
      if ($("#body_code").val() == "") {
      $("#header_code_error").html("Enter Body Code");
      $("#body_code").focus();            
      return false;
    }
     $("#header_code_error").html("");
      if ($("#footer_code").val() == "") {
      $("#header_code_error").html("Enter Footer Code");
      $("#footer_code").focus();            
      return false;
    }
     
    }
    
    </script>
     
     
