<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/24
 * Time: 20:04
 */

namespace app\api\controller\v2;

class Banner
{
    /**
     * 获取指定id的banner
     * @$id banner的id号
     */
    public function getBanner($id){
        return 'This is v2 api.';
    }
}