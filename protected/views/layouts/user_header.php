<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?php  $curController = @Yii::app()->controller->id;
      $curAction = @Yii::app()->getController()->getAction()->controller->action->id;
?>
<!-- BEGIN TOP BAR -->

<div class="pre-header">
    <div class="container">
        <div class="row">
          

 
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info col-xs-12">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span>+91 1234567890</span></li>
                    <li><i class="fa fa-envelope-o"></i><span>maverickinfosoft@gmail.com</span></li>
                    <li><a href="callto://ramhemareddy"><button id="checkout" class="btn btn-primary">Click Here</button></a></li>
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-6 col-sm-6 additional-nav col-xs-12">
                <ul class="list-unstyled list-inline pull-right">
                    <?php if(isset(Yii::app()->session) && Yii::app()->session['userid']!=''){ ?>
                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/profile/dashboard">My Account</a></li>
                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/site/logout">Logout</a></li>
                    <?php }else{?>
                    <?php if($curAction !='loginregistration'){ ?>
                    <?php if($curAction=='registration'){ ?>
                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/user/login">Log In</a></li>
                    <?php }elseif($curAction=='login'){?>
                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/user/registration">Registration</a></li>
                    <?php }else{?>
                    
                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/user/login">Log In</a></li>
                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/user/registration">Registration</a></li>
                    <?php }?>
                    <?php }
                    
                    }?>
                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>        
</div>
<!-- END TOP BAR -->

<!-- BEGIN HEADER -->
<div class="header">
    <div class="container">
        <a class="site-logo" href="/#about"><img class="img-responsive "src="../../../images/logo/logo.png" width="170px" ></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-right font-transform-inherit">
            <ul>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="/">Home </a>
                </li>
                <li class="dropdown dropdown-megamenu">
                    <a class="dropdown-toggle" href="/#about">About </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="/#services"> Services  </a>

                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="/#team">Media centre </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="javascript:;"> Templates </a>
                </li>
                <li class="dropdown">
                    <a href="/#benefits" class="dropdown-toggle" >Benefits</a>
                </li>
                <!--<li><a href="#" target="_blank">Packages</a></li>-->
                <li><a href="/#contact" target="_blank">support centre</a></li>
               

                <!-- BEGIN TOP SEARCH 
                <li class="menu-search">
                    <span class="sep"></span>
                    <i class="fa fa-search search-btn"></i>
                    <div class="search-box">
                        <form action="#">
                            <div class="input-group">
                                <input type="text" placeholder="Search" class="form-control">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div> 
                </li>-->
                <!-- END TOP SEARCH -->
            </ul>
        </div>
        <!-- END NAVIGATION -->
    </div>
</div>
<!-- Header END -->