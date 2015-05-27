<?php
$this->breadcrumbs = array(
    'Template' => array('buildtemp/templates'),
    'Page Add',
);
?>
<div class="col-md-7 col-sm-7" id="test">
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
     <?php if(count($userpagesObject) < 4) {?>
    <a href="/buildtemp/userinput">Add page</a>
     <?php }else{
      foreach($userpagesObject as $page){?><a href="/buildtemp/pagedit?page_id=<?php echo $page->id; ?>"><?php echo $page->page_name; ?></a><?php }?>   
      <?php }?>
    <form action="/buildtemp/userinput" method="post" class="form-horizontal" onsubmit="return validation();" enctype="multipart/form-data">
     
        <fieldset>
            <legend>Add Pages</legend>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Page Title<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input id="page_name" type="text" class="form-control" name="pages[page_name]">
                    <span id="page_title_error"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Page Content<span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea id="editor1" class="form-control" name="pages[page_content]" style="width: 482px; height: 248px;"></textarea>
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
     
