<?php
$this->breadcrumbs = array(
    'Account' => array('profile/updateprofile'),
    'Update Profile',
);
?>
<div class="col-md-6 col-sm-6">
    <?php if ($error) { ?><div class="error" id="error_msg"><?php echo $error; ?></div><?php } ?>
    <?php if ($success) { ?><div class="success" id="error_msg"><?php echo $success; ?></div><?php } ?>
    <div class="portlet box orange ">
    <div class="portlet-title">
							<div class="caption">
								Update Profile
							</div>
    </div>
    <div class="portlet-body form">
    <form action="/profile/updateprofile" method="post" class="form-horizontal" onsubmit="return profileValidation();">

        <fieldset>
            <div class="form-body">
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Sponsor ID</label>
                <div class="col-lg-7">
                    <input type="text" id="name" class="form-control" name="UserProfile[sponsor_id]" value="<?php echo (!empty($userObject)) ? $userObject->sponsor_id : ""; ?>" readonly="readonly">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Name</label>
                <div class="col-lg-7">
                    <input type="text" id="name" class="form-control" name="UserProfile[name]" value="<?php echo (!empty($userObject)) ? $userObject->name : ""; ?>" readonly="readonly">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Position</label>
                <div class="col-lg-7">
                    <input type="text" id="position" class="form-control" name="UserProfile[position]" value="<?php echo (!empty($userObject)) ? $userObject->position : ""; ?>" readonly="readonly">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Full Name<span class="require">*</span></label>
                <div class="col-lg-7">
                    <input type="text" id="full_name" class="form-control" name="UserProfile[full_name]" value="<?php echo (!empty($userObject)) ? $userObject->full_name : ""; ?>" <?php if ($edit == 'no') { ?>readonly="readonly" <?php } ?> maxlength="30">
                    <div id="full_name_error" class="form_error"></div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Email<span class="require">*</span></label>
                <div class="col-lg-7">
                    <input type="text" id="email" class="form-control" name="UserProfile[email]" value="<?php echo (!empty($userObject)) ? $userObject->email : ""; ?>" <?php if ($edit == 'no') { ?>readonly="readonly" <?php } ?> maxlength="30">
                <div id="email_error" class="form_error"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="country" class="col-lg-4 control-label">Country <span class="require">*</span></label>
                <div class="col-lg-7">
                    <select name="UserProfile[country_id]" id="country_id" class="form-control" onchange="getCountryCode(this.value);">
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
                <div class="col-lg-7">
                    <input type="text" value="<?php echo (!empty($userObject)) ? $userObject->country_code : ""; ?>" readonly="readonly" style="width:20%;float:left;" class="form-control" name="UserProfile[country_code]" id="country_code">&nbsp;&nbsp;
                    <input type="text" id="phone" class="form-control" name="UserProfile[phone]" value="<?php echo (!empty($userObject)) ? $userObject->phone : ""; ?>" <?php if ($edit == 'no') { ?>readonly="readonly" <?php } ?> style="width:75%;float:right;" maxlength="30">
                <div id="phone_error" class="form_error"></div>
                </div>
                
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Date of Birth<span class="require">*</span></label>
                <div class="col-lg-7">                  
                    <input type="text" id="date"   name="UserProfile[date_of_birth]"  class="datepicker form-control"  value="<?php echo (!empty($userObject)) ? date("d-m-Y", strtotime($userObject->date_of_birth)) : ""; ?>">  
                <div id="date_error" class="form_error"></div>
                </div>

            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Skype ID</label>
                <div class="col-lg-7">
                    <input type="text" id="skype_id" class="form-control" name="UserProfile[skype_id]" value="<?php echo (!empty($userObject)) ? $userObject->skype_id : ""; ?>" maxlength="40">
                    <span class="example">Ex: example12</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Facebook ID</label>
                <div class="col-lg-7">
                    <input type="text" id="facebook_id" class="form-control" name="UserProfile[facebook_id]" value="<?php echo (!empty($userObject)) ? $userObject->facebook_id : ""; ?>" maxlength="40">
                    <span class="example">Ex: http://facebook.com</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Twitter ID</label>
                <div class="col-lg-7">
                    <input type="text" id="twitter_id" class="form-control" name="UserProfile[twitter_id]" value="<?php echo (!empty($userObject)) ? $userObject->twitter_id : ""; ?>" maxlength="40">
                    <span class="example">Ex: http://twitter.com</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Master Pin<span class="require">*</span></label>
                <div class="col-lg-7">
                    <input type="password" id="master_pin" class="form-control" name="UserProfile[master_pin]">
                    <div id="masterprofile_pin_error" class="form_error"></div>
                </div>
                
            </div>
            </div>
        </fieldset>
        <div class="form-actions right">                     
                <input type="submit" name="submit" value="Update" class="btn orange">
                 
            </div>
        
    </form>
