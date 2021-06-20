@extends("admin.views.layouts.master")
@section("shop")
    <shop>سامانه ثبت محصول | فروشگاه سی وسه</shop>
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
    <!-- Page Wrapper -->
    <div id="wrapper">
    @include("admin.views.partials.sidebar")

    <!-- Content Wrapper -->

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">
                    {{--Add TAG--}}
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
                                        <form action="{{route('add_tag')}}" method="POST">
                                            <div class="row text-right">
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="name" class="form-label ">ثبت برچسب</label>
                                                        <input type="text" name="name" class="form-control text-right" placeholder="مثلا : سامسونگ">
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
                    </div>
                    {{--Add TAG--}}


                    {{--Add Category And Category-Variety--}}
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header text-right">
                                        مدیریت دسته بندی ها
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
                                        <form action="{{route('add_category')}}" method="POST" enctype="multipart/form-data">
                                            <div class="row text-right">
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="name" class="form-label ">نام فارسی دسته بندی</label>
                                                        <input type="text" name="name" class="form-control text-right" placeholder="مثلا : کالای دیجیتال">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="english_name" class="form-label ">نام اینگلیسی دسته بندی</label>
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
                                                        <label for="discription" class="form-label ">توضیحات دسته بندی</label>
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
                                                    <button class="btn btn-success btn-sm" type="submit">افزودن دسته بندی</button>
                                                </div>
                                            </div>
                                        </form>
                                        <hr>
                                        <form action="{{route('add_category_variety')}}" method="POST">
                                            <div class="row text-right">
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="category" class="form-label ">انتخاب دسته بندی</label>
                                                        <select name="category" class="form-control">
                                                            @if(isset($category))
                                                                @foreach($category as $item)
                                                                    <option value="{{$item->id}}" @if($item->id == old('category')) selected @endif>
                                                                        {{$item->name}}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="name" class="form-label ">زیردسته</label>
                                                        <select name="variety[]" class="form-control select2" multiple>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12 buttons text-right">
                                                    <button class="btn btn-success btn-sm" type="submit">افزودن زیردسته</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Add Category And Category-Variety--}}


                    {{--ADD Product--}}
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                {{--ADD Product--}}
                                <div class="card">
                                    <div class="card-header text-right">
                                        ساخت وب سرویس جدید
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
                                        <form id="make_product" action="{{route('new_webservice_action')}}" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3">
                                                        <label for="category" class="form-label ">دسته بندی</label>
                                                        <select id="select_category" name="category" class="form-control">
                                                            @if(isset($category))
                                                                @foreach($category as $item)
                                                                    <option id="select_item" value="{{$item->id}}" @if($item->id == old('category')) selected @endif>
                                                                        {{$item->name}}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3">
                                                        <label for="category_variety" class="form-label ">زیردسته ها</label>
                                                        <select id="category_variety" name="category_variety" class="form-control">

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3">
                                                        <label for="tag" class="form-label ">برچسب ها</label>
                                                        <select name="tag[]" class="form-control select2" multiple>
                                                            @if(isset($product_tag))
                                                                @foreach($product_tag as $item)
                                                                    <option value="{{$item->id}}" @if($item->id == old('tag')) selected @endif>
                                                                        {{$item->name}}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <input type="hidden" readonly name="type" value="api">
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3">
                                                        <label for="name" class="form-label ">نام محصول (فارسی)</label>
                                                        <input type="text" name="name" class="form-control" placeholder="مثلا : ساعت هوشمند سامسونگ">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3">
                                                        <label for="englishName" class="form-label ">نام محصول (اینگلیسی)</label>
                                                        <input type="text" name="englishName" class="form-control" placeholder="مثلا : Smart Watch Samsung">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3">
                                                        <label for="discount" class="form-label "> (لطفا مقدار درصد قرار ندهید)   تخفیف</label>
                                                        <input type="text" name="discount" class="form-control" placeholder="مثلا : 20">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="price" class="form-label ">قیمت</label>
                                                        <input type="text" name="price" class="form-control" placeholder="مثلا : 2,245,000">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="description" class="form-label ">توضیحات</label>
                                                        <textarea class="form-control textarea-editor" name="description" id="description" rows="10" aria-hidden="true" wfd-invisible="true"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-3 col-lg-3">
                                                    <div class="my-3">
                                                        <label for="framework" class="form-label ">FrameWork</label>
                                                        <input disabled type="text" name="framework" class="form-control" placeholder="مثلا : Laravel">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-3 col-lg-3">
                                                    <div class="my-3">
                                                        <label for="admin_pannel" class="form-label ">پنل مدیریت</label>
                                                        <select disabled name="admin_pannel" class="form-control">
                                                            <option value="1" selected>دارد</option>
                                                            <option value="0">ندارد</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-3 col-lg-3">
                                                    <div class="my-3">
                                                        <label for="framework_version" class="form-label ">API_Version</label>
                                                        <input type="text" name="framework_version" class="form-control" placeholder="مثلا : 8.4">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-3 col-lg-3">
                                                    <div class="my-3">
                                                        <label for="free_request" class="form-label ">Free Request</label>
                                                        <input type="text" name="free_request" class="form-control" placeholder="مثلا : 100">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="framework_details" class="form-label ">framework_details / Api_details </label>
                                                        <textarea class="form-control textarea-editor" name="framework_details" id="framework_details" rows="5" aria-hidden="true" wfd-invisible="true"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="special_features" class="form-label ">special_features</label>
                                                        <textarea class="form-control textarea-editor" name="special_features" id="special_features" rows="5" aria-hidden="true" wfd-invisible="true"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="short_description_of_backend" class="form-label ">short_description_of_backend / Api</label>
                                                        <textarea class="form-control textarea-editor" name="short_description_of_backend" id="short_description_of_backend" rows="5" aria-hidden="true" wfd-invisible="true"></textarea>
                                                    </div>
                                                </div>

                                                {{--ADD Develop language--}}
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="result_sample" class="form-label ">Result Sample</label>
                                                        <textarea class="form-control textarea-editor" name="result_sample" id="result_sample" rows="5" aria-hidden="true" wfd-invisible="true"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="parameters" class="form-label ">پارامترهایی که کاربر باید وارد کند</label>
                                                        <textarea class="form-control textarea-editor" name="parameters" id="parameters" rows="5" aria-hidden="true" wfd-invisible="true"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="php_language" class="form-label ">php_language</label>
                                                        <textarea class="form-control textarea-editor" name="php_language" id="php_language" rows="5" aria-hidden="true" wfd-invisible="true"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="js_language" class="form-label ">Js_language</label>
                                                        <textarea class="form-control textarea-editor" name="js_language" id="js_language" rows="5" aria-hidden="true" wfd-invisible="true"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="nodejs_language" class="form-label ">Nodejs_language</label>
                                                        <textarea class="form-control textarea-editor" name="nodejs_language" id="nodejs_language" rows="5" aria-hidden="true" wfd-invisible="true"></textarea>
                                                    </div>
                                                </div>

                                                {{--ADD Develop language--}}


                                                <div class="text-center">
                                                    <p>تنظیمات Seo</p>
                                                </div>

                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-10 col-lg-10">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-text"> عنوان سئو </div>
                                                                <input type="text" class="form-control" autocomplete="off" value="{{ old("seo_title") }}" name="seo_title">
                                                            </div>
                                                        </div>
                                                        <div class="col-2 col-lg-2">
                                                            <div class="font-12 fw-normal ms-1" id="title_count"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-10 col-lg-10">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-text"> توضیحات سئو </div>
                                                                <input type="text" class="form-control" autocomplete="off" value="{{ old("seo_description") }}" name="seo_description">
                                                            </div>
                                                        </div>
                                                        <div class="col-2 col-lg-2">
                                                            <div class="font-12 fw-normal ms-1" id="description_count"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-12">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">آدرس URL Canonical</span>
                                                        <input type="text" class="form-control ltr" autocomplete="off" value="{{ old("seo_canonical") }}" name="seo_canonical">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-3 col-lg-3 text-center">
                                                    <div class="mt-3">
                                                        <label for="image" class="form-label text-success">عکس بزرگ</label>
                                                        <input type="file" name="image">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-3 col-lg-3 text-center">
                                                    <div class="mt-3">
                                                        <label for="thumbnail" class="form-label text-primary">عکس کوچک</label>
                                                        <input type="file" name="thumbnail">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-3 col-lg-3 text-center">
                                                    <div class="mt-3">
                                                        <label for="file" class="form-label text-primary">فایل</label>
                                                        <input type="file" name="file">
                                                    </div>
                                                </div>

                                                <div class="col-12 mt-3 col-md-3 col-lg-3 buttons text-center">
                                                    <button id="make_product_btn" class="btn btn-success btn-sm" type="submit">ثبت محصول</button>
                                                    <a href="" class="a-button btn btn-danger btn-sm">حذف محصول</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                {{--ADD Product--}}

                                {{--Last Product--}}
                                @if (isset($last_product[0]))
                                <div class="card">
                                    <div class="card-header text-right">
                                        آخرین محصولات افزوده شده
                                    </div>
                                    <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead class="table-light">
                                                    <tr>
                                                        <th>عکس</th>
                                                        <th>نام محصول</th>
                                                        <th>قیمت</th>
                                                        <th>تخفیف</th>
                                                        <th>تاریخ</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="border">
                                                    @foreach($last_product as $item)
                                                        <tr>
                                                            <td><img class="img-fluid" src="/uploads/thumbnail/{{$item->thumbnail}}" style="max-width: 150px"></td>
                                                            <td>{{$item->product_name}}</td>
                                                            <td>{{number_format($item->price)}}</td>
                                                            <td>{{$item->discount}}%</td>
                                                            <td>{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format("Y/m/d") }}</td>
                                                            <td>
                                                                <a href="{{route('delete_api' , $item->id)}}" class="btn btn-danger btn-sm">حذف</a>
                                                                <a href="{{route('edit_api' , $item->id)}}" class="btn btn-success btn-sm">ویرایش</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{$last_product->links()}}
                                            </div>
                                    </div>
                                </div>
                                @endif
                                {{--Last Product--}}
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
        $( document ).ready(function() {
            $('#select_category').on('change', function () {
                $category_id = $(this).val();
                $.ajax({
                    url : "{{route('get_variety')}}",
                    type : "POST",
                    data : {'category_id' : $category_id},
                    success : function (data) {
                        $('#category_variety').empty();
                        $.each(data , function (key , value) {
                            $('#category_variety').append('<option value=' + value["id"] + '>' + value['name'] + "</option>");
                        })
                    }
                });
            });
        });
    </script>


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
