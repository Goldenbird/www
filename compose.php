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
	<style type="text/css" media="screen">
		body {
			font: 11px arial;
		}
		.suggest_link {
			background-color: #FFFFFF;
			padding: 2px 6px 2px 6px;
		}
		.suggest_link_over {
			background-color: #3366CC;
			padding: 2px 6px 2px 6px;
		}
		#search_suggest {
			position: absolute; 
			background-color: #FFFFFF; 
			text-align: left; 
			border: 1px solid #000000;			
		}		
	</style>
	<meta charset="utf-8" />
	<title>سیستم اتوماسیون اداری | Admin Dashboard </title>
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
	<link href="assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
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
	<link href="assets/css/pages/tasks-rtl.css" rel="stylesheet" type="text/css"/>
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
				<li>
					<a href="index.php">
					<i class="fa fa-home"></i> 
					<span class="title">داشبورد</span>
					</a>
				</li>
				<li class="start active">
					<a href="compose.php">
					<i class="fa-envelope-o"></i> 
					<span class="title">ایجاد نامه</span>
					<span class="selected"></span>
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
				<li>
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
						اتوماسیون اداری
						<small>دانشگاه علم و فرهنگ</small>
					</h3>
					
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.php">خانه</a> 
							<i class="fa fa-angle-left"></i>
						</li>
						<li><a href="#">ایجاد نامه</a></li>
						<li class="pull-right">
							<div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range">
								<i class="fa fa-calendar"></i>
								<span></span>
								<i class="fa fa-angle-down"></i>
							</div>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
	<!-- START PAGE CONTENT-->
	<div style="display: block; position: absolute; top:20%; left:20%" >
	<!-- full width -->
			<div id="full-width" class="modal container fade" tabindex="-1" style="position: relative; top:20%; left:65%">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title"><strong>لیست هامش ها</strong></h4>
				</div>
				<div class="modal-body">
					<?php
						$myq="SELECT * FROM hamesh where senderID='".$_SESSION['username']."'";
						$hamesh=mysql_query($myq);
						$mnr=mysql_num_rows($hamesh);
						$hameshList = mysql_fetch_array($hamesh); 
						for($i = 0; $i < $mnr; $i++)
						{
							echo
							(
							'<tr ');
							echo('>
							<td class="inbox-small-cells">
								<input type="checkbox" id="khar" value="'.$hameshList['id'].'" class="mail-checkbox">
							</td>
							<td class="view-message">'.$hameshList['content'].'</td>
							</tr>'
							);		
						}
					
					?>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">لغو</button>
					<button type="button" class="btn blue" name="hameshCompose" onclick=hameshValidation('forward') data-dismiss="modal" >ارجاع هامش</button>
				</div>
			</div>
		</div>
		<?php
					if(isset($_GET['error']) and $_GET['error']=='WrongTo')
						echo " گیرنده با این نام یافت نشد<br>";
				?>
		<form class="inbox-compose form-horizontal" id="form1" name="form1" action="" method="POST" enctype="multipart/form-data">
			<div class="inbox-compose-btn">
				<button class="btn blue" type="button" onclick=formValidation()><i class="fa fa-check" ></i>ارسال</button>
				<button class="btn" type="button" onclick="delCompose()">حذف</button>
				<!--<form id="draft" action="draft.php?action=draft" method="POST" >-->
				<button class="btn" type="button" onclick="saveDraft()">پیش نویس</button><!--</form>-->
				<button class="btn" type="button" data-target="#full-width" data-toggle="modal">لیست هامشها</button>
			</div>
			<div class="inbox-form-group mail-to">
				<label class="control-label">به:</label>
				<div class="controls controls-to">
					<input type="text" class="form-control col-md-12" name="fakeTo" id="fakeTo" onkeyup="searchSuggest();" autocomplete="off">
					<input type="text" name="realTo" id="realTo" style="display:none">
					<div id="search_suggest" style="display:block; z-index:99;"></div>
				</div>
			</div>
			<div class="inbox-form-group">
				<label class="control-label">موضوع:</label>
				<input type="text" name="subject" id="subject" class="form-control col-md-12">
			</div>
			<div class="form-group">
				<div class="radio-list">
					<label style="text-align:right;margin-right:16px;">نوع محرمانگی نامه را انتخاب کنید:
					<label class="radio-inline">
					<div class="radio" id="uniform-optionsRadios1"><span class="checked"><input type="radio" name="private" id="optionsRadios1" value="1" checked="checked"></span></div> محرمانه
					</label>
					<label class="radio-inline">
					<div class="radio" id="uniform-optionsRadios2"><input type="radio" name="private" id="optionsRadios2" value="0"></div> غیر محرمانه
					</label>
					</label>
				</div>
			</div>
			<div class="form-group">
				<div class="radio-list">
					<label style="text-align:right;margin-right:16px;">اولویت نامه را انتخاب کنید:
					<label class="radio-inline">
					<div class="radio" id="uniform-optionsRadios1"><span class="checked"><input type="radio" name="priority" id="priority1" value="1" checked="checked"></span></div> عادی
					</label>
					<label class="radio-inline">
					<div class="radio" id="uniform-optionsRadios2"><input type="radio" name="priority" id="priority2" value="2"></div> فوری
					</label>
					<label class="radio-inline">
					<div class="radio" id="uniform-optionsRadios3"><input type="radio" name="priority" id="priority3" value="3"></div> آنی
					</label>
					</label>
				</div>
			</div>
			<div class="form-group">
				<select class="form-control" name="actionType" id="actionType">
					<option value="">اقدام مورد نظر را وارد کنید</option>
					<option value="جهت اقدام">جهت اقدام</option>
					<option value="جهت اطلاع">جهت اطلاع</option>
					<option value="جهت امضا">جهت امضا</option>
					<option value="جهت اقدام فوری">جهت اقدام فوری</option>
					<option value="جهت بررسی و اقدام لازم">جهت بررسی و اقدام لازم</option>
					<option value="جهت صدور دستور لازم">جهت صدور دستور لازم</option>
					<option value="جهت استحضار">جهت استحضار</option>
				</select>
			</div>
			<div class="inbox-form-group">
				<div class="inbox-form-group">
					<label class="control-label">متن نامه:</label>
					<textarea class="inbox-editor inbox-wysihtml5 form-control" name="message" id="context" rows="12"></textarea>
				</div>
				<div class="inbox-compose-attachment" >
					<label class="control-label col-md-1">پیوست</label>
					<div class="col-md-11">
						<input id="attachment" name="attachment" type="file">
						<span class="help-block"></span>
					</div>
				</div>
			<div class="inbox-compose-btn">
				<button class="btn blue" type="button" onclick=formValidation()><i class="fa fa-check"></i>ارسال</button>
				<button class="btn" type="button" onclick="delCompose()">حذف</button>
				<button class="btn" type="button" onclick="saveDraft()">پیش نویس</button>
				<button class="btn" type="button">لیست هامشها</button>
			</div>
			</tr>
		</form>

	
	<!--END PAGE CONTENT-->
			
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
	<script src="assets/scripts/myplugins.js" type="text/javascript"></script>	
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="assets/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>   
	<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
	<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
	<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
	<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
	<script src="assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>  
	<script src="assets/plugins/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="assets/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
	<script src="assets/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
	<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>     
	<script src="assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
	<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
	<script src="assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script>  
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="assets/scripts/app.js" type="text/javascript"></script>
	<script src="assets/scripts/index.js" type="text/javascript"></script>
	<script src="assets/scripts/tasks.js" type="text/javascript"></script>        
	<!-- END PAGE LEVEL SCRIPTS -->  
	<script>
		jQuery(document).ready(function() {    
		   App.init(); // initlayout and core plugins
		   Index.init();
		   Index.initJQVMAP(); // init index page's custom scripts
		   Index.initCalendar(); // init index page's custom scripts
		   Index.initCharts(); // init index page's custom scripts
		   Index.initChat();
		   Index.initMiniCharts();
		   Index.initDashboardDaterange();
		   Index.initIntro();
		   Tasks.initDashboardWidget();
		});
	</script>
	<script>
		function compose()
		{
			document.getElementById("demo").innerHTML = Date();
		}
