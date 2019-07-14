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
            $echostr = $input['echostr'];

            unset($input['sigature'], $input['echostr']);

            $input['token'] = self::TOKEN;

            // 字典序排序
            $tmpStr = implode($input);
            $tmpStr = sha1($tmpStr);

            if ($tmpStr === $sigature) {
                return $echostr;
            } else {
                return '';
            }
        }
    }