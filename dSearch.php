<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include 'db_connect.php';
session_name("oa");
session_start();
if(isset($_SESSION['username']) == false)
	header("Location: page_login.php charset=utf-8");
else
	$bye=mysql_query("UPDATE login SET logout='".date("Y-m-d H:i:s")."' WHERE userID='".$_SESSION['username']."' AND login='".$_SESSION['loginTime']."'");

function replace_unicode_escape_sequence($match) {
	return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
}
function unicode_decode($str) {
	return preg_replace_callback('/%u([^m-z]{4})/i', 'replace_unicode_escape_sequence', $str);
}
if($_GET['action'] == "search") 
{
	$docType = $_POST['docType'];
	$sender = $_POST['realToSender'];
	$reciever = $_POST['realToReciever'];
	$sentFrom = $_POST['sentDateFrom'];
	$sentTo = $_POST['sentDateTo'];
	$recievedFrom = $_POST['recieveDateFrom'];
	$recievedTo = $_POST['recieveDateTo'];
	$subject = $_POST['subject'];
	$keyword = $_POST['keyword'];
	$privacy = $_POST['privacy'];
	$priority = $_POST['priority'];
	//sender,reciever
	"SELECT * FROM `letters` WHERE `id``senderID``recieverID``sentDate``recievedDate``subject``context``private``actionType`
				`status``priority``trash``error``attachment``parent`";
	if($docType = "نامه دریافتی")
	{
		$q1 = "SELECT * FROM letters WHERE recieverID = '".$_SESSION['username']."' AND senderID = '".$sender."' AND ".
		(($sentFrom!="" && $sentTo!="")?("sentDate BETWEEN '".$sentFrom."' AND '".$sentTo."' AND "):("")).
		(($recievedFrom!="" && $recievedTo!="")?("recievedDate BETWEEN '".$recievedFrom."' AND '".$recievedTo."' AND "):("")).
		(($subject!="")?("subject = '".unicode_decode($subject)."%' AND "):("")).
		(($keyword!="")?("context like('".unicode_decode($keyword)."%') AND "):("")).
		(($privacy!="")?("private = ('".($privacy)."%') AND "):("")).
		(($priority!="")?("priority = ('".($privacy)."%') AND "):("")).
		"ORDER BY sentDate";
		$inboxq = str_replace("AND ORDER", " ORDER", $q1);
		echo "inboxq = ".$inboxq;
		$data=mysql_query($inboxq);
	}
	else if($docType = "نامه ارسالی")
	{
		$q2 = "SELECT * FROM letters WHERE senderID = '".$_SESSION['username']."' AND recieverID = '".$reciever."' AND ".
		(($sentFrom!="" && $sentTo!="")?("sentDate BETWEEN '".$sentFrom."' AND '".$sentTo."' AND "):("")).
		(($recievedFrom!="" && $recievedTo!="")?("recievedDate BETWEEN '".$recievedFrom."' AND '".$recievedTo."' AND "):("")).
		(($subject!="")?("subject = '".unicode_decode($subject)."%' AND "):("")).
		(($keyword!="")?("context like('".unicode_decode($keyword)."%') AND "):("")).
		(($privacy!="")?("private = ('".($privacy)."%') AND "):("")).
		(($priority!="")?("priority = ('".($privacy)."%') AND "):("")).
		"ORDER BY sentDate";
		$outboxq = str_replace("AND ORDER", " ORDER", $q1);
	}
}