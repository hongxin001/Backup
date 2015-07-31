<?php
/*
    方倍工作室 http://www.cnblogs.com/txw1958/
    CopyRight 2013 www.doucube.com  All Rights Reserved
*/

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
                $keyword = trim($postObj->Content);
                $textTpl = "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <ArticleCount>1</ArticleCount>
                                <Articles>
                                <item>
                                        <Title><![CDATA[%s]]></Title>
                                        <Description><![CDATA[%s]]>
                                        </Description>
                                        <PicUrl><![CDATA[%s]]></PicUrl>
                                        <Url><![CDATA[%s]]></Url>
                                </item>
                                </Articles>
                                <FuncFlag>0</FuncFlag>
                                </xml>";
                $textTpl2 = "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Content><![CDATA[%s]]></Content>
                                <FuncFlag>0</FuncFlag>
                                </xml>";
                if($keyword == "报名"){
                        $msgType = "news";
                        $title = "“极客周末-华科挑战赛”报名表格";
                        $des = "请认真填写报名信息，信息有误可能会导致您无法参赛";
                        $picUrl ="http://test.hustascii.com/weixintest/haibao.png";
                        $contentStr = "http://test.hustascii.com/some/baoming/baoming.html";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $title, $des, $picUrl, $contentStr);
                        echo $resultStr;
                }
                else if($keyword=="日程"){
                        //$msgType = "text";
                        $msgType = "news";
                        $title = "ASCII联合工作室日程";
                        $des = "点击这里查看日程";
                        $picUrl = "http://test.hustascii.com/weixintest/shike.jpg";
                        //$contentStr = '<a href="http://api.shike.im/share/event_list?userid=54192e53fbe78e269b14f7fb">点此查看日程</a>';
                        $contentStr = "http://api.shike.im/share/event_list?userid=54192e53fbe78e269b14f7fb";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $title, $des, $picUrl, $contentStr);
                        echo $resultStr;
				}
				else if($keyword=="我有点子"){
                        //$msgType = "text";
                        $msgType = "news";
                        $title = "说出你的创意";
                        $des = "说出你的创意，惊喜大奖等你拿";
                        $picUrl = "http://test.hustascii.com/weixintest/haibao.png";
                        //$contentStr = '<a href="http://api.shike.im/share/event_list?userid=54192e53fbe78e269b14f7fb">点此查看日程</a>';
                        $contentStr = "http://test.hustascii.com/some/baoming/idea.html";
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $title, $des, $picUrl, $contentStr);
                        echo $resultStr;
                }
				else if($keyword=="赛事详情"){
					$msgType = "news";
                    $title = "“极客周末-华科挑战赛”比赛说明";
                    $des = "一、大赛简介“极客周末-华科挑战赛”是一项类Hackthon的比赛活动，汇聚技术、创意、Geek精神并让他们";
                    $picUrl = "http://test.hustascii.com/weixintest/haibao.png";
                    $contentStr = "http://mp.weixin.qq.com/s?__biz=MjM5NDU4MzEzOQ==&mid=206226699&idx=1&sn=0f7c419a6f808056059d11511c8db348#rd";
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $title, $des, $picUrl, $contentStr);
                    echo $resultStr;
				}
				else if($keyword=="帮助"){
					$msgType = "text";
                    $contentStr = "“极客周末-华科挑战赛”正在紧张筹办中，回复以下关键词可获得相应信息：
【赛事详情】获取比赛相关介绍；
【报名】参与比赛报名；
【我有点子】进入创意通道；
准备好了吗？Let’t Go!!";
                    $resultStr = sprintf($textTpl2, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;
				}
            }
            else{
                    if($type=="event"){
                            $textTpl = "<xml>
                                        <ToUserName><![CDATA[%s]]></ToUserName>
                                        <FromUserName><![CDATA[%s]]></FromUserName>
                                        <CreateTime>%s</CreateTime>
                                        <MsgType><![CDATA[%s]]></MsgType>
                                        <Content><![CDATA[%s]]></Content>
                                        <FuncFlag>0</FuncFlag>
                                        </xml>";
                            switch ($postObj->Event)
                            {
                            case "subscribe":
                                    $msgType = "text";
                                    $contentStr = "你好，感谢关注【ASCII联合工作室】官方微信！
“极客周末-华科挑战赛”正在紧张筹办中，回复以下关键词可获得相应信息：
【帮助】获取关键词回复信息；
【赛事详情】获取比赛相关介绍；
【报名】参与比赛报名；
【我有点子】进入创意通道；
准备好了吗？Let’t Go!!";
                                break;
                            }
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            echo $resultStr;
                            
                    }
            }
        }else{
            echo "";
            exit;
        }
    }
}
?>
