<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include 'db_connect.php';
session_name("oa");
session_start();
if(isset($_SESSION['username']) == false)
	header("Location: page_login.php charset=utf-8");
else
	$bye=mysql_query("UPDATE login SET logout='".date("Y-m-d H:i:s")."' WHERE userID='".$_SESSION['username']."' AND login='".$_SESSION['loginTime']."'");
?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.0.2
Version: 1.5.4
Author: KeenThemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html class="no-js" lang="en"><!--<![endif]--><!-- BEGIN HEAD -->
<head>
<style>
		.golabi{
			cursor:pointer;
		}
		.sib{
			cursor:default;
		}
		.unread
		{
			background-color:#7FDFFF;
		}
	</style>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>سیستم اتوماسیون اداری |جست و جوی مدرک</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	<meta name="MobileOptimized" content="320">
	<!-- BEGIN GLOBAL MANDATORY STYLES -->          
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<link href="assets/plugins/gritter/css/jquery.gritter-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>  
	<!-- END PAGE LEVEL STYLES -->
	<!-- BEGIN THEME STYLES --> 
	<link href="assets/css/style-metronic-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style-responsive-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/plugins-rtl.css" rel="stylesheet" type="text/css">
	<link href="assets/css/themes/default-rtl.css" rel="stylesheet" type="text/css" id="style_color">
	<link href="assets/css/inbox-rtl.css" rel="stylesheet" type="text/css">
	<link href="assets/css/custom-rtl.css" rel="stylesheet" type="text/css">
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-closed wysihtml5-supported" onload="notifer()">
	<!-- BEGIN HEADER -->   
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="header-inner">
			<!-- BEGIN LOGO -->  
			<a class="navbar-brand" href="index.php">
			</a>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER --> 
			<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<img src="assets/img/menu-toggler.png" alt="" />
			</a> 
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<ul class="nav navbar-nav pull-right">
				
				<!-- BEGIN INBOX DROPDOWN -->
				<li class="dropdown" id="header_inbox_bar" onclick="notifer()">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" 	data-close-others="true"  >
					<i class="fa fa-envelope"></i>
					<span class="badge" id="notifNum">0</span>
					</a>
					<ul class="dropdown-menu extended inbox" id="notifList" >
						
						
					</ul>
				</li>
				<!-- END INBOX DROPDOWN -->
				
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" width="30px" height="30px" src="<?php echo $_SESSION['img']; ?>"/>
					<span class="username">
					<?php 
					echo $_SESSION['fname']." ".$_SESSION['sname'];
					?>
					</span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="userEdit.php"><i class="fa fa-user"></i>مشخصات کاربری</a></li>
						<li><a href="inbox.php"><i class="fa fa-envelope"></i>کارتابل</a></li>
						<li class="divider"></li>
						<li><a href="page_login.php"><i class="fa fa-key"></i>خروج</a></li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<div class="clearfix"></div>
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->        
			<ul class="page-sidebar-menu">
				<li>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone"></div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON --> 
				</li>
				<li>
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search" action="extra_search.html" method="POST">
						<div class="form-container">
							<div class="input-box">
								<a href="javascript:;" class="remove"></a>
								<input type="text" placeholder="جست و جو"/>
								<input type="button" class="submit" value=" "/>
							</div>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li>
					<a href="index.php">
					<i class="fa fa-home"></i> 
					<span class="title">داشبورد</span>
					<span class="selected"></span>
					</a>
				</li>
				<li>
					<a href="compose.php">
					<i class="fa fa-pencil"></i> 
					<span class="title">ایجاد نامه</span>
					</a>
				</li>
				<li>
					<a href="inbox.php">
					<i class="fa fa-envelope"></i> 
					<span class="title">کارتابل</span>
					</a>
				</li>
				<li>
					<a href="createGroup.php">
					<i class="fa fa-group"></i> 
					<span class="title">ایجاد گروه</span>
					</a>
				</li>
				<?php
					 if($_SESSION['type']!= "admin")
					{	
						echo "<!--" ;
					}
				?>
				<li class="last ">
					<a href="createUser.php">
					<i class="fa fa-plus"></i> 
					<span class="title">ایجاد کاربر</span>
					</a>
				</li>
				<li class="last ">
					<a href="createOccupation.php">
					<i class="fa fa-plus"></i> 
					<span class="title">ایجاد سمت</span>
					</a>
				</li>
				<li class="last ">
					<a href="showUsers.php">
					<i class="fa fa-picture-o"></i> 
					<span class="title">نمایش کاربران</span>
					</a>
				</li>
				<li class="last ">
					<a href="showDepartments.php">
					<i class="fa fa-wrench"></i> 
					<span class="title">نمایش بخش ها</span>
					</a>
				</li>
				<li class="last ">
					<a href="showOccupation.php">
					<i class="fa fa-sitemap"></i> 
					<span class="title">نمایش سمت ها</span>
					</a>
				</li>
				<li class="last open">
					<a href="evaluation.php">
					<i class="fa fa-bar-chart-o"></i> 
					<span class="title">ارزشیابی</span>
					</a>
					<!--<ul class="sub-menu">
						<li>
						<a href="evaluation_form.php"><span class="title">اطلاعات پایه</span></a>
						</li>
						<li>
						<a href="evaluation_charts.php"><span class="title">گزارش ها</span></a>
						<ul class="sub-menu">
							<li>
								<a href=""><span class="title">ارزیابی از طریق سیستم</span></a>
							</li>
							<li>
								<a href=""><span class="title">کارنامه ارزشیابی</span></a>
							</li>
						</ul>
						</li>
					</ul>-->
				</li>
				<?php
					 if($_SESSION['type']!= "admin")
					{	
						echo "-->" ;
					}
				?>
				<li>
					<a href="myEval.php">
					<i class="fa fa-bar-chart-o"></i> 
					<span class="title">کارنامه ی ارزشیابی من</span>
					</a>
				</li>
				<li>
					<a href="userEdit.php">
					<i class="fa fa-user"></i> 
					<span class="title">مشخصات کاربری</span>
					</a>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->               
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
			<div class="theme-panel hidden-xs hidden-sm">
				<div class="toggler"></div>
				<div class="toggler-close"></div>
				<div class="theme-options">
					<div class="theme-option theme-colors clearfix">
						<span>THEME COLOR</span>
						<ul>
							<li class="color-black current color-default" data-style="default-rtl"></li>
							<li class="color-blue" data-style="blue-rtl"></li>
							<li class="color-brown" data-style="brown-rtl"></li>
							<li class="color-purple" data-style="purple-rtl"></li>
							<li class="color-grey" data-style="grey-rtl"></li>
							<li class="color-white color-light" data-style="light-rtl"></li>
						</ul>
					</div>
					<div class="theme-option">
						<span>Layout</span>
						<select class="layout-option form-control input-small">
							<option value="fluid" selected="selected">Fluid</option>
							<option value="boxed">Boxed</option>
						</select>
					</div>
					<div class="theme-option">
						<span>Header</span>
						<select class="header-option form-control input-small">
							<option value="fixed" selected="selected">Fixed</option>
							<option value="default">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>Sidebar</span>
						<select class="sidebar-option form-control input-small">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>Footer</span>
						<select class="footer-option form-control input-small">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
				</div>
			</div>
			<!-- END BEGIN STYLE CUSTOMIZER -->  
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title" >
						<small></small>
						نامه 
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.php">خانه</a> 
							<i class="fa fa-angle-left"></i> 
						</li>
						<li>
							<i class="fa fa-search"></i>
							<a href="#">جست و جوی مدرک</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
		<table class="table table-striped table-advance table-hover">
	<thead>
		<tr style="width:100%;">
			<th colspan="6">
			</th>
			<th class="pagination-control" colspan="3">
				
			</th>
		</tr>
	</thead>
	<tbody>
