<?php
$this->breadcrumbs = array(
    'Page Edit',
);

?>
<div class="col-md-12 col-sm-12">
    <a class="btn orange publish" href="builder?o=<?php echo base64_encode(Yii::app()->session['orderID']);?>&u=<?php echo base64_encode(Yii::app()->session['userid']);?>&t=<?php echo base64_encode(Yii::app()->session['templateID']);?>">Publish Your Website</a>
</div>

<div class="col-md-12 col-sm-12" id="test">    
   
    <?php if($error){?><p class="error-2" id="error_msg"><i class="fa fa-times-circle icon-error"></i><span class="span-error-2"><?php echo $error;?></span></p><?php }?>
    <?php if($success){?><p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo $success;?></span></p><?php }?>
      
    <div class="row pageBox"><?php foreach($userpagesObjectF as $page){?><a href="/BuildTemp/pagedit?id=<?php echo $page->id; ?>" class="btn orange"><?php echo $page->page_name; ?></a><?php }?> </div>  
    <div class="row"><div class="col-sm-12"><a href="/BuildTemp/managewebsite/<?php echo Yii::app()->session['orderID']; ?>/<?php echo $userpagesObject->page_slug ; ?>" class="btn green pull-right" target="_blank">Preview</a></div> </div>
   
    <?php echo BaseClass::buildWebsiteHeader(); ?> 
    <div class="portlet box orange ">
    <div class="portlet-title">
							<div class="caption">
								Edit Pages
							</div>
    </div>
    <div class="portlet-body form">
    <form action="/BuildTemp/pagedit?id=<?php echo $_GET['id']; ?>" method="post" class="form-horizontal" onsubmit="return validation();" enctype="multipart/form-data">
     
        <fieldset>
            <div class="form-body">
             <div class="form-group">
                <label class="col-sm-2 control-label" for="lastname">Page Title<span class="require">*</span></label>
                <div class="col-sm-2">
                    <input id="page_name" type="text" class="form-control" name="pages[page_name]" value="<?php echo (!empty($userpagesObject->page_name)) ? $userpagesObject->page_name : ""; ?>">
                    <span id="page_title_error"></span>
                </div>
                
                 <label class="col-sm-2 control-label" for="lastname">Form Require</label>
                <div class="col-sm-2">
                    <select name="pages[form_allowed]" id="form" class="form-control">
                        <option value="0">Select Form</option>
                        <option value="1" <?php if(!empty($userpagesObject) && $userpagesObject->page_form=='1'){?>selected="selected"<?php }?>>Contact Form</option>
                        <?php //if($orderObject->package->no_of_forms=='2' || $orderObject->package->no_of_forms=='3'){ ?>
                        <!--<option value="feedback" <?php //if(!empty($userpagesObject) && $userpagesObject->page_form=='feedback'){?>selected="selected"<?php //}?>>Feedback Form</option>-->
                        <?php //}?>
                        <?php //if($orderObject->package->no_of_forms=='3'){ ?>
<!--                        <option value="enquiry" <?php //if(!empty($userpagesObject) && $userpagesObject->page_form=='enquiry'){?>selected="selected"<?php //}?>>Enquiry Form</option>-->
                        <?php //}?>
                    </select>
                     
                </div>
                
                <label class="col-sm-2 control-label" for="lastname">Status</label>                
                <div class="col-sm-2">
                    <label><input type="radio" name="pages[status]" value="1" <?php if(!empty($userpagesObject) && $userpagesObject->status=='1'){ echo "checked=checked"; } ?> >Active</label>
                    <label><input type="radio" name="pages[status]" value="0" <?php if(!empty($userpagesObject) && $userpagesObject->status=='0'){ echo "checked=checked"; } ?> >Pending</label>
                    
                </div>
                
                <label class="col-sm-2 control-label" for="lastname">Inner Page :</label>                
                <div class="col-sm-2">
                    <label><input type="radio" name="pages[inner]" value="1" <?php if(!empty($userpagesObject) && $userpagesObject->page_inner=='1'){ echo "checked=checked"; } ?> >Yes</label>
                    <label><input type="radio" name="pages[inner]" value="0" <?php if(!empty($userpagesObject) && $userpagesObject->page_inner=='0'){ echo "checked=checked"; } ?> >No</label>
                    
                 </div>
                
            </div>
             
            <div class="form-group">
                <label class="col-sm-2 control-label" for="lastname">Page Content<span class="require">*</span></label>
                <div class="col-lg-10">
                    <textarea id="editor1" class="form-control" name="pages[page_content]" style="width: 482px; height: 248px;"><?php echo (!empty($userpagesObject->page_content)) ? stripslashes($userpagesObject->page_content) : ""; ?></textarea>
                    <span id="page_content_error"></span>
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
     
