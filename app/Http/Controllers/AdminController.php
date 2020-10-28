<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Store;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;
use phpDocumentor\Reflection\Types\Self_;
use function Sodium\increment;
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
//        $product_week = DB::table('products')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $product_today = DB::table('products')->where('created_at', ">=", Carbon::today())->count();
        return view('admin.views.index', ['user_count' => $user_count, 'lastmonth' => $lastmonth, 'lastweek' => $lastweek, 'today' => $today, 'product_count' => $product_count, 'product_month' => $product_month, 'product_week' => $product_week, 'product_today' => $product_today]);
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
        return view('admin.views.users');
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
            'res_email' => ['string', 'min:10', 'max:128'],
            'res_credit' => ['string', 'max:56', 'nullable'],
            'res_password' => ['string', 'min:6', 'max:56', 'nullable'],
            'res_updated_at' => ['date', 'max:56', 'nullable'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $user = User::where('mobile', $request->res_mobile)->first();
            $user->name = $request->res_name;
            $user->mobile = $request->res_mobile;
            $user->role = $request->res_role;
            $user->verified = $request->res_verified;
            $user->user_mode = $request->res_user_mode;
            $user->email = $request->res_email;
            $user->credit = $request->res_credit;
            $password = Hash::make('$request->res_password');
            $user->password = $password;
            $user->updated_at = Carbon::now();
            $user->save();
            return Response::json(["status" => "1", "desc" => " ذخیره اطلاعات $request->res_name با موفقیت انجام شد "]);
        }
    }

//admin send sms to users
    public function SmsUser(Request $request)
    {
        $mobile = $request->mobile;
        $content = $request->sms_content;
        self::sms($mobile, $content);
        return "send-ok";
    }

    public function EmailUser(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $email = $user->email;
        $content = $request->email_content;
        $name = $user->name;
        $view = 'from_admin';
        $subject = 'Www.SaminTakhfif.Com';
        $title = 'پشتیبانی سایت ثمین تخفیف';
        self::email($email, $view, $content, $title, $subject);
    }

    //save user change from admin first page
    public function GetUser()
    {
        return datatables()->of(DB::table('users'))->toJson();
    }

    public function Store_GetReport()
    {
        return datatables()->of(DB::table('report'))->toJson();
    }

    public function DeleteUserAction(request $request)
    {
        $id = self::faToEn($request['id']);

        if (isset($id) && is_numeric($id) && $id > 0) {

            $user_delete = DB::table('users')->where('id', $request['id'])->delete();
            return "DONE";
        }
    }

    public function EditUserAction(request $request)
    {
        return view('admin.edit_user', ["id" => $request['id']]);
    }

    public function credit()
    {
        return view('admin.views.credit.credit');
    }

    public function SuggestionAction(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("users")
                ->select("id", "name", "credit", "mobile")
                ->where('name', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($data);
    }

    public function CreditShowAction(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        return Response::json($user);
    }

    public function CreditChargeAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'numeric', 'digits_between:1,5'],
            'new_credit' => ['required', 'numeric', 'digits_between:1,10'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $user = User::where('id', $request->user_id)->first();
            if ($request->new_credit > 0 && is_numeric($request->new_credit)) {
                if ($request->operation == 'sum') {
                    $credit = $user->credit + $request->new_credit;
                    $user->credit = $credit;
                    $user->save();
                    return response()->json(['sum' => 'done', 'credit' => $request->new_credit, 'credit_now' => $user->credit]);
                } elseif ($request->operation == 'minus') {
                    $credit = $user->credit - $request->new_credit;
                    $user->credit = $credit;
                    $user->save();
                    return response()->json(['minus' => 'done', 'credit' => $request->new_credit, 'credit_now' => $user->credit]);
                }
            } else {
                return response()->json(['errors' => "مقدار وارد شده صحیح نمی باشد"]);
            }
        }
    }

