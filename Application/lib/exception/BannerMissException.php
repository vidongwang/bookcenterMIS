<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25
 * Time: 9:18
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{

    // HTTP 状态码 200,400
    public $code = 404;

    // 错误具体信息
    public $msg = '请求的Banner不存在';

    // 自定义的错误码
    public $errorCode = 40000;
}