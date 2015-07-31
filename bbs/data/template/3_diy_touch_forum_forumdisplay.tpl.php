<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('forumdisplay');
0
|| checktplrefresh('./template/strong_mobile/touch/forum/forumdisplay.htm', './template/strong_mobile/touch/forum/search_sortoption.htm', 1415196031, 'diy', './data/template/3_diy_touch_forum_forumdisplay.tpl.php', './template/strong_mobile', 'touch/forum/forumdisplay')
;?>
<?php if($_POST['picajax']=='nopic') { if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if(!$_G['setting']['mobile']['mobiledisplayorder3'] && $thread['displayorder'] > 0) { continue;?><?php } ?>
                	<?php if($thread['displayorder'] > 0 && !$displayorder_thread) { ?>
                <?php $displayorder_thread = 1;?>                    <?php } if($thread['moved']) { $thread[tid]=$thread[closed];?><?php } ?>
<li>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key];?>

                    <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;extra=<?php echo $extra;?>" <?php echo $thread['highlight'];?> >
<?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
<img src="./template/strong_mobile/images/icon_top.png">
<?php } elseif($thread['special'] == 4) { ?>
<img src="./template/strong_mobile/images/activitysmall.png"  />
<?php } elseif($thread['digest'] > 0) { ?>
<img src="./template/strong_mobile/images/icon_digest.png">
<?php } elseif($thread['attachment'] == 2 && $_G['setting']['mobile']['mobilesimpletype'] == 0) { ?>
<img src="./template/strong_mobile/images/icon_tu.png">
<?php } elseif($thread['special'] == 1) { ?>
<img src="./template/strong_mobile/images/pollsmall.png"  />
<?php } elseif($thread['special'] == 3) { ?>
<img src="./template/strong_mobile/images/rewardsmall.png"  />
<?php } elseif($thread['special'] == 2) { ?>
<img src="./template/strong_mobile/images/tradesmall.png"  />
<?php } ?>
<?php echo $thread['subject'];?>
<span class="by"><?php echo $thread['author'];?>&nbsp;&nbsp;<?php echo $thread['dateline'];?></span>
</a>
<span class="num"><?php echo $thread['replies'];?></span>

