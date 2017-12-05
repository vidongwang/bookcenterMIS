<?php

namespace app\api\model;

use think\Model;

class Banner extends BaseModel
{
    // 隐藏模型字段
    protected $hidden = ['delete_time','update_time'];

    // 模型操作的表
    //protected $table = 'category';

    public function items(){
        return $this->hasMany('BannerItem','banner_id','id');
    }

    public static function getBannerByID($id){
        return self::with(['items','items.img'])->find($id);

        /*$result = Db::query('select * from banner_item where banner_id=?',[$id]);
        return $result;*/
        //$result = Db::table('banner_item')
            //->fetchSql()
        //    ->where('banner_id','=',$id)
        //    ->select();
        //return $result;
    }
}