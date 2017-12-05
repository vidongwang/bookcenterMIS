<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/24
 * Time: 22:51
 */

namespace app\admin\controller;

use think\Config;
use think\Session;
use think\View;

class Article extends BaseController
{
    public function index(){

        //var_dump(Config::get());die;
        $user['id'] = Session::get('id');
        $user['username'] = Session::get('username');
        $user['email'] = Session::get('email');
        $view = new View();
        $view->systemName = '购书中心管理信息系统';
        $view->title = '首页';
        $view->assign('version','v1.0');
        $view->assign('user',$user);
        //return $view->fetch('index',[],[],$this->tpl_config());
        return $view->fetch('index');
    }
}