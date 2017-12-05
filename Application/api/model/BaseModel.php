<?php

namespace app\api\model;

use think\Model;

class BaseModel extends Model
{

    // 读取器
    protected function prefixImgUrl($attr,$data){
        // 判断图片来源
        if ($data['from']=='1'){
            return config('setting.img_prefix').$attr;
        }else{
            return '/images'.$attr;
        }
    }
}
