<?php

namespace App\Http\Controllers;

use App\Models\DomainSearch;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class ExtraController extends Controller
{

    public function domainSearch(){
        return view('extra.domain.domain_search');
    }

    public function domainSearchAction(Request $request){
        $api_key = "dae1f8f980f5474a3189a706ac589d199bec74bf";
        $user_id = Auth::id() ?? 0;
        $finder = DomainSearch::where('domain_searched', $request->domain)->first();
        if (isset($finder->id) && $finder !== null){
            return Redirect::route('domain_result',["finder" => $finder->id]);
        }else{
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.hunter.io/v2/domain-search?domain=$request->domain&api_key=$api_key",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false),
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
            ]);
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
//            echo "cURL Error #:" . $err;
                return Response::json(['status' => 0 , 'desc' => "متاسفانه نتیجه‌ای یافت نشد "]);
            } else {
                if ($response !== null){
                    $finder = DomainSearch::create([
                        'user_id' => $user_id,
                        'domain_searched' => $request->domain,
                        'domain_answer' => $response,
                        'created_at' => Carbon::now(),
                    ])->id;
                    return Redirect::route('domain_result',["finder" => $finder]);
                }
                return Response::json(['status' => 0 , 'desc' => "متاسفانه نتیجه‌ای یافت نشد "]);
            }
        }

    }

    public function domainResult($finder){
        $finder = DomainSearch::where('id', $finder)->first();
        $finder = json_decode($finder->domain_answer);
        return view('extra.domain.domain_result',["finder" => $finder]);
    }
}
