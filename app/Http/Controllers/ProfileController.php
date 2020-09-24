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

    public function ProfileEdit(){
        return view("profile.profile",["user" => Auth::user()]);
    }

    public function ProfileEditAction(Request $request){

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

        User::where("mobile",$user->mobile)->update([
            "email" => $request->email,
            "name" => $request->name,
        ]);

        Profile::where("user_id",$user->id)->update([
            "bank_cart_number" => $request->bank_cart_number,
            "sheba" => $request->sheba,
            "phone" => $request->phone,
            "gender" => $request->sex,
            "city_code" => $request->state,
        ]);

        session()->flash("status","پروفایل با موفقیت بروزرسانی شد");

        if(isset($request->password) && strlen($request->password)){
            User::where("mobile",$user->mobile)->update([
                "password" => Hash::make($request->password),
            ]);
            session()->flash("status","پروفایل و رمز عبور شما با موفقیت بروزرسانی شد");
        }

        return back();

    }

    public function AddProduct()
    {
        return view('profile.add_product', ["user" => Auth::user()]);
    }
}
