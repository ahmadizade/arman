@extends("admin.views.layouts.master")
@section("shop")
    <shop>سامانه ویرایش محصول | فروشگاه آرمان</shop>
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


                    @if(isset($product))
                        {{--Edit Image Product--}}
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                        تغییر عکس محصول
                                    </div>
                                        <div class="card-body">
                                        <form method="POST" action="{{route('image_edit_api_action')}}" enctype="multipart/form-data">
                                            <input name="user_id" type="hidden" value="{{\Illuminate\Support\Facades\Auth::id()}}" readonly="readonly">
                                            <input name="id" type="hidden" value="{{$product->id}}" readonly="readonly">
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-6 text-center">
                                                    <div class="mt-3">
                                                        <label for="image" class="form-label text-success">عکس بزرگ</label>
                                                        <input type="file" name="image">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-6 text-center">
                                                    <div class="mt-3">
                                                        <label for="thumbnail" class="form-label text-primary">عکس کوچک</label>
                                                        <input type="file" name="thumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 mt-3 buttons text-right">
                                                    <button id="make_product_btn" class="btn btn-success btn-sm" type="submit">آپلود عکس</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Edit Image Product--}}

                        {{--Edit File Product--}}
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            تغییر فایل آپلود شده
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="{{route('admin_file_api_action')}}" enctype="multipart/form-data">
                                                <input name="user_id" type="hidden" value="{{\Illuminate\Support\Facades\Auth::id()}}" readonly="readonly">
                                                <input name="id" type="hidden" value="{{$product->id}}" readonly="readonly">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6 text-center">
                                                        <div class="mt-3">
                                                            <label for="file" class="form-label text-success">فایل</label>
                                                            <input type="file" name="file">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-3 buttons text-right">
                                                        <button id="make_product_btn" class="btn btn-success btn-sm" type="submit">آپلود فایل</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Edit File Product--}}

                        {{--Edit Api Action--}}
                        <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header text-right">
                                        ویرایش محصول
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
                                        @if(isset($product))
                                            <form id="make_product" action="{{route('admin_edit_api_action')}}" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <input type="hidden" name="id" class="d-none" value="{{$product->id}}">
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="my-3">
                                                    <label for="category" class="form-label ">دسته بندی</label>
                                                    <select id="select_category" name="category" class="form-control">
                                                        @if(isset($category) && isset($product))
                                                            @foreach($category as $item)
                                                                <option id="select_item" value="{{$item->id}}" @if($item->id == $product->category_id) selected @endif>
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
                                                        <option value="{{$product->category_variety}}" selected>{{$product->variety->name}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="my-3">
                                                    <label for="tag" class="form-label ">برچسب ها</label>
                                                    <select name="tag[]" class="form-control select2" multiple>
                                                        @if(isset($product_tag))
                                                            @foreach($product_tag as $item)
                                                                @foreach(json_decode($product->tag_id,1) as $tag)
                                                                    @if($item->id == $tag)
                                                                        <option value="{{$item->id}}" @if($item->id == $tag) selected @endif>
                                                                            {{$item->name}}
                                                                        </option>
                                                                    @else
                                                                        <option value="{{$item->id}}">
                                                                            {{$item->name}}
                                                                        </option>
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <input readonly type="hidden" name="type" value="table">

                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="my-3">
                                                    <label for="name" class="form-label ">نام محصول (فارسی)</label>
                                                    <input value="{{$product->product_name}}" type="text" name="name" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="my-3">
                                                    <label for="englishName" class="form-label ">نام محصول (اینگلیسی)</label>
                                                    <input value="{{$product->english_name}}" type="text" name="englishName" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="my-3">
                                                    <label for="discount" class="form-label "> (لطفا مقدار درصد قرار ندهید)   تخفیف</label>
                                                    <input value="{{$product->discount}}" type="text" name="discount" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="price" class="form-label ">قیمت</label>
                                                    <input value="{{$product->price}}" type="text" name="price" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="description" class="form-label ">توضیحات</label>
                                                    <textarea class="form-control textarea-editor" name="description" id="description" rows="10" aria-hidden="true" wfd-invisible="true">{{$product->product_desc}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="my-3">
                                                    <label for="framework_version" class="form-label ">Framework_Version</label>
                                                    <input value="{{$product->framework_version}}" type="text" name="framework_version" class="form-control" placeholder="مثلا : 8.4">
                                                </div>
                                            </div>


                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="my-3">
                                                    <label for="free_request" class="form-label ">Free Request</label>
                                                    <input type="text" value="{{$product->free_request}}" name="free_request" class="form-control" placeholder="مثلا : 100">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="framework_details" class="form-label ">framework_details</label>
                                                    <textarea class="form-control textarea-editor" name="framework_details" id="framework_details" rows="5" aria-hidden="true" wfd-invisible="true">{{$product->framework_details}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="special_features" class="form-label ">special_features</label>
                                                    <textarea class="form-control textarea-editor" name="special_features" id="special_features" rows="5" aria-hidden="true" wfd-invisible="true">{{$product->special_features}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="short_description_of_backend" class="form-label ">short_description_of_backend</label>
                                                    <textarea class="form-control textarea-editor" name="short_description_of_backend" id="short_description_of_backend" rows="5" aria-hidden="true" wfd-invisible="true">{{$product->short_description_of_backend}}</textarea>
                                                </div>
                                            </div>
                                            {{--ADD Develop language--}}

                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="result_sample" class="form-label ">Result Sample</label>
                                                    <textarea class="form-control textarea-editor" name="result_sample" id="result_sample" rows="5" aria-hidden="true" wfd-invisible="true">{{$product->result_sample}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="parameters" class="form-label ">پارامترهایی که کاربر باید وارد کند</label>
                                                    <textarea class="form-control textarea-editor" name="parameters" id="parameters" rows="5" aria-hidden="true" wfd-invisible="true">{{$product->parameters}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="php_language" class="form-label ">php language</label>
                                                    <textarea class="form-control textarea-editor" name="php_language" id="php_language" rows="5" aria-hidden="true" wfd-invisible="true">{{$product->php_language}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="js_language" class="form-label ">Js language</label>
                                                    <textarea class="form-control textarea-editor" name="js_language" id="js_language" rows="5" aria-hidden="true" wfd-invisible="true">{{$product->js_language}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="nodejs_language" class="form-label ">Nodejs language</label>
                                                    <textarea class="form-control textarea-editor" name="nodejs_language" id="nodejs_language" rows="5" aria-hidden="true" wfd-invisible="true">{{$product->nodejs_language}}</textarea>
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
                                                            <input type="text" class="form-control" autocomplete="off" value="{{$product->seo_title}}" name="seo_title">
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
                                                            <input type="text" class="form-control" autocomplete="off" value="{{ $product->seo_description }}" name="seo_description">
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
                                                    <input type="text" class="form-control ltr" autocomplete="off" value="{{ $product->seo_canonical }}" name="seo_canonical">
                                                </div>
                                            </div>

                                            <div class="col-12 mt-3 col-md-4 col-lg-4 buttons text-center">
                                                <button id="make_product_btn" class="btn btn-success btn-sm" type="submit">ثبت محصول</button>
                                                <a href="" class="a-button btn btn-danger btn-sm">حذف محصول</a>
                                            </div>
                                        </div>
                                    </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        {{--Edit Api Action--}}
                    @endif
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
