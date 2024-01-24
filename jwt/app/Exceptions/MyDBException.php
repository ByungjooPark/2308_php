<?php

namespace App\Exceptions;

use Exception;
use Illuminate\support\facades\Log;

class MyDBException extends Exception
{
    /**
     * 에러 메세지 저장
     * 
     * @return Array 에러메세지 배열
     */
    public function context() {
        return [
            'E80' => ['status' => 500, 'msg' => 'DB 에러']
        ];
    }
}
