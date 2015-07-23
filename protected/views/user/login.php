

<?php $curAction = @Yii::app()->getController()->getAction()->controller->action->id; 
 if($curAction != 'loginregistration'){ ?>
 <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<div class="main">
  <div class="container">
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40">
       
 
 <?php }?>
 <?php if(Yii::app()->session['adminID']==1){ ?>
       <div class="error">User already loggedIn. Please try in other browser.</div>     
       <?php }else{ ?>
            
        
      <!-- BEGIN CONTENT -->
                <div class="col-md-6 col-sm-6">
        <?php 
        if(!empty($_GET['successMsg'])){
            echo "<p class='success success-new'>"."<i class='fa fa-check-circle icon-success'></i>"."<span class='span-success'>".$_GET['successMsg']."<span class='second-line'><br>User Name and Passsword has been sent to your mail ID</span>"."</span>"."</p>";
        }
        if(!empty($_GET['errorMsg'])){
            echo "<p class='error error-2'>"."<i class='fa fa-times-circle icon-error'></i>"."<span class='span-error-2'>".$_GET['errorMsg']."</span>"."</p>";
        }
        
        if(!empty($msg)){ echo $msg; }
        
        if (array_key_exists("login", $_GET)) {
            $oauth_provider = $_GET['oauth_provider'];
            if ($oauth_provider == 'twitter') {
                header("Location: login-twitter.php");
            } else if ($oauth_provider == 'facebook') {
                header("Location: login-facebook.php");
            }
        }
        
        
        
        ?>
   
                
        <h1>Login</h1>
        <div class="content-form-page">
          <div class="row">
                            <div class="col-md-12 col-sm-12">
                <form class="form-horizontal form-without-legend" method="post" name="LoginForm" id=LoginForm" role="form" onsubmit="return validateForm()" action="/user/login">
                <div class="form-group">
                  <label for="email" class="col-lg-4 control-label">User Name <span class="require">*</span></label>
                  <div class="col-lg-8">

                      <input type="text" class="form-control " id="login-name" name="name">
                  
                  <span id="login_name_error" class="clrred"></span></div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
                  <div class="col-lg-8">

                      <input type="password" class="form-control" id="login-password" name="password">
                  
                  <span id="password_error" class="clrred"></span></div>
                </div>

                 <div class="form-group">
                  <label for="masterkey" class="col-lg-4 control-label">Master Pin <span class="require">*</span></label>
                  <div class="col-lg-8">
                      <input type="password" class="form-control" id="masterkey" name="masterkey">
                  
                  <span id="masterkey_error" class="clrred"></span></div>
                </div>   

                <div class="row">
                  <div class="col-lg-8 col-md-offset-4 padding-left-0">
                    <a href="<?php echo Yii::app()->getBaseUrl(true); ?>/user/forgetpassword">Forgot Password?</a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                    <button type="submit" class="btn btn-primary">Login</button>
                  </div>
                </div>
                <div class="row">
                <!--  <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-10 padding-right-30">
                    <hr>
                    <div class="login-socio">
                        <p class="text-muted">or login using:</p>
                        <ul class="social-icons">
                            <li><a href="javascript:;" data-original-title="facebook" class="facebook" title="facebook"></a></li>
                            <li><a href="javascript:;" data-original-title="Twitter" class="twitter" title="Twitter"></a></li>
                            <li><a href="javascript:;" data-original-title="Google Plus" class="googleplus" title="Google Plus"></a></li>
                            <li><a href="javascript:;" data-original-title="Linkedin" class="linkedin" title="LinkedIn"></a></li>
                        </ul>
                    </div>-->
                  </div>
                </div>
              </form>
            </div>
           <?php if($curAction == 'loginregistration'){?>
              <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-10 col-xs-12">
              <a class="fb-btn" href="<?php echo Yii::app()->baseUrl;?>/user/facebook"><?php echo Yii::app()->baseUrl; ?>Log in With Facebook</a>        
              </div>
              <br><br/>
               <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-10 col-xs-12">
            <a class="tw-btn" href="<?php echo Yii::app()->baseUrl; ?>/user/twitter"><?php echo Yii::app()->baseUrl; ?>Log in With Twitter</a>        
               </div>
           <?php }?>
            <!--
        
        <button  class="btn-social btn-fb">Sign in with Facebook</button> 
        <button  class="btn-social btn-tw">Sign in with twitter</button> 
        -->
          </div>
        </div>
       <?php }?>
      <?php if(Yii::app()->session['adminID']!=1){?>
      <?php if($curAction == 'login'){?>
      <div class="col-md-6 col-sm-6">
          <div class="clear80"></div>
          <div class="col-sm-12 col-xs-12 tcenter pad10">
              <a class="fb-btn" href="<?php echo Yii::app()->baseUrl;?>/user/facebook"><?php echo Yii::app()->baseUrl; ?>Log in With Facebook</a>        
              </div>
          <hr>
               <div class="col-sm-12 col-xs-12 tcenter pad10">
            <a class="tw-btn" href="<?php echo Yii::app()->baseUrl; ?>/user/twitter"><?php echo Yii::app()->baseUrl; ?>Log in With Twitter</a>        
               </div>
         
      </div>
      <?php } }?>
      </div>
      <!-- END CONTENT -->
      <?php if($curAction != 'loginregistration'){ ?>
   </div>
    <!-- END SIDEBAR & CONTENT -->
  </div>
</div>
      <?php }?>
<script>
 function validateForm() {
    $("#login_name_error").html("");
    if ($("#login-name").val() == "") {
      $("#login_name_error").html("Enter User Name");
      $("#login-name").focus();            
      return false;
    }
       
    $("#password_error").html("");
    if ($("#login-password").val() == "") {
        $("#password_error").html("Enter Password");
        $("#login-password").focus();
        return false;
    } 
    
    $("#masterkey_error").html("");
    if ($("#masterkey").val() == "") {
        $("#masterkey_error").html("Enter Master Key");
        $("#masterkey").focus();
        return false;
    } 
    
 }        
</script>