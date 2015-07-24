<?php
$this->breadcrumbs = array(
    'Template' => array('BuildTemp/templates'),
    'Logo Add',
);
?>
<div class="col-md-12 col-sm-12">
    <a class="btn red publish" href="builder?o=<?php echo base64_encode(Yii::app()->session['orderID']);?>&u=<?php echo base64_encode(Yii::app()->session['userid']);?>&t=<?php echo base64_encode(Yii::app()->session['templateID']);?>">Publish Your Website</a>
</div>

<div class="row pageBox"><?php foreach($userpagesObject as $page){?><a href="/BuildTemp/pagedit?id=<?php echo $page->id; ?>" class="btn orange"><?php echo $page->page_name; ?></a><?php }?> </div>  

<?php echo BaseClass::buildWebsiteHeader(); ?> 

<?php if ($error) { ?><div class="error" id="error_msg"><?php echo $error; ?></div><?php } ?>
<?php if ($success) { ?><div class="success" id="error_msg"><?php echo $success; ?></div><?php } ?>

<div class="col-md-7 col-sm-7">
    
    <form action="" method="post" class="form-horizontal" onsubmit="return validation();" enctype="multipart/form-data">

        <fieldset>
            <legend>Add Logo</legend>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Logo<span class="require">*</span></label>
                <div class="col-lg-8 fileupload fileupload-new">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <span class="">
                            <span class="fileupload-new">
                                <input id="logo" type="file" class="" name="logo">
                            </span>
                        </span>
                        <span id="logo_error" class="clrred"></span>
                    </div>

                    <span class="example1">(Upload jpg ,png , pdf files only)<br/>
                        <?php if (!empty($userhasObject)) { ?>
                            <img height="200" width="200" src="/user/template/<?php echo $builderObjectmeta->folderpath . '/' . $userhasObject->logo; ?>">
                        <?php } ?>
                    </span> 
                </div>
                </div>  
            
            <div class="form-group form-horizontal">
               <label class="col-sm-2 control-label" for="lastname">Width</label>
               <div class="fileupload fileupload-new col-sm-10" data-provides="fileupload">
                   <input type="text" class="form-control" id="width" name="width" placeholder="Width" value="<?php echo $userhasObject->logo_width ? $userhasObject->logo_width : '';  ?>">
               </div>
           </div>
            
            <div class="form-group  form-horizontal">
               <label class="col-sm-2 control-label" for="lastname">Height</label>
               <div class="fileupload fileupload-new col-sm-10" data-provides="fileupload">
                   <input type="text" class="form-control" id="height" name="height" placeholder="Height" value="<?php echo $userhasObject->logo_height ? $userhasObject->logo_height : '';  ?>">
               </div>
           </div>
            
                    
            <div class="form-group form-horizontal">
                <label class="col-sm-2 control-label" for="lastname">Site Title</label>
                <div class="fileupload fileupload-new col-sm-10" data-provides="fileupload">
                    <input type="text" value="<?php echo $userhasObject->site_title ? stripcslashes($userhasObject->site_title) : ''; ?>" name="site_title"  class="form-control" id="copyright">  
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

<!--<script type="text/javascript">
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
    
</script>-->


