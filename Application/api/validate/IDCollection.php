<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/21
 * Time: 22:40
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|checkIDs'
    ];
    protected $message = [
        'ids' => 'ids必须是一个正整数，或以逗号分隔的多个正整数'
    ];

    protected function checkIDs($value){
        $values = explode(',',$value);
        if (empty($value)){
            return false;
        }
        foreach ($values as $id){
            if(!$this->isPostiveInteger($id,$this->rule)){
                return false;
            }
        }
        return true;
    }
}