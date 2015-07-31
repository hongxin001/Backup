<?php
/* webteah.no-ip.org @ ALL RIGHTS RESERVED
   This is licensed under Creative Common CC 3.0 Non-Commerial-no-deviative
*/
!defined('IN_DISCUZ') && exit('ACCESS DENIED');

class plugin_webtech_dlist {}

class plugin_webtech_dlist_forum extends plugin_webtech_dlist {
	
	public function viewthread_postbottom_output() {
		global $postlist;
		$return = array();
	    foreach($postlist as $topkey => $post) {
	        if(isset($post['attachments'])) {
				$return[$topkey] = '';
                foreach($post['attachments'] as $key => $attach) {
					$return[$topkey] .= "<div id=\"aid{$attach['aid']}_dlist\" style=\"display:none;\"></div>";
				}
			}
		}
		return array_values($return);
	}
	
	public function viewthread_output() {
		global $postlist;
		$lang = lang('plugin/webtech_dlist' , 'dlist');
	    foreach($postlist as $topkey => $post) {
	        if(isset($post['attachments'])) {
                foreach($post['attachments'] as $key => $attach) {
					$aid = packaids($attach);
					if($attach['isimage']) {
						$postlist[$topkey]['message'] = preg_replace('/(\<div.*id="aid'.$attach['aid'].'_menu".*>)/' , '\\1 <p>[<a onclick="ajaxget(\'plugin.php?id=webtech_dlist:ajax&aid='.$aid.'\' , \'aid'.$attach['aid'].'_dlist\');display(\'aid'.$attach['aid'].'_dlist\');" href="javascript:void(0);">'.$lang.'</a>]</p>' , $post['message']);
					} else {
						$postlist[$topkey]['attachments'][$key]['description'] .= '<p>[<a onclick="ajaxget(\'plugin.php?id=webtech_dlist:ajax&aid='.$aid.'\' , \'aid'.$attach['aid'].'_dlist\');display(\'aid'.$attach['aid'].'_dlist\');" href="javascript:void(0);">'.$lang.'</a>]</p>';
					}
                }
		    }
	    }
	}

    public function attachment() { // WRITE DOWNLOAD DATA
	    if(!isset($_GET['aid']) || !$_GET['aid']) return;
        list($aid, $k, $t, $uid) = explode('|', base64_decode($_GET['aid']));
        $aid = abs(intval($aid));
		if(!$aid || !$uid) return;
		$uid = abs(intval($uid));
		if($record = C::t('#webtech_dlist#webtech_dlist')->fetch_by_uid_aid($uid , $aid)) {
			C::t('#webtech_dlist#webtech_dlist')->update($record['id'] , array('dateline' => time()));
		} else {
			global $_G;
			$attach = C::t('forum_attachment_n')->fetch('aid:'.$aid , $aid);
			C::t('#webtech_dlist#webtech_dlist')->insert(array(
				'aid' => $aid,
				'tid' => $attach['tid'],
				'uid' => $_G['uid'],
				'dateline' => $_G['timestamp']
			));
		}
    }
}

?>