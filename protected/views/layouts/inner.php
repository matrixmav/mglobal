<?php
$curController = @Yii::app()->controller->id;
$curAction = @Yii::app()->getController()->getAction()->controller->action->id;
$curControllerLower = strtolower($curController);
$curActionLower = strtolower($curAction);

$curControllerDisplay = $curController;
$curActionDisplay = $curAction;
if ($curControllerLower == 'user') {
    $curControllerDisplay = 'Alert';
}

if ($curActionLower == 'index') {
    $curActionDisplay = 'Listing';
}
$access = Yii::app()->user->getState('access');
$menusections = ''; //BaseClass::getmenusections ( Yii::app ()->user->getState ( 'username' ) );
$adImg = ''; //BaseClass::getadminImg ( Yii::app ()->user->getState ( 'username' ) );
$menusections ['psections'] = array(6, 7, 8, 9, 33, 4, 5);
$baseURL = "http://localhost";
?>

<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 2.0.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>MGlobal | User Profile</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link
            href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all"
            rel="stylesheet" type="text/css" />
        <link
            href="/metronic/assets/plugins/font-awesome/css/font-awesome.min.css"
            rel="stylesheet" type="text/css" />
        <link href="/metronic/assets/plugins/bootstrap/css/bootstrap.min.css"
              rel="stylesheet" type="text/css" />
        <link href="/metronic/assets/plugins/uniform/css/uniform.default.css"
              rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="/metronic/assets/css/style-metronic.css" rel="stylesheet"
              type="text/css" />
        <link href="/metronic/assets/css/style.css" rel="stylesheet"
              type="text/css" />
        <link href="/metronic/assets/css/style-responsive.css" rel="stylesheet"
              type="text/css" />
        <link href="/metronic/assets/css/plugins.css" rel="stylesheet"
              type="text/css" />
        <link href="/metronic/assets/css/themes/default.css" rel="stylesheet"
              type="text/css" id="style_color" />
        <link href="/metronic/assets/css/custom.css" rel="stylesheet"
              type="text/css" />
        <link href="/metronic/custom/custom.css" rel="stylesheet"
              type="text/css" />


        <link href="/metronic/custom/custom-pagination.css" rel="stylesheet"
              type="text/css" />

        <link href="/metronic/assets/css/component.css" rel="stylesheet"
              type="text/css" />

        <link href="/metronic/assets/css/layout.css" rel="stylesheet"
              type="text/css" />

        <link href="/metronic/assets/plugins/uniform/uniform.default.css" rel="stylesheet"
              type="text/css" />
        <!-- END THEME STYLES -->
        <link rel="stylesheet" type="text/css"
              href="/metronic/assets/plugins/jquery-notific8/jquery.notific8.min.css" />


        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
           <script src="/metronic/assets/plugins/respond.min.js"></script>
           <script src="/metronic/assets/plugins/excanvas.min.js"></script> 
           <![endif]-->
        <script src="/metronic/assets/plugins/jquery-1.10.2.min.js"
        type="text/javascript"></script>
        <script src="/js/jquery.ba-bbq.js" type="text/javascript"></script>
        <script src="/metronic/assets/plugins/jquery-migrate-1.2.1.min.js"
        type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script
            src="/metronic/assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js"
        type="text/javascript"></script>
        <script src="/metronic/assets/plugins/bootstrap/js/bootstrap.min.js"
        type="text/javascript"></script>
        <script
            src="/metronic/assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
        type="text/javascript"></script>
        <script
            src="/metronic/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
        type="text/javascript"></script>
        <script src="/metronic/assets/plugins/jquery.blockui.min.js"
        type="text/javascript"></script>
        <script src="/metronic/assets/plugins/jquery.cokie.min.js"
        type="text/javascript"></script>
        <script src="/metronic/assets/plugins/uniform/jquery.uniform.min.js"
        type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <script type="text/javascript" src="/metronic/assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
        <script type="text/javascript" src="/metronic/assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
        <script
        src="/metronic/assets/plugins/jquery-notific8/jquery.notific8.min.js"></script>
        <script src="/metronic/assets/plugins/bootbox/bootbox.min.js"
        type="text/javascript"></script>

        <script src="/metronic/assets/plugins/bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script src="/metronic/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <link href="/metronic/assets/plugins/bootstrap-datepicker/datepicker.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo Yii::app()->baseUrl . '/ckeditor/ckeditor.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl . '/ckfinder/ckfinder.js'; ?>"></script>
        <script src="/metronic/assets/scripts/core/app.js"></script>
        <script type="text/javascript" src="/chat/js/chat.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                App.init();
                //checkLoginTime();
                var IDSVal = document.getElementById('username').value;
                chatWith(IDSVal);
            });
            $(".single_2").fancybox({
                openEffect: 'elastic',
                closeEffect: 'elastic',
                helpers: {
                    title: {
                        type: 'inside'
                    }
                }
            });

            
             
           function openChat()
           {
             var IDSVal = document.getElementById('username').value;
             chatWith(IDSVal);  
           }
        </script>


        <link type="text/css" rel="stylesheet" media="all" href="/chat/css/chat.css" />

        <!-- END JAVASCRIPTS -->


        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed">
        <?php //var_dump($_SESSION); exit;?>
        <input type="hidden" id="username" value="mGlobaly">
        <!-- BEGIN HEADER -->
        <div class="header navbar navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="header-inner">
                <span class="home-link"><a href="<?php echo Yii::app()->getBaseUrl(true); ?>" target="_blank">Home</a></span>
                <!-- BEGIN LOGO -->
                <?php /* <a class="navbar-brand" href="/admin/">
                  <?php
                  $access = Yii::app()->user->getState('access');
                  if ($access == "manager") {
                  ?>
                  <img src="#" alt="logo"
                  class="img-responsive" />
                  <?php } else { ?>
                  <img src="#" alt="logo"
                  class="img-responsive" />
                  <?php } ?>
                  </a> */ ?>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="navbar-toggle" data-toggle="collapse"
                   data-target=".navbar-collapse"> <img
                        src="/metronic/assets/img/menu-toggler.png" alt="" />
                </a>

                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <ul class="nav navbar-nav pull-right topWallet">
                    <li class="credit"><a href="#" class="">
                            <i class="fa fa-credit-card"></i>

                            <span class="badge badge-default">
                                <?php
                                $arrayRP = BaseClass::walletAmount('2');
                                foreach ($arrayRP as $RP) {
                                    
                                }
                                echo (!empty($arrayRP)) ? number_format($RP->fund, 2) : "0.00";
                                ?>
                            </span>
                        </a>
                    </li>
                    <li class="cash"><a href="#" class="">
                            <i class="fa fa-money"></i>

                            <span class="badge badge-default">
                                <?php
                                $arrayRP = BaseClass::walletAmount('2');
                                foreach ($arrayRP as $RP) {
                                    
                                }
                                echo (!empty($arrayRP)) ? "<h4>" . number_format($RP->fund, 2) . "</h4>" : "0.00";
                                ?>
                            </span>
                        </a>
                    </li>
                    <li class="commision"><a href="#" class="">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            <span class="badge badge-default">
                                <?php
                                $arrayFund = BaseClass::walletAmount('1');
                                foreach ($arrayFund as $fund) {
                                    
                                }
                                echo (!empty($arrayFund)) ? $fund->fund : "0.00";
                                ?>
                            </span></a>
                    </li>
                    <li></li>
                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="/wallet/fundwallet" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" title="Fund Wallet">
                            <i class="glyphicon glyphicon-envelope"></i>
                            <span class="badge badge-default">
                                <?php
                                $userId = Yii::app()->session['userid'];
                                $mailCount = BaseClass::getUnredMails($userId);
                                if (!empty($mailCount)) {
                                    echo $mailCount;
                                } else {
                                    echo "0";
                                }
                                ?></span>
                        </a>
                    </li>



                    <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                        <a href="/wallet/commisionwallet" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" title="Commision Wallet">
                            <i class="glyphicon glyphicon-th"></i>
                            <span class="badge badge-default">
                                <?php
                                $arrayCommision = BaseClass::walletAmount('3');
                                foreach ($arrayCommision as $commision) {
                                    
                                }
                                echo (!empty($arrayCommision)) ? $commision->fund : "0";
                                ?></span>
                        </a>


                    </li>
                    <!--                    <li> <a class="dropdown-toggle single_2" href="/buildtemp/managewebsite" target="_blank">Preview</li>-->

                    <!-- BEGIN NOTIFICATION DROPDOWN -->

                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN INBOX DROPDOWN -->

                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->

                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown user">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true"> <span class="username">
                                   <?php
                                   $userObject = User::model()->findByPk(Yii::app()->session['userid']);
                                   if ($userObject) {
                                       echo $userObject->full_name;
                                   }
                                   ?>
                            </span> <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- <li>
                            <a href="javascript:void(0);">
                                    <i class="fa fa-user"></i> My Profile
                            </a>
                    </li> -->
                            <li>
                                <?php if ($access == "manager") { ?>
                                    <a href="/admin/default/managerlogout"> <i class="fa fa-key"></i>
                                        Log Out
                                    </a>
<?php } else { ?>
                                    <a href="/site/logout"> <i class="fa fa-key"></i> Log Out
                                    </a>
<?php } ?> 
                            </li>
                        </ul></li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>

                <!--                <div class="pull-right inlineBlock"
                                     style="text-align: center; color: #ff0; margin-top: 2px; margin-left: 6px;">
                                    <img
                                        src="<?php echo Yii::app()->request->baseUrl . "/images/admin/"; ?>"><br />Admin
                                </div>-->

                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <div class="clearfix"></div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul class="page-sidebar-menu" data-auto-scroll="true"
                        data-slide-speed="200">
                        <li class="sidebar-toggler-wrapper">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler hidden-phone"></div> <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        </li>

                        <?php
                        if ($access != "manager") {

                            $hotel_pmenu = 6;

                            if ((in_array($hotel_pmenu, $menusections ['psections'])) || (in_array($hotel_pmenu, $menusections ['section_ids']))) {
                                $hotel_subsection = array(
                                    "profile/dashboard" => "Dashboard",
//                                    "profile/summery" => "Summery",
                                );
                                $activecls = 'active';
                                if ($curAction == "dashboard") {
                                    $activecls = 'active';
                                } else {
                                    $activecls = '';
                                }
                                if ($curAction == 'dashboard')
                                    $activecls = 'active';
                                if ($curActionLower == 'simplename')
                                    $activecls = '';
                                ?>
                                <li class="<?php echo $activecls; ?>"><a href="javascript:;"> <span
                                            class="leftmenu-hotel"></span> <span class="title">Dashboard</span>
                                        <span class="selected"></span> <span
                                            class="arrow <?php echo ($curAction == 'dashboard') ? "open" : ''; ?>">
                                        </span>
                                    </a>
                                    <?php
                                    $menusections ['sections'] = $hotel_subsection;
                                    echo '<ul class="sub-menu">';
                                    foreach ($hotel_subsection as $hotName => $hotTitle) {
                                        if (in_array($hotTitle, $menusections ['sections'])) {
                                            if ($hotName == 'admin') {
                                                $hotName = '/index';
                                            }
                                            if ($curActionLower == 'create') {
                                                $curActionLower = 'create/type/details';
                                            }
                                            $class_content = ($curControllerLower . "/" . $curActionLower == $hotName) ? 'class="active"' : '';
                                            echo '<li ' . $class_content . '>';
                                            echo '<a href="/' . $hotName . '">' . Yii::t('translation', $hotTitle) . '</a>';
                                            echo '</li>';
                                            if ($hotName == 'admin/index') {
                                                $hotName = 'admin';
                                            }

                                            /*
                                             * if($hotName == "admin")
                                             * echo '</ul>';
                                             */
                                        }
                                    }
                                    echo '</ul>';
                                    ?>					
                                </li>	
                                <?php
                            }
                            if ((in_array($hotel_pmenu, $menusections ['psections'])) || (in_array($hotel_pmenu, $menusections ['section_ids']))) {
                                $hotel_subsection = array(
                                    "order/list" => "My Order",
                                    "profile/changepassword" => "Change Password",
                                    "profile/updateprofile" => "Profile",
                                    "profile/address" => "Address",
                                    "profile/documentverification" => "Verification",
                                    "profile/testimonial" => "Testimonial",
                                    "genealogy" => "Genealogy",
//                                    "profile/summery" => "Summery",
                                );
                                $activecls = 'active';
                                if ($curControllerLower == "profile" && $curAction != 'dashboard' || $curControllerLower == "genealogy" || $curControllerLower == "order" && $curActionLower!='checkinvestment' && $curControllerLower == "order" && $curActionLower!='refferalincome') {
                                    $activecls = 'active';
                                } else {
                                    $activecls = '';
                                }
                                if ($curControllerLower == 'profile' && $curAction != 'dashboard' || $curActionLower == 'genealogy' )
                                    $activecls = 'active';
                                if ($curActionLower == 'simplename')
                                    $activecls = '';
                                ?>
                                <li class="<?php echo $activecls; ?>"><a href="javascript:;"> <span
                                            class="leftmenu-hotel"></span> <span class="title">Account</span>
                                        <span class="selected"></span> <span
                                            class="arrow <?php echo ($curControllerLower == 'order' && $curAction != 'dashboard'  ) ? "open" : ''; ?>">
                                        </span>
                                    </a>
                                    <?php
                                    $menusections ['sections'] = $hotel_subsection;
                                    echo '<ul class="sub-menu">';
                                    foreach ($hotel_subsection as $hotName => $hotTitle) {
                                        if (in_array($hotTitle, $menusections ['sections'])) {
                                            if ($hotName == 'admin') {
                                                $hotName = '/index';
                                            }
                                            if ($curActionLower == 'create') {
                                                $curActionLower = 'create/type/details';
                                            }
                                            $class_content = ($curControllerLower . "/" . $curActionLower == $hotName) ? 'class="active"' : '';
                                            echo '<li ' . $class_content . '>';
                                            echo '<a href="/' . $hotName . '">' . Yii::t('translation', $hotTitle) . '</a>';
                                            echo '</li>';
                                            if ($hotName == 'admin/index') {
                                                $hotName = 'admin';
                                            }

                                            /*
                                             * if($hotName == "admin")
                                             * echo '</ul>';
                                             */
                                        }
                                    }
                                    echo '</ul>';
                                    ?>					
                                </li>	
                                <?php
                            }

                            $billing_pmenu = 7;
                            if ((in_array($billing_pmenu, $menusections ['psections'])) || (in_array($billing_pmenu, $menusections ['section_ids']))) {
                                $billing_subsection = array(
                                    "mail" => "Inbox",
                                    "mail/compose" => "Compose",
                                    "mail/sent" => "Sent",
                                );
                                ?>
                                <li
                                    class="<?php echo ($curControllerLower == 'mail') ? "active" : ''; ?>">
                                    <a href="javascript:;"> <span class="leftmenu-hotel"></span> <span
                                            class="title">Mail</span>
                                        <span class="selected"></span> <span
                                            class="arrow <?php echo ($curControllerLower == 'mail') ? "open" : ''; ?>">
                                        </span>
                                    </a>
                                    <?php
                                    echo '<ul class="sub-menu">';
                                    foreach ($billing_subsection as $ctName => $ctTitle) {
//                                        if (in_array($ctTitle, $menusections ['sections'])) {
                                        // if($ctName == "invoice")
                                        // echo '<ul class="sub-menu">';
                                        $class_billing_content = ($curControllerLower . "/" . $curActionLower == $ctName) ? 'class="active"' : '';
                                        echo '<li ' . $class_billing_content . '>';
                                        echo '<a href="/' . $ctName . '">' . Yii::t('translation', $ctTitle) . '</a>';
                                        echo '</li>';
//                                        }
                                    }
                                    echo '</ul>';
                                    ?>					
                                </li>	
                                <?php
                            }

                            $reservation_pmenu = 8;
                            if ((in_array($reservation_pmenu, $menusections ['psections'])) || (in_array($reservation_pmenu, $menusections ['section_ids']))) {
                                $reservation_subsection = array(
                                    "transaction/list" => "Transaction List",
//                                    "moneytransfer/list" => "Moneytransfer List",
                                    "MoneyTransfer/transfer" => "Transfer",
                                );
                                ?>
                                <li

                                    class="<?php echo (($curControllerLower == 'transaction') && ($curControllerLower == 'transaction')) ? "active" : ''; ?>">

                                    <a href="javascript:;"> <span class="leftmenu-reservations"></span>
                                        <span class="title">Fund </span>
                                        <span class="selected"></span> <span
                                            class="arrow <?php echo ($curControllerLower == 'transaction' || $curControllerLower == 'moneytransfer') ? "open" : ''; ?>">
                                        </span>
                                    </a>
                                    <?php
                                    echo '<ul class="sub-menu">';
                                    foreach ($reservation_subsection as $ctName => $ctTitle) {
                                        if ($ctName == "search/create") {
                                            $ctName = "search/create/type/details";
                                        }
                                        if ($ctName == "transaction" && $curControllerLower == "moneytransfer")
                                            $class_content = 'class="active"';
                                        else
                                            $class_content = ($curControllerLower . "/" . $curActionLower == $ctName) ? 'class="active"' : '';

                                        echo '<li ' . $class_content . '>';
                                        echo '<a href="/' . $ctName . '">' . Yii::t('translation', $ctTitle) . '</a>';
                                        echo '</li>';
                                        if ($ctName == "search/create/type/details") {
                                            $ctName = "search/create";
                                        }
                                    }
                                    echo '</ul>';
                                    ?>			
                                </li>
                                <?php
                            }

                            $reservation_pmenu = 8;

                            $bases_pmenu = 4;
                            $hotel_pmenu = 6;
                            if ((in_array($hotel_pmenu, $menusections ['psections'])) || (in_array($hotel_pmenu, $menusections ['section_ids']))) {
                                $hotel_subsection = array(
                                    "wallet/rpwallet" => "RP Wallet",
                                    "wallet/commisionwallet" => "Commision Wallet",
                                    "wallet/fundwallet" => "Fund Wallet",
                                    "order/checkinvestment" => "Check Investment",
                                    "order/refferalincome" => "Referral Income",
//                                    "profile/summery" => "Summery",
                                );
                                $activecls = 'active';
                                if ($curControllerLower == "wallet" && $curControllerLower == "rpwallet" || $curControllerLower == 'commisionwallet' || $curControllerLower == 'fundwallet' || $curControllerLower=='order' && $curActionLower=='checkinvestment' || $curControllerLower=='order' && $curActionLower=='refferalincome') {
                                    $activecls = 'active';
                                } else {
                                    $activecls = '';
                                }
                                if ($curControllerLower == 'wallet' && $curActionLower == 'rpwallet' || $curActionLower == 'commisionwallet' || $curActionLower == 'fundwallet')
                                    $activecls = 'active';
                                if ($curActionLower == 'simplename')
                                    $activecls = '';
                                ?>
                                <li class="<?php echo $activecls; ?>"><a href="javascript:;"> <span
                                            class="leftmenu-hotel"></span> <span class="title">Summary</span>
                                        <span class="selected"></span> <span
                                            class="arrow <?php echo ($curControllerLower == 'rpwallet') ? "open" : ''; ?>">
                                        </span>
                                    </a>
                                    <?php
                                    $menusections ['sections'] = $hotel_subsection;
                                    echo '<ul class="sub-menu">';
                                    foreach ($hotel_subsection as $hotName => $hotTitle) {
                                        if (in_array($hotTitle, $menusections ['sections'])) {
                                            if ($hotName == 'admin') {
                                                $hotName = '/index';
                                            }
                                            if ($curActionLower == 'create') {
                                                $curActionLower = 'create/type/details';
                                            }
                                            $class_content = ($curControllerLower . "/" . $curActionLower == $hotName) ? 'class="active"' : '';
                                            echo '<li ' . $class_content . '>';
                                            echo '<a href="/' . $hotName . '">' . Yii::t('wallet', $hotTitle) . '</a>';
                                            echo '</li>';
                                            if ($hotName == 'admin/index') {
                                                $hotName = 'admin';
                                            }

                                            /*
                                             * if($hotName == "admin")
                                             * echo '</ul>';
                                             */
                                        }
                                    }
                                    echo '</ul>';
                                    ?>					
                                </li>	
                                <?php
                            }
                            if (Yii::app()->session['orderID'] && Yii::app()->session['templateID']) {
                                $reservation_pmenu = 8;
                                if ((in_array($reservation_pmenu, $menusections ['psections'])) || (in_array($reservation_pmenu, $menusections ['section_ids']))) {
                                    $reservation_subsection = array(
                                        "BuildTemp/templates?id=" . Yii::app()->session['orderID'] => "Choose Templates",
                                        "BuildTemp/userinput" => "Add / Edit Pages",
                                    );
                                    ?>
                                    <li class="<?php echo (($curControllerLower == 'BuildTemp') && ($curControllerLower == 'BuildTemp')) ? "active" : ''; ?>">

                                        <a href="javascript:;"> <span class="leftmenu-reservations"></span>
                                            <span class="title">Builder Pages</span>
                                            <span class="selected"></span> <span
                                                class="arrow <?php echo ($curControllerLower == 'BuildTemp' || $curControllerLower == 'BuildTemp') ? "open" : ''; ?>">
                                            </span>
                                        </a>
                                        <?php
                                        echo '<ul class="sub-menu">';
                                        foreach ($reservation_subsection as $ctName => $ctTitle) {
                                            if ($ctName == "search/create") {
                                                $ctName = "search/create/type/details";
                                            }
                                            if ($ctName == "BuildTemp" && $curControllerLower == "BuildTemp")
                                                $class_content = 'class="active"';
                                            else
                                                $class_content = ($curControllerLower . "/" . $curActionLower == $ctName) ? 'class="active"' : '';

                                            echo '<li ' . $class_content . '>';
                                            echo '<a href="/' . $ctName . '">' . Yii::t('translation', $ctTitle) . '</a>';
                                            echo '</li>';
                                            if ($ctName == "search/create/type/details") {
                                                $ctName = "search/create";
                                            }
                                        }
                                        echo '</ul>';
                                        ?>			
                                    </li>
                                    <?php
                                }
                            }
                        }
                        ?>				
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <!-- /.modal -->
                    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <!-- BEGIN STYLE CUSTOMIZER -->

                    <!-- END STYLE CUSTOMIZER -->
                    <!-- BEGIN PAGE HEADER-->
                    <?php
                    $header_curController = @Yii::app()->controller->id;
                    $header_curAction = @Yii::app()->getController()->getAction()->controller->action->id;
                    $menu_cond = ($header_curController == "hotel" && $header_curAction == "index") ? false : true;
                    if ($menu_cond) {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                                <ul class="page-breadcrumb breadcrumb">

                                    <li>
                                        <?php
                                        $this->widget('zii.widgets.CBreadcrumbs', array(
                                            'homeLink' => CHtml::link('User', array(
                                                '/user'
                                            )),
                                            'links' => $this->breadcrumbs
                                        ));
                                        ?>


                                    </li>

                                </ul>
                                <!-- END PAGE TITLE & BREADCRUMB-->
                            </div>
                        </div>
                            <?php } ?>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row">
                        <div class="col-md-12">
<?php echo $content; ?>
                        </div>
                    </div>
                    <!-- END PAGE CONTENT-->
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="footer">
            <div class="footer-inner">
<?php echo date("Y"); ?> &copy; mGlobal
            </div>
            <div class="footer-tools">
                <span class="go-top"> <i class="fa fa-angle-up"></i>
                </span>
            </div>
        </div>
        
<div class="chatWrap">
   <a onclick="openChat();"><span class="glyphicon glyphicon-comment"></span></a>
  
</div>
        <!-- END FOOTER -->
        <script type="text/javascript">
            function showError(msg) {
                bootbox.alert(msg, function () {
                    //alert("Hello world callback");
                });
            }

            function showSucessMsg(msg, heading) {
                var settings = {
                    theme: 'teal',
                    // sticky: $('#notific8_sticky').is(':checked'),
                    horizontalEdge: 'top',
                    verticalEdge: 'right',
                    heading: heading,
                    life: 5000
                };
                $.notific8('zindex', 11500);
                $.notific8($.trim(msg), settings);
            }
           
        </script>
        <script>
             $(".glyphicon-comment").click(function(){
             $(".chatuserList").toggle();
             });
            </script>
    </body>
    <!-- END BODY -->
</html>
