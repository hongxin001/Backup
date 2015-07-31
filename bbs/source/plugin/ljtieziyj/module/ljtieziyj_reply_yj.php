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
if($_G['timestamp'] < ($wcache['replytime'] + $config['yjtime'])||!$isnot){
	exit;
}
$wcache['replytime'] = $_G['timestamp'];
require_once libfile('function/cache');
writetocache('ljtieziyj', getcachevars(array('wcache' => $wcache))); //将管理中心配置项写入缓存
$bankuai=$config['bankuai'];
$lou=$config['lou'];
for($i=0;$i<$config['yjnum'];$i++){
	$ht_yj=$ft_yj=C::t("#ljtieziyj#alj_mail_reply")->fetch_by_first();
	if(!$ht_yj){
		break;
	}
	
	$tid=$ht_yj['tid'];
	$fid=$ht_yj['fid'];
	$pid=$ht_yj['pid'];
	$id=$ht_yj['id'];
	$url=$web_root."forum.php?mod=viewthread&tid=$tid";
	$author=C::t("#ljtieziyj#alj_mail_reply")->fetch_forum_post_by_author($pid);
	$forum=C::t("#ljtieziyj#alj_mail")->fetch_by_forum_forum_left_forum_forumfield($fid);
	$name=$forum['name'];
	$thread=C::t("forum_thread")->fetch($tid);
	$post=C::t("forum_post")->fetch('',$pid);
	$tuijian=C::t("#ljtieziyj#alj_mail_reply")->fetch_all_by_forum_thread();
	foreach($tuijian as $mess){
		$tuijians.='<a href="'.$web_root.'forum.php?mod=viewthread&tid='.$mess['tid'].'">'.$mess['subject'].'</a><br/>';
	}
	//debug($tuijians);
	$maxposition=$thread['maxposition'];
	
	if($maxposition<=$lou){
		$authorid=$thread['authorid'];
		$subject=$thread['subject'];
		$email_first=C::t("common_member")->fetch($authorid);
		//debug($email_first);
		$email=$email_first['email'];
		$title=$config['title'];
		$title=str_replace('{sitename}',$sitename,$title);
		$title=str_replace('{bkname}',$name,$title);
		$title=str_replace('{subject}',$subject,$title);
		$title=str_replace('{author}',$subject,$title);
		$message=$config['message'];
		$message=str_replace('{author}',$author,$message);
		$message=str_replace('{name}',$thread[author],$message);
		$message=str_replace('{bkname}',$name,$message);
		$message=str_replace('{message}',discuzcode($post['message']),$message);
		$message=str_replace('{subject}',$subject,$message);
		$message=str_replace('{tuijian}',$tuijians,$message);
		$content=str_replace('{lianjie}','<a href="'.$url.'">'.$subject.'</a>',$message);
		if(!sendmail($email,$title,$content)) {
			$log=array('sendemail'=>$email,'sendtype'=>2,'sendtime'=>$_G['timestamp'],'success'=>0,'pid'=>$pid);
			C::t("#ljtieziyj#alj_mail_log")->insert($log);
			runlog('sendmail', "$email sendmail failed.");
			C::t("#ljtieziyj#alj_mail_reply")->delete($id);
		}else{
			$log=array('sendemail'=>$email,'sendtype'=>2,'sendtime'=>$_G['timestamp'],'success'=>1,'pid'=>$pid);
			C::t("#ljtieziyj#alj_mail_log")->insert($log);
			C::t("#ljtieziyj#alj_mail_reply")->delete($id);
		}
	}
}
?>