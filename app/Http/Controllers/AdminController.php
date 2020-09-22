<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //admin-page
    public function tahator()
    {
        return view('admin.index');
    }

    //admin-page-login
    public function tahator_login()
    {
        return view('admin.login');
    }

    //admin-page.register
    public function tahator_register()
    {
        return view('admin.register');
    }

}
