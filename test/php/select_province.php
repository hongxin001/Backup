<?php
    include "mysql.php";
    error_reporting(0);
    header('Content-type: application/json');
    mysql_query("SET NAMES utf8");
    $result=mysql_query("select * from province");
    $num=mysql_num_rows($result);

    $obj->num = $num;
    for($i=0;$i<$num;$i++)
    {
        $msg=mysql_fetch_assoc($result);
        $obj->array[$i]->province = urlencode($msg[province]);
    }
    echo str_replace("  ", "",urldecode(json_encode($obj)));
?>