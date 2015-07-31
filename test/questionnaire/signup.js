function signup()
{
    var ajax;
    if (window.XMLHttpRequest)
    {
        ajax=new XMLHttpRequest();
    }
    else
    {
        ajax=new ActiveXObject("Microsoft.XMLHTTP");
    }
    

    
    
    
    var t1="";
    var obj = document.getElementsByName("t1");
    for(var i = 0;i < obj.length; i ++){
        if(obj[i].checked){
            t1 = obj[i].value;
        }
    }
    
    
    var t2="";
    obj = document.getElementsByName("t2");
    for(var i = 0;i < obj.length; i ++){
        if(obj[i].checked){
            t2 =t2 + ","+ obj[i].value;
        }
    }
    
    
    var t3="";
    obj = document.getElementsByName("t3");
    for(var i = 0;i < obj.length; i ++){
        if(obj[i].checked){
            t3 = t3 + ","+ obj[i].value;
        }
    }
    
    var t4="";
    obj = document.getElementsByName("t4");
    for(var i = 0;i < obj.length; i ++){
        if(obj[i].checked){
            t4 =t4 + ","+ obj[i].value ;
        }
    }
    
    var t5="";
    obj = document.getElementsByName("t5");
     for(var i = 0;i < obj.length; i ++){
        if(obj[i].checked){
            t5 = obj[i].value;
        }
    }
    
    var t6="";
    obj = document.getElementsByName("t6");
     for(var i = 0;i < obj.length; i ++){
        if(obj[i].checked){
            t6 = obj[i].value;
        }
    }
    
    var t7="";
    obj = document.getElementsByName("t7");
     for(var i = 0;i < obj.length; i ++){
        if(obj[i].checked){
            t7 = obj[i].value;
        }
    }
    
    var t8="";
    obj = document.getElementsByName("t8");
     for(var i = 0;i < obj.length; i ++){
        if(obj[i].checked){
            t8 = obj[i].value;
        }
    }
    
    var t9="";
    obj = document.getElementsByName("t9");
     for(var i = 0;i < obj.length; i ++){
        if(obj[i].checked){
            t9 = obj[i].value;
        }
    }
    
    var t10="";
    obj = document.getElementsByName("t10");
     for(var i = 0;i < obj.length; i ++){
        if(obj[i].checked){
            t10 = obj[i].value;
        }
    }
    
    ajax.open("post","./signup.php",false);
    ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    ajax.send("name="+document.getElementById("name").value+"&grade="+document.getElementById("major").value+document.getElementById("class").value+
    "&phone="+document.getElementById("tel").value+
    "&t1="+t1+
    "&t2="+t2+
    "&t3="+t3+
    "&t4="+t4+
    "&t5="+t5+
    "&t6="+t6+
    "&t7="+t7+
    "&t8="+t8+
    "&t9="+t9+
    "&t10="+t10
    );
    if(ajax.responseText==1)
    alert("提交成功");
    else alert("没能成功发送，出了问题");
    
  
}