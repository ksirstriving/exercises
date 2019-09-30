<?php

use GuzzleHttp\Client;

/**
 * @File: SendMailByAliyunApi.php
 * @User: likai
 * @Date: 2019-09-30
 * @Time: 14:43
 * @Brief: 示例调用阿里云api发送邮件，使用了GuzzleHttp库
 */
class Aliyun_Mail
{
    private $accessKey = null;
    private $client = null;
    private $default_params = [];

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://dm.aliyuncs.com',
            'timeout'  => 5.0,
        ]);
        $this->accessKey = [
            'key'    => 'key',
            'secret' => 'secret',
        ];
        $this->default_params = $this->_getDefault();
    }

    public function send($subject, $content, $toMails)
    {
        $result = false;
        $toMails = is_array($toMails) ? implode(',', $toMails) : $toMails;
        $params = [
            'Action'         => 'SingleSendMail', // 单一发信接口
            'AccountName'    => 'test@example.com', // 发信地址
            'ReplyToAddress' => 'true', // 是否使用回信地址，需自行在阿里云管理控制台配置
            'AddressType'    => 1, // 0随机账号 1发信地址
            'ToAddress'      => $toMails, // 收信地址，逗号分隔，最多100
            'FromAlias'      => '', // 设置发信人昵称
            'Subject'        => $subject, // 邮件主题
            'TextBody'       => $content, // 邮件内容文本格式，如果内容是
            'ClickTrace'     => 0, // 数据追踪 1打开 0关闭
        ];

        $params = array_merge($this->default_params, $params);
        ksort($params);
        $signature = $this->_getSign($params, 'POST');
        $params['Signature'] = $signature;
        $res = $this->client->request('post', '', ['form_params' => $params]);
        $resCode = $res->getStatusCode();

        if (intval($resCode) >= 200 && intval($resCode) < 300) {
            $result = true;
        }

        return $result;
    }

    private function _getDefault()
    {
        return [
            'Format'           => 'JSON', // 接口返回格式 JSON/XML
            'Version'          => '2015-11-23', // 版本号
            'AccessKeyId'      => $this->accessKey['key'],
            'SignatureMethod'  => 'HMAC-SHA1', // 加密方法
            'Timestamp'        => gmdate('Y-m-d\TH:i:s\Z'), // 时间戳
            'SignatureVersion' => '1.0', // 签名算法版本
            'SignatureNonce'   => md5(uniqid()), // 生成唯一值
            'RegionId'         => 'cn-hangzhou', // 机房
        ];
    }

    private function _getSign($params, $httpMethod = 'POST')
    {
        $httpMethod = strtoupper($httpMethod) === 'POST' ? 'POST' : 'GET';
        ksort($params);
        $queryString = '';
        foreach ($params as $k => $v) {
            $queryString .= $this->_percentEncode($k) . '=' . $this->_percentEncode($v) . '&';
        }
        $queryString = substr($queryString, 0, -1);

        $stringToSign = $httpMethod . '&%2F&' . $this->_percentEncode($queryString);
        return $this->_encryptToKey($stringToSign);
    }

    private function _encryptToKey($stringToSign)
    {
        return base64_encode(hash_hmac('sha1', $stringToSign, $this->accessKey['access_key_secret'] . '&', true));
    }

    private function _percentEncode($str)
    {
        $res = urlencode($str);
        $res = preg_replace('/\+/', '%20', $res);
        $res = preg_replace('/\*/', '%2A', $res);
        $res = preg_replace('/%7E/', '~', $res);
        return $res;
    }
}

// 示例
$mail = new Aliyun_Mail();
$subject = '标题';
$content = '邮件内容';
$toMails = 'toMail@example.com';
$mail->send($subject, $content, $toMails);