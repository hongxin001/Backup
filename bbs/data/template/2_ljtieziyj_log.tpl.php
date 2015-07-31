<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<table class="tb tb2 nobdb">
<tbody><tr><th class="partition" colspan="15">注：tid代表发帖邮件提醒，pid代码回帖邮件提醒(<a href="admin.php?action=plugins&amp;operation=config&amp;do=<?php echo $do;?>&amp;identifier=ljtieziyj&amp;pmod=log&amp;act=del&amp;formhash=<?php echo FORMHASH;?>">清空数据</a>)</th></tr>
<tr class="header"><th></th><th>tid</th><th>pid</th><th>邮件地址</th><th>发送时间</th><th>状态</th></tr><?php if(is_array($log)) foreach($log as $key => $value) { ?><tr class="header"><th></th><th><?php echo $value['tid'];?></th><th><?php echo $value['pid'];?></th><th><?php echo $value['sendemail'];?></th><th><?php echo date('Y-m-d H:i:s',$value['sendtime']);?></th><th><?php if($value['success']) { ?>成功<?php } else { ?><font color="red">失败</font><?php } ?></th></tr>
<?php } ?>
<tr><td></td><td colspan="15"><?php echo $paging;?></td></tr>
</tbody></table>