<?php
$this->breadcrumbs = array(
    'Template' => array('buildtemp/templates'),
    'Page Edit',
);
?>
<div class="col-md-12 col-sm-12" id="test">
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
      
    <?php foreach($userpagesObjectF as $page){?><a href="/buildtemp/pagedit?id=<?php echo $page->id; ?>" class="btn green"><?php echo $page->page_name; ?></a><?php }?>   
    <div style="float:right;"><a href="/buildtemp/managewebsite" class="btn green">Preview</a></div> 
    <form action="/buildtemp/pagedit?id=<?php echo $_GET['id']; ?>" method="post" class="form-horizontal" onsubmit="return validation();" enctype="multipart/form-data">
     
        <fieldset>
            <legend>Edit Pages</legend>
             <div class="form-group">
                <label class="col-lg-2 control-label" for="lastname">Page Title<span class="require">*</span></label>
                <div class="col-lg-6">
                    <input id="page_name" type="text" class="form-control" name="pages[page_name]" value="<?php echo (!empty($userpagesObject->page_name)) ? $userpagesObject->page_name : ""; ?>">
                    <span id="page_title_error"></span>
                </div>
            </div>
             <div class="form-group">
                <label class="col-lg-2 control-label" for="lastname">Form Require</label>
                <div class="col-lg-6">
                    <select name="pages[form_allowed]" id="form" class="form-control">
                        <option value="">Select Form</option>
                        <option value="contact" <?php if(!empty($userpagesObject) && $userpagesObject->page_form=='contact'){?>selected="selected"<?php }?>>Contact Form<option>
                        <?php if($orderObject->package->no_of_forms=='2' || $orderObject->package->no_of_forms=='3'){ ?>
                        <option value="feedback" <?php if(!empty($userpagesObject) && $userpagesObject->page_form=='feedback'){?>selected="selected"<?php }?>>Feedback Form</option>
                        <?php }?>
                        <?php if($orderObject->package->no_of_forms=='3'){ ?>
                        <option value="enquiry" <?php if(!empty($userpagesObject) && $userpagesObject->page_form=='enquiry'){?>selected="selected"<?php }?>>Enquiry Form</option>
                        <?php }?>
                    </select>
                     
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="lastname">Page Content<span class="require">*</span></label>
                <div class="col-lg-10">
                    <textarea id="editor1" class="form-control" name="pages[page_content]" style="width: 482px; height: 248px;"><?php echo (!empty($userpagesObject->page_content)) ? $userpagesObject->page_content : ""; ?></textarea>
                    <span id="page_content_error"></span>
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
      $("#page_title_error").html("");
      if ($("#page_name").val() == "") {
      $("#page_title_error").html("Please enter page title.");
      $("#page_name").focus();            
      return false;
    }
    
    $("#page_content_error").html("");
      if ($("#editor1").val() == "") {
      $("#page_content_error").html("Please enter page content.");
      $("#editor1").focus();            
      return false;
    }
   }
    
    </script>
       <script type="text/javascript">
    CKEDITOR.replace( 'editor1' , {
    filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );
</script>
     
