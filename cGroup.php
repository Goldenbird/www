<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_name("oa");
session_start();
 if(isset($_SESSION['username']) == false)
	header("Location: page_login.php charset=utf-8");
if($_GET['action'] == "create") 
{
	include 'db_connect.php';
	$str="INSERT INTO groups(name, ownerID) VALUES ('".$_POST['gName']."','".$_SESSION['username']."')";
	$query=mysql_query($str);
	//echo $query;
	if(mysql_affected_rows() == 1) 
	{
		$q = mysql_query("SELECT id FROM groups WHERE name = '".$_POST['gName']."' AND ownerID = '".$_SESSION['username']."'");
		$id = mysql_fetch_array($q);
		foreach($_POST['members'] as $memID)
		{
			$quer=mysql_query("INSERT INTO membership (groupID, memberID) VALUES ('".$id['id']."', '".$memID."') ");
		}
		//header("Location: createGroup.php?result=success");
		header("Location: alertResult.php?result=1");
	}
	else
	{
		//header("Location: createGroup.php?result=fail");
		header("Location: alertResult.php?result=0");
	}
	
}
?>

