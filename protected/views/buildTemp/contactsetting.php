<?php
$this->breadcrumbs = array(
    'Template' => array('BuildTemp/templates'),
    'Contact Setting',
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

    <a href="/BuildTemp/addlogo" class="btn green">Add Logo</a>    
    <a href="/BuildTemp/addcopyright" class="btn green">Add Copy Right</a> 
    <a href="/BuildTemp/contactsetting" class="btn green">Contact Settings</a> 
    <a href="/BuildTemp/addfooter" class="btn green">Footer</a> 

<?php if ($error) { ?><div class="error" id="error_msg"><?php echo $error; ?></div><?php } ?>
<?php if ($success) { ?><div class="success" id="error_msg"><?php echo $success; ?></div><?php } ?>

</div>
<div class="col-md-7 col-sm-7">

<?php if ($error) { ?><div class="error" id="error_msg"><?php echo $error; ?></div><?php } ?>
<?php if ($success) { ?><div class="success" id="error_msg"><?php echo $success; ?></div><?php } ?>
      <form action="" method="post" class="form-horizontal" onsubmit="return validation();" enctype="multipart/form-data">
    
        <fieldset>
            <legend>Contact Setting</legend>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Contact Email Notification</label>
                <div class="col-lg-8">
                    <input id="notification" type="checkbox" class="form-control" name="notification" value="yes" checked="checked">Yes
                    <input id="notification" type="checkbox" class="form-control" name="notification" value="no">No
                    <span id="page_title_error"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Contact Email<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="email" class="form-control" name="email" value="<?php echo (!empty($userhasObject->contact_email)) ? $userhasObject->contact_email : ""; ?>">
                    <span id="contact_error"></span>
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
  