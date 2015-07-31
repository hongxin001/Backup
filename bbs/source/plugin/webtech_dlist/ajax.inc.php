<?php
/* webteah.no-ip.org @ ALL RIGHTS RESERVED
   This is licensed under Creative Common CC 3.0 Non-Commerial-no-deviative
*/
!defined('IN_DISCUZ') && exit('ACCESS DENIED');
(!$_G['inajax'] && !isset($_GET['aid']) || !$_GET['aid']) && showmessage('undefined_action');
list($aid , $k , $t , $uid) = explode('|' , base64_decode($_GET['aid']));
$aid = abs(intval($aid));
if(!$aid) showmessage('undefined_action');
$attach = C::t('forum_attachment_n')->fetch('aid:'.$aid , $aid);
if($attach === FALSE || !$attach) showmessage('undefined_action');
$attach['dlist'] = C::t('#webtech_dlist#webtech_dlist')->range_by_aid($aid);
include template('webtech_dlist:dlist_attachments');
?>