</script>
	<script>
		function formValidation(){
			
			var to = document.getElementById('realTo');
			var subject = document.getElementById('subject');
			var actionType = document.getElementById('actionType');
			var content = document.getElementById('context');
			if(to.value=="") 
				alert("نام گیرنده انتخاب نشده است!");
			else if(subject.value=="") 
				alert("موضوع نامه انتخاب نشده است!");
			else if(actionType.value=="") 
				alert("اقدام مورد نظر را وارد نکرده اید!");
			else if(content.value=="")
				alert("متن نامه خالی است!");
			else
			{
				document.getElementById('form1').setAttribute('action','letter-compose.php?action=compose');
				document.getElementById('form1').submit();
			}
		}
		function saveDraft(){
			document.getElementById('form1').setAttribute('action','letter-compose.php?action=draft');
			document.getElementById('form1').submit();
		}
	</script>
	<script>//for google suggest-like TO field:
	//Gets the browser specific XmlHttpRequest Object
	function getXmlHttpRequestObject() {
		if (window.XMLHttpRequest) {
			return new XMLHttpRequest();
		} else if(window.ActiveXObject) {
			return new ActiveXObject("Microsoft.XMLHTTP");
		} else {
			alert("Your Browser Sucks!\nIt's about time to upgrade don't you think?");
		}
	}
	//Our XmlHttpRequest object to get the auto suggest
	var searchReq = getXmlHttpRequestObject();
	//Called from keyup on the search textbox.
	//Starts the AJAX request.
	function searchSuggest() {
		if (searchReq.readyState == 4 || searchReq.readyState == 0) {
			var kol=document.getElementById('fakeTo').value.split('|');
			var str = escape(kol[kol.length-1]);
			searchReq.open("GET", 'searchSuggest.php?search=' + str, true);
			searchReq.onreadystatechange = handleSearchSuggest; 
			searchReq.send(null);
		}		
	}
	//Called when the AJAX response is returned.
	function handleSearchSuggest() {
		if (searchReq.readyState == 4) {
			var ss = document.getElementById('search_suggest')
			ss.innerHTML = '';
			var str = searchReq.responseText.split("\n");
			for(i=0; i < str.length - 1; i++) {
				var suggest = '<div style="text-align:right" onmouseover="javascript:suggestOver(this);" ';
				suggest += 'onmouseout="javascript:suggestOut(this);" ';
				suggest += 'onclick="javascript:setSearch(this.innerHTML);addTo(\'' + str[i].split('$')[0]+ '\');" ';
				suggest += 'class="suggest_link">' + str[i].split('$')[1] + '</div>';
				ss.innerHTML += suggest;
				//ss.innerHTML += str[i].split('$')[1];
			}
		}
	}
	function addTo(value)
	{
		document.getElementById('realTo').value += value+"|";
	}
	//Mouse over function
	function suggestOver(div_value) {
		div_value.className = 'suggest_link_over';
	}
	//Mouse out function
	function suggestOut(div_value) {
		div_value.className = 'suggest_link';
	}
	//Click function
	function setSearch(value) {
		var tmp = document.getElementById('fakeTo').value.trim();
		var ind=tmp.lastIndexOf("|");
		if(ind>0)
			tmp=tmp.substr(0,tmp.lastIndexOf("|")+1);
		else
			tmp="";
		document.getElementById('fakeTo').value = tmp+value+"|";
		document.getElementById('search_suggest').innerHTML = '';
	}
	function delCompose()
	{
		window.location.href='inbox.php';
	}
	</script>
	<!-- END JAVASCRIPTS -->