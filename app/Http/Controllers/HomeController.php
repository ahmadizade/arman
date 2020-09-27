<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $last_products = Product::orderBy('id' , 'desc')->orderBy('created_at' , 'desc')->limit(10)->get();
        $popular = Product::orderBy('id' , 'desc')->orderBy('view' , 'desc')->limit(10)->get();
        return view('home' , ['last_products' => $last_products , 'popular' => $popular]);
    }




}
