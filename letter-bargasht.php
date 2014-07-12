<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_name("oa");
session_start();

if(isset($_SESSION['username']) == false)
	header("Location: page_login.php charset=utf-8");

function generate()
{
	$str = date("Y-m-d H:i:s");
	$temp = str_replace(" ", "", $str);
	$temp2 = str_replace("-", "", $temp);
	$var = str_replace(":", "", $temp2);
	$q=mysql_query("SELECT id FROM letters WHERE id LIKE ('".$var."%')");
	return $var.(mysql_num_rows($q)+1);
}
if($_GET['action'] == "bargasht") 
{
	include 'db_connect.php';
	$s="SELECT * FROM letters WHERE id='".$_GET['id']."'";
	$b= mysql_query($s);
	if(mysql_num_rows($b) >= 1)
	{
		$dota=mysql_fetch_array($b);
		$str = "INSERT INTO letters (id,senderID,recieverID,sentDate,recievedDate,subject,context,private,priority,actionType,attachment)
				VALUES('".generate()."','".$_SESSION['username']."','"
				.$dota['senderID']."','".date("Y-m-d H:i:s")."',NULL, 'برگشت:".$dota['subject']."' , 'بعلت نقص مدرک بازگشت داده شده است\n".$dota['context']."' ,'"
				.$dota['private']."', '".$dota['priority']."', 'جهت بررسی و اقدام لازم', '"
				.$dota['attachment']."')";
		$quer=mysql_query($str);
		if(mysql_affected_rows() == 1)
		{
			$qerror=mysql_query("SELECT errorNum FROM users WHERE id = '".$_SESSION['username']."'");
			$qdata=mysql_fetch_array($qerror);
			$error=$qdata['errorNum']+1;
			$errorupdate = mysql_query("UPDATE users SET errorNum = '".$error."' WHERE id = '".$dota['senderID']."'");
			if(mysql_affected_rows() == 1)
				header("Location: inbox.php?result=bargashtSuccess");
		}
		else
			header("Location: inbox.php?result=bargashtFailed");
	}
}
?>