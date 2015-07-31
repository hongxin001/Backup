<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * From www.1314study.com
 */
 
if(!defined('IN_DISCUZ')) {
	exit('2014110302ZJfJAbSJZ7');
}
class plugin_freeaddon_attach_auto_description {
}
class plugin_freeaddon_attach_auto_description_forum extends plugin_freeaddon_attach_auto_description{
		function post_attachautodescription(){
			 	global $_G;
				$return = '';
				$splugin_setting = $_G['cache']['plugin']['freeaddon_attach_auto_description'];
				$splugin_lang = lang('plugin/freeaddon_attach_auto_description');
				if($_GET['attachnew'] && is_array($_GET['attachnew'])){
						$study_fids = unserialize($splugin_setting['study_fids']);
						if(!$this->_list_array($study_fids) || in_array($_G['fid'], $study_fids)){
								$study_gids = unserialize($splugin_setting['study_gids']);
								if(!$this->_list_array($study_gids) || in_array($_G['groupid'], $study_gids)){
										$description = str_replace(array('{subject}'), array($_GET['subject']), $splugin_setting['description']);
										foreach ($_GET['attachnew'] as $key => $value){
												$_GET['attachnew'][$key]['description'] = $value['description'] ? $value['description'] : $description;
										}
								}
						}
				}
		}
		
		function _list_array($fids_show) {
		    $result = '';
		    if(is_array($fids_show)) {
		        $i = '1314';
		        foreach ($fids_show as $id => $fid) {
		            if(!empty($fid) && $fid) {
		                if($i == '1314') {
		                    $result .= $fid;
		                    $i = 'DIY';
		                }else {
		                    $result .= ',' . $fid;
		                }
		            }
		        }
		    }
		    return $result;
		}
}
?>