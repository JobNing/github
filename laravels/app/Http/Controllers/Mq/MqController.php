<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/4/28
 * Time: 18:33
 */

namespace App\Http\Controllers\Mq;


use App\Http\Controllers\Controller;
use App\Jobs\Queue;
use App\Models\mq\Mq_indent;
use App\Models\mq\Mq_shop;
use App\Models\mq\Mq_user;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Ixudra\Curl\Facades\Curl;

class MqController extends Controller
{
    public $mq_user = '';
    public $mq_shop = '';
    public $mq_indent = '';
    const SIZE = 5;
    public function __construct(Mq_user $mq_user,Mq_shop $mq_shop,Mq_indent $mq_indent)
    {
        $this->mq_user = $mq_user;
        $this->mq_shop = $mq_shop;
        $this->mq_indent = $mq_indent;
    }
    public function login(){
        return view('mq/login');
    }
    public function loginyz(Request $request){
        $data['username'] = $request->post('username');
        $data['pwd'] = $request->post('pwd');
        $arr = $this->mq_user->login($data['username'],$data['pwd']);
        if ($arr != ''){
            $request->session()->put('username',$arr->username);
            $request->session()->put('id',$arr->id);
            return 1;
        }else{
            return 0;
        }
    }
    public function getSearch($path,$name){
        $form = $path*self::SIZE;
        $array = [
            'from'=>$form,
            'size'=>self::SIZE,
            'query'=>[
                'wildcard'=>[
                    "name"=>"*$name*"
                ]
            ],
        ];
        return $array;
    }
    public function shop(Request $request){
        $path = $request->get('path');
        $name = $request->get('search');
        $arr = $this->getSearch($path,$name);
        $value = Curl::to("http://127.0.0.1:9200/lara/es/_search")
            ->withData(json_encode($arr))
            ->withContentType('application/json')
            ->post();
        $num = json_decode($value)->hits->total->value/self::SIZE;

        return view('mq/shop',['data'=>json_decode($value)->hits->hits,'num'=>$num]);
    }
    public function shoping(Request $request){
        $id = $request->get('id');
        $data = $this->mq_shop->find($id);
        return view('mq/shoping',['data'=>$data]);
    }
    public function indent(Request $request){
        $data['shop_id'] = $request->post('id');
        $data['shop_num'] = $request->post('num');
        $data['price'] = $request->post('price');
        $data['sum'] = $data['shop_num'] * $data['price'];
        $data['user_id'] = $request->session()->get('id');
        $data['indent'] = $data['user_id'].time().rand(11111,99999);
        $indent_num = $this->mq_shop->find($data['shop_id']);
        $user_money = $this->mq_user->find($data['user_id']);
        if ($data['shop_num']>$indent_num[0]->inventory){
            echo "<script>alert('库存不足');location.href='/mq/shop'</script>";
            die;
        }
        if ($data['sum']>$user_money->money){
            echo "<script>alert('余额不足');location.href='/mq/shop'</script>";
            die;
        }
        $this->mq_indent->ins($data);
        $this->dispatch(new Queue($data,$this));
        Mail::raw('您购买的物品已成功', function ($message){
            $id = session('id');
            $user = $this->mq_user->find($id);
            $to = $user->email;
            $message ->to($to)->subject('苏宁的商城');
        });
        echo "<script>alert('订单生成成功');location.href='/mq/shop'</script>";
    }
    public function que(){

    }
}