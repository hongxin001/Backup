<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('./template/cmszs_360bbs/common/header.htm', './template/cmszs_360bbs/common/header_common.htm', 1415016081, '2', './data/template/2_2_common_header_member_logging.tpl.php', './template/cmszs_360bbs', 'common/header_member_logging')
|| checktplrefresh('./template/cmszs_360bbs/common/header.htm', './template/cmszs_360bbs/common/pubsearchform.htm', 1415016081, '2', './data/template/2_2_common_header_member_logging.tpl.php', './template/cmszs_360bbs', 'common/header_member_logging')
;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>" />
<?php if($_G['config']['output']['iecompatible']) { ?><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE<?php echo $_G['config']['output']['iecompatible'];?>" /><?php } ?>
<title><?php if(!empty($navtitle)) { ?><?php echo $navtitle;?> - <?php } if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?> Powered by Discuz!</title>
<?php echo $_G['setting']['seohead'];?>

<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo dhtmlspecialchars($metakeywords); } ?>" />
<meta name="description" content="<?php if(!empty($metadescription)) { echo dhtmlspecialchars($metadescription); ?> <?php } if(empty($nobbname)) { ?>,<?php echo $_G['setting']['bbname'];?><?php } ?>" />
<meta name="generator" content="Discuz! <?php echo $_G['setting']['version'];?>" />
<meta name="author" content="cmszs" />
<meta name="copyright" content="2001-2013 CmsZs Inc." />
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<base href="<?php echo $_G['siteurl'];?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_2_common.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?>    <script src="template/cmszs_360bbs/common/jquery1.42.min.js" type="text/javascript" type="text/javascript"></script>
    <script src="template/cmszs_360bbs/common/jquery.cookie.js" type="text/javascript" type="text/javascript"></script>
<script src="template/cmszs_360bbs/common/jquery.SuperSlide.2.1.1.js" type="text/javascript" type="text/javascript"></script>
<script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>', DYNAMICURL = '<?php echo $_G['dynamicurl'];?>';</script>
<script src="<?php echo $_G['setting']['jspath'];?>common.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php if(empty($_GET['diy'])) { $_GET['diy'] = '';?><?php } if(!isset($topic)) { $topic = array();?><?php } require $_G['cache']['style_default']['directory'].'/lang/'.CHARSET.'.php';?><meta name="application-name" content="<?php echo $_G['setting']['bbname'];?>" />
<meta name="msapplication-tooltip" content="<?php echo $_G['setting']['bbname'];?>" />
<?php if($_G['setting']['portalstatus']) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['1']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['portal']) ? 'http://'.$_G['setting']['domain']['app']['portal'] : $_G['siteurl'].'portal.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/portal.ico" /><?php } ?>
<meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['2']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['forum']) ? 'http://'.$_G['setting']['domain']['app']['forum'] : $_G['siteurl'].'forum.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/bbs.ico" />
<?php if($_G['setting']['groupstatus']) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['3']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['group']) ? 'http://'.$_G['setting']['domain']['app']['group'] : $_G['siteurl'].'group.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/group.ico" /><?php } if(helper_access::check_module('feed')) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['4']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['home']) ? 'http://'.$_G['setting']['domain']['app']['home'] : $_G['siteurl'].'home.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/home.ico" /><?php } if($_G['basescript'] == 'forum' && $_G['setting']['archiver']) { ?>
<link rel="archives" title="<?php echo $_G['setting']['bbname'];?>" href="<?php echo $_G['siteurl'];?>archiver/" />
<?php } if(!empty($rsshead)) { ?><?php echo $rsshead;?><?php } if(widthauto()) { ?>
<link rel="stylesheet" id="css_widthauto" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_widthauto.css?<?php echo VERHASH;?>" />
<script type="text/javascript">HTMLNODE.className += ' widthauto'</script>
<?php } if($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>forum.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } elseif($_G['basescript'] == 'home' || $_G['basescript'] == 'userapp') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>home.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } elseif($_G['basescript'] == 'portal') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($_G['basescript'] != 'portal' && $_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>
<link rel="stylesheet" type="text/css" id="diy_common" href="data/cache/style_<?php echo STYLEID;?>_css_diy.css?<?php echo VERHASH;?>" />
<?php } ?>
</head>

