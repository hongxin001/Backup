<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class plugin_nimba_newuser{
	function common(){
	    loadcache('plugin');
		global $_G;	
		//var_dump($_G['setting']['need_avatar']);
		//var_dump($_G['setting']['need_email']);
		$f = $_G['cache']['plugin']['nimba_newuser']['fgs'];
		$fid=$_G['cache']['plugin']['nimba_newuser']['baodao'];
		$group=unserialize($_G['cache']['plugin']['nimba_newuser']['group']);
		if($f&&in_array($_G['groupid'],$group)){
			if($_G['uid']&&$fid){
				$isbaodao=$this->isbaodao($_G['uid'],$fid);//0δ����
			}
			if($isbaodao==0){//����֮�������ϴ�ͷ���������֤
				$_G['setting']['need_avatar']='';
				$_G['setting']['need_email']='';
			}
		}
		//var_dump($_G['setting']['need_avatar']);
		//var_dump($_G['setting']['need_email']);		
	}
    function global_header(){
	    loadcache('plugin');
		global $_G;
		$var = $_G['cache']['plugin']['nimba_newuser'];
		$open=$var['open'];
		$fid=$var['baodao'];
		$group=unserialize($var['group']);
		if($open==1&&$fid&&$_G['uid']&&in_array($_G['groupid'],$group)){//������δѡ��
			$fgs=$this->fgs();
			if($fgs==0&&$_G['fid']!=$fid&&$this->isbaodao($_G['uid'],$fid)==0){ 
				$refresh=$var['refresh'];
				$sortid=$var['sortid'];
				$style=$var['style'];
				if($style==1){
					if($sortid) $action='forum.php?mod=forumdisplay&fid='.$fid.'&filter=sortid&sortid='.$sortid;
					else $action='forum.php?mod=forumdisplay&fid='.$fid;
				}elseif($style==2){
					//$sortid �����������ý��롰����ҳ��ʱ�˲�����Ч
					if($sortid) $action='forum.php?mod=post&action=newthread&fid='.$fid.'&sortid='.$sortid;
					else $action='forum.php?mod=post&action=newthread&fid='.$fid;
				}			
				$return="<meta http-equiv=\"refresh\" content=\"$refresh;url=$action\">\n".'<script type="text/javascript">showWindow(\'nimba_newuser\', \'plugin.php?id=nimba_newuser:ajax&'.FORMHASH.'\');</script>';
			}else return '';
			return $return;
		}
	}
	
	function isbaodao($uid,$fid){
	    $querys = DB::query("SELECT tid FROM ".DB::table('forum_thread')." where authorid=$uid and fid=$fid");
		$tid=DB::fetch($querys);
		if(empty($tid)) return 0;
		else return 1;
	}
	
	function fgs(){//����ϵͳ����ˮ������������
	    global $_G;
		$ckuser = $_G['member'];
	    if($_G['setting']['need_avatar'] && !$ckuser['avatarstatus']) $avatar=1;
		else $avatar=0;
		if($_G['setting']['need_email'] && !$ckuser['emailstatus']) $email=1;
		else $email=0;
		$return=$avatar+$email;
		return $return;
	}
 }

class plugin_nimba_newuser_forum extends plugin_nimba_newuser{ 
} 
?>