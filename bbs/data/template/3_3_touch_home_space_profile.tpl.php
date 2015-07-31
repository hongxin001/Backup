<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_profile');?>
<?php if($_GET['mycenter'] && !$_G['uid']) { dheader('Location:member.php?mod=logging&action=login');exit;?><?php } include template('common/header'); if(!$_GET['mycenter']) { ?>

<!-- header start -->
<header class="header">
    <div class="nav">
<a href="javascript:;" onclick="history.go(-1);" class="z"><img src="./template/strong_mobile/images/icon_back.png" /></a>
<span><?php if($_G['uid'] == $space['uid']) { ?>我的资料<?php } else { ?><?php echo $space['username'];?>的资料<?php } ?></span>
    </div>
</header>
<!-- header end -->
<!-- userinfo start -->
<div class="userinfo">
<div class="user_avatar">
<div class="avatar_m"><span><img src="<?php echo avatar($space[uid], small, true);?>" /></span></div>
<h2 class="name"><?php echo $space['username'];?></h2>
</div>
<div class="user_box">
<ul>
<li><span><?php echo $space['credits'];?></span>积分</li><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $key => $value) { if($value['title']) { ?>
<li><span><?php echo $space["extcredits$key"];?> <?php echo $value['unit'];?></span><?php echo $value['title'];?></li>
<?php } } ?>
</ul>
</div>
<?php if($space['uid'] == $_G['uid']) { ?>
<div class="btn_exit"><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出登录</a></div>
<?php } ?>
</div>
<!-- userinfo end -->

<?php } else { ?>


<!-- userinfo start -->
<div class="userinfo">
<div class="user_avatar">
<div class="avatar_m"><span><img src="<?php echo avatar($_G[uid], small, true);?>" /></span></div>
<h2 class="name"><?php echo $_G['username'];?></h2>
</div>
<div class="myinfo_list cl">
<ul>
<li><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=favorite&amp;view=me&amp;type=thread">我的收藏</a></li>
<li><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=thread&amp;view=me">我的主题</a></li>
<li class="tit_msg"><a href="home.php?mod=space&amp;do=pm">我的消息<?php if($_G['member']['newpm']) { ?><img src="<?php echo STATICURL;?>image/mobile/images/icon_msg.png" /><?php } ?></a></li>
<li><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>">我的资料</a></li>
</ul>
</div>
</div>
<!-- userinfo end -->

<?php } $nofooter = true;?><?php include template('common/footer'); ?>