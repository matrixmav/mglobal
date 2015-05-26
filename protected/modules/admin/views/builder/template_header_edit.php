<?php
$this->breadcrumbs = array(
    'Template' => array('buildtemp/templatelist'),
    'Template Header Edit',
);
?>
<div class="col-md-7 col-sm-7">
    <a href="/admin/buildtemp/templateheaderedit?id=<?php echo $headerObject->id;?>">Header Code Edit</a>&nbsp;&nbsp;<a href="/admin/buildtemp/templatebodyedit?id=<?php echo $headerObject->id;?>">Body Code Edit</a>&nbsp;&nbsp;<a href="/admin/buildtemp/templatefooteredit?id=<?php echo $headerObject->id;?>">Footer Code Edit</a>
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
   
    <form action="/admin/buildtemp/templateheaderedit?id=<?php echo $headerObject->id;?>" method="post" class="form-horizontal" onsubmit="return validation();">
     
        <fieldset>
            <legend>Edit Template Header</legend>
            
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Category<span class="require">*</span></label>
                <div class="col-lg-8">
                    <select name="category" id="category">
                        <option value="">Select Category</option>
                        <?php if(!empty($categoryObject))
                        {
                            foreach($categoryObject as $category)
                                {?>
                            <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>    
                            <?php }
                        }?>
                    </select>
                    <span id="header_code_error"></span>
                </div>
            </div>
            
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Template Title<span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea id="title" class="form-control" name="Template[template_title]" ><?php echo (!empty($headerObject->template_title)) ? $headerObject->template_title : ""; ?></textarea>
                    <span id="header_code_error"></span>
                </div>
            </div>
            
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Header Code<span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea id="header_code" class="form-control" name="Template[header_code]" ><?php echo (!empty($headerObject->header_content)) ? $headerObject->header_content : ""; ?></textarea>
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
      if ($("#header_code").val() == "") {
      $("#header_code_error").html("Enter Header Code");
      $("#header_code").focus();            
      return false;
    }
    }
    </script>
     
     
