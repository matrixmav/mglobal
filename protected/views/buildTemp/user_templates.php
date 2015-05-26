<!DOCTYPE html>
<html>
<head>
<title><?php echo $builderObject->header->meta_title;?></title>
<link href="/user/template/<?php echo $builderObject->folderpath; ?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/user/template/<?php echo $builderObject->folderpath; ?>/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="/user/template/<?php echo $builderObject->folderpath; ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
</head>	
<div id="header">
    <?php echo $builderObject->header->header_content;?>
</div>

<div id="container">
   <?php echo $builderObject->body->body_content;?>  
</div>


<div id="footer">
  <?php echo $builderObject->footer->footer_content;?>   
</div>