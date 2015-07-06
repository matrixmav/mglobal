<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?php
$this->breadcrumbs = array(
    'Dashboard',
);
?>
<?php if(!empty($_GET['successMsg'])){ ?><div class="success"><?php echo $_GET['successMsg']; ?></div><?php } ?>
<div class="row">
    <?php if(empty($orderObject)){?>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
         <a href="/#prices">
        <div class="dashboard-stat blue-madison">
         
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                </div>
                <div class="desc label label-sm label-danger">
                Pick a Package
                   
                </div>
            </div>
            
            <a class="more" href="javascript:;">
                Pick a package <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
        </a>
    </div>
    <?php }else{
     foreach($orderObject as $order){  ?>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <a class="more" href="/BuildTemp/templates?id=<?php echo $order->id; ?>" target="_blank"><div class="dashboard-stat blue-madison">
            <div class="visual">
               
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
              <div class="number">
                 <?php echo $order->domain;?> 
                </div>
                <div class="desc">
                    Visit Website
                </div> 
            </div>
                  <span class="txtDescription">view more  <i class="m-icon-swapright m-icon-white"></i></span>
                
           
            
          </div></a>
    </div>    
     <?php }  ?>
    
    <?php }?>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a href="/cropper/live/index.html" target="_blank"><div class="dashboard-stat red-intense">
            <div class="visual">
               
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
              <div class="number">
                   Crop Images
                </div>
                <div class="desc">
                    Crop your Images
                </div> 
            </div>
                  <span class="txtDescription">view more  <i class="m-icon-swapright m-icon-white"></i></span>
          </div></a>
    </div>
    <!--div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat green-haze">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    549
                </div>
                <div class="desc">
                    New Orders
                </div>
            </div>
            <a class="more" href="javascript:;">
                View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple-plum">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    +89%
                </div>
                <div class="desc">
                    Brand Popularity
                </div>
            </div>
            <a class="more" href="javascript:;">
                View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>-->
</div>
<!--<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share font-blue-steel hide"></i>
                    <span class="caption-subject font-blue-steel bold uppercase">Recent Activities</span>
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="javascript:;" class="btn btn-sm btn-default btn-circle">
                            Filter By <i class="fa fa-angle-down"></i>
                        </a>
                        <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                            <label><div class="checker"><span><input type="checkbox"></span></div> Finance</label>
                            <label><div class="checker"><span class="checked"><input type="checkbox" checked=""></span></div> Membership</label>
                            <label><div class="checker"><span><input type="checkbox"></span></div> Customer Support</label>
                            <label><div class="checker"><span class="checked"><input type="checkbox" checked=""></span></div> HR</label>
                            <label><div class="checker"><span><input type="checkbox"></span></div> System</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><div data-rail-visible="0" data-always-visible="1" style="height: 300px; overflow: hidden; width: auto;" class="scroller" data-initialized="1">
                        <ul class="feeds">
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                You have 4 pending tasks. <span class="label label-sm label-warning ">
                                                    Take action <i class="fa fa-share"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        Just now
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                    <i class="fa fa-bar-chart-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                    Finance Report for year 2013 has been released.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                            20 mins
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-danger">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                You have 5 pending membership that requires a quick review.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        24 mins
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-shopping-cart"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                New order received with <span class="label label-sm label-success">
                                                    Reference Number: DR23923 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        30 mins
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-success">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                You have 5 pending membership that requires a quick review.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        24 mins
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-default">
                                                <i class="fa fa-bell-o"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                Web server hardware needs to be upgraded. <span class="label label-sm label-default ">
                                                    Overdue </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        2 hours
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-default">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                    IPO Report for year 2013 has been released.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                            20 mins
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                You have 4 pending tasks. <span class="label label-sm label-warning ">
                                                    Take action <i class="fa fa-share"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        Just now
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-danger">
                                                    <i class="fa fa-bar-chart-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                    Finance Report for year 2013 has been released.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                            20 mins
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-default">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                You have 5 pending membership that requires a quick review.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        24 mins
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-shopping-cart"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                New order received with <span class="label label-sm label-success">
                                                    Reference Number: DR23923 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        30 mins
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-success">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                You have 5 pending membership that requires a quick review.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        24 mins
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-warning">
                                                <i class="fa fa-bell-o"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                Web server hardware needs to be upgraded. <span class="label label-sm label-default ">
                                                    Overdue </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">
                                        2 hours
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                    IPO Report for year 2013 has been released.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                            20 mins
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div><div class="slimScrollBar" style="background: rgb(187, 187, 187) none repeat scroll 0% 0%; width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 188.679px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                <div class="scroller-footer">
                    <div class="btn-arrow-link pull-right">
                        <a href="javascript:;">See All Records</a>
                        <i class="icon-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
                
</div>
<!-- END DASHBOARD STATS -->
<div class="clearfix">
</div>

