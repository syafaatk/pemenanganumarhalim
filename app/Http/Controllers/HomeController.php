<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function index()
    {
        return view('welcome');
    }

    // public function test()
    // {
    //     return view('app/home');
    // }
}
