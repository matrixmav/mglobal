<?php
$this->breadcrumbs = array(
    'Account' => array('profile/updateprofile'),
    'Update Profile',
);
?>
<div class="col-md-7 col-sm-7">
    <?php if ($error) { ?><div class="error" id="error_msg"><?php echo $error; ?></div><?php } ?>
    <?php if ($success) { ?><div class="success" id="error_msg"><?php echo $success; ?></div><?php } ?>
    <form action="/profile/updateprofile" method="post" class="form-horizontal" onsubmit="return validation();">

        <fieldset>
            <legend>Update Profile</legend>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Sponsor ID</label>
                <div class="col-lg-8">
                    <input type="text" id="name" class="form-control" name="UserProfile[sponsor_id]" value="<?php echo (!empty($userObject)) ? $userObject->sponsor_id : ""; ?>" readonly="readonly">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Name</label>
                <div class="col-lg-8">
                    <input type="text" id="name" class="form-control" name="UserProfile[name]" value="<?php echo (!empty($userObject)) ? $userObject->name : ""; ?>" readonly="readonly">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Position</label>
                <div class="col-lg-8">
                    <input type="text" id="position" class="form-control" name="UserProfile[position]" value="<?php echo (!empty($userObject)) ? $userObject->position : ""; ?>" readonly="readonly">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Full Name<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="full_name" class="form-control" name="UserProfile[full_name]" value="<?php echo (!empty($userObject)) ? $userObject->full_name : ""; ?>" <?php if ($edit == 'no') { ?>readonly="readonly" <?php } ?> maxlength="30">
                    <div id="full_name_error" class="form_error"></div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Email<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="email" class="form-control" name="UserProfile[email]" value="<?php echo (!empty($userObject)) ? $userObject->email : ""; ?>" <?php if ($edit == 'no') { ?>readonly="readonly" <?php } ?> maxlength="30">
                <div id="email_error" class="form_error"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="country" class="col-lg-4 control-label">Country <span class="require">*</span></label>
                <div class="col-lg-8">
                    <select name="UserProfile[country_id]" id="country_id" onchange="getStateList(this.value)" class="form-control">
                        <option value="">Select Country</option>
                        <?php foreach ( $countryObject as  $country) { ?>
                        <option value="<?php echo $country->id; ?>" <?php echo ($country->id== $userObject->country_id)? "selected":""; ?> ><?php echo $country->name;?></option>
                        <?php } ?>
                    </select>
                </div>
                <span id="country_id_error"></span>
            </div>
            
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Phone<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" value="<?php echo (!empty($userObject)) ? $userObject->country_code : ""; ?>" readonly="readonly" style="width:20%;float:left;" class="form-control">&nbsp;&nbsp;
                    <input type="text" id="phone" class="form-control" name="UserProfile[phone]" value="<?php echo (!empty($userObject)) ? $userObject->phone : ""; ?>" <?php if ($edit == 'no') { ?>readonly="readonly" <?php } ?> style="width:75%;float:right;" maxlength="30">
                <div id="phone_error" class="form_error"></div>
                </div>
                
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Date of Birth<span class="require">*</span></label>
                <div class="col-lg-8">                  
                    <input type="text" id="date" data-provide="datepicker" name="UserProfile[date_of_birth]"  class="datepicker1 form-control" data-date-format="d-m-yyyy" value="<?php echo (!empty($userObject)) ? date("d-m-Y", strtotime($userObject->date_of_birth)) : ""; ?>">  
                <div id="date_error" class="form_error"></div>
                </div>

            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Skype ID</label>
                <div class="col-lg-8">
                    <input type="text" id="skype_id" class="form-control" name="UserProfile[skype_id]" value="<?php echo (!empty($userObject)) ? $userObject->skype_id : ""; ?>" maxlength="40">
                    <span class="example">Ex: example12</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Facebook ID</label>
                <div class="col-lg-8">
                    <input type="text" id="facebook_id" class="form-control" name="UserProfile[facebook_id]" value="<?php echo (!empty($userObject)) ? $userObject->facebook_id : ""; ?>" maxlength="40">
                    <span class="example">Ex: http://facebook.com</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Twitter ID</label>
                <div class="col-lg-8">
                    <input type="text" id="twitter_id" class="form-control" name="UserProfile[twitter_id]" value="<?php echo (!empty($userObject)) ? $userObject->twitter_id : ""; ?>" maxlength="40">
                    <span class="example">Ex: http://twitter.com</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Master Pin<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="master_pin" class="form-control" name="UserProfile[master_pin]">
                    <div id="master_pin_error" class="form_error"></div>
                </div>
                
            </div>

        </fieldset>

        <div class="row">
            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                <input type="submit" name="submit" value="Update" class="btn red">

            </div>
        </div>
    </form>
</div>



<script type="text/javascript">    
    
    function validation() {
       
        var email = requiredField('email', 'email_error', 'Please enter email');        
        if (email == false) {            
            return false;
        }
        
        var emailValid = isValidEmail('email','email_error',"Enter valid email!");
        if (emailValid == false) {            
            return false;
        }
        
        var phone = requiredField('phone', 'phone_error', 'Enter phone number');       
        if (phone == false) {            
            return false;
        }
        
        var phoneValid = numaricField('phone', 'phone_error', 'Enter valid phone number');       
        if (phoneValid == false) {            
            return false;
        }
        
        var email = requiredField('date', 'date_error', 'Please select date');        
        if (email == false) {            
            return false;
        }        
        
        var masterPin = requiredField('master_pin', 'master_pin_error', 'Enter master pin');       
        if (masterPin == false) {            
            return false;
        }        
    }
</script>

