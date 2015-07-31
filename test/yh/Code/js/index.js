var a = [{"fakeid": "820476141", "name": "知心在线"}, {"fakeid": "68086745", "name": "ray"}, {"fakeid": "2734725741", "name": "仰姝"}, {"fakeid": "2572394803", "name": "shengweidong"}, {"fakeid": "1456636862", "name": "跳跳龙"}, {"fakeid": "101289595", "name": "左岸15度"}];
a=[];
var loading = {
    base: "http://lucky.vdanmu.com:8888/test.php?fakeid=",
    total: 0,
    source:[]
};

loading.loadingFn = function() {
    var img = new Image();
    img.onload = function() {
        loading.total += loading.per;
        loading.source.pop();
        setTimeout(function() {
            if (loading.source.length == 0) 
                alert('数据加载成功');
            else 
                loading.loadingFn();
        })
    }
    img.src = loading.base + loading.source[loading.source.length - 1];
};

var cur=0;
var length=0;
var max=4;
window.onload=function(){
	init();
	$head_pic = $('.machine').find('img');
	$username = $('.machine').find('.uesername');
	$('#end').on('click',function(){
		clearInterval(timer);
		stop();
		$(this).css('display','none');
		$('#start').css('display','block');
	});
	
	$('#start').on('click',function(){
		if(max<=0){
			return ;
		}
		if(a.length<max){
			alert("人数不足");
			return ;
		}
		$(this).css('display','none');
		$('#end').css('display','block');
		timer = setInterval(function(){start()},100);
	});
	$('.change').on('click',function(){
		var $this=$(this);
		$('.'+$this.attr('data-from')).css('display','none');
		$('.'+$this.attr('data-to')).css('display','block');
	});
}
function init(){
	$.getJSON("person.json", function(data){
		a = data;
		var len = data.length;
		for(var i=0;i<data.length;i++){
			loading.source[i]=data[i].fakeid;
		}
		
		loading.per = (1 / len) ; 
	 	$head_pic.attr('src','http://lucky.vdanmu.com:8888/test.php?fakeid='+a[0].fakeid);
		$username.html(a[0].name);
		
		loading.loadingFn();
		
	});
	
}

function start(){
	cur=cur%a.length;
	$head_pic.attr('src','http://lucky.vdanmu.com:8888/test.php?fakeid='+a[cur].fakeid);
	$username.html(a[cur].name);
	cur++;
}
function stop(){
	var src = $head_pic.attr('src');
	var name = $username.html();
	var str = '<li><div class="r_head"><img src="'+src+'"/></div><div class="r_username">'+name+'</div></li>';
	$('#result_first').append(str);
	$('#result_last').append(str);
	console.log(a.splice(cur-1,1))
	cur=cur%a.length;
	max--;
}



