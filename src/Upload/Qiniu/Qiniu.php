<?php

namespace Lorine\OssUtils\Upload\Qiniu;


use Lorine\OssUtils\Upload\ICloud;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class Qiniu implements ICloud
{

    public function uploadFile($config,$file,$fileName)
    {
        // TODO: Implement uploadFile() method.
        $filePath = $file->getPathname();
        $bucket = $config['bucket'];
        $auth = new Auth($config['ak'],$config['sk']);
        $token = $auth->uploadToken($bucket);
        $uploadMgr = new UploadManager();
        $res = $uploadMgr->putFile($token,$fileName,$filePath);
        return $res;
    }
}
