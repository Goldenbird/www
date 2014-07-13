<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_name("oa");
session_start();
include 'db_connect.php';
 if(isset($_SESSION['username']) == false)
	header("Location: page_login.php charset=utf-8");
else
	$bye=mysql_query("UPDATE login SET logout='".date("Y-m-d H:i:s")."' WHERE userID='".$_SESSION['username']."' AND login='".$_SESSION['loginTime']."'"); 
if(isset($_GET['letter']) == false)
{
	header("Location: inbox.php");
}
		
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
</div>
<div class="inbox-view">');
	$allHamesh = mysql_query("SELECT * FROM (letterhamesh INNER JOIN hamesh ON letterhamesh.hameshID=hamesh.id) WHERE letterhamesh.letterID='".$letter['id']."'");
	$countHamesh = mysql_num_rows($allHamesh);
	echo (' <td class="view-message ">'.$letter['context'].'</td> ');
	echo '</br>';
	echo '................................................................................';
	echo '</br>';
	for($i=0; $i<$countHamesh; $i++)
	{
		$hamesh=mysql_fetch_array($allHamesh);
		echo '<p align="right"> هامش شماره'.$i.':'.$hamesh['content'].'</p>';
		echo '</br>';
	}
	$quer = mysql_query("UPDATE letters SET recievedDate='".date("Y-m-d H:i:s")."' WHERE id='".$letter['id']."' AND recievedDate is NULL");
?>
<head>
	<meta charset="utf-8" />
	<title>Metronic | UI Features - Extended Modals</title>
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
	<link href="assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL STYLES -->          
	<!-- BEGIN THEME STYLES --> 
	<link href="assets/css/style-metronic-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style-responsive-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/plugins-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/themes/default-rtl.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="assets/css/custom-rtl.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
	<style type="text/css" media="screen">
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
</head>
<div class="page-content">
	<div class="row">
		<div style="display: block; position: absolute; top:-20px; left:61%" >
	<!-- full width -->
			<div id="full-width" class="modal container fade" tabindex="-1" >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title"><strong>هامش</strong></h4>
				</div>
				<div class="modal-body">
					<form action="hamesh-compose.php?act=cHamesh&letter=<?php echo $_GET['letter']; ?>" method="POST" id="form2">
						<div class="inbox-form-group mail-to">
							<label class="control-label">به:</label>
							<div class="controls controls-to">
								<input type="text" class="form-control col-md-12" name="fakeTo" id="fakeTo" onkeyup="searchSuggest();" autocomplete="off">
								<input type="text" name="realTo" id="realTo" style="display:none">
								<div id="search_suggest" style="display:block; z-index:99;"></div>
							</div>
						</div>
						متن هامش:<textarea id="hamesh" name="hamesh" style="text-align:rtl;width:100%;height:300px;"></textarea>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">لغو</button>
					<button type="button" class="btn blue" name="hameshCompose" onclick=hameshValidation('cHamesh') data-dismiss="modal" >ثبت هامش</button>
					<button type="button" class="btn blue" name="hameshCompose" onclick=hameshValidation('forward') data-dismiss="modal" >ارجاع</button>
				</div>
			</div>
		</div>
	</div> 
	<?php if($letter['attachment'] != NULL)
echo('
<div class="inbox-attached">
<div class="margin-bottom-15">
<form id="form" name="form" method="post" action="download.php?action=act&download_file='.$letter['attachment'].'">
<a href="#" onclick=document.getElementById(\'form\').submit()>دانلود فایل ضمیمه</a> 
</form>
</div>
</div>
');
?>
<div class="inbox-view-info">
	<div class="row">
			<div class="btn-group">			
				<a href="forward.php?letter=<?php echo $letter['id']; ?>" class="btn blue">ارجاع<i class="fa fa-mail-forward"></i></a>
			</div>
			<div class="btn-group">
				<a href="#" class="btn red" data-target="#full-width" data-toggle="modal">هامش<i class="fa fa-edit"></i></a>
			</div>
			<div class="btn-group">
				<a href="#" class="btn purple" onclick="del('<?php echo $letter['id']; ?>');">حذف <i class="fa fa-trash-o"></i></a>
			</div>
			<div class="btn-group">
				<a href="letterPath.php?letter=<?php echo $letter['id']; ?>" class="btn dark">گردش نامه<i class="fa fa-edit"></i></a>
			</div>
			<div class="btn-group">
				<a href="letter-bargasht.php?action=bargasht&id=<?php echo $letter['id'];?>" class="btn blue">برگشت<i class="fa-arrow-left"></i></a>
			</div>
			<div class="btn-group">
				<a href="printLetter.php?letter=<?php echo $letter['id']; ?>" target="_blank" class="btn default" >چاپ<i class="fa fa-file-o"></i></a>
			</div>
		</div>		
	</div>
</div>	
<hr>
<script>
		function hameshValidation(val){
			var content = document.getElementById('hamesh').value;
			var to = document.getElementById('realTo').value;
			//alert (content);
			var options={
				"show" : "false","keyboard" : "true","backdrop" : "true"
			};
			if(content.value=="")
				alert("متن هامش خالی است!");
			else
			{
				var url = 'hamesh-compose.php?act='+val;
				var frm = $('#form2');
				//alert (content);
				$.ajax(
				{
					type:'post', 
					url: url, 
					data: 
					{
						"letter_id":<?php echo $letter['id']?>,
						"letter_subject":"<?php echo $letter['subject']?>",
						"letter_content":"<?php echo $letter['context']?>",
						"letter_privacy":"<?php echo $letter['private']?>",
						"letter_priority":"<?php echo $letter['priority']?>",
						"letter_actionType":"<?php echo $letter['actionType']?>",
						"letter_attach":"<?php echo $letter['attachment']?>",
						"hamesh":content,
						"to":to
					},
					success:function(result){
						alert(result);
						document.getElementById('hamesh').value="";
					},
					error:function(xhr,status,error){
						alert('error');
					}
				});
			}
		}
		function del(id)
		{
		  if (confirm('آیا می خواهید این نامه پاک شود؟'))
				window.location.href="deleteLetter.php?letDel="+id;
		}

	//for google suggest-like TO field:
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
	}</script>
