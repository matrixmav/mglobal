<!DOCTYPE html>
<html>
<head>
<title><?php echo $builderObjectmeta->header->meta_title;?></title>
<link href="/user/template/<?php echo $builderObjectmeta->folderpath; ?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/user/template/<?php echo $builderObjectmeta->folderpath; ?>/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="/user/template/<?php echo $builderObjectmeta->folderpath; ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function () {
dataString = 'fetchmenu';
$.ajax({
type: "GET",
url: "/buildtemp/fetchmenu",
data: dataString,
cache: false,
success: function(html){ alert();
document.getElementById("secondaryDomainResults").innerHTML = html;
 
}

});             
});
</script>
</head>	
 
<div id="header">
    <?php /*code to fetch navigation*/
//				$userpagesObject = UserPages::model()->findAll(array('condition'=>'user_id='.Yii::app()->session['userid'].' AND order_id='.Yii::app()->session['orderID']));
//                                echo "<pre>"; print_r($userpagesObject);
//				foreach($userpagesObject as $pages){
//               ?>
					<!--<li class="color1"><a href="/buildtemp/pagecontent?pageid=//<?php // echo $pages->id?>"><i class="icon1"> </i><span><?php //echo $pages->page_name?></span></a></li>-->
				<?php // }?>	 
    <?php echo $builderObject->temp_header;?>
    
</div>

<div id="container">
   <?php echo $builderObject->temp_body;?>  
</div>

<div id="footer">
  <?php echo $builderObject->temp_footer;?>   
</div>