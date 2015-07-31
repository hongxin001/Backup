window.onload=function() {
	
}
function submit(){
	var list= document.getElementsByTagName('input');
	var id;
	for (var i=0;i<list.length;i++) {
		if (list[i].checked!=false) {
			id=list[i].id;
			break;
		}
	}
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		
	}
	xmlhttp.open("GET","/chatbar?"+id,true);
}
