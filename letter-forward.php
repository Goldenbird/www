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
if($_GET['action'] == "forward") 
{
	$parent=$_GET['parID'];
	$composit_to = $_POST['realTo'];
	$subject = $_POST['subject'];
	$private = $_POST['private'];
	$actionType = $_POST['actionType'];
	$content = $_POST['message'];
	$sentDate = date("Y-m-d H:i:s");
	//echo $to . "<br>". $subject . "<br>". $private . "<br>". $actionType . "<br>". $content . "<br>". $sentDate . "<br>";
	include 'db_connect.php';
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
				header("Location: forward.php?result=attachmentfailure");	
			}
	}
	else if($_FILES['attachment']['error'] ==  UPLOAD_ERR_NO_FILE){
		$path = "NULL";
	}
	$temp = "Gg";
	$aftt=0;
	$tos=explode("|",$composit_to,1000);
	$quer=mysql_query("select * from letters where id='".$parent."'");
	$mfa= mysql_fetch_array($quer);
	$content=$content."--------------------------------".$mfa['context'];
	foreach($tos as $x)
	{
		$to="".$x;
		if($to=="")
			break;
		if($to[0]==$temp[0] || $to[0]==$temp[1])
		{
			$gid = substr($to, 1);//to="G4"
			$qu=mysql_query("SELECT memberID FROM membership WHERE groupID ='".$gid."'");
			$query="insert into letters (id,senderID,recieverID,sentDate,recievedDate,subject,context,private,actionType, attachment,parent) values";
			for($i=0; $i<mysql_num_rows($qu); $i++)
			{
				$data = mysql_fetch_array($qu);
				if($i != 0) $query += " ,";
				$query+="('".generate()."','".$_SESSION['username']."','".$data['memberID']."','".$sentDate."',NULL,'".$subject."','".$content."','".$private."','".$actionType."','".$path."','".$parent."')";
			}
		}
		else
		{
			$query="insert into letters (id,senderID,recieverID,sentDate,recievedDate,subject,context,private,actionType, attachment,parent)
			values('". generate()."','".$_SESSION['username']."','".$to."','".$sentDate."',NULL,'".$subject."','".$content."','".$private."','".$actionType."','".$path."','".$parent."')";
		}
		$Q = mysql_query($query);
		$aftt+=mysql_affected_rows();
	}
	if( $aftt > 0)
		header("Location: inbox.php?result=Success&aft=".$aftt);
	else
		header("Location: inbox.php?result=Fail");
}
?>