<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_name("oa");
session_start();
include 'db_connect.php';
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
Website: http://www.keenthemes.com/
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>سیستم اتوماسیون اداری | مشخصات کاربری </title>
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
	<!-- BEGIN PAGE LEVEL PLUGIN STYLES --> 
	<link href="assets/plugins/gritter/css/jquery.gritter-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL PLUGIN STYLES -->
	<!-- BEGIN THEME STYLES --> 
	<link href="assets/css/style-metronic-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style-responsive-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/plugins-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/themes/default-rtl.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="assets/css/pages/inbox-rtl.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/custom-rtl.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-closed" onload="notifer()">
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
		</div/>
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
						
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li>
					<a href="index.php">
					<i class="fa fa-home"></i> 
					<span class="title">داشبورد</span>
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
				<?php
					 if($_SESSION['type']!= "admin")
					{	
						echo "-->" ;
					}
				?>
				<li class="start active">
					<a href="userEdit.php">
					<i class="fa fa-user"></i> 
					<span class="title">مشخصات کاربری</span>
					<span class="selected"></span>
					<span class="arrow"></span>
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
						اتوماسیون اداری
						<small>دانشگاه علم و فرهنگ</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-user"></i>
							<a href="index.php">خانه</a> 
							<i class="fa fa-angle-left"></i> 
							<a href="userEdit.php">مشخصات کاربری</a> 
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
<!-- BEGIN PAGE -->
	<?php
	$q = mysql_query("SELECT * from users where id='".$_SESSION['username']."'");
	if(mysql_num_rows($q) == 0)
		die('کاربری یافت نشد.');
	$user = mysql_fetch_array($q);
	$qu = mysql_query("SELECT * FROM occupation WHERE id='".$user['occupationID']."'");
	$occu = mysql_fetch_array($qu);
	$quer = mysql_query("SELECT * FROM departments WHERE id='".$user['departmentID']."'");
	$dep = mysql_fetch_array($quer);
	echo('
	<div >
	<form enctype="multipart/form-data" id="formUpdateUser" method="post" action="updateUser.php?action=update&user='.$user['id'].'" class="form-horizontal">
		<div class="form-body">
			<h3 class="form-section">مشخصات فردی</h3>
			<div class="row">
				<div class="col-md-6">
					<div id="divUser" class="form-group">
						<label class="control-label col-md-3">نام کاربری</label>
						<div class="col-md-9">
							<input id="username" name="username" type="text" readonly="" class="form-control" value="'.$user['id'].'" onchange=chUser()>
							<span id="spanUser" class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<label class="control-label col-md-9" style="text-align:right">نام کاربری قابل تغییر نمی باشد.</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div id="divPass" class="form-group">
						<label class="control-label col-md-3">گذرواژه</label>
						<div class="col-md-9">
							<input id="password" name="password" type="password" class="form-control" onchange=chPass()>
							<span id="spanPass" class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<label class="control-label col-md-9" style="text-align:right">در صورت تمایل می توانید گذرواژه جدید وارد کنید.</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">نام</label>
						<div class="col-md-9">
							<input id="firstName" name="firstName" type="text" class="form-control">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['name'].'">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">				
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">نام خانوادگی</label>
						<div class="col-md-9">
							<input id="familyName" name="familyName" type="text" class="form-control">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['familyName'].'">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">نام پدر</label>
						<div class="col-md-9">
							<input id="fatherName" name="fatherName" type="text" class="form-control">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['fatherName'].'">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div id="divNationalC" class="form-group">
						<label class="control-label col-md-3">شماره شناسنامه</label>
						<div class="col-md-9">
							<input id="nationalCode" name="nationalCode" maxlength="10" type="text" class="form-control" onchange=chNationalC()>
							<span id="spanNationalC" class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div id="divNationalC" class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['nationalCode'].'">
							<span id="" class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">محل تولد</label>
						<div class="col-md-9">
							<select id="pob" name="pob" class="form-control">
								<option value="">محل تولد را انتخاب کنید</option>
								<option value="تهران">تهران</option>
								<option value="شیراز">شیراز</option>
								<option value="اصفهان">اصفهان</option>
								<option value="مشهد">مشهد</option>
								<option value="تبریز">تبریز</option>
								<option value="کرج">کرج</option>
								<option value="اهواز">اهواز</option>
								<option value="قم">قم</option>
								<option value="کرمانشاه">کرمانشاه</option>
								<option value="رشت">رشت</option>
								<option value="ارومیه">ارومیه</option>
								<option value="زاهدان">زاهدان</option>
								<option value="اراک">اراک</option>
								<option value="همدان">همدان</option>
								<option value="سایر">سایر</option>
							</select>
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['pob'].'">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div id="divMelliC" class="form-group">
						<label class="control-label col-md-3">کد ملی</label>
						<div class="col-md-9">
							<input id="melliCode" name="melliCode" maxlength="10" type="text" class="form-control" onchange=chMelliC()>
							<span id="spanMelliC" class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div id="divMelliC" class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['melliCode'].'">
							<span id="" class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">جنسیت</label>
						<div class="col-md-9">
							<select id="gender" name="gender" class="form-control">
								<option value="">جنسیت را انتخاب کنید</option>
								<option value="male">مرد</option>
								<option value="female">زن</option>
							</select>
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['gender'].'">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">تاریخ تولد</label>
						<div class="col-md-9">
							<input id="dob" name="dob" type="text" maxlength="10" class="form-control" placeholder="YYYY-MM-DD">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['dob'].'">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">وضعیت تأهل</label>
						<div class="col-md-9">
							<select id="maritalStatus" name="maritalStatus" class="form-control">
								<option value="">وضعیت تأهل را انتخاب کنید</option>
								<option value="1">متأهل</option>
								<option value="0">مجرد</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.($user['maritalStatus']=="1" ? "متاهل" : "مجرد").'">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">تعداد فرزندان</label>
						<div class="col-md-9">
							<input id="children" name="children" maxlength="2" type="text" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['children'].'">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">تاریخ استخدام</label>
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['doe'].'">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<label class="control-label col-md-9" style="text-align:right">تاریخ استخدام قابل تغییر نمی باشد.</label>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">بخش</label>
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$dep['name'].'">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<label class="control-label col-md-9" style="text-align:right">یخش قابل تغییر نمی باشد.</label>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">سمت</label>
						<div class="col-md-9">
							<input name="" id="" type="text" readonly="" class="form-control" value="'.$occu['name'].'">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<label class="control-label col-md-9" style="text-align:right">سمت قابل تغییر نمی باشد.</label>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">آدرس</label>
						<div class="col-md-9">
							<input id="address" name="address" type="text" class="form-control">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['address'].'">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">شماره تماس</label>
						<div class="col-md-9">
							<input id="phone" name="phone" maxlength="11" type="text" class="form-control" placeholder="02144444444">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['phone'].'">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">عکس</label>
						<div class="col-md-9">
							<input id="image" name="image" type="file" placeholder="عکس پرسنلی">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<img id="" name="" width="64px" height="64px" type="file" src="'.$user['image'].'">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-actions fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="col-md-offset-3 col-md-9">
						<button type="submit" class="btn green" onclick=document.getElementById(\'formUpdateUser\').submit()>اعمال تغییرات</button>
						<button type="button" class="btn default" onclick="window.location.href=\'/showUsers.php\'">لغو</button>
					</div>
				</div>
				<div class="col-md-6"></div>
			</div>
		</div>
	</form>
	</div>
	</div><!--end of page-content -->
	</div><!--end of page-container -->
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			2014 &copy; Office Automation by Mona Jalali and Faride Alemi.
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="fa fa-angle-up"></i>
			</span>
		</div>
	</div>
	');?>
	<script>
		var user = document.getElementById('username');
		var pass = document.getElementById('password');
		var firstN = document.getElementById('firstName');
		var lastN = document.getElementById('familyName');
		var fatherN = document.getElementById('fatherName');
		var nationalC = document.getElementById('nationalCode');
		var pob = document.getElementById('pob');
		var melliC = document.getElementById('melliCode');
		var dob = document.getElementById('dob');
		var children = document.getElementById('children');
		var doe = document.getElementById('fatherName');
		var address = document.getElementById('address');///any other fields?
		var phone = document.getElementById('phone');
		jQuery(document).ready(function() {    
		   App.init();
		   }
		function chUser()
		{
			if(isNaN(user.value))
			{
				document.getElementById('divUser').setAttribute('class', 'form-group has-error');
				document.getElementById('spanUser').innerHTML = "نام کاربری نمیتواند شامل حرف باشد";
			}
			else if( user.value == "" )
			{
				document.getElementById('divUser').setAttribute('class', 'form-group has-error');
				document.getElementById('spanUser').innerHTML = "نام کاربری نمیتواند خالی باشد";
			}
			else
			{
				document.getElementById('divUser').setAttribute('class', 'form-group');
				document.getElementById('spanUser').innerHTML = "";
			}
		}
		function chNationalC()
		{
			if(isNaN(nationalC.value))
			{
				document.getElementById('divNationalC').setAttribute('class', 'form-group has-error');
				document.getElementById('spanNationalC').innerHTML = "شماره شناسنامه نمیتواند شامل حرف باشد";
			}
			else if(nationalC.value == "" )
			{
				document.getElementById('divNationalC').setAttribute('class', 'form-group has-error');
				document.getElementById('spanNationalC').innerHTML = "شماره شناسنامه نمیتواند خالی باشد";
			}
			else
			{
				document.getElementById('divNationalC').setAttribute('class', 'form-group');
				document.getElementById('spanNationalC').innerHTML = "";
			}
		}
		function chMelliC()
		{
			if(isNaN(melliC.value))
			{
				document.getElementById('divMelliC').setAttribute('class', 'form-group has-error');
				document.getElementById('spanMelliC').innerHTML = "کد ملی نمیتواند شامل حرف باشد";
			}
			else if(melliC.value == "")
			{
				document.getElementById('divMelliC').setAttribute('class', 'form-group has-error');
				document.getElementById('spanMelliC').innerHTML = "کد ملی نمیتواند خالی باشد";
			}
			else
			{
				document.getElementById('divNationalC').setAttribute('class', 'form-group');
				document.getElementById('spanNationalC').innerHTML = "";
			}
		}
		function compose()
		{
			document.getElementById("demo").innerHTML = Date();
		}
	</script>
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
	<script src="assets/scripts/myplugins.js" type="text/javascript"></script>	
	<!-- END CORE PLUGINS -->
<!-- END PAGE -->