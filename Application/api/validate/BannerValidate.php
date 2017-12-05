<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25
 * Time: 0:42
 */

namespace app\api\validate;

use think\Validate;

class BannerValidate extends Validate
{
    protected $rule = [
        'id' => 'require|number',
        'name' => 'require|max:10',
        'age' => 'require|number|between:1,120',
        'email' => 'email'
    ];
    protected $field = [
        'id' => 'id',
        'name'  => '名称[name]',
        'age'   => '年龄[age]',
        'email' => '邮箱[email]',
    ];
    protected $msg = [
        'id.require' => 'id必须填写',
        'name.max'     => '名称最多不能超过10个字符',
        'age.require'   => '年龄必须填写',
        'age.number'   => '年龄必须是数字',
        'age.between'  => '年龄只能在1-120之间',
        'email'        => '邮箱格式错误',
    ];
}