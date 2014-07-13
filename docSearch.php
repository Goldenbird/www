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
	<title>سیستم اتوماسیون اداری | جست و جوی مدرک</title>
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
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5-rtl.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
	<!-- BEGIN:File Upload Plugin CSS files-->
	<link href="assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" >
	<!-- END:File Upload Plugin CSS files-->     
	<!-- END PAGE LEVEL STYLES -->
		<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
	<link rel="stylesheet" type="text/css" href="assets/plugins/gritter/css/jquery.gritter-rtl.css" />
	<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2_metro_rtl.css" />
	<link rel="stylesheet" type="text/css" href="assets/plugins/clockface/css/clockface.css" />
	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5-rtl.css" />
	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datepicker/css/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-timepicker/compiled/timepicker.css" />
	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-colorpicker/css/colorpicker.css" />
	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css" />
	<link rel="stylesheet" type="text/css" href="assets/plugins/jquery-multi-select/css/multi-select-rtl.css" />
	<link href="assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro-rtl.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="assets/plugins/jquery-tags-input/jquery.tagsinput-rtl.css" />
	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
	<!-- END PAGE LEVEL STYLES -->
	<!-- BEGIN THEME STYLES --> 
	<link href="assets/css/style-metronic-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style-responsive-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/plugins-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/themes/default-rtl.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="assets/css/pages/inbox-rtl.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/custom-rtl.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
		<style type="text/css" media="screen">
		.suggest_link {
			background-color: #FFFFFF;
			padding: 2px 6px 2px 6px;
		}
		.suggest_link_over {
			background-color: #3366CC;
			padding: 2px 6px 2px 6px;
		}
		#search_suggestS {
			position: absolute; 
			background-color: #FFFFFF; 
			text-align: left; 
			border: 1px solid #000000;			
		}
		#search_suggestR {
			position: absolute; 
			background-color: #FFFFFF; 
			text-align: left; 
			border: 1px solid #000000;			
		}				
	</style>
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
				<li>
					<a href="compose.php">
					<i class="fa-envelope-o"></i> 
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
					<span class="title">ارزیابی</span>
					</a>
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
				<li class="start active">
					<a href="createUser.php">
					<i class="fa fa-bar-chart-o"></i> 
					<span class="title">ایجاد کاربر</span>
					<span class="selected"></span>
					<span class="arrow"></span>
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
			<div class="tab-content">							
				<div class="tab-pane  active" id="tab_2">
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption"><i class="fa fa-reorder"></i></div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="#portlet-config" data-toggle="modal" class="config"></a>
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form enctype="multipart/form-data" id="formDocSearch" method="post" action="dSearch.php?action=search" class="form-horizontal">
								<div class="form-body">
									<h3 class="form-section">جست و جوی مدرک</h3>
									<div class="row">
										<div class="col-md-6"style="margin-right: 262px;">
										<div class="form-group">
											<label class="control-label col-md-3"><span class="required">*</span> نوع مدرک</label>
												<div class="col-md-9">
													<select id="docType" name="docType" class="form-control">
														<option value=""></option>
														<option value="نامه دریافتی">نامه دریافتی</option>
														<option value="نامه ارسالی">نامه ارسالی</option>
														<option value="پیش نویس">پیش نویس</option>
														<option value="بازیافت">بازیافت</option>
													</select>
													<span class="help-block"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div id="divSender" class="form-group">
												<label class="control-label col-md-3">نام فرستنده</label>
												<div class="col-md-9">
													<input type="text" name="fakeToSender" id="fakeToSender" onkeyup="searchSuggestS();" autocomplete="off" class="form-control">
													<input type="text" name="realToSender" id="realToSender" style="display:none">
													<div id="search_suggestS" style="display:block; z-index:99;"></div>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div id="divReciever" class="form-group">
												<label class="control-label col-md-3">نام گیرنده</label>
												<div class="col-md-9">
													<input type="text" name="fakeToReciever" id="fakeToReciever" onkeyup="searchSuggestR();" autocomplete="off" class="form-control">
													<input type="text" name="realToReciever" id="realToReciever" style="display:none">
													<div id="search_suggestR" style="display:block; z-index:99;"></div>
												</div>
											</div>
										</div>
										<!--/span-->
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">تاریخ ارسال: از </label>
												<div class="col-md-9">
													<input id="sentDateFrom" name="sentDateFrom" type="text" maxlength="19" class="form-control" placeholder="YYYY-MM-DD HH:MM:SS">
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">تا </label>
												<div class="col-md-9">
													<input id="sentDateTo" name="sentDateTo" type="text" maxlength="19" class="form-control" placeholder="YYYY-MM-DD HH:MM:SS">
												</div>
											</div>
										</div>
										<!--/span-->
									</div>
									<!--/row-->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">تاریخ دریافت: از</label>
												<div class="col-md-9">
													<input id="recieveDateFrom" name="recieveDateFrom" type="text" maxlength="19" class="form-control" placeholder="YYYY-MM-DD HH:MM:SS">
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">تا </label>
												<div class="col-md-9">
													<input id="recieveDateTo" name="recieveDateTo" type="text" maxlength="19" class="form-control" placeholder="YYYY-MM-DD HH:MM:SS">
												</div>
											</div>
										</div>
										<!--/span-->
									</div>
									<!--/row-->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">جست و جو در موضوع نامه</label>
												<div class="col-md-9">
													<input id="subject" name="subject" type="text" class="form-control">
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div id="divNationalC" class="form-group">
												<label class="control-label col-md-3">جست و جو در متن نامه</label>
												<div class="col-md-9">
													<input id="keyword" name="keyword" type="text" class="form-control">
												</div>
											</div>
										</div>
										<!--/span-->
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">محرمانگی</label>
												<div class="col-md-9">
													<select id="privacy" name="privacy" class="form-control">
														<option value=""></option>
														<option value="1">غیر محرمانه</option>
														<option value="0">محرمانه</option>
													</select>
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">اولویت</label>
												<div class="col-md-9">
													<select id="priority" name="priority" class="form-control">
														<option value=""></option>
														<option value="1">عادی</option>
														<option value="2">فوری</option>
														<option value="3">آنی</option>
													</select>
												</div>
											</div>
										</div>
										<!--/span-->
									</div>
									<div class="form-actions fluid">
									<div class="row">
										<div class="col-md-6">
											<div class="col-md-offset-3 col-md-9">
												<button type="button" class="btn blue" onclick=checkForm()>جست و جو</button>
												<button type="button" class="btn default" onclick="window.location.href='\inbox.php'">لغو</button>                              
											</div>
										</div>
										<div class="col-md-6"></div>
									</div>
								</div>
							</form>
							<!-- END FORM-->                
						</div>
					</div>
				</div>
				
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
	<!-- BEGIN: Page level plugins -->
	<script src="assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript" ></script>
	<script src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript" ></script> 
	<script src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript" ></script>
	<!-- BEGIN:File Upload Plugin JS files-->
	<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
	<script src="assets/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
	<!-- The Templates plugin is included to render the upload/download listings -->
	<script src="assets/plugins/jquery-file-upload/js/vendor/tmpl.min.js"></script>
	<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
	<script src="assets/plugins/jquery-file-upload/js/vendor/load-image.min.js"></script>
	<!-- The Canvas to Blob plugin is included for image resizing functionality -->
	<script src="assets/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>
	<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
	<script src="assets/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
	<!-- The basic File Upload plugin -->
	<script src="assets/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
	<!-- The File Upload processing plugin -->
	<script src="assets/plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
	<!-- The File Upload image preview & resize plugin -->
	<script src="assets/plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>
	<!-- The File Upload audio preview plugin -->
	<script src="assets/plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
	<!-- The File Upload video preview plugin -->
	<script src="assets/plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>
	<!-- The File Upload validation plugin -->
	<script src="assets/plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>
	<!-- The File Upload user interface plugin -->
	<script src="assets/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"></script>
	<!-- The main application script -->
	<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
	<!--[if (gte IE 8)&(lt IE 10)]>
	<script src="assets/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script>
	<![endif]-->
	<!-- END:File Upload Plugin JS files-->
	<!-- END: Page level plugins -->
	<script src="assets/scripts/app.js"></script>      
	<script src="assets/scripts/inbox.js"></script> 
