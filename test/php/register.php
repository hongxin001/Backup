<?php
include "mysql.php";
ses_start();
$username = filt($_POST[username]);
$password = filt($_POST[password]);
$type = filt($_POST[type]);
$email = filt($_POST[email]);
$name = filt($_POST[name]);
$cfword = filt($_POST[cfword]);
$res=mysql_query("select * from users where username='$username'");
$num=mysql_num_rows($res);
if($num)
	echo "0";
else
{
	if($cfword!=$_SESSION["cfword"])exit("2");
	$result = mysql_query("insert into users(username,password,type,name,email,phone) values('$username','$password','$type','$name','$email','$username')");
	if($result)
	{
    	echo "1";
    	session_start();
	    $_SESSION["username"]=$username;
	    $result = mysql_query("select * from users where username='$username'");
	    $msg = mysql_fetch_assoc($result);
	    $id = $msg[id];
	    if($type==1){
		$number = filt($_POST[number]);
		$ct = filt($_POST[ct]);
		$cs = filt($_POST[cs]);
		$cw = filt($_POST[cw]);
		$cv = filt($_POST[cv]);
		$brand = filt($_POST[brand]);
		$info = filt($_POST[info]);
		$result = mysql_query("insert into car(number,ct,cs,cw,cv,brand,info,user_id) values('$number','$ct','$cs','$cw','$cv','$brand','$info','$id')");
    	}
    	if($type==2){
		$number = filt($_POST[number]);
		$result = mysql_query("insert into person(number,user_id) values('$number','$id')");
    	}
    	if($type==3){
		$com_name = filt($_POST[com_name]);
		$location = filt($_POST[location]);
		$result = mysql_query("insert into company(com_name,location,user_id) values('$com_name','$location','$id')");
    	}
	}
	else 
    	echo "0";
}
?>