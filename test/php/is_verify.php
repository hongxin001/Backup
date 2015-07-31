<?php
	include "mysql.php";
	ses_start();
	$username = filt($_SESSION["username"]);
	$result = mysql_query("select * from users where username='$username'");
	$msg = mysql_fetch_assoc($result);
	if(!$msg["verify"])exit("0");
	exit("1");
?>