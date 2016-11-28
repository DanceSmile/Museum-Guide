<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Qiniu\Storage\UploadManager;
use Qiniu\Auth;

class BaseController extends Controller
{   
    public $accessKey = '0YOjnH4CxOwyWQb0n7dZao4-CCaMzXGW-HIMwyIU';
    public $secretKey = 'UnAjVhHo2s-fqwugKW3jM4GzLTtWOuX0Cvsz4sog';
    public $bucket = 'blog';
    public function __construct(){

      
    }

    public function   resource_upload(){
    

        // 需要填写你的 Access Key 和 Secret Key
        $accessKey = '0YOjnH4CxOwyWQb0n7dZao4-CCaMzXGW-HIMwyIU';
        $secretKey = 'UnAjVhHo2s-fqwugKW3jM4GzLTtWOuX0Cvsz4sog';

        // 构建鉴权对象
        $auth = new Auth($this->accessKey, $this->secretKey);
        // 要上传的空间
        
        // 生成上传 Token
        $token = $auth->uploadToken($this->bucket);


        // 要上传文件的本地路径
        $filePath = "$path";



        // 上传到七牛后保存的文件名
        $key = 'text.png';

        // 初始化 UploadManager 对象并进行文件的上传。
        $uploadMgr = new UploadManager();

        // 调用 UploadManager 的 putFile 方法进行文件的上传。
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
        echo "\n====> putFile result: \n";
        if ($err !== null) {
            p($err);
        } else {
            p($ret);
        }

    }
}