<script src="assets/scripts/myplugins.js" type="text/javascript"></script>	
	<script>
		jQuery(document).ready(function() {       
		   // initiate layout and plugins
		   App.init();
		   Inbox.init();
		});
		var docType = document.getElementById('docType');
		//var senderName = document.getElementById('realToSender');
		//var recieverName = document.getElementById('realToReciever');
		/*var sentDateFrom = document.getElementById('sentDateFrom');
		var sentDateTo = document.getElementById('sentDateTo');
		var recieveDateFrom = document.getElementById('recieveDateFrom');
		var recieveDateTo = document.getElementById('recieveDateTo');
		var subject = document.getElementById('subject');
		var keyword = document.getElementById('keyword');
		var privacy = document.getElementById('privacy');
		var priority = document.getElementById('priority');*/
		function checkForm()
		{
			if(docType.value == "")
				alert("نوع مدرک نمی تواند خالی باشد.");
			else
				document.getElementById('formDocSearch').submit();
		}
	//SENDER	
	//for google suggest-like TO field:
	//Gets the browser specific XmlHttpRequest Object
	function getXmlHttpRequestObject() {
		if (window.XMLHttpRequest) {
			return new XMLHttpRequest();
		} else if(window.ActiveXObject) {
			return new ActiveXObject("Microsoft.XMLHTTP");
		} else {
			alert("Your Browser is too old!\nIt's about time to upgrade don't you think?");
		}
	}	
	//Mouse over function
	function suggestOver(div_value) {
		div_value.className = 'suggest_link_over';
	}
	//Mouse out function
	function suggestOut(div_value) {
		div_value.className = 'suggest_link';
	}
	//Our XmlHttpRequest object to get the auto suggest
	var req1 = getXmlHttpRequestObject();
	//Called from keyup on the search textbox.
	//Starts the AJAX request.
	function searchSuggestS() {
		if (req1.readyState == 4 || req1.readyState == 0) {
			var str = escape(document.getElementById('fakeToSender').value);
			req1.open("GET", 'searchSuggest.php?search=' + str, true);
			req1.onreadystatechange = handleSearchSuggestS; 
			req1.send(null);
		}		
	}
	//Called when the AJAX response is returned.
	function handleSearchSuggestS() {
		if (req1.readyState == 4) {
			var ss = document.getElementById('search_suggestS')
			ss.innerHTML = '';
			var str = req1.responseText.split("\n");
			for(i=0; i < str.length - 1; i++) {
				var suggest = '<div style="text-align:right" onmouseover="javascript:suggestOver(this);" ';
				suggest += 'onmouseout="javascript:suggestOut(this);" ';
				suggest += 'onclick="javascript:setSearchS(this.innerHTML);addTos(\'' + str[i].split('$')[0]+ '\');" ';
				suggest += 'class="suggest_link">' + str[i].split('$')[1] + '</div>';
				ss.innerHTML += suggest;
				//ss.innerHTML += str[i].split('$')[1];
			}
		}
	}
	function addTos(value)
	{
		document.getElementById('realToSender').value = value;
	}
	//Click function
	function setSearchS(value) {
		document.getElementById('fakeToSender').value =value;
		document.getElementById('search_suggestS').innerHTML = '';
	}
	//RECIEVER--------------------------------------------------------------------------------
	//Our XmlHttpRequest object to get the auto suggest
	var req2 = getXmlHttpRequestObject();
	//Called from keyup on the search textbox.
	//Starts the AJAX request.
	function searchSuggestR() {
		if (req2.readyState == 4 || req2.readyState == 0) {
			var str = escape(document.getElementById('fakeToReciever').value);
			req2.open("GET", 'searchSuggest.php?search=' + str, true);
			req2.onreadystatechange = handleSearchSuggestR; 
			req2.send(null);
		}		
	}
	//Called when the AJAX response is returned.
	function handleSearchSuggestR() {
		if (req2.readyState == 4) {
			var ss = document.getElementById('search_suggestR')
			ss.innerHTML = '';
			var str = req2.responseText.split("\n");
			for(i=0; i < str.length - 1; i++) {
				var suggest = '<div style="text-align:right" onmouseover="javascript:suggestOver(this);" ';
				suggest += 'onmouseout="javascript:suggestOut(this);" ';
				suggest += 'onclick="javascript:setSearchR(this.innerHTML);addTor(\''+ str[i].split('$')[0]+ '\');" ';
				suggest += 'class="suggest_link">' + str[i].split('$')[1] + '</div>';
				ss.innerHTML += suggest;
				//ss.innerHTML += str[i].split('$')[1];
			}
		}
	}
	function addTor(value)
	{
		document.getElementById('realToReciever').value = value;
	}
	//Click function
	function setSearchR(value) {
		document.getElementById('fakeToReciever').value =value;
		document.getElementById('search_suggestR').innerHTML = '';
	}
	</script>
		<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="assets/plugins/fuelux/js/spinner.min.js"></script>
	<script type="text/javascript" src="assets/plugins/ckeditor/ckeditor.js"></script>  
	<script type="text/javascript" src="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
	<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
	<script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript" src="assets/plugins/clockface/js/clockface.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script> 
	<script type="text/javascript" src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
	<script type="text/javascript" src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>   
	<script type="text/javascript" src="assets/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery-multi-select/js/jquery.quicksearch.js"></script>   
	<script src="assets/plugins/jquery.pwstrength.bootstrap/src/pwstrength.js" type="text/javascript" ></script>
	<script src="assets/plugins/bootstrap-switch/static/js/bootstrap-switch.min.js" type="text/javascript" ></script>
	<script src="assets/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript" ></script>
	<script src="assets/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript" ></script>
	<script src="assets/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript" ></script>
	<script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript" ></script>
	<script src="assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript" ></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="assets/scripts/app.js"></script>
	<script src="assets/scripts/form-components.js"></script>     
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
		jQuery(document).ready(function() {       
		   // initiate layout and plugins
		   App.init();
		   FormComponents.init();
		});
	</script>
	<!-- BEGIN GOOGLE RECAPTCHA -->
	<script type="text/javascript">
		var RecaptchaOptions = {
		   theme : 'custom',
		   custom_theme_widget: 'recaptcha_widget'
		};
	</script>
	<script type="text/javascript" src="https://www.google.com/recaptcha/api/challenge?k=6LcrK9cSAAAAALEcjG9gTRPbeA0yAVsKd8sBpFpR"></script>
	<!-- END JAVASCRIPTS -->