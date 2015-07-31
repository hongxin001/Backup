<?php
    include "mysql.php";
    error_reporting(0);
    header('Content-type: application/json');
    mysql_query("SET NAMES utf8");
    $p = filt($_POST[p]);
    $res=mysql_query("select * from province where province='$p'");
    $c=mysql_fetch_assoc($res);
    $result=mysql_query("select * from city where fatherID='$c[provinceID]'");
    $num=mysql_num_rows($result);

    $obj->num = $num;
    for($i=0;$i<$num;$i++)
    {
        $msg=mysql_fetch_assoc($result);
        $obj->array[$i]->city = urlencode($msg[city]);
    }
    echo str_replace("  ", "",urldecode(json_encode($obj)));
?>