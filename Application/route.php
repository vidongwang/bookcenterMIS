<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

//Banner
Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');

//Theme
Route::get('api/:version/theme/:id','api/:version.Theme/getComplexOne');
Route::get('api/:version/theme','api/:version.Theme/getSimpleList');

//Product
Route::get('api/:version/product/recent','api/:version.Product/getRecent');
Route::get('api/:version/product/by_category','api/:version.Product/getAllInCategory');

//Category
Route::get('api/:version/category/all','api/:version.Category/getAllCategory');

//Token
Route::post('api/:version/token/user', 'api/:version.Token/getToken');



//Home
Route::get('index','index/Index/index');
Route::get('Home/index','index/Index/index');

Route::get('Login','index/Login/index');
Route::post('Login','admin/Login/login');

Route::get('Register','index/Login/register');
Route::post('Register','admin/Login/register');

//Admin
Route::get('admin/:controller/:action','admin/:controller/:action');
Route::get(':module/:controller/:action',':module/:controller/:action');
Route::get('Admin','admin/Index/index');
Route::get('Book','admin/Book/index');
Route::get('Logout','admin/Login/logout');


Route::post('Book/create','admin/Book/save');


//动态式
//Route::rule('路由表达式','路由地址','请求类型');
//Route::rule('index','test/index','GET|POST',['https'=>false]);

//配置式
/*return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];*/


Route::get('api/:version/food/often','api/:version.Food/getOftenFoods');
Route::get('api/:version/food/cate','api/:version.Food/getCateFoods');
Route::get('api/:version/food/checkout','api/:version.Food/checkout');
