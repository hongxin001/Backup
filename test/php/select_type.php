<?php

    include "mysql.php";
    error_reporting(0);
    header('Content-type: application/json');
    mysql_query("SET NAMES utf8");
    $type = filt($_POST[type]);
    $result=mysql_query("select * from cartype where type_id=$type");
    $num=mysql_num_rows($result); 
    $obj->typenum = $num;
    for($i=0;$i<$num;$i++)
    {
        $msg=mysql_fetch_assoc($result);
        $obj->type[$i]->type = urlencode($msg[type]);
        $obj->type[$i]->id = urlencode($msg[Id]);
    }
    $result=mysql_query("select * from carbrand where type_id=$type");
    $num=mysql_num_rows($result); 
    $obj->brandnum = $num;
    for($i=0;$i<$num;$i++)
    {
        $msg=mysql_fetch_assoc($result);
        $obj->brand[$i]->brand = urlencode($msg[brand]);
    }
    echo str_replace("  ", "",urldecode(json_encode($obj)));
?>