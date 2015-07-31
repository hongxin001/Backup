<?php
include "mysql.php";
error_reporting(0);
header('Content-type: application/json');
    ses_start();
    $id = filt($_GET[id]);
    if($id)
    $result=mysql_query("select * from users where id='$id' ");
    else 
    $result=mysql_query("select * from users where username='$_SESSION[username]' ");
      if(!$result)exit("0");
	    $msg=mysql_fetch_assoc($result);
	    $obj->id=$msg[id];
	    $obj->username=urlencode($msg[username]);
	    $obj->name=urlencode($msg[name]);
	    $obj->email=urlencode($msg[email]);
    	$result=mysql_query("select * from car where user_id='$msg[id]' ");
      if(!$result)exit("0");
    	$msg=mysql_fetch_assoc($result);
	    $obj->ct=urlencode($msg[ct]);
	    $obj->cs=urlencode($msg[cs]);
	    $obj->cv=urlencode($msg[cv]);
	    $obj->cw=urlencode($msg[cw]);
	    $obj->number=urlencode($msg[number]);
    	$result=mysql_query("select * from car_infos where user_id='$msg[user_id]' ");
    	$msg=mysql_fetch_assoc($result);
	    $obj->fp=urlencode($msg[fp]);
	    $obj->fc=urlencode($msg[fc]);
	    $obj->fd=urlencode($msg[fd]);
	    $obj->tp=urlencode($msg[tp]);
	    $obj->tc=urlencode($msg[tc]);
	    $obj->td=urlencode($msg[td]);
	    echo str_replace("	", "",urldecode(json_encode($obj)));
?>