<?php
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
//	"SELECT * FROM `letters` WHERE `id``senderID``recieverID``sentDate``recievedDate``subject``context``private``actionType`
	//			`status``priority``trash``error``attachment``parent`";
	if($docType = "نامه دریافتی")
	{
		$s1 = "SELECT * FROM letters WHERE trash = '0' AND recieverID = '".$_SESSION['username']."' ";
		if($sender!="") $s1=$s1."AND senderID = '".$sender."' ";
		if($sentFrom!="" && $sentTo!="") $s1= $s1."AND sentDate BETWEEN '".$sentFrom."' AND '".$sentTo."' ";
		if($recievedFrom!="" && $recievedTo!="") $s1=$s1."AND recievedDate BETWEEN '".$recievedFrom."' AND '".$recievedTo."' ";
		if($subject!="") $s1=$s1."AND subject like '".unicode_decode($subject)."%' ";
		if($keyword!="") $s1=$s1."AND context like('".unicode_decode($keyword)."%') ";
		if($privacy!="") $s1=$s1."AND private = ('".($privacy)."%') ";
		if($priority!="") $s1=$s1."AND priority = ('".($privacy)."%') ";
		$s1=$s1."ORDER BY sentDate";
		//echo "inboxq = ".$s1;
		$q1=mysql_query($s1);
		for($i=0; $i<mysql_num_rows($q1);$i++)
		{
			$d1=mysql_fetch_array($q1);
			$tmp=mysql_query("SELECT name, familyName FROM users WHERE id='".$d1['senderID']."'");
			$recieverName = mysql_fetch_array($tmp);
			echo
			(
				'<tr ');//onclick="viewMe('.$data['id'].',0)" dar tr bud!
				echo (($d1['recievedDate']==NULL)?('class="unread"'):(''));
				echo('>
					<td class="inbox-small-cells"></td>
					<td class="inbox-small-cells">
						<button id="let'.$d1['id'].'" class="btn default" name="demo_3" type="button" onclick="del(this.id)">Delete</button>
					</td>
					<td class="inbox-small-cells"></td>
					<td class="view-message sib hidden-xs">'.$recieverName['name'].' '.$recieverName['familyName'].'</td>
					<td class="view-message  golabi" name="letS'.$d1['id'].'" onclick="viewMe('.$d1['id'].',0)">'.$d1['subject'].'</td>
					<td class="view-message sib" onclick="viewMe('.$d1['id'].',0)>'); echo (($d1['private'] == '0') ? ('غیرمحرمانه') : ('محرمانه')); echo('</td>
					<td class="view-message sib" onclick="viewMe('.$d1['id'].',0)">'.$d1['actionType'].'</td>
					<td class="view-message sib inbox-small-cells" onclick="viewMe('.$d1['id'].',0)">');
					if($d1['attachment'] != "NULL" && $d1['attachment'] != NULL) echo('<i class="fa fa-paperclip"></i>');
					echo('</td> <td class="view-message sib text-right">'.$d1['sentDate'].'</td>
				</tr>
				'
			);
		}
	}
	else if($docType = "نامه ارسالی")
	{
		$s2 = "SELECT * FROM letters WHERE trash = '0' AND senderID = '".$_SESSION['username']."' ";
		if($reciever!="") $s2=$s2."AND recieverID = '".$reciever."' ";
		if($sentFrom!="" && $sentTo!="") $s2= $s2."AND sentDate BETWEEN '".$sentFrom."' AND '".$sentTo."' ";
		if($recievedFrom!="" && $recievedTo!="") $s2=$s2."AND recievedDate BETWEEN '".$recievedFrom."' AND '".$recievedTo."' ";
		if($subject!="") $s2=$s2."AND subject like '".unicode_decode($subject)."%' ";
		if($keyword!="") $s2=$s2."AND context like('".unicode_decode($keyword)."%') ";
		if($privacy!="") $s2=$s2."AND private = ('".($privacy)."%') ";
		if($priority!="") $s2=$s2."AND priority = ('".($privacy)."%') ";
		$s2=$s2."ORDER BY sentDate";
		//echo "inboxq = ".$s2;
		$q2=mysql_query($s1);
		for($i=0; $i<mysql_num_rows($q2);$i++)
		{
			$d2=mysql_fetch_array($q2);
			$tmp=mysql_query("SELECT name, familyName FROM users WHERE id='".$d2['recieverID']."'");
			$recieverName = mysql_fetch_array($tmp);
			echo
			(
				'<tr ');//onclick="viewMe('.$data['id'].',0)" dar tr bud!
				echo (($d2['recievedDate']==NULL)?('class="unread"'):(''));
				echo('>
					<td class="inbox-small-cells"></td>
					<td class="inbox-small-cells">
						<button id="let'.$d2['id'].'" class="btn default" name="demo_3" type="button" onclick="del(this.id)">Delete</button>
					</td>
					<td class="inbox-small-cells"></td>
					<td class="view-message sib hidden-xs">'.$recieverName['name'].' '.$recieverName['familyName'].'</td>
					<td class="view-message  golabi" name="letS'.$d2['id'].'" onclick="viewMe('.$d2['id'].',0)">'.$d2['subject'].'</td>
					<td class="view-message sib" onclick="viewMe('.$d2['id'].',0)>'); echo (($d2['private'] == '0') ? ('غیرمحرمانه') : ('محرمانه')); echo('</td>
					<td class="view-message sib" onclick="viewMe('.$d2['id'].',0)">'.$d2['actionType'].'</td>
					<td class="view-message sib inbox-small-cells" onclick="viewMe('.$d2['id'].',0)">');
					if($d2['attachment'] != "NULL" && $d2['attachment'] != NULL) echo('<i class="fa fa-paperclip"></i>');
					echo('</td> <td class="view-message sib text-right">'.$d2['sentDate'].'</td>
				</tr>
				
				'
			);
		}
	}
	else if($docType = "پیش نویس")
	{
		$s3 = "SELECT * FROM drafts WHERE senderID = '".$_SESSION['username']."' ";
		if($reciever!="") $s3=$s3."AND recieverID = '".$reciever."' ";
		if($subject!="") $s3=$s3."AND subject like '".unicode_decode($subject)."%' ";
		if($keyword!="") $s3=$s3."AND context like('".unicode_decode($keyword)."%') ";
		if($privacy!="") $s3=$s3."AND private = ('".($privacy)."%') ";
		if($priority!="") $s3=$s3."AND priority = ('".($privacy)."%') ";
		$s3=$s3."ORDER BY sentDate";
		//echo "inboxq = ".$s3;
		$q3=mysql_query($s1);
		for($i=0; $i<mysql_num_rows($q3);$i++)
		{
			$d3=mysql_fetch_array($q3);
			$tmp=mysql_query("SELECT name, familyName FROM users WHERE id='".$d3['senderID']."'");
			$recieverName = mysql_fetch_array($tmp);
			echo
			(
				'<tr ');//onclick="viewMe('.$data['id'].',0)" dar tr bud!
				echo (($d3['recievedDate']==NULL)?('class="unread"'):(''));
				echo('>
					<td class="inbox-small-cells"></td>
					<td class="inbox-small-cells">
						<button id="let'.$d3['id'].'" class="btn default" name="demo_3" type="button" onclick="del(this.id)">Delete</button>
					</td>
					<td class="inbox-small-cells"></td>
					<td class="view-message sib hidden-xs">'.$recieverName['name'].' '.$recieverName['familyName'].'</td>
					<td class="view-message  golabi" name="letS'.$d3['id'].'" onclick="viewMe('.$d3['id'].',0)">'.$d3['subject'].'</td>
					<td class="view-message sib" onclick="viewMe('.$d3['id'].',0)>'); echo (($d3['private'] == '0') ? ('غیرمحرمانه') : ('محرمانه')); echo('</td>
					<td class="view-message sib" onclick="viewMe('.$d3['id'].',0)">'.$d3['actionType'].'</td>
					<td class="view-message sib inbox-small-cells" onclick="viewMe('.$d3['id'].',0)">');
					if($d3['attachment'] != "NULL" && $d3['attachment'] != NULL) echo('<i class="fa fa-paperclip"></i>');
					echo('</td> <td class="view-message sib text-right">'.$d3['sentDate'].'</td>
				</tr> 
				'
			);
		}
	}
	else if($docType = "بازیافت")
	{
		$s4 = "SELECT * FROM letters WHERE trash = '1' AND recieverID = '".$_SESSION['username']."' ";
		if($sender!="") $s4=$s4."AND senderID = '".$sender."' ";
		if($sentFrom!="" && $sentTo!="") $s4= $s4."AND sentDate BETWEEN '".$sentFrom."' AND '".$sentTo."' ";
		if($recievedFrom!="" && $recievedTo!="") $s4=$s4."AND recievedDate BETWEEN '".$recievedFrom."' AND '".$recievedTo."' ";
		if($subject!="") $s4=$s4."AND subject like '".unicode_decode($subject)."%' ";
		if($keyword!="") $s4=$s4."AND context like('".unicode_decode($keyword)."%') ";
		if($privacy!="") $s4=$s4."AND private = ('".($privacy)."%') ";
		if($priority!="") $s4=$s4."AND priority = ('".($privacy)."%') ";
		$s4=$s4."ORDER BY sentDate";
		//echo "inboxq = ".$s4;
		$q4=mysql_query($s1);
		for($i=0; $i<mysql_num_rows($q4);$i++)
		{
			$d4=mysql_fetch_array($q4);
			$tmp=mysql_query("SELECT name, familyName FROM users WHERE id='".$d4['recieverID']."'");
			$recieverName = mysql_fetch_array($tmp);
			echo
			(
				'<tr ');//onclick="viewMe('.$data['id'].',0)" dar tr bud!
				echo (($d4['recievedDate']==NULL)?('class="unread"'):(''));
				echo('>
					<td class="inbox-small-cells"></td>
					<td class="inbox-small-cells">
						<button id="let'.$d4['id'].'" class="btn default" name="demo_3" type="button" onclick="del(this.id)">Delete</button>
					</td>
					<td class="inbox-small-cells"></td>
					<td class="view-message sib hidden-xs">'.$recieverName['name'].' '.$recieverName['familyName'].'</td>
					<td class="view-message  golabi" name="letS'.$d4['id'].'" onclick="viewMe('.$d4['id'].',0)">'.$d4['subject'].'</td>
					<td class="view-message sib" onclick="viewMe('.$d4['id'].',0)>'); echo (($d4['private'] == '0') ? ('غیرمحرمانه') : ('محرمانه')); echo('</td>
					<td class="view-message sib" onclick="viewMe('.$d4['id'].',0)">'.$d4['actionType'].'</td>
					<td class="view-message sib inbox-small-cells" onclick="viewMe('.$d4['id'].',0)">');
					if($d4['attachment'] != "NULL" && $d4['attachment'] != NULL) echo('<i class="fa fa-paperclip"></i>');
					echo('</td> <td class="view-message sib text-right">'.$d4['sentDate'].'</td>
				</tr>
				'
			);
		}
	}
}
?>
</tbody>
</table>
</div> <!--end of page content--> 
</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			2013 © Metronic by keenthemes.
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="fa fa-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   
	<!--[if lt IE 9]>
	<script src="assets/plugins/respond.min.js"></script>
	<script src="assets/plugins/excanvas.min.js"></script> 
	<![endif]-->   
	<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>   
	<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<script src="assets/scripts/app.js"></script>      
	<script src="assets/scripts/inbox.js"></script> 	
	<script>
		jQuery(document).ready(function() {       
		   // initiate layout and plugins
		   App.init();
		   Inbox.init();
		   <?php
				if(isset($_GET['loadview']))
					echo"viewMe('".$_GET['loadview']."',0)";
		   ?>
		});
	</script>
	<script>
		function del(id)
		{
		  if (confirm('آیا می خواهید این نامه پاک شود؟'))
				window.location.href="deleteLetter.php?letDel="+id.substr(3);
		}
		function viewMe(id,draft)
		{
			var url="inbox.php?loadview="+id;
			window.location.href=url;
			
		}
</script>
<script type="text/javascript" src="assets/plugins/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery.blockui.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery.cookie.min.js"></script>
<script type="text/javascript" src="assets/plugins/uniform/jquery.uniform.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootbox/bootbox.min.js"></script>
<script src="assets/scripts/app.js"></script>
<script src="assets/scripts/ui-bootbox.js"></script>
<script src="assets/scripts/myplugins.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
// initiate layout and plugins
App.init();
UIBootbox.init();

});

</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>