<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/24
 * Time: 22:51
 */

namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Validate;
use app\index\model\User as UserModel;
use think\View;
use app\index\model\Book as BookModel;

//use app\lib\exception\UserException;

class Index extends Controller
{
    public function index(){
        $data = BookModel::limit('4')->order('bookid desc')->select();
        //return $data;
        //pd($data);
        $this->assign('list',$data);
        return $this->fetch();
    }
    public function hello(Request $request){
        //pd(config());
        //$user = UserModel::all();
        //$user = UserModel::get(1);
        //echo $user->username;
        //$user = UserModel::all();
        //echo $user[0]['username'];
        //$this->assign('user',$user[0]['username']);
        //print_r($user);
        //var_dump($user);
        //return 'The API Server is running...';
        //$user['id'] = Session::get('id');
        //$user['username'] = Session::get('username');
        //$user['email'] = Session::get('email');
        //$view = new View();
        //$view->name1 = 'thinkphp';
        //$view->assign('user',$user);

        //方式一
        /*$id = Request::instance()->param('id');
        $name = Request::instance()->param('name');
        $age = Request::instance()->param('age');
        echo $id.'|'.$name.'|'.$age;*/

        //获取所有参数
        //$all = Request::instance()->param();

        //方式二
        //$all = Request::instance()->route(); //只获取路径中的参数
        //$all = Request::instance()->get(); //只获取get参数
        //$all = Request::instance()->post(); //只获取post参数

        //方式三 助手函数
        //$id = input('param.id');
        //$name = input('get.name');
        //echo $age = input('post.age');

        //方式四 依赖注入 当hello函数名参数加入实例 hello(Request $request)
        $all = $request->param();
        var_dump($all);
    }
    public function get(){
        $data = [
            'name' => 'vendor',
            'email' => 'vendor@mail.com'
        ];

        $validate = new Validate([
            'name' => 'require|max:10',
            'email' => 'email'
        ]);
        //独立验证
        $result = $validate->check($data);
        var_dump($result);
        //批量验证
        $result = $validate->batch()->check($data);
        var_dump($validate->getError());

        //验证器

    }
}