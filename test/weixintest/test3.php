<?php


define("TOKEN", "weixin");
$wechatObj = new wechatCallbackapiTest();
if (isset($_GET['echostr'])) {
    $wechatObj->valid();
}else{
    $wechatObj->responseMsg();
}

class wechatCallbackapiTest
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

   function SimSimi($keyword) {

    //----------- 获取COOKIE ----------//

   

    $url = 'simsimi/';

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_HEADER,1);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

    $content = curl_exec($ch);

    list($header, $body) = explode("

", $content);

    preg_match("/set-cookie:([^
]*);/iU", $header, $matches);

    $cookie = $matches[1];

    curl_close($ch);

    //----------- 抓 取 回 复 ----------//

    

   

    $url = "wei43net";

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_REFERER, "http://www.simsimi.com/talk.htm?lc=ch");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

    curl_setopt($ch, CURLOPT_COOKIE, $cookie);

    $content = json_decode(curl_exec($ch),1);

    curl_close($ch);

    if($content['result']=='100') {

        $content['response'];

        return $content['response'];

    } else {

        return '我还不会回答这个问题...';

   

    }

}

    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
          	$type=trim($postObj->MsgType);
            $time = time();
            $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <FuncFlag>0</FuncFlag>
                        </xml>";
            	if($keyword!="1")
	            {                  
                
                    $contentStr = simsimHttp($keyword);
                    $msgType = "text";
                    $contentStr = "http://test.hustascii.com/yh/luker/";
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;
                }
                else{
                        echo "Input something...";
                }
        }   
        else{
            echo "";
            exit;
        }
    }
}
?>

