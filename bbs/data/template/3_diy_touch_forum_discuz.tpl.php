<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('discuz');?>
<?php if($_G['setting']['mobile']['mobilehotthread'] && $_GET['forumlist'] != 1) { include template('common/header'); include template('forum/guide_index'); include template('common/footer'); exit;?><?php } include template('common/header'); ?><?php if(!empty($_G['setting']['pluginhooks']['index_top_mobile'])) echo $_G['setting']['pluginhooks']['index_top_mobile'];?>
<!-- main forumlist start -->
<div class="wp wm " id="wp"><?php if(is_array($catlist)) foreach($catlist as $key => $cat) { ?><div class=" bmw fl">
<div class="subforumshow bm_h cl" href="#sub_forum_<?php echo $cat['fid'];?>">
<span class="o"><img src="./template/strong_mobile/images/collapsed_<?php if(!$_G['setting']['mobile']['mobileforumview']) { ?>yes<?php } else { ?>no<?php } ?>.png"></span>
<h2><a href="javascript:;"><?php echo $cat['name'];?></a></h2>
</div>
<div id="sub_forum_<?php echo $cat['fid'];?>" class="sub_foruml bm_c">
<ul><?php if(is_array($cat['forums'])) foreach($cat['forums'] as $forumid) { $forum=$forumlist[$forumid];?><li>
<div class="subipc"><?php if($forum['icon']) { ?>
<?php echo $forum['icon'];?>
<?php } else { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>&amp;mobile=2">
<img src="./template/strong_mobile/images/tb.png" alt="<?php echo $forum['name'];?>" /></a>
<?php } ?>
</div>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>" >
<div class="subblock">
<h3><?php echo $forum['name'];?><?php if($forum['todayposts'] > 0) { ?><span class="num"><?php echo $forum['todayposts'];?></span><?php } ?></h3>
<p><?php echo $forum['description'];?></p>

</div>

</a></li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>
</div>
<!-- main forumlist end -->
<?php if(!empty($_G['setting']['pluginhooks']['index_middle_mobile'])) echo $_G['setting']['pluginhooks']['index_middle_mobile'];?>
<script type="text/javascript">
(function() {
<?php if(!$_G['setting']['mobile']['mobileforumview']) { ?>
$('.sub_forum').css('display', 'block');
<?php } else { ?>
$('.sub_forum').css('display', 'none');
<?php } ?>
$('.subforumshow').on('click', function() {
var obj = $(this);
var subobj = $(obj.attr('href'));
if(subobj.css('display') == 'none') {
subobj.css('display', 'block');
obj.find('img').attr('src', './template/strong_mobile/images/collapsed_yes.png');
} else {
subobj.css('display', 'none');
obj.find('img').attr('src', './template/strong_mobile/images/collapsed_no.png');
}
});
 })();
</script><?php include template('common/footer'); ?>