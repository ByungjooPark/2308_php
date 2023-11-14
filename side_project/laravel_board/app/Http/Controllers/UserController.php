<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginget() {
        return view('login');
    }
    public function loginpost() {
        return '로그인 포스트';
    }
    public function registrationget() {
        return view('registration');
    }
    public function registrationpost() {
        return '회원가입 포스트';
    }
}
