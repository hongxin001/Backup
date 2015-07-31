<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="format-detection" content="telephone=no">

	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="keywords" content="时刻APP,创青春,日程连接未来，日程管理，社交，武汉华中时讯科技责任有限公司">
	<meta name="description" content="时刻APP,创青春,日程连接未来，日程管理，社交，武汉华中时讯科技责任有限公司">
	<title>时刻-创青春</title>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=EDGE">
	<style>
	html {background: #fff;height: 100%;}
	* {padding: 0;margin: 0;}
	body {
		height: 100%; -webkit-user-select: none; -moz-user-select: none; -webkit-text-size-adjust: none;position: relative;margin: 0 auto;min-width: 320px;
		font-family: "微软雅黑","黑体",Arial;
		background-image:url(/static/bg.png);
		background-size: 100% 100%;
		}
	a { text-decoration: none;display: inline-block;}
	li {list-style: none;}
	p{margin: 10px;}
	.logo-container{
		min-width:240px;
		width: 60%;
		max-width: 400px;
		margin:0 auto;
		/*height: 300px;*/
	}
	.bottom{position: absolute;bottom: 0;width: 100%;}
	.btn{max-width: 200px;width: 30%;}
	.logo{
		width: 100%;
		margin-top:50px;margin-bottom: 30px;
	}
	.bg-img-bottom{
		width: 100%;max-height: 40%;max-width: 500px;
		display: block;margin: 0 auto;
	}
	.content{
		text-align: center;font-size: 30px;color: #ff6b09;
		position: relative;z-index: 100;
	}
	.content .info{font-size: 25px;color: #000;font-weight: bolder;}
	.submit-btn{
		font-size: 30px;
		width: 80%;margin: 0 auto;padding: 10px;margin-top: 100px;max-width: 400px;
		background: #ff5f04;
		color: #fff;
	}
	/*success*/
	.success{margin:0 auto;margin-top: 200px;}
	</style>
</head>
<body>
	<div class="logo-container">
		<img src="/static/logo-cqc.png" class="logo">
	</div>
	<!-- 领取 -->
    %if result == 0:
	<div class="content">

		<div class="info">
			<p>本页面用于领取观摩票使用</p>
			<p>仅限领取一次，非工作人员请勿点击</p>
		    <a id="btn" class="submit-btn">点击领取</a>
		</div>
	</div>
	<div class="bottom">
		<img src="/static/hust.png" class="bg-img-bottom">
	</div>
 	%elif result == 1:
    <div class="content">
		<div class="success">
			<img src="/static/ok.png" class="btn">
			<p>已领取</p>
		</div>
	</div>
    %elif result == -1:
       <p>您的ID值有误</p>
    %endif


</body>
  <script src="/static/bootstrapv32/js/jquery-2.1.1.min.js"></script>
  <script src="/static/bootstrapv32/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $("#btn").click(function(){
		$.post(document.URL+"/click",function(result){
            if(result.result == 1){
                location.reload();
            }else if(result.result == 0){
                alert("您已经领取过了");
            }else if(result.result ==-1){
                alert("操作错误");
            }
        });
    });
  </script>
</html>