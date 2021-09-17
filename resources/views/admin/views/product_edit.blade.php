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

        .edit-slider {
            position:relative;
            margin-right: 50px;
            padding:0;
        }

        .edit-slider img{
            width:120px;
            height: 100px;
        }

        .edit-slider span{
            position: absolute;
            left: 0px;
            bottom: 0;
            font-size: 17px;
            cursor: pointer;
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
                    @include('admin.views.partials.condition')


                    @if(isset($product))
                        {{--Edit Image Product--}}
                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header text-right">
                                            عکس شاخص
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="{{route('image_edit_product_action')}}" enctype="multipart/form-data">
                                                <input name="user_id" type="hidden" value="{{\Illuminate\Support\Facades\Auth::id()}}" readonly="readonly">
                                                <input name="id" type="hidden" value="{{$product->id}}" readonly="readonly">
                                                <div class="row">
                                                    <div class="col-12 text-left">
                                                        <div class="text-center">
                                                            <P class="admin-rtl">سایز عکس شاخص : 685 در 800</P>
                                                            <P class="admin-rtl">Width : 685 / Height : 800</P>
                                                        </div>
                                                        <input type="file" name="thumbnail">
                                                    </div>
                                                    <div class="col-12 text-left">
                                                        <img src="/uploads/thumbnail/{{$product->thumbnail ?? "noimage.png"}}" class="img-fluid" style="width:150px;">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-3 buttons text-right">
                                                        <button id="make_product_btn" class="btn btn-success btn-sm" type="submit">آپلود عکس ها</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Edit Image Product--}}



                        {{--Edit Image Product--}}
                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header text-right">
                                            عکس های اسلایدر
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="{{route('slider_edit_product_action')}}" enctype="multipart/form-data">
                                                <input name="user_id" type="hidden" value="{{\Illuminate\Support\Facades\Auth::id()}}" readonly="readonly">
                                                <input name="id" type="hidden" value="{{$product->id}}" readonly="readonly">
                                                <div class="row">
                                                    <div class="col-12 text-left">
                                                        <div class="text-center">
                                                            <P class="admin-rtl">سایز عکس های اسلایدر : 685 در 800</P>
                                                            <P class="admin-rtl">Width : 685 / Height : 800</P>
                                                        </div>
                                                        <input multiple="multiple" type="file" name="slider[]">
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row text-left">
                                                            @if(isset($product->slider) && isset($product->slider[0]))
                                                                @foreach(json_decode($product->slider) as $key => $image)
                                                                    <div class="col-2 edit-slider mt-3">
                                                                        <img src="/uploads/slider/{{$image ?? "noimage_200.jpg"}}">
                                                                        <span data-id="{{$key}}" class="font-weight-bold badge-danger p-2 rounded text-white delete-slide fa fa-trash"></span>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-3 buttons text-right">
                                                        <button id="make_product_btn" class="btn btn-success btn-sm" type="submit">آپلود عکس ها</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Edit Image Product--}}

                    @endif
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header text-right">
                                        ویرایش محصول
                                    </div>
                                    <div class="card-body admin-rtl">
                                        @if(isset($product))
                                        <form id="make_product" action="{{route('admin_edit_product_action')}}" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <input type="hidden" name="id" class="d-none" value="{{$product->id}}">
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="my-3 text-right">
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
                                                <div class="my-3 text-right">
                                                    <label for="tag[]" class="form-label">برچسب</label>
                                                    <select style="width: 100%" name="tag[]" class="form-control select2" multiple>
                                                        @if(isset($product->tag_id) && isset(json_decode($product->tag_id,JSON_NUMERIC_CHECK)[0]))
                                                            @foreach(json_decode($product->tag_id,JSON_NUMERIC_CHECK ) as $tag)
                                                                @if(isset($tagProduct[$tag]->slug))
                                                                    <option selected value="{{ $tag }}">{{ $tagProduct[$tag]->name ?? ""}}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                        @foreach($Product_tag as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name ?? "" }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <input readonly type="hidden" name="type" value="table">

                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="my-3 text-right">
                                                    <label for="name" class="form-label ">نام محصول (فارسی)</label>
                                                    <input value="{{$product->product_name}}" type="text" name="name" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="my-3 text-right">
                                                    <label for="englishName" class="form-label ">نام محصول (اینگلیسی)</label>
                                                    <input value="{{$product->english_name}}" type="text" name="englishName" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="my-3 text-right">
                                                    <label for="discount" class="form-label ">تخفیف</label>
                                                    <input value="{{$product->discount}}" type="text" name="discount" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="my-3 text-right">
                                                    <label for="price" class="form-label ">قیمت</label>
                                                    <input value="{{$product->price}}" type="text" name="price" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="my-3 text-right">
                                                    <label for="description" class="form-label ">توضیحات</label>
                                                    <textarea class="form-control textarea-editor" name="description" id="description" rows="10" aria-hidden="true" wfd-invisible="true">{{$product->product_desc}}</textarea>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <p>تنظیمات Seo</p>
                                            </div>
                                            <div class="col-12 col-lg-12">
                                                <div class="row">
                                                    <div class="col-12">
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
                                                    <div class="col-12">
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
{{--                                            <div class="col-12 col-lg-12">--}}
{{--                                                <div class="input-group mb-3">--}}
{{--                                                    <span class="input-group-text">آدرس URL Canonical</span>--}}
{{--                                                    <input type="text" class="form-control ltr" autocomplete="off" value="{{ $product->seo_canonical }}" name="seo_canonical">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

                                            <div class="col-12 mt-3 col-md-4 col-lg-4 buttons text-center">
                                                <button id="make_product_btn" class="btn btn-success btn-sm" type="submit">ثبت محصول</button>
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
                    {{--Add TAG--}}
                </div>
        </div>
    </div>
    {{--Alert MODAL--}}
    <div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="del"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-danger modal-shop myfont" id="del">ARMANMASK.CO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-right">
                    <p id="desc"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{--Alert MODAL--}}

@endsection
@section("extra_js")
    @include('admin.views.tinymce')
    <script src="/admin/js/admin_jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
        $( document ).ready(function() {

            $('.delete-slide').on('click', function (e) {
                e.preventDefault();
                $key = $(this).attr('data-id');
                console.log($key);
                $.ajax({
                    url : "{{route('delete_slider')}}",
                    type : "POST",
                    data : {'key' : $key, 'id' : {{$product->id}} },
                    success : function (data) {
                        if(data.status == "0") {
                            $( '#save' ).modal( 'show' );
                            $( '#desc' ).text(data.desc)
                        }
                        if(data.status == "1") {
                            $( '#save' ).modal( 'show' );
                            $( '#desc' ).text(data.desc)
                            window.setTimeout(function(){
                                location.reload()
                            },1000)
                        }
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
