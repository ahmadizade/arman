<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class UploadController extends Controller
{
    public function resize($path,$_sizes,$imagePath,$fileName){
        $sizes['original'] = $imagePath . $fileName;
        foreach ($_sizes as $size) {
            $sizes[$size] = $imagePath . "{$size}_" . $fileName;
            Image::make($path)
                ->resize($size, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path($sizes[$size]));
        }
        return $sizes;
    }

    public function resizeProduct($path,$_sizes,$imagePath,$fileName){

        $watermark = Image::make(public_path("/images/icon/watermark.png"))->opacity(50);

        $sizes['original'] = $imagePath . $fileName;
        foreach ($_sizes as $size) {
            $sizes[$size] = $imagePath . "{$size}_" . $fileName;
            if($size == "64" || $size == "200"){
                Image::make($path)
                    ->resize($size, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(public_path($sizes[$size]));
            }else{
                Image::make($path)
                    ->insert($watermark,"top-right",10,10)
                    ->resize($size, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(public_path($sizes[$size]));
            }

        }
        return $sizes;
    }

    public function resizeProductApi($path,$_sizes,$imagePath,$fileName){
        $sizes['original'] = $imagePath . $fileName;
        foreach ($_sizes as $size) {
            $sizes[$size] = $imagePath . "{$size}_" . $fileName;
            Image::make($path)
                ->resize($size, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path($sizes[$size]));
        }
        return $sizes;
    }

    public function uploadImageDescription(){
        // Free Size
        $this->validate(request(), [
            'file' => 'required|mimes:jpeg,jpg,bmp,png'
        ]);
        $imagePath = "/uploads/tiny";
        $image = request()->file('file');
        $fileName = $image->getClientOriginalName();
        if(file_exists(public_path($imagePath) . $fileName)){
            $fileName = Carbon::now()->timestamp . $fileName;
        }
        $image->move(public_path($imagePath) , $fileName);
        $url = asset($imagePath . $fileName);
        return response()->json(['location' => $url]);
    }

    public function destroyImage(Request $request){
        $setting = Setting::first();
        $variable = $request->target;
        $update = $setting->update([
            $variable => null
        ]);
        if($update){
            return Response::json(["status" => "1"],200);
        }
        else{
            return Response::json(["status" => "0"],500);
        }
    }

    public function uploaderDestroyFile(Request $request){

        if($request->ajax()){

            $name = $request->name;
            $type = $request->type;


            $file = FileUpload::where('file_name',trim($type.$name))->first();

            if(isset($file)){
                $destroy = $file->delete();

                if($destroy){
                    return Response::json(["status" => "1","desc" => "فایل مورد نظر حذف شد."]);
                }
                else{
                    return Response::json(["status" => "0","desc" => "مشکلی در حذف فایل پیش آمده است."]);
                }
            }
            else{
                return Response::json(["status" => "2","desc" => "فایل مورد نظر یافت نشد."]);
            }

        }
        else{
            return Response::json(["status" => "3","desc" => "مشکلی در حذف فایل پیش آمده است."]);
        }

    }

    public function UploaderThumbProduct(Request $request){

        if($request->ajax()){

            $name = $request->name;
            $type = $request->type;
            $id = $request->id;
            $table = $request->table;


            $files = FileUpload::where('table',$table)->where('table_id',$id);

            if(isset($files)){
                $files->update([
                    'thumb' => 0
                ]);
            }

            $file = FileUpload::where('file_name',$type.$name)->where('table','product')->where('table_id',$id)->first();

            if($file){

                $update = $file->update([
                    'thumb' => 1
                ]);

                if($update){
                    return Response::json(["status" => "1","desc" => "تصویر شاخص انتخاب شد."]);
                }
                else{
                    return Response::json(["status" => "2","desc" => "مشکلی در انتخاب تصویر شاخص پیش آمده."]);
                }

            } else{
                return Response::json(["status" => "3","desc" => "فایل مورد نظر یافت نشد."]);
            }

        }
        else{
            return Response::json(["status" => "2","desc" => "مشکلی در انتخاب تصویر شاخص پیش آمده."]);
        }

    }

}
