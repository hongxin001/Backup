<?php echo '请支持正版 QQ475353687';exit;?>
<!--{subtemplate common/header_common}-->
<!--{eval require $_G['cache']['style_default']['directory'].'/lang/'.CHARSET.'.php';}-->
	<meta name="application-name" content="$_G['setting']['bbname']" />
	<meta name="msapplication-tooltip" content="$_G['setting']['bbname']" />
	<!--{if $_G['setting']['portalstatus']}--><meta name="msapplication-task" content="name=$_G['setting']['navs'][1]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['portal']) ? 'http://'.$_G['setting']['domain']['app']['portal'] : $_G[siteurl].'portal.php'};icon-uri={$_G[siteurl]}{IMGDIR}/portal.ico" /><!--{/if}-->
	<meta name="msapplication-task" content="name=$_G['setting']['navs'][2]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['forum']) ? 'http://'.$_G['setting']['domain']['app']['forum'] : $_G[siteurl].'forum.php'};icon-uri={$_G[siteurl]}{IMGDIR}/bbs.ico" />
	<!--{if $_G['setting']['groupstatus']}--><meta name="msapplication-task" content="name=$_G['setting']['navs'][3]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['group']) ? 'http://'.$_G['setting']['domain']['app']['group'] : $_G[siteurl].'group.php'};icon-uri={$_G[siteurl]}{IMGDIR}/group.ico" /><!--{/if}-->
	<!--{if helper_access::check_module('feed')}--><meta name="msapplication-task" content="name=$_G['setting']['navs'][4]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['home']) ? 'http://'.$_G['setting']['domain']['app']['home'] : $_G[siteurl].'home.php'};icon-uri={$_G[siteurl]}{IMGDIR}/home.ico" /><!--{/if}-->
	<!--{if $_G['basescript'] == 'forum' && $_G['setting']['archiver']}-->
		<link rel="archives" title="$_G['setting']['bbname']" href="{$_G[siteurl]}archiver/" />
	<!--{/if}-->
	<!--{if !empty($rsshead)}-->$rsshead<!--{/if}-->
	<!--{if widthauto()}-->
		<link rel="stylesheet" id="css_widthauto" type="text/css" href="data/cache/style_{STYLEID}_widthauto.css?{VERHASH}" />
		<script type="text/javascript">HTMLNODE.className += ' widthauto'</script>
	<!--{/if}-->
	<!--{if $_G['basescript'] == 'forum' || $_G['basescript'] == 'group'}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}forum.js?{VERHASH}"></script>
	<!--{elseif $_G['basescript'] == 'home' || $_G['basescript'] == 'userapp'}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}home.js?{VERHASH}"></script>
	<!--{elseif $_G['basescript'] == 'portal'}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}portal.js?{VERHASH}"></script>
	<!--{/if}-->
	<!--{if $_G['basescript'] != 'portal' && $_GET['diy'] == 'yes' && check_diy_perm($topic)}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}portal.js?{VERHASH}"></script>
	<!--{/if}-->
	<!--{if $_GET['diy'] == 'yes' && check_diy_perm($topic)}-->
	<link rel="stylesheet" type="text/css" id="diy_common" href="data/cache/style_{STYLEID}_css_diy.css?{VERHASH}" />
	<!--{/if}-->
</head>

