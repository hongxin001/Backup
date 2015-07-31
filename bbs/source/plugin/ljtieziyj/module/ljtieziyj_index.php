<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
if(!function_exists('sendmail')) {
	include libfile('function/mail');
}
require_once libfile('function/discuzcode');
$config = $_G['cache']['plugin']['ljtieziyj'];
$isuid=$config['isuid'];
$sitename=$_G['setting']['bbname'];
$web_root=$_G['siteurl'];
if(substr($web_root,-1)!='/'){
	$web_root=$web_root.'/';
}
$settingfile = DISCUZ_ROOT . './data/sysdata/cache_ljtieziyj.php';
if (file_exists($settingfile)) {
	include_once $settingfile;
} 
$isnot = $config['isnot'];
if($_G['timestamp'] < ($wcache['sendtime'] + $config['yjtime'])||!$isnot){
	exit;
}
$wcache['sendtime'] = $_G['timestamp'];
require_once libfile('function/cache');
writetocache('ljtieziyj', getcachevars(array('wcache' => $wcache))); //将管理中心配置项写入缓存
for($i=0;$i<$config['yjnum'];$i++){
	$ft_yj=C::t("#ljtieziyj#alj_mail")->fetch_by_first();
	if(!$ft_yj){
		break;
	}
	$tid=$ft_yj['tid'];
	$fid=$ft_yj['fid'];
	$id=$ft_yj['id'];
	if($isuid){
		$bz=C::t("#ljtieziyj#alj_mail")->fetch_all_by_forum_moderator($fid);
		
		foreach($bz as $kk=>$vv){
			$yhz.=$vv['uid'].',';
		}
		$yhz=trim($yhz,',');
		if($yhz){
			$mails=C::t("#ljtieziyj#alj_mail")->fetch_all_by_common_member($yhz);
		}else{
			C::t("#ljtieziyj#alj_mail")->delete($id);
		}
	}else{
		$yhz=$config['yhz'];
		$yhz=unserialize($yhz);
		$yhz = implode ( ',', $yhz );
		$mails=C::t("#ljtieziyj#alj_mail")->fetch_all_by_common_member_groupid($yhz);
		
	}
	
	$url=$web_root."forum.php?mod=viewthread&tid=$tid";
	$forum=C::t("#ljtieziyj#alj_mail")->fetch_by_forum_forum_left_forum_forumfield($fid);
	$name=$forum['name'];
	$thread=C::t("forum_thread")->fetch($tid);
	$mes=C::t("#ljtieziyj#alj_mail")->fetch_by_post_message($tid);
	$author=$thread['author'];
	$subject=$thread['subject'];
	$ftitle=$config['ftitle'];
	$title=str_replace('{sitename}',$sitename,$ftitle);
	$title=str_replace('{bkname}',$name,$title);
	$title=str_replace('{name}',$author,$title);
	$title=str_replace('{subject}',$subject,$title);
	$fmessage=$config['fmessage'];
	$message=str_replace('{name}',$author,$fmessage);
	$message=str_replace('{sitename}',$sitename,$message);
	$message=str_replace('{bkname}',$name,$message);
	$message=str_replace('{message}',discuzcode($mes),$message);
	$message=str_replace('{subject}',$subject,$message);
	$content=str_replace('{lianjie}','<a href="'.$url.'">'.$subject.'</a>',$message);
	foreach($mails as $k=>$v){
		$email=$v['email'];
		if(!sendmail($email,$title,$content)) {
			$log=array('sendemail'=>$email,'sendtype'=>1,'sendtime'=>$_G['timestamp'],'success'=>0,'tid'=>$tid);
			C::t("#ljtieziyj#alj_mail_log")->insert($log);
			runlog('sendmail', "$email sendmail failed.");
			C::t("#ljtieziyj#alj_mail")->delete($id);
		}else{
			$log=array('sendemail'=>$email,'sendtype'=>1,'sendtime'=>$_G['timestamp'],'success'=>1,'tid'=>$tid);
			C::t("#ljtieziyj#alj_mail_log")->insert($log);
			C::t("#ljtieziyj#alj_mail")->delete($id);
		}
	}
}

?>