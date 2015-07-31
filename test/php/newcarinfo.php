<?php
	include "mysql.php";
	ses_start();
	$fp = filt($_POST[fp]);
	$fc = filt($_POST[fc]);
	$fd = filt($_POST[fd]);
	$tp = filt($_POST[tp]);
	$tc = filt($_POST[tc]);
	$td = filt($_POST[td]);
	$onroad = filt($_POST[onroad]);
	$username = filt($_SESSION["username"]);
	if($username=="")exit ("0");
	$result = mysql_query("select * from users where username='$username'");
	$msg = mysql_fetch_assoc($result);
	if(!$msg["verify"])exit("0");
	$id = $msg[id];
	$name = $msg[name];
	$phone = $msg[phone];
	$result =  mysql_query("select * from car_infos where user_id='$id'");
	$num = mysql_num_rows($result);
	$result =  mysql_query("select * from car where user_id='$id'");
	$msg = mysql_fetch_assoc($result);
	if($num)
	{
		
		mysql_query("delete from car_infos where user_id='$id'");
		$result = mysql_query("insert into car_infos(number,fp,fc,fd,tp,tc,td,ct,cs,cw,cv,brand,phone,name,onroad,info,user_id)
                        values('$msg[number]','$fp','$fc','$fd','$tp','$tc','$td','$msg[ct]','$msg[cs]','$msg[cw]','$msg[cv]','$msg[brand]','$phone','$name','$onroad','$msg[info]','$id')");
	}
	else
	{
		$result = mysql_query("insert into car_infos(number,fp,fc,fd,tp,tc,td,ct,cs,cw,cv,brand,phone,name,info,user_id)
                        values('$msg[number]','$fp','$fc','$fd','$tp','$tc','$td','$msg[ct]','$msg[cs]','$msg[cw]','$msg[cv]','$msg[brand]','$phone','$name','$onroad','$msg[info]','$id')");
	}
	if($result)echo "1";
	else echo "0"
?>