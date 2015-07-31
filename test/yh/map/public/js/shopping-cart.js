window.onload=function() {
	updata();
	address = document.getElementsByTagName("address")[0].getElementsByTagName("span")[0];
}
function curDelete(own) {
	own.parentElement.parentElement.className="media hidden";
	updata();
	update_db(own.parentElement.parentElement.parentElement.getElementsByClassName('s-title type')[0],own.parentElement.parentElement.id,-1);
}
function cancel(own){
	own.parentElement.parentElement.className="cover";
}
function choose(own){
	var p=own.parentElement;
	var g=p.parentElement;
	var text=g.parentElement.getElementsByClassName('text')[0];
	text.innerHTML=own.innerHTML;
	own.parentElement.parentElement.className="cover";
	updata();
	update_db(own.parentElement.parentElement.parentElement.getElementsByClassName('s-title type')[0].id,own.parentElement.parentElement.id,own.innerHTML);
}
function show_select(own){
	own.parentElement.getElementsByClassName('cover')[0].className="cover active";
}
function updata() {
	var list = document.getElementsByClassName("media show");
	var price = document.getElementById('price');
	var totle = 0;
	for(var i=0;i<list.length;i++){
		var a=list[i].getElementsByClassName("price")[0].getElementsByTagName('span')[0].innerHTML;
		a=parseFloat(a);
		var num=list[i].getElementsByClassName("text")[0].innerHTML;
		num = parseInt(num);
		totle+=(a*num);
	}
	price.innerHTML=totle.toFixed(2);
	document.getElementById('t-num').innerHTML=list.length;
}
function change_address(own){
	address.innerHTML=own.getElementsByTagName('address').innerHTML;
}
function update_db(car,id,data){
	alert("haha")
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		
	}
	xmlhttp.open("GET","/chatbar?"+car+','+id+','+data,true);
}
