<?php
	$con = mysql_connect('localhost', 'root', 'IDDAPcYb');
	if(!$con){
		die('数据库连接失败');
	}
	if(!mysql_select_db('match', $con)){
		die('数据库选择失败');
	}