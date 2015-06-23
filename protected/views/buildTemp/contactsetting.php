<?php
$this->breadcrumbs = array(
    'Contact Setting',
);
?>
<div class="col-md-12 col-sm-12">
    <a class="btn red publish" href="builder?o=<?php echo base64_encode(Yii::app()->session['orderID']);?>&u=<?php echo base64_encode(Yii::app()->session['userid']);?>&t=<?php echo base64_encode(Yii::app()->session['templateID']);?>">Publish Your Website</a>
</div>
<div class="col-md-12 col-sm-12" id="test">
    <?php if (count($userpagesObject) < 4) { ?>
        <a href="/BuildTemp/userinput" class="btn green">Add page</a>
        <?php
    }
    if (count($userpagesObject) > 0) {
        foreach ($userpagesObject as $page) {
            ?>
            <a href="/BuildTemp/pagedit?id=<?php echo $page->id; ?>" class="btn green"><?php echo $page->page_name; ?></a>
        <?php
        }
    }
    ?> 

    <?php echo BaseClass::buildWebsiteHeader(); ?> 
    <?php if ($error) { ?><div class="error" id="error_msg"><?php echo $error; ?></div><?php } ?>
    <?php if ($success) { ?><div class="success" id="error_msg"><?php echo $success; ?></div><?php } ?>

</div>
<div class="col-md-12 col-sm-12">
    <form action="" method="post" class="form-horizontal" onsubmit="return validation();" enctype="multipart/form-data">
        <fieldset>
            <legend>Contact Setting</legend>
            
            <div class="form-group">
                <label class="col-lg-2 control-label" for="lastname">Contact Email<span class="require">*</span></label>
                <div class="col-lg-4">
                    <input type="text" id="email" class="form-control" name="email" value="<?php echo (!empty($userhasObject->contact_email)) ? $userhasObject->contact_email : ""; ?>">
                    <span id="contact_error"></span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label" for="lastname">Contact Form<span class="require">*</span></label>
                <div class="col-lg-10">
                    <textarea id="editor1" class="form-control" name="contact" style="width: 482px; height: 248px;"><?php echo (!empty($userhasObject->contact_form)) ? stripslashes($userhasObject->contact_form) : "" ; ?></textarea>
                    <span id="page_content_error"></span>
                </div>
            </div>            
        
            <div class="row">
                <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                    <input type="submit" name="submit" value="Submit" class="btn red">
                </div>
            </div>
        </fieldset>
    </form>
</div>
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