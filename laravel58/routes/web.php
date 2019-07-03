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
    return view('/admin/admin/index/login');
});//login

Route::any('/login/admin-info',function(){
    return view('/admin/admin/index/admin-info');
});//admin-info
Route::any('/login/article-add',function(){
    return view('/admin/admin/index/article-add');
});//article-add
Route::any('/login/article-detail',function(){
    return view('/admin/admin/index/article-detail');
});//article-detail
Route::any('/login/article-list',function(){
    return view('/admin/admin/index/article-list');
});//article-list
Route::any('/login/column-danye-detail',function(){
    return view('/admin/admin/index/column-danye-detail');
});//column-danye-detail
Route::any('/login/danye-detail',function(){
    return view('/admin/admin/index/danye-detail');
});//danye-detail
Route::any('/login/danye-list',function(){
    return view('/admin/admin/index/danye-list');
});//danye-list
Route::any('/login/email',function(){
    return view('/admin/admin/index/email');
});//email
Route::any('/login/email-write',function(){
    return view('/admin/admin/index/email-write');
});//email-write
Route::any('/index',function(){
    return view('/admin/admin/index/index');
});//index
Route::any('/login/menu1',function(){
    return view('/admin/admin/index/menu1');
});//menu1
Route::any('/login/menu2',function(){
    return view('/admin/admin/index/menu2');
});//menu2
Route::any('/login/menu-add',function(){
    return view('/admin/admin/index/menu-add');
});//menu-add
Route::any('/login/menu-add2',function(){
    return view('/admin/admin/index/menu-add2');
});//menu-add2
Route::any('/login/rbac-user-list',function(){
    return view('/admin/admin/index/rbac-user-list');
});//rbac-user-list
Route::any('/login/system',function(){
    return view('/admin/admin/index/system');
});//system
Route::any('/login/welcome',function(){
    return view('/admin/admin/index/welcome');
});//welcome