//CONTACT US  CONTACT US  CONTACT US  CONTACT US  CONTACT US  CONTACT US  CONTACT US  CONTACT US  CONTACT US
    public function ContactUs()
    {
        return view('admin.views.contactus');
    }

    public function ContactUs_GetUser()
    {
        return datatables()->of(DB::table('contact')->orderBy('created_at', 'desc'))->toJson();

    }

    //admin send sms to users
    public function ContactUs_SmsUser(Request $request)
    {
        {
            $data = Contact::where('id', $request->id)->first();
            $mobile = $data->mobile;
            $content = $request->sms_content;
            self::sms($mobile, $content);
            $data->answer_at = Carbon::now();
            $data->save();
        }
    }

    public function ContactUs_EmailUser(Request $request)
    {
        if (isset($request->mobile) && $request->mobile !== ""){
            $user = User::where('mobile', $request->mobile)->first();
        }else{
            $user = User::where('id', $request->user_id)->first();
        }
        if ($user == "" || $user->email == "") {
            return response()->json(['status' => 'متاسفانه این کاربر دارای ایمیل نیست']);
        } else {
            $email = $user->email;
            $content = $request->email_content;
            $view = 'from_admin';
            $subject = 'Www.SaminTakhfif.Com';
            $title = 'پاسخ ایمیل شما';
            self::email($email, $view, $content, $title, $subject);
            $data = Contact::where('id', $request->id)->first();
            $data->answer_at = Carbon::now();
            $data->save();
            return response()->json(['status' => 'ایمیل با موفقیت ارسال شد']);
        }
    }


//STORE  STORE  STORE  STORE  STORE  STORE  STORE  STORE  STORE  STORE  STORE  STORE  STORE  STORE  STORE
    public function Store()
    {
        $category = Category::all();
        return view('admin.views.store', ['category' => $category]);
    }

    public function Store_GetUser()
    {
        return datatables()->of(DB::table('store')->orderBy('created_at', 'desc'))->toJson();
    }

    public function Store_ViewStore(Request $request)
    {
        return Store::where('id', $request->id)->first();
    }

    public function SaveStoreData(request $request)
    {
        $validator = Validator::make($request->all(), [
            'res-title' => ['string', 'min:5', 'max:128',],
            'res-name' => ['string', 'min:3', 'max:128',],
            'res-melli_code' => ['string', 'min:5', 'max:32', 'nullable'],
            'res-category' => ['string', 'min:1', 'max:16',],
            'res-desc' => ['string', 'max:1024', 'nullable'],
            'res-shenase_melli' => ['string', 'min:5', 'max:128', 'nullable'],
            'res-nature' => ['string', 'min:1', 'max:32', 'nullable'],
            'res-branch' => ['string', 'min:1', 'max:128', 'nullable'],
            'res-address' => ['string', 'min:1', 'max:256', 'nullable'],
            'res-status' => ['string', 'max:8', 'nullable'],
            'res-verify' => ['string', 'max:8', 'nullable'],
            'res-delete' => ['string', 'max:8', 'nullable'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $store = Store::where('id', $request->res_id)->first();
            $store->shop = $request->res_shop;
            $store->name = $request->res_name;
            $store->melli_code = $request->res_melli_code;
            $store->category = $request->res_category;
            $store->desc = $request->res_desc;
            $store->shenase_melli = $request->res_shenase_melli;
            $store->nature = $request->res_nature;
            $store->branch = $request->res_branch;
            $store->address = $request->res_address;
            $store->status = $request->res_status;
            $store->verify = $request->res_verify;
            $store->updated_at = Carbon::now();
            $store->save();
            return Response::json(["status" => "1", "description" => " ذخیره اطلاعات فروشگاه $request->res_name با موفقیت انجام شد "]);
        }
    }

    public function DeleteStoreAction(request $request)
    {
        $id = self::faToEn($request['id']);
        if (isset($id) && is_numeric($id) && $id > 0) {
            $store = Store::where('id', $id)->first();
            $store->status = "0";
            $store->save();
            return "DONE";
        }
    }
}
