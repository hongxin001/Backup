<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta http-equiv="Cache-control" content="<?php if($_G['setting']['mobile']['mobilecachetime'] > 0) { ?><?php echo $_G['setting']['mobile']['mobilecachetime'];?><?php } else { ?>no-cache<?php } ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no" />
<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo dhtmlspecialchars($metakeywords); } ?>" />
<meta name="description" content="<?php if(!empty($metadescription)) { echo dhtmlspecialchars($metadescription); ?> <?php } ?>,<?php echo $_G['setting']['bbname'];?>" />
<title><?php if(!empty($navtitle)) { ?><?php echo $navtitle;?> - <?php } if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?> 手机版 - Powered by Discuz!</title>
<link rel="stylesheet" href="./template/strong_mobile/style.css" type="text/css" media="all">
<script src="./template/strong_mobile/js/jquery-1.9.1.min.js" type="text/javascript"></script>

<script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>';</script>

<script src="<?php echo STATICURL;?>js/mobile/common.js?<?php echo VERHASH;?>" type="text/javascript" charset="<?php echo CHARSET;?>"></script>
</head>

<body class="bg" id="wrap">
<?php if(!empty($_G['setting']['pluginhooks']['global_header_mobile'])) echo $_G['setting']['pluginhooks']['global_header_mobile'];?><?php $language = 'language.'.currentlang().'.php';
    include ("./template/strong_mobile/".$language);?><div class="sb-slidebar" >

        	<ul class="s-cbl-ul">
            	<li><a href="forum.php" ><img src="./template/strong_mobile/images/s_shouye.png" /><?php echo $lang['home'];; ?></a></li>
<li><a href="forum.php?forumlist=1" ><img src="./template/strong_mobile/images/s_luntan.png" /><?php echo $lang['forum'];; ?></a></li>
                <li><a href="portal.php?mod=list&amp;catid=1" ><img src="./template/strong_mobile/images/s_wz.png" /><?php echo $lang['arc'];; ?></a></li>
                <li><a href="group.php" ><img src="./template/strong_mobile/images/s_group.png" /><?php echo $lang['group'];; ?></a></li>
                <li><a href="misc.php?mod=tag" ><img src="./template/strong_mobile/images/s_tab.png" /><?php echo $lang['biaoqian'];; ?></a></li>
                <li><a href="forum.php?mod=forumdisplay&amp;fid=64&amp;mobile=2" ><img src="./template/strong_mobile/images/s_tupian.png" /><?php echo $lang['pic'];; ?></a></li>
                <li><a href="forum.php?mod=guide&amp;view=hot" ><img src="./template/strong_mobile/images/s_retie.png" /><?php echo $lang['guide'];; ?></a></li>
                <li><a href="group.php?mod=my" ><img src="./template/strong_mobile/images/s_group.png" /><?php echo $lang['mygroup'];; ?></a></li>
                <li><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=favorite&amp;view=me&amp;type=thread" ><img src="./template/strong_mobile/images/s_shoucang.png" /><?php echo $lang['favorite'];; ?></a></li>
                <li><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=thread&amp;view=me" ><img src="./template/strong_mobile/images/s_zhuti.png" /><?php echo $lang['wodezhuti'];; ?></a></li>
                <li><a href="home.php?mod=space&amp;do=pm" ><img src="./template/strong_mobile/images/s_xiaoxi.png" /><?php echo $lang['mypm'];; ?></a></li>
                <li><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" ><img src="./template/strong_mobile/images/s_ziliao.png" /><?php echo $lang['profile'];; ?></a></li>
                <li><a href="<?php echo $_G['setting']['mobile']['nomobileurl'];?>" ><img src="./template/strong_mobile/images/s_diannao.png" />电脑版</a></li>
            </ul>

</div>


<div  class="s-daohang s-center " >
        <div class="s-width-50 s-float-left" onclick="do_left();"><a href="javascript:;" class="sb-toggle-left s-width-50 "><img src="./template/strong_mobile/images/s_cbl.png" /></a></div>
        <?php if($_GET['mod'] == 'viewthread') { ?>
        <div class="s-width-50 s-float-right"><a href="javascript:;" class="s-width-50 " id="gengduoid"><img src="./template/strong_mobile/images/s_gengduo.png" /></a></div>
        <?php } else { ?>
         <div class="s-width-50 s-float-right"><a href="search.php?mod=forum" class="s-width-50 "><img src="./template/strong_mobile/images/s_soso.png" /></a></div>
    	<?php } ?>
        <div class="s-center s-daohang-title "><a href="javascript:;" ><?php echo $_G['setting']['bbname'];?></a></div>

</div>
<div id="sb-site" class="sb_site bg" name="sb-site" class="bg">


