<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>

<?php if(!empty($_G['setting']['pluginhooks']['global_footer_mobile'])) echo $_G['setting']['pluginhooks']['global_footer_mobile'];?>

<div id="mask" style="display:none;"></div>
<?php if(!$nofooter) { ?>
<div class="footer" ">
<div>
<?php if(!$_G['uid'] && !$_G['connectguest']) { ?>
<a href="forum.php">首页</a> | <a href="member.php?mod=logging&amp;action=login" title="登录">登录</a> | <a href="<?php if($_G['setting']['regstatus']) { ?>member.php?mod=<?php echo $_G['setting']['regname'];?><?php } else { ?>javascript:;" style="color:#D7D7D7;<?php } ?>" title="<?php echo $_G['setting']['reglinkname'];?>">注册</a>
<?php } else { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile&amp;mycenter=1"><?php echo $_G['member']['username'];?></a> , <a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>" title="退出" class="dialog">退出</a>
<?php } ?>


</div>
    <div>
<a href="<?php echo $_G['setting']['mobile']['simpletypeurl']['0'];?>">标准版</a> |
<a href="javascript:;" style="color:#D7D7D7;">触屏版</a> |
<a href="<?php echo $_G['setting']['mobile']['nomobileurl'];?>">电脑版</a>

    </div>
<p>&copy; Comsenz Inc.</p>
</div>
<?php } ?>
</div>
<script>
function do_leftn(){ $("#wrap").toggleClass("wrap_l")};
function do_left(){
if($(".wrap_l").length>0){
$(".sb_site,.s-daohang").animate({left:"0%"},500);
setTimeout(function(){
$("#wrap").toggleClass("wrap_l");
},500);

}else{
$("#wrap").toggleClass("wrap_l");
$(".s-daohang,.sb_site").animate({left:"70%"},500);
}
};
var mon= document.documentElement.clientHeight;var high = document.getElementById("sba-site");high.style.minHeight=mon+"px";
</script>


</body>
</html><?php updatesession();?><?php if(defined('IN_MOBILE')) { output();?><?php } else { output_preview();?><?php } ?>
