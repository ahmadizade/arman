<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Http\Library\Api;
use App\Models\Product;
use App\OnlineOrderForm;
use App\OnlineOrderFormProducts;
use App\Payment;
use App\SupplierParts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CartController extends Controller
{

    // onnline cart

    public function checkout(){

        if(Session::has("product")){

            $history = Product::where("user_id",Auth::id())->orderBy("id","desc")->limit(5)->get()->groupBy("address");

            return view("shop.checkout", ["history" => $history]);

        }

        return Redirect::route("home");

    }

    public function checkoutOrder(Request $request){

        $request->replace(self::faToEn($request->all()));

        $validator = Validator::make($request->all(), [
            'state' => 'required|numeric|min:1',
            'postal_code' => 'required',
            'address' => 'required|min:10',
            'name' => 'required|min:2',
            'family' => 'required|min:2',
        ], [
            'state.required' => 'انتخاب استان اجباری می باشد',
            'state.min' => 'انتخاب استان اجباری می باشد',
            'postal_code.required' => 'کد پستی اجباری می باشد',
            'address.required' => 'آدرس اجباری می باشد',
            'address.min' => 'حداقل تعداد حروف آدرس باید 10 حرف باشد'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => 1, 'result' => $validator->errors()->all()]);
        }

        if(!Session::has("cart")){
            return response()->json(['errors' => 2, 'result' => "فاکتور باطل شده است"]);
        }

        $ref = Str::random(40);

        $OnlineOrderForm = OnlineOrderForm::create([
            "user_id" => Auth::id(),
            "name" => $request->name,
            "family" => $request->family,
            "state" => $request->state,
            "postal_code" => $request->postal_code,
            "address" => $request->address,
            "ref" => $ref,
            "date" => Carbon::now(),
            "status" => "PENDING"
        ]);

        $cart = Session::get("cart");

        $totalPrice = 0;

        $currency = Cache::remember('currency', 86400, function () {
            return Currency::get()->keyBy("code");
        });

        $arraySup = null;
        $i = 0;


        foreach ($cart as $key => $item) {
            $checkOrder = SupplierParts::where("part_id", $key)->where("user_id", $item['sup'])->first();
            if (isset($checkOrder)) {
                if ($checkOrder['currency'] == "aed") {
                    $price = ($checkOrder['price_aed'] * $currency['aed']['rate']);
                } elseif ($checkOrder['currency'] == "irr") {
                    $price = $checkOrder['price_irr'];
                }
                if ($item['price'] == $price) {
                    $check = OnlineOrderFormProducts::where("order_id",$OnlineOrderForm->id)->where("supplier_id",$item['sup'])->first();
                    if(!isset($check->id)){
                        $i++;
                    }else{
                        $i = explode('-',$check->invoice)[1];
                    }
                    OnlineOrderFormProducts::create([
                        "user_id" => Auth::id(),
                        "supplier_id" => $item['sup'],
                        "order_id" => $OnlineOrderForm->id,
                        "invoice" => $OnlineOrderForm->id."-".$i,
                        "code" => $checkOrder->part_id,
                        "brand" => $item['brand'],
                        "name" => $item['name'],
                        "price" => $price,
                        "count" => $item['count'],
                        "final_price" => $item['total'],
                        "status" => "PENDING"
                    ]);

                    $arraySup[] = $item['sup'];
                    $totalPrice += $item['total'];
                }
            }
        }

        OnlineOrderForm::where("id",$OnlineOrderForm->id)->update([
            "sup" => implode(",",$arraySup)
        ]);

        Payment::create([
            "user_id" => Auth::id(),
            "ref" => $ref,
            "order_id" => $OnlineOrderForm->id,
            "final_price" => $totalPrice,
            "status" => "PENDING",
            "date" => Carbon::now(),
            "type" => "INVOICE"
        ]);

        Api::sendTelegram("*** Login To Bank ***" .
            "%0A" .
            "Mobile: " . Auth::user()->mobile .
            "%0A" .
            "Email: " . Auth::user()->email.
            "%0A" .
            "Price: " . number_format($totalPrice) . " Rial" .
            "%0A" .
            "Order ID: " . $OnlineOrderForm->id
        );

        Session::forget("cart");

        // get token saman bank
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sep.shaparak.ir/MobilePG/MobilePayment',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => "CURL_HTTP_VERSION_1_1",
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'action' => 'token',
                'TerminalId' => 12291850,
                'RedirectUrl' => route('verify'),
                'ResNum' => $ref,
                'Amount' => $totalPrice,
                'CellNumber' => Auth::user()->mobile ?? '',
            )));
        $response = curl_exec($curl);
        $response = json_decode($response,true);
        curl_close($curl);

        return response()->json(['errors' => 0, 'result' => $response['token']]);

    }

    public function addCart(Request $request){

        $request->replace(self::faToEn($request->all()));

        if(isset($request->id)){

            $check = Product::where("id", $request->id)->first();

            if (isset($check)) {

                if ($check->quantity > 0) {

                    self::add($check);

                    return ["error" => false, "desc" => null];

                } else {
                    return ["error" => true, "desc" => "موجودی این محصول کافی نیست"];
                }

            }

            return ["error" => true , "desc" => "این محصول موجود نیست"];

        }

        return ["error" => true , "desc" => "متاسفانه مشکلی رخ داده است. دوباره تلاش کنید"];

    }

    public function editCart(Request $request){

        $request->replace(self::faToEn($request->all()));

        if(isset($request->id) && isset($request->count) && $request->count > 0){

            $failCount = false;

            if(Session::has("product")){
                $sessions = Session::get("product");
                foreach ($sessions as $key => $value){
                    if($key == $request->id){
                        $product = Product::where("id", $request->id)->first();
                        if ($product->quantity >= $request->count) {
                            $sessions[$key]['count'] = $request->count;
                            $sessions[$key]['total'] = $sessions[$key]['price'] * $request->count;
                        }else{
                            $failCount = true;
                        }
                    }
                }
                Session::put("product",$sessions);
            }

            if($failCount == true){
                return ["error" => true, "desc" => "تعداد درخواستی شما از موجودی سایت بیشتر می باشد"];
            }

        }

    }

    public function showCart(){

        if(Session::has("product")) {
            $cart = Session::get("product");
            return view("shop.table_checkout_ajax",["cart" => $cart]);
        }

    }

    public function removeCart(Request $request){

        if(isset($request->id)){

            $check = Product::where("id", $request->id)->first();

            if (isset($check)) {

                self::remove($check);

                return ["error" => false, "desc" => null];

            }

            return ["error" => true , "desc" => "این محصول موجود نیست"];

        }

        return ["error" => true , "desc" => "متاسفانه مشکلی رخ داده است. دوباره تلاش کنید"];

    }

    public static function add($product){

        $newSession[$product->id] = array(
            "id" => $product->id,
            "thumbnail" => $product->thumbnail,
            "product_name" => $product->product_name,
            "price" => $product->price,
            "count" => 1,
            "total" => 1 * $product->price
        );

        if(Session::has("product")){
            $sessions = Session::get("product");
            foreach ($sessions as $key => $value){
                if($key == $product->id){
                    $newSession[$value['id']] = array(
                        "id" => $product->id,
                        "thumbnail" => $product->thumbnail,
                        "product_name" => $product->product_name,
                        "price" => $product->price,
                        "count" => 1,
                        "total" => 1 * $product->price
                    );
                }else{
                    $newSession[$value['id']] = array(
                        "id" => $value['id'],
                        "thumbnail" => $value['thumbnail'],
                        "product_name" => $value['product_name'],
                        "price" => $value['price'],
                        "count" => $value['count'],
                        "total" => $value['count'] * $value['price'],
                    );
                }
            }
        }

        Session::put("product",$newSession);

    }

    public static function remove($product){

        $newSession = null;

        if(Session::has("product")){

            $sessions = Session::get("product");
            foreach ($sessions as $key => $value){
                if($key != $product->id){
                    $newSession[$value['id']] = array(
                        "id" => $value['id'],
                        "thumbnail" => $value['thumbnail'],
                        "product_name" => $value['product_name'],
                        "price" => $value['price'],
                        "count" => $value['count'],
                        "total" => $value['count'] * $value['price'],
                    );
                }
            }
        }

        Session::put("product",$newSession);

    }

}