</li>
                <?php } exit();?><?php } if($_POST['picajax']=='pic') { if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if($_G['hiddenexists'] && $thread['hidden']) { continue;?><?php } if(!$thread['forumstick'] && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])) { if($thread['related_group'] == 0 && $thread['closed'] > 1) { $thread[tid]=$thread[closed];?><?php } } $waterfallwidth = $_G[setting][forumpicstyle][thumbwidth] + 24;?>    <div class="imgsitem">
        <div class="imgs">
            <?php if($thread['cover']) { ?>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;extra=<?php echo $extra;?>"><img src="<?php echo $thread['coverpath'];?>" alt="<?php echo $thread['subject'];?>" /></a>
<?php } else { ?>
<img src="./template/strong_mobile/images/nopic.jpg"  />
<?php } ?>
        </div>
        <span style="position:relative;z-index:99;"><?php echo $thread['subject'];?></span>
        <div class="imgsnail"></div>

    </div>

    <?php } exit();?><?php } include template('common/header'); if($_G['forum']['picstyle'] != 1) { ?>
<!-- header start -->

<div class="forumlistnve">
<a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>" title="发帖">发帖</a>
<a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=forum&amp;id=<?php echo $_G['fid'];?>&amp;handlekey=favoriteforum&amp;formhash=<?php echo FORMHASH;?>"><?php echo $lang['shouchang'];; ?></a>
<a href="#" id="fenleiid"><?php echo $lang['thtys'];; ?></a>
<?php if($subexists) { ?><a href="#" id="subnamelistid"><?php echo $lang['subfrm'];; ?></a><?php } ?>

</div>
<?php if($subexists) { ?>
<div id="subnamelist" class="subname_list" style="display:none;">
<ul><?php if(is_array($sublist)) foreach($sublist as $sub) { ?><li>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $sub['fid'];?>"><?php echo $sub['name'];?></a>
</li>
<?php } ?>
</ul>
</div>
<?php } ?>
<div id="fenlei" class="subname_list" style="display:none;">
<ul class="dropdown-menu">
    	<li <?php if($_GET['filter']== NULL ) { ?>class="active"<?php } ?>><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>"><?php echo $lang['mfriendall'];; ?></a></li>
<li <?php if($_GET['filter']== 'lastpost' ) { ?>class="active"<?php } ?>><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=lastpost&amp;orderby=lastpost"><?php echo $lang['zuixin'];; ?></a></li>
<li <?php if($_GET['filter']== 'heat' ) { ?>class="active"<?php } ?>><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=heat&amp;orderby=heats"><?php echo $lang['remen'];; ?></a></li>
<li <?php if($_GET['filter']== 'hot' ) { ?>class="active"<?php } ?>><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=hot"><?php echo $lang['retie'];; ?></a></li>
<li <?php if($_GET['filter']== 'digest' ) { ?>class="active"<?php } ?>><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=digest&amp;digest=1"><?php echo $lang['jinghua'];; ?></a></li>
    </ul>
</div>

<script>
    $(document).ready(function(){

    	$("#subnamelistid").click(function(){
   	 	   $("#subnamelist").fadeToggle("slow");
   	 	   $("#fenlei").hide();
   		});



    	$("#fenleiid").click(function(){
   	      $("#fenlei").fadeToggle("slow");
   	 	  $("#subnamelist").hide();

   		});

});
</script>


<!-- header end -->

<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_top_mobile'])) echo $_G['setting']['pluginhooks']['forumdisplay_top_mobile'];?>


<?php if(($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) || count($_G['forum']['threadsorts']['types']) > 0) { ?>
<div class="forumthreadtypes">
<ul id="thread_types" class="threads_types">
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_threadtype_inner'])) echo $_G['setting']['pluginhooks']['forumdisplay_threadtype_inner'];?>
<li id="ttp_all" <?php if(!$_GET['typeid'] && !$_GET['sortid']) { ?>class="xw1 a"<?php } ?>><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_G['forum']['threadsorts']['defaultshow']) { ?>&amp;filter=sortall&amp;sortall=1<?php } if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>">全部</a></li>
<?php if($_G['forum']['threadtypes']) { if(is_array($_G['forum']['threadtypes']['types'])) foreach($_G['forum']['threadtypes']['types'] as $id => $name) { if($_GET['typeid'] == $id) { ?>
<li class="xw1 a"><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_GET['sortid']) { ?>&amp;filter=sortid&amp;sortid=<?php echo $_GET['sortid'];?><?php } if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"><?php if($_G['forum']['threadtypes']['icons'][$id] && $_G['forum']['threadtypes']['prefix'] == 2) { ?><img class="vm" src="<?php echo $_G['forum']['threadtypes']['icons'][$id];?>" alt="" /> <?php } ?><?php echo $name;?><?php if($showthreadclasscount['typeid'][$id]) { ?><span class="xg1 num"><?php echo $showthreadclasscount['typeid'][$id];?></span><?php } ?></a></li>
<?php } else { ?>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $id;?><?php echo $forumdisplayadd['typeid'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"><?php if($_G['forum']['threadtypes']['icons'][$id] && $_G['forum']['threadtypes']['prefix'] == 2) { ?><img class="vm" src="<?php echo $_G['forum']['threadtypes']['icons'][$id];?>" alt="" /> <?php } ?><?php echo $name;?><?php if($showthreadclasscount['typeid'][$id]) { ?><span class="xg1 num"><?php echo $showthreadclasscount['typeid'][$id];?></span><?php } ?></a></li>
<?php } } } if($_G['forum']['threadsorts']) { if($_G['forum']['threadtypes']) { ?><li><span class="pipe">|</span></li><?php } if(is_array($_G['forum']['threadsorts']['types'])) foreach($_G['forum']['threadsorts']['types'] as $id => $name) { if($_GET['sortid'] == $id) { ?>
<li class="xw1 a"><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_GET['typeid']) { ?>&amp;filter=typeid&amp;typeid=<?php echo $_GET['typeid'];?><?php } if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"><?php echo $name;?><?php if($showthreadclasscount['sortid'][$id]) { ?><span class="xg1 num"><?php echo $showthreadclasscount['sortid'][$id];?></span><?php } ?></a></li>
<?php } else { ?>
<li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $id;?><?php echo $forumdisplayadd['sortid'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>"><?php echo $name;?><?php if($showthreadclasscount['sortid'][$id]) { ?><span class="xg1 num"><?php echo $showthreadclasscount['sortid'][$id];?></span><?php } ?></a></li>
<?php } } } ?>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_filter_extra'])) echo $_G['setting']['pluginhooks']['forumdisplay_filter_extra'];?>
</ul>

<script type="text/javascript">showTypes('thread_types');</script>
</div>
<?php } if($quicksearchlist && !$_GET['archiveid']) { ?><script type="text/javascript">
var forum_optionlist = <?php if($forum_optionlist) { ?>'<?php echo $forum_optionlist;?>'<?php } else { ?>''<?php } ?>;

</script>

<script src="<?php echo $_G['setting']['jspath'];?>threadsort.js?<?php echo VERHASH;?>" type="text/javascript"></script><?php if(is_array($quicksearchlist)) foreach($quicksearchlist as $optionid => $option) { $formsearch = '';?>        <?php if(getstatus($option['search'], 1)) { ?>
        <?php
$__VERHASH = VERHASH;$formsearch = <<<EOF

            <div >
                <span >{$option['title']}:</span>
                
EOF;
 if(in_array($option['type'], array('radio', 'checkbox', 'select', 'range'))) { 
$formsearch .= <<<EOF

                    <span id="select_{$option['identifier']}">
                    
EOF;
 if($option['type'] == 'select') { 
$formsearch .= <<<EOF

                        
EOF;
 if($_GET['searchoption'][$optionid]['value']) { 
$formsearch .= <<<EOF

                            <script type="text/javascript">
                                changeselectthreadsort('{$_GET['searchoption'][$optionid]['value']}', {$optionid}, 'search');
                            </script>
                        
EOF;
 } else { 
$formsearch .= <<<EOF

                            <select name="searchoption[{$optionid}][value]" id="{$option['identifier']}" onchange="changeselectthreadsort(this.value, '{$optionid}', 'search');" class="ps vm">
                                <option value="0">请选择</option>
                            
EOF;
 if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$formsearch .= <<<EOF
                                
EOF;
 if(!$value['foptionid']) { 
$formsearch .= <<<EOF

                                <option value="{$id}">{$value['content']} 
EOF;
 if($value['level'] != 1) { 
$formsearch .= <<<EOF
&raquo;
EOF;
 } 
$formsearch .= <<<EOF
</option>
                                
EOF;
 } 
$formsearch .= <<<EOF

                            
EOF;
 } 
$formsearch .= <<<EOF

                            </select>
<input type="hidden" name="searchoption[{$optionid}][type]" value="{$option['type']}">
                        
EOF;
 } 
$formsearch .= <<<EOF

                    
EOF;
 } elseif($option['type'] != 'checkbox') { 
$formsearch .= <<<EOF

                        <select name="searchoption[{$optionid}][value]" id="{$option['identifier']}" class="ps vm">
                            <option value="0">请选择</option>
                        
EOF;
 if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$formsearch .= <<<EOF
                            <option value="{$id}" 
EOF;
 if($_GET['searchoption'][$optionid]['value'] == $id) { 
$formsearch .= <<<EOF
selected="selected"
EOF;
 } 
$formsearch .= <<<EOF
>{$value}</option>
                        
EOF;
 } 
$formsearch .= <<<EOF

                        </select>
                        <input type="hidden" name="searchoption[{$optionid}][type]" value="{$option['type']}">
                    
EOF;
 } else { 
$formsearch .= <<<EOF

                        
EOF;
 if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$formsearch .= <<<EOF
                            <label><input type="checkbox" class="pc" name="searchoption[{$optionid}][value][{$id}]" value="{$id}" 
EOF;
 if(is_array($_GET['searchoption'][$optionid]) && $_GET['searchoption'][$optionid]['value'][$id]) { 
$formsearch .= <<<EOF
checked="checked"
EOF;
 } 
$formsearch .= <<<EOF
>{$value}</label>
                        
EOF;
 } 
$formsearch .= <<<EOF

                        <input type="hidden" name="searchoption[{$optionid}][type]" value="checkbox">
                    
EOF;
 } 
$formsearch .= <<<EOF

                    </span>
                
EOF;
 } else { 
$formsearch .= <<<EOF

                    
EOF;
 if($option['type'] == 'calendar') { 
$formsearch .= <<<EOF

                        <script src="{$_G['setting']['jspath']}calendar.js?{$__VERHASH}" type="text/javascript"></script>
                        <input type="text" name="searchoption[{$optionid}][value]" size="15" class="px s_inputtext" value="
EOF;
 if(is_array($_GET['searchoption'][$optionid])) { 
$formsearch .= <<<EOF
{$_GET['searchoption'][$optionid]['value']}
EOF;
 } 
$formsearch .= <<<EOF
" onclick="showcalendar(event, this, false)" />
                    
EOF;
 } else { 
$formsearch .= <<<EOF

                        <input type="text" name="searchoption[{$optionid}][value]" size="15" class="px s_inputtext" value="
EOF;
 if(is_array($_GET['searchoption'][$optionid])) { 
$formsearch .= <<<EOF
{$_GET['searchoption'][$optionid]['value']}
EOF;
 } 
$formsearch .= <<<EOF
" />
                    
EOF;
 } 
$formsearch .= <<<EOF

                
EOF;
 } 
