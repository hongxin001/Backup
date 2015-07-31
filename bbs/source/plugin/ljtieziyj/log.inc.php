<?php
/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: log_inc.php 28969 2013-06-13 01:00:45Z liangjian $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
if($_GET['act']=='del'){
	if($_GET['formhash']==formhash()){
		C::t('#ljtieziyj#alj_mail_log')->truncate();
		cpmsg(lang('plugin/ljtieziyj','log_1'),'action=plugins&operation=config&do=$do&identifier=ljtieziyj&pmod=log');
	}

}
$currpage=$_GET['page']?$_GET['page']:1;
$perpage=20;
$start=($currpage-1)*$perpage;
$num=C::t('#ljtieziyj#alj_mail_log')->count();
$log=C::t('#ljtieziyj#alj_mail_log')->range($start,$perpage,'desc');
$paging = helper_page :: multi($num, $perpage, $currpage, "admin.php?action=plugins&operation=config&do=$do&identifier=ljtieziyj&pmod=log", 0, 20, false, false);
include template('ljtieziyj:log');


?>