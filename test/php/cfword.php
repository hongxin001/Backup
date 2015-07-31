<?php
	include "mysql.php";
	include "sendmsg.php";
	ses_start();
	$phone = $_POST[phone];
	list($s1, $s2) = explode(' ', microtime()); 
	if(intval(substr($s2,5))-intval(substr($_SESSION["cftime"],5))>=60)
	{
    	$c = rand(100000,999999);
		$_SESSION["cftime"]="$s2";
		$_SESSION["cfword"]="$c";
		sendmsg("您的注册验证码为"."$c","$phone");
    	echo session_id();
	}
	else echo "0";
?>