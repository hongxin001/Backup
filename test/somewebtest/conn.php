<?php
	$con = mysql_connect('localhost', 'root', 'IDDAPcYb');
	if(!$con){
		die('���ݿ�����ʧ��');
	}
	if(!mysql_select_db('match', $con)){
		die('���ݿ�ѡ��ʧ��');
	}