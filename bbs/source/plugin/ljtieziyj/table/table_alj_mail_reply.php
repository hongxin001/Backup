<?php
/**
 *      [Liangjian] (C)2001-2099 Liangjian Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_plugin_lj_exam.php liangjian $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class table_alj_mail_reply extends discuz_table
{
	public function __construct() {

		$this->_table = 'alj_mail_reply';
		$this->_pk    = 'id';

		parent::__construct();
	}
	function fetch_by_first(){
		return DB::fetch_first("select * from ".DB::table($this->_table)." limit 0,1");
	}
	function fetch_forum_post_by_author($pid){
		return DB::result_first("select author from %t where pid=%d",array('forum_post',$pid));
	}
	function fetch_all_by_forum_thread(){
		return DB::fetch_all("select * from %t  order by dateline desc limit 0,5",array('forum_thread'));
	}
}




?>