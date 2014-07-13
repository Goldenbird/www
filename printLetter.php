<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_name("oa");
session_start();
 if(isset($_SESSION['username']) == false)
	header("Location: page_login.php charset=utf-8");
?>
<html>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.0.2
Version: 1.5.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>سیستم اتوماسیون اداری | Admin Dashboard </title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<meta name="MobileOptimized" content="320">
</head>
<body onload="printLetter()">
	<?php
	include 'db_connect.php';
		$q=mysql_query("SELECT * from letters where id='".$_GET['letter']."'");
		if(mysql_num_rows($q) == 0)
			die('نامه ای یافت نشد.');
		$letter = mysql_fetch_array($q);
		$data=mysql_query("SELECT name, familyName FROM users WHERE id='".$letter['senderID']."'");
		$senderName = mysql_fetch_array($data);
		$data=mysql_query("SELECT name, familyName FROM users WHERE id='".$letter['recieverID']."'");
		$recieverName = mysql_fetch_array($data);
	echo('<div class ="row">	
		<div class="col-md-7">
			<p align = "right">از:'.$senderName['name'].' '.$senderName['familyName'].'</p>
			<p align = "right">به:'.$recieverName['name'].' '.$recieverName['familyName'].'</p>
			<p align = "right">موضوع:'.$letter['subject'].'</p>
		</div>
		<div class="col-md-5">
			<p align = "right">شماره:'.$letter['id'].'</p>
			<p align = "right">تاریخ:'.$letter['sentDate'].'</p>
			<!-- <p align = "right">پیوست:</p> -->
		</div>
	</div>
	</br>
	<div class = "row">
		<p align = "right">'.$letter['context'].'</p>
</div>');

	?>
</body>
<script>
function printLetter() {
    window.print();
}

</script>
</html>