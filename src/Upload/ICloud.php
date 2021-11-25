<?php

namespace Lorine\OssUtils\Upload;

interface ICloud
{
    public function uploadFile($config,$tmpName,$fileName);

}
