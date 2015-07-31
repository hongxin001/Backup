<?php
    include "mysql.php";
	$username = filt($_POST[username]);
    $res=mysql_query("select * from users where username='$username'");
    $num=mysql_num_rows($res);
    if($num)echo "0";
    else echo "1";
?>