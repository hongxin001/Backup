Request = new Object();
Request = GetRequest();
url_id = Request['id'];
avatar_url = Request['avatar_url'];
media_url = Request['media_url'];
media_type = Request['media_type'];
limit = Request['view_time'];
innertext = Request['text'];
alert('hehe')
checkCookie(url_id)
window.onload=function () {
	alert('haha')
	checkCookie(url_id)
	num = parseInt(limit);
	body = document.getElementsByTagName('body')[0];
	init();
	flag = 0;
	m_end = 0;
	if (document.getElementById("avatar")) {
		document.getElementById("avatar").src = avatar_url;
	}
	if (document.getElementById("time_text")) {
		document.getElementById("time_text").innerHTML = num;
	}
	body.addEventListener('touchmove',function(){event.preventDefault();});
}
function init() {
	if (media_type==4) {
		document.getElementById("type").innerHTML="句话";
		document.getElementById("title").innerHTML = "Fun - 24小时朋友圈";
		text_c();
		body.addEventListener('touchstart',function(){start()});
		body.addEventListener('touchend',function(){end()});
	}
	else if(media_type==5){
		document.getElementById("type").innerHTML="张照片";
		document.getElementById("title").innerHTML = "Fun - 24小时朋友圈";
		img_c();
		var img = document.getElementById("media");
		img.onload = function() {
			var height = img.offsetHeight;
			document.getElementById("media").style.marginTop = '-'+height/2+'px';
			img.style.visibility="visible"
			body.addEventListener('touchstart',function(){start()});
			body.addEventListener('touchend',function(){end()});
        }
	}
	else if(media_type==6) {
		document.getElementById("type").innerHTML="段视频";
		document.getElementById("title").innerHTML = "Fun - 24小时朋友圈";
		video_c();
		var video = document.getElementById("media");
		video.load();
		video.addEventListener('canplay',function(){
//			document.getElementById("loading").style.display="none"
		});
		video.onended = function(){
			m_end = 1;
			setCookie(url_id,url_id,10000);
			redir();
		}
		var time_control = document.getElementsByClassName('time')[0];
		time_control.parentElement.removeChild(time_control);
		body.addEventListener('touchstart',function(){start()});
		body.addEventListener('touchend',function(){end()});
	}
	checkua();
	preventLongPressMenu(document.getElementById('media'));
	
}
function time () {
	if (num>1) {
		num--;
		document.getElementById("time_text").innerHTML=num;
	}
	else {
		m_end = 1;
		setCookie(url_id,url_id,10000);
		redir();
	}
}
function re_time() {
	if(document.getElementById("media").ended){
		m_end = 1;
		setCookie(url_id,url_id,10000);
		redir();
	}
}
function redir(){
	var str = 'result.html?media_url='+media_url+'&media_type='+media_type+'&view_time='+limit+'&avatar_url='+avatar_url+'&text='+innertext+"&id="+url_id;
	str = encodeURI(str)
	window.location.href=str;
}
function start() {
	event.preventDefault();
	document.getElementById("media").className="media";
	document.getElementsByClassName("page1")[0].className = "page page1 out";
	document.getElementsByClassName("page2")[0].className = "page page2";
	if(media_type==6){
		var video= document.getElementById("media")
		if(video.readyState==4){
			video.play();
		}


		flag =1;
	}
	if(flag == 0){
		flag =1;
		setInterval("time()",1000);
	}
}
function end() {
	document.getElementById("media").className="media blur"
	document.getElementsByClassName("page1")[0].className = "page page1";
	document.getElementsByClassName("page2")[0].className = "page page2 out";
}
function GetRequest() {
   var url = location.search; 
   var theRequest = new Object();
   if (url.indexOf("?") != -1) {
      url = decodeURI(url);
      var str = url.substr(1);
      strs = str.split("&");
      for(var i = 0; i < strs.length; i ++) {
         theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]);
      }
   }
   return theRequest;
}

