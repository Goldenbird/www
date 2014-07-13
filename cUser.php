<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_name("oa");
session_start();
 if(isset($_SESSION['username']) == false)
	header("Location: page_login.php charset=utf-8");
if($_GET['action'] == "create") 
{
	include 'db_connect.php';
	$imgname = ($_FILES['image']['name']);//no need
	if ($_FILES['image']['error'] == UPLOAD_ERR_OK){
		if (!preg_match('/gif|png|x-png|jpeg|jpg/', $_FILES['image']['type']) )
		   die('Only browser compatible images allowed');
		else if ($_FILES['image']['size'] >  200000)//max = 16384
		   die('Sorry file too large');
		$ext=substr($_FILES['image']['type'], 6);
		$path="images/".$_POST['username'].".".$ext;
		if(!move_uploaded_file($_FILES['image']['tmp_name'], $path))
			header("Location: createUser.php?result=imgfail");
		$path = "'".$path."'";
	}
	else if($_FILES['image']['error'] ==  UPLOAD_ERR_NO_FILE){
		$path = "NULL";
	}
	$quer="INSERT INTO users(`id`, `password`, `name`, `familyName`,`fatherName`, `melliCode`, `nationalCode`, `pob`, `dob`, `gender`, `maritalStatus`, `children`, `doe`, `departmentID`, `occupationID`, `userLevel`, `address`, `phone`, `image`)
	VALUES ('".$_POST['username']."','".md5($_POST['password'])."','".$_POST['firstName']."','".$_POST['familyName']."','".$_POST['fatherName']."','".$_POST['melliCode']."','".$_POST['nationalCode']."','".$_POST['pob']."','".$_POST['dob']."','".$_POST['gender']."','".$_POST['maritalStatus']."','".$_POST['children']."','".$_POST['doe']."','".$_POST['departmentID']."','".$_POST['occupation']."','".$_POST['userLevel']."','".$_POST['address']."','".$_POST['phone']."',".$path.")";
	$user=mysql_query($quer);
	//echo $quer;
	if(mysql_affected_rows() == 1) 
	{
		header("Location: createUser.php?result=success");
	}
	else
	{
		header("Location: createUser.php?result=failed");
	}
}
?>