<body id="nv_<?php echo $_G['basescript'];?>" class="pg_<?php echo CURMODULE;?><?php if($_G['basescript'] === 'portal' && CURMODULE === 'list' && !empty($cat)) { ?> <?php echo $cat['bodycss'];?><?php } ?>" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<?php if($_GET['diy'] == 'yes' && check_diy_perm($topic)) { include template('common/header_diy'); } if(check_diy_perm($topic)) { include template('common/header_diynav'); } if(CURMODULE == 'topic' && $topic && empty($topic['useheader']) && check_diy_perm($topic)) { ?>
<?php echo $diynav;?>
<?php } if(empty($topic) || $topic['useheader']) { if($_G['setting']['mobile']['allowmobile'] && (!$_G['setting']['cacheindexlife'] && !$_G['setting']['cachethreadon'] || $_G['uid']) && ($_GET['diy'] != 'yes' || !$_GET['inajax']) && ($_G['mobile'] != '' && $_G['cookie']['mobile'] == '' && $_GET['mobile'] != 'no')) { ?>
<div class="xi1 bm bm_c">
    请选择 <a href="<?php echo $_G['siteurl'];?>forum.php?mobile=yes">进入手机版</a> <span class="xg1">|</span> <a href="<?php echo $_G['setting']['mobile']['nomobileurl'];?>">继续访问电脑版</a>
</div>
<?php } if($_G['setting']['shortcut'] && $_G['member']['credits'] >= $_G['setting']['shortcut']) { ?>
<div id="shortcut">
<span><a href="javascript:;" id="shortcutcloseid" title="关闭">关闭</a></span>
您经常访问 <?php echo $_G['setting']['bbname'];?>，试试添加到桌面，访问更方便！
<a href="javascript:;" id="shortcuttip">添加 <?php echo $_G['setting']['bbname'];?> 到桌面</a>

</div>
<script type="text/javascript">setTimeout(setShortcut, 2000);</script>
<?php } ?><?php echo adshow("headerbanner/wp a_h");?><div id="nv">
                    <div class="header">
                    
                        <?php $mnid = getcurrentnav();?>                        <h2><?php if(!isset($_G['setting']['navlogos'][$mnid])) { ?><a href="<?php if($_G['setting']['domain']['app']['default']) { ?>http://<?php echo $_G['setting']['domain']['app']['default'];?>/<?php } else { ?>./<?php } ?>" title="<?php echo $_G['setting']['bbname'];?>"><?php echo $_G['style']['boardlogo'];?></a><?php } else { ?><?php echo $_G['setting']['navlogos'][$mnid];?><?php } ?></h2>
                        <ul>
                            <?php $mnid = getcurrentnav();?>                            <?php if(is_array($_G['setting']['navs'])) foreach($_G['setting']['navs'] as $nav) { ?>                                <?php if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?><li <?php if($mnid == $nav['navid']) { ?>class="a" <?php } ?><?php echo $nav['nav'];?>></li><?php } ?>
                            <?php } ?>
                        </ul>
                        <?php if(!empty($_G['setting']['pluginhooks']['global_nav_extra'])) echo $_G['setting']['pluginhooks']['global_nav_extra'];?>
                        <?php if($_G['uid']) { ?>
                        <div id="logined">
                        <a class="eyecare" onClick="backcolor();cmszsStyle();cmszsStylehb();" href="javascript:void(0)"></a>
                        <a class="ec-open" style="display:none;" onClick="defaultCL();cmszsStyleb();cmszsStyleh();" href="javascript:void(0)"></a>
                        </div>
                        <div id="qmenuuu">
                        <div class="avtav self-info" onMouseOver="showMenu({'ctrlid':'qmenuuu','pos':'34!','ctrlclass':'qmenuuu_hover','duration':2});">
                        <a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>"><?php echo avatar($_G[uid]);?></a>
                        <a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" target="_blank" title="访问我的空间" class="username" id="username-top"><?php echo $_G['member']['username'];?></a>
                        
                     
                        </div>
                        <?php if($_G['member']['newprompt']||$_G['member']['newpm']) { ?>
                        <a class="message-hd newmessage-hd" href="home.php?mod=space&amp;do=notice" target="_blank"></a>
                        <?php } ?>
                        </div>
                        
                        <?php } else { ?>
                        <div class="login_box">
                        <a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" target="_blank" class="re_qmenu" ><?php echo $cmszs_lang['4'];?></a>
                        <span class="fg_line">|</span>
                        <a href="member.php?mod=logging&amp;action=login&amp;referer=" id="lg_qmenu" onClick="showWindow('login', this.href);return false;">登录</a>
                        <div class="user-info">
                        <div class="login-img"></div>
                        </div>
                        <a class="eyecare" onClick="backcolor();cmszsStyle();cmszsStylehb();" href="javascript:void(0)"></a>
                        <a class="ec-open" style="display:none;" onClick="defaultCL();cmszsStyleb();cmszsStyleh();" href="javascript:void(0)"></a>
                        </div>
                        <?php } ?>
                        <script type="text/javascript">
 var options = {path: '/', expires: 10}; //����·��������ʱ��Ϊ10��
 var cookie_backColor = jQuery.cookie("backColor"); //���屳����ɫֵ
 var cookie_cmszsStyle = jQuery.cookie("cmszsStyle");
 var cookie_cmszsStyleb = jQuery.cookie("cmszsStyleb");
 var cookie_cmszsStyleh = jQuery.cookie("cmszsStyleh");
 var cookie_cmszsStylehb = jQuery.cookie("cmszsStylehb");
 jQuery(function(){
 if(cookie_backColor){
 jQuery('body').css('background', cookie_backColor);
 }
 if(cookie_cmszsStyle){
 jQuery('.eyecare').css('display', cookie_cmszsStyle);
 }
 if(cookie_cmszsStyleb){
 jQuery('.eyecare').css('display', cookie_cmszsStyleb);
 }
 if(cookie_cmszsStyleh){
 jQuery('.ec-open').css('display', cookie_cmszsStyleh);
 }
 if(cookie_cmszsStylehb){
 jQuery('.ec-open').css('display', cookie_cmszsStylehb);
 }
 });
