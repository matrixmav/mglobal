<?php
$this->breadcrumbs = array(
    'Dashboard'
);
?>

<?php if(!empty($_GET['successMsg'])){ ?><div class="success"><?php echo $_GET['successMsg']; ?></div><?php } ?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8"/>
<title>Mglobally | Dashboard</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- Start GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<!--<link href="/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>-->
<link href="/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<!--<link href="/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/metronic/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="/metronic/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="/metronic/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="/metronic/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="/metronic/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="/metronic/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="/metronic/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/metronic/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<!--<link href="/metronic/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>-->
<link href="/metronic/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>

<script src="/metronic/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
   
<style>
			body{
				padding: 0;
				margin: 0;
				font-family: 'Open Sans', sans-serif;
			}
			.portlet-title h2
			{
			margin-top:0;
			margin-bottom:20px;
			}
			
			#site_activities
			{
			min-height:300px;
			}
			#canvas-holder{
				width:30%;
			}
			.mar20
			{
			margin-top:20px;
			}
			.head
			{
			background:#f15d2a; 	
			padding:10px;
			color:#fff;
			font-size:20px;
			text-transform:uppercase;
			}
			.ref-history
			{
			width:100%;
			float:left;
			border:1px solid #000;
			min-height:410px;
			}
			.info
			{
			padding:10px;
			float:left;
			padding-right:0;
			width:100%;
			}
			.info h3{
			font-size:14px;
			padding-right:5px;
			}
			#hexagon {
	  width: 240px;
  height: 150px;
	background: #364150;
	position: relative;
	margin-top:90px;
	margin-left:20%;
}
#hexagon:before {
	content: "";
	position: absolute;
	top: -75px;
	left: 0;
	width: 0;
	height: 0;
	border-left: 120px solid transparent;
	border-right: 120px solid transparent;
	border-bottom: 75px solid #364150;
}
#hexagon:after {
	content: "";
	position: absolute;
	bottom: -75px;
	left: 0;
	width: 0;
	height: 0;
	border-left: 120px solid transparent;
	border-right: 120px solid transparent;
	border-top: 75px solid #364150;
}
#hexagon p
{
font-size:18px;
color:#fff;
text-align:center;
}
#hexagon p span
{
font-size:85px;
color:#fff;
text-align:center;
}

.det
{
float:right;
padding:0;
text-align:right;
}
.state
{
float:right;
padding:0;
text-align:right;
margin-top:50px;
}
.date-info
{
background:#e0f2fb;
min-width:120px;
text-align:left;
border:1px solid #b2b2b2;
}
.date-info span
{
background:#bfd6e2;
padding:10px;
border-right:1px solid #b2b2b2;
}
.values
{
color:#000;
letter-spacing:2px;
font-size:16px;
text-align:left;
padding:5px;
border-bottom:1px dotted #000;
}
.time-info
{
background:#ccdbde;
min-width:120px;
text-align:left;
border:1px solid #b2b2b2;
}
.time-info span
{
background:#b9d3d8;
padding:10px;
border-right:1px solid #b2b2b2;
}
.place-info
{
background:#d8d8d8;
min-width:120px;
text-align:left;
border:1px solid #b2b2b2;
}
.place-info span
{
background:#c8c8c8;
padding:10px;
border-right:1px solid #b2b2b2;
}
.excellent
{
background:#efed6a;
padding:10px;
text-align:center;
}

.good{
background:#b1eac4;
padding:10px;
text-align:center;
}

.start-up
{
background:#fdc3af;
padding:10px;
text-align:center;
}
.poor
{
background:#f7a589;
padding:10px;
text-align:center;
}
.total h1
{
color:#dbdbdb;
font-size:65px;
text-align:center;
padding:28px 0;
}
.total h1 span
{
color:#1bbc98;
font-size:95px;
 text-shadow: 1px 1px #000;
}
.total
{
border-bottom:1px dotted #000;
}
.in-domain
{
padding:0;
background:#ffe5e5;
}
.act-domain
{
border-right:1px dotted #000;
padding:0;
background:#e3fff9;
}
.act-domain h1
{
font-size:80px;
text-align:center;
color:#83dfca;
padding: 3px 0;
}
.in-domain h1
{
font-size:80px;
text-align:center;
color:#f4b0b0;
padding: 3px 0;
}
.act-domain h5
{
text-align:center;
background:#83dfca;
padding:15px 0;
margin:0;
color:#40c6a6;
}
.in-domain h5
{
text-align:center;
background:#f4b0b0;
padding:15px 0;
margin:0;
color:#fff;
}
.circle-cav
{
margin-top:10%;
}

