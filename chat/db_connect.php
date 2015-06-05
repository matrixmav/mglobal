<?php 
$username = "mgloball_mg";
$password = "mg@123";
$hostname = "localhost"; 
//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
 or die("Unable to connect to MySQL");
//select a database to work with
$selected = mysql_select_db("mgloball_demo",$dbhandle)
or die("Could not select examples");
?>