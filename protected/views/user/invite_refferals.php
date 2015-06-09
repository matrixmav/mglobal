<?php
$this->breadcrumbs = array(
    'Invite Refferals'
);
 
$link = '"' . Yii::app()->params['baseUrl'] . '/user/registration?spid='.$userObject->name.'&social=fb"';
$name = '"' . $data->name . '"';
$desc = '"' . $data->description . '"';
$caption = '""';
?>
 

<div class="row">
    <div class="col-md-12">
        <a onclick = "postToFeedInvite(<?= $link; ?>, <?= $name; ?>, <?= $desc; ?>, <?= $caption; ?>">Facebook</a>
        <a href = "https://plus.google.com/share?url=<?php echo $link;?>">Google+</a>
    </div>
</div><br/> 
<div class="col-md-7 col-sm-7">
    <div class="error" id="error_msg" style="display: none;"></div>
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
    <form action="/profile/inviterefferal" method="post" class="form-horizontal" onsubmit="return validation();">
     
        <fieldset>
            <legend>Invite Refferals</legend>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Email*</label>
                <div class="col-lg-8">
                    <input type="text" id="name" class="form-control" name="UserProfile[sponsor_id]" value="">
                    <div class="" id="error_msg"></div>
                </div>
            </div>
            <div class="row">
            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                <input type="button" name="button" value="Share" class="btn red">
                 
            </div>
            </div>
              </form>
</div>
<script type="text/javascript">
 function validation()
 {
            if(document.getElementById("email").value=='')
        {
             document.getElementById("error_msg").innerHTML = "Please enter your email.";
             document.getElementById("email").focus();
            return false;
        }
        var email = document.getElementById('email');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!filter.test(email.value)) {
            $("#error_msg").html("Enter valid email address ");
            $("#email").focus();
            return false;
        }
    }
  </script>      