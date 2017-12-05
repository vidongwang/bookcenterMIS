<?php

namespace app\api\model;

use think\Model;

class BannerItem extends BaseModel
{
    protected $hidden = ['id','img_id','banner_id','delete_time','update_time'];

    // 读取器
    /*public function getKeyWordAttr($attr){
        return 'KeyWord:'.$attr;
    }*/

    // 模型
    public function img(){
        return $this->belongsTo('Image','img_id','id');
    }
}
