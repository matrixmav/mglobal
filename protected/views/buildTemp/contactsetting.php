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
        <?php
        }
    }
    ?> 

    <a href="/BuildTemp/addlogo" class="btn green">Logo Setting</a>    
    <a href="/BuildTemp/addheader" class="btn green">Header Setting</a>    
    <a href="/BuildTemp/addcopyright" class="btn green">Copy Right Setting</a> 
    <a href="/BuildTemp/contactsetting" class="btn green">Contact Settings</a> 
    <a href="/BuildTemp/addfooter" class="btn green">Footer Setting</a> 
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
                <label class="col-lg-4 control-label" for="lastname">Contact Email<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="email" class="form-control" name="email" value="<?php echo (!empty($userhasObject->contact_email)) ? $userhasObject->contact_email : ""; ?>">
                    <span id="contact_error"></span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Your Name</label>
                <div class="col-lg-8">
                    <input type="text" id="name" class="form-control" name="name">
                    <span id="name_error"></span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Your Email</label>
                <div class="col-lg-8">
                    <input type="text" id="email" class="form-control" name="email" required>
                    <span id="email_error"></span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" >Add More</label>
                <div class="col-md-8">
                    <div class="addedfields">
                        <input type='text' id='email_add1' name='HotelDetail[email_address][0]' class='form-control' />                      
                    </div>
                    <a href='#' class='addbutton btn btn-primary' id='addbutton'>Add<i class='fa fa-plus'></i></a>			
                </div>
            </div>	
            
            <div class="addedfields1"></div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Your Body</label>
                <div class="col-lg-8">
                    <textarea name="body" id="body" class="form-control"></textarea>                    
                    <span id="body_error"></span>
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
    
   jQuery(document).ready(function() {   
        $('#addbutton').click(function(e){
            if($(".addedfields1").length < 2){		    
              $(".addedfields1").append(
                    "<div class='form-group'><label class='col-sm-4 control-label'><input type='text' name='Email'></label><div class='col-md-8'><input type='text' name='HotelDetail[email_address][]' class='form-control'/>"+
                    "<a href='#' class='btn green removeBtn pull-right' id='removebutton'>"+txt_remove+"</a></div></div>"
              );
              alert($(".addedfields1").length );
              e.preventDefault();
            }
            $(".removeBtn").on("click",function(e){
                    $(this).parent().parent().remove();
                    e.preventDefault();
            });
       });

        $(".removeBtn").on("click",function(e){
              $(this).parent().parent().remove();
              e.preventDefault();
        });
    });
    
    var txt_remove = "Remove";
    
</script>
