<?php
	include "mysql.php";
	session_start();
	$username = $_SESSION["username"];
	$feedback = filt($_GET[feedback]);
	if($username=="")exit ("0");
	$result = mysql_query("select * from users where username='$username'");
	$msg = mysql_fetch_assoc($result);
	$res = mysql_query("insert into feedback(msg,user_id) values('$feedback','$msg[id]')");
	if($res)echo "1";
?>
