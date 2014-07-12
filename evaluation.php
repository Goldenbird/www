<?php/*
error_reporting(E_ALL ^ E_DEPRECATED);
include 'db_connect.php';
$users = mysql_query("select * from users");
$now=strtotime(date("Y-m-d H:i:s")."");
$countUser = mysql_num_rows($users);
$totalWorkDone=array();//$countUser :tedad khunehaye array

$WTI = array();
$RP = 0;
$NP = 0;
$EP = 0;
$grade = 0;
//calculate RP
for($i=0; $i<$countUser; $i++)
{	
	//each normal user
	$user = mysql_fetch_array($users);
	//unread letters
	$unread_num=mysql_num_rows(mysql_query("select * from letters where recieverID='".$user['id']."' AND recievedDate IS NULL"));
	//tedad forward
	$countForward = mysql_num_rows(mysql_query("select * from letters where senderID='".$user['id']."' AND parent <> 'NULL' "));
	//tedad hamesh
	$countHamesh = mysql_num_rows(mysql_query("select * from hamesh where senderID='".$user['id']."'"));
	//tedad error ha
	$countError = $user['errorNum'];
	//tedad kole nameha
	$countLetter =  mysql_num_rows(mysql_query("select * from letters where senderID='".$user['id']."'"));
	$totalWorkDone[$i]=$countHamesh+$countForward;
	$totalWork=$countLetter;
	print_r($user['id']);
	echo '</br>';
	echo 'Count hamesh:'.$countHamesh;
	echo '</br>';
	echo 'count forward:'.$countForward;
	echo '</br>';
	echo 'total work done: '.$totalWorkDone[$i];
	echo '</br>';
	echo 'total work: '.$totalWork;
	echo '</br>';
	//محاسبه عملکرد واقعی
	if($totalWork == 0)
	{
		echo "RP: 0";
		echo '</br>';
	}
	else
	{
		$RP = $totalWorkDone[$i]/$totalWork;
		echo 'RP:'.$RP;
		echo '</br>';
	}
	//calculate NP
	$total = 0;
	for($j=0; $j<$unread_num; $j++)
	{
		$data=mysql_fetch_array(mysql_query("select * from letters where recieverID='".$user['id']."' AND recievedDate IS NULL"));
		$age=$now-strtotime($data['sentDate']);
		$deadline=72;
		if($data['priority']=="1")
			$deadline=72;
		else if($data['priority']=="2")
			$deadline=24;
		else if($data['priority']=="3")
			$deadline=1;
		$remainder=($deadline*3600)-$age;
		if($remainder <= 0)
			$total += 1;
	}
	if($totalWorkDone[$i]==0)
	{
		echo "NP can't be processed as the user haven't done any work";
		echo '</br>';
	}
	else
	{
		$NP = ($total+$countError)/$totalWorkDone[$i];
		echo 'NP: '.$NP;
		echo '</br>';
	}
		
	//calculate EP
	$EP = $RP*(1-$NP);
	echo 'EP: '.$EP;
	echo '</br>';

	//calculate WTI : karkarde user dar system
	$userLog = mysql_query("select * from login where userID='".$user['id']."'");
	$countLog = mysql_num_rows($userLog);

	$WTI[$i] = 0;
	for($k=0; $k<$countLog; $k++)
	{	
		$log = mysql_fetch_array($userLog);
		$WTI[$i] += ($log['logout']-$log['login']);
	}
	echo 'WTI: '.$WTI[$i] ;
	echo '</br>';
	$grade = $EP*$WTI[$i];
	echo 'grade: '.$grade;
	echo '</br>';echo '</br>'; 
}*/?>
<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_name("oa");
session_start();
include 'db_connect.php';
if(isset($_SESSION['username']) == false) 
	header("Location: page_login.php");
else
	$bye=mysql_query("UPDATE login SET logout='".date("Y-m-d H:i:s")."' WHERE userID='".$_SESSION['username']."' AND login='".$_SESSION['loginTime']."'");

