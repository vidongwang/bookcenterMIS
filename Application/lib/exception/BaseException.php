<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25
 * Time: 8:49
 */

namespace app\lib\exception;

use think\Exception;

class BaseException extends Exception
{
    // HTTP 状态码 200,400
    public $code = 400;

    // 错误具体信息
    public $msg = '参数异常';

    // 自定义的错误码
    public $errorCode = 10000;

    public function __construct($params = [])
    {
        if(!is_array($params)){
            return ;
            //throw new Exception('参数必须是数组！');
        }
        if (array_key_exists('code',$params)){
            $this->code = $params['code'];
        }
        if (array_key_exists('msg',$params)){
            if(!is_array($params['msg'])){
                $this->msg = $params['msg'];
            }else{
                foreach ($params['msg'] as $k => $v){
                    $this->msg .= $v . ';';
                }
            }
        }
        if (array_key_exists('errorCode',$params)){
            $this->errorCode = $params['errorCode'];
        }
    }
}