<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Support\Facades\Log;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * 커스텀
     */
    public function render($request, Throwable $exception){
        $errCode = ['E01', 'E02'];

        Log::debug($request->ip()." : ".$exception->getMessage());

        $code = $exception->getMessage();

        if(!in_array($code, $errCode)) {
            $code = 'E99';
        }

        return response()->json([
            'message' =>  $code
        ], 500);
    }
}
