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
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
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
                                <div class="card-body">
                                    <!-- Card Body -->
                                    <form id="product-search-form" method="" action="">
                                        <div class="col-4">
                                            <select name="product_id" id="product_id"
                                                    class="product_id text-right form-control bg-muted"></select>
                                        </div>
                                    </form>

                                    <table id="product_table"
                                           class="table mt-4 table-responsive-xl table-responsive-sm text-center  text-black table-sm table-striped"
                                           width="100%">
                                        <thead class="text-black shadow">
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">product_name</th>
                                            {{--                                            <th scope="col">User_Id</th>--}}
                                            {{--                                            <th scope="col">category_id</th>--}}
                                            {{--                                            <th scope="col">product_desc</th>--}}
                                            <th scope="col">price</th>
                                            <th scope="col">discount</th>
                                            <th scope="col">stock</th>
                                            <th scope="col">status</th>
                                            <th scope="col">quantity</th>
                                            <th scope="col">city</th>
                                            <th scope="col">mobile</th>
                                            <th scope="col">view</th>
                                            <th scope="col">created_at</th>
                                            <th scope="col">updated_at</th>
                                            {{--                                            <th scope="col">Edit</th>--}}
                                            {{--                                            <th scope="col">Message</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="text-center">
                                            <td id="data-id" scope="row"></td>
                                            <td id="data-image" style="max-width: 200px;max-height: 200px;"></td>
                                            <td><input id="data-product_name" name="product_name"></td>
                                            {{--                                            <td id="data-User_Id"></td>--}}
                                            {{--                                            <td id="data-category_id"></td>--}}
                                            {{--                                            <td id="data-product_desc"></td>--}}
                                            <td><input style="width: 100px" id="data-price" name="price"></td>
                                            <td><input style="width: 50px" id="data-discount" name="discount"></td>
                                            <td>
                                                <select style="width: 50px" id="data-stock" name="stock">
                                                    <option value="1">نو</option>
                                                    <option value="0">کارکرده</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select style="width: 50px" id="data-status" name="status">
                                                    <option value="1">فعال</option>
                                                    <option value="0">غیر فعال</option>
                                                </select>
                                            </td>
                                            <td><input class="border-none" style="width: 50px" id="data-quantity"
                                                       name="quantity"></td>
                                            <td><input class="border-none" style="width: 100px" id="data-city"
                                                       name="city"></td>
                                            <td><input class="border-none" style="width: 100px" id="data-mobile"
                                                       name="mobile"></td>
                                            <td><input class="border-none" style="width: 50px" id="data-view"
                                                       name="view"></td>
                                            <td><input class="border-none" style="width: 100px" id="data-created_at"
                                                       name="created_at"></td>
                                            <td><input class="border-none" style="width: 100px" id="data-updated_at"
                                                       name="updated_at"></td>
                                            {{--                                            <td id="data-Edit"></td>--}}
                                            {{--                                            <td id="data-Message"></td>--}}
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


@endsection
@section("extra_js")
    <script src="/admin/js/admin_jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection
