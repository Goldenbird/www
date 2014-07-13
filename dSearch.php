<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_name("oa");
session_start();
 if(isset($_SESSION['username']) == false)
	header("Location: page_login.php charset=utf-8");
if($_GET['action'] == "docSearch") 
{
	include 'db_connect.php';
	$docType = $_POST['docType'];
	$senderName = $_POST['realToSender'];
	$recieverName = $_POST['realToReciever'];
	$sentDateFrom = $_POST['sentDateFrom'];
	$sentDateTo = $_POST['sentDateTo'];
	$recieveDateFrom = $_POST['recieveDateFrom'];
	$recieveDateTo = $_POST['recieveDateTo'];
	$subject = $_POST['subject'];
	$keyword = $_POST['keyword'];
	$privacy = $_POST['privacy'];
	$priority = $_POST['priority'];
	//sender,reciever
	$composit_to = $_POST['to'];
	$tos=explode("|",$composit_to,1000);
	if($docType = "نامه ارسالی")
	{
		$sentDoc = mysql_query("select * from letters where senderID = "$_SESSION['username']" AND".
		(($senderName != "")?("recieverID, "):("")).);
	}
}