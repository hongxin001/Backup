window.onload=function () {
	list = document.getElementsByClassName('accessories-type')[0].getElementsByTagName('li');
	dl = document.getElementById('accessories-list');
}
function select(own){
	for(var i=0;i<list.length;i++){
		list[i].className="";
	}
	own.className="cur";
}
function update() {
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			dl.innerHTML = responseText;
		}
	}
	var id = document.getElementsByClassName('cur-l')[0].id;
	xmlhttp.open("GET","/chatbar?"+id,true);
}
