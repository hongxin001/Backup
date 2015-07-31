<?php
	include "mysql.php";
	ses_start();
        $op=filt($_POST[old_pwd]);
        $np=filt($_POST[new_pwd]);
	if($_SESSION[username]=="")exit("0");
        if($np=="")exit("0");
	$res=mysql_query("select * from users where password='$op' and username='$_SESSION[username]'");
	if(mysql_num_rows($res))
	$res=mysql_query("update users set password='$np' where username='$_SESSION[username]'");
	else
	    exit("2");
	if($res){
		echo "1";
	}
	else echo "0";
?>