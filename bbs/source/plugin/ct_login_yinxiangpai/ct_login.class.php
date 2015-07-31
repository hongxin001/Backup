<?php
	if(!defined('IN_DISCUZ')) {
		   exit('Access Deined');
		}
		
	class plugin_ct_login_yinxiangpai {
		function global_header() 
		{
			global $_G;
			if(!$_G[uid])
			{
				loadcache('plugin'); 
				$config =  $_G['cache']['plugin']['ct_login_yinxiangpai'];
				$login_url = $config['login_url'] ? unserialize($config['login_url']) : '';
				$isopen = $config['isopen'] ? $config['isopen'] : 0 ;
				
				if(empty($login_url))showmessage(lang('plugin/ct_login_yinxiangpai','login_url'));
				
				$login_arr = explode('[ct]', str_replace(array("\n", "\t"), array('', ''), $config['m_url']));
				//$m_url = array_diff($login_arr,array(''));
				if($login_arr){
					foreach($login_arr as $k=>$v){
						if(empty($v))continue;
						$m_url[$k]=strtolower(trim($v));
					}
				}
		
				$http = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
				$get_url = $http.strtolower($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			
				$current_page = CURSCRIPT . '_' . CURMODULE;
				if((in_array($current_page,$login_url) || in_array( $get_url,$m_url) )&& !$_G[uid] && $isopen )
				{
					$target_url = $_G['siteurl'].'plugin.php?id=ct_login_yinxiangpai:index';
					header('Location: '.$target_url);		
				}
			}
		}
	}


?>