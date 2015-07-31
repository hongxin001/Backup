<?php
	require_once '../conn.php';
	$name = mysql_real_escape_string($_POST['contactNameField']);
	$phone = mysql_real_escape_string($_POST['contactTelField']);
	$idea = mysql_real_escape_string($_POST['contactMessageTextarea']);
	$sql = "insert into idea (name, phone, idea) values ('$name', '$phone', '$idea')";
	//echo mysql_query($sql) ? "insert success" : mysql_error();
	if(!mysql_query($sql)){
		echo '失败';
	}else{
		header('Location:success.html');
	}