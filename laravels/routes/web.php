<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/find', 'TextController@find');
Route::get('/sel', 'TextController@sel');
Route::post('/ins', 'TextController@ins');
Route::get('/del', 'TextController@del');
Route::get('/upd', 'TextController@upd');
Route::get('/index', 'TextController@index');
Route::get('/boneregisterform', 'TextController@boneregisterform');
Route::post('/boneregisterforms', 'TextController@boneregisterforms');
Route::get('/boneindex', 'TextController@boneindex');
Route::get('/boneloginform', 'TextController@boneloginform');
Route::get('/bonelogin', 'TextController@bonelogin');
Route::get('/boneqiandao', 'TextController@boneqiandao');
Route::get('/dayindex', 'DayController@index');
Route::get('/vue', 'CurlController@index');
Route::get('/student', 'DayController@student');
Route::get('/liuyan', 'DayController@liuyan');
Route::get('/liuyanins', 'DayController@liuyanins');
Route::get('/daysel', 'DayController@sel');
Route::get('/daylogin', 'DayController@login');





Route::get('rbac/login', 'Rbac\LoginController@login');
Route::post('rbac/loginyz', 'Rbac\LoginController@loginyz');
Route::get('rbac/yan', 'Rbac\LoginController@yan');
Route::get('rbac/menuindex', 'Rbac\MenuController@index');
Route::get('rbac/userindex', 'Rbac\UserController@index');
Route::get('rbac/userins', 'Rbac\UserController@ins');
Route::get('/index/captcha/{tmp}', 'RegisterController@captcha');
Route::get('/rbac/userinss', 'Rbac\UserController@inss');
Route::get('/rbac/userdel', 'Rbac\UserController@del');
Route::get('/rbac/userupd', 'Rbac\UserController@upd');
Route::get('/rbac/userupds', 'Rbac\UserController@upds');



Route::get('rbac/roleindex', 'Rbac\RoleController@index');
Route::get('rbac/roleins', 'Rbac\RoleController@ins');
Route::get('/rbac/roleinss', 'Rbac\RoleController@inss');
Route::get('/rbac/roledel', 'Rbac\RoleController@del');
Route::get('/rbac/roleupd', 'Rbac\RoleController@upd');
Route::get('/rbac/roleupds', 'Rbac\RoleController@upds');


Route::get('rbac/contrindex', 'Rbac\ContrController@index');
Route::get('rbac/contrins', 'Rbac\ContrController@ins');
Route::get('/rbac/contrinss', 'Rbac\ContrController@inss');
Route::get('/rbac/contrdel', 'Rbac\ContrController@del');
Route::get('/rbac/contrupd', 'Rbac\ContrController@upd');
Route::get('/rbac/contrupds', 'Rbac\ContrController@upds');

Route::get('/yuekao/login','YuekaoController@login');
Route::get('/yuekao/logins','YuekaoController@logins');
Route::get('/yuekao/zhuce','YuekaoController@zhuce');
Route::get('/yuekao/zhuces','YuekaoController@zhuces');
Route::get('/yuekao/shop','YuekaoController@shop');
Route::get('/yuekao/qiandao','YuekaoController@qiandao');
Route::get('/yuekao/like','YuekaoController@like');
Route::get('/yuekao/dingdan','YuekaoController@dingdan');
Route::get('/yuekao/fk','YuekaoController@fk');
Route::get('/yuekao/one','YuekaoController@one');
Route::get('/yuekao/pinglun','YuekaoController@pinglun');
Route::get('/yuekao/pingluns','YuekaoController@pingluns');
Route::get('/yuekao/st','YuekaoController@st');
Route::post('/yuekao/sts','YuekaoController@sts');
Route::get('/yuekao/xinxi','YuekaoController@xinxi');
Route::get('/yuekao/xinxis','YuekaoController@xinxis');
Route::get('/yuekao/xinxiz','YuekaoController@xinxiz');
Route::get('/login/login','LoginController@login');
Route::get('/login/logins','LoginController@logins');
Route::get('/yuekao/xinxiz','YuekaoController@xinxiz');



Route::get('/suan/index','Suan\DayController@index');
Route::get('/suan/suan','Suan\DayController@suan');
Route::get('/suan/a1','Suan\DayController@a1');
Route::get('/suan/b1','Suan\DayController@b1');
Route::get('/suan/c1','Suan\DayController@c1');
Route::get('/suan/c2','Suan\DayController@c2');



Route::get('/zhoukao/index/','Zhou\ZhouController@index');
Route::get('/zhoukao/ins','Zhou\ZhouController@ins');
Route::get('/zhoukao/inss','Zhou\ZhouController@inss');
Route::get('/zhoukao/login','Zhou\ZhouController@login');
Route::get('/zhoukao/logins','Zhou\ZhouController@logins');
Route::get('/zhoukao/user','Zhou\ZhouController@user');
Route::get('/zhoukao/del','Zhou\ZhouController@del');
Route::get('/zhoukao/jdel','Zhou\ZhouController@jdel');
Route::get('/zhoukao/jdels','Zhou\ZhouController@jdels');
Route::get('/zhoukao/userins','Zhou\ZhouController@userins');
Route::get('/zhoukao/userinss','Zhou\ZhouController@userinss');
Route::get('/zhoukao/zj','Zhou\ZhouController@zj');
Route::get('/zhoukao/jp','Zhou\ZhouController@jp');
Route::get('/zhoukao/jpins','Zhou\ZhouController@jpins');
Route::get('/zhoukao/jpinss','Zhou\ZhouController@jpinss');

Route::post('/artice/add','Zhou\Zhou3Controller@inster');
Route::post('/artice/delete','Zhou\Zhou3Controller@delete');
Route::post('/artice/update/{id}','Zhou\Zhou3Controller@update');
Route::get('/artice/search','Zhou\Zhou3Controller@search');

Route::get('text',function (){
   \Illuminate\Support\Facades\Redis::publish('user-channel', "asdsadsadas");
});
Route::get('/email', 'DayController@email');
Route::get('/queued/{id}', 'MailController@send');


Route::get('/getEs/{megacorp}/{employee}/{id}','Es\ElasticsearchController@getElasticsearchValue');
Route::get('/saveEs/{megacorp}/{employee}','Es\ElasticsearchController@insertElasticsearchValue');
Route::get('/deleteEs/{megacorp}/{employee}/{id}','Es\ElasticsearchController@deleteElasticsearchValue');
Route::get('/insterEs/{megacorp}/{employee}','Es\ElasticsearchController@insterElasticsearchValue');
Route::get('/es/ins','Es\EsController@ins');
Route::post('/es/inster','Es\EsController@inster');
Route::get('/es/index','Es\EsController@index');
Route::get('/es/delete','Es\EsController@delete');
Route::get('/es/upd','Es\EsController@upd');
Route::post('/es/update','Es\EsController@update');




Route::get('/mq/login','Mq\LoginController@login');
Route::post('mq/loginyz', 'mq\MqController@loginyz');
Route::get('mq/shop', 'mq\MqController@shop');
Route::get('mq/shoping', 'mq\MqController@shoping');
Route::post('mq/indent', 'mq\MqController@indent');
Route::get('mq/que', 'mq\MqController@que');

Route::post('admin/ticket/add','yuekao\YueController@addMovie');
Route::post('admin/ticket/delete/{id}','yuekao\YueController@deleteMovie');
Route::post('admin/ticket/update/{id}','yuekao\YueController@updateMovie');
Route::get('admin/ticket/search','yuekao\YueController@searchMovie');
Route::post('/order/ticket/','yuekao\YueController@getOrder');

