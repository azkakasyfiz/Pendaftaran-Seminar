<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function home()
    {
        return view('main');
    }
    public function detail()
    {
        return view('detail');
    }
    public function join()
    {
        return view('join');
    }
    public function success()
    {
        return view('success');
    }
    public function welcome()
    {
        return view('welcome');
    }
}
