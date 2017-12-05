<?php

namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class Book extends Model
{
    use SoftDelete;

    // 是否需要自动写入时间戳 如果设置为字符串 则表示时间字段的类型
    protected $autoWriteTimestamp = true;
    // 创建时间字段
    protected $createTime = 'create_time';
    // 更新时间字段
    protected $updateTime = 'update_time';
    // 新增更新均自动完成列表
    //protected $auto = [
        //'update_time'
    //];
    // 新增自动完成列表
    protected $insert = [
        'create_time',
        'update_time'
    ];
    // 更新自动完成列表
    protected $update = [
        'update_time'
    ];

    public function setCreateTimeAttr(){
        return time();
    }

    public function setUpdateTimeAttr(){
        return time();
    }
}
