<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
   <title>极客周末参赛信息管理系统</title>
   <meta charset="utf-8">     

   
   <!-- bootstrap配置 -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script type="text/javascript" src="./js/jquery.js"></script>

      
</head>
<body>

      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand">极客周末参赛信息管理系统</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="teams.php">报名信息</a></li>
            <li><a href="ideas.php">创意通道</a></li>
          </ul>
        </div>
      </div>
    </div>

      <div class="main">
        <div class="messagediv">
          <table class="table-style" cellpadding="0" cellspacing="0" border="1">
            <tr class="tr-style">
              <td class="p10">队长姓名</td>
              <td class="p20">队长电话</td>
              <td class="p10">队员1姓名</td>
              <td class="p10">队员2姓名</td>
              <td class="p35">备注</td>
              <td class="p15">操作</td>       
            </tr>
            
            <!-- ArrayList<Student> mylist=new ArrayList<Student>();
            mylist=Student.findMore("ALL", "ALL");
            for(int i = 0; i <mylist.size(); i++ ){int ss=i;
              Student stu=mylist.get(i); -->

              <!-- 在这里循环输入数据库内的各信息数据 -->
              <?php
                  require_once "../conn.php";
                  $sql = "select * from team";
                  $res = mysql_query($sql);
                  $count = 0;
                  while($row = mysql_fetch_array($res)){
              ?>
                <tr class="">
                  <td class="td-overhide"><?php echo $row['name_cap']?></td>
                  <td class="td-overhide"><?php echo $row['phone_cap']?></td>
                  <td class="td-overhide"><?php echo $row['name_one']?></td>
                  <td class="td-overhide"><?php echo $row['name_two']?></td>
                  <td class="remarks td-overhide" style="white-space: nowrap;overflow: hidden;" onclick="changetext(this)"><?php echo $row['info']?></td> 

                  <td>
                    <ul class="ul-button">
                      <li><a class="btn btn-danger" href="op.php?from=2&way=1&id=<?php echo $row['Id']?>" role="button">删除</a></li>
                  <li><a class="btn btn-success" href="op.php?from=2&way=2&id=<?php echo $row['Id']?>" role="button">通过</a></li>
                    </ul>
                  </td>
                </tr>
              <?php
                ++$count;
              }
            ?>

            <!-- 这里的<b>30</b>可以存放数据库中信息的长度 -->
            <tr>参赛队伍：<span style="font-size:16px;color:red;"><b><?php echo $count?></b> </span> 队，具体信息如下表</tr>
             <!-- mylist.clear(); --> 
           </table>
         </div>
       </div>
   </div>

 
  <script type="text/javascript"> 
$(document).scroll(function(){
    var offset = $(document).scrollTop();
    if (offset >= 500){
        $('#goto-top').css('display','inherit');
    }else{
        $('#goto-top').css('display','none');
    }
})


function changetext(id)
{
  if(id.style.overflow=="hidden"){
    id.style="overflow: visible; white-space: normal;";
  }
  else{
    id.style="overflow: hidden; white-space: nowrap;";
  }

}


</script>
</body>
</html>