$formsearch .= <<<EOF

            </div>
            
EOF;
?>
<?php } ?>
    <?php $formsearch_html .= $formsearch;?><?php $fontsearch = '';$showoption = array();$tmpcount = 0;?><?php if(getstatus($option['search'], 2)) { ?>
    <?php
$fontsearch = <<<EOF

<tr>
<th >{$option['title']}:</th>
            <td>
                <ul >
                    <li
EOF;
 if($_GET[''.$option['identifier']] == 'all') { 
$fontsearch .= <<<EOF
 class="a"
EOF;
 } 
$fontsearch .= <<<EOF
><a href="forum.php?mod=forumdisplay&amp;fid={$_G['fid']}&amp;filter=sortid&amp;sortid={$_GET['sortid']}&amp;searchsort=1{$filterurladd}&amp;{$option['identifier']}=all{$sorturladdarray[$option['identifier']]}" class="xi2">不限</a></li>

EOF;
 if($option['type'] == 'select') { if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { if($value['foptionid'] == 0) { 
$fontsearch .= <<<EOF

<li
EOF;
 if(preg_match('/^'.$value['optionid'].'\./i', $_GET[''.$option['identifier']]) || preg_match('/^'.$value['optionid'].'$/i', $_GET[''.$option['identifier']])) { 
$fontsearch .= <<<EOF
 class="a"
EOF;
 } 
$fontsearch .= <<<EOF
><a href="forum.php?mod=forumdisplay&amp;fid={$_G['fid']}&amp;filter=sortid&amp;sortid={$_GET['sortid']}&amp;searchsort=1&amp;{$option['identifier']}={$id}{$sorturladdarray[$option['identifier']]}" class="xi2">{$value['content']}</a></li>

EOF;
 } } if(!($_GET[''.$option['identifier']] == 'all' || !isset($_GET[''.$option['identifier']]))) { if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { if((preg_match('/^'.$value['foptionid'].'\./i', $_GET[''.$option['identifier']]) || preg_match('/^'.$value['foptionid'].'$/i', $_GET[''.$option['identifier']])) && ($showoption[$value['count']][$id] = $value)) { } } if(ksort($showoption)) { } if(is_array($showoption)) foreach($showoption as $optioncount => $values) { if($tmpcount != $optioncount && ($tmpcount = $optioncount)) { 
$fontsearch .= <<<EOF

</ul><ul class="subtsm cl">
EOF;
 if(is_array($values)) foreach($values as $id => $value) { 
$fontsearch .= <<<EOF
<li
EOF;
 if(preg_match('/^'.$value['optionid'].'\./i', $_GET[''.$option['identifier']]) || preg_match('/^'.$value['optionid'].'$/i', $_GET[''.$option['identifier']])) { 
$fontsearch .= <<<EOF
 class="a"
EOF;
 } 
$fontsearch .= <<<EOF
><a href="forum.php?mod=forumdisplay&amp;fid={$_G['fid']}&amp;filter=sortid&amp;sortid={$_GET['sortid']}&amp;searchsort=1&amp;{$option['identifier']}={$id}{$sorturladdarray[$option['identifier']]}" class="xi2">{$value['content']}</a></li>

EOF;
 } 
$fontsearch .= <<<EOF

</ul><ul>

EOF;
 } } } } else { if(is_array($option['choices'])) foreach($option['choices'] as $id => $value) { 
$fontsearch .= <<<EOF
<li
EOF;
 if($_GET[''.$option['identifier']] && !strcmp($id, $_GET[''.$option['identifier']])) { 
$fontsearch .= <<<EOF
 class="a"
EOF;
 } 
$fontsearch .= <<<EOF
><a href="forum.php?mod=forumdisplay&amp;fid={$_G['fid']}&amp;filter=sortid&amp;sortid={$_GET['sortid']}&amp;searchsort=1&amp;{$option['identifier']}={$id}{$sorturladdarray[$option['identifier']]}" class="xi2">{$value}</a></li>

EOF;
 } } 
$fontsearch .= <<<EOF

                </ul>
            </td>
</tr>

EOF;
?>
     <?php } ?>
     <?php $fontsearch_html .= $fontsearch;?><?php } if($formsearch_html || $fontsearch_html) { ?>
<div class="fontsearch_div">
<?php if($fontsearch_html) { ?>

    <table id="fontsearch" >
         <?php echo $fontsearch_html;?>
    </table>

<?php } if($formsearch_html) { ?>
    <form method="post" autocomplete="off" name="searhsort" id="searhsort" action="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $_GET['sortid'];?>">
        <input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
        <?php echo $formsearch_html;?>
        <button type="submit" class="button2"   name="searchsortsubmit">搜索</button>
    </form>
<?php } ?>
</div>
<?php } } ?>



