<?php
	if(!defined('IN_DISCUZ')) {
	exit('Access Deined');
}
class mobileplugin_ljtieziyj {
	function global_header_mobile() {
		global $_G;
		$config = $_G ['cache'] ['plugin'] ['ljtieziyj'];
		
		if(!$config['isnot']){
			return;
		}
		$yj.='<script src="plugin.php?id=ljtieziyj"></script>';
		$yj.='<script src="plugin.php?id=ljtieziyj&mod=reply_yj"></script>';
		return $yj;
		
	}
}
class mobileplugin_ljtieziyj_forum extends mobileplugin_ljtieziyj {
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
					if($config['is_ht']){
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
					if($config['is_ft']){
						
						DB::insert('alj_mail',array(
							'tid'=>$tid,
							'fid'=>$fid,
						));
					}
				}
			}
		}
	}
}
?>