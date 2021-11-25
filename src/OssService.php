<?php

namespace Lorine\OssUtils;


use Lorine\OssUtils\Exception\ErrorService;
use Lorine\OssUtils\Upload\Aliyun\Aliyun;
use Lorine\OssUtils\Upload\Qiniu\Qiniu;
use Lorine\OssUtils\Upload\Tencent\Tencent;

class OssService
{
    public function getOssService($type)
    {
        $obj = null;
        switch ($type){
            case 'Aliyun':
              $obj =  new Aliyun();
              break;
            case 'Tencent':
                $obj = new Tencent();
                break;
            case 'Qiniu':
                $obj = new Qiniu();
                break;
            default:
                throw new ErrorService();
        }
        return $obj;
    }
}
