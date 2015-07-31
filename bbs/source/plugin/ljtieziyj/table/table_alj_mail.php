<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_common_member.php 31536 2013-06-12 23:32:03Z liangjian $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_alj_mail extends discuz_table
{
	public function __construct() {

		$this->_table = 'alj_mail';
		$this->_pk    = 'id';

		parent::__construct();
	}
	function fetch_by_first(){
		return DB::fetch_first("select * from ".DB::table($this->_table)." limit 0,1");
	}
	function fetch_all_by_forum_moderator($fid){
		return DB::fetch_all("select uid from %t where  fid = %d",array('forum_moderator',$fid));
	}
	function fetch_all_by_common_member($yhz){
		return DB::fetch_all("select email from %t where  uid in ($yhz)",array('common_member'));
	}
	function fetch_all_by_common_member_groupid($yhz){
		return DB::fetch_all("select email from %t where  groupid in ($yhz)",array('common_member'));
	}
	function fetch_by_forum_forum_left_forum_forumfield($fid){
		return DB::fetch_first("select name,moderators  from %t a left join %t b on a.fid=b.fid where a.fid=%d",array('forum_forum','forum_forumfield',$fid));
	}
	function fetch_by_post_message($tid){
		return DB::result_first("select message from %t where  first=1 and tid=%d",array('forum_post',$tid));
	}
}


?>