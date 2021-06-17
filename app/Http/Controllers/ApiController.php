<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getArticle() {
        $articles = Blog::all();
        return response()->json($articles, 200);
    }
}
