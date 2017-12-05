<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/22
 * Time: 12:49
 */

namespace app\api\controller\v1;
use app\api\service\UserToken;
use app\api\validate\TokenGet;
use app\api\model\Token as TokenModel;
use app\lib\exception\TokenException;


class Token
{
    public function getToken($code=''){
        (new TokenGet())->goCheck();
        $user_token = new UserToken();
        $token = $user_token->get($code);
        return $token;
    }
}