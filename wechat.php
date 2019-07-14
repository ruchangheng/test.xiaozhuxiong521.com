<?php

    $WeChat = new WeChat();

    /*
     * 微信接收类
     * author : rch
     * @param $_GET
     * */
    class WeChat {
        // token
        const TOKEN = 'weixin';
        const SECRET = '2b1f370602c6aaedd1b85ad16fbf227c';

        public function __construct()
        {
            echo $this->checkSignature();
        }

        /*
         * 处理signature
         * */
        private function checkSignature()
        {
            $input = $_GET;
            $sigature = $input['sigature'];
            $timestamp = $input['timestamp'];
            $nonce = $input['nonce'];
            $echostr = $input['echostr'];

            $tmpArr = array(self::TOKEN, $timestamp, $nonce);
            // 字典序排序
            sort($arr, SORT_STRING);
            $tmpStr = implode( $tmpArr );
            $tmpStr = sha1( $tmpStr );

            if ($tmpStr === $sigature) {
                return $echostr;
            } else {
                return '';
            }
        }
    }