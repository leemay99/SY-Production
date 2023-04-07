<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Hello;

class HelloController extends Controller
{
    public function index()
    {
        $data = [
            'msg'=>'お名前をお書き下さい。',
        ];
        return view('hello.index', $data);
    }

     public function post(Request $request)
    {
        $msg = $request->msg;
        $data = [
            'msg'=>'こんにちは、' . $msg . 'さん！',
        ];
        return view('hello.index',$data);
    }
}