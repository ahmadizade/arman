<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    //admin-page
    public function tahator()
    {
        $lastmonth = DB::table('users')->where('created_at', ">=", Carbon::today()->subMonth())->count();
        $lastweek = DB::table('users')->where('created_at', ">=", Carbon::today()->subWeek())->count();
        $today = DB::table('users')->where('created_at', ">=", Carbon::today())->count();
        $user_count = DB::table('users')->count();
        $product_count = DB::table('products')->count();
        $product_month = DB::table('products')->where('created_at', ">=", Carbon::today()->subMonth())->count();
        $product_week = DB::table('products')->where('created_at', ">=", Carbon::today()->subWeek())->count();
        $product_today = DB::table('products')->where('created_at', ">=", Carbon::today())->count();
        return view('admin.index', ['user_count' => $user_count, 'lastmonth' => $lastmonth, 'lastweek' => $lastweek, 'today' => $today, 'product_count' => $product_count, 'product_month' => $product_month, 'product_week' => $product_week, 'product_today' => $product_today]);
    }

    //admin-page-login
    public function tahator_login()
    {
        return view('admin.login');

    }

    public function AdminLoginAction(request $request)
    {
        $request = $request->replace(self::faToEn($request->all()));
        $request->validate([
            'mobile' => 'required|digits:11',
            'password' => 'required|min:6|max:20',
        ]);
        $user = DB::table('users')->where('permission', '99')->where('role', 'admin')->where('password', $request->password)->where('mobile', $request->mobile)->get();
        if ($user !== null) {
            return view('admin.index', ['user' => $user]);
        } else {
            Session::flash('error', 'شما امکان ورود به سامانه ثمین را ندارید');
            return back();
        }
    }

    public function AdminUsers()
    {
        return view('admin.users');
    }


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
            'res_mobile' => ['required', 'string', 'min:10', 'max:56',],
            'res_name' => ['required', 'string', 'min:5', 'max:128',],
            'res_role' => ['required', 'string', 'max:56',],
            'res_verified' => ['required', 'string', 'max:56',],
            'res_user_mode' => ['required', 'string', 'max:56'],
            'res_email' => ['required', 'string', 'min:10', 'max:128'],
            'res_credit' => ['required', 'string', 'max:56'],
            'res_updated_at' => ['required', 'string', 'max:56'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
//            return back()->withErrors($validator)->withInput();
        } else {
//            $user = DB::table('users')->where('mobile', $request->res_mobile)->first();
            $user = User::where('mobile', $request->res_mobile)->first();
            $user->name = $request->res_name;
            $user->mobile = $request->res_mobile;
            $user->role = $request->res_role;
            $user->verified = $request->res_verified;
            $user->user_mode = $request->res_user_mode;
            $user->email = $request->res_email;
            $user->credit = $request->res_credit;
            $user->updated_at = Jalalian::now();
            $user->save();
            return Response::json(["status" => "1", "desc" => "ذخیره با موفقیت انجام شد"]);
        }
    }
    //save user change from admin first page




    public function GetUser()
    {
        return datatables()->of(DB::table('users'))->toJson();
    }



}
