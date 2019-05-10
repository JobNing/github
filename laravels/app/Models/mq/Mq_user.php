<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/4/28
 * Time: 18:42
 */

namespace App\Models\mq;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mq_user extends Model
{
    public function login($username,$pwd){
        return DB::table('mq_users')->where(['username'=>$username , 'pwd'=>$pwd])->first();
    }
    public function upd($id,$money){
        return DB::table('mq_users')->where('id',$id)->decrement('money',$money);
    }
    public function find($id){
        return DB::table('mq_users')->where('id',$id)->first();
    }
}