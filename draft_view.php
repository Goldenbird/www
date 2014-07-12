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
		
		$q=mysql_query("SELECT * from drafts where id='".$_GET['letter']."'");
		if(mysql_num_rows($q) == 0)
			die('نامه ای یافت نشد.');
		$draft = mysql_fetch_array($q);
		$data=mysql_query("SELECT name, familyName FROM users WHERE id='".$draft['senderID']."'");
		$senderName = mysql_fetch_array($data);
		$data=mysql_query("SELECT name, familyName FROM users WHERE id='".$draft['recieverID']."'");
		$recieverName = mysql_fetch_array($data);
	echo('<div class ="row">	
		<div class="col-md-7">
			<p align = "right">از:'.$senderName['name'].' '.$senderName['familyName'].'</p>
			<p align = "right">به:'.$recieverName['name'].' '.$recieverName['familyName'].'</p>
			<p align = "right">موضوع:'.$draft['subject'].'</p>
		</div>
		<div class="col-md-5">
			<p align = "right">شماره:'.$draft['id'].'</p>
		</div>
	</div>
</div>
<div class="inbox-view">');
		echo (' <td class="view-message ">'.$draft['context'].'</td> ');
?>
<div class="inbox-view-info">
	<div class="row">
			<div class="btn-group">			
				<a href="forward.php?letter=<?php echo $draft['id']; ?>" class="btn blue">ارجاع<i class="fa fa-mail-forward"></i></a>
			</div>
			<div class="btn-group">
				<a href="#" class="btn red" data-target="#full-width" data-toggle="modal">هامش<i class="fa fa-edit"></i></a>
			</div>
			<div class="btn-group">
				<a href="#" class="btn purple" onclick="del('<?php echo $draft['id']; ?>');">حذف <i class="fa fa-trash-o"></i></a>
			</div>
			<div class="btn-group">
				<a href="printLetter.php?letter=<?php echo $draft['id']; ?>" target="_blank" class="btn default">چاپ<i class="fa fa-file-o"></i></a>
			</div>
		</div>		
	</div>
</div>	
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
						//"letter_content":<?php echo $letter['context']?>,
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