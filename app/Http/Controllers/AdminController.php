<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Category_variety;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Product_tag;
use App\Models\Report;
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
    public function cioce()
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
    public function cioce_login()
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


    public function cioce_register()
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
        $title = 'پشتیبانی سایت فروشگاه سی و سه';
        self::email($email, $view, $content, $title, $subject);
    }

    //save user change from admin first page
    public function GetUser()
    {
        return datatables()->of(DB::table('users'))->toJson();
    }

    public function Store_GetReport()
    {
//        $model = Report::with('user');
//        return DataTables::eloquent($model)
//            ->addColumn('user_id', function (Report $report) {
//                return $report->user->name;
//            })
//            ->toJson();

        return DataTables::of(DB::table('report')->leftJoin('users', 'users.id', '=', 'report.user_id')
            ->leftJoin('store', 'users.id', '=', 'store.user_id')
            ->get(['report.*', 'users.name', 'store.shop as store']))->toJson();


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
                ->where('mobile', 'LIKE', "%$search%")->orWhere('name', 'LIKE', "%$search%")
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
        if (isset($request->mobile) && $request->mobile !== "") {
            $user = User::where('mobile', $request->mobile)->first();
        } else {
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

    public function Store_ViewReport(Request $request)
    {
        $report = Report::where('id', $request->id)->first();
        $id = $request->id;
        $user = $report->user->name ?? "";
        $mobile = $report->user->mobile ?? "";
        $shop = $report->store->shop ?? "";
        $desc = $report->desc;
        $answer = $report->answer;
        $answer_at = $report->answer_at;
        $data = ['id' => $id, 'user' => $user, 'shop' => $shop, 'mobile' => $mobile, 'desc' => $desc, 'answer' => $answer, 'answer_at' => $answer_at];
        return response()->json($data);
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

    public function SaveReportData(request $request)
    {
        $validator = Validator::make($request->all(), [
            'answer' => ['string', 'min:5', 'max:512',],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $report = Report::where('id', $request->id)->first();
            $report->answer = $request->answer;
            $report->answer_at = Carbon::now();
            $report->save();
            return Response::json(["status" => "1", "description" => " پاسخ با موفقیت ارسال شد "]);
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

    public function Product()
    {
        $last_product = Product::where('delete', 0)->where('type', "table")->orderByDesc('id')->paginate(3);
        return view('admin.views.product', ['last_product' => $last_product]);
    }

    public function Product_GetStore(Request $request)
    {
        return datatables()->of(DB::table('products')->orderBy('created_at', 'desc'))->toJson();
    }

    public function product_SuggestionAction(Request $request)
    {
        $data = [];
        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("products")
                ->leftJoin('category', 'category.id', '=', 'products.category_id')
                ->where('product_name', 'LIKE', "%$search%")
                ->get(['products.*', 'category.name as category']);

        }
        return response()->json($data);
    }

    public function ProductShowAction(Request $request)
    {
//        $product = DB::table('products')->where('id', $request->id)
//            ->leftJoin('category', 'category.id', '=', 'products.category_id')
//            ->get(['products.*', 'category.name as category']);
        $product = Product::where('id',$request->id)->first();
        return $product;
    }

    public function ProductSaveAction(Request $request)
    {
        if ($request->status == 1){
            Product::where('id',$request->id)->update(array('status' => 1));
            return response()->json(['status' => "کالا با موفقیت فعال شد"]);
        }elseif ($request->status == 0){
            Product::where('id',$request->id)->update(array('status' => 0));
            return response()->json(['status' => "کالای مورد نظر غیر فعال شد"]);
        }
    }

    public function addTag(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:255|unique:product_tag',
        ]);

        if ($validator->fails()) {
            session()->flash("error",$validator->errors()->first());
            return back();
        }

        Product_tag::create([
            "name" => $request->name,
            "user_id" => Auth::id(),
            "slug" => self::slug($request->name),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        session()->flash("error","برچسب با موفقیت ثبت شد");
        return back();
    }

    public function addCategoryPage(){
        $last_category = Category::orderByDesc('id')->where('delete', 0)->paginate();
        return view('admin.views.category.category', ['last_category' => $last_category]);
    }

    public function addTagPage(){
        $last_tag = Product_tag::orderByDesc('id')->where('delete', 0)->paginate();
        return view('admin.views.tag.tag', ['last_tag' => $last_tag]);
    }

    public function addCategory(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:255',
            'seo_title' => 'nullable|max:65',
            'seo_description' => 'nullable',
            'seo_canonical' => 'nullable',
            'english_name' => 'required|min:2|max:255',
            'discription' => 'nullable|min:2|max:9000000',
            'image' => 'required|max:9048',
        ]);

        if ($validator->fails()) {
            session()->flash("error",$validator->errors()->first());
            return back();
        }

        $image = null;
        if ($request->has('image')) {
            $imagePath = "/uploads/category/";
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            if (file_exists(public_path($imagePath) . $image)) {
                $image = Carbon::now()->timestamp . $image;
            }
            $file->move(public_path($imagePath), $image);
        }

        Category::create([
            "name" => $request->name,
            "slug" => self::slug($request->name),
            "seo_title" => $request->seo_title,
            "seo_description" => $request->seo_description,
            "seo_canonical" => $request->seo_canonical,
            "english_name" => $request->english_name,
            "discription" => $request->discription,
            "image" => $image,
        ]);

        session()->flash("error","برچسب با موفقیت ثبت شد");
        return back();
    }

    public function addTagg(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:255',
            'seo_title' => 'nullable|max:65',
            'seo_description' => 'nullable',
            'seo_canonical' => 'nullable',
            'english_name' => 'required|min:2|max:255',
            'discription' => 'nullable|min:2|max:9000000',
            'image' => 'required|max:9048',
        ]);

        if ($validator->fails()) {
            session()->flash("error",$validator->errors()->first());
            return back();
        }

        $image = null;
        if ($request->has('image')) {
            $imagePath = "/uploads/tag/";
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            if (file_exists(public_path($imagePath) . $image)) {
                $image = Carbon::now()->timestamp . $image;
            }
            $file->move(public_path($imagePath), $image);
        }

        Product_tag::create([
            "name" => $request->name,
            "slug" => self::slug($request->name),
            "seo_title" => $request->seo_title,
            "seo_description" => $request->seo_description,
            "seo_canonical" => $request->seo_canonical,
            "english_name" => $request->english_name,
            "discription" => $request->discription,
            "image" => $image,
        ]);

        session()->flash("error","برچسب با موفقیت ثبت شد");
        return back();
    }

    public function addCategoryVariety(Request $request){
        $validator = Validator::make($request->all() ,[
            'category' => 'required|min:1',
            'variety' => 'required|min:1',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->errors()->first());
            return back();
        }
        foreach ($request->variety as $item){
            Category_variety::create([
                "category_id" => $request->category,
                "name" => $item,
            ]);
        }
        Session::flash('status',"افزودن با موفقیت انجام شد");
        return back();
    }

    public function getVariety(Request $request){
        $variety = Category_variety::where('category_id', $request->category_id)->get();
        return $variety;
    }

    public function addProduct(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:255',
            'englishName' => 'required|min:2|max:255',
            'category' => 'required',
            'category_variety' => 'required',
            'tag' => 'nullable',
            'price' => 'nullable|max:255',
            'discount' => 'nullable|max:3',
            'type' => 'required|min:3',
            'thumbnail' => 'required|max:2048',
            'image' => 'required|max:2048',
            'file' => 'required|file|mimes:zip',
            'description' => 'nullable|min:3|max:9000000',
            'framework' => 'nullable',
            'framework_version' => 'nullable',
            'framework_details' => 'nullable|min:3|max:9000000',
            'special_features' => 'nullable|min:3|max:9000000',
            'short_description_of_backend' => 'nullable|min:3|max:9000000',
            'admin_pannel_features' => 'nullable|min:3|max:9000000',
            'framework_frontend_details' => 'nullable|min:3|max:9000000',
            'other_plugins' => 'nullable|min:3|max:9000000',
            'data_usage' => 'nullable',
            'admin_pannel' => 'nullable',
            'framework_frontend' => 'nullable',
            'framework_frontend_version' => 'nullable',
            'seo_title' => 'nullable',
            'seo_description' => 'nullable',
            'seo_canonical' => 'nullable',
        ]);

        if ($validator->fails()) {
            session()->flash("error",$validator->errors()->first());
            return back();
        }

        $image = null;
        if ($request->has('image')) {
            $imagePath = "/uploads/products/";
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            if (file_exists(public_path($imagePath) . $image)) {
                $image = Carbon::now()->timestamp . $image;
            }
            $file->move(public_path($imagePath), $image);
        }

        $thumbnail = null;
        if ($request->has('thumbnail')) {
            $imagePath = "/uploads/thumbnail/";
            $image = $request->file('thumbnail');
            $thumbnail = $image->getClientOriginalName();
            if (file_exists(public_path($imagePath) . $thumbnail)) {
                $thumbnail = Carbon::now()->timestamp . $thumbnail;
            }
            $image->move(public_path($imagePath), $thumbnail);
        }

        $file = null;
        if ($request->has('file')) {
            $imagePath = "/uploads/file/";
            $image = $request->file('file');
            $file = $image->getClientOriginalName();
            if (file_exists(public_path($imagePath) . $file)) {
                $file = Carbon::now()->timestamp . $file;
            }
            $image->move(public_path($imagePath), $file);
        }
        Product::create([
           'product_name' => $request->name,
           'english_name' => $request->englishName,
           'product_slug' => self::slug($request->name),
           'category_id' => $request->category,
           'category_variety' => $request->category_variety,
           'tag_id' => json_encode($request->tag),
           'discount' => $request->discount,
           'price' => str_replace(',', '' , $request->price),
           'quantity' => 20000,
           'mobile' => Auth::user()->mobile,
           'user_id' => Auth::id(),
           'product_desc' => $request->description,
           'type' => $request->type,
            'thumbnail' => $thumbnail,
            "image" => $image,
            "file" => $file,
            "created_at" => Carbon::now(),
            'framework' => $request->framework,
            'framework_version' => $request->framework_version,
            'framework_details' => $request->framework_details,
            'special_features' => $request->special_features,
            'short_description_of_backend' => $request->short_description_of_backend,
            'admin_pannel_features' => $request->admin_pannel_features,
            'framework_frontend_details' => $request->framework_frontend_details,
            'other_plugins' => $request->other_plugins,
            'data_usage' => $request->data_usage,
            'admin_pannel' => $request->admin_pannel,
            'framework_frontend' => $request->framework_frontend,
            'framework_frontend_version' => $request->framework_frontend_version,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_canonical' => $request->seo_canonical,
        ]);
        session()->flash("status","محصول با موفقیت ثبت گردید");
        return back();
    }

    public function deleteProduct($id){
        Product::where('id' , $id)->where('type', "table")->update([
            'delete' => 1,
            'deleted_at' => Carbon::now(),
        ]);
        Session::flash('status' , 'حذف محصول با موفقیت انجام شد');
        return back();
    }

    public function editProduct($id){
        $product = Product::where('id' , $id)->where('type', "table")->first();
        return view('admin.views.product_edit', ['product' => $product]);
    }

    public function showProduct(){
        $last_product = Product::orderByDesc('id')->where('type', "table")->paginate(15);
        return view('admin.views.product_show', ['last_product' => $last_product]);
    }

    public function deleteCategory($id){
        Category::where('id' , $id)->update([
            'delete' => 1,
            'deleted_at' => Carbon::now(),
        ]);
        Session::flash('status' , 'حذف دسته بندی با موفقیت انجام شد');
        return back();
    }

    public function deleteTag($id){
        Product_tag::where('id' , $id)->update([
            'delete' => 1,
            'deleted_at' => Carbon::now(),
        ]);
        Session::flash('status' , 'حذف برچسب با موفقیت انجام شد');
        return back();
    }

    public function editCategory($id){
        $slcategory = Category::where('id' , $id)->first();
        return view('admin.views.category.edit_category', ['slcategory' => $slcategory]);
    }

    public function editTag($id){
        $sltag = Product_tag::where('id' , $id)->first();
        return view('admin.views.tag.edit_tag', ['sltag' => $sltag]);
    }

    public function editCategoryAction(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'user_id' => 'nullable',
            'name' => 'required|min:2|max:255',
            'english_name' => 'required|min:2|max:255',
            'seo_title' => 'nullable',
            'seo_description' => 'nullable',
            'seo_canonical' => 'nullable',
            'description' => 'nullable|max:999999',
        ]);

        if ($validator->fails()) {
            session::flash("error",$validator->errors()->first());
            return back();
        }

        Category::where('id' , $request->id)->update([
            'name' => $request->name,
            'english_name' => $request->english_name,
            'slug' => self::slug($request->name),
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'description' => $request->description,
            'seo_canonical' => $request->seo_canonical,
        ]);
        session()->flash("status","دسته بندی با موفقیت ویرایش گردید");
        return back();
    }

    public function editTagAction(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'user_id' => 'nullable',
            'name' => 'required|min:2|max:255',
            'english_name' => 'required|min:2|max:255',
            'seo_title' => 'nullable',
            'seo_description' => 'nullable',
            'seo_canonical' => 'nullable',
            'discription' => 'nullable|max:999999',
        ]);

        if ($validator->fails()) {
            session::flash("error",$validator->errors()->first());
            return back();
        }

        Product_tag::where('id' , $request->id)->update([
            'name' => $request->name,
            'user_id' => Auth::id(),
            'english_name' => $request->english_name,
            'slug' => self::slug($request->name),
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'discription' => $request->description,
            'seo_canonical' => $request->seo_canonical,
        ]);
        session()->flash("status","برچسب با موفقیت ویرایش گردید");
        return back();
    }

    public function adminEditproductAction(Request $request){
            $validator = Validator::make($request->all(), [
                'id' => 'nullable',
                'name' => 'required|min:2|max:255',
                'englishName' => 'required|min:2|max:255',
                'category' => 'required',
                'category_variety' => 'required',
                'tag' => 'nullable',
                'price' => 'nullable|max:255',
                'discount' => 'nullable|max:3',
                'description' => 'nullable|min:3|max:9000000',
                'framework' => 'required',
                'framework_version' => 'nullable',
                'framework_details' => 'nullable|min:3|max:9000000',
                'special_features' => 'nullable|min:3|max:9000000',
                'short_description_of_backend' => 'nullable|min:3|max:9000000',
                'admin_pannel_features' => 'nullable|min:3|max:9000000',
                'framework_frontend_details' => 'nullable|min:3|max:9000000',
                'other_plugins' => 'nullable|min:3|max:9000000',
                'data_usage' => 'nullable',
                'admin_pannel' => 'nullable',
                'framework_frontend' => 'nullable',
                'framework_frontend_version' => 'nullable',
                'seo_title' => 'nullable',
                'seo_description' => 'nullable',
                'seo_canonical' => 'nullable',
            ]);

        if ($validator->fails()) {
            session::flash("error",$validator->errors()->first());
            return back();
        }

        Product::where('id' , $request->id)->update([
            'product_name' => $request->name,
            'english_name' => $request->englishName,
            'product_slug' => self::slug($request->name),
            'category_id' => $request->category,
            'category_variety' => $request->category_variety,
            'tag_id' => json_encode($request->tag),
            'discount' => $request->discount,
            'price' => str_replace(',', '' , $request->price),
            'quantity' => 20000,
            'mobile' => Auth::user()->mobile,
            'user_id' => Auth::id(),
            'product_desc' => $request->description,
//            'thumbnail' => $thumbnail,
//            "image" => $image,
            "created_at" => Carbon::now(),
            'framework' => $request->framework,
            'framework_version' => $request->framework_version,
            'framework_details' => $request->framework_details,
            'special_features' => $request->special_features,
            'short_description_of_backend' => $request->short_description_of_backend,
            'admin_pannel_features' => $request->admin_pannel_features,
            'framework_frontend_details' => $request->framework_frontend_details,
            'other_plugins' => $request->other_plugins,
            'data_usage' => $request->data_usage,
            'admin_pannel' => $request->admin_pannel,
            'framework_frontend' => $request->framework_frontend,
            'framework_frontend_version' => $request->framework_frontend_version,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_canonical' => $request->seo_canonical,
            'updated_at' => Carbon::now(),
        ]);
        session()->flash("status","محصول با موفقیت ویرایش گردید");
        return back();
    }

    public function imageEditproductAction(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'user_id' => 'required',
            'thumbnail' => 'nullable|max:2048',
            'image' => 'nullable|max:2048',
        ]);

        if ($validator->fails()) {
            session::flash("error",$validator->errors()->first());
            return back();
        }

        $image = null;
        if ($request->has('image')) {
            $imagePath = "/uploads/products/";
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            if (file_exists(public_path($imagePath) . $image)) {
                $image = Carbon::now()->timestamp . $image;
            }
            $file->move(public_path($imagePath), $image);
        }

        $thumbnail = null;
        if ($request->has('thumbnail')) {
            $imagePath = "/uploads/thumbnail/";
            $picture = $request->file('thumbnail');
            $thumbnail = $picture->getClientOriginalName();
            if (file_exists(public_path($imagePath) . $thumbnail)) {
                $thumbnail = Carbon::now()->timestamp . $thumbnail;
            }
            $picture->move(public_path($imagePath), $thumbnail);
        }

        Product::where('id' , $request->id)->update([
            'user_id' => Auth::id(),
            'thumbnail' => $thumbnail,
            "image" => $image,
            'updated_at' => Carbon::now(),
        ]);
        session()->flash("status","تصاویر محصول با موفقیت ویرایش گردید");
        return back();
    }

    public function imageEditcategoryAction(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'user_id' => 'required',
            'image' => 'nullable|max:2048',
        ]);

        if ($validator->fails()) {
            session::flash("error",$validator->errors()->first());
            return back();
        }

        $image = null;
        if ($request->has('image')) {
            $imagePath = "/uploads/category/";
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            if (file_exists(public_path($imagePath) . $image)) {
                $image = Carbon::now()->timestamp . $image;
            }
            $file->move(public_path($imagePath), $image);
        }

        Category::where('id' , $request->id)->update([
            "image" => $image,
        ]);
        session()->flash("status","تصاویر دسته بندی با موفقیت ویرایش گردید");
        return back();
    }

    public function imageEdittagAction(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'user_id' => 'required',
            'image' => 'nullable|max:2048',
        ]);

        if ($validator->fails()) {
            session::flash("error",$validator->errors()->first());
            return back();
        }

        $image = null;
        if ($request->has('image')) {
            $imagePath = "/uploads/tag/";
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            if (file_exists(public_path($imagePath) . $image)) {
                $image = Carbon::now()->timestamp . $image;
            }
            $file->move(public_path($imagePath), $image);
        }

        Product_tag::where('id' , $request->id)->update([
            "image" => $image,
        ]);
        session()->flash("status","تصاویر دسته بندی با موفقیت ویرایش گردید");
        return back();
    }

    public function imageEditapiAction(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'user_id' => 'required',
            'thumbnail' => 'nullable|max:2048',
            'image' => 'nullable|max:2048',
        ]);

        if ($validator->fails()) {
            session::flash("error",$validator->errors()->first());
            return back();
        }

        $image = null;
        if ($request->has('image')) {
            $imagePath = "/uploads/products/";
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            if (file_exists(public_path($imagePath) . $image)) {
                $image = Carbon::now()->timestamp . $image;
            }
            $file->move(public_path($imagePath), $image);
        }


        $thumbnail = null;
        if ($request->has('thumbnail')) {
            $imagePath = "/uploads/thumbnail/";
            $picture = $request->file('thumbnail');
            $thumbnail = $picture->getClientOriginalName();
            if (file_exists(public_path($imagePath) . $thumbnail)) {
                $thumbnail = Carbon::now()->timestamp . $thumbnail;
            }
            $picture->move(public_path($imagePath), $thumbnail);
        }

        Product::where('id' , $request->id)->update([
            'user_id' => Auth::id(),
            'thumbnail' => $thumbnail,
            "image" => $image,
            'updated_at' => Carbon::now(),
        ]);
        session()->flash("status","تصاویر محصول با موفقیت ویرایش گردید");
        return back();
    }

    public function adminFileproductAction(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'user_id' => 'required',
            'file' => 'required|file|mimes:zip',
        ]);

        if ($validator->fails()) {
            session::flash("error",$validator->errors()->first());
            return back();
        }

        $file = null;
        if ($request->has('file')) {
            $imagePath = "/uploads/file/";
            $image = $request->file('file');
            $file = $image->getClientOriginalName();
            if (file_exists(public_path($imagePath) . $file)) {
                $file = Carbon::now()->timestamp . $file;
            }
            $image->move(public_path($imagePath), $file);
        }

        Product::where('id' , $request->id)->update([
            'user_id' => Auth::id(),
            'file' => $file,
            'updated_at' => Carbon::now(),
        ]);
        session()->flash("status","فایل با موفقیت ویرایش گردید");
        return back();
    }

    public function newWebservice(Request $request){
        $last_product = Product::where('delete', 0)->where('type', "api")->orderByDesc('id')->paginate(3);
        return view('admin.views.webservice.new_service',['last_product' => $last_product]);
    }

     public function showWebservice(){
            $last_product = Product::where('type', "api")->orderByDesc('id')->paginate(15);
            return view('admin.views.webservice.web_service_show',['last_product' => $last_product]);
        }



    //Web Service Admin
    public function newWebserviceAction(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:255',
            'englishName' => 'required|min:2|max:255',
            'category' => 'required',
            'category_variety' => 'required',
            'tag' => 'nullable',
            'price' => 'nullable|max:255',
            'pro_price' => 'nullable|max:255',
            'ultra_price' => 'nullable|max:255',
            'mega_price' => 'nullable|max:255',
            'type' => 'nullable|max:255',
            'free_request' => 'nullable|max:255',
            'pro_request_1_month' => 'nullable|max:255',
            'ultra_request_1_month' => 'nullable|max:255',
            'mega_request_1_month' => 'nullable|max:255',
            'pro_request_3_month' => 'nullable|max:255',
            'ultra_request_3_month' => 'nullable|max:255',
            'mega_request_3_month' => 'nullable|max:255',
            'discount' => 'nullable|max:3',
            'thumbnail' => 'nullable|max:2048',
            'image' => 'nullable|max:2048',
            'file' => 'nullable|file|mimes:zip',
            'description' => 'nullable|max:9000000',
            'result_sample' => 'nullable|max:9000000',
            'parameters' => 'nullable|max:9000000',
            'php_language' => 'nullable|max:9000000',
            'js_language' => 'nullable|max:9000000',
            'nodejs_language' => 'nullable|max:9000000',
            'framework_version' => 'nullable',
            'framework_details' => 'nullable|min:3|max:9000000',
            'special_features' => 'nullable|min:3|max:9000000',
            'short_description_of_backend' => 'nullable|min:3|max:9000000',
            'seo_title' => 'nullable',
            'seo_description' => 'nullable',
            'seo_canonical' => 'nullable',
        ]);

        if ($validator->fails()) {
            session()->flash("error",$validator->errors()->first());
            return back();
        }

        $image = null;
        if ($request->has('image')) {
            $imagePath = "/uploads/products/";
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            if (file_exists(public_path($imagePath) . $image)) {
                $image = Carbon::now()->timestamp . $image;
            }
            $file->move(public_path($imagePath), $image);
        }

        $thumbnail = null;
        if ($request->has('thumbnail')) {
            $imagePath = "/uploads/thumbnail/";
            $picture = $request->file('thumbnail');
            $thumbnail = $picture->getClientOriginalName();
            if (file_exists(public_path($imagePath) . $thumbnail)) {
                $thumbnail = Carbon::now()->timestamp . $thumbnail;
            }
            $picture->move(public_path($imagePath), $thumbnail);
        }

        $file = null;
        if ($request->has('file')) {
            $filePath = "/uploads/file/";
            $fileName = $request->file('file');
            $file = $fileName->getClientOriginalName();
            if (file_exists(public_path($filePath) . $file)) {
                $file = Carbon::now()->timestamp . $file;
            }
            $fileName->move(public_path($filePath), $file);
        }
        Product::create([
            'product_name' => $request->name,
            'english_name' => $request->englishName,
            'product_slug' => self::slug($request->name),
            'category_id' => $request->category,
            'category_variety' => $request->category_variety,
            'tag_id' => json_encode($request->tag),
            'discount' => $request->discount,
            'type' => $request->type,
            'price' => str_replace(',', '' , $request->price),
            'quantity' => 20000,
            'mobile' => Auth::user()->mobile,
            'user_id' => Auth::id(),
            'product_desc' => $request->description,
            'thumbnail' => $thumbnail,
            'parameters' => $request->parameters,
            'result_sample' => $request->result_sample,
            'php_language' => $request->php_language,
            'js_language' => $request->js_language,
            'nodejs_language' => $request->nodejs_language,
            "image" => $image,
            "file" => $file,
            "created_at" => Carbon::now(),
            'framework_version' => $request->framework_version,
            'framework_details' => $request->framework_details,
            'special_features' => $request->special_features,
            'short_description_of_backend' => $request->short_description_of_backend,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_canonical' => $request->seo_canonical,
        ]);
        session()->flash("status","محصول با موفقیت ثبت گردید");
        return back();
    }

    public function deleteApi($id){
        Product::where('id' , $id)->where('type', "api")->update([
            'delete' => 1,
            'deleted_at' => Carbon::now(),
        ]);
        Session::flash('status' , 'حذف محصول با موفقیت انجام شد');
        return back();
    }

    public function editApi($id){
        $product = Product::where('id' , $id)->where('type', "api")->first();
        return view('admin.views.webservice.web_service_edit', ['product' => $product]);
    }

    public function adminEditapiAction(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:255',
            'englishName' => 'required|min:2|max:255',
            'category' => 'required',
            'category_variety' => 'required',
            'tag' => 'nullable',
            'result_sample' => 'nullable|max:9000000',
            'parameters' => 'nullable|max:9000000',
            'php_language' => 'nullable|max:9000000',
            'js_language' => 'nullable|max:9000000',
            'nodejs_language' => 'nullable|max:9000000',
            'price' => 'nullable|max:255',
            'type' => 'nullable|max:255',
            'free_request' => 'nullable|max:255',
            'discount' => 'nullable|max:3',
            'thumbnail' => 'nullable|max:2048',
            'image' => 'nullable|max:2048',
            'file' => 'nullable|file|mimes:zip',
            'description' => 'nullable|min:3|max:9000000',
            'framework_version' => 'nullable',
            'framework_details' => 'nullable|min:3|max:9000000',
            'special_features' => 'nullable|min:3|max:9000000',
            'short_description_of_backend' => 'nullable|min:3|max:9000000',
            'seo_title' => 'nullable',
            'seo_description' => 'nullable',
            'seo_canonical' => 'nullable',
        ]);

        if ($validator->fails()) {
            session::flash("error",$validator->errors()->first());
            return back();
        }

        Product::where('id' , $request->id)->where('type', "api")->update([
            'product_name' => $request->name,
            'english_name' => $request->englishName,
            'product_slug' => self::slug($request->name),
            'category_id' => $request->category,
            'category_variety' => $request->category_variety,
            'tag_id' => json_encode($request->tag),
            'discount' => $request->discount,
            'type' => "api",
            'price' => str_replace(',', '' , $request->price),
            'quantity' => 20000,
            'mobile' => Auth::user()->mobile,
            'user_id' => Auth::id(),
            'parameters' => $request->parameters,
            'result_sample' => $request->result_sample,
            'php_language' => $request->php_language,
            'js_language' => $request->js_language,
            'nodejs_language' => $request->nodejs_language,
            'product_desc' => $request->description,
            "created_at" => Carbon::now(),
            'framework_version' => $request->framework_version,
            'framework_details' => $request->framework_details,
            'special_features' => $request->special_features,
            'short_description_of_backend' => $request->short_description_of_backend,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_canonical' => $request->seo_canonical,
            'updated_at' => Carbon::now(),
        ]);
        session()->flash("status","محصول با موفقیت ویرایش گردید");
        return back();
    }

}
