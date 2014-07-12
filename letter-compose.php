<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_name("oa");
session_start();
include 'db_connect.php';
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
if($_GET['action'] == "compose") 
{
	$composit_to = $_POST['realTo'];
	$subject = $_POST['subject'];
	$private = $_POST['private'];
	$priority = $_POST['priority'];
	$actionType = $_POST['actionType'];
	$content = $_POST['message'];
	$sentDate = date("Y-m-d H:i:s");
	//echo $to . "<br>". $subject . "<br>". $private . "<br>". $actionType . "<br>". $content . "<br>". $sentDate . "<br>";
	$attachName = ($_FILES['attachment']['name']);
	if($_FILES['attachment']['error'] == UPLOAD_ERR_OK)
	{
		if(!preg_match('/gif|png|x-png|jpeg|jpg|pdf|doc|txt|docx|ppt|pptx|xlsx/', $_FILES['attachment']['type']) )
		   die('Only browser compatible files allowed');
		else if ($_FILES['attachment']['size'] > 2000000)//max = 16384
		   die('Sorry file too large');
		// Copy image file into a variable
		else {
			if (preg_match('/gif|png|x-png|jpeg|jpg/', $_FILES['attachment']['type']) )
			{
				$ext=substr($_FILES['attachment']['type'], 6);//eg. : image/jpeg
				$path="C:/wamp/www/files/".$letID.".".$ext; // it should be $path="files/".$letID.".".$ext; AFTER LETTERID IS CORRECTLY GENERATED
			}
			else if(preg_match('/pdf|doc|docx|ppt|pptx|xlsx/', $_FILES['attachment']['type']) )
			{
				$ext=substr($_FILES['attachment']['type'], 12);//eg. : application/pdf
				$path="files/".$letID.".".$ext; // it should be $path="files/".$letID.".".$ext; AFTER LETTERID IS CORRECTLY GENERATED
			}
			if(!move_uploaded_file($_FILES['attachment']['tmp_name'], $path)) 
				header("Location: compose.php?result=attachmentfailure");	
			}
	}
	else if($_FILES['attachment']['error'] ==  UPLOAD_ERR_NO_FILE){
		$path = "NULL";
	}
	$temp = "Gg";
	$aftt=0;
	$tos=explode("|",$composit_to,1000);
	foreach($tos as $x)
	{
		$to="".$x;
		if($to=="")
			break;
		if($to[0]==$temp[0] || $to[0]==$temp[1])
		{
			$gid = substr($to, 1);//to="G4"
			$qu=mysql_query("SELECT memberID FROM membership WHERE groupID ='".$gid."'");
			$query="insert into letters (id,senderID,recieverID,sentDate,recievedDate,subject,context,private,priority,actionType, attachment) values";
			for($i=0; $i<mysql_num_rows($qu); $i++)
			{
				$data = mysql_fetch_array($qu);
				if($i != 0) $query += " ,";
				$query+="('".generate()."','".$_SESSION['username']."','".$data['memberID']."','".$sentDate."',NULL,'".$subject."','".$content."','".$private."','".$priority."','".$actionType."','".$path."')";
			}
		}
		else
		{
			$query="insert into letters (id,senderID,recieverID,sentDate,recievedDate,subject,context,private,priority,actionType, attachment)
			values('". generate()."','".$_SESSION['username']."','".$to."','".$sentDate."',NULL,'".$subject."','".$content."','".$private."','".$priority."','".$actionType."','".$path."')";
		}
		$Q = mysql_query($query);
		$aftt+=mysql_affected_rows();
	}
	if( $aftt > 0)
		header("Location: compose.php?result=Success&aft=".$aftt);
	else
		header("Location: compose.php?result=Fail");
}
else if($_GET['action'] == "draft") 
{
	$attachName = ($_FILES['attachment']['name']);
	if($_FILES['attachment']['error'] == UPLOAD_ERR_OK)
	{
		if(!preg_match('/gif|png|x-png|jpeg|jpg|pdf|doc|txt|docx|ppt|pptx|xlsx/', $_FILES['attachment']['type']) )
		   die('Only browser compatible files allowed');
		else if ($_FILES['attachment']['size'] > 2000000)//max = 16384
		   die('Sorry file too large');
		// Copy image file into a variable
		else {
			if (preg_match('/gif|png|x-png|jpeg|jpg/', $_FILES['attachment']['type']) )
			{
				$ext=substr($_FILES['attachment']['type'], 6);//eg. : image/jpeg
				$path="C:/wamp/www/files/".$letID.".".$ext; // it should be $path="files/".$letID.".".$ext; AFTER LETTERID IS CORRECTLY GENERATED
			}
			else if(preg_match('/pdf|doc|docx|ppt|pptx|xlsx/', $_FILES['attachment']['type']) )
			{
				$ext=substr($_FILES['attachment']['type'], 12);//eg. : application/pdf
				$path="files/".$letID.".".$ext; // it should be $path="files/".$letID.".".$ext; AFTER LETTERID IS CORRECTLY GENERATED
			}
			if(!move_uploaded_file($_FILES['attachment']['tmp_name'], $path)) 
				header("Location: compose.php?result=attachmentfailure");	
			}
	}
	else if($_FILES['attachment']['error'] ==  UPLOAD_ERR_NO_FILE){
		$path = "NULL";
	}
	$qDraft="insert into drafts (senderID,recieverID,subject,context,private,priority,actionType)
			values('".$_SESSION['username']."','".$to."','".$subject."','".$content."','".$private."','".$priority."','".$actionType."')";
	/*$ss = "INSERT INTO drafts (senderID,".
			(($_POST['realTo'] != "")?(" recieverID,"):("")).
			(($_POST['subject'] != "")?(" subject,"):("")).
			(($_POST['message'] != "")?(" context,"):("")).
			(($_POST['private'] != "")?(" private,"):("")).
			(($_POST['priority'] != "")?(" priority,"):("")).
			(($_POST['actionType'] != "")?(" actionType,"):("")).
			(($_FILES['attachment']['error'] == UPLOAD_ERR_OK)?("attachment "):(""));
	$str2 = str_replace(",attachment", " attachment", $ss);
	$str2 = $str2.$_SESSION['username'].
			(($_POST['realTo'] != "")?(" '".$_POST['realTo']."',"):("")).
			(($_POST['subject'] != "")?(" '".$_POST['subject']."',"):("")).
			(($_POST['message'] != "")?(" '".$_POST['message']."',"):("")).
			(($_POST['private'] != "")?(" '".$_POST['private']."',"):("")).
			(($_POST['priority'] != "")?(" '".$_POST['priority']."',"):("")).
			(($_POST['actionType'] != "")?(" '".$_POST['actionType']."',"):("")).
			(($_FILES['attachment']['error'] == UPLOAD_ERR_OK)?($path):(""));
			*/
	$que = mysql_query($qDraft);
	echo $qDraft;
	if(mysql_affected_rows()>0)
		header("Location: compose.php?result=draftSucceeded");
	else
		header("Location: compose.php?result=draftFailed");
	//*/
}
?>