<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use function GuzzleHttp\Promise\all;

class BlogController extends Controller
{
    public function mag(){
        $post = Blog::orderBy('id' , 'desc')->paginate(3);
        return view('blog.blog', ["post" => $post]);
    }

    public function singleMag($slug){
        $post = Blog::where('slug' , $slug)->first();
        Blog::where('slug', $slug)->increment('view',1);
        $comment = Comment::where('view' , "single-blog")->where('post_id', $post->id)->get();
        return view('blog.single-blog', ['post' => $post, 'comment' => $comment]);
    }

    public function newSingleMag(){
        return view('admin.views.blog.new_content');
    }

    public function newSingleMagAction(Request $request){
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'title' => ['required', 'string', 'min:5', 'max:128'],
                'paragraph' => ['required', 'string', 'min:5', 'max:9999999'],
                'seo_title' => ['required', 'max:65'],
                'seo_description' => ['required', 'max:128'],
                'seo_canonical' => ['required', 'max:512'],
                'thumbnail' => 'required|max:2048',
                'image' => 'required|max:2048',
            ]);
            if ($validator->fails()) {
                Session::flash('error' , $validator->errors()->first());
                return back();
            }

            $image = null;
            if ($request->has('image')) {
                $imagePath = "/uploads/blog/image/";
                $file = $request->file('image');
                $image = $file->getClientOriginalName();
                if (file_exists(public_path($imagePath) . $image)) {
                    $image = Carbon::now()->timestamp . $image;
                }
                $file->move(public_path($imagePath), $image);
            }

            $thumbnail = null;
            if ($request->has('thumbnail')) {
                $imagePath = "/uploads/blog/thumbnail/";
                $image = $request->file('thumbnail');
                $thumbnail = $image->getClientOriginalName();
                if (file_exists(public_path($imagePath) . $thumbnail)) {
                    $thumbnail = Carbon::now()->timestamp . $thumbnail;
                }
                $image->move(public_path($imagePath), $thumbnail);
            }


            Blog::insert([
               'user_id' => Auth::id(),
               'title' => $request->title,
               'seo_title' => $request->seo_title,
               'seo_description' => $request->seo_description,
               'seo_canonical' => $request->seo_canonical,
               'slug' => self::slug($request->title),
               'author' => "تیم توسعه و تحقیق سی و سه",
               'content'=> $request->paragraph,
               'thumbnail'=> $thumbnail,
               'image'=> $image,
               'created_at'=> Carbon::now(),
            ]);
            Session::flash('status', "مطلب جدید با موفقیت ثبت شد");
            return back();
        }else{
            Session::flash('error', "شما مجوز دسترسی به این بخش را ندارید");
            return back();
        }
    }

    public function newSingleMagComment(Request $request){
        $validator = Validator::make($request->all() ,[
            'title' => ['required', 'string', 'min:5', 'max:128'],
            'desc' => ['required', 'string', 'min:5', 'max:9999999'],
            'post_id' => ['required', 'max:65'],
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->errors()->first());
            return back();
        }
        if (Auth::check() && Auth::id() > 0) {
            $user_id = Auth::id();
            $name = Auth::user()->name;
            $email = Auth::user()->email;
        }else {
            $user_id = 0;
            $name = "unknown";
            $email = "unknown";
        }
        Comment::insert([
            'user_id' => $user_id,
            'name' => $name,
            'email' => $email,
            'title' => $request->title,
            'post_id' => $request->post_id,
            'desc' => $request->desc,
            'view' => "single-blog",
            'created_at' => Carbon::now(),
        ]);
        Session::flash('status', "پیام شما پس از تایید ثبت خواهد شد");
        return back();
    }
}
