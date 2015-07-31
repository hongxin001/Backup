<!doctype html>
<html lang="en">
<%
    import requests
    %>
<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/static/bootstrapv32/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="/static/bootstrapv32//css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="/static/bootstrapv32//js/bootstrap.min.js"></script>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
    %if result == 0:
        <a class="btn btn-default" id="btn">点击</a>
    %else :
       <h1>${result}</h1>
       <img src="${request.static_url('hsqrsite:static/error.png')}" />
    %endif

</body>
<script src="/static/bootstrapv32/js/jquery-2.1.1.min.js"></script>
<script src="/static/bootstrapv32/js/bootstrap.min.js"></script>
<script>
	$("#btn").click(function(){
		$.post(document.URL+"/click",function(result){
            if(result.result == 1){
                alert("领取成功！！");
                location.reload();
            }else if(result.result == 0){
                alert("您已经领取过了");
            }
  });
});
</script>
</html>