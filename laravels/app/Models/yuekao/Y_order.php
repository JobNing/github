<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/5/7
 * Time: 9:49
 */

namespace App\Models\yuekao;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Y_order extends Model
{
    public function add($data){
        return DB::table('y_orders')->insert($data);
    }
}