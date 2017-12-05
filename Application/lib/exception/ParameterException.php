<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25
 * Time: 10:50
 */

namespace app\lib\exception;


use think\Exception;
use Throwable;

class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '[输入错误]';
    public $errorCode = 10000;
}