//������ɫ����
 function backcolor(){
 jQuery("body").css('background','#c5e0c8'); //�ı䱳����ɫ
 jQuery.cookie("backColor", "#c5e0c8", options); //�ѱ�����ɫֵ����"backColor"���cookie��
 
 }
 function cmszsStyle(){
 jQuery(".eyecare").css('display','none'); 
 jQuery.cookie("cmszsStyle", "none", options); 
 }
 function cmszsStyleb(){
 jQuery(".eyecare").css('display','block'); 
 jQuery.cookie("cmszsStyleb", null, options);
 jQuery.cookie("cmszsStyle", null, options);
 }
 function cmszsStyleh(){
 jQuery(".ec-open").css('display','none'); 
 jQuery.cookie("cmszsStyleb", null, options);  
 jQuery.cookie("cmszsStylehb", null, options);
 }
 function cmszsStylehb(){
 jQuery(".ec-open").css('display','block'); 
 jQuery.cookie("cmszsStylehb", "block", options); 
 }
//�ָ�Ĭ�Ϸ���
 function defaultCL(){
 jQuery("body").css('background',''); //��ձ�����ɫ
 jQuery.cookie("backColor", null, options); //�ѱ�����ɫ��ֵ����"backColor"���cookie��
 }
 </script>
                    	<div id="search_btn" class="">
                        <a class="search-a" href="javascript:;" id="search_form" onMouseOver="showMenu({'ctrlid':'search_btn','pos':'34!','ctrlclass':'search_hover','fade':'1','duration':2})">&nbsp;</a>
                        
                        </div>
                        
                    </div>
