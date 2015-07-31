window.onload=function () {
	var Request = new Object();
	Request = GetRequest();
	avatar_url = Request['avatar_url'];
	media_type = Request['media_type'];
	if (document.getElementById("avatar")) {
		document.getElementById("avatar").src = avatar_url;
	}
	document.addEventListener("touchstart", function(){}, true);
	preventLongPressMenu(document.getElementsByClassName('delete')[0]);
	preventLongPressMenu(document.getElementById('avatar'));
	init();
}
function init(){
	if (media_type==4) {
		document.getElementById("type").innerHTML="文字";
		document.getElementById("title").innerHTML = "Fun - 24小时朋友圈";
	}
	else if(media_type==5){
		document.getElementById("type").innerHTML="照片";
		document.getElementById("title").innerHTML = "Fun - 24小时朋友圈";
	}
	else if(media_type==6){
		document.getElementById("type").innerHTML="视频";
		document.getElementById("title").innerHTML = "Fun - 24小时朋友圈";
	}
}
function GetRequest() {
   var url = location.search; 
   var theRequest = new Object();
   if (url.indexOf("?") != -1) {
      var str = url.substr(1);
      strs = str.split("&");
      for(var i = 0; i < strs.length; i ++) {
         theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]);
      }
   }
   return theRequest;
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
