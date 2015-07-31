<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$ccmsg = "\n".str_replace('{cc}',$wxsetting['cc'],lang('plugin/hux_wx','ccmsg'));
C::t('#hux_wx#hux_wx_action')->insert(array('openid'=>$openid,'action'=>'0','type'=>$keyword));
$string = lang('plugin/hux_wx','uidusername').$ccmsg;
if (CHARSET != 'utf-8' && !$wxsetting['code']) {
	$string = diconv($string,CHARSET,'utf-8');
}
$contentStr = $string;
?>