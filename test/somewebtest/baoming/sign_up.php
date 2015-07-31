<?php
	require_once '../conn.php';
	$name_cap = mysql_real_escape_string($_POST['name_cap']);
	$phone_cap = mysql_real_escape_string($_POST['phone_cap']);
	$name_one = mysql_real_escape_string($_POST['name_one']);
	$name_two = mysql_real_escape_string($_POST['name_two']);
	$else = mysql_real_escape_string($_POST['contactMessageTextarea']);
	$sql = "insert into team (name_cap, phone_cap, name_one, name_two, else) values ('$name_cap', '$phone_cap', '$name_one', '$name_two', '$else')";
	//echo $sql;
	//echo mysql_query($sql) ? "insert success" : mysql_error();
	if(mysql_query($sql)){
		//跳转 finish改成成功后的界面
		Header("Location: success.html");

	}else{
		echo "失败";
	}

