<?php

if (! defined ( 'IN_DISCUZ' )) {
	exit ( 'Access Denied' );
}
class plugin_ljtieziyj {
	function global_footer(){
		global $_G;
		$config = $_G ['cache'] ['plugin'] ['ljtieziyj'];
		$yj.='<script src="plugin.php?id=ljtieziyj"></script>';
		$yj.='<script src="plugin.php?id=ljtieziyj&mod=reply_yj"></script>';
		return $yj;
	}
}
class plugin_ljtieziyj_forum extends plugin_ljtieziyj {
		function post_checkreply_message($param) {
			global $_G;
			$config = $_G['cache']['plugin']['ljtieziyj'];
			$bankuaifid = unserialize ($config['bankuai']);
			$isnot=$config['isnot'];
			$isuid=$config['isuid'];
			if($isnot){
				if ($param ['param'] [0] == "post_reply_succeed") {
					//某某贴子有新的回复
					$fid=$param ['param'] [2][fid];
					if(in_array ( $fid, $bankuaifid)){
						if($_GET['ht']=='1'){
							$tid=$param ['param'] [2][tid];
							$pid=$param ['param'] [2][pid];
							$thread=C::t("forum_thread")->fetch($tid);
							$maxposition=$thread['maxposition'];
							if($maxposition<=$config['lou']&&$thread['authorid']!=$_G['uid']){
								DB::insert('alj_mail_reply',array(
									'tid'=>$tid,
									'pid'=>$pid,	
									'fid'=>$fid,	
								));
							}
						}
					}
				}
				if ($param ['param'] [0] == "post_newthread_succeed") {
					//某某版块有新的主题
					$fid=$param ['param'] [2][fid];
					$tid=$param ['param'] [2][tid];
					if(in_array ( $fid, $bankuaifid)){
						if($_GET['ft']=='1'){
							DB::insert('alj_mail',array(
								'tid'=>$tid,
								'fid'=>$fid,
							));
						}
					}
				}
			}
		}
		function post_btn_extra() {
			global $_G;
			$config = $_G['cache']['plugin']['ljtieziyj'];
			$ft=$config['ft'];
			$ts=$config['ts'];
			if($ts){
				$checked="checked ='checked'";
			}
			include template('ljtieziyj:tieziyj');
			return $return;
		}
		function viewthread_fastpost_btn_extra() {
			global $_G;
			$config = $_G['cache']['plugin']['ljtieziyj'];
			$ht=$config['ht'];
			$htts=$config['htts'];
			if($htts){
				$checked="checked ='checked'";
			}
			if($_GET['tid']){
				$thread=C::t("forum_thread")->fetch($_GET['tid']);
			}
			if($thread['authorid']!=$_G['uid']){
				include template('ljtieziyj:htts');
			}
			return $return;
		}
}
		


	

?>