@media screen and (max-width : 1600px)
{
	#hexagon {
	  width: 200px;
  height: 120px;
	background: #364150;
	position: relative;
	margin-top:90px;
	margin-left:29%;
}
#hexagon:before {
	content: "";
	position: absolute;
	top: -60px;
	left: 0;
	width: 0;
	height: 0;
	border-left: 100px solid transparent;
	border-right: 100px solid transparent;
	border-bottom: 60px solid #364150;
}
#hexagon:after {
	content: "";
	position: absolute;
	bottom: -60px;
	left: 0;
	width: 0;
	height: 0;
	border-left: 100px solid transparent;
	border-right: 100px solid transparent;
	border-top: 60px solid #364150;
}
#hexagon p
{
font-size:18px;
color:#fff;
text-align:center;
}
#hexagon p span
{
font-size:85px;
color:#fff;
text-align:center;
  float: left;
  width: 100%;
  margin-top: -25px;

}
}
@media screen and (max-width : 1400px)
{
.det
{
width:100%;
margin-top:45px;
}
.info h3
{
text-align:left;
}
.state
{
width:100%;
}
#hexagon
{

margin-left:25%;
margin-top:70px;
}
.total h1 span
{
width:100%;
float:left;
}
.res-det
{
margin-top:0;
}
}
@media screen and (max-width : 1400px)
{
}
@media screen and (max-width : 1100px)
{
#hexagon
{
margin-left:-5%;
}
}
@media screen and (max-width : 992px)
{
.circle-cav
{
margin-left:20%;
}
#hexagon
{
margin-left:58%;
}
}
@media screen and (max-width : 768px)
{
.circle-cav
{
margin-left:0%;
}
#hexagon
{
margin-left:35%;
margin-bottom:0px;
}
canvas#chart-area
{
padding: 30px;
  margin-left: -5%;
}
.state
{
width:100%;
}
.det
{
width:100%;
}
}
@media screen and (max-width : 600px)
{
#hexagon
{
margin-bottom:100px;
margin-left:32%;
}
}
@media screen and (max-width : 480px)
{
#hexagon
{
margin-bottom:100px;
margin-left:10%;
}
}
@media screen and (max-width : 380px)
{
#hexagon
{
margin-bottom:100px;
margin-left:0;
}
}
		</style>
</head>

<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
<!-- BEGIN HEADER -->

<!-- END HEADER -->

			
			
		
			
			
			<div class="clearfix">
			</div>
			<div class="row">
			
			
			
				<div class="col-md-6 col-sm-6" style="border-right:1px dotted #000">
					<!-- BEGIN PORTLET-->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-bar-chart font-green-sharp hide"></i>
								<h2>New Registrants</h2>
							</div>
						</div>
						<div class="portlet-body">
							<div id="site_statistics_loading">
								<img src="/metronic/assets/admin/layout/img/loading.gif" alt="loading"/>
							</div>
							<div id="site_statistics_content" class="display-none">
								<div id="site_statistics" class="chart">
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
				
				
				
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-share font-red-sunglo hide"></i>
								<h2>Booked Packages</h2>
							</div>
						</div>
						<div class="portlet-body">
							<div id="site_activities_loading">
								<img src="/metronic/assets/admin/layout/img/loading.gif" alt="loading"/>
							</div>
							<div id="site_activities_content" class="display-none">
								<div id="site_activities" style="height: 228px;">
								</div>
							</div>
						</div>
					</div>
					
				</div>
				
				
			
			</div>
			
		<div class="row mar20">
			
			<div class="col-md-4" >

			<div class="ref-history">
			<div class="head">
			Progress Meter
			</div>
			<div class="info">
			<div class="col-sm-7 circle-cav">
			<canvas id="chart-area" width="250" height="250"/>
			</div>
			<div class="col-sm-4 state">

			
			<h4 class="excellent">Excellent</h4>
		
			<h4 class="good">Good</h4>
			
			<h4 class="start-up">Start Up</h4>
			
			<h4 class="poor">Poor</h4>
			
			</div>
			</div>
			</div>
			</div>
			
			
			<div class="col-md-4">
			<div class="ref-history">
			<div class="head">
			Reference History
			</div>
			<div class="info">
			<div class="col-sm-8">
			<div id="hexagon">
			<p><span><?php echo $userCount;?></span><br>people reffered</p>
			</div>
			</div>
			<!--<div class="col-sm-4 det">
			<h3>Details of last Interaction</h3>
			<h4 class="date-info"><span class="fa fa-calendar"></span>  Date</h4>
			<p class="values">16 10 2014</p>
			<h4 class="time-info"><span class="fa fa-clock-o"></span>  Time</h4>
			<p class="values">20 : 10 PM</p>
			<h4 class="place-info"><span class="fa fa-map-marker"></span>  Place</h4>
			<p class="values">Bengaluru, India</p>
			</div>-->
			</div>
			</div>
			</div>
			
			
			<div class="col-md-4">
			<div class="ref-history">
			<div class="head">
			NO.OF PACKAGE PURCHASED
			</div>
			
			<div class="col-xs-12 total">
			<h1><span><?php echo $total;?></span>TOTAL</h1>
			</div>
			<div class="col-xs-12 det res-det">
			<div class="col-sm-6 act-domain">
			<h1><span><?php echo $activeCount;?></span></h1>
			<h5>ACTIVE DOMAINS</h5>
			</div>
			<div class="col-sm-6 in-domain">
			<h1><span><?php echo $InactiveCount;?></span></h1>
			<h5>INACTIVE DOMAINS </h5>
			</div>
			</div>
			</div>
			</div>
		
			
		</div>
			


