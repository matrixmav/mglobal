<!-- BEGIN STYLE CUSTOMIZER --
  <div class="color-panel">
    <div class="color-mode-icons icon-color"></div>
    <div class="color-mode-icons icon-color-close"></div>
    <div class="color-mode">
      <p>THEME COLOR</p>
      <ul class="inline">
        <li class="color-red current color-default" data-style="red"></li>
        <li class="color-blue" data-style="blue"></li>
        <li class="color-green" data-style="green"></li>
        <li class="color-orange" data-style="orange"></li>
        <li class="color-gray" data-style="gray"></li>
        <li class="color-turquoise" data-style="turquoise"></li>
      </ul>
      <p>MENU POSITION</p>
      <select class="form-control menu-pos">
        <option value="bottom">Bottom</option>
        <option value="top">Top</option>
      </select>
    </div>
  </div>
  <!-- END BEGIN STYLE CUSTOMIZER -->
  <!-- Header BEGIN -->
  <div class="header header-mobi-ext">
    <div class="container">
        <!-----sub-header------>
        
        <div class="pre-header">
        <div class="container">
          <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>+1 456 6717</span></li>

                        <li><i class="fa fa-envelope-o"></i><span>info@mglobally.com</span></li>
                        <li><a href="callto://ramhemareddy"><button id="checkout" class="btn-flat-green btn-orange btn-h">Call Us</button><a/></li>

                    </ul>
              </div>
            <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                       <?php if(isset(Yii::app()->session) && Yii::app()->session['userid']!=''){ ?>
                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/profile/dashboard">My Account</a></li>
                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/site/logout">Logout</a></li>
                    <?php }else{?>
                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/user/login">Log In</a></li>
                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/user/registration">Registration</a></li>
                    <?php }?>
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
  