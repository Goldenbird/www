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
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<style>
		.golabi{
			cursor:pointer;
		}
		.sib{
			cursor:default;
		}
	</style>
</head>
<table class="table table-striped table-advance table-hover">
	<thead>
		<tr style="width:100%;">
			<th colspan="6">
			</th>
			<th class="pagination-control" colspan="3">
				<?php
					$username = $_SESSION['username'];
					include 'db_connect.php';
					$ooffsseett=0;	
					if(isset($_GET['offset']))
						$ooffsseett=$_GET['offset'];
					$myq="SELECT * FROM letters WHERE recieverID='".$username."' AND trash='0' ";
					if(isset($_GET['por']) && $_GET['por']>0)
						$myq = $myq." AND priority='".$_GET['por']."' ";
					if(isset($_GET['actiontype']))
					{
						switch ($_GET['actiontype'])
						{
						case '1': {$myq = $myq." AND actionType='جهت اقدام' ";break;}
						case '2': {$myq = $myq." AND actionType='جهت اطلاع' ";break;}
						case '3': {$myq = $myq." AND actionType='جهت امضا' ";break;}
						case '4': {$myq = $myq." AND actionType='جهت اقدام فوری' ";break;}
						case '5': {$myq = $myq." AND actionType='جهت بررسی و اقدام لازم' ";break;}
						case '6': {$myq = $myq." AND actionType='جهت صدور دستور لازم' ";break;}
						case '7': {$myq = $myq." AND actionType='جهت استحضار' ";break;}
						}
					}
					if(isset($_GET['unread']))
							$myq = $myq." AND recievedDate is NULL ";
					$myq = $myq." ORDER BY sentDate DESC";
					//echo $myq;
					$letter=mysql_query($myq);
					$mnr=mysql_num_rows($letter);
				?>
				<span class="pagination-info"><?php echo "1-5"." از ".$mnr; ?></span>
				<a class="btn btn-sm blue" onclick="page_down()"><i class="fa fa-angle-right"></i></a>
				<a class="btn btn-sm blue" onclick="page_up()"> <i class="fa fa-angle-left"></i></a>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			
			for($i = 0; $i < $mnr; $i++)
			{
				$data = mysql_fetch_array($letter);
				$sender=mysql_query("SELECT name, familyName FROM users WHERE id='".$data['senderID']."'");
				$recieverName = mysql_fetch_array($sender);
				echo
				(
					'<tr ');//onclick="viewMe('.$data['id'].',0)" dar tr bud!
					echo (($data['recievedDate']==NULL)?('class="unread"'):(''));
					echo('>
						<td class="inbox-small-cells"></td>
						<td class="inbox-small-cells">
							<button id="let'.$data['id'].'" class="btn default" name="demo_3" type="button" onclick="del(this.id)">Delete</button>
						</td>
						<td class="inbox-small-cells"></td>
						<td class="view-message sib hidden-xs">'.$recieverName['name'].' '.$recieverName['familyName'].'</td>
						<td class="view-message  golabi" name="letS'.$data['id'].'" onclick="viewMe('.$data['id'].',0)">'.$data['subject'].'</td>
						<td class="view-message sib">'); echo (($data['private'] == '0') ? ('غیرمحرمانه') : ('محرمانه')); echo('</td>
						<td class="view-message sib">'.$data['actionType'].'</td>
						<td class="view-message sib inbox-small-cells">');
						if($data['attachment'] != "NULL" && $data['attachment'] != NULL) echo('<i class="fa fa-paperclip"></i></td>'); else echo ('</td>');
						echo('<td class="view-message sib text-right">'.$data['sentDate'].'</td>
					</tr>'
				);
			}
		?>
	</tbody>
</table>
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
<script>
jQuery(document).ready(function() {
// initiate layout and plugins
App.init();
UIBootbox.init();
});
</script>