<!--<script src="/metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>-->
<script src="/metronic/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/metronic/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="/metronic/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="/metronic/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="/metronic/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/metronic/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/metronic/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/metronic/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="/metronic/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="/metronic/assets/admin/Chart.js"></script>
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
});
</script>


	<script>
            
             function showChartTooltip(x, y, xValue, yValue) {
                $('<div id="tooltip" class="chart-tooltip">' + yValue + '<\/div>').css({
                    position: 'absolute',
                    display: 'none',
                    top: y - 40,
                    left: x - 40,
                    border: '0px solid #ccc',
                    padding: '2px 6px',
                    'background-color': '#fff'
                }).appendTo("body").fadeIn(200);
            }

		var doughnutData = [
				{
					value: 300,
					color:"#efed6a",
					highlight: "#efed6a",
					label: "Excellent"
				},
				{
					value: 250,
					color: "#b1eac4",
					highlight: "#b1eac4",
					label: "Good"
				},
				{
					value: 100,
					color: "#fdc3af",
					highlight: "#fdc3af",
					label: "Start Up"
				},
				{
					value: 40,
					color: "#f7a589",
					highlight: "#f7a589",
					label: "Poor"
				}
			];

			window.onload = function(){
				var ctx = document.getElementById("chart-area").getContext("2d");
				window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});
			};
                        
                var visitors = [
                <?php echo $str;?>
            ];


            if ($('#site_statistics').size() != 0) {

                $('#site_statistics_loading').hide();
                $('#site_statistics_content').show();

                var plot_statistics = $.plot($("#site_statistics"),
                    [{
                        data: visitors,
                        lines: {
                            fill: 0.6,
                            lineWidth: 0
                        },
                        color: ['#f89f9f']
                    }, {
                        data: visitors,
                        points: {
                            show: true,
                            fill: true,
                            radius: 5,
                            fillColor: "#f89f9f",
                            lineWidth: 3
                        },
                        color: '#fff',
                        shadowSize: 0
                    }],

                    {
                        xaxis: {
                            tickLength: 0,
                            tickDecimals: 0,
                            mode: "categories",
                            min: 0,
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        yaxis: {
                            ticks: 5,
                            tickDecimals: 0,
                            tickColor: "#eee",
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#eee",
                            borderColor: "#eee",
                            borderWidth: 1
                        }
                    });

                var previousPoint = null;
                $("#site_statistics").bind("plothover", function (event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));
                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);

                            showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + ' visits');
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });
            }

if ($('#site_activities').size() != 0) {
                //site activities
                var previousPoint2 = null;
                $('#site_activities_loading').hide();
                $('#site_activities_content').show();

                var data1 = [
                    <?php echo $packageStr ;?>
                ];


                var plot_statistics = $.plot($("#site_activities"),

                    [{
                        data: data1,
                        lines: {
                            fill: 0.2,
                            lineWidth: 0,
                        },
                        color: ['#BAD9F5']
                    }, {
                        data: data1,
                        points: {
                            show: true,
                            fill: true,
                            radius: 4,
                            fillColor: "#9ACAE6",
                            lineWidth: 2
                        },
                        color: '#9ACAE6',
                        shadowSize: 1
                    }, {
                        data: data1,
                        lines: {
                            show: true,
                            fill: false,
                            lineWidth: 3
                        },
                        color: '#9ACAE6',
                        shadowSize: 0
                    }],

                    {

                        xaxis: {
                            tickLength: 0,
                            tickDecimals: 0,
                            mode: "categories",
                            min: 0,
                            font: {
                                lineHeight: 18,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        yaxis: {
                            ticks: 5,
                            tickDecimals: 0,
                            tickColor: "#eee",
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#eee",
                            borderColor: "#eee",
                            borderWidth: 1
                        }
                    });

                $("#site_activities").bind("plothover", function (event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));
                    if (item) {
                        if (previousPoint2 != item.dataIndex) {
                            previousPoint2 = item.dataIndex;
                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);
                            showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + 'M$');
                        }
                    }
                });

                $('#site_activities').bind("mouseleave", function () {
                    $("#tooltip").remove();
                });
            }


	</script>

</body>


</html>