</div><?php if($_G['setting']['search']) { $slist = array();?><?php if($_G['fid'] && $_G['forum']['status'] != 3 && $mod != 'group') { ?><?php
$slist[forumfid] = <<<EOF
<li><a href="javascript:;" rel="curforum" fid="{$_G['fid']}" >本版</a></li>
EOF;
?><?php } if($_G['setting']['portalstatus'] && $_G['setting']['search']['portal']['status'] && ($_G['group']['allowsearch'] & 1 || $_G['adminid'] == 1)) { ?><?php
$slist[portal] = <<<EOF
<li><a href="javascript:;" rel="article">文章</a></li>
EOF;
?><?php } if($_G['setting']['search']['forum']['status'] && ($_G['group']['allowsearch'] & 2 || $_G['adminid'] == 1)) { ?><?php
$slist[forum] = <<<EOF
<li><a href="javascript:;" rel="forum" class="curtype">帖子</a></li>
EOF;
?><?php } if(helper_access::check_module('blog') && $_G['setting']['search']['blog']['status'] && ($_G['group']['allowsearch'] & 4 || $_G['adminid'] == 1)) { ?><?php
$slist[blog] = <<<EOF
<li><a href="javascript:;" rel="blog">日志</a></li>
EOF;
?><?php } if(helper_access::check_module('album') && $_G['setting']['search']['album']['status'] && ($_G['group']['allowsearch'] & 8 || $_G['adminid'] == 1)) { ?><?php
$slist[album] = <<<EOF
<li><a href="javascript:;" rel="album">相册</a></li>
EOF;
?><?php } if($_G['setting']['groupstatus'] && $_G['setting']['search']['group']['status'] && ($_G['group']['allowsearch'] & 16 || $_G['adminid'] == 1)) { ?><?php
$slist[group] = <<<EOF
<li><a href="javascript:;" rel="group">{$_G['setting']['navs']['3']['navname']}</a></li>
EOF;
?><?php } ?><?php
$slist[user] = <<<EOF
<li><a href="javascript:;" rel="user">用户</a></li>
EOF;
?>
<?php } if($_G['setting']['search'] && $slist) { ?>
<div id="search_btn_menu" style="display:none;">
<form id="scbar_form" method="<?php if($_G['fid'] && !empty($searchparams['url'])) { ?>get<?php } else { ?>post<?php } ?>" autocomplete="off" onsubmit="searchFocus($('scbar_txt'))" action="<?php if($_G['fid'] && !empty($searchparams['url'])) { ?><?php echo $searchparams['url'];?><?php } else { ?>search.php?searchsubmit=yes<?php } ?>" target="_blank">
<input type="hidden" name="mod" id="scbar_mod" value="search" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="srchtype" value="title" />
<input type="hidden" name="srhfid" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="srhlocality" value="<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>" />
<?php if(!empty($searchparams['params'])) { if(is_array($searchparams['params'])) foreach($searchparams['params'] as $key => $value) { $srchotquery .= '&' . $key . '=' . rawurlencode($value);?><input type="hidden" name="<?php echo $key;?>" value="<?php echo $value;?>" />
<?php } ?>
<input type="hidden" name="source" value="discuz" />
<input type="hidden" name="fId" id="srchFId" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="q" id="cloudsearchquery" value="" />

<?php } ?>
<input type="text" name="srchtxt" id="scbar_txt" autocomplete="off" class="xg1" placeholder=" 请输入搜索内容"/>
        
<input type="submit" name="searchsubmit" class="search-btn" value=" " autocomplete="off">
</form>
</div>

<?php } ?>        <?php if($_G['uid']) { ?>
        <div id="qmenuuu_menu" style="display:none;">
            <div class="user-info-nav">
                <div class="username-line">
                 <span>用户名:</span>
                 <a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" target="_blank" title="访问我的空间" ><?php echo $_G['member']['username'];?></a>
                </div>
                <div class="first-line"><div class="first-line-item"><span>积分: </span><a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1" id="extcreditmenu" target="_blank"><em style="color:#ffc000"><?php echo $_G['member']['credits'];?></em></a>
                </div>
                <div class="first-line-item"><span>用户组: </span><a href="home.php?mod=spacecp&amp;ac=usergroup" id="g_upmine" class="xi2"  target="_blank"><?php echo $_G['group']['grouptitle'];?></a></div>
                </div>
                <ul class="navlist cl" id="navlist">
                      <li><a href="home.php?mod=space&amp;do=pm" id="pm_ntc" data-text="消息">消息<span></span></a></li>
                      <li><a href="home.php?mod=space&amp;do=notice" id="myprompt">提醒<span><?php if($_G['member']['newprompt']||$_G['member']['newpm']) { ?>(<?php $a = DB::result_first("SELECT newpm FROM ".DB::table('common_member')." WHERE `uid` =$_G[uid]");
                                $b = DB::result_first("SELECT newprompt FROM ".DB::table('common_member')." WHERE `uid` =$_G[uid]");
                                echo $a+$b;?>)<?php } ?></span></a></li>
                      <li>
                      <a href="home.php?mod=space&amp;do=thread&amp;view=me&amp;from=space" class="mythread"><?php echo $cmszs_lang['8'];?></a>
                      </li>
                      <li><a href="home.php?mod=space&amp;do=friend" style="background-image:url(<?php echo $_G['style']['styleimgdir'];?>/haoyou.png) !important">好友</a></li>
                      <li><a href="home.php?mod=space&amp;do=favorite&amp;view=me" style="background-image:url(<?php echo $_G['style']['styleimgdir'];?>/choucang.png) !important">收藏</a></li>
                      <li><a href="home.php?mod=medal" style="background-image:url(<?php echo $_G['style']['styleimgdir'];?>/xunzhang.png) !important">勋章</a></li>
                      <?php if($_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)) { ?>
<li><a href="admin.php" target="_blank"  style="background-image:url(<?php echo $_G['style']['styleimgdir'];?>/admin_setting.png) !important">管理中心</a></li>
<?php } if(($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))) { ?>
<li><a href="portal.php?mod=portalcp" style="background-image:url(<?php echo $_G['style']['styleimgdir'];?>/portal.png) !important"><?php if($_G['setting']['portalstatus'] ) { ?>门户管理<?php } else { ?>模块管理<?php } ?></a></li>
<?php } ?>
                      <li><a href="home.php?mod=spacecp" style="background-image:url(<?php echo $_G['style']['styleimgdir'];?>/shezhi.png) !important">设置</a></li>
                      <?php if(check_diy_perm($topic)) { ?>
  					  <li><a href="javascript:openDiy();" title="打开 DIY 面板" class="cmszs_diy"><?php echo $cmszs_lang['0'];?></a></li>
  					  <?php } ?>
                      <li><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>" class="logout" id="aUserLogout">退出</a></li>          
                      <?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra3'])) echo $_G['setting']['pluginhooks']['global_usernav_extra3'];?>
                </ul>
            
            </div>
        </div>
        
        <?php } ?><?php echo adshow("headerbanner/wp a_h");?><div id="hd">
