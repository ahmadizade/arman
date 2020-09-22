<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function tahator()
    {
        return view('admin.index');
    }

     public function tahator_login()
    {
        return view('admin.login');
    }

}
