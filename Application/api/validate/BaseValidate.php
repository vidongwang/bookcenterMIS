<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25
 * Time: 1:59
 */

namespace app\api\validate;

use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        // 获取http传入的参数
        // 对这些参数做检验
        $request = Request::instance();
        $params = $request->param();

        $result = $this->batch()->check($params);
        if (!$result){
            // 抛出自定义异常，不受APP_DEBUG调试模式开关影响
            $e = new ParameterException([
                'code' => 400,
                'msg' => $this->error,
                'errorCode' => 10001
            ]);
            //$e->msg = $this->error;
            throw $e;
        }else{
            return true;
        }
    }

    //自定义验证器
    protected function isPostiveInteger($value, $rule, $data = [], $field = ''){
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0){
            return true;
        }else{
            //return $field.'必须是正整数';
            return false;
        }
    }

    protected function isNotEmpty($value, $rule, $data = [], $field = ''){
        if (empty($value)){
            return false;
        }else{
            return true;
        }
    }
}