<?php

    $WeChat = new WeChat();

    /*
     * 微信接收类
     * author : rch
     * @param $_GET
     * */
    class WeChat {
        // private const SECRET = '2b1f370602c6aaedd1b85ad16fbf227c';

        public function __construct()
        {
            $this->checkSignature();
        }

        /*
         * 处理signature
         * */
        private function checkSignature()
        {
            //获得参数 signature nonce token timestamp echostr
            $nonce     = $_GET['nonce'];
            $token     = 'xiaozhuxiong';
            $timestamp = $_GET['timestamp'];
            $echostr   = $_GET['echostr'];
            $signature = $_GET['signature'];
            //形成数组，然后按字典序排序
            $array = array();
            $array = array($nonce, $timestamp, $token);
            sort($array);
            //拼接成字符串,sha1加密 ，然后与signature进行校验
            $str = sha1( implode( $array ) );
            if( $str == $signature && $echostr ){
                //第一次接入weixin api接口的时候
                ob_clean();
                echo  $echostr;
                exit;
            } else {
                echo '参数错误';
            }
        }
    }