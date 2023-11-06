<?php

//namespace: packageみたいなもの
namespace App\Http\Controllers;

//programmの読み込み：importみたいなもの

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function about() {
        return view('about');
    }
    function search(Request $request)
    {
    //dd($request)
    //$keyword = $request -> q;
    //$message = "キーワードは{$keyword}です。";
    //return $message;

    $data = [
        'keyword' => $request ->q
    ];
    //viewfileにdata を渡す
    return view('search', $data);

    }
}