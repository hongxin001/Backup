
<?
if (! defined ( 'IN_DISCUZ' )) {
	exit ( 'Access Denied' );
}
class plugin_bullmarket_myfootprints {
	function global_cpnav_extra2() {
		return '<a href="plugin.php?id=bullmarket_myfootprints" style="color:#F00;">' . lang ( 'plugin/bullmarket_myfootprints', 's001' ) . '</a>';
	}

}
class plugin_bullmarket_myfootprints_forum {
	//���������ڼ�¼�û������¼
	function viewthread_updatelog() {
		
		//��ʼ������
		global $_G;
		$select_fid = $_G ['cache'] ['plugin'] ["bullmarket_myfootprints"] ["select_forumd"];
		//��Ѱ治������δ����,ֻ֧��һ�����
		if ($select_fid!=$_G['fid']) {
			return;
		}
		$uid = $_G ['uid'];
		if (! $uid) {
			return;
		}
		$tid = intval ( $_GET ['tid'] );
		if ($tid <= 0) {
			return;
		}
		//Ϊ�˽��Ͱ���������ʱִ��sql����ĵ�ʱ��,���ｫday��timeͬʱ¼�����ݿ�(���ֻ��time������day,����ʹ�ò�ѯ��Ҫ�˷Ѹ����ʱ�䣬�����������)��
		$day = date ( "Y-m-d", time () );
		$time = date ( "Y-m-d H:i:s", time () );
		$logarray = array ("uid" => $uid, "tid" => $tid, "day" => $day );
		if ($this->_dateisexist ( $logarray )) {
			$logarray ["time"] = $time;
			DB::insert ( "bullmarket_myfootprints_viewlog", $logarray );
		}
	}
	//�Զ��庯�����ж������Ƿ��Ѿ�����־(�����ԭ��mysql_query��������ֱ��ͨ�����ݿ�����������������ɣ�������ΪDiscuz��DB���������ظ�ʱ���Ǿ�Ĭ��������������java�׳��쳣�������Ҫ���������������Ƿ���ڵĺ���)
	function _dateisexist($logarray) {
		$count = DB::result_first ( "select count(*) from " . DB::table ( "bullmarket_myfootprints_viewlog" ) . " where uid=%d and tid=%d and day=%s", array ($logarray ['uid'], $logarray ['tid'], $logarray ['day'] ) );
		return $count == '0' ? true : false;
	}
}