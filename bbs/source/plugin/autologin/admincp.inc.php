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
	if(isset($_GET['reset'])){
		DB::delete('autologin',array('uid'=>$_G['uid']));
		header("HTTP/1.1 301 Moved Permanently");
		header("location: home.php?mod=spacecp&ac=plugin&id=autologin:admincp");
		exit;
	}else{
		$url=$_G['siteurl'].'plugin.php?id=autologin&sid='.$info['sid'];
	}
}else{
	if(submitcheck('codesubmit')){
		require_once libfile('function/member');
		$questionid=intval($_POST['questionid']);
		$answer=addslashes(trim($_POST['answer']));
		$result = userlogin($_G['username'], $_GET['password'],$questionid,$answer, 'username', $_G['clientip']);
		if($result['status'] > 0){
			$sid=createSid($code,TIMESTAMP,$_G['username'],$_G['uid']);
			$logindata = addslashes(authcode($_GET['password']."\t".$questionid."\t".$answer, 'ENCODE', $_G['config']['security']['authkey']));
			$data=array(
				'uid'=>$_G['uid'],
				'username'=>$_G['username'],
				'sid'=>$sid,
				'code'=>addslashes($_POST['code']),
				'logindata'=>$logindata,
				'dateline'=>TIMESTAMP,
				'status'=>1
			);
			DB::insert('autologin',$data);
			showmessage(lang('plugin/autologin','tip_setok'),'home.php?mod=spacecp&ac=plugin&id=autologin:admincp', array(), array('locationtime'=>true,'refreshtime'=>3, 'showdialog'=>1, 'showmsg' => true));
		}else{
			showmessage(lang('plugin/autologin','tip_password_error'));
		}
	}
}
function createSid($code,$prefix='',$suffix='',$uid=''){
	$base32=array(
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
		'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p',
		'q', 'r', 's', 't', 'u', 'v', 'w', 'x',
		'y', 'z', '0', '1', '2', '3', '4', '5'
	);
	$hex=md5($prefix.$url.$suffix);
	$hexLen=strlen($hex);
	$subHexLen=$hexLen/8;
	$output=array();
	for($i=0;$i<$subHexLen;$i++){
		$subHex=substr($hex,$i*8,8);
		$int=0x3FFFFFFF&(1*('0x'.$subHex));
		$out='';
		for($j=0;$j<6;$j++){
			$val=0x0000001F&$int;
			$out.=$base32[$val];
			$int=$int>>5;
		}
		$output[] = $out;
	}
	return $output[$uid%3];
}
?>