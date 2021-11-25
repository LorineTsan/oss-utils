<?php

namespace Lorine\OssUtils\Upload\Tencent;



use Lorine\OssUtils\Upload\ICloud;
use Qcloud\Cos\Client;

class Tencent implements ICloud
{
    public function uploadFile($config, $file, $fileName)
    {
        // TODO: Implement uploadFile() method.
        $cosClient = new Client(
            array(
                'region' => $config['region'],
                'schema' => 'https', //协议头部，默认为http
                'credentials' => array(
                    'secretId' => $config['ak'],
                    'secretKey' => $config['sk'])));
        $res = $cosClient->Upload(
                $bucket = $config['bucket'],
                $key = $fileName,
                $body = fopen($file, 'rb'));

        return $res;
    }
}
