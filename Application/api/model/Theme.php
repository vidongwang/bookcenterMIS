<?php

namespace app\api\model;

use think\Model;

class Theme extends BaseModel
{
    // 隐藏模型字段
    protected $hidden = ['delete_time','update_time','topic_img_id','head_img_id'];

    //一对一有主从关系，不能互换，模型本身包含外键的，用belongTo;模型本身不包含外键，外键存在与之相关联的模型中，用hasOne
    //如果要从Image关联Theme，要用hasOne，$this->hasOne()

    //主题图
    public function topicImg(){
        return $this->belongsTo('Image','topic_img_id','id');
    }

    //专题列表页，头图
    public function headImg(){
        return $this->belongsTo('Image','head_img_id','id');
    }

    //专题产品
    public function products(){
        return $this->belongsToMany('Product','theme_product','product_id','theme_id');
    }

    public static function getThemeWithProducts($id){
        return self::with('products,topicImg,headImg')->find($id);
    }
}
