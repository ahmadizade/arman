<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
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
        $post = Blog::orderBy('id' , 'desc')->paginate(24);
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
        $blog_category = BlogCategory::where('show' , 1)->get();
        $blog_tag = BlogTag::where('show' , 1)->get();
        return view('admin.views.blog.new_content' , ["lastPost" => $lastPost, "blog_category" => $blog_category, "blog_tag" => $blog_tag, ]);
    }

    public function showSingleMag(){
        return view('admin.views.blog.show_content');
    }

    public function newSingleMagAction(Request $request){
        return $request;
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
               'author' => "تیم توسعه و تحقیق آرمان",
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

    public function categoryMagPage(){
        $lastCategory = BlogCategory::orderByDesc('id')->where('show', 1)->paginate(15);
        return view('admin.views.blog.category_blog' , ["lastCategory" => $lastCategory]);
    }

    public function editTagMagPage($id){
        $tag = BlogTag::where('id', $id)->first();
        return view('admin.views.blog.edit_tag' , ["tag" => $tag]);
    }


    public function newBlogCategoryAction(Request $request){
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'min:2', 'max:512'],
                'seo_title' => ['required', 'max:512'],
                'seo_description' => ['required', 'max:9999'],
            ]);
            if ($validator->fails()) {
                Session::flash('error' , $validator->errors()->first());
                return back();
            }
            BlogCategory::insert([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'slug' => self::slug($request->name),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ]);

            Session::flash('status', "دسته بندی جدید با موفقیت ثبت شد");
            return back();
        }else{
            Session::flash('error', "شما مجوز دسترسی به این بخش را ندارید");
            return back();
        }
    }

    public function editCategoryMagAction(Request $request){
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'id' => ['required'],
                'name' => ['required', 'string', 'min:2', 'max:512'],
                'seo_title' => ['required', 'max:512'],
                'seo_description' => ['required', 'max:9999'],
            ]);
            if ($validator->fails()) {
                Session::flash('error' , $validator->errors()->first());
                return back();
            }
            BlogCategory::where('id', $request->id)->update([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'slug' => self::slug($request->name),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ]);

            Session::flash('status', "ویرایش دسته با موفقیت انجام شد");
            return back();
        }else{
            Session::flash('error', "شما مجوز دسترسی به این بخش را ندارید");
            return back();
        }
    }

    public function deleteCategoryAction($id){
        BlogCategory::where('id', $id)->update([
            'show' => 0,
            'updated_at' => Carbon::now(),
        ]);
        Session::flash("success" , "حذف دسته با موفقیت انجام شد");
        return back();
    }

    public function tagMagPage(){
        $lastTag = BlogTag::orderByDesc('id')->where('show', 1)->paginate(15);
        $blog_category = BlogCategory::where('show' , 1)->get();
        $blog_tag = BlogTag::where('show' , 1)->get();
        return view('admin.views.blog.tag_blog' , ["lastTag" => $lastTag, "blog_category" => $blog_category, "blog_tag" => $blog_tag, ]);
    }

    public function newBlogTagAction(Request $request){
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'min:2', 'max:512'],
                'seo_title' => ['required', 'max:512'],
                'seo_description' => ['required', 'max:9999'],
            ]);
            if ($validator->fails()) {
                Session::flash('error' , $validator->errors()->first());
                return back();
            }
            BlogTag::insert([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'slug' => self::slug($request->name),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ]);

            Session::flash('status', "برچسب جدید با موفقیت ثبت شد");
            return back();
        }else{
            Session::flash('error', "شما مجوز دسترسی به این بخش را ندارید");
            return back();
        }
    }

    public function editCategoryMagPage($id){
        $editCategory = BlogCategory::where('id', $id)->first();
        return view('admin.views.blog.edit_category_blog' , ["editCategory" => $editCategory]);
    }

    public function deleteTagAction($id){
        BlogTag::where('id', $id)->update([
            'show' => 0,
            'updated_at' => Carbon::now(),
        ]);
        Session::flash("success" , "حذف برچسب با موفقیت انجام شد");
        return back();
    }

    public function editBlogTagAction(Request $request){
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'id' => ['required'],
                'name' => ['required', 'string', 'min:2', 'max:512'],
                'seo_title' => ['required', 'max:512'],
                'seo_description' => ['required', 'max:9999'],
            ]);
            if ($validator->fails()) {
                Session::flash('error' , $validator->errors()->first());
                return back();
            }
            BlogTag::where('id' , $request->id)->update([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'slug' => self::slug($request->name),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ]);
            Session::flash('status', "برچسب جدید با موفقیت ویرایش");
            return back();
        }else{
            Session::flash('error', "شما مجوز دسترسی به این بخش را ندارید");
            return back();
        }
    }

    public function editMagPage($post_id){
        $post = Blog::where('id', $post_id)->first();
        $blog_category = BlogCategory::where('show' , 1)->get();
        $blog_tag = BlogTag::where('show' , 1)->get();
        return view('admin.views.blog.edit_content', ["post" => $post, "blog_category" => $blog_category, "blog_tag" => $blog_tag]);
    }

    public function editSingleMagAction(Request $request){
        if (Auth::check() && Auth::user()->role == "admin") {
            $validator = Validator::make($request->all(), [
                'title' => ['required', 'string', 'min:5', 'max:128'],
                'blog_category' => ['required'],
                'blog_tag' => ['required'],
                'paragraph' => ['required', 'string', 'min:5', 'max:9999999'],
                'seo_title' => ['required', 'max:65'],
                'seo_description' => ['required', 'max:128'],
                'seo_canonical' => ['nullable', 'max:512'],
            ]);
            if ($validator->fails()) {
                Session::flash('errors', $validator->errors()->first());
                return back();
            }
            if (isset($request->blog_tag) && $request->blog_tag !== null){
                $tag_id = json_encode($request->blog_tag,JSON_NUMERIC_CHECK );
            }
            else{
                $tag_id = "";
            }
            Blog::where('id', $request->id)->update([
                'user_id' => Auth::id(),
                'title' => $request->title,
                'category_id' => $request->blog_category,
                'tag_id' => $tag_id,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'seo_canonical' => $request->seo_canonical,
                'slug' => self::slug($request->title),
                'author' => "تیم توسعه و تحقیق آرمان",
                'content'=> $request->paragraph,
                'updated_at' => Carbon::now(),
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
}
