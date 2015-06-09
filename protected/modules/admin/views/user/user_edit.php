<?php
$this->breadcrumbs = array(
     
    'User Edit',
);
?>
<div class="col-md-7 col-sm-7">
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    
   
    <form action="/admin/user/edit?id=<?php echo $_REQUEST['id'];?>" method="post" class="form-horizontal" onsubmit="return validation();">
     
          <fieldset>
            <legend>Edit User</legend>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Sponsor ID</label>
                <div class="col-lg-8">
                    <input type="text" id="name" class="form-control" name="UserProfile[sponsor_id]" value="<?php echo (!empty($userObject))? $userObject->sponsor_id:"";?>" >
                   
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Name</label>
                <div class="col-lg-8">
                    <input type="text" id="name" class="form-control" name="UserProfile[name]" value="<?php echo (!empty($userObject))? $userObject->name : "";?>" readonly="readonly" >
                </div>
            </div>
            
           <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Position</label>
                <div class="col-lg-8">
                    <input type="text" id="position" class="form-control" name="UserProfile[position]" value="<?php echo (!empty($userObject))?$userObject->position:"";?>">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Full Name<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="full_name" class="form-control" name="UserProfile[full_name]" value="<?php echo (!empty($userObject))?$userObject->full_name:"";?>">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Email<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="email" class="form-control" name="UserProfile[email]" value="<?php echo (!empty($userObject))? $userObject->email:"";?>" >
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Phone<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" value="<?php echo (!empty($userObject))? $userObject->country_code:"";?>" style="width:10%;float:left;" class="form-control">&nbsp;&nbsp;<input type="text" id="phone" class="form-control" name="UserProfile[phone]" value="<?php echo (!empty($userObject))? $userObject->phone:"";?>"  style="width:88%;float:right;">
                   <div  id="error_msg_phone"> </div> 
                </div>
            </div>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Date of Birth<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="date_of_birth" class="form-control" name="UserProfile[date_of_birth]" value="<?php echo (!empty($userObject))?$userObject->date_of_birth:"";?>" >
                   <div id="error_msg"> </div> 
                </div>
            </div>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Skype ID</label>
                <div class="col-lg-8">
                    <input type="text" id="skype_id" class="form-control" name="UserProfile[skype_id]" value="<?php echo (!empty($userObject))?$userObject->skype_id:"";?>">
                    <span class="example">Ex: example12</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Facebook ID</label>
                <div class="col-lg-8">
                    <input type="text" id="facebook_id" class="form-control" name="UserProfile[facebook_id]" value="<?php echo (!empty($userObject))?$userObject->facebook_id:"";?>">
                    <span class="example">Ex: http://facebook.com</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Twitter ID</label>
                <div class="col-lg-8">
                    <input type="text" id="twitter_id" class="form-control" name="UserProfile[twitter_id]" value="<?php echo (!empty($userObject))?$userObject->twitter_id:"";?>">
                    <span class="example">Ex: http://twitter.com</span>
                </div>
            </div>
              <div class="form-group">
                <label class="col-lg-4 control-label" for="firstname">Address <span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea id="address" name="UserProfile[address]" class="form-control" ><?php echo (!empty($profileObject)) ? $profileObject->address : "";?></textarea>
                 <div  id="error_msg_address"> </div> 
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Street<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="street" class="form-control" name="UserProfile[street]" value="<?php echo (!empty($profileObject)) ? $profileObject->street: "";?>">
               <div id="error_msg_street"> </div> 
                </div>
            </div>
            
             
            <div class="form-group">
                    <label for="country" class="col-lg-4 control-label">Country <span class="require">*</span></label>
                    <div class="col-lg-8">
                        <select name="UserProfile[country_id]" id="country_id" onchange="getStateList(this.value)" class="form-control">
                            <option value="">Select Country</option>
                            <?php foreach ( $countryObject as  $country) { ?>
                            <option value="<?php echo $country->id; ?>" <?php if( $country->id== (!empty($profileObject)) ? $profileObject->country_id :  ""){?>selected="selected<?php }?>"><?php echo $country->name;?></option>
                            <?php } ?>
                        </select>
                    <div id="error_msg_country"></div> 
                    </div>
                  
                </div>

            <div class="form-group" id="stateList">
                <label class="col-lg-4 control-label" for="email">State <span class="require">*</span></label>
                <div class="col-lg-8">
                   <input type="text" id="state_id" class="form-control" name="UserProfile[state_name]" value="<?php echo (!empty($profileObject)) ?  $profileObject->state_name : ""; ?>">
                 <div id="error_msg_state"> </div> 
                </div>
                 </div>
            
            <div class="form-group" id="cityList">
                <label class="col-lg-4 control-label" for="email">City <span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="city_id" class="form-control" name="UserProfile[city_name]" value="<?php echo (!empty($profileObject)) ?  $profileObject->city_name : ""; ?>">
                 <div id="error_msg_city"> </div> 
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Zip Code<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="zip_code" class="form-control" name="UserProfile[zip_code]" value="<?php echo (!empty($profileObject)) ?  $profileObject->zip_code : ""; ?>">
                <div id="error_msg_zip"> </div> 
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
 function getSponId(){ 
    $("#sponsor_id").val("<?php echo Yii::app()->params['adminSpnId']; ?>");
    return false;
}
 
    function validation()
    {
        $("#error_msg_phone").html("");
        if($("#phone").val()=='') {
            $("#error_msg_phone").html("Please enter phone number.");
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
        
       $("#error_msg_address").html("");   
        if($("#address").val()=='')
        {
            $("#error_msg_address").html("Please enter your address.");
            $("#address").focus();
            return false;
        }
        $("#error_msg_street").html("");  
        if($("#street").val()=='')
        {
            $("#error_msg_street").html("Please enter your street.");
            $("#street").focus();
            return false;
        }
        $("#error_msg_country").html("");  
        if($("#country_id").val()=='')
        {
            $("#error_msg_country").html("Please select country.");
            $("#country_id").focus();
            return false;
        }
        $("#error_msg_state").html("");  
        if($("#state_id").val()=='')
        {
            $("#error_msg_state").html("Please enter state.");
            $("#state_id").focus();
            return false;
        }
        $("#error_msg_city").html("");  
        if($("#city_id").val()=='')
        {   
            $("#error_msg_city").html("Please enter city.");
            $("#city_id").focus();
            return false;
        }
         $("#error_msg_zip").html("");  
        if($("#zip_code").val()=='')
        {
            $("#error_msg_zip").html("Please enter zip code.");
            $("#zip_code").focus();
            return false;
        }
          
        
    }
    </script>

     
     
