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
        try {
            $bucket = $config['bucket'];
            $auth = new Auth($config['ak'],$config['sk']);

            $token = $auth->uploadToken($bucket);
            $uploadMgr = new UploadManager();
            $res = $uploadMgr->putFile($token,$fileName,$tmpName);
            if($res[1]==null){
                $data = ['code'=>0,'msg'=>'success','data'=>$res[0]['key']];
            }else{
                $data = ['code'=>1,'msg'=>'error','data'=>$res[1]];
            }
        }catch (\Exception $e){
            $data = ['code'=>1,'msg'=>'error','data'=>['result' => $e->getMessage()]];
        }
        return json_encode($data);
    }
}
