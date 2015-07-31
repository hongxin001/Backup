<?php
	include "mysql.php";
	error_reporting(0);
	header('Content-type: application/json');
    if($_POST[offset])
    $offset=filt($_POST[offset]);
    else $offset=0;
    if($_POST[num])
    $num=filt($_POST[num]);
    else $num=100;
    if($_POST[type])
    $type=filt($_POST[type]);
    else $type=2;
    if($_POST[dst])
    $dst=filt($_POST[dst]);
    else $dst=0;
    $from = filt($_POST[from]);
    $to = filt($_POST[to]);
    	$fp=$from;
		$fc=substr(strstr($fp,"-"),1);
		$fd=substr(strstr($fc,"-"),1);
		if($fc)$fp=substr($fp,0,-strlen($fc)-1);
		if($fd)$fc=substr($fc,0,-strlen($fd)-1);
		$tp=$to;
		$tc=substr(strstr($tp,"-"),1);
		$td=substr(strstr($tc,"-"),1);
		if($tc)$tp=substr($tp,0,-strlen($tc)-1);
		if($td)$tc=substr($tc,0,-strlen($td)-1);
    if($type == 1)
	{	
		if($dst=="1")
		{
    	$result=mysql_query("select * from car_infos where fp=tp and fc=tc and fp like '%$fp%' and fc like '%$fc%' and fd like '%$fd%' and tp like '%$tp%' and tc like '%$tc%' and td like '%$td%' order by id desc limit $offset,$num");
		$all = mysql_query("select * from car_infos where fp=tp and fc=tc and fp like '%$fp%' and fc like '%$fc%' and fd like '%$fd%' and tp like '%$tp%' and tc like '%$tc%' and td like '%$td%'");
		$all = mysql_num_rows($all);
		}
		else
		{
    	$result=mysql_query("select * from car_infos where fp like '%$fp%' and fc like '%$fc%' and fd like '%$fd%' and tp like '%$tp%' and tc like '%$tc%' and td like '%$td%' order by id desc limit $offset,$num");
		$all = mysql_query("select * from car_infos where fp like '%$fp%' and fc like '%$fc%' and fd like '%$fd%' and tp like '%$tp%' and tc like '%$tc%' and td like '%$td%'");
		$all = mysql_num_rows($all);
		}
    $num=mysql_num_rows($result);
	$obj->all = $all;
	$obj->num = $num;
    for($i=0;$i<$num;$i++)
	{
	    $msg=mysql_fetch_assoc($result);
		$array[$i]->id = $msg[Id];
		$array[$i]->number = urlencode($msg[number]);
		$array[$i]->fp = urlencode($msg[fp]);
		$array[$i]->fc = urlencode($msg[fc]);
		$array[$i]->fd = urlencode($msg[fd]);
		$array[$i]->tp = urlencode($msg[tp]);
		$array[$i]->tc = urlencode($msg[tc]);
		$array[$i]->td = urlencode($msg[td]);
		$array[$i]->ct = urlencode($msg[ct]);
		$array[$i]->cs = urlencode($msg[cs]);
		$array[$i]->cw = urlencode($msg[cw]);
		$array[$i]->cv = urlencode($msg[cv]);
		$array[$i]->brand = urlencode($msg[brand]);
		$array[$i]->name = urlencode($msg[name]);
		$array[$i]->phone = urlencode($msg[phone]);
		$array[$i]->info = urlencode($msg[info]);
		$array[$i]->user_id = urlencode($msg[user_id]);
		$array[$i]->time =  urlencode($msg[time]);
	}
	$obj->array = $array;
	echo str_replace("	", "",urldecode(json_encode($obj)));
	}
	else if($type == 2)
	{
		if($dst=="1")
		{
    	$result=mysql_query("select * from good_infos where fp=tp and fc=tc and fp like '%$fp%' and fc like '%$fc%' and fd like '%$fd%' and tp like '%$tp%' and tc like '%$tc%' and td like '%$td%' order by id desc limit $offset,$num");
		$all = mysql_query("select * from good_infos where fp=tp and fc=tc and fp like '%$fp%' and fc like '%$fc%' and fd like '%$fd%' and tp like '%$tp%' and tc like '%$tc%' and td like '%$td%'");
		$all = mysql_num_rows($all);
		}
		else
		{
    	$result=mysql_query("select * from good_infos where fp like '%$fp%' and fc like '%$fc%' and fd like '%$fd%' and tp like '%$tp%' and tc like '%$tc%' and td like '%$td%' order by id desc limit $offset,$num");
		$all = mysql_query("select * from good_infos where fp like '%$fp%' and fc like '%$fc%' and fd like '%$fd%' and tp like '%$tp%' and tc like '%$tc%' and td like '%$td%'");
		$all = mysql_num_rows($all);
		}
    $num=mysql_num_rows($result);
	$obj->all = $all;
	$obj->num = $num;
    for($i=0;$i<$num;$i++)
	{
	    $msg=mysql_fetch_assoc($result);
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
	}
	$obj->array = $array;
	echo str_replace("	", "",urldecode(json_encode($obj)));
	}
?>