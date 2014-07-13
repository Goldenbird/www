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
						"hamesh":content
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
</script>
