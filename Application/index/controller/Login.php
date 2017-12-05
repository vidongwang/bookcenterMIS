<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/29
 * Time: 19:31
 */

namespace app\index\controller;

use think\Controller;
use think\Request;

class Login extends Controller
{
    /**
     * 显示
     */
    public function index($tpl='index')
    {
        if ((session('employeeid')||session('employee'))) {
            if(Request::instance()->IsAjax()){
                fail('403','403 Forbidden');
            }else{
                $this->redirect(url('admin/Index/index'));
            }
        }else{
            return $this->fetch($tpl);
        }
    }

    public function register()
    {
        if ((session('employeeid')||session('employee'))) {
            if(Request::instance()->IsAjax()){
                fail('403','403 Forbidden');
            }else{
                $this->redirect(url('admin/Index/index'));
            }
        }else{
            return $this->fetch();
        }
    }
}