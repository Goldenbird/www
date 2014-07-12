<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	session_name("oa");
	session_start();
	if(isset($_SESSION['username'])==false)
	{
		header("Location: page_login.php");
		Die();
	}
	include 'db_connect.php';
	$query=mysql_query("SELECT * FROM letters WHERE recieverID='".$_SESSION['username']."' AND recievedDate IS NULL");
	$now=strtotime(date("Y-m-d H:i:s")."");
	$unread_num=mysql_num_rows($query);
	echo $unread_num."@";
?>
<li>
	<p><?php echo "شما ".$unread_num." نامه جدید دارید"?> </p>
</li>

<li>
<ul class="dropdown-menu-list scroller" style="height: 250px;">

<?php
	for($i=0; $i<$unread_num; $i++)
	{
		$data=mysql_fetch_array($query);
		$age=$now-strtotime($data['sentDate']);
		$deadline=72;
		if($data['priority']=="1")
			$deadline=72;
		else if($data['priority']=="2")
			$deadline=24;
		else if($data['priority']=="3")
			$deadline=1;
		$remainder=($deadline*3600)-$age;
		$dataha[$i]['time']=$remainder;
		$dataha[$i][1]=$data['subject'];
		$dataha[$i][2]=$data['senderID'];
		$dataha[$i][3]=$data['id'];
	}
	$tmp = Array(); 
	foreach($dataha as &$dt) 
		$tmp[] = &$dt["time"]; 
	array_multisort($tmp, $dataha);
	for($i=0; $i<$unread_num; $i++)
	{
		$remainder =$dataha[$i]["time"];
		if($remainder >= 86400)
			echo floor($remainder/86400)."روز";
		if(($remainder%86400) >= 3600)
			echo floor(($remainder%86400)/3600)."ساعت";
		if(($remainder%3600) >= 60)
			echo floor(($remainder%3600)/60)."دقیقه";
		if($remainder >= 60)
			echo ($remainder%60)."ثانیه";
		else if($remainder <= 0)
			echo "فرصت پاسخگویی به این نامه تمام شده است";
		echo '
		<li';echo(($i==($unread_num-1))?('class="last-line"'):(''));echo'>
			<a href="inbox.php?loadview='.$dataha[$i][3].'">
			<span class="photo">';
			$q=mysql_query("SELECT name, familyName, image FROM users WHERE id='".$dataha[$i][2]."'");
			$sender=mysql_fetch_array($q);
			echo'<img src="'.$sender['image'].'" alt=""/></span>
			<span class="subject">
			<span class="from">'.$sender['name'].' '.$sender['familyName'].'</span>
			</span>
			<span class="message">
			'.$dataha[$i][1].'
			</span>  
			</a>
		</li>
		';
		
	}
	//data-hover="dropdown"
?>
</ul>
</li>
<li class="external">   
	<a href="inbox.php">مشاهده تمام نامه ها<i class="m-icon-swapright"></i></a>
</li>

