<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <title>时刻APP</title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
  <meta name="keywords" content="时刻APP 时刻" />
  <meta name="description" content="时刻APP 时刻" />
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
  <meta content="yes" name="apple-mobile-web-app-capable" />
  <meta content="black" name="apple-mobile-web-app-status-bar-style" />
  <meta content="telephone=no" name="format-detection" />
  <style type="text/css">
  html{
    background:#fff url(/static/bg.png) no-repeat;
    background-size: 100% 100%;
  }
  html,body{
    font-family: "微软雅黑","黑体";
    margin: 0;padding: 0;border:0;
    width: 100%;height: 100%;
  }
  p,a{margin: 0;}
  .logo{
    height: 6em;
    padding: 1em;
    margin: 0 auto;
    display: block;
  }
  .content{
    text-align: center;
    position: relative;
    height: 100%;margin-top: -8em;
  }
  .default-content {
    color: #000;
    font-family: "黑体";
    height: 100%;
  }
  .default-content .info{
      padding-top: 10em;
      font-family: "黑体";
      font-size:1.2em;
      line-height:2em;
  }
  a.btn{
    text-decoration: none;
    color: #fff;
    background: #ff5f04;
    opacity: 1;
    display: block;margin:0 auto;
    font-size: 1.4em;
    min-width: 12em;width: 90%;height: 2em;line-height: 2em;
    margin-top: 1em;
  }
  .bg2{
    width: 100%;position: absolute;bottom: 0em;left: 0;
    z-index: -1;
  }
  /*clicked*/
  .success-content{
    color: #4eb2f6;
    font-size: 1.8em;
    font-weight: bold;
    height: 100%;
  }
  .success-content .info{
    position: absolute;width: 100%;bottom: 10%;
  }
  .btn-ok{width: 30%;padding-top: 50%;}
  </style>
</head>
<body>
  <header>
    <img src="/static/logo.png" class="logo"/>
  </header>
  <section class="content">
    %if result == 0:
        <section class="default-content">
            <section class="info">
                <p>本页面用于领取观摩票使用<br/>仅限领取一次，非工作人员请勿点击</p>
            </section>
            <a class="btn" id="btn">点击领取</a>
        </section>
        <img src="/static/bg2.png" class="bg2">
    %elif result == 1:
        <section class="success-content">
            <section class="info">
                <img src="/static/ok.png" class="btn-ok">
                <p>已领取</p>
            </section>
        </section>
    %elif result == -1:
        <section class="error-content">
            <p>您的ID值有误</p>
        </section>
    %endif
  </section>
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
</body>
</html>