<?php
	include "mysql.php";
	error_reporting(0);
	ses_start();
	header('Content-type: application/json');
    $result=mysql_query("select * from users where username='$_SESSION[username]'");
	$msg = mysql_fetch_assoc($result);
    $res=mysql_query("select * from message where user_id='$msg[id]' and looked='0' limit 0,20");
    $obj->all = mysql_num_rows($result);
    $result=mysql_query("select * from message where user_id='$msg[id]' limit 0,20");
    $num = mysql_num_rows($result);
    for($i=0;$i<$num;$i++)
    {
		$msg1 = mysql_fetch_assoc($result);
		$result2 = mysql_query("select * from good_infos where Id='$msg1[msg]'");
		$msg = mysql_fetch_assoc($result2);
		$array[$i]->id = $msg[Id];
		$array[$i]->fp = urlencode($msg[fp]);
		$array[$i]->fc = urlencode($msg[fc]);
		$array[$i]->fd = urlencode($msg[fd]);
		$array[$i]->tp = urlencode($msg[tp]);
		$array[$i]->tc = urlencode($msg[tc]);
		$array[$i]->td = urlencode($msg[td]);
		$array[$i]->ct = urlencode($msg[ct]);
		$array[$i]->cs = urlencode($msg[cs]);
		$array[$i]->gn = urlencode($msg[gn]);
		$array[$i]->gv = urlencode($msg[gv]);
		$array[$i]->gw = urlencode($msg[gw]);
		$array[$i]->date = urlencode($msg[date]);
		$array[$i]->price = urlencode($msg[price]);
		$array[$i]->name = urlencode($msg[name]);
		$array[$i]->phone = urlencode($msg[phone]);
		$array[$i]->info = urlencode($msg[info]);
		$array[$i]->user_id = urlencode($msg[user_id]);
		$array[$i]->time =  urlencode($msg[time]);
		$array[$i]->looked =  urlencode($msg1[looked]);
    }
	$obj->array = $array;
	echo str_replace("	", "",urldecode(json_encode($obj)));
	mysql_query("update message set looked=1 where user_id='$id'");

?>