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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                {{--Add Category And Category-Variety--}}
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header text-right font-weight-bold">
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
                                                        <input type="text" name="name" class="form-control text-right" placeholder="مثلا : ماسک">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="english_name" class="form-label ">نام اینگلیسی دسته بندی</label>
                                                        <input type="text" name="english_name" class="form-control text-right admin-rtl" placeholder="مثلا : Diagnostic kits">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="seo_title" class="form-label ">SEO Title</label>
                                                        <input type="text" name="seo_title" class="form-control text-right" placeholder="عنوان سئو">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="seo_description" class="form-label ">SEO Discription</label>
                                                        <input type="text" name="seo_description" class="form-control text-right" placeholder="توضیحات سئو">
                                                    </div>
                                                </div>
{{--                                                <div class="col-12">--}}
{{--                                                    <div class="my-3">--}}
{{--                                                        <label for="seo_canonical" class="form-label ">SECO Canonical</label>--}}
{{--                                                        <input type="text" name="seo_canonical" class="form-control text-right">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="description" class="form-label ">توضیحات دسته بندی</label>
                                                        <input type="text" name="description" class="form-control text-right textarea-editor">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="image" class="form-label admin-rtl">آپلود عکس : width : 135 / height : 85</label>
                                                        <input type="file" name="image" class="form-control text-right">
                                                    </div>
                                                </div>
                                                <div class="col-12 buttons text-right">
                                                    <button class="btn btn-success btn-sm" type="submit">افزودن دسته بندی</button>
                                                </div>
                                            </div>
                                        </form>
                                        <hr>
{{--                                        <form action="{{route('add_category_variety')}}" method="POST">--}}
{{--                                            <div class="row text-right">--}}
{{--                                                <div class="col-12">--}}
{{--                                                    <div class="my-3">--}}
{{--                                                        <label for="category" class="form-label ">انتخاب دسته بندی</label>--}}
{{--                                                        <select name="category" class="form-control">--}}
{{--                                                            @if(isset($category))--}}
{{--                                                                @foreach($category as $item)--}}
{{--                                                                    <option value="{{$item->id}}" @if($item->id == old('category')) selected @endif>--}}
{{--                                                                        {{$item->name}}--}}
{{--                                                                    </option>--}}
{{--                                                                @endforeach--}}
{{--                                                            @endif--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-12">--}}
{{--                                                    <div class="my-3">--}}
{{--                                                        <label for="name" class="form-label ">زیردسته</label>--}}
{{--                                                        <select name="variety[]" class="form-control select2" multiple>--}}

{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-12 buttons text-right">--}}
{{--                                                    <button class="btn btn-success btn-sm" type="submit">افزودن زیردسته</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-5">
                            <div class="card-header text-right font-weight-bold">
                                آخرین محصولات افزوده شده
                            </div>
                            <div class="card-body">
                                @if (isset($last_category))
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
                                            @foreach($last_category as $item)
                                                <tr>
                                                    <td><img class="img-fluid" src="/uploads/category/{{$item->image}}" style="max-width: 150px"></td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->english_name}}</td>
                                                    <td>{{$item->slug}}</td>
                                                    <td>{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format("Y/m/d") }}</td>
                                                    <td>
                                                        <a href="{{route('delete_category' , $item->id)}}" class="btn btn-danger btn-sm">حذف</a>
                                                        <a href="{{route('edit_category' , $item->id)}}" class="btn btn-success btn-sm">ویرایش</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{$last_category->links()}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
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
