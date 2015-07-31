<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP') || !$_G['adminid'] == 1) {
exit('ACCESS DENIED');
}

$sql = "DROP TABLE IF EXISTS `pre_plugin_webtech_dlist`";
runquery($sql);
$finish = TRUE;

?>