</div>
    </div>
</div>

<div class="col-sm-6 col-md-6">
 
    <div class="error" id="error_msg" style="display: none;"></div>
     <?php if(!empty($_GET['errorMsg'])){?><div class="error" id="error_msg"><?php echo $_GET['errorMsg'];?></div><?php }?>
    <?php if(!empty($_GET['successMsg'])) {?><div class="success" id="error_msg"><?php echo $_GET['successMsg'];?></div><?php }?>
    <div class="portlet box orange ">
    <div class="portlet-title">
							<div class="caption">
								Address
							</div>
    </div>
    <div class="portlet-body form">
    <form action="/profile/address" method="post" class="form-horizontal" onsubmit="return addressValidation();">
     
        <fieldset>
             <div class="form-body">
            <div class="form-group">
                <label class="col-lg-4 control-label" for="firstname">Address <span class="require">*</span></label>
                <div class="col-lg-7">
                    <textarea id="address" name="UserProfile[address]" class="form-control" ><?php echo (!empty($profileAddressObject)) ? $profileAddressObject->address : "";?></textarea>
                    <div id="address_error" class="form_error"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="Street">Street<span class="require">*</span></label>
                <div class="col-lg-7">
                    <input type="text" id="street" class="form-control" name="UserProfile[street]" value="<?php echo (!empty($profileAddressObject)) ? $profileAddressObject->street: "";?>">
                    <div id="street_error" class="form_error"></div>
                </div>
            </div>
            <div class="form-group" id="stateList" >
                <label class="col-lg-4 control-label" for="State">State <span class="require">*</span></label>
                <div class="col-lg-7">
                   <input type="text" id="state_id" class="form-control" name="UserProfile[state_name]" value="<?php echo (!empty($profileAddressObject)) ?  $profileAddressObject->state_name : ""; ?>">
                   <div id="state_id_error" class="form_error"></div>
                </div>
            </div>
            
            <div class="form-group" id="cityList">
                <label class="col-lg-4 control-label" for="email">City <span class="require">*</span></label>
                <div class="col-lg-7">
                    <input type="text" id="city_id" class="form-control" name="UserProfile[city_name]" value="<?php echo (!empty($profileAddressObject)) ?  $profileAddressObject->city_name : ""; ?>">
                    <div id="city_id_error" class="form_error"></div>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="Zipcode">Zip Code<span class="require">*</span></label>
                <div class="col-lg-7">
                    <input type="text" id="zip_code" class="form-control" name="UserProfile[zip_code]" value="<?php echo (!empty($profileAddressObject)) ?  $profileAddressObject->zip_code : ""; ?>">
                    <div id="zip_code_error" class="form_error"></div>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="MasterPin">Master Pin<span class="require">*</span></label>
                <div class="col-lg-7">
                    <input type="password" id="master_pin1" class="form-control" name="UserProfile[master_pin]">
                    <div id="master_pin_error" class="form_error"></div>
                </div>
            </div>
             </div>
        </fieldset>

        <div class="form-actions right">                     
                <input type="submit" name="submit" value="Update" class="btn orange">
                 
            </div>
    
    </form>
</div>
    </div>
</div>



<script type="text/javascript">    
  $(document).ready(function() {
                $('.datepicker').datepicker({
                    dateFormat: 'dd/mm/yyyy',
                    maxDate:"+2Y"
                });
            });
         
</script>