<!-- main threadlist start -->
<?php if(!$subforumonly) { ?>
<div class="threadlist ">
<ul>
<?php if($_G['forum_threadcount']) { if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if(!$_G['setting']['mobile']['mobiledisplayorder3'] && $thread['displayorder'] > 0) { continue;?><?php } ?>
                	<?php if($thread['displayorder'] > 0 && !$displayorder_thread) { ?>
                <?php $displayorder_thread = 1;?>                    <?php } if($thread['moved']) { $thread[tid]=$thread[closed];?><?php } ?>
<li>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key];?>

                    <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;extra=<?php echo $extra;?>" <?php echo $thread['highlight'];?> >
<?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
<img src="./template/strong_mobile/images/icon_top.png">
<?php } elseif($thread['special'] == 4) { ?>
<img src="./template/strong_mobile/images/activitysmall.png"  />
<?php } elseif($thread['digest'] > 0) { ?>
<img src="./template/strong_mobile/images/icon_digest.png">
<?php } elseif($thread['attachment'] == 2 && $_G['setting']['mobile']['mobilesimpletype'] == 0) { ?>
<img src="./template/strong_mobile/images/icon_tu.png">
<?php } elseif($thread['special'] == 1) { ?>
<img src="./template/strong_mobile/images/pollsmall.png"  />
<?php } elseif($thread['special'] == 3) { ?>
<img src="./template/strong_mobile/images/rewardsmall.png"  />
<?php } elseif($thread['special'] == 2) { ?>
<img src="./template/strong_mobile/images/tradesmall.png"  />
<?php } ?>
<?php echo $thread['subject'];?>
<span class="by"><?php echo $thread['author'];?>&nbsp;&nbsp;<?php echo $thread['dateline'];?></span>
</a>
<span class="num"><?php echo $thread['replies'];?></span>

