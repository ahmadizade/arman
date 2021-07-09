@extends("admin.views.layouts.master")
@section("shop")
    <shop>سامانه ثبت مطلب | فروشگاه سی وسه</shop>
@endsection
@section("extra_css")
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
@section("style")
    <style>
        body {
            line-height: 1.5;
            color: #858796;
            background-color: #fff;
            margin: 0;
            font-weight: normal;
            font-size: 13px;
            font-family: iranyekan, icomoon, sans-serif !important;
            text-align: left;
            word-break: keep-all;
            word-wrap: break-word;
        }

        .myfont {
            font-family: iranyekan, icomoon, sans-serif !important;
        }

        .admin-rtl {
            direction: rtl !important;
        }

        .border-none {
            border-top-style: hidden;
            border-right-style: hidden;
            border-left-style: hidden;
            border-bottom-style: hidden;
            background-color: transparent;
            /*height: 50px;*/
            width: 50px;
            text-align: center;
            vertical-align: middle;

        }

        .border-none:focus {
            outline: none;
        }

        /*td*/
        /*{*/
        /*    height: 50px;*/
        /*    width: 50px;*/
        /*    text-align: center;*/
        /*    vertical-align: middle;*/
        /*}*/
    </style>
@endsection
@section("content")
    <div id="wrapper">
    @include("admin.views.partials.sidebar")
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @if (isset($post))
                    <!-- Change Image Of Content -->
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header text-right">
                                            Change Post Picture
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" ACTION="{{route('edit_image_mag_action')}}" enctype="multipart/form-data">
                                                <input type="hidden" readonly name="post_id" value="{{$post->id}}">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="my-3">
                                                            <label for="thumbnail" class="form-label ">Thumbnail (Width : 400 , Height : 229)</label>
                                                            <input type="file" class="form-control" name="thumbnail">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="my-3">
                                                            <label for="image" class="form-label ">Image (Width : 800 , Height : 560)</label>
                                                            <input type="file" class="form-control" name="image">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 buttons text-right">
                                                    <button class="btn btn-success btn-sm" type="submit">تغییر عکس</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Change Image Of Content -->
                @endif
                <div class="container">
                    <div class="row">
                        <!-- Edit Content -->
                        <div class="col-xl-12 col-lg-12 mt-4">
                            <div class="card">
                                <div class="card-header text-right">
                                    ساخت محتوای جدید
                                </div>
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger mb-2">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if(Session::has("status"))
                                        <div class="alert alert-success text-center mb-2">{{ Session::get("status") }}</div>
                                    @endif
                                    @if (isset($post))
                                        <form action="{{route('edit_single_mag_action')}}" method="POST" enctype="multipart/form-data">
                                            <div class="row text-right">
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="title" class="form-label ">عنوان</label>
                                                        <input type="text" name="title" value="{{$post->title}}" class="form-control text-right">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="paragraph" class="form-label ">محتوا</label>
                                                        <textarea class="form-control textarea-editor" name="paragraph" rows="10" aria-hidden="true" wfd-invisible="true">{{$post->content}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="seo_title" class="form-label ">seo_title</label>
                                                        <input type="text" name="seo_title" class="form-control text-right" value="{{$post->seo_title}}">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="seo_description" class="form-label ">seo_description</label>
                                                        <input type="text" name="seo_description" class="form-control text-right" value="{{$post->seo_description}}">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="seo_canonical" class="form-label ">seo_canonical</label>
                                                        <input type="text" name="seo_canonical" class="form-control text-right" value="{{$post->seo_canonical}}">
                                                    </div>
                                                </div>
                                                <div class="col-12 buttons text-right">
                                                    <button class="btn btn-success btn-sm" type="submit">افزودن محتوا</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Edit Content -->
                    </div>
                    <!-- Last Content -->
                    <div class="card">
                        <div class="card-header text-right">
                            آخرین محصولات افزوده شده
                        </div>
                        <div class="card-body">
                            @if (isset($lastPost))
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-light">
                                        <tr>
                                            <th>عکس</th>
                                            <th>نام محصول</th>
                                            <th>تاریخ</th>
                                            <th>پاک شده</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody class="border">
                                        @foreach($lastPost as $item)
                                            <tr>
                                                <td><img class="img-fluid" src="/uploads/thumbnail/{{$item->thumbnail}}" style="max-width: 150px"></td>
                                                <td>{{$item->title}}</td>
                                                <td>{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format("Y/m/d") }}</td>
                                                <td>
                                                    @if ($item->delete == 1)
                                                        بله
                                                    @else
                                                        خیر
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('delete_mag_action' , ['post_id' => $item->id])}}" class="btn btn-danger btn-sm">حذف</a>
                                                    <a href="{{route('edit_mag_page' , ['post_id' => $item->id])}}" class="btn btn-success btn-sm">ویرایش</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{$lastPost->links()}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- Last Content -->
                </div>
            </div>
        </div>
    </div>

@endsection
@section("extra_js")
    @include('admin.views.tinymce')
    <script src="/admin/js/admin_jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(".select2").select2({
            tags:true,
        })
    </script>
    <script>
        tinyMCE.triggerSave(true, true);
        var dataForm = new FormData($("#make_product")[0]);
    </script>
@endsection
