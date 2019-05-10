<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/4/30
 * Time: 14:41
 */

namespace App\Http\Controllers\Mq;
use App\Models\mq\Mq_user;
use Illuminate\Http\Request;
class LoginController
{
    private $mq_user = '';
    public function __construct(Mq_user $mq_user)
    {
        $this->mq_user = $mq_user;
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
}