<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<!-- Only required for this file -->
<link rel="stylesheet" href="/user_dashboard/slide/owl-carousel/owl.carousel.css" />
<link rel="stylesheet" href="/user_dashboard/slide/owl-carousel/owl.theme.css" />
<link rel="stylesheet" href="/user_dashboard/slide/owl-carousel/owl.carousel.css" />
<link rel="stylesheet" href="/user_dashboard/chart/css/normalize.css" />
<link rel="stylesheet" href="/user_dashboard/chart/css/style.css" />
<link rel="stylesheet" href="/user_dashboard/css/style.css" />
<link rel="stylesheet" href="/user_dashboard/css/responsive.css" />
<!-- End -->

<?php
$this->breadcrumbs = array(
    'Dashboard',
);

//print_r($orderObject->builder); die;
?>
<?php if (!empty($_GET['successMsg'])) { ?><div class="success"><?php echo $_GET['successMsg']; ?></div><?php } ?>
<div class="user-dash ">
    <div class="col-md-9 dashboard-left-content">
        <div class="row row-start">
            <div class="col-sm-6 col-md-6">
                <div class="top-view-wrapper">
                    <div class="top-view-inner">
                        <i class="fa fa-eye view-eye"></i>
                        <h3>View<br><p>Website</p></h3>
                    </div>
                    <div class="down-view">
                        <a href="/order/list"><p>View Details<span><i class="fa fa-arrow-circle-o-right nav-icon"></i></span></p></a>

                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-6  ">
                <div class="top-edit-wrapper">
                    <div class="top-edit-inner">
                        <i class="fa fa-pencil-square-o edit-icon"></i>

                        <h3>Edit<br><p>Website</p></h3>
                    </div>
                    <div class="down-edit">
                        <a href="/order/list"> <p>View Details<span><i class="fa fa-arrow-circle-o-right nav-icon"></i></span></p>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="row row-start">

            <div class="col-sm-3 col-md-3 ">
                <div class="top-user-wrapper">
                    <div class="top-user-inner">
                        <i class="fa fa-users user"></i>

                        <h3 class="pull-right"><?php echo isset($userDetails['refferal_count']) ? sprintf("%02d", $userDetails['refferal_count']) : 0; ?><br></h3>
                    </div><p class="small-p">Refferal Under Me</p>
                    <div class="down-user">
                        <a href="#"> <p>View Details<span><i class="fa fa-arrow-circle-o-right nav-icon"></i></span></p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-md-3 ">
                <div class="top-cart-wrapper">
                    <div class="top-cart-inner">
                        <i class="fa fa-shopping-cart cart"></i>

                        <h3 class="pull-right"><?php echo isset($userDetails['package_purchased']) ? sprintf("%02d", $userDetails['package_purchased']) : 0; ?><br></h3>
                    </div><p class="small-p">Packages Purchased</p>
                    <div class="down-cart">
                        <a href="#"> <p>View Details<span><i class="fa fa-arrow-circle-o-right nav-icon"></i></span></p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 ">
                <div class="top-cartplus-wrapper">
                    <div class="top-cartplus-inner">
                        <i class="fa fa-cart-plus cartplus"></i>

                        <h3 class="pull-right"><?php echo isset($userDetails['transaction_order']) ? sprintf("%02d", $userDetails['transaction_order']) : 0; ?><br></h3>
                    </div><p class="small-p">Transaction Order</p>
                    <div class="down-cartplus">
                        <a href="#">    <p>View Details<span><i class="fa fa-arrow-circle-o-right nav-icon"></i></span></p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 ">
                <div class="top-money-wrapper">
                    <div class="top-money-inner">
                        <img src="/user_dashboard/images/money.png" class="money">

                        <h3 class="pull-right"><?php echo isset($userDetails['transaction_fund']) ? sprintf("%02d", $userDetails['transaction_fund']) : 0; ?><br></h3>
                    </div><p class="small-p">Transaction Fund</p>
                    <div class="down-money">
                        <a href="#"> <p>View Details<span><i class="fa fa-arrow-circle-o-right nav-icon"></i></span></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-start">
            <div class="col-sm-6 col-md-6  ">
                <div class="top-ref-wrapper">
                    <div class="top-ref-inner">


                        <h4>Referral Under Me</h4>
                    </div>
                    <div class="down-edit">

                        <div id="bar-chart"></div>



                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-6">
                <div class="top-fb-wrapper">
                    <div class="top-fb-inner">
                        <i class="fa fa-facebook-official fb"></i>
                        <h3 class="pull-right"><?php echo isset($userDetails['addshare_count']) ? sprintf("%02d", $userDetails['addshare_count']) : 0; ?><br></h3>

                    </div>  <p class="small-p">Social Sharing(Earned)</p>
                    <div class="down-fb">
                        <h4>Lapsed <?php echo isset($userDetails['addlapsed_count']) ? sprintf("%02d", $userDetails['addlapsed_count']) : 0; ?></h4>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-3 panel-row">
        <div class="panel panel-default">
            <div class="panel-heading dashboard-panel"><i class="fa fa-bell bell"></i><span class="notification">Notification Panel</span></div>
            <div class="panel-body">
                <ul class="list-group panel-list dash-list">
                    <li class="list-group-item"><i class="fa fa-envelope list-icon"></i>Message Sent:<span class="inside-li-1"><?php echo isset($userNotifications['lastsentmsg']) ? $userNotifications['lastsentmsg'] : "Never sent"; ?></span></li>
                    <li class="list-group-item"><i class="fa fa-shopping-cart list-icon"></i>Transaction Order :<span class="inside-li-3"><?php echo isset($userNotifications['transaction_order']) ? $userNotifications['transaction_order'] : "Never Sent"; ?></span></li>
                    <li class="list-group-item"><i class="fa fa-money list-icon"></i>Transaction Fund :<span class="inside-li-3"><?php echo isset($userNotifications['transaction_fund']) ? $userNotifications['transaction_fund'] : "Never"; ?></span></li>
                    <li class="list-group-item"><i class="fa fa-shopping-cart list-icon"></i>Packaged Purchased :<span class="inside-li-3"><?php echo isset($userNotifications['package_purchased']) ? $userNotifications['package_purchased'] : "Never"; ?></span></li>
                    <ul class="list-unstyled">
                        <li> <div class="last-btn"><p>View All Alerts</p></div></li>
                    </ul>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Required only by this file. -->
<script src='https://www.google.com/jsapi'></script>
<script src="/user_dashboard/chart/js/index.js"></script>

