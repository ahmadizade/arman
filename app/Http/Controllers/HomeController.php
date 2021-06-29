<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function sitemap(){

        $sitemap = App::make('sitemap');

        $sitemap->setCache('laravel.sitemap', 10);

        $sitemap->add(URL::to('home'), \Illuminate\Support\Carbon::now(), '1.0','daily');
        $sitemap->add(URL::to('about_Us'), Carbon::now(), '0.6','weekly');
        $sitemap->add(URL::to('seo'), Carbon::now(), '0.6','weekly');
        $sitemap->add(URL::to('Category'), Carbon::now(), '0.6','weekly');
        $sitemap->add(URL::to('policy'), Carbon::now(), '0.6','weekly');


        $category = DB::table('category')->get();
        if(isset($category)){
            foreach ($category as $item) {
                $sitemap->add(route("category",["name" => $item->name]), Carbon::now(), '0.7','monthly');
            }
        }

        $mag = DB::table('blog')->get();
        if(isset($mag)){
            foreach ($mag as $item) {
                $sitemap->add(route("single_mag",["slug" => $item->slug]), Carbon::now(), '0.7','monthly');
            }
        }

        $product = DB::table('products')->where("status","1")->get();
        if(isset($product)){
            foreach ($product as $item) {
                $sitemap->add(route("single_product",["slug" => $item->product_slug]), Carbon::now(), '0.9','monthly');
            }
        }
        $sitemap->store('xml', 'sitemap');
    }

    public function index()
    {
        $popularproduct = Product::orderBy('view' , 'desc')->limit(10)->get();
        $lastProduct = Product::where('type' , 'table')->orderBy('id' , 'asc')->limit(7)->get();
        $mostVisited = Product::where('type' , 'table')->orderBy('view' , 'desc')->limit(10)->get();
        $apiMostVisited = Product::where('type' , 'api')->orderBy('view' , 'desc')->limit(10)->get();
        return view('home' , ['mostVisited' => $mostVisited ,'apiMostVisited' => $apiMostVisited ,'popularproduct' => $popularproduct , 'lastProduct' => $lastProduct]);
    }

    public function Category($slug){
        $Category = Category::where('slug' , $slug)->first();
        if(isset($Category->id)) {
            $products = Product::where('category_id', $Category->id)->orderBy('id', 'desc')->get();
            $mostViewproducts = Product::where('category_id', $Category->id)->orderBy('view', 'desc')->get();
            $popularproduct = Product::where('category_id' , $Category->id)->orderBy('view', 'desc')->limit(10)->get();
            $lastProduct = Product::where('category_id' , $Category->id)->orderBy('id', 'asc')->limit(7)->get();
            $mostVisited = Product::where('category_id' , $Category->id)->orderBy('view', 'desc')->limit(10)->get();
            return view('category', ['Category' => $Category, 'products' => $products, 'mostViewproducts' => $mostViewproducts, 'popularproduct' => $popularproduct, 'lastProduct' => $lastProduct, 'mostVisited' => $mostVisited]);
        }
        return abort(404);
    }

    public function contact(){
        return view('contact');
    }

    public function policy(){
        return view('policy');
    }

    public function contactAction(Request $request){
        $request = $request->replace(self::faToEn($request->all()));
        $request->validate([
            'name' => 'required|min:3|max:100',
            'mobile' => 'required|min:3|max:100',
            'desc' => 'required|min:3|max:10000',
        ]);
        if (Auth::check()){
            $user_id = Auth::id();
        }else{
            $user_id = "";
        }
        Contact::create([
            "user_id" => $user_id,
            "name" => $request->name,
            "mobile" => $request->mobile,
            "body" => $request->desc,
            "created_at" => Carbon::now(),
        ]);
        return Response::json(['status' => 1 , 'desc' => "پیام شما با موفقیت ارسال شد"]);
    }

    public function AboutUs(){
        return view('about');
    }

    public function seo(){
        return view('seo');
    }

    public function download($filename){
        $file_path = public_path('uploads/file/'.$filename);
        return response()->download($file_path);
    }
}
