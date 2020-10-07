<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function adminlogin()
    {
        return view('adminlogin');
    }
    public function admindashboard()
    {
        //$webinar1 = DB::table('webinar1')->get();
        $webinar1 = \App\Webinar1::all();
        return view('admindashboard', ['webinar1' => $webinar1]);
    }
    public function adminsendlink()
    {
        return view('adminsendlink');
    }
    public function adminsendcertificate()
    {
        return view('adminsendcertificate');
    }
}