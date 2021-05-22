@extends("admin.views.layouts.master")
@section("shop")
    <shop>سامانه ویرایش محصول | فروشگاه سیوسه</shop>
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
                                        @if(isset($product))
                                            <form id="make_product" action="{{route('admin_edit_product_action')}}" method="POST" enctype="multipart/form-data">
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
                                                                <option value="{{$item->id}}" @if($item->id == $product->tag) selected @endif>
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
                                                    <label for="framework" class="form-label ">FrameWork</label>
                                                    <input value="{{$product->framework}}" type="text" name="framework" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="my-3">
                                                    <label for="admin_pannel" class="form-label ">پنل مدیریت</label>
                                                    <select name="admin_pannel" class="form-control">
                                                        <option value="1" @if($product->admin_pannel == 1) selected @endif>دارد</option>
                                                        <option value="0" @if($product->admin_pannel == 0) selected @endif>ندارد</option>
                                                    </select>
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
                                                    <label for="data_usage" class="form-label ">data_usage</label>
                                                    <input value="{{$product->data_usage}}" type="text" name="data_usage" class="form-control" placeholder="مثلا : میزان حجم اشغالی">
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

                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="admin_pannel_features" class="form-label ">admin_pannel_features</label>
                                                    <textarea class="form-control textarea-editor" name="admin_pannel_features" id="admin_pannel_features" rows="5" aria-hidden="true" wfd-invisible="true">{{$product->admin_pannel_features}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="my-3">
                                                    <label for="framework_frontend" class="form-label ">framework_frontend</label>
                                                    <input value="{{$product->framework_frontend}}" type="text" name="framework_frontend" class="form-control" placeholder="مثلا : فریم ورک یوآی">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="my-3">
                                                    <label for="framework_frontend_version" class="form-label ">framework_frontend_version</label>
                                                    <input value="{{$product->framework_frontend_version}}" type="text" name="framework_frontend_version" class="form-control" placeholder="مثلا : ورژه 4">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="framework_frontend_details" class="form-label ">framework_frontend_details</label>
                                                    <textarea class="form-control textarea-editor" name="framework_frontend_details" id="framework_frontend_details" rows="5" aria-hidden="true" wfd-invisible="true">{{$product->framework_frontend_details}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="other_plugins" class="form-label ">other_plugins</label>
                                                    <textarea class="form-control textarea-editor" name="other_plugins" id="other_plugins" rows="5" aria-hidden="true" wfd-invisible="true">{{$product->other_plugins}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-4 col-lg-4 text-center">
                                                <div class="mt-3">
                                                    <label for="image" class="form-label text-success">عکس بزرگ</label>
                                                    <input value="{{$product->image}}" type="file" name="image">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-4 col-lg-4 text-center">
                                                <div class="mt-3">
                                                    <label for="thumbnail" class="form-label text-primary">عکس کوچک</label>
                                                    <input value="{{$product->thumbnail}}" type="file" name="thumbnail">
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
                                                            <td><a href="{{route('delete_product' , $item->id)}}" class="btn btn-danger btn-sm">حذف</a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
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
