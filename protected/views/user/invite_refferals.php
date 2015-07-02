<?php
$this->breadcrumbs = array(
    'Invite Refferals'
);
 
$link =   Yii::app()->params['baseUrl'] . '/user/registration?spid='.$userObject->name."--fb"; 
$name = 'Refferal Invite';
$desc = 'Refferal Invite';
$caption = '';
?>
 

<div class="row">
    <div class="col-md-2">
    <!--    <a onclick = "postToFeedInvite('<?= $link; ?>', '<?= $name; ?>', '<?= $desc; ?>', '<?= $caption; ?>')" class="btn  green margin-right-20">Facebook</a>
        <a href="https://plus.google.com/share?url=<?php echo Yii::app()->params['baseUrl'];?>/user/registration?spid=<?php echo $userObject->name."--gp";?>" class="btn  green margin-right-20">Google+</a>
        <a onclick = "openform('Email');" class="btn  green margin-right-20">Email</a>
        <a onclick = "openform('SMS');" class="btn  green margin-right-20">SMS</a> -->
         <a class="btn btn-block btn-social btn-google-plus" href="https://plus.google.com/share?url=<?php echo Yii::app()->params['baseUrl'];?>/user/registration?spid=<?php echo $userObject->name."--gp";?>" target="_blank">
    <i class="fa fa-google-plus"></i> Google+ share
  </a>
    </div>
    <div class="col-md-2">
         <a class="btn btn-block btn-social btn-facebook" onclick = "postToFeedInvite('<?= $link; ?>', '<?= $name; ?>', '<?= $desc; ?>', '<?= $caption; ?>')">
    <i class="fa fa-facebook"></i> Facebook share
  </a>
    </div>
    <div class="col-md-2">
        <a class="btn btn-block btn-social btn-twitter" href="https://twitter.com/intent/tweet?url=<?php echo Yii::app()->params['baseUrl'];?>/user/registration?spid=<?php echo $userObject->name."--tw";?>" target="_blank">
    <i class="fa fa-twitter"></i> Twitter share
  </a>
    </div>
    <div class="col-md-2">
        <a class="btn btn-block btn-social btn-envelope" onclick = "openform('Email');">
    <i class="fa fa fa-share"></i>  Email share
  </a>
    </div>
    <div class="col-md-2">
        <a class="btn btn-block btn-social btn-file" onclick = "openform('SMS');">
    <i class="fa fa-envelope-o"></i> SMS share
  </a>
        
      </div>
</div><br/> 
<div class="row">
<div class="col-md-7 col-sm-7">
    <div class="error" id="error_msg" style="display: none;"></div>
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
    <div class="error" id="error_msg_email" style="display:none;"></div>
    <form action="/profile/inviterefferal" method="post" class="form-horizontal" onsubmit="return validation();">
     
        <fieldset id="emailDiv" style="display:none;">
            <legend>Invite Refferals Using Email</legend>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Email</label>
                <div class="col-lg-8">
                    <input type="text" id="email" class="form-control" name="email" value="">(Enter comma seperated email address. example : example.com,example1.com etc )<br/>
                    
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
</div>
<script type="text/javascript">
 function validation()
 {
      var emailList = document.getElementById("email").value;
      if(emailList=='')
      {
         $("#error_msg_email").fadeIn(); 
         $("#error_msg_email").html("Email field can not be blank");
         $("#email").focus();
            return false;  
      }
      var emails = emailList.split(",");
      var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      for(var i = 0; i < emails.length; i++)
      {
     if( emails[i] == "" || ! regex.test(emails[i])){
         $("#error_msg_email").fadeIn(); 
         $("#error_msg_email").html("One of your entered email is not correct.Please check");
         $("#email").focus();
            return false;
     }
    }
          /* Phone Number Validation  */
        /*$("#error_msg_phone").html("");
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
        }*/
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