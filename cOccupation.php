<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_name("oa");
session_start();
 if(isset($_SESSION['username']) == false)
	header("Location: page_login.php charset=utf-8");
if($_GET['action'] == "create") 
{
	include 'db_connect.php';
	$Q="INSERT INTO occupation(`name`,`level`)
	VALUES ('".$_POST['occupationName']."','".$_POST['occupationLevel']."')";
	$occupation=mysql_query($Q);	
	if(mysql_affected_rows() == 1) 
	{
		header("Location: createOccupation.php?result=success");
	}
	else
	{
		header("Location: createOccupation.php?result=failure");
	}
}
?>

