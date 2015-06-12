<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <div class="color-panel">
    <div class="color-mode-icons icon-color"><i class="fa fa-share-alt"></i></div>
    <div class="color-mode-icons icon-color-close"><i class="fa fa-share-alt"></i></div>
    <div class="color-mode">
     

      <ul class="inline">
         
        <li><a href=""><i class="fa fa-facebook-square"></i></a></li>
        <li><a href=""><i class="fa fa-twitter-square"></i></a></li>
        <li><a href=""><i class="fa fa-skype"></i></a></li>
        <li><a href=""><i class="fa fa-linkedin-square"></i></a></li>
        <li><a href=""><i class="fa fa-youtube-square"></i></a></li>
         <li><a href=""><i class="fa fa-whatsapp"></i></a></li>
      </ul>
      
    </div>
  </div>
  <!-- END BEGIN STYLE CUSTOMIZER -->
  <!-- Header BEGIN -->
  <div class="header header-mobi-ext">
    <div class="container">
        <!-----sub-header------>
        
        <div class="row pre-header ">
        <div class="container">
          <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info col-xs-12">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>+1 456 6717</span></li>

                        <li style="border: none;"><i class="fa fa-envelope-o"></i><span>info@mglobally.com</span></li>
                        <li style="border: none;"><a href="callto://ramhemareddy"><button id="checkout" class="btn btn-primary">Call Us</button><a/></li>

                    </ul>
              </div>
            <div class="col-md-6 col-sm-6 additional-nav col-xs-12">
                    <ul class="list-unstyled list-inline pull-right">
                       <?php 
if(Yii::app()->session['adminID']!= '1'){ 
if(isset(Yii::app()->session) && Yii::app()->session['userid']!=''){ ?>
                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/profile/dashboard">My Account</a></li>
                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/site/logout">Logout</a></li>
                    <?php }else{?>
                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/user/login">Log In</a></li>
                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/user/registration">Registration</a></li>
                    <?php }}?>
                    </ul>
                </div>
            </div>
        </div>        
    </div>
        
        
        
        
        <!-----sub header ends---->
        
        
        
        
      <div class="row header-index">
        <!-- Logo BEGIN -->
        <div class="col-md-2 col-sm-2">
          <a class="scroll site-logo" href="#promo-block"><img class="img-responsive "src="../../../images/logo/logo.png" width="140px" ></a>
        </div>
        <!-- Logo END -->
        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
        <!-- Navigation BEGIN -->
        <div class="col-md-10 pull-right">
          <ul class="header-navigation">
            <li class="current"><a href="#promo-block">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#team">Team</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
           
            <li><a href="#benefits">Benefits</a></li>
            <li><a href="#prices">Pricing</a></li>
            <li><a href="#contact">Contact</a></li>
             <li><a href="#">FAQ</a></li>
            <!----<li><a href="user/login">Login</a></li>
            <li><a href="user/registration">Registration</a></li>----->
          </ul>
        </div>
        <!-- Navigation END -->
      </div>
    </div>
  </div>
  