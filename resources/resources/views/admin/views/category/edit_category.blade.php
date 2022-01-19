@extends("admin.views.layouts.master")
@section("shop")
    <shop>سامانه ویرایش دسته بندی | فروشگاه آرمان</shop>
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


                    @if(isset($slcategory))
                        {{--Edit Image Product--}}
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                        تغییر عکس دسته بندی
                                    </div>
                                        <div class="card-body">
                                            <img src="/uploads/category/{{$slcategory->image}}" style="width:100px;height:100px;">
                                        <form method="POST" action="{{route('image_edit_category_action')}}" enctype="multipart/form-data">
                                            <input name="user_id" type="hidden" value="{{\Illuminate\Support\Facades\Auth::id()}}" readonly="readonly">
                                            <input name="id" type="hidden" value="{{$slcategory->id}}" readonly="readonly">
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-6 text-center">
                                                    <div class="mt-3">
                                                        <label for="image" class="form-label text-success">Picture</label>
                                                        <input type="file" name="image">
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
                    @endif
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header text-right">
                                            ویرایش دسته بندی
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
                                            @if (isset($slcategory))
                                                <form action="{{route('edit_category_action')}}" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" readonly value="{{$slcategory->id}}">
                                                    <input type="hidden" name="user_id" readonly value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                                    <div class="row text-right">
                                                            <div class="col-12">
                                                                <div class="my-3">
                                                                    <label for="name" class="form-label ">نام فارسی دسته بندی</label>
                                                                    <input type="text" name="name" class="form-control text-right" value="{{$slcategory->name}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="my-3">
                                                                    <label for="english_name" class="form-label ">نام اینگلیسی دسته بندی</label>
                                                                    <input type="text" name="english_name" class="form-control text-right" value="{{$slcategory->english_name}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="my-3">
                                                                    <label for="slug" class="form-label ">نام اینگلیسی دسته بندی</label>
                                                                    <input type="text" name="slug" class="form-control text-right" value="{{$slcategory->slug}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="my-3">
                                                                    <label for="seo_title" class="form-label ">SEO Title</label>
                                                                    <input type="text" name="seo_title" class="form-control text-right" value="{{$slcategory->seo_title}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="my-3">
                                                                    <label for="seo_description" class="form-label ">SEO Discription</label>
                                                                    <input type="text" name="seo_description" class="form-control text-right" value="{{$slcategory->seo_description}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="my-3">
                                                                    <label for="seo_canonical" class="form-label ">SECO Canonical</label>
                                                                    <input type="text" name="seo_canonical" class="form-control text-right" value="{{$slcategory->seo_canonical}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="my-3">
                                                                    <label for="description" class="form-label ">توضیحات دسته بندی</label>
                                                                    <input type="text" name="description" class="form-control text-right textarea-editor" value="{{$slcategory->description}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 buttons text-right">
                                                                <button class="btn btn-success btn-sm" type="submit">ویرایش دسته بندی</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                            @endif
                                        </div>
                                    </div>
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
                $slcategory_id = $(this).val();
                $.ajax({
                    url : "{{route('get_variety')}}",
                    type : "POST",
                    data : {'category_id' : $slcategory_id},
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
