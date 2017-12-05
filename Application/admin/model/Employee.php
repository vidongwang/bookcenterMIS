<?php

namespace app\admin\model;

use think\Request;

class Employee extends BaseModel
{
    // 新增自动完成列表
    protected $insert = [
        'last_login_time',
        'last_login_ip',
        'password'
    ];
    // 更新自动完成列表
    protected $update = [
        //'last_login_time',
        //'last_login_ip'
    ];

    public function setLastLoginTimeAttr(){
        return time();
    }

    public function setLastLoginIpAttr(){
        return Request::instance()->ip(0,true);
    }

    public function setPasswordAttr($val){
        return md5($val);
    }

    public function getLastLoginTimeAttr($val){
        return date('Y-m-d H:i:s',$val);
    }

    public function getPositionAttr($val){
        $position = [
            0 =>    '未审核',
            1 =>    '董事长',
            2 =>    '总经理',
            3 =>    '部门主管',
            4 =>    '仓库主管',
            9 =>    '普通职员',
        ];
        return $position[$val];
    }
}
