<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$fast = $_GET['fast'] ? intval($_GET['fast']) : 0;
include template('cat_danmaku:index');
?>