<?php
$this->breadcrumbs = array(
    'Account' => array('profile/updateprofile'),
    'Address',
);

?>

 
<div class="col-md-6 col-sm-6">
    <div class="error" id="error_msg" style="display: none;"></div>
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
    <form action="/profile/address" method="post" class="form-horizontal" onsubmit="return validation();">
     
        <fieldset>
            <legend>Address</legend>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="firstname">Address <span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea id="address" name="UserProfile[address]" class="form-control" ><?php echo (!empty($profileObject)) ? $profileObject->address : "";?></textarea>
                    <div id="address_error" class="form_error"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="Street">Street<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="street" class="form-control" name="UserProfile[street]" value="<?php echo (!empty($profileObject)) ? $profileObject->street: "";?>">
                    <div id="street_error" class="form_error"></div>
                </div>
            </div>
            
             
            <div class="form-group">
                    <label for="country" class="col-lg-4 control-label">Country <span class="require">*</span></label>
                    <div class="col-lg-8">
                        <select name="UserProfile[country_id]" id="country_id" onchange="getStateList(this.value)" class="form-control">
                            <option value="">Select Country</option>
                            <?php foreach ( $countryObject as  $country) { ?>
                            <option value="<?php echo $country->id; ?>" <?php echo ($country->id== $profileObject->country_id)? "selected":""; ?> ><?php echo $country->name;?></option>
                            <?php } ?>
                        </select>
                        <span id="country_id_error" class="form_error"></span>
                    </div>
                    
                </div>

            <div class="form-group" id="stateList" >
                <label class="col-lg-4 control-label" for="State">State <span class="require">*</span></label>
                <div class="col-lg-8">
                   <input type="text" id="state_id" class="form-control" name="UserProfile[state_name]" value="<?php echo (!empty($profileObject)) ?  $profileObject->state_name : ""; ?>">
                   <div id="state_id_error" class="form_error"></div>
                </div>
            </div>
            
            <div class="form-group" id="cityList">
                <label class="col-lg-4 control-label" for="email">City <span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="city_id" class="form-control" name="UserProfile[city_name]" value="<?php echo (!empty($profileObject)) ?  $profileObject->city_name : ""; ?>">
                    <div id="city_id_error" class="form_error"></div>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="Zipcode">Zip Code<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="zip_code" class="form-control" name="UserProfile[zip_code]" value="<?php echo (!empty($profileObject)) ?  $profileObject->zip_code : ""; ?>">
                    <div id="zip_code_error" class="form_error"></div>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="MasterPin">Master Pin<span class="require">*</span></label>
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
    function validation()
    {
        var address = requiredField('address', 'address_error', 'Please enter address');        
        if (address == false) {            
            return false;
        }
        
        var street = requiredField('street', 'street_error', 'Enter street name');       
        if (street == false) {            
            return false;
        }
                
        var country = requiredField('country_id', 'country_id_error', 'Select Country');       
        if (country == false) {            
            return false;
        }        
        
        var state = requiredField('state_id', 'state_id_error', 'Please enter state');        
        if (state == false) {            
            return false;
        }
        
        var city = requiredField('city_id', 'city_id_error', 'Please enter city');        
        if (city == false) {            
            return false;
        }
        
        var zip = requiredField('zip_code', 'zip_code_error', 'Please enter zip code');        
        if (zip == false) {            
            return false;
        }
                
        var masterPin = requiredField('master_pin', 'master_pin_error', 'Enter master pin');       
        if (masterPin == false) {            
            return false;
        }         
    }
    </script>  