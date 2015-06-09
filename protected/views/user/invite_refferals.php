<?php
$this->breadcrumbs = array(
    'Invite Refferals'
);
 
$link =   Yii::app()->params['baseUrl'] . '/user/registration?spid='.$userObject->name.'&social=fb'; 
$name = 'Refferal Invite';
$desc = 'Refferal Invite';
$caption = '';
?>
 

<div class="row">
    <div class="col-md-12">
        <a onclick = "postToFeedInvite('<?= $link; ?>', '<?= $name; ?>', '<?= $desc; ?>', '<?= $caption; ?>')" class="btn  green margin-right-20">Facebook</a>
        <a href="https://plus.google.com/share?url=<?php echo Yii::app()->params['baseUrl'];?>/user/registration?spid=<?php echo $userObject->name;?>&social=gp" class="btn  green margin-right-20">Google+</a>
        <a onclick = "openform('Email');" class="btn  green margin-right-20">Email</a>
        <a onclick = "openform('SMS');" class="btn  green margin-right-20">SMS</a>
      </div>
</div><br/> 
<div class="col-md-7 col-sm-7">
    <div class="error" id="error_msg" style="display: none;"></div>
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
    <form action="/profile/inviterefferal" method="post" class="form-horizontal">
     
        <fieldset id="emailDiv" style="display:none;">
            <legend>Invite Refferals Using Email</legend>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Email</label>
                <div class="col-lg-8">
                    <input type="text" id="email" class="form-control" name="email" value="">(Enter comma seperated email address. example : example.com,example1.com etc )<br/>
                    <div class="" id="error_msg_email"></div>
                </div>
            </div>
            
            </fieldset>
         <fieldset id="phoneDiv" style="display:none;">
            <legend>Invite Refferals Using SMS</legend>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Phone</label>
                <div class="col-lg-8">
                    <input type="text" id="phone" class="form-control" name="phone_no[]" value="">(Enter comma seperated phone numbers. example : example.com,example1.com etc )
                    <div class="" id="error_msg_phone"></div>
                </div>
            </div>
             
            </fieldset>
            <div class="row" id="button" style="display:none;">
            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                <input type="submit" name="button" value="Share" class="btn red">
                 
            </div>
            </div>
              </form>
</div>
<script type="text/javascript">
 function validation()
 {
       if(document.getElementById("email").value=='')
        {
             document.getElementById("error_msg_email").innerHTML = "Please enter your email.";
             document.getElementById("email").focus();
            return false;
        }
        var email = document.getElementById('email');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!filter.test(email.value)) {
            $("#error_msg_email").html("Enter valid email address ");
            $("#email").focus();
            return false;
        }
          /* Phone Number Validation  */
        $("#error_msg_phone").html("");
        if ($("#phone").val() == "") {
            $("#error_msg_phone").html("Enter Mobile Number");
            $("#phone").focus();
            return false;
        }
        

        var phone = document.getElementById('phone');
        var filter = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

        if (!filter.test(phone.value)) {
            $("#error_msg_phone").html("Enter valid phone number ");
            $("#phone").focus();  
            return false;
        }
    }
   function openform(formval)
   {
     if(formval=='Email')  
     {
         document.getElementById("email").value="";
         document.getElementById("phone").value="test";
        $('#emailDiv').fadeIn();
        $('#button').fadeIn();
        $('#phoneDiv').fadeOut();
     }
     else if(formval=='SMS')  
     {
         document.getElementById("phone").value="";
         document.getElementById("email").value="test";
         $('#phoneDiv').fadeIn();
         $('#button').fadeIn();
        $('#emailDiv').fadeOut(); 
     }else{
         $('#phoneDiv').fadeOut();
          $('#button').fadeOut();
         $('#emailDiv').fadeOut(); 
     }
   }
  </script>  
      <script type="text/javascript" 
                src="<?php echo Yii::app()->request->baseUrl; ?>/js/all.js">
        </script> 

        <script type="text/javascript" 
                src="<?php echo Yii::app()->request->baseUrl; ?>/js/fbhelper.js">
        </script>