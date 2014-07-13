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
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html class="no-js" lang="en"><!--<![endif]--><!-- BEGIN HEAD -->
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>سیستم اتوماسیون اداری | Admin Dashboard </title>
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
				<li class="start active">
					<a href="inbox.php">
					<i class="fa fa-cogs"></i> 
					<span class="title">کارتابل</span>
					<span class="selected"></span>
					<span class="arroe"></span>
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
					<h3 class="page-title" >
						<small></small>
						نامه 
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li class="btn-group">
						<a href="docSearch.php" style="text-decoration:none;color:white;">
							<button type="button" class="btn blue">
							 جست و جوی مدرک<i class="fa fa-search"></i> 
							</button></a>
						</li>
						<li>
							<i class="fa fa-home"></i>
							<a href="index.php">خانه</a> 
							<i class="fa fa-angle-left"></i> 
						</li>
						<li>
							<i class="fa fa-envelope"></i>
							<a href="#">کارتابل</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<div class="row inbox">
				<div class="col-md-2">
					<ul class="inbox-nav margin-bottom-10">
						<li class="inbox">
							<a href="javascript:;" class="btn" data-title="نامه وارده">نامه وارده (3)</a>
							<b></b>
						</li>
						<li class="sent"><a id="koofte" class="btn" href="javascript:;" data-title="نامه ارسالی">نامه ارسالی</a><b></b></li>
						<li class="draft"><a class="btn" href="javascript:;" data-title="پیش نویس">پیش نویس</a><b></b></li>
						<li class="trash"><a class="btn" href="javascript:;" data-title="بازیافت">بازیافت</a><b></b></li>
					</ul>
				</div>
				<div class="col-md-10">
					<div class="inbox-header">
						<h1 class="pull-left">ایجاد نامه</h1>
						<form action="index.html" class="form-inline pull-right">
							<div class="input-group input-medium">
							</div>
						</form>
					</div>
					<div class="inbox-loading" style="display: none;">Loading...</div>
					<div class="inbox-content"><form enctype="multipart/form-data" method="POST" action="#" id="fileupload" class="inbox-compose form-horizontal">
					<div class="inbox-compose-btn">
					<button class="btn blue"><i class="fa fa-check"></i>ارسال</button>
					<button class="btn">حذف</button>
					<button class="btn">پیش نویس</button>
	</div>
	<div class="inbox-form-group mail-to">
		<label class="control-label">به:</label>
		<div class="controls controls-to">
			<input name="to" class="form-control col-md-12" type="text">
			<span class="inbox-cc-bcc">
			<span class="inbox-cc">Cc</span>
			<span class="inbox-bcc">Bcc</span>
			</span>
		</div>
	</div>
	<div class="inbox-form-group input-cc display-hide">
		<a class="close" href="javascript:;"></a>
		<label class="control-label">Cc:</label>
		<div class="controls controls-cc">
			<input class="form-control" name="cc" type="text">
		</div>
	</div>
	<div class="inbox-form-group input-bcc display-hide">
		<a class="close" href="javascript:;"></a>
		<label class="control-label">Bcc:</label>
		<div class="controls controls-bcc">
			<input class="form-control" name="bcc" type="text">
		</div>
	</div>
	<div class="inbox-form-group">
		<label class="control-label">موضوع:</label>
		<div class="controls">
			<input name="subject" class="form-control" type="text">
		</div>
	</div>
	<div class="inbox-form-group">
		<ul class="wysihtml5-toolbar" style="">
			<li class="dropdown">
			<a href="#" data-toggle="dropdown" class="btn default dropdown-toggle">
				<i class="fa fa-font"></i>&nbsp;
				<span class="current-font">Normal text</span>&nbsp;
				<i class="fa fa-angle-down"></i>
			</a>
			<ul class="dropdown-menu">
			<li>
				<a tabindex="-1" data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Normal text</a>
			</li>
			<li>
				<a tabindex="-1" data-wysihtml5-command-value="h1" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 1</a></li><li><a tabindex="-1" data-wysihtml5-command-value="h2" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 2</a></li><li><a tabindex="-1" data-wysihtml5-command-value="h3" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 3</a></li><li><a data-wysihtml5-command-value="h4" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 4</a></li><li><a data-wysihtml5-command-value="h5" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 5</a></li><li><a data-wysihtml5-command-value="h6" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 6</a></li></ul></li><li><div class="btn-group"><a tabindex="-1" title="CTRL+B" data-wysihtml5-command="bold" class="btn default" href="javascript:;" unselectable="on">Bold</a><a tabindex="-1" title="CTRL+I" data-wysihtml5-command="italic" class="btn default" href="javascript:;" unselectable="on">Italic</a><a tabindex="-1" title="CTRL+U" data-wysihtml5-command="underline" class="btn default" href="javascript:;" unselectable="on">Underline</a></div></li><li><div class="btn-group"><a tabindex="-1" title="Unordered list" data-wysihtml5-command="insertUnorderedList" class="btn default" href="javascript:;" unselectable="on"><i class="fa fa-list"></i></a><a tabindex="-1" title="Ordered list" data-wysihtml5-command="insertOrderedList" class="btn default" href="javascript:;" unselectable="on"><i class="fa fa-th-list"></i></a><a tabindex="-1" title="Outdent" data-wysihtml5-command="Outdent" class="btn default" href="javascript:;" unselectable="on"><i class="fa fa-outdent"></i></a><a tabindex="-1" title="Indent" data-wysihtml5-command="Indent" class="btn default" href="javascript:;" unselectable="on"><i class="fa fa-indent"></i></a></div></li><li><div class="bootstrap-wysihtml5-insert-link-modal modal fade"><div class="modal-dialog"> <div class="modal-content"><div class="modal-header"><a data-dismiss="modal" class="close"></a><h4 class="modal-title">Insert link</h4></div><div class="modal-body"><input class="bootstrap-wysihtml5-insert-link-url1 form-control large" value="http://" type="text"><label style="margin-top:5px;">
		<div class="checker"><span class="checked"><input checked="checked" class="bootstrap-wysihtml5-insert-link-target" type="checkbox"></span></div>Open link in new window</label></div><div class="modal-footer"><a data-dismiss="modal" class="btn default" href="#">Cancel</a><a data-dismiss="modal" class="btn btn-primary green" href="#">Insert link</a></div></div></div></div><a tabindex="-1" title="Insert link" data-wysihtml5-command="createLink" class="btn default" href="javascript:;" unselectable="on"><i class="fa fa-share"></i></a></li><li><div class="bootstrap-wysihtml5-insert-image-modal modal fade"><div class="modal-dialog"> <div class="modal-content"><div class="modal-header"><a data-dismiss="modal" class="close"></a><h4 class="modal-title">Insert image</h4></div><div class="modal-body"><input class="bootstrap-wysihtml5-insert-image-url form-control large" value="http://" type="text"></div><div class="modal-footer"><a data-dismiss="modal" class="btn default" href="#">Cancel</a><a data-dismiss="modal" class="btn btn-primary green" href="#">Insert image</a></div></div></div></div><a tabindex="-1" title="Insert image" data-wysihtml5-command="insertImage" class="btn default" href="javascript:;" unselectable="on"><i class="fa fa-picture-o"></i></a></li></ul><textarea rows="12" name="message" class="inbox-editor inbox-wysihtml5 form-control" style="display: none;"></textarea><input name="_wysihtml5_mode" value="1" type="hidden"><iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" marginwidth="0" marginheight="0" style="display: block; background-color: rgb(255, 255, 255); border-collapse: separate; border-color: rgb(154, 154, 154); border-style: solid; border-width: 1px; clear: none; float: none; margin: 0px; outline: 0px none rgb(51, 51, 51); outline-offset: 0px; padding: 6px 12px; position: static; top: auto; left: auto; right: auto; bottom: auto; z-index: auto; vertical-align: middle; text-align: start; -moz-box-sizing: border-box; box-shadow: none; border-radius: 0px; width: 1054.67px; height: 254px;" frameborder="0" height="0" width="0"></iframe>
	</div>
	<div class="inbox-compose-attachment">
		<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
		<span class="btn green fileinput-button">
		<i class="fa fa-plus"></i>
		<span>Add files...</span>
		<input multiple="" name="files[]" type="file">
		</span>
		<!-- The table listing the files available for upload/download -->
		<table class="table table-striped margin-top-10" role="presentation">
			<tbody class="files"></tbody>
		</table>
	</div>
	<script type="text/x-tmpl" id="template-upload">
		{% for (var i=0, file; file=o.files[i]; i++) { %}
		    &lt;tr class="template-upload fade"&gt;
		        &lt;td class="name" width="30%"&gt;&lt;span&gt;{%=file.name%}&lt;/span&gt;&lt;/td&gt;
		        &lt;td class="size" width="40%"&gt;&lt;span&gt;{%=o.formatFileSize(file.size)%}&lt;/span&gt;&lt;/td&gt;
		        {% if (file.error) { %}
		            &lt;td class="error" width="20%" colspan="2"&gt;&lt;span class="label label-danger"&gt;Error&lt;/span&gt; {%=file.error%}&lt;/td&gt;
		        {% } else if (o.files.valid &amp;&amp; !i) { %}
		            &lt;td&gt;
		                &lt;p class="size"&gt;{%=o.formatFileSize(file.size)%}&lt;/p&gt;
		                &lt;div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"&gt;
		                   &lt;div class="progress-bar progress-bar-success" style="width:0%;"&gt;&lt;/div&gt;
		                   &lt;/div&gt;
		            &lt;/td&gt;
		        {% } else { %}
		            &lt;td colspan="2"&gt;&lt;/td&gt;
		        {% } %}
		        &lt;td class="cancel" width="10%" align="right"&gt;{% if (!i) { %}
		            &lt;button class="btn btn-sm red cancel"&gt;
		                       &lt;i class="fa fa-ban"&gt;&lt;/i&gt;
		                       &lt;span&gt;Cancel&lt;/span&gt;
		                   &lt;/button&gt;
		        {% } %}&lt;/td&gt;
		    &lt;/tr&gt;
		{% } %}
	</script>
	<!-- The template to display files available for download -->
	<script type="text/x-tmpl" id="template-download">
		{% for (var i=0, file; file=o.files[i]; i++) { %}
		    &lt;tr class="template-download fade"&gt;
		        {% if (file.error) { %}
		            &lt;td class="name" width="30%"&gt;&lt;span&gt;{%=file.name%}&lt;/span&gt;&lt;/td&gt;
		            &lt;td class="size" width="40%"&gt;&lt;span&gt;{%=o.formatFileSize(file.size)%}&lt;/span&gt;&lt;/td&gt;
		            &lt;td class="error" width="30%" colspan="2"&gt;&lt;span class="label label-danger"&gt;Error&lt;/span&gt; {%=file.error%}&lt;/td&gt;
		        {% } else { %}
		            &lt;td class="name" width="30%"&gt;
		                &lt;a href="{%=file.url%}" title="{%=file.name%}" data-gallery="{%=file.thumbnail_url&amp;&amp;'gallery'%}" download="{%=file.name%}"&gt;{%=file.name%}&lt;/a&gt;
		            &lt;/td&gt;
		            &lt;td class="size" width="40%"&gt;&lt;span&gt;{%=o.formatFileSize(file.size)%}&lt;/span&gt;&lt;/td&gt;
		            &lt;td colspan="2"&gt;&lt;/td&gt;
		        {% } %}
		        &lt;td class="delete" width="10%" align="right"&gt;
		            &lt;button class="btn default btn-sm" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}&gt;
		                &lt;i class="fa fa-times"&gt;&lt;/i&gt;
		            &lt;/button&gt;
		        &lt;/td&gt;
		    &lt;/tr&gt;
		{% } %}
	</script>
	<div class="inbox-compose-btn">
		<button class="btn blue"><i class="fa fa-check"></i>ارسال</button>
		<button class="btn">حذف</button>
		<button class="btn">پیش نویس</button>
		<button class="btn">پیوست</button>
		<button class="btn">عطف</button>
		<button class="btn">پیرو</button>
		<button class="btn">چاپ</button>
	</div>
<span class="alert alert-error">Upload server currently unavailable - Wed Apr 09 2014 12:42:54 GMT+0430 (Iran Standard Time)</span></form></div>
				</div>
			</div>
		</div>

		<!-- END PAGE -->
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
			var content = $('.inbox-content');
			var loading = $('.inbox-loading');
			var url = 'inbox_view.php?letter='+id;
			if (draft == 1)
				url = 'draft_view.php?letter='+id;
			if (draft == 2)
				url = 'trash_view.php?letter='+id;
				
			loading.show();
			content.html('');
			//toggleButton(el);
			
			$.ajax({
				type: "POST",
				//cache: false,
				url: url,
				dataType: "html",
				success: function(res) 
				{
					
					//toggleButton(el);

					//if (resetMenu) {
						//$('.inbox-nav > li.active').removeClass('active');
					///}
					$('.inbox-header > h1').text('نمایش نامه');
					loading.hide();
					content.html(res);
					App.fixContentHeight();
					App.initUniform();
				},
				error: function(xhr, ajaxOptions, thrownError)
				{
					toggleButton(el);
				},
				async: false
			});
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