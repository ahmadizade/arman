<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;

class ProfileController extends Controller
{

    public function Index()
    {
        return view("profile.index", ["user" => Auth::user()]);
    }

    public function AddProduct()
    {
        $product = Product::orderBy('id' , 'desc')->where('user_id' , Auth::id())->get();
        return view('profile.add_product', ["user" => Auth::user() , "product" => $product]);
    }

    public function AddProductAction(Request $request)
    {
        $request->validate([
            'name' => 'nullable|max:255',
            'price' => 'nullable|max:128',
            'mobile' => 'nullable|max:32',
            'desc' => 'nullable|max:512',
            'discount' => 'nullable|max:128',
            'quantity' => 'nullable|numeric|max:128',
            'stock' => 'nullable|max:32',
            'file' => 'image|mimes:jpg,jpeg,bmp,png|nullable',
        ]);

        if (isset($request->file)) {
            $exists = Storage::disk('vms')->exists($request->file('file')->getClientOriginalName());
            if ($exists == true) {
                $name = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME);
                $name = $name . "-" . time();
                $name = $name . "." . $request->file('file')->getClientOriginalExtension();
                Storage::disk('vms')->put($name, file_get_contents($request['file']));
            } else {
                $name = $request->file('file')->getClientOriginalName();
                Storage::disk('vms')->put($request->file('file')->getClientOriginalName(), file_get_contents($request['file']));
            }


            Product::create([
                "user_id" => Auth::id(),
                "category_id" => "2",
                "product_name" => $request->name,
                "product_slug" => Str::slug($request->name),
                "price" => $request->price,
                "mobile" => $request->mobile,
                "product_desc" => $request->desc,
                "discount" => $request->discount,
                "status" => "0",
                "quantity" => $request->quantity,
                "stock" => $request->stock,
                "image" => $name,
                "created_at" => Jalalian::now(),
                "updated_at" => Jalalian::now(),
            ]);

            session()->flash("status", "ثبت کالا با موفقیت انجام شد");
            return back();
        }
        session()->flash("error", "اطلاعات وارد شده صحیح نیست");
        return back();
    }
    public function DeleteProductAction (Request $request)
    {
        return $request;
    }

    public function ProfileEdit()
    {
        return view("profile.profile", ["user" => Auth::user()]);
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

}
