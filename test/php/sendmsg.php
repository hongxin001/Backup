
<?php
function sendmsg($msg,$phone){
ob_start();
$post_data = array();
$url='http://web.cr6868.com/asmx/smsservice.aspx?name=18627105544&pwd=1216B8CF79FB34846C458E062840&content='.$msg.'&mobile='.$phone.'&type=pt&sign=56货物网';  
$o="";  
foreach ($post_data as $k=>$v)  
{  
    $o.= "$k=".urlencode($v)."&";  
}  
$post_data=substr($o,0,-1);  
$ch = curl_init();  
curl_setopt($ch, CURLOPT_POST, 1);  
curl_setopt($ch, CURLOPT_HEADER, 0);  
curl_setopt($ch, CURLOPT_URL,$url);  
//为了支持cookie  
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');  
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER , 0);
$result = curl_exec($ch);  

}
?>