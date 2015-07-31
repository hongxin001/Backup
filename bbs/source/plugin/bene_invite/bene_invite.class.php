<?php
/**
 * ============================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * @package    bene_invite
 * @date	   2014-09-02
 * @author	   Andy.Zhou
 * @copyright  Copyright (c) 2014 YouBene Inc. (http://www.youbene.com)
 */
 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
	
class plugin_bene_invite {
	
	protected static $isopen = FALSE;
	
	public function plugin_bene_invite() {
		global $_G;
		self::$isopen = $_G['cache']['plugin']['bene_invite']['isopen'] ? TRUE : FALSE;
	}
	
}

class plugin_bene_invite_forum extends plugin_bene_invite {

	function post_bene_invite_message($params) {
		global $_G;
		
		if(!self::$isopen) return false;
		
		list($message, $forwordURL, $threadValue) = $params['param'];
		
		$_setting = $_G['cache']['plugin']['bene_invite'];

		if(!empty($_POST['username'])) {
			$_POST['users'][] = $_POST['username'];
		}
		$users = empty($_POST['users']) ? array() : $_POST['users'];

		$coef = 1;
		if(!empty($users)) {
			$coef = count($users);
		}

		include_once libfile('function/friend');
		$return = 0;
		if($users) {
			$newusers = $uidsarr = $membersarr = array();
			if($users) {
				$membersarr = C::t('common_member')->fetch_all_by_username($users);
				foreach($membersarr as $aUsername=>$aUser) {
					$uidsarr[] = $aUser['uid'];
				}
			}
			if(empty($membersarr)) {
				showmessage('message_bad_touser', '', array(), array('return' => true));
			}
			if(isset($membersarr[$_G['uid']])) {
				showmessage('message_can_not_send_to_self', '', array(), array('return' => true));
			}

			friend_check($uidsarr);

			foreach($membersarr as $key => $value) {
				$thread = C::t('forum_thread')->fetch($threadValue['tid']);
				notification_add($value['uid'], 'friend', lang('plugin/bene_invite', 'm1') . ' '.$_G['username'].lang('plugin/bene_invite', 'm2').$thread['subject'].lang('plugin/bene_invite', 'm3').'<span class="a"><a href="forum.php?mod=viewthread&tid='.$threadValue['tid'].'">'.lang('plugin/bene_invite', 'm4').'</a></span>');
			}
		}		
		return true;
	}
	
	public function post_middle_output() {
		global $_G;
		
		if(!self::$isopen) return '';		
		
		if(!$_GET['special'] && $_GET['action']=='newthread') {
			include template('bene_invite:post_dd_forum');
		}
		
		return $return;
	}
	
}
