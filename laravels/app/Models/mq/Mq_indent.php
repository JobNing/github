<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/4/28
 * Time: 19:48
 */
namespace App\Models\mq;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mq_indent extends Model
{
    public function ins($data){
        return DB::table('mq_indents')->insert(
                [
                    'shopnum'=> $data['shop_num'],
                    'shopid' => $data['shop_id'],
                    'user' => $data['user_id'],
                    'indentid' => $data['indent']
                ]
        );
    }
    public function upd($indentid)
    {
        return DB::table('mq_indents')->where('indentid', $indentid)->update(['state' => '1']);
    }
}