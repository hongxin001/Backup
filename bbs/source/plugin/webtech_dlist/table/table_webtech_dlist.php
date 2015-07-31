<?php
/* webteah.no-ip.org @ ALL RIGHTS RESERVED
   This is licensed under Creative Common CC 3.0 Non-Commerial-no-derivative
*/
!defined('IN_DISCUZ') && exit('ACCESS DENIED');
class table_webtech_dlist extends discuz_table {
    public function __construct() {
		$this->_table = 'plugin_webtech_dlist';
		$this->_pk    = 'id';
		parent::__construct();
	}
	
	public function range_by_aid($aid , $start = 0 , $limit = 0 , $sort = '') {
		return DB::fetch_all("SELECT d.uid , u.username FROM ".DB::table($this->_table)." d
		LEFT JOIN ".DB::table('common_member')." u ON d.uid = u.uid
		WHERE %i ".($sort ? "ORDER BY d.dateline $sort " : "").DB::limit($start , $limit) , array(DB::field('aid' , $aid)));
	}
	
	public function fetch_by_aid($aid) {
		return DB::fetch_first("SELECT * FROM ".DB::table($this->_table)." WHERE aid = %d" , array($aid));
	}
	
	public function fetch_by_uid_aid($uid , $aid) {
		return DB::fetch_first("SELECT * FROM ".DB::table($this->_table)." WHERE aid = %d AND uid = %d" , array($aid , $uid));
	}
	
	public function update_by_aid($aid , $data) {
		return DB::update($this->_table , $data , array('aid' => $aid));
	}
}
?>