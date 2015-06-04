<?php
$this->breadcrumbs = array(
    'Template' => array('BuildTemp/templates'),
    'Logo Add',
);
?>

<div class="col-md-12 col-sm-12" id="test">
    <?php if (count($userpagesObject) < 4) { ?>
        <a href="/BuildTemp/userinput" class="btn green">Add page</a>
    <?php
    }
    if (count($userpagesObject) > 0) {
        foreach ($userpagesObject as $page) {
            ?>
            <a href="/BuildTemp/pagedit?id=<?php echo $page->id; ?>" class="btn green"><?php echo $page->page_name; ?></a>
    <?php }
} ?> 

    <a href="/BuildTemp/addlogo" class="btn green">Logo Setting</a>    
    <a href="/BuildTemp/addheader" class="btn green">Header Setting</a>    
    <a href="/BuildTemp/addcopyright" class="btn green">Copy Right Setting</a> 
    <a href="/BuildTemp/contactsetting" class="btn green">Contact Settings</a> 
    <a href="/BuildTemp/addfooter" class="btn green">Footer Setting</a> 

<?php if ($error) { ?><div class="error" id="error_msg"><?php echo $error; ?></div><?php } ?>
<?php if ($success) { ?><div class="success" id="error_msg"><?php echo $success; ?></div><?php } ?>

</div>
<div class="col-md-7 col-sm-7">
    
    <form action="" method="post" class="form-horizontal" onsubmit="return validation();" enctype="multipart/form-data">

        <fieldset>
            <legend>Add Logo</legend>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Logo<span class="require">*</span></label>
                <div class="col-lg-8 fileupload fileupload-new">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <span class="btn btn-primary btn-file btn-1">
                            <span class="fileupload-new">
                                <input id="logo" type="file" class="" name="logo">
                            </span>
                        </span>
                        <span id="logo_error" class="clrred"></span>
                    </div>

                    <span class="example1">(Upload jpg ,png , pdf files only)<br/>
                        <?php if (!empty($userhasObject)) { ?>
                            <img height="200"  src="/user/template/<?php echo $builderObjectmeta->folderpath . '/' . $userhasObject->logo; ?>">
                        <?php } ?>
                    </span> 
                </div>
                <div>    
                    <div class="form-inline form-group">
                        <div class="form-group">
                            <label for="exampleInputEmail2">Width</label>
                            <input type="text" class="form-control" id="width" name="width" placeholder="Width" value="<?php echo $userhasObject->logo_width ? $userhasObject->logo_width : '';  ?>">
                        </div>
                        <span id="width_error" class="clrred"></span>

                        <div class="form-group">
                            <label for="exampleInputName2">Height</label>
                            <input type="text" class="form-control" id="height" name="height" placeholder="Height" value="<?php echo $userhasObject->logo_height ? $userhasObject->logo_height : '';  ?>">
                        </div>
                        <span id="height_error" class="clrred"></span>

                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-4 control-label" for="lastname">Site Title</label>
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <input type="text" value="<?php echo $userhasObject->site_title ? stripcslashes($userhasObject->site_title) : ''; ?>" name="site_title"  class="form-control" id="copyright">  
                        </div>
                    </div>                
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
    function validation(){
        $("#logo_error").html("");
        if ($("#logo").val() == "") {
            $("#logo_error").html("Please choose logo image.");
            $("#logo").focus();            
          return false;
        }

        $("#width_error").html("");
        if ($("#width").val() == "") {
            $("#width_error").html("Please enter logo width.");
            $("#width").focus();            
          return false;
        }
    
        $("#height_error").html("");
        if ($("#height").val() == "") {
            $("#height_error").html("Please enter logo height.");
            $("#height").focus();            
          return false;
        }
    
    }
    
</script>


