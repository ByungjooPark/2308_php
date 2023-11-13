<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// ----------------
// 라우트 정의
// ----------------
// 문자열 리턴
Route::get('/hi', function () {
    return '안녕하세요.';
});

// 뷰 리턴(뷰 파일이 없으면 에러발생, 디버그모드 설정이 false면 500에러, true면 에러의 상세정보 출력)
Route::get('/myview', function () {
    return view('myview');
});


// ----------------
// HTTP 메소드 대응하는 라우터
// 여러 라우터에 해당될 경우 가장 마지막에 정의 된것이 실행
// ----------------
// GET 요청
Route::get('/home', function () {
    return view('home');
});

// POST 요청
Route::post('/home', function () {
    return '메소드 : POST';
});

// PUT 요청
// view의 form에 [@method('PUT')]을 추가
Route::put('/home', function () {
    return '메소드 : PUT';
});

// DELETE 요청
Route::delete('/home', function () {
    return '메소드 : DELETE';
});


// ----------------
// 라우트에서 파라미터 제어
// ----------------
// 쿼리 스트링에 파라미터가 셋팅되서 요청이 올 때 파라미터 획득
Route::get('/query', function (Request $request) {
    return $request->id.", ".$request->name;
});

// URL 세그먼트로 지정 파라미터 획득
Route::get('/segment/{id}', function ($id) {
   return '세그먼트 파라미터 : '.$id;
});

// 2개 이상의 URL 세그먼트로 지정 파라미터 획득
Route::get('/segment/{id}/{name}', function ($id, $name) {
    return '세그먼트 파라미터 2개이상 : '.$id.', '.$name;
});

// 이렇게도 파라미터 획득 가능
Route::get('/segment2/{id}/{name}', function (Request $request, $id) {
    // return '세그먼트 파라미터 22222 : '.$request->id.', '.$id.', '.$request->name;
    return var_dump($request);
});

// URL 세그먼트로 지정 파라미터 획득 : 기본값 설정
Route::get('/segment3/{id?}', function ($id = 'base') {
    return 'segment3 : '.$id;
});

// -------------
// 라우트 매칭 실패시 대체 라우트 정의
// -------------
Route::fallback(function () {
    return '이상한 URL 입니다.';
});


// ----------------
// 라우트의 이름 지정
// ----------------
Route::get('/name', function () {
    return view('name');
});

Route::get('/name/home/php504/root', function () {
    return '이름 없는 라우트';
});

Route::get('/name/home/php504/user', function () {
    return '이름 있는 라우트';
})->name('name.user');


// ---------------
// 컨트롤러
// ---------------
// 커멘드로 컨트롤러 생성 : php artisan make:controller 컨트롤러명
use App\Http\Controllers\TestController;
Route::get('/test', [TestController::class, 'index'])->name('test.index');

// 모든 액션 메소드를 자동으로 생성
// php artisan make:controller 컨트롤러명 --resource
use App\Http\Controllers\TaskController;
Route::resource('/task', TaskController::class);
//GET|HEAD        task .................... task.index › TaskController@index  
//POST            task .................... task.store › TaskController@store  
//GET|HEAD        task/create ............. task.create › TaskController@create  
//GET|HEAD        task/{task} ............. task.show › TaskController@show  
//PUT|PATCH       task/{task} ............. task.update › TaskController@update  
//DELETE          task/{task} ............. task.destroy › TaskController@destroy  
//GET|HEAD        task/{task}/edit ........ task.edit › TaskController@edit


// 블레이드 템플릿 용
Route::get('/child1', function () {
    $arr = [
        'name' => '홍길동'
        ,'age' => 130
        ,'gender' => '여자'
    ];
    $arr2 = [];
    return view('child1')
            ->with('gender', '3')
            ->with('data', $arr)
            ->with('data2', $arr2);
});
Route::get('/child2', function () {
    return view('child2');
});