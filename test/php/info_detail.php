<?php
include "mysql.php";
error_reporting(0);
header('Content-type: application/json');
$id = filt($_POST[id]);
$type = filt($_POST[type]);
if($type==1)
{
$result=mysql_query("select * from car_infos where id='$id' ");
if(!$result)exit(0);
$num=mysql_num_rows($result);
if($num){
	$msg=mysql_fetch_assoc($result);
	$obj->id =  urlencode($msg[id]);
	$obj->number = urlencode($msg[number]);
	$obj->fp =  urlencode($msg[fp]);
	$obj->fc =  urlencode($msg[fc]);
	$obj->fd =  urlencode($msg[fd]);
	$obj->tp =  urlencode($msg[tp]);
	$obj->tc =  urlencode($msg[tc]);
	$obj->td =  urlencode($msg[td]);
	$obj->ct =  urlencode($msg[ct]);
	$obj->cs =  urlencode($msg[cs]);
	$obj->cw =  urlencode($msg[cw]);
	$obj->cv =  urlencode($msg[cv]);
	$obj->brand =  urlencode($msg[brand]);
	$obj->name =  urlencode($msg[name]);
	$obj->phone =  urlencode($msg[phone]);
	$obj->info =  urlencode($msg[info]);
	$obj->dst =  urlencode($msg[dst]);
	$obj->time =  urlencode($msg[time]);
	$obj->user_id =  urlencode($msg[user_id]);
	echo str_replace("	", "",urldecode(json_encode($obj)));
}
else echo 0;
}
else if($type==2)
{
$result=mysql_query("select * from good_infos where id='$id' ");
if(!$result)exit(0);
$num=mysql_num_rows($result);
if($num){
	$msg=mysql_fetch_assoc($result);
	$obj->id =  urlencode($msg[id]);
	$obj->fp =  urlencode($msg[fp]);
	$obj->fc =  urlencode($msg[fc]);
	$obj->fd =  urlencode($msg[fd]);
	$obj->tp =  urlencode($msg[tp]);
	$obj->tc =  urlencode($msg[tc]);
	$obj->td =  urlencode($msg[td]);
	$obj->ct =  urlencode($msg[ct]);
	$obj->cs =  urlencode($msg[cs]);
	$obj->gn =  urlencode($msg[gn]);
	$obj->gv =  urlencode($msg[gv]);
	$obj->gw =  urlencode($msg[gw]);
	$obj->date =  urlencode($msg[date]);
	$obj->price =  urlencode($msg[price]);
	$obj->name =  urlencode($msg[name]);
	$obj->phone =  urlencode($msg[phone]);
	$obj->info =  urlencode($msg[info]);
	$obj->time =  urlencode($msg[time]);
	$obj->user_id =  urlencode($msg[user_id]);
	echo str_replace("	", "",urldecode(json_encode($obj)));
}
else echo 0;
}
else echo 0;
?>