<?php
/**
 *	[[火鸟]回复框显示logo标志(rsf_logo_fill.{modulename})] (C)2014-2099 Powered by 火鸟rsflyer.
 *	Version: 1.0
 *	Date: 2014-6-18 19:55
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
loadcache('plugin');
class plugin_rsf_logo_fill {
	
	function plugin_rsf_logo_fill(){
		global $_G;
		$pluginArr = $_G['cache']['plugin']['rsf_logo_fill'];
		
		$this->open = $pluginArr['rsf_lgf_open'];
		$this->bg_color = $pluginArr['rsf_lgf_bg_color'];
		$this->font_size = $pluginArr['rsf_lgf_font_size'];
		$this->font_color = $pluginArr['rsf_lgf_font_color'];
		$this->font_type = $pluginArr['rsf_lgf_font'];
		$this->bg_img = $pluginArr['rsf_lgf_bg_img'];
		$this->bg_height = $pluginArr['rsf_lgf_bg_height'];
		$this->bg_position = $pluginArr['rsf_lgf_bg_position'];
		$this->bg_position_x = $pluginArr['rsf_lgf_bg_position_x'];
		$this->bg_position_y = $pluginArr['rsf_lgf_bg_position_y'];
		$this->bg_opacity = $pluginArr['rsf_lgf_bg_opacity'];
	}
	
	function global_footer(){
		global $_G;
		
		include template("rsf_logo_fill:tpl");	
		return $return;
	}

}

?>