<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_cat_danmaku {
	function _show($text){
		global $_G;
		$set = $_G["cache"]["plugin"]["cat_danmaku"];
		$winWidth = $set["width"];
		$winHeight = $set["height"];
		preg_match('/acfun/is', $text,$is_ac);
		preg_match('/(\d){1,}/', $text,$av);
		if($is_ac[0]!=""){
			$return = '<embed id="" width="'.$winWidth.'" height="'.$winHeight.'" wmode="transparent" type="application/x-shockwave-flash" src="https://ssl.acfun.tv/player/ACFlashPlayerOut.swf?type=page&url=ac'.$av[0].'" quality="high" allowfullscreen="true" flashvars="playMovie=true&auto=1&autostart=true" pluginspage="http://get.adobe.com/cn/flashplayer/" style="visibility:visible;" allowscriptaccess="never">';
			//$return = '<embed width="'.$winWidth.'" height="'.$winHeight.'" wmode="transparent" type="application/x-shockwave-flash" src="http://www.acfun.tv/player/ac'.$av[0].'" quality="high" allowfullscreen="true" flashvars="playMovie=true&amp;auto=1" pluginspage="http://get.adobe.com/cn/flashplayer/" style="visibility: visible;" allowscriptaccess="never" id="STK_138969832868335" >';
		}else{
			$return = '<embed width="'.$winWidth.'" height="'.$winHeight.'" wmode="transparent" type="application/x-shockwave-flash" src="http://static.hdslb.com/miniloader.swf?aid='.$av[0].'&page=1" quality="high" allowfullscreen="true" flashvars="playMovie=true&auto=1" pluginspage="http://get.adobe.com/cn/flashplayer/" style="visibility: visible;" allowscriptaccess="never" id="STK_139085385504256">';
		}
		return $return;
	}
	function discuzcode($param) {
		global $_G;
		$set = $_G["cache"]["plugin"]["cat_danmaku"];
		$dzcode = $set["dzcode"];
		if (strpos($_G['discuzcodemessage'], '[/'.$dzcode.']') === false) {
			return false;
		}
		if($param['caller'] == 'discuzcode') {
			$_G['discuzcodemessage'] = preg_replace('/\s?\['.$dzcode.'\][\n\r]*(.+?)[\n\r]*\[\/'.$dzcode.'\]\s?/ies', '$this->_show(\'\\1\')', $_G['discuzcodemessage']);
		} else {
			$_G['discuzcodemessage'] = preg_replace('/\['.$dzcode.'\]|\[\/'.$dzcode.'\]/ies', '', $_G['discuzcodemessage']);
		}
	}
	function post_editorctrl_left() {
		global $_G;
		$set = $_G["cache"]["plugin"]["cat_danmaku"];
		$btnName = $set["btnname"];
		$btnMoveName = $set["btnmovename"];
		$cat_group=unserialize($_G['cache']['plugin']['cat_danmaku']['cat_group']);
		$cat_fid=unserialize($_G['cache']['plugin']['cat_danmaku']['cat_fid']);
		if(in_array($_G['groupid'],$cat_group) && in_array($_G['fid'], $cat_fid)){
			$adeditor = "<link type=\"text/css\" href=\"source/plugin/cat_danmaku/images/cat_danmaku.css\" rel=\"stylesheet\" /><a href='plugin.php?id=cat_danmaku' id='cat_danmaku_btn' onclick='showWindow(this.id, this.href, \"get\", 0);' title='".$btnMoveName."'>".$btnName."</a>";
			return $adeditor;
		}
	}
	public function get_insert(){
		global $_G;
		$set = $_G["cache"]["plugin"]["cat_danmaku"];
		$fastName = $set["fastname"];
		$btnName = $set["btnname"];
		$btnMoveName = $set["btnmovename"];
		$cat_group=unserialize($_G['cache']['plugin']['cat_danmaku']['cat_group']);
		$cat_fid=unserialize($_G['cache']['plugin']['cat_danmaku']['cat_fid']);
		if(in_array($_G['groupid'],$cat_group) && in_array($_G['fid'], $cat_fid)){
			$adeditor = "<link type=\"text/css\" href=\"source/plugin/cat_danmaku/images/cat_danmaku.css\" rel=\"stylesheet\" /><a href='plugin.php?id=cat_danmaku&fast=1' id=\"cat_danmaku\" onclick='showWindow(this.id, this.href, \"get\", 0)' title='".$btnMoveName."'>".$fastName."</a>&nbsp;&nbsp;";
			return $adeditor;
		}
	}
	function viewthread_fastpost_func_extra(){
		return $this->get_insert();
	}
	function forumdisplay_fastpost_func_extra(){
		return $this->get_insert();
	}
}

class plugin_cat_danmaku_forum extends plugin_cat_danmaku {
	
}
?>