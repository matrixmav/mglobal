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
success: function(html){
document.getElementById("menu").innerHTML = html;
}
});
$.ajax({
type: "GET",
url: "/buildtemp/fetchlogo",
data: dataString,
cache: false,
success: function(html){
document.getElementById("logo").innerHTML = html;
}
});
var url = document.URL;
var str = url.split('/');
var dValue = $("#defaultPage").val();
if(str[5]!='')
{
 var pageID = str[5];   
}else{
var pageID = dValue;      
}
dataString = 'fetchContent=yes&page_id='+pageID;
$.ajax({
type: "GET",
url: "/buildtemp/pagecontent",
data: dataString,
cache: false,
success: function(html){
document.getElementById("content").innerHTML = html;
}
});
});
function showContent(ID)
{
dataString = 'fetchContent=yes&page_id='+ID;
$.ajax({
type: "GET",
url: "/buildtemp/pagecontent",
data: dataString,
cache: false,
success: function(html){
document.getElementById("container").innerHTML = html;
}
});    
}
function validation()
  {
    $("#page_title_error").html("");
    if ($("#page_name").val() == "") {
    $("#page_title_error").html("Please enter page title.");
    $("#page_name").focus();            
    return false;
  }

  $("#page_content_error").html("");
    if ($("#editor1").val() == "") {
    $("#page_content_error").html("Please enter page content.");
    $("#editor1").focus();            
    return false;
  }
</script>
</head>	
 
<div id="header">
    
<?php echo $builderObject->temp_header;?>
    <input type="hidden" id="defaultPage" value="<?php echo $userpages1Object->id;?>">   
</div>

<div id="container">
   <?php echo $builderObject->temp_body;?>  
</div>

<div id="footer">
  <?php echo $builderObject->temp_footer;?>   
</div>