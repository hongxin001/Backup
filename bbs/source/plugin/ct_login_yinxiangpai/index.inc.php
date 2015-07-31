<?php

	if(!defined('IN_DISCUZ')) {
	   exit('Access Deined');
	}
	global $_G;
	$uid = $_G['uid'];
	$config = $_G['cache']['plugin']['ct_login_yinxiangpai'];
	$reg_isfloat = $config['reg_isfloat'] ? true : false;
	$isopen = $config['isopen'] ? $config['isopen'] : 0 ;
	if( ! $isopen )showmessage(lang('plugin/ct_login_yinxiangpai','isopen_no'));
	
	$target_url = trim($config['target_url']) ? trim($config['target_url']) : '' ;
	if( ! $target_url )showmessage(lang('plugin/ct_login_yinxiangpai','target_url'));

	$new_target_url = $_G['siteurl'].$target_url;
	if($uid)header('Location: '.$new_target_url);	
	
	$logo =  $config['logo'] ? $config['logo'] : 'source/plugin/ct_login_yinxiangpai/template/images/logo.png' ;
	$qq_url = $config['qq_url'] ? $config['qq_url'] : '' ;
	$xinlang_url = $config['xinlang_url'] ? $config['xinlang_url'] : '' ;
	$taobao_url = $config['taobao_url'] ? $config['taobao_url'] : '' ;
	$san_url = $config['san_url'] ? $config['san_url'] : '' ;
	
	$bg_color = $config['bg_color'] ? '<style>body{ background:'.$config['bg_color'].';}</style>' : '<style>body{ background:#D94A4A;}</style>' ;

	$name_empty = lang('plugin/ct_login_yinxiangpai','name_empty');
	$pass_empty = lang('plugin/ct_login_yinxiangpai','pass_empty');
	
	include template('ct_login_yinxiangpai:index');
?>