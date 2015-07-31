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

    /*public function simsimHttp($keyword)
    {
            $url='http://www.simsimi.com/func/req?msg='.$keyword.'lc=ch';
            $f=new SaeFetchurl();
            $output=$f->fetch($url);
            $message=json_decode($output,true);
            return $message['response']
    }*/

    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $type=$postObj->MsgType;
            $time = time();
           
            if($type=="text"){
              /*  $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <FuncFlag>0</FuncFlag>
                        </xml>";
                $keyword = trim($postObj->Content);
                if($keyword != "")
                {
                    $msgType = "text";
                    $contentStr = "you said".$keyword;
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;
                }
            }
            else if($type=="image"){*/
                    $textTpl = "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <ArticleCount>1</ArticleCount>
                                <Articles>
                                <item>
                                        <Title><![CDATA[[TEST]]></Title>
                                        <Description><![CDATA[这只是一个测试而已]]>
                                        </Description>
                                        <PicUrl><![CDATA[%s]]></PicUrl>
                                        <Url><![CDATA[http://test.hustascii.com/yh/jqmtest.html]]></Url>
                                </item>
                                </Articles>
                                <FuncFlag>0</FuncFlag>
                                </xml>";
                    $msgType = "news";
                    $contentStr = "http://test.hustascii.com/weixintest/test.jpg";
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;
            }
        }else{
            echo "";
            exit;
        }
    }
}
?>

