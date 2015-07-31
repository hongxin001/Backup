<?php
/**
 *      [Liangjian] (C)2001-2099 Liangjian Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: fingerguess.inc.php liangjian $
 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$modarray = array('index','reply_yj');

$mod = isset($_GET['mod']) ? $_GET['mod'] : '';
$mod = !in_array($mod, $modarray) ? 'index' : $mod;

require DISCUZ_ROOT.'./source/plugin/ljtieziyj/module/ljtieziyj_'.$mod.'.php';
?>