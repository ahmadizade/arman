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
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="{{route('home')}}" role="button" id="dropdownMenuLink"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                             aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="{{route('home')}}">Action</a>
                                            <a class="dropdown-item" href="{{route('home')}}">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{route('home')}}">Something else here</a>
                                        </div>
                                    </div>
                                    <h6 class="m-0 myfont font-weight-bold text-primary">
                                        سامانه مدیریت کالا
                                    </h6>

                                </div>
                                <div class="card-body admin-rtl">
                                    <!-- Card Body -->
                                    <form id="product-search-form" method="" action="">
                                        <div class="col-4">
                                            <select name="product_id" id="product_id"
                                                    class="product_id text-right form-control bg-muted"></select>
                                        </div>
                                    </form>

                                    <table id="product_table"
                                           class="table mt-4 table-responsive-xl table-responsive-sm text-center  text-black table-striped"
                                           width="100%">
                                        <thead class="text-black shadow text-white bg-gradient-info">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">عکس</th>
                                            <th scope="col">نام محصول</th>
                                            {{--                                            <th scope="col">product_desc</th>--}}
                                            <th scope="col">قیمت</th>
                                            <th scope="col">تخفیف</th>
                                            <th scope="col">وضعیت کالا</th>
                                            <th scope="col">تعداد</th>
                                            <th scope="col">شهر</th>
                                            <th scope="col">موبایل</th>
                                            <th scope="col">بازدید</th>
                                            <th scope="col">تاریخ ساخت</th>
                                            <th scope="col">تاریخ ویرایش</th>
                                            <th scope="col">نمایش</th>
                                            <th scope="col">ویرایش</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td scope="row"><input class="border-none" id="data-id"></td>
                                            <td>
                                                <img style="max-width: 70px;max-height: 70px;" id="data-image"
                                                     class="img-fluid" src="" alt="">
                                            </td>
                                            <td><input class="border-none" id="data-product_name" name="product_name">
                                            </td>
                                            {{--                                            <td id="data-product_desc"></td>--}}
                                            <td><input class="border-none" style="width: 100px" id="data-price"
                                                       name="price"></td>

                                            <td><input class="border-none" style="width: 50px" id="data-discount"
                                                       name="discount"></td>
                                            <td>
                                                <select class="border-none" style="width: 70px" id="data-stock"
                                                        name="stock">
                                                    <option value="1">آکبند</option>
                                                    <option value="0">کارکرده</option>
                                                </select>
                                            </td>
                                            <td><input class="border-none" style="width: 50px" id="data-quantity"
                                                       name="quantity"></td>
                                            <td><input class="border-none" style="width: 100px" id="data-city"
                                                       name="city"></td>
                                            <td><input class="border-none" style="width: 60px" id="data-mobile"
                                                       name="mobile"></td>
                                            <td><input class="border-none" style="width: 50px" id="data-view"
                                                       name="view"></td>
                                            <td><input class="border-none" style="width: 100px" id="data-created_at"
                                                       name="created_at"></td>
                                            <td><input class="border-none" style="width: 100px" id="data-updated_at"
                                                       name="updated_at"></td>
                                            <td>
                                                <select class="border-none" style="width: 70px" id="data-status"
                                                        name="status">
                                                    <option value="1">فعال</option>
                                                    <option value="0">غیر فعال</option>
                                                </select>
                                            </td>
                                            <td id="data-Edit">
                                                <button class="btn text-white btn-sm bg-gradient-success"
                                                        data-toggle="modal" data-target="#save">ذخیره
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

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


                    {{--ADD Product--}}
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header text-right">
                                        ثبت محصول
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
                                        <form id="make_product" action="{{route('add_product')}}" method="POST" enctype="multipart/form-data">
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
                                                        <input type="text" name="framework" class="form-control" placeholder="مثلا : Laravel">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-3 col-lg-3">
                                                    <div class="my-3">
                                                        <label for="admin_pannel" class="form-label ">پنل مدیریت</label>
                                                        <select name="admin_pannel" class="form-control">
                                                            <option value="1" selected>دارد</option>
                                                            <option value="0">ندارد</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-3 col-lg-3">
                                                    <div class="my-3">
                                                        <label for="framework_version" class="form-label ">Framework_Version</label>
                                                        <input type="text" name="framework_version" class="form-control" placeholder="مثلا : 8.4">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-3 col-lg-3">
                                                    <div class="my-3">
                                                        <label for="data_usage" class="form-label ">data_usage</label>
                                                        <input type="text" name="data_usage" class="form-control" placeholder="مثلا : میزان حجم اشغالی">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="framework_details" class="form-label ">framework_details</label>
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
                                                        <label for="short_description_of_backend" class="form-label ">short_description_of_backend</label>
                                                        <textarea class="form-control textarea-editor" name="short_description_of_backend" id="short_description_of_backend" rows="5" aria-hidden="true" wfd-invisible="true"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="admin_pannel_features" class="form-label ">admin_pannel_features</label>
                                                        <textarea class="form-control textarea-editor" name="admin_pannel_features" id="admin_pannel_features" rows="5" aria-hidden="true" wfd-invisible="true"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3">
                                                        <label for="framework_frontend" class="form-label ">framework_frontend</label>
                                                        <input type="text" name="framework_frontend" class="form-control" placeholder="مثلا : فریم ورک یوآی">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3">
                                                        <label for="framework_frontend_version" class="form-label ">framework_frontend_version</label>
                                                        <input type="text" name="framework_frontend_version" class="form-control" placeholder="مثلا : ورژه 4">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="framework_frontend_details" class="form-label ">framework_frontend_details</label>
                                                        <textarea class="form-control textarea-editor" name="framework_frontend_details" id="framework_frontend_details" rows="5" aria-hidden="true" wfd-invisible="true"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="other_plugins" class="form-label ">other_plugins</label>
                                                        <textarea class="form-control textarea-editor" name="other_plugins" id="other_plugins" rows="5" aria-hidden="true" wfd-invisible="true"></textarea>
                                                    </div>
                                                </div>

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
                                <div class="card">
                                    <div class="card-header text-right">
                                        آخرین محصولات افزوده شده
                                    </div>
                                    <div class="card-body">
                                        @if (isset($last_product))
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
                                                                <a href="{{route('delete_product' , $item->id)}}" class="btn btn-danger btn-sm">حذف</a>
                                                                <a href="{{route('edit_product' , $item->id)}}" class="btn btn-success btn-sm">ویرایش</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{$last_product->links()}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    {{--Add TAG--}}

                </div>
        </div>
    </div>
    {{--Save MODAL--}}
    <div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="del"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-danger modal-shop myfont" id="del">تغییر وضعیت نمایش</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-right">
                    آیا از انجام این عملیات اطمینان دارید؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
                    <button type="button" id="save-product" class="btn btn-success" data-dismiss="modal">
                        ذخیره
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--Save MODAL--}}




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
