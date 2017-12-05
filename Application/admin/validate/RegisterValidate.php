<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25
 * Time: 0:42
 */

namespace app\admin\validate;

class RegisterValidate extends BaseValidate
{
    protected $rule = [
        //'id' => 'require|number',
        //'age' => 'require|number|between:1,120',
        'email' => 'email',
        'password' => 'require|alphaDash|min:6|max:20'
    ];
    protected $field = [
        //'id' => 'id',
        //'name'  => '名称[name]',
        //'age'   => '年龄[age]',
        'email' => '邮箱[email]',
        'password' => '密码[password]'
    ];
    protected $msg = [
        //'id.require' => 'id必须填写',
        //'name.max'     => '名称最多不能超过10个字符',
        //'age.require'   => '年龄必须填写',
        //'age.number'   => '年龄必须是数字',
        'email'        => '邮箱格式错误',
        'password.alphaDash'  => '密码只能是字母、数字和下划线_及破折号-',
        'password'        => '密码格式错误'
    ];
}