<?
if (! defined ( 'IN_DISCUZ' )) {
	exit ( 'Access Denied' );
}
$footerlist = array ();
if (! $_G ['uid']) {
	showmessage ( lang ( 'plugin/bullmarket_myfootprints', 's002' ), "member.php?mod=logging&action=login" );
}
//��ȡ����������Ϣ
$select_fid=$_G['cache']['plugin'] ["bullmarket_myfootprints"]["select_forumd"];
//��Ѱ治������δ����
if(empty($select_fid))
{
	showmessage ( lang ( 'plugin/bullmarket_myfootprints', 's003' ));
}

//�Զ�����־���������б������ѯ(������)����ѯ��һ������Ч����
$querylist = DB::fetch_all ( "select log.tid,log.day,log.time,subject,views,replies,author,authorid from " . DB::table ( "bullmarket_myfootprints_viewlog" ). " log left join ".DB::table( "forum_thread" )." thread on log.tid=thread.tid where uid=" . $_G ['uid'] . " and  DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= day order by day DESC,time ASC" );
//������ת��Ϊ��������ʱ��������Ķ�ά����
$lastday = null;
$isfirst=true;
foreach ( $querylist as $query ) {
	if(empty($query['subject']))
	{
		//���subjectΪ�� ֤���������ѱ�ɾ�������ڽ�ӡ�е�����ͬ��ɾ��
		DB::delete("bullmarket_myfootprints_viewlog", array('tid'=>$query['tid']));
		continue;
	}
	//���Ϊ����������ͬһ���¼dayֵ��ͬ
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