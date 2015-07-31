function showTooltips(msgid,msg,time){
	if (msgid==''){ return; }
	if (msg==''){ msg='Error!'; }
	jq('#'+msgid).prepend("<div class='for_fix_ie6_bug' style='position:relative;'><div class='tooltips_main'><div class='tooltips_box'><div class='tooltips'><div class='msg'>"+msg+"</div></div><div class='ov'></div></div></div></div>");
	jq('#'+msgid+' .tooltips_main').fadeIn("slow").animate({ marginTop: "-23px"}, {queue:true, duration:400});
	try{
		if(typeof time != "undefined"){
			setTimeout('hideTooltips("'+msgid+'")',time);
		}
	}catch(err){}
}
function hideTooltips(msgid){
	try{
		jq('#'+msgid).find('.tooltips_main').fadeOut("slow");
		jq('#'+msgid).find('.tooltips_main').remove();
	}catch(e){}
}
function hideAllTooltips(){
	jq('.tooltips_main').fadeOut("slow");
	jq('.tooltips_main').remove();
}