<body id="nv_{$_G[basescript]}" class="pg_{CURMODULE}{if $_G['basescript'] === 'portal' && CURMODULE === 'list' && !empty($cat)} {$cat['bodycss']}{/if}" onkeydown="if(event.keyCode==27) return false;">
	<div id="append_parent"></div><div id="ajaxwaitid"></div>
	<!--{if $_GET['diy'] == 'yes' && check_diy_perm($topic)}-->
		<!--{template common/header_diy}-->
	<!--{/if}-->
	<!--{if check_diy_perm($topic)}-->
		<!--{template common/header_diynav}-->
	<!--{/if}-->
	<!--{if CURMODULE == 'topic' && $topic && empty($topic['useheader']) && check_diy_perm($topic)}-->
		$diynav
	<!--{/if}-->
	<!--{if empty($topic) || $topic['useheader']}-->
		<!--{if $_G['setting']['mobile']['allowmobile'] && (!$_G['setting']['cacheindexlife'] && !$_G['setting']['cachethreadon'] || $_G['uid']) && ($_GET['diy'] != 'yes' || !$_GET['inajax']) && ($_G['mobile'] != '' && $_G['cookie']['mobile'] == '' && $_GET['mobile'] != 'no')}-->
			<div class="xi1 bm bm_c">
			    {lang your_mobile_browser}<a href="{$_G['siteurl']}forum.php?mobile=yes">{lang go_to_mobile}</a> <span class="xg1">|</span> <a href="$_G['setting']['mobile']['nomobileurl']">{lang to_be_continue}</a>
			</div>
		<!--{/if}-->
		<!--{if $_G['setting']['shortcut'] && $_G['member'][credits] >= $_G['setting']['shortcut']}-->
			<div id="shortcut">
				<span><a href="javascript:;" id="shortcutcloseid" title="{lang close}">{lang close}</a></span>
				{lang shortcut_notice}
				<a href="javascript:;" id="shortcuttip">{lang shortcut_add}</a>

			</div>
			<script type="text/javascript">setTimeout(setShortcut, 2000);</script>
		<!--{/if}-->

		<!--{ad/headerbanner/wp a_h}-->
				<div id="nv">
                    <div class="header">
                    
                        <!--{eval $mnid = getcurrentnav();}-->
                        <h2><!--{if !isset($_G['setting']['navlogos'][$mnid])}--><a href="{if $_G['setting']['domain']['app']['default']}http://{$_G['setting']['domain']['app']['default']}/{else}./{/if}" title="$_G['setting']['bbname']">{$_G['style']['boardlogo']}</a><!--{else}-->$_G['setting']['navlogos'][$mnid]<!--{/if}--></h2>
                        <ul>
                            <!--{eval $mnid = getcurrentnav();}-->
                            <!--{loop $_G['setting']['navs'] $nav}-->
                                <!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}--><li {if $mnid == $nav[navid]}class="a" {/if}$nav[nav]></li><!--{/if}-->
                            <!--{/loop}-->
                        </ul>
                        <!--{hook/global_nav_extra}-->
                        <!--{if $_G['uid']}-->
                        <div id="logined">
                        <a class="eyecare" onClick="backcolor();cmszsStyle();cmszsStylehb();" href="javascript:void(0)"></a>
                        <a class="ec-open" style="display:none;" onClick="defaultCL();cmszsStyleb();cmszsStyleh();" href="javascript:void(0)"></a>
                        </div>
                        <div id="qmenuuu">
                        <div class="avtav self-info" onMouseOver="showMenu({'ctrlid':'qmenuuu','pos':'34!','ctrlclass':'qmenuuu_hover','duration':2});">
                        <a href="home.php?mod=space&uid=$_G[uid]"><!--{avatar($_G[uid])}--></a>
                        <a href="home.php?mod=space&uid=$_G[uid]" target="_blank" title="{lang visit_my_space}" class="username" id="username-top">{$_G[member][username]}</a>
                        
                     
                        </div>
                        <!--{if $_G[member][newprompt]||$_G[member][newpm]}-->
                        <a class="message-hd newmessage-hd" href="home.php?mod=space&amp;do=notice" target="_blank"></a>
                        <!--{/if}-->
                        </div>
                        
                        <!--{else}-->
                        <div class="login_box">
                        <a href="member.php?mod={$_G[setting][regname]}" target="_blank" class="re_qmenu" >$cmszs_lang[4]</a>
                        <span class="fg_line">|</span>
                        <a href="member.php?mod=logging&amp;action=login&amp;referer=" id="lg_qmenu" onClick="showWindow('login', this.href);return false;">{lang login}</a>
                        <div class="user-info">
                        <div class="login-img"></div>
                        </div>
                        <a class="eyecare" onClick="backcolor();cmszsStyle();cmszsStylehb();" href="javascript:void(0)"></a>
                        <a class="ec-open" style="display:none;" onClick="defaultCL();cmszsStyleb();cmszsStyleh();" href="javascript:void(0)"></a>
                        </div>
                        <!--{/if}-->
                        <script type="text/javascript">
					 var options = {path: '/', expires: 10}; //定义路径，过期时间为10天
					 var cookie_backColor = jQuery.cookie("backColor"); //定义背景颜色值
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
					//背景颜色方法
					 function backcolor(){
					 jQuery("body").css('background','#c5e0c8'); //改变背景颜色
					 jQuery.cookie("backColor", "#c5e0c8", options); //把背景颜色值传进"backColor"这个cookie里
					 
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
					//恢复默认方法
					 function defaultCL(){
					 jQuery("body").css('background',''); //清空背景颜色
					 jQuery.cookie("backColor", null, options); //把背景颜色空值传进"backColor"这个cookie里
					 }
					 </script>
                    	<div id="search_btn" class="">
                        <a class="search-a" href="javascript:;" id="search_form" onMouseOver="showMenu({'ctrlid':'search_btn','pos':'34!','ctrlclass':'search_hover','fade':'1','duration':2})">&nbsp;</a>
                        
                        </div>
                        
                    </div>
				</div>
		<!--{subtemplate common/pubsearchform}-->
        <!--{if $_G['uid']}-->
        <div id="qmenuuu_menu" style="display:none;">
            <div class="user-info-nav">
                <div class="username-line">
                 <span>{lang username}:</span>
                 <a href="home.php?mod=space&uid=$_G[uid]" target="_blank" title="{lang visit_my_space}" >{$_G[member][username]}</a>
                </div>
                <div class="first-line"><div class="first-line-item"><span>{lang credits}: </span><a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1" id="extcreditmenu" target="_blank"><em style="color:#ffc000">$_G[member][credits]</em></a>
                </div>
                <div class="first-line-item"><span>{lang usergroup}: </span><a href="home.php?mod=spacecp&amp;ac=usergroup" id="g_upmine" class="xi2"  target="_blank">$_G[group][grouptitle]</a></div>
                </div>
                <ul class="navlist cl" id="navlist">
                      <li><a href="home.php?mod=space&amp;do=pm" id="pm_ntc" data-text="{lang pm_center}">{lang pm_center}<span></span></a></li>
                      <li><a href="home.php?mod=space&amp;do=notice" id="myprompt">{lang remind}<span><!--{if $_G[member][newprompt]||$_G[member][newpm]}-->(<!--{eval}-->
                                $a = DB::result_first("SELECT newpm FROM ".DB::table('common_member')." WHERE `uid` =$_G[uid]");
                                $b = DB::result_first("SELECT newprompt FROM ".DB::table('common_member')." WHERE `uid` =$_G[uid]");
                                echo $a+$b;
                                <!--{/eval}-->)<!--{/if}--></span></a></li>
                      <li>
                      <a href="home.php?mod=space&amp;do=thread&amp;view=me&amp;from=space" class="mythread">$cmszs_lang[8]</a>
                      </li>
                      <li><a href="home.php?mod=space&amp;do=friend" style="background-image:url($_G['style']['styleimgdir']/haoyou.png) !important">{lang friends}</a></li>
                      <li><a href="home.php?mod=space&amp;do=favorite&amp;view=me" style="background-image:url($_G['style']['styleimgdir']/choucang.png) !important">{lang favorite}</a></li>
                      <li><a href="home.php?mod=medal" style="background-image:url($_G['style']['styleimgdir']/xunzhang.png) !important">{lang medals}</a></li>
                      <!--{if $_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)}-->
