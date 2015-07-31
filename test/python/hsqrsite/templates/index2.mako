<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <title>时刻APP</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/static/bootstrapv32/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="/static/bootstrapv32//css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="/static/bootstrapv32//js/bootstrap.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
  <meta name="keywords" content="时刻APP 时刻" />
  <meta name="description" content="时刻APP 时刻" />
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
  <meta content="yes" name="apple-mobile-web-app-capable" />
  <meta content="black" name="apple-mobile-web-app-status-bar-style" />
  <meta content="telephone=no" name="format-detection" />
  <style type="text/css">
  body{
    font-family: "微软雅黑","黑体";
  }
  header{width: 100%;margin:10% auto;}
    .logo{
      width: 80%;margin-left: 10%;
    }
  .content{text-align: center;}
  .default-content{
    color: #ff684d;
    margin-top:20%;
  }
  a.btn{
    text-decoration: none;
    color: #fff;
    background: #4eb2f6;
    display: block;margin:0 auto;
    font-size: 1.6em;
    width: 12em;height: 2.4em;line-height: 2.4em;
    max-width: 80%;
    margin-top: 50%;
  }

  .success-content{
    margin-top: 20%;
    color: #4eb2f6;
    font-size: 1.8em;
    font-weight: bold;
  }
  .success-content p{margin-top: 0;}
  .btn-successed{
    width: 30%;
  }
  </style>
</head>
<body>
  <header>
    <img src="/static/logo.png" class="logo">
  </header>
  <section class="content">
    %if result == 0:
        <section class="default-content">
            <p>本页面用于领取入场券使用</p>
            <p>仅限领取一次，非工作人员请勿点击</p>
            <a class="btn btn-default" id="btn">点击领取</a>
        </section>
    %elif result == 1:
        <section class="success-content">
            <img src="/static/ok.png" class="btn-successed">
            <p>已领取</p>
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
                alert("领取成功！！");
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