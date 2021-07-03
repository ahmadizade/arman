@extends("admin.views.layouts.master")
@section("title")
    <title>CioCe.ir | مدیریت کاربران</title>
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
    </style>
@endsection

@section("content")
    <!-- Page Wrapper -->
    <div id="wrapper">
    @include("admin.views.partials.sidebar")

    <!-- Content Wrapper -->

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <div class="container-fluid">
                    {{--Add Tag--}}
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header text-right">
                                        مدیریت برچسب ها
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
                                        <form action="{{route('add_tag')}}" method="POST" enctype="multipart/form-data">
                                            <div class="row text-right">
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="name" class="form-label ">نام فارسی برچسب</label>
                                                        <input type="text" name="name" class="form-control text-right" placeholder="مثلا : کالای دیجیتال">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="english_name" class="form-label ">نام اینگلیسی برچسب</label>
                                                        <input type="text" name="english_name" class="form-control text-right" placeholder="مثلا : نام اینگلیسی">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="seo_title" class="form-label ">SEO Title</label>
                                                        <input type="text" name="seo_title" class="form-control text-right" placeholder="مثلا : SEO Title">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="seo_description" class="form-label ">SEO Discription</label>
                                                        <input type="text" name="seo_description" class="form-control text-right" placeholder="مثلا : SEO Discription">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="seo_canonical" class="form-label ">SECO Canonical</label>
                                                        <input type="text" name="seo_canonical" class="form-control text-right" placeholder="مثلا : SECO Canonical">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="discription" class="form-label ">توضیحات برچسب</label>
                                                        <input type="text" name="discription" class="form-control text-right textarea-editor">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="image" class="form-label ">عکس</label>
                                                        <input type="file" name="image" class="form-control text-right">
                                                    </div>
                                                </div>
                                                <div class="col-12 buttons text-right">
                                                    <button class="btn btn-success btn-sm" type="submit">افزودن برچسب</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header text-right">
                                آخرین محصولات افزوده شده
                            </div>
                            <div class="card-body">
                                @if (isset($last_tag))
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="table-light">
                                            <tr>
                                                <th>عکس</th>
                                                <th>نام محصول</th>
                                                <th>نام لاتین</th>
                                                <th>اسلاگ</th>
                                                <th>تاریخ</th>
                                                <th>عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody class="border">
                                            @foreach($last_tag as $item)
                                                <tr>
                                                    <td><img class="img-fluid" src="/uploads/category/{{$item->image}}" style="max-width: 150px"></td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->english_name}}</td>
                                                    <td>{{$item->slug}}</td>
                                                    <td>{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format("Y/m/d") }}</td>
                                                    <td>
                                                        <a href="{{route('delete_tag' , $item->id)}}" class="btn btn-danger btn-sm">حذف</a>
                                                        <a href="{{route('edit_tag' , $item->id)}}" class="btn btn-success btn-sm">ویرایش</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{$last_tag->links()}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
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
