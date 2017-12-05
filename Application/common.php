<?php

// 应用公共文件

use app\lib\exception\Message;

/**
 * 操作成功
 * @throws Message
 */
function success($code = 200,$msg = '操作成功！',$errorCode = 0){
    $arr = [
        'code'=>$code,
        'msg'=>$msg,
        'errorCode'=>$errorCode
    ];
    throw new Message($arr);
}
/**
 * 操作失败
 * @throws Message
 */
function fail($code = 400,$msg = '操作失败！',$errorCode = 0){
    $arr = [
        'code'=>$code,
        'msg'=>$msg,
        'errorCode'=>$errorCode
    ];
    throw new Message($arr);
}

/**
 * 打印数组函数，用于测试，不影响程序执行
 * @param $array
 */
function p ($array){
    dump($array,1,'<pre>',0);
}

/**
 * 打印数组函数，用于测试，打印后中止程序执行
 * @param $array
 */
function pd ($array){
    dump($array,1,'<pre>',0);
    die;
}