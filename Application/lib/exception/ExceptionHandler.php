<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25
 * Time: 9:03
 */

namespace app\lib\exception;

use Exception;
use think\exception\Handle;
use think\Log;
use think\Request;

class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;
    // 需要返回客户端当前请求的URL路径

    public function render(\Exception $e)
    {
        if ($e instanceof BaseException){
            // 如果是自定义的异常
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        }else{
            // 是否开启调试模式
            if(config('app_debug')){
                // 返回TP默认异常页面
                return parent::render($e);
            }else{
                $this->code = 500;
                $this->msg = 'Server Error.';
                $this->errorCode = 999;
                $this->recordErrorLog($e);
            }
        }

        $request = Request::instance();

        $result = [
            'msg' => $this->msg,
            'error_code' =>$this->errorCode,
            'request_url' =>$request->url()
        ];

        return json($result,$this->code);
    }

    // 记录错误日志
    private function recordErrorLog(Exception $e){
        Log::init([
            // 日志记录方式，内置 file socket 支持扩展
            'type'  => 'File',
            // 日志保存目录
            'path'  => LOG_PATH,
            // 日志记录级别
            'level' => ['error']
        ]);
        Log::record($e->getMessage(),'error');
    }
}