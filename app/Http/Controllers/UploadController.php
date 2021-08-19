<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

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
            //if($size == "64" || $size == "200"){
                Image::make($path)
                    ->resize($size, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(public_path($sizes[$size]));
          /*  }else{
                Image::make($path)
                    ->insert($watermark,"top-right",10,10)
                    ->resize($size, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(public_path($sizes[$size]));
            }*/

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
        $imagePath = "/images/editor/";
        $image = request()->file('file');
        $fileName = $image->getClientOriginalName();
        if(file_exists(public_path($imagePath) . $fileName)){
            $fileName = Carbon::now()->timestamp . $fileName;
        }
        $image->move(public_path($imagePath) , $fileName);
        $url = asset($imagePath . $fileName);
        return response()->json(['location' => $url]);
    }


    public function adminUploadLogo($image){
        // 500px * 500
        $imagePath = "/images/logo/";
        $fileName = $image->getClientOriginalName();
        if(file_exists(public_path($imagePath) . $fileName)){
            $fileName = Carbon::now()->timestamp.$fileName;
        }
        $image = $image->move(public_path($imagePath) , $fileName);
        $sizes = ["100" , "250", "500"];
        $url['size'] = $this->resize($image->getRealPath(), $sizes , $imagePath, $fileName);
        return $url;
    }


    public function adminUploadFavicon($image){
        // 1024 * 1024
        $imagePath = "/";
        $fileName = 'favicon.ico';
        $image->move(public_path($imagePath) , $fileName);
        $url = $imagePath . $fileName;
        return $url;
    }


    public function adminUploadSloganLogo($image){
        // 120 * 120
        $imagePath = "/images/logo/";
        $fileName = $image->getClientOriginalName();
        if(file_exists(public_path($imagePath) . $fileName)){
            $fileName = Carbon::now()->timestamp.$fileName;
        }
        $image->move(public_path($imagePath) , $fileName);
        $url = $imagePath . $fileName;
        return $url;
    }


    public function adminUploadCarousel($image){
        // Free size
        $imagePath = "/images/carousel/";
        $fileName = $image->getClientOriginalName();
        if(file_exists(public_path($imagePath) . $fileName)){
            $fileName = Carbon::now()->timestamp.$fileName;
        }
        $image->move(public_path($imagePath) , $fileName);
        $url = $imagePath . $fileName;
        return $url;
    }


    public function adminUploadBanner($image){
        // Free size
        $imagePath = "/images/banner/";
        $fileName = $image->getClientOriginalName();
        if(file_exists(public_path($imagePath) . $fileName)){
            $fileName = Carbon::now()->timestamp.$fileName;
        }
        $image->move(public_path($imagePath) , $fileName);
        $url = $imagePath . $fileName;
        return $url;
    }


    public function adminUploadCategory($image){
        // 500px * 500
        $imagePath = "/images/category/";
        $fileName = $image->getClientOriginalName();
        if(file_exists(public_path($imagePath) . $fileName)){
            $fileName = Carbon::now()->timestamp.$fileName;
        }
        $image = $image->move(public_path($imagePath) , $fileName);
        $sizes = ["34","64"];
        $url['size'] = $this->resize($image->getRealPath(), $sizes , $imagePath, $fileName);
        return $url;
    }


    public function adminUploadTag($image){
        $imagePath = "/images/tag/";
        $fileName = $image->getClientOriginalName();
        if(file_exists(public_path($imagePath) . $fileName)){
            $fileName = Carbon::now()->timestamp.$fileName;
        }
        $image = $image->move(public_path($imagePath) , $fileName);
        $sizes = ["34","64"];
        $url['size'] = $this->resize($image->getRealPath(), $sizes , $imagePath, $fileName);
        return $url;
    }


    public function adminUploadBrand($image){
        // 500px * 500
        $imagePath = "/images/brand/";
        $fileName = $image->getClientOriginalName();
        if(file_exists(public_path($imagePath) . $fileName)){
            $fileName = Carbon::now()->timestamp.$fileName;
        }
        $image = $image->move(public_path($imagePath) , $fileName);
        $sizes = ["100" , "250", "500"];
        $url['size'] = $this->resize($image->getRealPath(), $sizes , $imagePath, $fileName);
        return $url;
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


    public function uploaderImage(Request $request){

        $image = $request->file('my_image');


        $mainName = $image->getClientOriginalName();
        $fileName = $image->getClientOriginalName();


        $table = $request->table;

        switch ($table){
            case 'product':

                //$imagePathApi = "/uploads/api/";
                $imagePath = "/uploads/image/product/";

                if(file_exists(public_path($imagePath) . $fileName)){
                    $fileName = Carbon::now()->timestamp.$fileName;
                }

                $image = $image->move(public_path($imagePath) , $fileName);

                //copy(public_path($imagePath.$fileName),public_path($imagePathApi.$fileName));

                $sizes = ["64" , "200" , "600" , "1024"];

                // for upload
                $url['size'] = $this->resizeProduct($image->getRealPath(), $sizes , $imagePath, $fileName);

                $url = json_encode($url['size'],1);

                // for api
                //$this->resizeProductApi($image->getRealPath(), $sizes , $imagePathApi, $fileName);

                break;
            case 'factor_image':

                $fileName = $image->getClientOriginalName();
                $imagePath = "/uploads/image/factor_image/";

                if(file_exists(public_path($imagePath) . $fileName)){
                    $fileName = Carbon::now()->timestamp.$fileName;
                }

                $image = $image->move(public_path($imagePath) , $fileName);

                $image->move(public_path($imagePath) , $fileName);
                $url = $imagePath . $fileName;
                break;

            case 'ticket':

                $sizes = [];
                $imagePath = "/uploads/image/ticket/";

                if(file_exists(public_path($imagePath) . $fileName)){
                    $fileName = Carbon::now()->timestamp.$fileName;
                }

                $image = $image->move(public_path($imagePath) , $fileName);

                $image->move(public_path($imagePath) , $fileName);
                $url = $imagePath . $fileName;
                break;

            default :
                return false;
        }

        if ($table == 'ticket') {
            $upload = FileUpload::insertGetId([
                "user_id" => Auth::id(),
                "table" => $request->table,
                "table_id" => $request->id,
                "title" => $request->caption ?? '',
                "url" => $url,
                "icon" => $request->type,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "thumb" => $request->thumb ?? 0,
                "file_name" => trim($request->type . $mainName),
                "type" => 'image',
            ]);
            return $upload;
        } else {
            $upload = FileUpload::create([
                "user_id" => Auth::id(),
                "table" => $request->table,
                "table_id" => $request->id,
                "title" => $request->caption ?? '',
                "url" => $url,
                "icon" => $request->type,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "thumb" => $request->thumb ?? 0,
                "file_name" => trim($request->type . $mainName),
                "type" => 'image',
            ]);
        }

        if($upload){
            return true;
        }
        return false;

    }


    public function uploaderFile(Request $request){

        $table = $request->table;

        $file = $request->file('my_file');

        $filePath = "/uploads/file/";
        $fileName = $file->getClientOriginalName();
        $mainName = $file->getClientOriginalName();

        if(file_exists(public_path($filePath) . $fileName)){
            $fileName = Carbon::now()->timestamp.$fileName;
        }

        $file->move(public_path($filePath) , $fileName);

        $upload = FileUpload::insertGetId([
            "user_id" => Auth::id(),
            "table" => $request->table,
            "table_id" => $request->id,
            "title" => $request->caption ?? '',
            "url" => "/uploads/file/" . $fileName,
            "icon" => $request->type,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
            "thumb" => $request->thumb ?? 0,
            "file_name" => trim($request->type . $mainName),
            "type" => 'file',
        ]);

        return $upload;

    }


    public function uploaderVideo(Request $request){

        $video = $request->file('my_video');

        $videoPath = "/uploads/video/";
        $fileName = $video->getClientOriginalName();
        $mainName = $video->getClientOriginalName();

        if(file_exists(public_path($videoPath) . $fileName)){
            $fileName = Carbon::now()->timestamp.$fileName;
        }

        $video->move(public_path($videoPath) , $fileName);

        FileUpload::create([
            "user_id" => Auth::id(),
            "table" => $request->table,
            "table_id" => $request->id,
            "title" => $request->caption ?? '',
            "url" => "/uploads/video/".$fileName,
            "icon" => $request->type,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
            "thumb" => $request->thumb ?? 0,
            "file_name" => trim($request->type.$mainName),
            "type" => 'video',
        ]);

        return true;

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

    public function uploaderUpdateAlt(Request $request){

        if($request->ajax()){
            FileUpload::where('id',$request->id)->update([
                "title" => $request->title
            ]);
            return Response::json(["status" => "1","desc" => "ALT تصویر با موفقیت ویرایش شد"]);
        }
        return Response::json(["status" => "0","desc" => "تصویر مورد نظر یافت نشد"]);
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
                    'thumb' => 0,
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
