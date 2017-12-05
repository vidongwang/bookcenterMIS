<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/24
 * Time: 20:04
 */

namespace app\api\controller\v2;

use app\lib\exception\SuccessMessage;

class Food
{
    /**
     * 获取指定id的banner
     * @$id banner的id号
     */
    public function getOftenFoods(){
        $foods =
<<<EOF
[{
        "goodsId": 1,
        "goodsName": "香辣鸡腿堡",
        "price": 18.00
    },
    {
        "goodsId": 2,
        "goodsName": "田园鸡腿堡",
        "price": 15.00
    },
    {
        "goodsId": 3,
        "goodsName": "和风汉堡",
        "price": 15.00
    },
    {
        "goodsId": 4,
        "goodsName": "大包薯条",
        "price": 18.00
    },
    {
        "goodsId": 5,
        "goodsName": "脆皮炸鸡腿",
        "price": 20.00
    },
    {
        "goodsId": 6,
        "goodsName": "魔法鸡块",
        "price": 20.00
    },
    {
        "goodsId": 7,
        "goodsName": "可乐大杯",
        "price": 10.00
    },
    {
        "goodsId": 8,
        "goodsName": "雪顶咖啡",
        "price": 18.00
    },
    {
        "goodsId": 9,
        "goodsName": "儿童欢乐套餐",
        "price": 25.00
    },
    {
        "goodsId": 10,
        "goodsName": "快乐全家桶",
        "price": 99.00
    }]
EOF;
        $food = json_decode($foods);
        //print_r($food);die;
        header('Access-Control-Allow-Origin:*');
        return $food;
    }

    public function getCateFoods(){
        $foods =
<<<EOF
[
    {
        "cid":1,
        "cname":"汉堡",
        "foods":[
            {
                "goodsId": 1,
                "goodsImg": "http://7xjyw1.com1.z0.glb.clouddn.com/pos001.jpg",
                "goodsName": "香辣鸡腿堡",
                "price": 18
            },
            {
                "goodsId": 2,
                "goodsImg": "http://7xjyw1.com1.z0.glb.clouddn.com/pos002.jpg",
                "goodsName": "田园鸡腿堡",
                "price": 15
            },
            {
                "goodsId": 3,
                "goodsImg": "http://7xjyw1.com1.z0.glb.clouddn.com/pos003.jpg",
                "goodsName": "和风汉堡",
                "price": 15
            }
        ]
    },
    {
        "cid":2,
        "cname":"小食",
        "foods":[
            {
                "goodsId": 4,
                "goodsImg": "http://7xjyw1.com1.z0.glb.clouddn.com/pos003.jpg",
                "goodsName": "大包薯条",
                "price": 18
            },
            {
                "goodsId": 5,
                "goodsImg": "http://7xjyw1.com1.z0.glb.clouddn.com/pos002.jpg",
                "goodsName": "脆皮炸鸡腿",
                "price": 20
            },
            {
                "goodsId": 6,
                "goodsImg": "http://7xjyw1.com1.z0.glb.clouddn.com/pos001.jpg",
                "goodsName": "魔法鸡块",
                "price": 20
            }
        ]
    },
    {
        "cid":3,
        "cname":"饮料",
        "foods":[
            {
                "goodsId": 7,
                "goodsImg": "http://7xjyw1.com1.z0.glb.clouddn.com/pos001.jpg",
                "goodsName": "可乐大杯",
                "price": 10
            },
            {
                "goodsId": 8,
                "goodsImg": "http://7xjyw1.com1.z0.glb.clouddn.com/pos002.jpg",
                "goodsName": "雪顶咖啡",
                "price": 18
            }
        ]
    },
    {
        "cid":4,
        "cname":"套餐",
        "foods":[
            {
                "goodsId": 9,
                "goodsImg": "http://7xjyw1.com1.z0.glb.clouddn.com/pos004.jpg",
                "goodsName": "儿童欢乐套餐",
                "price": 25
            },
            {
                "goodsId": 10,
                "goodsImg": "http://7xjyw1.com1.z0.glb.clouddn.com/pos003.jpg",
                "goodsName": "快乐全家桶",
                "price": 99
            }
        ]
    }
]
EOF;
        $food = json_decode($foods);
        //print_r($food);die;
        header('Access-Control-Allow-Origin:*');
        return $food;
    }

    public function checkout(){
        header('Access-Control-Allow-Origin:*');
        throw new SuccessMessage(['msg'=>'结账成功！']);
    }
}