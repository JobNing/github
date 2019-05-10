<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/4/28
 * Time: 19:00
 */

namespace App\Models\mq;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mq_shop extends Model
{
    public function sel(){
        return DB::table('mq_shops')->get();
    }
    public function find($id){
        return DB::table('mq_shops')->where('id',$id)->get();
    }
    public function upd($id,$money){
        return DB::table('mq_shops')->where('id',$id)->decrement('inventory',$money);
    }
}