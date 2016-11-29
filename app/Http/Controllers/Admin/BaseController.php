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

    public function   resource_upload($filename){
    

        // 需要填写你的 Access Key 和 Secret Key
        $accessKey = '0YOjnH4CxOwyWQb0n7dZao4-CCaMzXGW-HIMwyIU';
        $secretKey = 'UnAjVhHo2s-fqwugKW3jM4GzLTtWOuX0Cvsz4sog';

        // 构建鉴权对象
        $auth = new Auth($this->accessKey, $this->secretKey);
        // 要上传的空间
        
        // 生成上传 Token
        $token = $auth->uploadToken($this->bucket);


        // 要上传文件的本地路径
        $filePath = "upload/".$filename;



        // 上传到七牛后保存的文件名
        $key = $filename;

        // 初始化 UploadManager 对象并进行文件的上传。
        $uploadMgr = new UploadManager();

        // 调用 UploadManager 的 putFile 方法进行文件的上传。
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);


        if ($err !== null) {
            return response()
            ->json([
                "jsonrpc" => "2.0",
                "filename" => $filename,
                "id"   => "id"
            ]);
        } else {
            return response()
            ->json([
                "jsonrpc" => "2.0",
                "filename" => $filename,
                "id"   => "id"
            ]);
        }

    }


    public  function  fileUploader(){



        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");


        // Support CORS
        // header("Access-Control-Allow-Origin: *");
        // other CORS headers if any...
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit; // finish preflight CORS requests here
        }


        if ( !empty($_REQUEST[ 'debug' ]) ) {
            $random = rand(0, intval($_REQUEST[ 'debug' ]) );
            if ( $random === 0 ) {
                header("HTTP/1.0 500 Internal Server Error");
                exit;
            }
        }

        // header("HTTP/1.0 500 Internal Server Error");
        // exit;


        // 5 minutes execution time
        @set_time_limit(5 * 60);

        // Uncomment this one to fake upload time
        // usleep(5000);

        // Settings
        // $targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
        $targetDir = 'upload_tmp';
        $uploadDir = 'upload';

        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds


        // Create target dir
        if (!file_exists($targetDir)) {
            @mkdir($targetDir);
        }

        // Create target dir
        if (!file_exists($uploadDir)) {
            @mkdir($uploadDir);
        }

        // Get a file name
        if (isset($_REQUEST["name"])) {
            $fileName = uniqid("file_").strrchr($_REQUEST['name'], ".");
        } elseif (!empty($_FILES)) {
            $fileName = uniqid("file_").strrchr($_REQUEST['name'], ".");
        } else {
            $fileName = uniqid("file_").strrchr($_REQUEST['name'], ".");
        }

        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
        $uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;

        // Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;


        // Remove old temp files
        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }

            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
                    continue;
                }

                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }


        // Open temp file
        if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }

        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }

        @fclose($out);
        @fclose($in);

        rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

        $index = 0;
        $done = true;
        for( $index = 0; $index < $chunks; $index++ ) {
            if ( !file_exists("{$filePath}_{$index}.part") ) {
                $done = false;
                break;
            }
        }
        if ( $done ) {
            if (!$out = @fopen($uploadPath, "wb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }

            if ( flock($out, LOCK_EX) ) {
                for( $index = 0; $index < $chunks; $index++ ) {
                    if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                        break;
                    }

                    while ($buff = fread($in, 4096)) {
                        fwrite($out, $buff);
                    }

                    @fclose($in);
                    @unlink("{$filePath}_{$index}.part");
                }

                flock($out, LOCK_UN);
            }
            @fclose($out);
        }

        // Return Success JSON-RPC response
        
        return $this -> resource_upload($fileName);

        die(json_encode($return));
    }
}
