<?php

use Illuminate\Support\Facades\Route;

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
    $data = ['name' => '루트', 'id' => 1];
    return view('welcome')->with('data', json_encode($data));
});

Route::get('/login', function () {
    $data = ['name' => '로그인', 'id' => 1];
    return view('welcome')->with('data', json_encode($data));
});

Route::get('/board', function () {
    $data = ['name' => '보드', 'id' => 1];
    return view('welcome')->with('data', json_encode($data));
});