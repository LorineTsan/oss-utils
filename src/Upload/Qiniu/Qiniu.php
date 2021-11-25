<?php

namespace Lorine\OssUtils\Upload\Qiniu;


use Lorine\OssUtils\Upload\ICloud;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class Qiniu implements ICloud
{

    public function uploadFile($config,$tmpName,$fileName)
    {
        // TODO: Implement uploadFile() method.
        $bucket = $config['bucket'];
        $auth = new Auth($config['ak'],$config['sk']);
        $token = $auth->uploadToken($bucket);
        $uploadMgr = new UploadManager();
        $res = $uploadMgr->putFile($token,$fileName,$tmpName);
        return $res;
    }
}