</li>
                <?php } ?>
            <?php } else { ?>
<li>本版块或指定的范围内尚无主题</li>
<?php } ?>
</ul>
</div>
<div class="ajaxload">
<a href="javascript:;" style="display:none;"  title="发帖" id="loca1"><?php echo $lang['load'];; ?></a>
<a href="javascript:;" style="display:none;"  title="发帖" id="loca2"><?php echo $lang['load_pic'];; ?></a>
<a href="javascript:;" style="display:none;"  title="发帖" id="loca3"><?php echo $lang['load_nopic'];; ?></a>


</div>
<script>

var page=<?php echo $_G['page'];?>;
var fid=<?php echo $_G['fid'];?>;
var allpage=<?php echo ceil($_G['forum_threadcount'] / $_G['tpp']);; ?>;
$(document).ready(function(){


if (allpage>page){$("#loca1").show(); }else{$("#loca3").show();}
$("#loca1").click(function(){
page++;

    $("#loca1").hide();
$("#loca2").show();

$.post("./forum.php",
{
mod:"forumdisplay",
fid:fid,
mobile:"2",
page:page,
picajax:"nopic"
},
function(result,textStatus){
if (textStatus=='success'){

 $("#loca2").hide();
 if (allpage>page){$("#loca1").show();}else{$("#loca1").hide(); $("#loca3").show();}

 	};
$(".threadlist ul").append(result);

});



});


});


