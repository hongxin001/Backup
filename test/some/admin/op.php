<?php
	require_once "../conn.php";
	$from = $_GET['from'];
	$id = $_GET['id'];
	$way = $_GET['way'];
	if($from == 1){
		$item = 'idea';
	}else{
		$item = 'team';
	}
	if($way == 1){
		$sql = "delete from $item where id = $id";
		if(mysql_query($sql)){
			header('Location:'.$item.'s.php');
		}else{
			echo mysql_error();
		}
	}else{
		$sql = "update $item set status = 1 where id = $id";
		if(mysql_query($sql)){
			header('Location:'.$item.'s.php');
		}else{
			echo mysql_error();
		}
	}