<?php
/*
 * 主页：http://addon.discuz.com/?@ailab
 * 人工智能实验室：Discuz!应用中心十大优秀开发者！
 * 插件定制 联系QQ594941227
 * From www.ailab.cn
 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
loadcache('plugin');
if(!$_G['uid']){
	showmessage(lang('plugin/autologin','login'),'',array(),array('login'=>true));
}
$info=DB::fetch_first("select * from ".DB::table('autologin')." where uid=".$_G['uid']);
if($info){
$url=$_G['siteurl'].'plugin.php?id=autologin&sid='.$info['sid'];
$Shortcut = "[InternetShortcut]
URL=$url
IDList=
IconIndex=43
IconFile=C:\Windows\system32\SHELL32.dll
Hotkey=1626
[{000214A0-0000-0000-C000-000000000046}]
Prop3=19,2
";
Header("Content-type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=".$_G['setting']['bbname'].".url;"); 
echo $Shortcut; 
}else{
	showmessage(lang('plugin/autologin','tip_reset_error'),'home.php?mod=spacecp&ac=plugin&id=autologin:admincp');
}

?>