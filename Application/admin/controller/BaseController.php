<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/1
 * Time: 11:53
 */

namespace app\admin\controller;

use think\Controller;
use think\Request;

class BaseController extends Controller
{
    public function __construct(){
        parent::__construct();
        date_default_timezone_set("Asia/Shanghai");// 设置一个时区
        header("Content-Type:text/html;charset=utf-8");
        $this->assign('title','首页');
        $this->assign('systemName','购书中心管理信息系统');
        $this->assign('version','v1.0');

        if (!(session('employeeid')||session('employee'))) {
            //跳转到认证网关
            //echo url(config('USER_AUTH_GATEWAY'));
            if(Request::instance()->IsAjax()){
                fail('403','403 Forbidden');
            }else{
                $this->redirect(url(config('USER_AUTH_GATEWAY')));
            }
        }
    }
}