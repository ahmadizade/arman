<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Morilog\Jalali\Jalalian;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class ProfileController extends Controller
{

    public function Index()
    {
        return view("profile.index", ["user" => Auth::user(), "menu" => "index"]);
    }

    public function AddProduct()
    {

        $product = Product::orderBy('id', 'desc')->where('user_id', Auth::id())->where('status', 1)->get();

        return view('profile.add_product', ["user" => Auth::user(), "product" => $product, "menu" => "add_product"]);

>>>>>>>>> Temporary merge branch 2
    }

    public function AddProductAction(Request $request)
    {
        $request->validate([
<<<<<<<<< Temporary merge branch 1
            'name' => 'required|alpha|min:3|max:56',
            'price' => 'required|min:3|max:56',
            'mobile' => 'required|min:3|max:14',
            'desc' => 'required|alpha_num|min:10|max:128',
            'discount' => 'required|min:1|max:16',
            'quantity' => 'required|min:1|max:128',
            'stock' => 'required|max:10',
            'file' => 'image|mimes:jpg,jpg,bmp,png|nullable|dimensions:min_width=100,min_height=100|max:2048',
=========
            'name' => 'required|min:3|max:56',
            'price' => 'required|min:3|max:56',
            'mobile' => 'required|min:3|max:14',
            'desc' => 'required|min:10|max:128',
            'discount' => 'required|min:1|max:16',
            'quantity' => 'required|min:1|max:128',
            'stock' => 'required|max:10',
            'file' => 'image|nullable|dimensions:min_width=100,min_height=100|max:2048',
        ]);


        $name = null;
        if (isset($request->file)) {

            $exists = Storage::disk('vms')->exists($request->file('file')->getClientOriginalName());

            if ($exists == true) {

                $name = $name . "-" . time();
                $name = $name . "." . $request->file('file')->getClientOriginalExtension();

                $img = Image::make('uploads/products/' . pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_BASENAME));
                $img->crop(400, 400);
                $img->save('uploads/products/' . $name);

            } else {

                $name = $request->file('file')->getClientOriginalName();
                $img = Image::make($request->file('file'));
                $img->crop(400, 400);
                $img->save('uploads/products/' . $name);

            }

        }


        Product::create([
            "user_id" => Auth::id(),
            "category_id" => "2",
            "product_name" => $request->name,
            "product_slug" => Str::slug($request->name),
            "price" => $request->price,
            "mobile" => $request->mobile,
            "product_desc" => htmlentities($request->desc),
            "discount" => $request->discount,
            "status" => 1,
            "quantity" => $request->quantity,
            "stock" => $request->stock,
            "image" => $name ,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        session()->flash("status", "ثبت کالا با موفقیت انجام شد");
        return back();

    }

    public function DeleteProductAction($id)
    {

        if(isset($id) && is_numeric($id) && $id > 0){

            Product::where('id', $id)->where("user_id",Auth::id())->update(array('status' => 1));

            session()->flash("delete", "حذف کالا با موفقیت انجام شد");

            return back();

        }

        return null;


    }

    public function ViewProductSingle($id)
    {

        $product = Product::where('id', $id)->first();

        return view('profile.single_product', ["product" => $product, "menu" => "add_product"]);

    }

    public function EditProductSingle($id)
    {
        $product = Product::where('id', $id)->first();
        return view('profile.edit_product', ["product" => $product, "menu" => "add_product"]);
    }


    public function ProfileEdit()
    {
        return view("profile.profile", ["user" => Auth::user(),"menu" => "profile"]);
    }

    public function ProfileEditAction(Request $request)
    {
        $request->validate([
            'email' => 'nullable|email|max:255',
            'sex' => 'nullable|max:1',
            'name' => 'nullable|max:255',
            'phone' => 'nullable|max:32',
            'state' => 'nullable|max:3',
            'bank_cart_number' => 'nullable|numeric|max:16',
            'sheba' => 'nullable|max:20',
            "password" => 'nullable|min:6'
        ]);

        $user = Auth::user();

        User::where("mobile", $user->mobile)->update([
            "email" => $request->email,
            "name" => $request->name,
        ]);

        Profile::where("user_id", $user->id)->update([
            "bank_cart_number" => $request->bank_cart_number,
            "sheba" => $request->sheba,
            "phone" => $request->phone,
            "gender" => $request->sex,
            "city_code" => $request->state,
        ]);

        session()->flash("status", "پروفایل با موفقیت بروزرسانی شد");
        if (isset($request->password) && strlen($request->password)) {
            User::where("mobile", $user->mobile)->update([
                "password" => Hash::make($request->password),
            ]);
            session()->flash("status", "پروفایل و رمز عبور شما با موفقیت بروزرسانی شد");
        }

        return back();

    }

    public function ProfileGold(){

        return view("profile.gold", ["menu" => "gold"]);

    }

    public function ProfileGoldAction(Request $request){

        return response()->json(['errors' => 1]);

    }

}
