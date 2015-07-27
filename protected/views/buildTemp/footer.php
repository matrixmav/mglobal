<?php
$this->breadcrumbs = array(
    'Template' => array('BuildTemp/templates'),
    'Contact Setting',
);
?>
<div class="col-md-12 col-sm-12">
    <a class="btn orange publish" href="builder?o=<?php echo base64_encode(Yii::app()->session['orderID']);?>&u=<?php echo base64_encode(Yii::app()->session['userid']);?>&t=<?php echo base64_encode(Yii::app()->session['templateID']);?>">Publish Your Website</a>
</div>
<div class="col-md-12 col-sm-12" id="test">
  <?php  if (count($userpagesObject) > 0) {
        foreach ($userpagesObject as $page) {
            ?>
            <a href="/BuildTemp/pagedit?id=<?php echo $page->id; ?>" class="btn orange"><?php echo $page->page_name; ?></a>
        <?php }
    }
 echo BaseClass::buildWebsiteHeader(); ?> 
</div>
<div class="col-md-12 col-sm-12">

    <?php if ($error) { ?><p class="error-2" id="error_msg"><i class="fa fa-times-circle icon-error"></i><span class="span-error-2"><?php echo $error; ?></span></p><?php } ?>
    <?php if ($success) { ?><p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo $success; ?></span></p><?php } ?>
    <form action="" method="post" class="form-horizontal" onsubmit="return validation();" enctype="multipart/form-data">

        <fieldset>
            <legend>Contact Setting</legend>          
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="lastname">Footer<span class="require">*</span></label>
                    <div class="col-lg-10">
                        <textarea id="editor1" class="form-control" name="footer_code" cols="20" rows="10"><?php echo (!empty($userhasObject->temp_footer)) ? stripcslashes($userhasObject->temp_footer) : ""; ?></textarea>
                        <span id="contact_error"></span>
                    </div>
                </div>
        </fieldset>

        <div class="row">
            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                <input type="submit" name="submit" value="Submit" class="btn orange">

            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    function validation()
    {
        $("#contact_error").html("");
        if ($("#contact").val() == "") {
            $("#contact_error").html("Please enter contact email.");
            $("#contact").focus();
            return false;
        }
        var email = document.getElementById('email');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!filter.test(email.value)) {
            $("#contact_error").html("Enter valid email address ");
            $("#email").focus();
            return false;
        }
    }
</script>
<script type="text/javascript">
    CKEDITOR.replace('editor1', {
        filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl: '/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
    CKFinder.setupCKEditor(editor, '../');
</script>
