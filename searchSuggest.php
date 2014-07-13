<?php
error_reporting(E_ALL ^ E_DEPRECATED);
	function replace_unicode_escape_sequence($match) {
		return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
	}
	function unicode_decode($str) {
		return preg_replace_callback('/%u([^m-z]{4})/i', 'replace_unicode_escape_sequence', $str);
	}
	session_name("oa");
	session_start();
	if(isset($_SESSION['username']) == false) {
		header("Location: page_login.php");
		DIE();
	}
	else
	$bye=mysql_query("UPDATE login SET logout='".date("Y-m-d H:i:s")."' WHERE userID='".$_SESSION['username']."' AND login='".$_SESSION['loginTime']."'");
	include 'db_connect.php';
	if (isset($_GET['search']) && $_GET['search'] != '') {
	//Add slashes to any quotes to avoid SQL problems.
	$search = addslashes($_GET['search']);
	//Get every page title for the site.
	
	$query="SELECT users.id, users.name, users.familyName, occupation.name, departments.name FROM ((users INNER JOIN occupation ON users.occupationID = occupation.id) INNER JOIN departments ON users.departmentID = departments.id) 
		    WHERE users.name like('".unicode_decode($search)."%') OR users.familyName like('".unicode_decode($search)."%') OR occupation.name like('".unicode_decode($search)."%') OR departments.name like('".unicode_decode($search)."%') ORDER BY users.name";
	//echo $query . "\n" ;
	$suggest_query = mysql_query($query);
	while($suggest = mysql_fetch_array($suggest_query)) {
		//Return each page title seperated by a newline.
		echo $suggest[0]."$".$suggest[1]." ".$suggest[2]." ".$suggest[3]." ".$suggest[4]. "\n";
	}
	$quer="SELECT id, name FROM groups WHERE name like('".unicode_decode($search)."%') AND ownerID='".$_SESSION['username']."' ORDER BY name";
	//echo $query . "\n" ;
	$suggest_quer = mysql_query($quer);
	while($sugg = mysql_fetch_array($suggest_quer)) {
		//Return each page title seperated by a newline.
		echo "G".$sugg[0]."$ گروه"." ".$sugg[1]. "\n";
	}
}
?>