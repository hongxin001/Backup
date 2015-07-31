<?php
	include "mysql.php";
	session_start();
	$fp = filt($_POST[fp]);
	$fc = filt($_POST[fc]);
	$fd = filt($_POST[fd]);
	$tp = filt($_POST[tp]);
	$tc = filt($_POST[tc]);
	$td = filt($_POST[td]);
	$gn = filt($_POST[gn]);
	$gw = filt($_POST[gw]);
	$gv = filt($_POST[gv]);
	$ct = filt($_POST[ct]);
	$cs = filt($_POST[cs]);
	$date = filt($_POST[date]);
	$info = filt($_POST[info]);
	$price = filt($_POST[price]);
	$username = filt($_SESSION["username"]);
	if($username=="")exit ("0");
	$result = mysql_query("select * from users where username='$username'");
	$msg = mysql_fetch_assoc($result);
	if(!$msg["verify"])exit("0");
	$id = $msg[id];
	$name = $msg[name];
	$result = mysql_query("insert into good_infos(fp,fc,fd,tp,tc,td,ct,cs,gn,gv,gw,date,price,phone,name,info,user_id)
                        values('$fp','$fc','$fd','$tp','$tc','$td','$ct','$cs','$gn','$gv','$gw','$date','$price','$username','$name','$info','$id')");
	if($result)echo "1";
	else echo "0"
?>