<?
if (! defined ( 'IN_DISCUZ' )) {
	exit ( 'Access Denied' );
}
$footerlist = array ();
if (! $_G ['uid']) {
	showmessage ( lang ( 'plugin/bullmarket_myfootprints', 's002' ), "member.php?mod=logging&action=login" );
}
//获取板块的设置信息
$select_fid=$_G['cache']['plugin'] ["bullmarket_myfootprints"]["select_forumd"];
//免费版不允许板块未设置
if(empty($select_fid))
{
	showmessage ( lang ( 'plugin/bullmarket_myfootprints', 's003' ));
}

//自定义日志表与主题列表关联查询(左连接)，查询出一周内有效数据
$querylist = DB::fetch_all ( "select log.tid,log.day,log.time,subject,views,replies,author,authorid from " . DB::table ( "bullmarket_myfootprints_viewlog" ). " log left join ".DB::table( "forum_thread" )." thread on log.tid=thread.tid where uid=" . $_G ['uid'] . " and  DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= day order by day DESC,time ASC" );
//将数据转换为带有日期时间戳索引的二维数组
$lastday = null;
$isfirst=true;
foreach ( $querylist as $query ) {
	if(empty($query['subject']))
	{
		//如果subject为空 证明此主题已被删除，将在脚印中的数据同步删除
		DB::delete("bullmarket_myfootprints_viewlog", array('tid'=>$query['tid']));
		continue;
	}
	//这个为天数索引，同一天记录day值相同
	$day = strtotime ( $query ["day"] );
	if ($lastday != $day) {
		$footerlist [$day] = array ();
	}
	$query['time']=date("H:i:s",strtotime($query['time']));
	array_push ($footerlist [$day], $query);
    if($isfirst)
	{
		$footerlist [$day][0]['isfirst']=true;
		$isfirst=false;
	}
	
	$lastday = $day;
}
include template ( "bullmarket_myfootprints:myfootprints" );