@extends("admin.views.layouts.master")
@section("shop")
    <shop>سامانه ثبت محصول | فروشگاه آرمان ماسک</shop>
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
                    {{--ADD Product--}}
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card admin-rtl">
                                    <div class="card-header text-right">
                                        ثبت محصول جدید
                                    </div>
                                    <div class="card-body admin-rtl">
                                        @if (Session::has("errors"))
                                            <div class="alert alert-danger mb-2">
                                                <ul class="mb-0 text-center">
                                                    <li>{{ Session::get("errors") }}</li>
                                                </ul>
                                            </div>
                                        @endif
                                        @if(Session::has("status"))
                                            <div class="alert alert-success text-center mb-2">{{ Session::get("status") }}</div>
                                        @endif
                                        <form id="make_product" action="{{route('add_product')}}" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3 text-right">
                                                        <label for="category" class="form-label ">دسته بندی</label>
                                                        <select id="select_category" name="category" class="form-control">
                                                        @if(isset($category))
                                                                @foreach($category as $item)
                                                                    <option id="select_item" value="{{$item->id}}">
                                                                        {{$item->name}}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

{{--                                                <div class="col-12 col-md-6 col-lg-6">--}}
{{--                                                    <div class="my-3 text-right">--}}
{{--                                                        <label for="category_variety" class="form-label ">زیردسته ها</label>--}}
{{--                                                        <select id="category_variety" name="category_variety" class="form-control">--}}

{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3 text-right">
                                                        <label for="tag" class="form-label ">برچسب ها</label>
                                                        <select name="tag[]" class="form-control select2" multiple>
                                                            @if(isset($Product_tag))
                                                                @foreach($Product_tag as $item)
                                                                    <option value="{{$item->id}}">
                                                                        {{$item->name}}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <input readonly type="hidden" name="type" value="table">

                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3 text-right">
                                                        <label for="name" class="form-label ">نام محصول (فارسی)</label>
                                                        <input type="text" name="name" class="form-control" placeholder="مثلا : ساعت هوشمند سامسونگ">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3 text-right">
                                                        <label for="englishName" class="form-label ">نام محصول (اینگلیسی)</label>
                                                        <input type="text" name="englishName" class="form-control" placeholder="مثلا : Smart Watch Samsung">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3 text-right">
                                                        <label for="discount" class="form-label ">تخفیف</label>
                                                        <input type="text" name="discount" class="form-control" placeholder="مثلا : 20">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3 text-right">
                                                        <label for="price" class="form-label ">قیمت</label>
                                                        <input type="text" name="price" class="form-control" placeholder="مثلا : 2,245,000">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="my-3 text-right">
                                                        <label for="description" class="form-label ">توضیحات</label>
                                                        <textarea class="form-control textarea-editor" name="description" id="description" rows="10" aria-hidden="true" wfd-invisible="true"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-text"> عنوان سئو </div>
                                                                <input type="text" class="form-control" autocomplete="off" value="{{ old("seo_title") }}" name="seo_title">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-text"> توضیحات سئو </div>
                                                                <input type="text" class="form-control" autocomplete="off" value="{{ old("seo_description") }}" name="seo_description">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

{{--                                                <div class="col-12 col-lg-12">--}}
{{--                                                    <div class="input-group mb-3">--}}
{{--                                                        <span class="input-group-text">آدرس URL Canonical</span>--}}
{{--                                                        <input type="text" class="form-control ltr" autocomplete="off" value="{{ old("seo_canonical") }}" name="seo_canonical">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                                <div class="row my-3 text-right">
{{--                                                    <div class="col-12">--}}
{{--                                                        <div class="mt-3">--}}
{{--                                                            <label for="image" class="form-label text-success">عکس کوچک (width : 658 - height : 800)</label>--}}
{{--                                                            <input type="file" name="image">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

                                                    <div class="col-12 ">
                                                        <div class="mt-3">
                                                            <label for="thumbnail" class="form-label text-primary">عکس / width : 658 - height : 800</label>
                                                            <input type="file" name="thumbnail">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12 mt-3 buttons text-right">
                                                    <button id="make_product_btn" class="btn btn-success btn-sm" type="submit">ثبت محصول</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header text-right">
                                        آخرین محصولات افزوده شده
                                    </div>
                                    <div class="card-body admin-rtl">
                                        @if (isset($last_product))
                                            <div class="table-responsive">
                                                <table class="table table-hover text-center">
                                                    <thead class="table-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>نام محصول</th>
                                                        <th>قیمت</th>
                                                        <th>تخفیف</th>
                                                        <th>تاریخ</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="border">
                                                    @php
                                                    $i = 1;
                                                    @endphp
                                                    @foreach($last_product as $item)
                                                        <tr>
                                                            <td>{{$i++}}</td>
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

{{--    <script>--}}
{{--        $( document ).ready(function() {--}}
{{--            $('#select_category').on('change', function () {--}}
{{--                $category_id = $(this).val();--}}
{{--                $.ajax({--}}
{{--                    url : "{{route('get_variety')}}",--}}
{{--                    type : "POST",--}}
{{--                    data : {'category_id' : $category_id},--}}
{{--                    success : function (data) {--}}
{{--                        $('#category_variety').empty();--}}
{{--                        $.each(data , function (key , value) {--}}
{{--                            $('#category_variety').append('<option value=' + value["id"] + '>' + value['name'] + "</option>");--}}
{{--                        })--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}


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
