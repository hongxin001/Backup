<?php
/*
 * 主页：http://addon.discuz.com/?@ailab
 * 人工智能实验室：Discuz!应用中心十大优秀开发者！
 * 插件定制 联系QQ594941227
 * From www.ailab.cn
 */
 
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$count = DB::result_first("SELECT COUNT(*) FROM ".DB::table('autologin'));
$pagenum=20;
$page=max(1,intval($_GET['page']));
$start=($page-1)*$pagenum;
showtableheader(lang('plugin/autologin',lang('plugin/autologin','log_title')),'');
showtableheader();
showsubtitle(array(lang('plugin/autologin','log_id'),lang('plugin/autologin','log_username'),lang('plugin/autologin','log_dateline'),lang('plugin/autologin','log_times')));
if($count) {
	$query = DB::query("SELECT * FROM ".DB::table('autologin')." ORDER BY id DESC LIMIT $start,$pagenum");
	while($result = DB::fetch($query)) {
		$times=DB::result_first("select count(*) from ".DB::table('autologin_log')." where uid=".$result['uid']);
		showtablerow(NULL,NULL, array(
		$result['id'],
		'<a href="home.php?mod=space&uid='.$result['uid'].'" target="_blank">'.$result['username'].'</a>',
		date('Y-m-d H:i',$result['dateline']),
		$times,
		));
	}
}
showtablerow();
showtablefooter();
echo multi($count, $pagenum, $page, ADMINSCRIPT.'?action=plugins&operation=config&identifier=autologin&pmod=data');	
?>