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
        $lastPost = Blog::orderByDesc('id')->limit(6)->get();
        $bestPost = Blog::orderByDesc('view')->limit(4)->get();
        return view('blog.blog', ["post" => $post , 'lastPost' => $lastPost , 'bestPost' => $bestPost]);
    }

    public function singleMag($slug){
        $lastPost = Blog::orderByDesc('id')->limit(6)->get();
        $post = Blog::where('slug' , $slug)->first();
        $bestPost = Blog::orderByDesc('view')->limit(4)->get();
        Blog::where('slug', $slug)->increment('view',1);
        $comment = Comment::where('view' , "single-blog")->where('post_id', $post->id)->get();
        return view('blog.single-blog', ['post' => $post, 'comment' => $comment , 'lastPost' => $lastPost, 'bestPost' => $bestPost]);
    }

    public function newSingleMag(){
        $lastPost = Blog::orderByDesc('id')->paginate(6);
        return view('admin.views.blog.new_content' , ["lastPost" => $lastPost]);
    }

    public function newSingleMagAction(Request $request){
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'title' => ['required', 'string', 'min:5', 'max:128'],
                'paragraph' => ['required', 'string', 'min:5', 'max:9999999'],
                'seo_title' => ['required', 'max:65'],
                'seo_description' => ['required', 'max:128'],
                'seo_canonical' => ['nullable', 'max:512'],
                'thumbnail' => 'required|max:4048',
                'image' => 'required|max:4048',
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

    public function editSingleMagAction(Request $request){
        if (Auth::check() && Auth::user()->role == "admin") {
            $validator = Validator::make($request->all(), [
                'title' => ['required', 'string', 'min:5', 'max:128'],
                'paragraph' => ['required', 'string', 'min:5', 'max:9999999'],
                'seo_title' => ['required', 'max:65'],
                'seo_description' => ['required', 'max:128'],
                'seo_canonical' => ['nullable', 'max:512'],
            ]);
            if ($validator->fails()) {
                Session::flash('error' , $validator->errors()->first());
                return back();
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
                'created_at'=> Carbon::now(),
            ]);

            Session::flash('status', "ویرایش مطلب با موفقیت انجام شد");
            return back();
        }else{
            Session::flash('error', "شما مجوز دسترسی به این بخش را ندارید");
            return back();
        }
    }

    public function editImageMagAction(Request $request){
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'post_id' => 'required','max:128',
                'thumbnail' => 'required|max:3048',
                'image' => 'required|max:3048',
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
                    $thumbnail = Carbon::now()->timestamp . $image;
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

            Blog::where('id', $request->post_id)->update([
                'thumbnail'=> $thumbnail,
                'image'=> $image,
            ]);

            Session::flash('status', "مطلب جدید با موفقیت ثبت شد");
            return back();
        }else{
            Session::flash('error', "شما مجوز دسترسی به این بخش را ندارید");
            return back();
        }
    }

    public function deleteMagAction($post_id){
        Blog::where('id', $post_id)->update([
            'delete' => 1,
            'deleted_at' => Carbon::now(),
        ]);
        Session::flash("success" , "حذف با موفقیت انجام شد");
        return back();
    }

    public function editMagPage($post_id){
        $post = Blog::where('id', $post_id)->first();
        $lastPost = Blog::orderByDesc('id')->paginate(6);
        return view('admin.views.blog.edit_content', ["post" => $post, "lastPost" => $lastPost]);
    }
}
