<?php
    include "mysql.php";
    error_reporting(0);
    header('Content-type: application/json');
    mysql_query("SET NAMES utf8");
    $p = filt($_POST[p]);
    $c = filt($_POST[c]);
    $res=mysql_query("select * from province where province='$p'");
    $msg=mysql_fetch_assoc($res);
    $res=mysql_query("select * from city where city='$c' and fatherID='$msg[provinceID]'");
    $city=mysql_fetch_assoc($res);
    $result=mysql_query("select * from area where fatherID='$city[cityID]'");
    $num=mysql_num_rows($result);

    $obj->num = $num;
    for($i=0;$i<$num;$i++)
    {
        $msg=mysql_fetch_assoc($result);
        $obj->array[$i]->area = urlencode($msg[area]);
    }
    echo str_replace("  ", "",urldecode(json_encode($obj)));
?>