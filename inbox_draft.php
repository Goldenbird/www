<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_name("oa");
session_start();
 if(isset($_SESSION['username']) == false)
	header("Location: page_login.php");
else
	$bye=mysql_query("UPDATE login SET logout='".date("Y-m-d H:i:s")."' WHERE userID='".$_SESSION['username']."' AND login='".$_SESSION['loginTime']."'");
?>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
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
					$letter=mysql_query("SELECT * FROM drafts WHERE senderID='".$username."' ");
					$mnr=mysql_num_rows($letter);
				?>
				<span class="pagination-info"><?php echo "1-5"." از ".$mnr; ?></span>
				<a class="btn btn-sm blue"><i class="fa fa-angle-right"></i></a>
				<a class="btn btn-sm blue"><i class="fa fa-angle-left"></i></a>
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
					'<tr ');
					//echo (($data['recievedDate']==NULL)?('class="unread"'):(''));
					echo('>
						<td class="inbox-small-cells">
							<!--<input  type="checkbox" value="'.$data['id'].'" class="mail-checkbox">-->
						</td>
						<td class="inbox-small-cells">
							<button id="let'.$data['id'].'" class="btn default" name="demo_3" type="button" onclick="del(this.id)">Delete</button>
						</td>
						<td class="inbox-small-cells"></i></td>
						<td class="view-message  hidden-xs">'.$recieverName['name'].' '.$recieverName['familyName'].'</td>
						<td class="view-message" name="letS'.$data['id'].'" onclick="viewMe('.$data['id'].',1)">'.$data['subject'].'</td>
						<td class="view-message sib">'); echo (($data['private'] == '0') ? ('غیرمحرمانه') : ('محرمانه')); echo('</td>
						<td class="view-message ">'.$data['actionType'].'</td>
						<td class="view-message  inbox-small-cells">');
						if($data['attachment'] != "NULL" && $data['attachment'] != NULL) echo('<i class="fa fa-paperclip"></i></td>'); else echo ('</td>');
						echo('</td>
					</tr>'
				);
			}
		?>
	</tbody>
</table>