<?php

namespace app\api\model;

class Category extends BaseModel
{
    // 隐藏模型字段
    protected $hidden = ['topic_img_id','delete_time','update_time'];

    // 读取器
    protected function getMainImgUrlAttr($attr,$data){
        return $this->prefixImgUrl($attr,$data);
    }

    public function img(){
        return $this->belongsTo('Image','topic_img_id','id');
    }
}
