<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function index() {
        return view('test')->with('data', '미스터 존');
    }
}
