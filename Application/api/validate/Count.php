<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/22
 * Time: 0:47
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule = [
        'count' => 'isPostiveInteger|between:1,30'
    ];
    protected $message = [
        'count' => 'count必须是1-30之间的正整数'
    ];
}