<?php
    mysql_connect("localhost","wei","wei8620436");
    mysql_select_db("56huowu");
    function filt($sql){
        $sql = str_replace(";", "",$sql);
        $sql = str_replace("#", "",$sql);
        $sql = str_replace("'", "",$sql);
        return $sql;
    }
    function ses_start()
    {
        if($_POST[sessionId])session_id("$_POST[sessionId]");
	    session_start();
    }
?>