function video_c() {
    var video = document.createElement("video");
    video.className="media blur";
    video.id="media";
    video.src = media_url;
	video.preload = "auto";
    video.setAttribute('webkit-playsinline','webkit-playsinline')
    document.body.appendChild(video);
}
function img_c () {
	var img = document.createElement("img");
    img.className="media blur";
    img.id="media";
    img.src = media_url;
    document.body.appendChild(img);
}
function text_c () {
	var div = document.createElement("div");
    div.className="media blur";
    div.id="media";
    var innerdiv = document.createElement("div");
    var p =document.createElement("p");
    p.id = "text";
    p.innerHTML = innertext;
    innerdiv.appendChild(p);
    div.appendChild(innerdiv);
    document.body.appendChild(div);
}
function setCookie(c_name,value,expiredays){
	var exdate=new Date()
	exdate.setDate(exdate.getDate()+expiredays)
	document.cookie=c_name+ "=" +escape(value)+
	((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}
function getCookie(c_name){
	if (document.cookie.length>0){
		c_start=document.cookie.indexOf(c_name + "=")
		if (c_start!=-1) { 
			c_start=c_start + c_name.length+1 
			c_end=document.cookie.indexOf(";",c_start)
			if (c_end==-1) 
				c_end=document.cookie.length
			return unescape(document.cookie.substring(c_start,c_end))
		} 
	}
	return "";
}
function checkCookie(id){
	alert(document.cookie)
	res=getCookie(id)
	if (res!=null && res!=""){
		redir();
	}
}
browser={
	versions:function(){
		var u = navigator.userAgent, app = navigator.appVersion;
		return {
			trident: u.indexOf('Trident') > -1,
			presto: u.indexOf('Presto') > -1,
			webKit: u.indexOf('AppleWebKit') > -1,
			gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1,
			mobile: !!u.match(/AppleWebKit.*Mobile.*/)||!!u.match(/AppleWebKit/),
			ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), 
			android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, 
			iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1,
			iPad: u.indexOf('iPad') > -1,
			chrome:  u.indexOf('Chrome') > -1,
			micromes: u.indexOf('MicroMessenger')> -1,
			webApp: u.indexOf('Safari') == -1 
		};
	}(),
	language:(navigator.browserLanguage || navigator.language).toLowerCase()
}

function checkua(){
	app = navigator.appVersion;
	if(browser.versions.mobile){
		if ((browser.versions.ios||browser.versions.iPhone)||browser.versions.iPad) {
			var v_start = app.indexOf('OS ');
			var num = parseInt(app.slice(v_start+3,v_start+4));
			if(num>=6){
				document.getElementsByClassName('page1')[0].style.background="transparent";
			}
		}
		if(browser.versions.android){
			var v_start = app.indexOf('Android ');
			var num = parseFloat(app.slice(v_start+8,v_start+11));
			if(num>=4.4){
				document.getElementsByClassName('page1')[0].style.background="transparent";
			}
		}
		if(browser.versions.chrome){
			document.getElementsByClassName('page1')[0].style.background="transparent";
		}
		if(browser.versions.micromes){
			if(browser.versions.ios){
				var v_start = app.indexOf('OS ');
				var num = parseInt(app.slice(v_start+3,v_start+4));
				if(num>=6){
					document.getElementsByClassName('page1')[0].style.background="transparent";
				}
			}
		}
	}
}
function absorbEvent_(event) {
  var e = event || window.event;
  e.preventDefault && e.preventDefault();
  e.stopPropagation && e.stopPropagation();
  e.cancelBubble = true;
  e.returnValue = false;
  return false;
}

function preventLongPressMenu(node) {
  node.ontouchstart = absorbEvent_;
  node.ontouchmove = absorbEvent_;
  node.ontouchend = absorbEvent_;
  node.ontouchcancel = absorbEvent_;
}

     


