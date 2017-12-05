<?php

namespace app\admin\controller;

use think\Loader;
use think\Request;
use app\admin\model\Book as BookModel;

class Book extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data = BookModel::all();
        //return $data;
        $this->assign('list',$data);
        return $this->fetch();
    }

    public function test(Request $request)
    {
        //dump($request);
        $id = input('get.id','1','intval');

        //第一种 Loader形式
        //$book = Loader::model('book');

        //第二种 引入Model类
        //$res = BookModel::get($id);

        //第三种 助手函数model
        //$book = model('Book');
        //$res = $book::get($id);

        //get返回一条数据
        //$res = BookModel::get(function ($query){
            //$query->where('bookid','eq',3);
            //$query->where('author','eq','周国平')->field('bookid,bookname,author');
        //});

        //find返回一条数据
        //$res = BookModel::find($id);
        //$res = BookModel::where('bookid',$id)->field('bookid,bookname,author')->find();

        //all返回多条数据
        //$res = BookModel::all('3,1');
        //$res = BookModel::all([2,3]);

        //使用闭包
        //$res = BookModel::all(function ($query){
            //$query->where('bookid','<','3')->field('bookid,bookname,author');
        //});

        //select返回多条数据
        //$res = BookModel::where('bookid','>','1')
            //->field('bookid,bookname,author')
            //->limit(2)
            //->order('bookid DESC')
            //->select();

        //只返回一条数据
        //$res = BookModel::where('bookid','=','1')->value('bookname');

        //返回指定列所有数据
        //$res = BookModel::column('bookname');

        //$res = $res->toArray();

//         $res = BookModel::create([
//             'bookname'=>'解忧杂货店',
//             'author'=>'(日)东野圭吾',
//             'size'=>'32开',
//             'abstract'=>'《白夜行》后东野圭吾备受欢迎作品：不是推理小说，却更扣人心弦。王俊凯、迪丽热巴、董子健等推荐',
//             'detail'=>'日本著名作家东野圭吾的《解忧杂货店》，出版当年即获中央公论文艺奖。作品超越推理小说的范围，却比推理小说更加扣人心弦。
// 　　僻静的街道旁有一家杂货店，只要写下烦恼投进店前门卷帘门的投信口，第二天就会在店后的牛奶箱里得到回答：因男友身患绝症，年轻女孩静子在爱情与梦想间徘徊；克郎为了音乐梦想离家漂泊，却在现实中寸步难行；少年浩介面临家庭巨变，挣扎在亲情与未来的迷茫中……
// 　　他们将困惑写成信投进杂货店，奇妙的事情随即不断发生。生命中的一次偶然交会，将如何演绎出截然不同的人生？',
//             'purchase'=>'20.30',
//             'price'=>'27.30',
//             'wholesale'=>'25.30',
//             'publish_id'=>'3',
//             'publish_date'=>'2014-5-1',
//             'picurl'=>'',
//             'picfrom'=>'1',
//             'remark'=>''
//         ]);
            //save返回的是影响行数，saveAll和create返回是model对象
//        $BookModel = new BookModel;
//        $res = $BookModel
//            ->allowField('bookname')//设置允许写入的字段
//            ->save([
//            'bookname'=>'学会爱自己（全3册）',
//            'author'=>'（美）克雷文',
//            'size'=>'16开',
//            'abstract'=>'教孩子免受性侵犯！让孩子学会保护自己！含《不要随便摸我》《不要随便亲我》《不要随便跟陌生人走》',
//            'detail'=>'《不要随便摸我》蕾娜看见一辆又黑又大的汽车，里面的人阴沉着脸，好像一直盯着她看。蕾娜害怕得不得了，就把这件事告诉了伙伴。没想到放学后，那辆车居然还在，幸好伙伴们跟她手拉手一起等待家长的到来。在等待的过程中伙伴们回忆了妈妈们叮嘱过的安全事项。等妈妈来了以后，蕾娜才发现是虚惊一场。不过对于那些安全事项，她的印象更加深刻了。',
//            'purchase'=>'18.70',
//            'price'=>'21.70',
//            'wholesale'=>'20.30',
//            'publish_id'=>'4',
//            'publish_date'=>'2010-5-1',
//            'picurl'=>'http://img3m3.ddimg.cn/51/4/21000723-1_x_1.jpg',
//            'picfrom'=>'1',
//            'remark'=>''
//        ]);
        //删除
        //$res = BookModel::destroy(6);
        //dump($res);

    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        empty($request->post('bookid')) || $data['bookid'] = $request->post('bookid','','intval');
        $data['bookname'] = $request->post('bookname');
        $data['author'] = $request->post('author');
        $data['size'] = $request->post('size');
        $data['abstract'] = $request->post('abstract');
        $data['detail'] = $request->post('detail');
        $data['purchase'] = $request->post('purchase');
        $data['price'] = $request->post('price');
        $data['wholesale'] = $request->post('wholesale');
        $data['publish_id'] = $request->post('publish_id');
        $data['publish_date'] = $request->post('publish_date');
        $data['picurl'] = $request->post('picurl');
        $data['remark'] = $request->post('picurl');
        $data['picfrom'] = $request->post('picfrom',1);
        $book = new BookModel($data);
        $res = $book->save();

        if($res){
            success('201','保存成功！','0');
        }else{
            fail('400','保存失败！','40000');
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
