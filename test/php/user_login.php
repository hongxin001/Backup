<?php
	include "mysql.php";
	ses_start();
	$username = filt($_POST[username]);
	$password = filt($_POST[password]);
	$result=mysql_query("select * from users where username='$username' and password='$password'");
	$num=mysql_num_rows($result);
	if($num)
	{   
	    $_SESSION["username"]="$username";
		echo session_id();
		}
	else echo "0";
?>