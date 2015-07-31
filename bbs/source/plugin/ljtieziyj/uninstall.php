<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$settingfile = DISCUZ_ROOT . './data/sysdata/cache_ljtieziyj.php';
if(file_exists($settingfile)){
	unlink($settingfile);
}
$sql = <<<EOF
drop table IF EXISTS `pre_alj_mail_reply`;
drop table IF EXISTS `pre_alj_mail_log`;
drop table IF EXISTS `pre_alj_mail`;
EOF;
runquery($sql);
$finish = TRUE;
?>