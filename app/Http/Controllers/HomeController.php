<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\DomainSearch;
use App\Models\Product;
use App\Models\Product_tag;
use App\Models\Rating;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function sitemap(){

        $sitemap = App::make('sitemap');

        $sitemap->setCache('laravel.sitemap', 10);

        $sitemap->add(URL::to('home'), \Illuminate\Support\Carbon::now(), '1.0','weekly');
        $sitemap->add(URL::to('about_Us'), Carbon::now(), '0.6','weekly');
        $sitemap->add(URL::to('contact'), Carbon::now(), '0.6','weekly');
        $sitemap->add(URL::to('seo'), Carbon::now(), '0.6','weekly');
        $sitemap->add(URL::to('Category'), Carbon::now(), '0.6','weekly');
        $sitemap->add(URL::to('policy'), Carbon::now(), '0.6','weekly');
        $sitemap->add(URL::to('tag'), Carbon::now(), '0.6','weekly');


        $category = DB::table('category')->get();
        if(isset($category)){
            foreach ($category as $item) {
                $sitemap->add(route("single_category",["slug" => $item->slug]), Carbon::now(), '0.7','monthly');
            }
        }

        $tag = DB::table('product_tag')->get();
        if(isset($tag)){
            foreach ($tag as $item) {
                $sitemap->add(route("single_category",["slug" => $item->slug]), Carbon::now(), '0.7','monthly');
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
        $lastProduct = Product::where('delete' , 0)->orderBy('id' , 'desc')->limit(8)->get();
        $blog_posts = Blog::where('delete' , 0)->orderBy('id' , 'desc')->limit(3)->get();
        $popularproduct = Product::where('delete' , 0)->orderBy('view' , 'desc')->limit(8)->get();
        $apiMostVisited = Product::where('delete' , 0)->orderBy('view' , 'desc')->limit(10)->get();
        return view('home' , ['popularproduct' => $popularproduct ,'blog_posts' => $blog_posts ,'apiMostVisited' => $apiMostVisited , 'lastProduct' => $lastProduct]);
    }
    public function category(){
        $category = Category::where('delete', 0)->get();
        return view('category', ['thecategory' => $category]);
    }
    public function singleCategory($slug){
        $Category = Category::where('slug' , $slug)->first();
        if(isset($Category->id)) {
            $products = Product::where('delete' , 0)->where('category_id', $Category->id)->orderBy('id', 'desc')->get();
            $lastProduct = Product::where('delete' , 0)->where('category_id' , $Category->id)->orderBy('id', 'asc')->limit(7)->get();
            $popularproduct = Product::where('delete' , 0)->where('category_id' , $Category->id)->orderBy('view', 'desc')->limit(10)->get();
            return view('single_category', ['singleCategory' => $Category, 'products' => $products, 'lastProduct' => $lastProduct, 'popularproduct' => $popularproduct]);
        }
        return abort(404);
    }

        public function Tag($slug){
        $tag = Product_tag::where('slug' , $slug)->first();
        if(isset($tag->id)) {
            $products = Product::where('tag_id', $tag->id)->orderBy('id', 'desc')->get();
            $mostViewproducts = Product::where('tag_id', $tag->id)->orderBy('view', 'desc')->get();
            $popularproduct = Product::where('tag_id' , $tag->id)->orderBy('view', 'desc')->limit(10)->get();
            $lastProduct = Product::where('tag_id' , $tag->id)->orderBy('id', 'asc')->limit(7)->get();
            $mostVisited = Product::where('tag_id' , $tag->id)->orderBy('view', 'desc')->limit(10)->get();
            return view('tag', ['tag' => $tag, 'products' => $products, 'mostViewproducts' => $mostViewproducts, 'popularproduct' => $popularproduct, 'lastProduct' => $lastProduct, 'mostVisited' => $mostVisited]);
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
            $user_id = 0;
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

    public function quickView(Request $request){
        $product = Product::where('id', $request->product_id)->first();
        if (isset($product->id)){
            return view('partials.quick_view_product',['product' => $product]);
        }
    }

    public function Rate(Request $request){

        if (Auth::check()){
        if (isset($request->rate) && isset($request->product_id) && $request->rate > 0){
            $rate = Rating::where('user_id', Auth::id())->where('product_id', $request->product_id)->first();
            if (isset($rate->id) && $rate->id > 0){
                return Response::json(["status" => 0, "desc" => "شما قبلا به این محصول رای داده اید!"]);
            }else{
                $product = Product::where('id', $request->product_id)->first();
                if (isset($product->id)){
                    $rate_count = $product->rate_count + 1;
                    $rate_score = $product->rate_score + $request->rate;
                    Product::where('id', $request->product_id)->update([
                        'rate_count' => $rate_count,
                        'rate_score' => $rate_score,
                    ]);
                    Rating::create([
                        'user_id' => Auth::id(),
                        'product_id' => $request->product_id,
                        'rate' => $request->rate,
                        'created_at' => Carbon::now(),
                    ]);
                    return Response::json(["status" => 1, "desc" => "امتیاز شما با موفقیت ثبت گردید"]);
                }
            }
        }else{
            return Response::json(["status" => 0, "desc" => "در حال حاضر امکان رای دادن وجود ندارد!"]);
        }
        }else{
            return Response::json(["status" => 0, "desc" => "شما هنوز ثبت نام نکرده اید!"]);
        }
    }
}
