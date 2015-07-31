window.onload=function () {
	year = document.getElementById("year");
	month = document.getElementById("month");
	day = document.getElementById("day");
}
function add(own,max) {
	var text=own.parentElement.getElementsByClassName('text')[0];
	var num = parseInt(text.innerHTML);
	num+=1;
	if(max==-1){
		var curdate= new Date();
		max = curdate.getFullYear();
		if(num>=max)
			num=max;
	}
	else if(max==-2){
		var year_num = parseInt(year.innerHTML);
		var month_num = parseInt(month.innerHTML);
		switch (month_num){
			case 1:
			case 3:
			case 5:
			case 7:
			case 8:
			case 10:
			case 12:
				max=31;
				break;
			case 4:
			case 6:
			case 9:
			case 11:
				max=30;
				break;
			default:
				max =0;
				break;
		}
		if ((year_num%4==0&&year_num%100!=0)||(year_num%400==0)) {
			if (month_num==2) {
				max=29;
			}
		}
		else{
			if (month_num==2) {
				max=28;
			}
		}
		if(num>max) {
			num=0;
		}
	}
	else if(num>max) {
		num=0;
	}
	text.innerHTML=num;
}
function sub(own,max) {
	var text=own.parentElement.getElementsByClassName('text')[0];
	var num = parseInt(text.innerHTML);
	num-=1;
	if(max==-1){
	}
	else if(max==-2){
		var year_num = parseInt(year.innerHTML);
		var month_num = parseInt(month.innerHTML);
		switch (month_num){
			case 1:
			case 3:
			case 5:
			case 7:
			case 8:
			case 10:
			case 12:
				max=31;
				break;
			case 4:
			case 6:
			case 9:
			case 11:
				max=30;
				break;
			default:
				max =0;
				break;
		}
		if ((year_num%4==0&&year_num%100!=0)||(year_num%400==0)) {
			if (month_num==2) {
				max=29;
			}
		}
		else{
			if (month_num==2) {
				max=28;
			}
		}
		if(num<0) {
			num=max;
		}
	}
	else if(num<0) {
		num=max;
	}
	
	text.innerHTML=num;
}
function submit(){
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		
	}
	xmlhttp.open("GET","/chatbar?"+year.innerHTML+','+month.innerHTML+','+day.innerHTML,true);
}
