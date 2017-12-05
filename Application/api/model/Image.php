<?php

namespace app\api\model;

class Image extends BaseModel
{
    // 隐藏模型字段
    protected $hidden = ['id','from','delete_time','update_time'];

    // 读取器
    protected function getUrlAttr($attr,$data){
        return $this->prefixImgUrl($attr,$data);
    }
}
