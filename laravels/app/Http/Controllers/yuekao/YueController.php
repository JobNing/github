<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/5/7
 * Time: 8:51
 */

namespace App\Http\Controllers\yuekao;


use App\Http\Controllers\Controller;
use App\Jobs\Queues;
use App\Models\yuekao\Y_movie;
use App\Models\yuekao\Y_order;
use Illuminate\Http\Request;

class YueController extends Controller
{
    public $y_movie;
    public $y_order;
    public function __construct(Y_movie $y_movie,Y_order $y_order)
    {
        $this->y_movie = $y_movie;
        $this->y_order = $y_order;
    }

    public function addMovie(Request $request){
        $data = $request->all();
        $data['created'] = date('Y-m-d H:i:s');
        $data['updated'] = date('Y-m-d H:i:s');
        $this->y_movie->add($data);
        return $this->getJosn('200','create success');
    }
    public function deleteMovie($id){
        $this->y_movie->del($id);
        return $this->getJosn('200','delete success');
    }
    public function updateMovie($id,Request $request){
        $data = $request->all();
        $data['updated'] = date('Y-m-d H:i:s');
        $this->y_movie->upd($id,$data);
        return $this->getJosn('200','update success');
    }
    public function searchMovie(Request $request){
        $name = $request->get('name');
        $data = $this->y_movie->search($name);
        return $this->getJosn('200','update success',$data);
    }
    public function getOrder(Request $request){
        $data['tel'] = $request->post('tel');
        $data['num'] = $request->post('num');
        $ticket_id = $request->post('ticket_id');
        $data['order_code'] = $data['tel'].$data['num'].$ticket_id.rand(111111,999999);
        $movie = $this->y_movie->find($ticket_id);
        $data['name'] = $movie[0]->name;
        $data['total_cost'] = $data['num'] * $movie[0]->price;
        $data['created'] = date('Y-m-d H:i:s');
        $data['updated'] = date('Y-m-d H:i:s');
        $this->y_order->add($data);
        $arr['num'] = $data['num'];
        $arr['ticket_id'] = $ticket_id;
        $arr['name'] = $data['name'];
        $this->dispatch(new Queues($arr,$this));
        return $this->getJosn('200','create success',$data);
    }
    public function getJosn($code,$message,$data=''){
        return array('code'=>$code,'message'=>$message,'data'=>$data);
    }

}