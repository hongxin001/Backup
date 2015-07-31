<?php
	require_once '../conn.php';
	$name_cap = mysql_real_escape_string($_POST['name_cap']);
	$phone_cap = mysql_real_escape_string($_POST['phone_cap']);
	$name_one = mysql_real_escape_string($_POST['name_one']);
	$name_two = mysql_real_escape_string($_POST['name_two']);
	$info = mysql_real_escape_string($_POST['contactMessageTextarea']);
	$sql = "select * from team where phone_cap='$phone_cap'";
	$res = mysql_query($sql);
	if($row = mysql_fetch_array($res)){
		Header("Location: failed.html");
	}
	else{
		$sql = "insert into team (name_cap, phone_cap, name_one, name_two, info) values ('$name_cap', '$phone_cap', '$name_one', '$name_two', '$info')";
		if(mysql_query($sql)){
			//跳转 finish改成成功后的界面
			Header("Location: success.html");
		}else{
			echo mysql_error();
			echo "失败";
		}
	}
	