<div class="wp">



<?php if(!empty($_G['setting']['plugins']['jsmenu'])) { ?>
<ul class="p_pop h_pop" id="plugin_menu" style="display: none"><?php if(is_array($_G['setting']['plugins']['jsmenu'])) foreach($_G['setting']['plugins']['jsmenu'] as $module) { ?> <?php if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?>
 <li><?php echo $module['url'];?></li>
 <?php } } ?>
</ul>
<?php } ?>
<?php echo $_G['setting']['menunavs'];?>
<div id="mu" class="cl">
<?php if($_G['setting']['subnavs']) { if(is_array($_G['setting']['subnavs'])) foreach($_G['setting']['subnavs'] as $navid => $subnav) { if($_G['setting']['navsubhover'] || $mnid == $navid) { ?>
<ul class="cl <?php if($mnid == $navid) { ?>current<?php } ?>" id="snav_<?php echo $navid;?>" style="display:<?php if($mnid != $navid) { ?>none<?php } ?>">
<?php echo $subnav;?>
</ul>
<?php } } } ?>
</div><?php echo adshow("subnavbanner/a_mu");?></div>
</div>

<?php if(!empty($_G['setting']['pluginhooks']['global_header'])) echo $_G['setting']['pluginhooks']['global_header'];?>
<?php } ?>

<div id="wp" class="wp">
