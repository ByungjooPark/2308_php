<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class MyUserValidation
{
    // 파일 생성 명령어
    // php artisan make:middleware 미들웨어명
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        Log::debug("************ 유저 유효성 체크 시작 ************");
        // 항목 리스트
        $arrBaseKey = [
            'email'
            ,'name'
            ,'password'
            ,'passwordchk'
        ];
        // 유효성 체크 리스트
        $arrBaseValidation = [
            'email'         => 'required|email|max:50'
            ,'name'         => 'required|regex:/^[a-zA-Z가-힣]+$/|min:2|max:50'
            ,'password'     => 'required'
            ,'passwordchk'  => 'same:password'
            ,'tel'          => 'regex:/^[010][0-9]{4}[0-9]{4}$/'
        ];
        // request 파라미터
        $arrRequestParam = [];
        foreach($arrBaseKey as $val) {
            if($request->has($val)) {
                $arrRequestParam[$val] = $request->$val;
            } else {
                unset($arrBaseValidation[$val]);
            }
        }
        Log::debug("리퀘스트 파라미터 획득", $arrRequestParam);
        Log::debug("유효성 체크 리스트 획득", $arrBaseValidation);

        // 유효성 검사
        $validator = Validator::make($arrRequestParam, $arrBaseValidation);

        // 유효성 검사 실패시 처리
        if($validator->fails()){
            Log::debug("************ 유저 유효성 체크 에러 종료 ************");
            return redirect('/'.$request->path())->withErrors($validator->errors());
        }

        Log::debug("************ 유저 유효성 체크 정상 종료 ************");
        return $next($request);
    }
}
