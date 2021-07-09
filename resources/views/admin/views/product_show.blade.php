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
                    {{--ADD Product--}}
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card mt-3">
                                    <div class="card-header text-right">
                                        محصولات افزوده شده
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
                                                            <td><img class="img-fluid" src="/uploads/thumbnail/{{$item->thumbnail ?? "بدون عکس"}}" style="max-width: 150px"></td>
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
