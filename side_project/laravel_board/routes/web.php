<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BoardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can registrationr web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

// 유저관련
Route::get('/user/login', [UserController::class, 'loginget'])->name('user.login.get'); // 로그인 화면 이동
Route::post('/user/login', [UserController::class, 'loginpost'])->name('user.login.post'); // 로그인 처리
Route::get('/user/registration', [UserController::class, 'registrationget'])->name('user.registration.get'); // 회원가입 화면 이동
Route::post('/user/registration', [UserController::class, 'registrationpost'])->name('user.registration.post'); // 회원가입 처리
Route::get('/user/logout', [UserController::class, 'logoutget'])->name('user.logout.get'); // 로그아웃 처리

// 보드관련
Route::resource('/board', BoardController::class);
// GET|HEAD        board ................... board.index › BoardController@index
// POST            board ................... board.store › BoardController@store
// GET|HEAD        board/create ............ board.create › BoardController@create
// GET|HEAD        board/{board} ........... board.show › BoardController@show
// PUT|PATCH       board/{board} ........... board.update › BoardController@update
// DELETE          board/{board} ........... board.destroy › BoardController@destroy
// GET|HEAD        board/{board}/edit ...... board.edit › BoardController@edit
