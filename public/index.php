<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 定义应用目录
//define('APP_PATH', __DIR__ . '/../application/');
//define('LOG_PATH', __DIR__ . '/../log/');
//require __DIR__ . '/../thinkphp/start.php';

define('PROJECT_APTH',dirname(realpath(__DIR__ . '/../application/')) . DIRECTORY_SEPARATOR);
define('APP_PATH', PROJECT_APTH . 'application' . DIRECTORY_SEPARATOR);
define('LOG_PATH', PROJECT_APTH . 'log' . DIRECTORY_SEPARATOR);
// 定义配置目录
//define('CONF_PATH', PROJECT_APTH.'config'.DIRECTORY_SEPARATOR);

// 加载框架引导文件
require PROJECT_APTH.'thinkphp'.DIRECTORY_SEPARATOR.'start.php';

\think\log::init([
    'type'=>'File',
    'path'=> LOG_PATH,
    'level'=>['sql']
]);