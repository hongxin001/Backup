<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
/*
 * �����޸ı�ҳ�κ����ݣ��������Ը���
 * ���� ���������� �˹�����ʵ���� ��Ʒ��Made By Nimba, Team From AiLab.cn)
 */
$info=array();
$info['name']='nimba_newuser';
$info['version']='v2.7.3';
require_once DISCUZ_ROOT.'./source/discuz_version.php';
$info['siteversion']=DISCUZ_VERSION;
$info['siterelease']=DISCUZ_RELEASE;
$info['timestamp']=TIMESTAMP;
$info['nowurl']=$_G['siteurl'];
$info['siteurl']='http://bbs.hustascii.com/';
$info['clienturl']='http://bbs.hustascii.com/';
$info['siteid']='AE05B35F-383B-2134-EF36-BD50D1FAF9F5';
$info['sn']='2014103005rvq06iri25';
$info['adminemail']=$_G['setting']['adminemail'];
$infobase=base64_encode(serialize($info));
?>