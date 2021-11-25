# 简介（oss-tools）

一个集腾讯云、七牛云对象存储的工具类

An SDK integrating Tencent cloud and qiniu cloud object storage

## 安装（Installation）

```php
composer require lorine/oss-utils
```

## 示例（example）

```php
use Lorine\OssUtils\OssService;


     $config = [
            'ak' => 'xxxxxx',//SecretId /Access_Key
            'sk' => 'xxxxxx',//SecretKe /Secret_Key
            'bucket' => 'xxxxx',//桶名
            'region' => ''//地区 七牛云为''，腾讯云在控制台对象存储界面获取，如上海（ap-shanghai）
        ];
    
    try {
            //云存储类型 腾讯云：Tencent  七牛云：Qiniu
            $obj = (new OssService())->getOssService('Tencent');
            //$file为带有文件临时路径、大小及文件名的数组
            //$fileName自定义云储存的文件名称
            $res = $obj->uploadFile($config,$file,$fileName);
            dd($res);
        }catch (Exception $exception){
            dd($exception->getMessage());
        }
```

## 报错参考（Error reporting）

CURL传报错：cURL error 60: SSL certificate problem: self signed certificate in certificate chain

https://jingyan.baidu.com/article/14bd256e1fd7dffb6c26122b.html