<?php session_start();
/*var_dump($_SESSION);
if(!empty($_GET) && $_GET['user']!='')
{
$_SESSION['username'] = $_GET['user'];
$_SESSION['order_id'] = $_GET['order_id'];
}else{

$_SESSION['username'] = $_SESSION['username'];
}*/
unset($_COOKIE);
$strCookie =  $_SESSION['username']."~".md5('12345')."~".(time()+2400);
setcookie("Auth",$strCookie);
$AuthUserName = $_SESSION['username'] ;
$AuthGroup = "Basic";
/*$strSelect="SELECT * FROM ".$DBprefix."admin_users WHERE username='".$_SESSION['username']."' and password='".md5('12345')."'";
$LoginResult=mysql_query($strSelect);
if(mysql_num_rows($LoginResult)==0) {
header('location:/');
} */ 
 //var_dump($_COOKIE);
if(!isset($not_include_cofig)) include("../config.php");
/*if((!isset($_COOKIE["Auth"]))||$_COOKIE["Auth"]=="")
{
	die("<script>document.location.href='../index.php?mod=login&error=expired';</script>");
}
else{

	list($cookieUser,$cookiePassword,$cookieExpire)=explode("~",$_COOKIE["Auth"]);
	
	if($cookieExpire<time())
	{
		die("<script>document.location.href='../index.php?mod=login&error=expired';</script>");
		
	}
	else
	{
	
			mysql_connect($DBHost,$DBUser,$DBPass);
			mysql_select_db ($DBName) or die ("DB access denied");
			
			$strSelect="SELECT * FROM ".$DBprefix."admin_users WHERE username='".$cookieUser."' and password='".$cookiePassword."'";
				
			$LoginResult=mysql_query($strSelect);
			$LoginInfo = mysql_fetch_array($LoginResult);
				
			if(mysql_num_rows($LoginResult)==1) 
			{
			  
				$AuthUserName=$LoginInfo["username"];
				$AuthGroup=$LoginInfo["type"];
				
			}
			else 
			{
			   
				die("<script>document.location.href='../index.php?mod=login&error=login';</script>");
				
			}
				
			mysql_close();
	}
}*/
?>