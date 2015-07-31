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
$vars = $_G['cache']['plugin']['autologin'];
$config_checkcode=intval($vars['checkcode']);

$sid=addslashes(trim($_GET['sid']));
if(!$sid) showmessage(lang('plugin/autologin','tip_nosid'),'home.php?mod=spacecp&ac=plugin&id=autologin:admincp');
$info=DB::fetch_first("select * from ".DB::table('autologin')." where sid='$sid'");
if(!$info){
	showmessage(lang('plugin/autologin','tip_noinfo'),'home.php?mod=spacecp&ac=plugin&id=autologin:admincp');
}
if($_G['uid']&&$info['uid']&&$_G['uid']==$info['uid']){//当前已经是登陆状态
	showmessage(lang('plugin/autologin','tip_loginok'),'index.php', array(), array('locationtime'=>true,'refreshtime'=>3, 'showdialog'=>1, 'showmsg' => true));
}

if($config_checkcode&&!submitcheck('codesubmit')){
	include template('autologin:checkcode');
}else{
	if($config_checkcode){
		$code=addslashes(trim($_POST['code']));
		if(!$code||$code!=$info['code']) showmessage(lang('plugin/autologin','codecheck_error'));
	}
	require_once libfile('function/member');
	list($password,$questionid,$answer) = explode("\t", authcode($info['logindata'],'DECODE',$_G['config']['security']['authkey']));
	$result = userlogin($info['username'],$password,$questionid,$answer,'username',$_G['clientip']);
	if($result['status']>0) {
		setloginstatus($result['member'],2592000);
		dsetcookie('mrn', '');
		dsetcookie('mrd', '');
		$log=array(
			'uid'=>$info['uid'],
			'username'=>$info['username'],
			'ip'=>$_G['clientip'],
			'dateline'=>TIMESTAMP
		);
		DB::insert('autologin_log',$log);
		showmessage(lang('plugin/autologin','tip_loginok'),'index.php', array(), array('locationtime'=>true,'refreshtime'=>3, 'showdialog'=>1, 'showmsg' => true));
	}else{
		showmessage(lang('plugin/autologin','tip_login_error'));
	}
}


?>