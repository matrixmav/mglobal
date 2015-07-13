<?php
$this->breadcrumbs = array(
    'News Add',
);
?>
<div class="col-md-7 col-sm-7">
    <?php if ($error) { ?><div class="error"><?php echo $error; ?></div><?php } ?>
    <?php if ($success) { ?><div class="success"><?php echo $success; ?></div><?php } ?>


    <form action="" method="post" class="form-horizontal" onsubmit="return validateFrm();">

        <fieldset>
            <legend>Add User</legend>
            <input type="hidden" id="admin" name="admin" value="1">
            <input type="hidden" id="social" name="social" value="">
            <div class="form-group">
                <label for="firstname" class="col-lg-4 control-label">Sponsor Id <span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" value="<?php echo (isset($spnId)) ? $spnId : ""; ?>" name="sponsor_id" id="sponsor_id" onchange="isSponsorExisted()">
                    <a href="javascript:void(0)" class="btn btn-default" onclick="getSponId();">Get Sponsor Id</a>
                    <span id="sponsor_id_error" class="clrred"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="position" class="col-lg-4 control-label">Position <span class="require">*</span></label>
                <div class="col-lg-8">        
                    <input type="radio" name="position" id="position" value="right" checked style="margin-left:0px;"/>
                    <label class="gender">Right</label>
                    <input type="radio" name="position" id="position" value="left" style="margin-left: 0px;"/>
                    <label class="gender">Left</label>

                    <span id="position_error" class="clrred"></span></div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-lg-4 control-label">User Name <span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" onchange="isUserExisted()" id="name" name="name">
                    <span id="name_error" class="clrred"></span>
                </div>

                <div id="status"></div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-lg-4 control-label">Full Name <span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="full_name" name="full_name">

                    <span id="full_name_error" class="clrred"></span></div>
            </div>
            <div class="form-group">
                <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="email" name="email" onchange="isEmailExisted()">

                    <span id="email_error" class="clrred"></span></div>
            </div>

            <div class="form-group">
                <label for="country" class="col-lg-4 control-label">Country <span class="require">*</span></label>
                <div class="col-lg-8">
                    <select name="country_id" id="country_id" onchange="getCountryCode(this.value)" class="form-control">
                        <option value="">Please Select Country</option>
                        <?php foreach ($countryObject as $country) { ?>
                            <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                        <?php } ?>
                    </select>

                    <span id="country_id_error" class="clrred"></span></div>
            </div>
            
            
            <div class="form-group">
                <label for="phone" class="col-lg-4 control-label">Mobile phone <span class="require">*</span></label>
                <div class="col-lg-8">
                    <div class="row">
                    <div class="col-lg-3 col-sm-3 col-xs-4">
                        <input  name="country_code" id="country_code" class="form-control" readonly="true"  >                                            </div>
                    <div class="col-lg-9 colo-sm-9 col-xs-8">

                    <input  name="phone" id="phone" maxlength="12" placeholder="phone number" class="form-control" value="<?php echo isset($_POST['phone'])?$_POST['phone']:''; ?>" > <br>
                    </div>
                <span id="phone_error" class="clrred"></span></div>
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
</script>    
