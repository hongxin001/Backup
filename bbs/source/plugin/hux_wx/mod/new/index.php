<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include DISCUZ_ROOT.'./source/plugin/hux_wx/mod/new/lang/lang.'.currentlang().'.php';
$msgtype = 'news';
$notfid = explode(',',$appconfig['fid']);
$order = 'dateline';
$t_query = C::t('forum_thread')->fetch_all_rank_thread('', $notfid, $order, 0, 10);
$k = 0;
foreach ($t_query as $v) {
	$k ++;
	$t_pic = C::t('#hux_wx#hux_forum_threadimage')->fetch_by_tid($v['tid']);
	if ($t_pic) {
		$v['pic'] = $t_pic['remote'] ? $_G['setting']['ftp']['attachurl'].'forum/'.$t_pic['attachment'] : $_G['siteurl'].$_G['setting']['attachurl'].'forum/'.$t_pic['attachment'];
	} else {
		if ($k == 1) {
			$v['pic'] = $_G['siteurl'].'source/plugin/hux_wx/mod/new/images/nopic.jpg';
		} else {
			$v['pic'] = $_G['siteurl'].'source/plugin/hux_wx/mod/new/images/nopic_s.jpg';
		}
	}
	if (CHARSET != 'utf-8' && !$wxsetting['code']) {
		$v['subject'] = diconv($v['subject'],CHARSET,'utf-8');
	}
	$strings[] = array(
		'title' => $v['subject'],
		'description' => '',
		'picurl' => $v['pic'],
		'url' => $_G['siteurl'].'forum.php?mod=viewthread&tid='.$v['tid'],
	);
}
$string = array(
	'items' => $strings,
);

$contentStr = $string;
?>