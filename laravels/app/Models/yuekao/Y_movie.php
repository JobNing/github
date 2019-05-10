<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/5/7
 * Time: 8:55
 */

namespace App\Models\yuekao;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Y_movie extends Model
{
    public function add($data){
        return DB::table('y_movies')->insert($data);
    }
    public function del($id){
        return DB::table('y_movies')->where('id',$id)->delete();
    }
    public function upd($id,$data){
        return DB::table('y_movies')->where('id',$id)->update($data);
    }
    public function search($name){
        return DB::select("SELECT * FROM y_movies WHERE `name` LIKE '%$name%'");
    }
    public function find($id){
        return DB::table('y_movies')->where('id',$id)->get()->toArray();
    }
    public function upds($id,$num){
        return DB::table('y_movies')->where('id',$id)->decrement('stock_num',$num);
    }
}