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

        $sitemap->add(URL::to('index'), \Illuminate\Support\Carbon::now(), '1.0','daily');
        $sitemap->add(URL::to('about'), Carbon::now(), '0.6','weekly');
        $sitemap->add(URL::to('contact'), Carbon::now(), '0.6','weekly');
        $sitemap->add(URL::to('policy'), Carbon::now(), '0.6','weekly');

        $category = DB::table('category')->get();
        if(isset($category)){
            foreach ($category as $item) {
                $sitemap->add(route("category",["name" => $item->name]), Carbon::now(), '0.7','monthly');
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
//        $popularshop = Store::inRandomOrder()->orderBy('id' , 'desc')->orderBy('like' , 'desc')->limit(12)->get();
        $popularproduct = Product::orderBy('view' , 'desc')->limit(10)->get();
//        $randomShop = Store::inRandomOrder()->limit(12)->get();
        $randomShop = Store::orderBy('id' , 'asc')->limit(7)->get();
//        $lastProduct = Product::orderBy('id' , 'desc')->limit(12)->get();
        $lastProduct = Product::orderBy('id' , 'asc')->limit(7)->get();
        $mostVisited = Product::orderBy('view' , 'desc')->limit(10)->get();
        return view('home' , ['mostVisited' => $mostVisited ,'popularproduct' => $popularproduct , 'randomShop' => $randomShop, 'lastProduct' => $lastProduct]);
    }

    public function Category($name){
        $Category = Category::where('name' , $name)->first();
        $products = Product::where('category_id' , $Category->id)->orderBy('id' , 'desc')->get();
        $mostViewproducts = Product::where('category_id' , $Category->id)->orderBy('view' , 'desc')->get();
        $popularproduct = Product::orderBy('view' , 'desc')->limit(10)->get();
        $lastProduct = Product::orderBy('id' , 'asc')->limit(7)->get();
        $mostVisited = Product::orderBy('view' , 'desc')->limit(10)->get();
        return view('category' , ['Category' => $Category , 'products' => $products, 'mostViewproducts' => $mostViewproducts, 'popularproduct' => $popularproduct, 'lastProduct' => $lastProduct, 'mostVisited' => $mostVisited]);
    }

    public function contact(){
        return view('contact');
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
        session()->flash("status","فرم شما با موفقیت ثبت شد. در صورت لزوم کارشناسان ما با شما تماس خواهند گرفت");
        return back();
    }

    public function AboutUs(){
        return view('about');
    }

    public function download($filename){
        $file_path = public_path('uploads/file/'.$filename);
        return response()->download($file_path);
    }
}