<li><a href="admin.php" target="_blank"  style="background-image:url($_G['style']['styleimgdir']/admin_setting.png) !important">{lang admincp}</a></li>
<!--{/if}-->
		<!--{if ($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))}-->
			<li><a href="portal.php?mod=portalcp" style="background-image:url($_G['style']['styleimgdir']/portal.png) !important"><!--{if $_G['setting']['portalstatus'] }-->{lang portal_manage}<!--{else}-->{lang portal_block_manage}<!--{/if}--></a></li>
		<!--{/if}-->
                      <li><a href="home.php?mod=spacecp" style="background-image:url($_G['style']['styleimgdir']/shezhi.png) !important">{lang setup}</a></li>
                      <!--{if check_diy_perm($topic)}-->
  					  <li><a href="javascript:openDiy();" title="{lang open_diy}" class="cmszs_diy">$cmszs_lang[0]</a></li>
  					  <!--{/if}-->
                      <li><a href="member.php?mod=logging&amp;action=logout&amp;formhash={FORMHASH}" class="logout" id="aUserLogout">{lang logout}</a></li>          
                      <!--{hook/global_usernav_extra3}-->
                </ul>
            
            </div>
        </div>
        
        <!--{/if}-->
		

		<!--{ad/headerbanner/wp a_h}-->
		<div id="hd">
			<div class="wp">
				

				
				<!--{if !empty($_G['setting']['plugins']['jsmenu'])}-->
					<ul class="p_pop h_pop" id="plugin_menu" style="display: none">
					<!--{loop $_G['setting']['plugins']['jsmenu'] $module}-->
						 <!--{if !$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])}-->
						 <li>$module[url]</li>
						 <!--{/if}-->
					<!--{/loop}-->
					</ul>
				<!--{/if}-->
				$_G[setting][menunavs]
				<div id="mu" class="cl">
				<!--{if $_G['setting']['subnavs']}-->
					<!--{loop $_G[setting][subnavs] $navid $subnav}-->
						<!--{if $_G['setting']['navsubhover'] || $mnid == $navid}-->
						<ul class="cl {if $mnid == $navid}current{/if}" id="snav_$navid" style="display:{if $mnid != $navid}none{/if}">
						$subnav
						</ul>
						<!--{/if}-->
					<!--{/loop}-->
				<!--{/if}-->
				</div>
				<!--{ad/subnavbanner/a_mu}-->
				
			</div>
		</div>

		<!--{hook/global_header}-->
	<!--{/if}-->

	<div id="wp" class="wp">
