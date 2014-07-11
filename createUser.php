<?php
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
Website: http://www.keenthemes.com/
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Metronic | CreateUser</title>
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
	<!-- alooo -->
	<link href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5-rtl.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
	<!-- BEGIN:File Upload Plugin CSS files-->
	<link href="assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" >
	<!-- END:File Upload Plugin CSS files-->     
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
							<form enctype="multipart/form-data" id="formCreateUser" method="post" action="cUser.php?action=create" class="form-horizontal">
								<div class="form-body">
									<h3 class="form-section">مشخصات فردی</h3>
									<div class="row">
										<div class="col-md-6">
											<div id="divUser" class="form-group">
												<label class="control-label col-md-3">نام کاربری</label>
												<div class="col-md-9">
													<input id="username" name="username" type="text" class="form-control" placeholder="112012" onchange=chUser()>
													<span id="spanUser" class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div id="divPass" class="form-group">
												<label class="control-label col-md-3">گذرواژه</label>
												<div class="col-md-9">
													<input id="password" name="password" type="password" class="form-control" onchange=chPass()>
													<span id="spanPass" class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">نام</label>
												<div class="col-md-9">
													<input id="firstName" name="firstName" type="text" class="form-control" placeholder="Ali">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">نام خانوادگی</label>
												<div class="col-md-9">
													<input id="familyName" name="familyName" type="text" class="form-control" placeholder="Ahmadi">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
									</div>
									<!--/row-->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">نام پدر</label>
												<div class="col-md-9">
													<input id="fatherName" name="fatherName" type="text" class="form-control" placeholder="Reza">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div id="divNationalC" class="form-group">
												<label class="control-label col-md-3">شماره شناسنامه</label>
												<div class="col-md-9">
													<input id="nationalCode" name="nationalCode" maxlength="10" type="text" class="form-control" placeholder="" onchange=chNationalC()>
													<span id="spanNationalC" class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
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
										<!--/span-->
										<div class="col-md-6">
											<div id="divMelliC" class="form-group">
												<label class="control-label col-md-3">کد ملی</label>
												<div class="col-md-9">
													<input id="melliCode" name="melliCode" maxlength="10" type="text" class="form-control" onchange=chMelliC()>
													<span id="spanMelliC" class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">جنسیت</label>
												<div class="col-md-9">
													<select id="gender" name="gender" class="form-control">
														<option value="male">مرد</option>
														<option value="female">زن</option>
													</select>
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">تاریخ تولد</label>
												<div class="col-md-9">
													<input id="dob" name="dob" type="text" maxlength="10" class="form-control" placeholder="YYYY-MM-DD">
												</div>
											</div>
										</div>
										<!--/span-->
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">وضعیت تأهل</label>
												<div class="col-md-9">
													<select id="maritalStatus" name="maritalStatus" class="form-control">
														<option value="1">متأهل</option>
														<option value="0">مجرد</option>
													</select>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">تعداد فرزندان</label>
												<div class="col-md-9">
													<input id="children" name="children" maxlength="2" type="text" class="form-control" placeholder="0">
												</div>
											</div>
										</div>
										<!--/span-->
									</div>
									<!--/row--> 
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">تاریخ استخدام</label>
												<div class="col-md-9">
													<input id="doe" name="doe" type="text" maxlength="10" class="form-control" placeholder="YYYY-MM-DD">
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">بخش</label>
												<div class="col-md-9">
													<select id="departmentID" name="departmentID" class="form-control">
														<option value="">بخش را انتخاب کنید</option>
														<?php 
														include 'db_connect.php';
														$department=mysql_query("SELECT * FROM departments");
														for($i = 0; $i < mysql_num_rows($department); $i++)
														{
															$data = mysql_fetch_array($department);
															echo ('<option value="'.$data['id'].'">'.$data['name'].'</option>');
														}
														?>
													</select>
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">سمت</label>
												<div class="col-md-9">
													<select id="occupation" name="occupation" class="form-control">
														<option value="">سمت  را انتخاب کنید</option>
														<?php 
														include 'db_connect.php';
														$quer = mysql_query("SELECT * FROM occupation");
														for($i = 0; $i < mysql_num_rows($quer); $i++)
														{
															$data = mysql_fetch_array($quer);
															echo ('<option value="'.$data['id'].'">'.$data['name'].'</option>');
														}
														?>
													</select>
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">سطح دسترسی</label>
												<div class="col-md-9">
													<div class="radio-list">                                                
														<label class="radio-inline">
														<div class="radio"><span><input type="radio" name="userLevel" id="baygani" value="baygani"></span></div>
														بایگانی
														</label>
														<label class="radio-inline">
														<div class="radio"><span class="checked"><input type="radio" name="userLevel" id="normal" value="normal" checked=""></span></div>
														نرمال
														</label>  
													</div>
												</div>
											</div>
										</div>
										<!--/span-->
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
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">شماره تماس</label>
												<div class="col-md-9">
													<input id="phone" name="phone" maxlength=11 type="text" class="form-control" placeholder="02144444444">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<!--/span-->
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
									</div>
								</div>
								<div class="form-actions fluid">
									<div class="row">
										<div class="col-md-6">
											<div class="col-md-offset-3 col-md-9">
												<button type="button" class="btn blue" onclick=checkForm()>ایجاد</button>
												<button type="button" class="btn default" onclick="window.location.href='/index.php'">لغو</button>                              
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
	</script>
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
		function checkForm()
		{
			if(user.value == "")
				alert("نام کاربری نمیتواند خالی باشد");
			else if(pass.value == "")
				alert("گذرواژه نمیتواند خالی باشد");
			else if(firstN.value == "")
				alert("نام نمیتواند خالی باشد");
			else if(lastN.value == "")
				alert("نام خانوادگی نمیتواند خالی باشد");
			else if(fatherN.value == "")
				alert("نام پدر نمیتواند خالی باشد");
			else if(nationalC.value == "")
				alert("شماره شناسنامه نمیتواند خالی باشد");
			else if(pob.value == "")
				alert("محل تولد نمیتواند خالی باشد");
			else if(melliC.value == "")
				alert("کد ملی نمیتواند خالی باشد");
			else if(dob.value == "")
				alert("تاریخ تولد نمیتواند خالی باشد");
			else if(doe.value == "")
				alert("تاریخ استخدام نمیتواند خالی باشد");
			else if(address.value == "")
				alert("آدرس نمیتواند خالی باشد");
			else if(phone.value == "")
				alert("شماره تماس نمیتواند خالی باشد");
			else if(!isNaN(user))
				alert("نام کاربری باید شماره پرسنلی کاربر باشد");
			else if(!isNaN(nationalC))
				alert("شماره شناسنامه درست وارد نشده است");
			else if(!isNaN(melliC) || melliC.length<10)
				alert("کد ملی درست وارد نشده است");
			else
				document.getElementById('formCreateUser').submit();
		}
	</script>
	<!-- END JAVASCRIPTS -->
