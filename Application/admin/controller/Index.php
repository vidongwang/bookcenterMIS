<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/24
 * Time: 22:51
 */

namespace app\admin\controller;

use think\Config;
use think\Env;
use think\Request;
use think\Session;
use think\View;
use app\admin\model\Employee as EmployeeModel;

class Index extends BaseController
{
    public function index(Request $request){
        //$env = $request->env();
        //p($_SERVER);
        //pd($env);
        return $this->fetch();
    }
    public function setSkin(Request $request){
        if($request->isAjax()||$request->isPost()){
            $skin = input('skin','default','');
            $employee = EmployeeModel::get(['employeeid'=>session('employeeid')]);
            $employee->login_skin = $skin;
            $employee->save();
            success(200,'切换皮肤成功！');
        }else{
            fail('400','Bad Request！','40000');
        }
    }
    public function test(){
        //var_dump(Config::get());
        //die;
        //echo url('admin/index/index');die;

//        $user['id'] = Session::get('id');
//        $user['username'] = Session::get('username');
//        $user['email'] = Session::get('email');
//        $view = new View();
//        $view->assign('version','v1.0');
//        $view->assign('user',$user);
        //return $view->fetch('index',[],[],$this->tpl_config());
        //pd(config());
//        $res = Env::get('status');
//        $res = $_ENV;
//        dump($res);
        //echo ROOT_PATH;
        //return $this->fetch();
    }
    public function rand(){
        $temp = '';
        $arr = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        /*for($i=0;$i<26;$i++){
            for($j=0;$j<26;$j++){
                for($k=0;$k<26;$k++){
                    //echo $arrs[]=$arr[$i].$arr[$j].$arr[$k];
                    $temp .= $arr[$i].$arr[$j].$arr[$k].".top\n";
                }
            }
        }*/

        for($k=0;$k<26;$k++){
            echo $arr[$k]."imi<br />";
            echo $arr[$k]."ini<br />";
            echo $arr[$k]."ivi<br />";
            //$temp .= ''.$arr[$k].".top<br />";
        }
        //file_put_contents('./dname.txt',$temp);
        //p($arrs);
    }

}