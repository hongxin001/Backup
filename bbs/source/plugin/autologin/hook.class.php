<?php
/*
 * 主页：http://addon.discuz.com/?@ailab
 * 人工智能实验室：Discuz!应用中心十大优秀开发者！
 * 插件定制 联系QQ594941227
 * From www.ailab.cn
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_autologin {
	public $nav=0;
	public $name='';
	
	function  __construct() {
		global $_G;
	    loadcache('plugin');
		$this->vars = $_G['cache']['plugin']['autologin'];
		$this->nav=$this->vars['nav'];
		$this->name=$this->vars['name'];
	}

	function global_cpnav_extra1() {
		loadcache('plugin');
		global $_G;
		if($this->nav==2) return '<a href="home.php?mod=spacecp&ac=plugin&id=autologin:admincp">'.$this->name.'</a>';
	}

	function global_nav_extra(){
		loadcache('plugin');
		global $_G;
		if($this->nav==3) return '<ul><li><a href="home.php?mod=spacecp&ac=plugin&id=autologin:admincp">'.$this->name.'</a></ul></li>';	
	}
	
	function global_footerlink(){
		loadcache('plugin');
		global $_G;
		if($this->nav==4) return '<span class="pipe">|</span><a href="home.php?mod=spacecp&ac=plugin&id=autologin:admincp">'.$this->name.'</a>';	
	}
	
	function global_usernav_extra2(){
		loadcache('plugin');
		global $_G;
		if($this->nav==5) return '<span class="pipe">|</span><a href="home.php?mod=spacecp&ac=plugin&id=autologin:admincp">'.$this->name.'</a>';		
	}
	
	function pluginCache($cacheName,$varName,$data,$isarray){
		@require_once libfile('function/cache');
		if($isarray){
			$cacheArray .= "\$$varName=".arrayeval($data).";\n";
			writetocache($cacheName, $cacheArray);
		}else{
			$cacheArray .= "\$$varName=".$data.";\n";
			writetocache($cacheName, $cacheArray);
		}
	}	
}

?>