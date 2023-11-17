<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// 라우트 그룹
Route::prefix('/item')->group( function() {
    Route::get('/', [ItemController::class, 'index']); // 게시글 전체 조회
    Route::post('/', [ItemController::class, 'store']); // 게시글 작성
    Route::put('/{id}', [ItemController::class, 'update']); // 게시글 수정
    Route::delete('/{id}', [ItemController::class, 'destroy']); // 게시글 삭제
});
// GET|HEAD  api/item ....................... ItemController@index
// POST      api/item ....................... ItemController@store
// PUT       api/item/{id} .................. ItemController@update
// DELETE    api/item/{id} .................. ItemController@destroy
