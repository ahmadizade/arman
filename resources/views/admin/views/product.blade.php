@extends("admin.views.layouts.master")
@section("shop")
    <shop>سامانه مدیریت کاربر | ثمین تخفیف</shop>
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
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                             aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
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
                                                <button class="btn text-white btn-sm bg-gradient-success" data-toggle="modal" data-target="#save">ذخیره</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
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
    <script src="/admin/js/admin_jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection
