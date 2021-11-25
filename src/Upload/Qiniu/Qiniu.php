<?php

namespace Lorine\OssUtils\Upload\Qiniu;

use App\Http\Oss\Upload\ICloud;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class Qiniu implements ICloud
{

    public function uploadFile($file,$fileName)
    {
        // TODO: Implement uploadFile() method.
        $filePath = $file->getPathname();
        $bucket = config('oss.qiniu.bucket');
        $auth = new Auth(config('oss.qiniu.ak'),config('oss.qiniu.sk'));
        $token = $auth->uploadToken($bucket);
        $uploadMgr = new UploadManager();
        try {
            $uploadMgr->putFile($token,$fileName,$filePath);
        }catch (\Exception $e){
            return false;
        }
        return true;

    }
}
