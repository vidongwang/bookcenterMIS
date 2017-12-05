<?php

namespace app\api\controller\v1;

use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\BannerMissException;

class Banner
{
    /**
     * 获取指定id的banner
     * @url /banner/:id
     * http GET
     * @$id banner的id号
     */
    public function getBanner($id){
        //AOP面向切面
        (new IDMustBePostiveInt())->goCheck();
        //$banner = BannerModel::with(['items','items.img'])->find($id);
        //get,find,select,all
        $banner = BannerModel::getBannerByID($id);
        if(!$banner){
            throw new BannerMissException();
        }
        return $banner;
    }
}