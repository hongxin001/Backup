<?php

$access_token = "xGSzRoOb79Prs83e6zkC6Y3eS52IHbvJ2KxG_dvy9MpBuAeiIMPX9sJ8FkR-blm7pfGz5r6EHEwTOx0uzCizzQ";

$jsonmenu = '{
      "button":[
      {
            "name":"权益卫士",
           "sub_button":[
            {
               "type":"click",
               "name":"权益投诉",
               "key":"天气北京"
            },
            {
               "type":"click",
               "name":"权益调研",
               "key":"天气上海"
            },
            {
               "type":"click",
               "name":"疑难解答",
               "key":"天气广州"
            }]
      

       },
       {
           "name":"心灵之约",
           "sub_button":[
            {
               "type":"click",
               "name":"公司简介",
               "key":"company"
            },
            {
               "type":"click",
               "name":"趣味游戏",
               "key":"游戏"
            },
            {
                "type":"click",
                "name":"讲个笑话",
                "key":"笑话"
            }]
       

       }]
 }';


$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
$result = https_request($url, $jsonmenu);
var_dump($result);

function https_request($url,$data = null){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}

?>