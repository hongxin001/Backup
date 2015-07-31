<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('invite');?>
<?php $_G['home_tpl_titles'] = array('邀请好友');?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z"><a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em> 好友邀请<?php if($userapp) { ?>，并一起玩 <?php echo $userapp['appname'];?><?php } ?></div>
</div>
<div id="ct" class="ct2 wp cl">
<div class="mn">
<div class="bm bml">
<h1 class="bm_h mt">欢迎您，<a href="home.php?mod=space&amp;uid=<?php echo $uid;?>" target="_blank"><?php echo $space['username'];?></a> 热情邀请您为好友<?php if($userapp) { ?>一起玩 <?php echo $userapp['appname'];?><?php } ?>.</h1>
<div class="bm_c">
<?php if($userapp) { ?><img src="http://appicon.manyou.com/logos/<?php echo $userapp['appid'];?>" alt="<?php echo $userapp['appname'];?>" class="y mbm" /><?php } ?>
<p>成为好友后，你们就可以一起讨论话题，及时关注对方的更新，还可以玩有趣的游戏 <?php echo $userapp['appname'];?> ……</p>
						<p>您也可以方便快捷地发布自己的日志、上传图片、记录生活点滴与好友分享</p>
						<p>还等什么呢？赶快加入我们吧</p>
</div>
<hr class="da mtm mbm" />
<div class="bm_c">
<table cellpadding="0" cellspacing="0" class="tfm">
<tr>
<td valign="top" width="140">
<div class="avt avtm"><a href="home.php?mod=space&amp;uid=<?php echo $uid;?>"><?php echo avatar($space[uid],middle);?></a></div>
</td>
<td>
<h4 class="xs2"><a href="home.php?mod=space&amp;<?php echo $url_plus;?>"><?php echo $space['username'];?></a></h4>
<?php if(!empty($space['resideprovince'])&&!empty($space['residecity'])) { ?><p>来自 <?php echo $space['resideprovince'];?> <?php echo $space['residecity'];?></p><?php } ?>
<p>已有 <?php echo $space['friends'];?> 个好友, <?php echo $space['albums'];?> 个相册, <?php echo $space['doings'];?> 条记录, <?php echo $space['blogs'];?> 篇日志, <?php echo $space['threads'];?> 个话题</p>
<?php if($space['recentnote']) { ?><div class="quote"><blockquote><?php echo $space['recentnote'];?></blockquote></div><?php } ?>
<p class="mtw cl">
<?php if($_G['uid']) { ?>
<a href="home.php?mod=invite&amp;accept=yes" class="pn pnc z"><strong class="z">接受邀请</strong></a>
<a href="home.php?mod=invite&amp;accept=no" class="pn z"><strong class="z">忽略邀请</strong></a>
<?php } else { if($_G['setting']['regstatus']) { ?>
<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>&amp;referer=<?php echo $jumpurl;?>" class="pn z"><strong class="z">我要注册</strong></a>
<?php } ?>
<a href="member.php?mod=logging&amp;action=login&amp;referer=<?php echo $jumpurl;?>" onclick="showWindow('login', this.href)" class="pn z"><strong class="z">马上登录</strong></a>
<?php } ?>
</p>
</td>
</tr>
</table>
</div>
</div>
</div>
<div class="sd">
<div class="bm">
<h3 class="bm_h"><?php echo $space['username'];?>的好友</h3>
<div class="bm_c">
<ul class="ml mls cl"><?php if(is_array($flist)) foreach($flist as $key => $value) { ?><li>
<div class="avt"><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>"><?php echo avatar($value[uid],small);?></a></div>
<p><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>" title="<?php echo $value['username'];?>"><?php echo $value['username'];?></a></p>
</li>
<?php } ?>
</ul>
</div>
</div>
</div>
</div><?php include template('common/footer'); ?>