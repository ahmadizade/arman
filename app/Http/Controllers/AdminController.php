<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;

class AdminController extends Controller
{
    //admin-page
    public function tahator()
    {
        $user_count = DB::table('users')->count();
        return view('admin.index', ['user_count' => $user_count]);
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

    public function search_user(request $request)
    {
        $mobile = self::faToEn($request->mobile);

        $data = DB::table('users')->where('mobile', $mobile)->first();

        $validate = Validator::make($request->all(), [
            'mobile' => 'required|digits:11',
        ]);

        if ($validate->fails()) {
            return Response::json(["status" => "0", "desc" => "شماره موبایل اشتباه می باشد"]);
        } else {
            return Response::json($data);
        }
    }

    //save user change from admin first page
    public function save_user(request $request)
    {
        $validator = Validator::make($request->all(), [
            'res_mobile' => ['string', 'max:455',],
            'res_name' => ['string', 'max:455',],
            'res_role' => ['string', 'max:1900',],
            'res_verified' => ['string', 'max:255',],
            'res_user_mode' => ['string', 'max:255'],
            'res_email' => ['string', 'max:255'],
            'res_credit' => ['string', 'max:255'],
            'res_updated_at' => ['string', 'max:255'],
        ]);
        if ($validator->fails()) {
//            Session:: flash('error', 'مقادیر وارد شده صحیح نیست');
//            return back()->withErrors($validator)->withInput();
            return Response::json(["status" => "0", "desc" => "اطلاعات غلطه"]);
        } else {
//            $user = DB::table('users')->where('mobile', $request->res_mobile)->first();
//            $user->name = $request->res_name;
//            $user->role = $request->res_role;
//            $user->verified = $request->res_verified;
//            $user->user_mode = $request->res_user_mode;
//            $user->email = $request->res_email;
//            $user->credit = $request->res_credit;
//            $user->updated_at = Jalalian::now();
//            $user->save();
            return Response::json(["status" => "1", "desc" => "ذخیره با موفقیت انجام شد"]);
        }
    }
    //save user change from admin first page

}
