<?php

namespace Lorine\OssUtils\Upload\Tencent;



use Lorine\OssUtils\Upload\ICloud;
use Qcloud\Cos\Client;

class Tencent implements ICloud
{
    public function uploadFile($config, $tmpName, $fileName)
    {
        // TODO: Implement uploadFile() method.

        try {
            $cosClient = new Client(
                array(
                    'region' => $config['region'],
                    'schema' => 'https', //协议头部，默认为http
                    'credentials' => array(
                        'secretId' => $config['ak'],
                        'secretKey' => $config['sk'])));

            $cosClient->Upload(
                $bucket = $config['bucket'],
                $key = $fileName,
                $body = fopen($tmpName, 'rb'));
            $data = ['code'=>0,'msg'=>'success','data'=>$fileName];
        }catch (\Exception $e){
            $data = ['code'=>1,'msg'=>'error','data'=>['result' => $e->getMessage()]];
        }
        return json_encode($data);
    }
}
