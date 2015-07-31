
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
	//本函数用于记录用户浏览记录
	function viewthread_updatelog() {
		
		//初始化参数
		global $_G;
		$select_fid = $_G ['cache'] ['plugin'] ["bullmarket_myfootprints"] ["select_forumd"];
		//免费版不允许板块未设置,只支持一个版块
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
		//为了降低按天数分组时执行sql多损耗的时间,这里将day与time同时录入数据库(如果只存time而不存day,将会使得查询需要浪费更多的时间，大量损耗性能)。
		$day = date ( "Y-m-d", time () );
		$time = date ( "Y-m-d H:i:s", time () );
		$logarray = array ("uid" => $uid, "tid" => $tid, "day" => $day );
		if ($this->_dateisexist ( $logarray )) {
			$logarray ["time"] = $time;
			DB::insert ( "bullmarket_myfootprints_viewlog", $logarray );
		}
	}
	//自定义函数，判定当天是否已经有日志(如果用原生mysql_query本函数可直接通过数据库中设置联合主键完成，但是因为Discuz的DB中在主键重复时不是静默处理，而是类似于java抛出异常，因此需要这个检测联合主键是否存在的函数)
	function _dateisexist($logarray) {
		$count = DB::result_first ( "select count(*) from " . DB::table ( "bullmarket_myfootprints_viewlog" ) . " where uid=%d and tid=%d and day=%s", array ($logarray ['uid'], $logarray ['tid'], $logarray ['day'] ) );
		return $count == '0' ? true : false;
	}
}