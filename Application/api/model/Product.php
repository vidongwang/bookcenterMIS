<?php

namespace app\api\model;

use think\Model;

class Product extends BaseModel
{
    // 隐藏模型字段
    protected $hidden = ['from','delete_time','create_time','update_time','category_id','img_id','pivot'];

    // 读取器
    protected function getMainImgUrlAttr($attr,$data){
        return $this->prefixImgUrl($attr,$data);
    }

    public static function getMostRecent($count){
        return self::limit($count)->whereNull('delete_time')->order('create_time desc')->select();
    }

    public static function getProductByCategoryId($categoryid){
        return self::where('category_id','=',$categoryid)->whereNull('delete_time')->order(['update_time'=>'desc','create_time'=>'desc'])->select();
    }
}