?>

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
	<title>Metronic | Visual Charts</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="MobileOptimized" content="320">
	<!-- BEGIN GLOBAL MANDATORY STYLES -->          
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN THEME STYLES --> 
	<link href="assets/css/style-metronic-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style-responsive-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/plugins-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/themes/default-rtl.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="assets/css/custom-rtl.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed" onload="notifer()">
	<!-- BEGIN HEADER -->   
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="header-inner">
			<!-- BEGIN LOGO -->  
			<a class="navbar-brand" href="index.php">
			<img src="assets/img/logo.png" alt="logo" class="img-responsive" />
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
				<li class="start active">
					<a href="index.php">
					<i class="fa fa-home"></i> 
					<span class="title">داشبورد</span>
					<span class="selected"></span>
					</a>
				</li>
				<li>
					<a href="compose.php">
					<i class="fa fa-cogs"></i> 
					<span class="title">ایجاد نامه</span>
					</a>
				</li>
				<li>
					<a href="createGroup.php">
					<i class="fa fa-cogs"></i> 
					<span class="title">ایجاد گروه</span>
					</a>
				</li>
				<li>
					<a href="inbox.php">
					<i class="fa fa-cogs"></i> 
					<span class="title">کارتابل</span>
					</a>
				</li>
				<li class="last open">
					<a href="evaluation.php">
					<i class="fa fa-bar-chart-o"></i> 
					<span class="title">ارزشیابی</span>
					</a>
					<ul class="sub-menu">
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
					</ul>
				</li>
				<?php
					 if($_SESSION['type']!= "admin")
					{	
						echo "<!--" ;
					}
				?>
				<li class="last ">
					<a href="createUser.php">
					<i class="fa fa-bar-chart-o"></i> 
					<span class="title">ایجاد کاربر</span>
					</a>
				</li>
				<li class="last ">
					<a href="createOccupation.php">
					<i class="fa fa-bar-chart-o"></i> 
					<span class="title">ایجاد سمت</span>
					</a>
				</li>
				<li class="last ">
					<a href="showUsers.php">
					<i class="fa fa-bar-chart-o"></i> 
					<span class="title">نمایش کاربران</span>
					</a>
				</li>
				<li class="last ">
					<a href="showDepartments.php">
					<i class="fa fa-bar-chart-o"></i> 
					<span class="title">نمایش بخش ها</span>
					</a>
				</li>
				<li class="last ">
					<a href="showOccupation.php">
					<i class="fa fa-bar-chart-o"></i> 
					<span class="title">نمایش سمت ها</span>
					</a>
				</li>
				<?php
					 if($_SESSION['type']!= "admin")
					{	
						echo "-->" ;
					}
				?>
				<li class="tooltips" data-placement="left" data-original-title="Frontend&nbsp;Theme For&nbsp;Metronic&nbsp;Admin">
					<a href="userEdit.php">
					<i class="fa fa-gift"></i> 
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
					<h3 class="page-title">
						<small>visual charts & graphs</small>
						Visual Charts
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li class="btn-group">
							<button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
							<span>Actions</span> <i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right" role="menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</li>
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">Home</a> 
							<i class="fa fa-angle-left"></i>
						</li>
						<li><a href="#">Visual Charts</a></li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN CHART PORTLETS-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN BASIC CHART PORTLET-->
	<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption"><i class="fa fa-reorder"></i>Bar Chart</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="#portlet-config" data-toggle="modal" class="config"></a>
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="chart_1_1_legendPlaceholder"></div>
							<div id="chart_1_1" class="chart" style="padding: 0px; position: relative;">
							<canvas class="flot-base" width="976" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 976px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
							<div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 81px; top: 278px; left: 74px; text-align: center;">2</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 81px; top: 278px; left: 169px; text-align: center;">4</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 81px; top: 278px; left: 264px; text-align: center;">6</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 81px; top: 278px; left: 358px; text-align: center;">8</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 81px; top: 278px; left: 449px; text-align: center;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 81px; top: 278px; left: 544px; text-align: center;">12</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 81px; top: 278px; left: 638px; text-align: center;">14</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 81px; top: 278px; left: 733px; text-align: center;">16</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 81px; top: 278px; left: 827px; text-align: center;">18</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 81px; top: 278px; left: 922px; text-align: center;">20</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 263px; left: 18px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 210px; left: 10px; text-align: right;">50</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 158px; left: 2px; text-align: right;">100</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 105px; left: 2px; text-align: right;">150</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 53px; left: 2px; text-align: right;">200</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 2px; text-align: right;">250</div></div></div><canvas class="flot-overlay" width="976" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 976px; height: 300px;"></canvas></div>
						</div>
					</div>
					<!-- END BASIC CHART PORTLET-->    
			<!-- END PAGE CONTENT-->    
		</div>
		<!-- END PAGE --> 
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			2013 &copy; Metronic by keenthemes.
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
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="assets/plugins/flot/jquery.flot.js"></script>
	<script src="assets/plugins/flot/jquery.flot.resize.js"></script>
	<script src="assets/plugins/flot/jquery.flot.pie.js"></script>
	<script src="assets/plugins/flot/jquery.flot.stack.js"></script>
	<script src="assets/plugins/flot/jquery.flot.crosshair.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="assets/scripts/app.js"></script>
	<script src="assets/scripts/charts.js"></script>      
	<script>
		jQuery(document).ready(function() {       
		   // initiate layout and plugins
		   App.init();
		   Charts.init();
		   Charts.initCharts();  
		   Charts.initBarCharts();
		});
	</script>
	<!-- END PAGE LEVEL SCRIPTS -->
</body>
<!-- END BODY -->
</html>