</script>

<?php } ?>
 <?php } else { ?>

 <div id="masonry" class=""><?php if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if($_G['hiddenexists'] && $thread['hidden']) { continue;?><?php } if(!$thread['forumstick'] && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])) { if($thread['related_group'] == 0 && $thread['closed'] > 1) { $thread[tid]=$thread[closed];?><?php } } $waterfallwidth = $_G[setting][forumpicstyle][thumbwidth] + 24;?>    <div class="imgsitem">
        <div class="imgs">
            <?php if($thread['cover']) { ?>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;extra=<?php echo $extra;?>"><img src="<?php echo $thread['coverpath'];?>" alt="<?php echo $thread['subject'];?>" /></a>
<?php } else { ?>
<img src="./template/strong_mobile/images/nopic.jpg"  />
<?php } ?>
        </div>
        <span style="position:relative;z-index:99;"><?php echo $thread['subject'];?></span>
        <div class="imgsnail"></div>

    </div>

    <?php } ?>

</div>
<div class="ajaxload">
<a href="javascript:;" style="display:none;"  title="发帖" id="loca1"><?php echo $lang['load'];; ?></a>
<a href="javascript:;" style="display:none;"  title="发帖" id="loca2"><?php echo $lang['load_pic'];; ?></a>
<a href="javascript:;" style="display:none;"  title="发帖" id="loca3"><?php echo $lang['load_nopic'];; ?></a>


</div>
<script>

var page=<?php echo $_G['page'];?>;
var fid=<?php echo $_G['fid'];?>;
var allpage=<?php echo ceil($_G['forum_threadcount'] / $_G['tpp']);; ?>;
$(document).ready(function(){


if (allpage>page){$("#loca1").show(); }else{$("#loca3").show();}
$("#loca1").click(function(){
page++;

    $("#loca1").hide();
$("#loca2").show();

$.post("./forum.php",
{
mod:"forumdisplay",
fid:fid,
mobile:"2",
page:page,
picajax:"pic"
},
function(result,textStatus){
if (textStatus=='success'){

 $("#loca2").hide();
 if (allpage>page){$("#loca1").show();}else{$("#loca1").hide(); $("#loca3").show();}

 	};
$("#masonry").append(result);

});



});


});


</script>

 <?php } ?>
<!-- main threadlist end -->
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_bottom_mobile'])) echo $_G['setting']['pluginhooks']['forumdisplay_bottom_mobile'];?>
<div class="scroll" id="scroll" style="display:none;"><?php echo $lang['stop'];; ?></div>
<script src="./template/strong_mobile/js/scroll.js" type="text/javascript"></script><?php include template('common/footer'); ?>