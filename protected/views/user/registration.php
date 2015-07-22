<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/registration.js?ver=<?php echo strtotime("now");?>"></script>
<?php 

$curAction = @Yii::app()->getController()->getAction()->controller->action->id; 
 if($curAction != 'loginregistration'){ ?>
 <div class="main">
  <div class="container">
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40">
 <?php }?>
        <!-- BEGIN CONTENT -->
            <div class="col-md-6 col-sm-6">
                <h1>Create an account</h1>
                
                <?php if(isset($error) && !empty($error)){ ?> 
                <p class='error error-2'>
                    <i class='fa fa-times-circle icon-error'></i>
                    <span class='span-error-2'><?php echo $error; ?>
                    </span>
                </p>
 <?php }  ?>
                
                <div class="content-form-page">
                    <div class="row">
                       <div class="col-md-12 col-sm-12">
                            <form class="form-horizontal" role="form" method="post" action="/user/registration"  onsubmit="return validateFrm()">
                                <input type="hidden" id="nameExistedErrorFlag" name="nameExistedErrorFlag" value="0"/>
                                <input type="hidden" id="emailExistedErrorFlag" name="emailExistedErrorFlag" value="0"/>
                                <input type="hidden" id="sponsorIdExistedErrorFlag" name="sponsorIdExistedErrorFlag" value="0"/>
                                <input type="hidden" id="admin" name="admin" value="0"/>
                                <input type="hidden" name="social" value="<?php echo (!empty($social)) ? $social : '';?>"/>
                                <fieldset> 
                                    <legend>Your personal details</legend>
                                    <div class="form-group">
                                        <label for="firstname" class="col-lg-4 control-label">Sponsor Id <span class="require">*</span></label>
                                        <div class="col-lg-8">
                                           
                                            <div class="row">  
                                                <div class="col-lg-7">
                                            <input type="text" class="form-control" value="<?php echo(isset($spnId))?$spnId:""; ?>" name="sponsor_id" id="sponsor_id" onchange="isSponsorExisted()">
                                                </div>
                                                <div class="col-lg-5">
                                            <a href="javascript:void(0)" class="btn btn-default fright" onclick="getSponId();">Get Sponsor Id</a>
                                            
                                                </div>
                                        </div>
                                            <span id="sponsor_id_error" class="clrred"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="position" class="col-lg-4 control-label">Position <span class="require">*</span></label>
                                        <div class="col-lg-8">        
                                            <input type="radio" name="position" id="position" value="right" <?php if(!empty($_GET['position']) && $_GET['position'] =='right'){?> checked="checked" <?php }?> checked="checked"/>
                                            <label class="gender">Right</label>
                                            <input type="radio" name="position" id="position" value="left" <?php if(!empty($_GET['position'])  && $_GET['position'] =='left'){?> checked="checked" <?php }?>/>
                                            <label class="gender">Left</label>
                                        
                                        <span id="position_error" class="clrred"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="col-lg-4 control-label">User Name <span class="require">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" onchange="isUserExisted()" id="name" name="name" value="<?php echo isset($_POST['name'])?$_POST['name']:''; ?>">
                                            <span id="name_error" class="clrred"></span>
                                            <span id="name_available" class="clr green"></span>
                                        </div>
                             
                                        <div id="status"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="col-lg-4 control-label">Full Name <span class="require">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" value="<?php echo isset($_POST['full_name'])?$_POST['full_name']:''; ?>" id="full_name" name="full_name">
                                        
                                        <span id="full_name_error" class="clrred"></span></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="email" value="<?php echo isset($_POST['email'])?$_POST['email']:''; ?>" name="email" onchange="isEmailExisted()">
                                        
                                        <span id="email_error" class="clrred"></span></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="country" class="col-lg-4 control-label">Country <span class="require">*</span></label>
                                        <div class="col-lg-8">
                                            <select name="country_id" id="country_id" onchange="getCountryCode(this.value)" class="form-control">
                                                <option value="">Please Select Country</option>
                                                <?php foreach ( $countryObject as  $country) { ?>
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
                                                
                                            <input  name="phone" id="phone" maxlength="14" placeholder="phone number" class="form-control" value="<?php echo isset($_POST['phone'])?$_POST['phone']:''; ?>" > <br>
                                            </div>
                                            <span id="phone_error" class="clrred"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="phone" class="col-lg-4 control-label">Captcha<span class="require">*</span></label>
                                        <div class="col-lg-8">
                                            <script type="text/javascript">
                                                var RecaptchaOptions = {
                                                   theme : 'white'
                                                };
                                                </script>
                                            <?php
                                            // Get a key from https://www.google.com/recaptcha/admin/create
                                            $publickey = "6LcCIgkTAAAAANOtRjxKOfElrDy6BZQSKiYob3Xc";
                                            $privatekey = "6LcCIgkTAAAAANss_hcRD61AmYuXJ0JA2bot4R8C";

                                            # the response from reCAPTCHA
                                            $resp = null;
                                            # the error code from reCAPTCHA, if any
                                            $error = null;
                                            echo recaptcha_get_html($publickey, $error);
                                            ?>
                                            <span id="recaptcha_error" class="clrred"></span>
                                        </div>
                                    </div>
                                    
                                </fieldset>
                                <div class="row">
                                    <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                                        <button type="submit" class="btn btn-primary">Create an account</button>
                                        <!--<a href="/" type="button" class="btn btn-default">Cancel</a>-->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
            <?php  if($curAction != 'loginregistration'){ ?>
         </div>
    <!-- END SIDEBAR & CONTENT -->
  </div>
</div>

<?php }?>
<script type="text/javascript">
 function getSponId(){ 
//    $("#sponsor_id_error").html('');
    $("#sponsor_id").val("<?php echo Yii::app()->params['adminSpnId']; ?>");
    return false;
}
</script>
