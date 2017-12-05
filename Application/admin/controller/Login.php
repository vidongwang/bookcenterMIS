<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/29
 * Time: 19:31
 */

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\lib\exception\Message;
use app\admin\validate\RegisterValidate;
use app\admin\model\Employee as EmployeeModel;

class Login extends Controller
{
    public function login(Request $request)
    {
        (new RegisterValidate())->goCheck();
        $email = input('post.email');
        $password = input('post.password','123456','md5');
        $account = EmployeeModel::where(['email' => $email])->find();
        //pd($account);
        if (!$account){
            throw new Message(array('code'=>400,'msg'=>'账号不存在！','errorCode'=>5000));
        }else{
            if ($account['password'] !== $password){
                throw new Message(array('code'=>400,'msg'=>'密码错误！','errorCode'=>5000));
            }else{
                session('employeeid',$account['employeeid']);
                session('email',$account['email']);
                session('employee',$account['employee']);
                session('position',$account['position']);
                session('last_login_time',$account['last_login_time']);
                session('last_login_ip',$account['last_login_ip']);
                session('login_count',$account['login_count']+1);
                cookie('Huiskin',$account['login_skin']);
                $account->login_count = $account['login_count'] + 1;
                $account->last_login_time = time();
                $account->last_login_ip = $request->ip(0,true);
                $account->save();
                throw new Message(array('code'=>200,'msg'=>'【登录成功】您好，'.session('employee').'！','errorCode'=>0));
            }
        }
    }

    public function register() {
        (new RegisterValidate())->goCheck();
        $data['email'] = input('post.email');
        $data['employee'] = input('post.username');
        $data['password'] = input('post.password','123456','');
        $res = EmployeeModel::where(['email' => $data['email']])->find();
        if($res){
            throw new Message(array('code'=>400,'msg'=>'邮箱已经注册！','errorCode'=>5000));
        }else{
            $user = new EmployeeModel($data);
            $id = $user->save();
            if (!empty($id)){
                throw new Message(array('msg'=>'恭喜您，注册成功！'));
            }
        }
    }

    //退出
    public function logout(){
        session(null);
        session_unset();
        session_destroy();
        $this->redirect(url(config('USER_AUTH_GATEWAY')));
    }

}