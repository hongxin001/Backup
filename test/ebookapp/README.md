#ebookapp
<b>概述</b>：基于bootstrap前端技术的小说采集系统，手机浏览效果更佳。演示网站:http://www.5ilp.cn<br>

我本人是一个小说爱好者，在读小说的过程中，碰到n多个弹出广告，而本人又喜欢手机浏览，经过被无数次的弹出广告激怒以后，决心写自己的小说系统。<br>
因一个人开发精力有限， 非常欢迎有志于开源软件开发具有分享精神的软件开发者和我一起开发。<br>
联系请加入QQ群：55614858。验证信息：开源爱好者<br>

开发列表：<br>
1.新建分类
2.新建种子
3.采集文章
4.采集目录
5.生成目录
6.采集内容
基本思想是，种子在cronjob定时采集，文章有阅读的动作才生成文章，文章有阅读的动作才生成章节列表，章节列表有阅读的动作才生成章节内容。
<br>
第一期：2013/08/24-2013/08/27
搜索==ok
分页==ok
关键字 ok
title ok
点击排行榜 ok
统计代码 ok
定时采集 :ok (每次找一个今天没有更新过的种子更新之 定时执行admin/pick_seed.php) 
每隔10分钟采集一次，一天24小时，采集144次。
<br>
第二期：
定时删除：删除有生成文件的，点击数最低的N个文章。可设置存活的最大文章数。ok
修改页面301跳转机制，301不好被搜索引擎收录 ok
加入种子批量添加机制。ok
<br>

<h3>第三期：</h3>
<br>
连载中的文章，加入 cache时间为1小时
加入作者采集	ok
加入文章图片	ok

数据库常用封装支持,封装为Model类，简化了操作。ok

<li>采集时把文章简介和图片，作者等一起采集，不再采用补齐机制 ok </li>
<li>显示用户点击榜，显示最近更新，定时生成siteMap.xml.(http://zhanzhang.baidu.com/wiki/44) ok </li>
<li>对于小站，php的并发进程数受限，比如说5ilp.cn，限制进程数为3，此时如果更多的用户访问，经常出现508的错误，为解决此问题，可采用全静态化的方法解决。</li>



用户中心，支持微博登陆，显示最近阅读的文章，显示收藏文章


文章采集时把文章内容写入到txt文件，不在支持生成现成的html文件，html文件动态生成。 ajax动态生成广告页面为什么不行？
去除cpm广告，加入cps和cpc广告支持，手机则加载手机广告，由广告生成模块负责，对于cpc广告可以由javascript模拟点击
加入种子采集路由机制，根据不同的配置采用不同的采集规则 ok
划分页面公共头，公共页脚页面（目前只做了一个首页，其他可暂时不做）


自动生成对某表的增删改查和分页的操作
加入文章简介
页面显示最新章节
<br>

定时生成sitemap：
http://www.5ilp.cn/admin/sitemap.php<br>
自动发表微博：
http://www.5ilp.cn/weibo/weibo_auto.php<br>
http://www.5ilp.cn/qqwb/qqwb_auto.php<br>
自动抓取文章列表为空的文章的列表(原理：每天自动更新文章列表，章节在点击时候抓取，内容也是在点击时候抓取)
http://www.5ilp.cn/admin/pick_seed.php<br>


cron job:wget -q -O /dev/null "http://www.5ilp.cn/admin/pick_seed.php"

演示程序采用国外免费空间，申请点击此处：<a href="http://api.hostinger.co.uk/redir/4393980" target="_blank">http://api.hostinger.co.uk/redir/4393980</a> <br>


