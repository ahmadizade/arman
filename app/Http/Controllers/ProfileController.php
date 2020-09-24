<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function Index()
    {
        return view("profile.index", ["user" => Auth::user()]);
    }

    public function AddProduct()
    {
        return view('profile.add_product', ["user" => Auth::user()]);
    }
}
