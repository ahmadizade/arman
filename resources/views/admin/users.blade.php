@extends("admin.layouts.master")
@section("title")
    <title>بازار تهاتر ایرانیان | ثمین تخفیف</title>
@endsection
@section("extra_css")
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    {{--    <link rel="stylesheet" type="text/css" href="/admin/css/buttons.dataTables.min.css">--}}
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

    </style>
@endsection

@section("content")
    <!-- Page Wrapper -->
    <div id="wrapper">
    @include("admin.partials.sidebar")

    <!-- Content Wrapper -->


        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">

                </div>


                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 myfont font-weight-bold text-primary">نمودار عضویت کاربران در وب سایت به تفکیک
                                ماههای سال</h6>
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
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <table id="user_table" class="table table-sm table-hover table-borderless table-striped"
                                   width="100%">
                                <thead class="bg-primary text-white shadow">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">role</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Usre_Mode</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">created_at</th>
                                    <th scope="col">EDIT</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Bootstrap Modal User Info-->
                <div class="modal fade" id="login-register" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-info">
                                <h5 class="text-success" style="font-size: 15px">Www.Bazarti.com</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <form id="save-user-form" class="modal-body myfont text-center">
                                <div id="error_box" class="my-1"></div>
                                <p id="res_msg" class="mb-1" style="font-size: 15px;"></p>
                                {{--                                <//Mobile\\>--}}
                                <div class="col-12">
                                    <div class="input-group my-2">
                                        <input id="res-mobile" name="res_mobile" type="number"
                                               class="form-control bg-muted" required autofocus>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">شماره تماس</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group my-2">
                                        <input id="res-name" name="res_name" type="text"
                                               class="form-control bg-muted" required autofocus>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">نام</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group my-2">
                                        <input id="res-role" name="res_role" type="text"
                                               class="form-control bg-muted" required autofocus>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">Role</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group my-2">
                                        <input id="res-verified" name="res_verified" type="text"
                                               class="form-control bg-muted" required autofocus>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">Verified</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group my-2">
                                        <input id="res-user_mode" name="res_user_mode" type="text"
                                               class="form-control bg-muted" required autofocus>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">User Mode</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group my-2">
                                        <input id="res-email" name="res_email" type="text"
                                               class="form-control bg-muted"
                                               required autofocus>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">Email</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group my-2">
                                        <input id="res-credit" name="res_credit" type="text" disabled
                                               class="form-control bg-muted" required autofocus>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">اعتبار</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group my-2">
                                        <input id="res-created_at" name="res_created_at" type="text" disabled
                                               class="form-control bg-muted" required autofocus>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">تاریخ ساخت</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group my-2">
                                        <input id="res-updated_at" name="res_updated_at" type="text" disabled
                                               class="form-control  bg-muted" required autofocus>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">آخرین تغییرات</span>
                                        </div>
                                    </div>
                                </div>
                                {{--                                <//Mobile\\>--}}
                                <button type="button" class="btn btn-success my-2" id="save-user-data">
                                    ذخیره
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Bootstrap Modal User Info-->

            </div>
        </div>
    </div>

@endsection
@section("extra_js")
    {{--    <script src="/admin/js/dataTables.buttons.min.js"></script>--}}
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
//Delete User
            $("body").on("click", ".delete", function () {
                alert('آیا از حذف این کاربر اطمینان دارید؟')
                id = $(this).attr("data-id");
                $.ajax({
                    type: 'post',
                    url: "{{ route("delete_user_action") }}",
                    data: {"id": id},
                    success: function (result) {
                        if (result == "DONE") {
                            alert('حذف با موفقیت انجام شد');
                        } else {
                            alert('حذف کاربر انجام نشد');
                        }
                    }
                });
            });
//Delete User

//Edit User
            $("body").on("click", ".edit", function (e) {
                mobile = $(this).attr("data-id");
                // $('#login-register').show();
                $.ajax({
                    type: 'post',
                    {{--url: "{{ route("edit_user_action") }}",--}}
                    url: '{{ route("search_user") }}',
                    data: {"mobile": mobile},
                    success: function (response) {
                        if (response.status == 0) {
                            $("#res_msg").html(response.desc);
                            $("#res_msg").css("color", "red");
                        } else {
                            // $("#res_msg").html("فرم تغییر اطلاعات کاربر");
                            // $("#res_msg").css("color", "gray");
                            $("#res-mobile").val(response.mobile);
                            $("#res-name").val(response.name);
                            $("#res-role").val(response.role);
                            $("#res-verified").val(response.verified);
                            $("#res-user_mode").val(response.user_mode);
                            $("#res-email").val(response.email);
                            $("#res-credit").val(response.credit);
                            $("#res-created_at").val(response.created_at);
                            $("#res-updated_at").val(response.updated_at);
                        }
                        e.preventDefault();
                    }
                });
            });
//Edit User

//Save User Data)
            $("#save-user-data").click(function (e) {
                $.ajax({
                    type: "POST",
                    url: '{{route('save_user')}}',
                    data: $("#save-user-form").serialize(),
                    success: function (res) {
                        if (res.status == 1) {
                            $("#res_msg").html(res.desc);
                            $("#res_msg").css("background-color", "green");
                            $("#res_msg").css("color", "white");
                        } else {
                            $.each(res.errors, function (i, item) {
                                $("#error_box").append('<p class="text-danger">' + res.errors[i] + '</p>');
                            });
                        }
                    }
                });
                e.preventDefault();
            });
//Save User Data)
            $('#user_table').DataTable({
                processing: true,
                serverSide: true,
                // pagingType: "numbers",
                bLengthChange: false,
                pageLength: 5,
                // "pagingType":       "full_numbers",
                // "lengthMenu":       [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "searching": true,
                "scrollY": 400,
                "scrollCollapse": true,
                // "jQueryUI":         true,
                ajax: {
                    // dataSrc: 'data'
                    // dataSrc: 'staff'
                    dataType: 'json',
                    type: 'GET',
                    url: '/tahator/admin-users/get-user',
                },
                // buttons: [
                //     {extend: 'create', editor: myEditor},
                //     {extend: 'edit', editor: myEditor},
                //     {extend: 'remove', editor: myEditor}
                // ],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'role', name: 'role'},
                    {data: 'email', name: 'email'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'user_mode', name: 'user_mode'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                        {{--{--}}
                        {{--    data: null,--}}
                        {{--    render: function (data, type, row) {--}}
                        {{--        return '<div class="btn-group-vertical btn-group-sm"><button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</button><button type="button" class="btn btn-sm btn-success">EDIT</button></div><!-- Modal --><div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="test2">' + "سامانه کنترل کاربر" + '</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">شما را حال پاک کردن کاربر ... هستید! آیا اطمینان دارید؟</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button><a href="{{route('delete_user_action')}}" type="button" data-id="' + row.id + '" class="btn  btn-danger delete">DELETE</a></div></div></div></div>';--}}
                        {{--    }--}}
                        {{--},--}}
                    {
                        className: "ltr text-center", data: "id", render: function (data, type, row) {
                            return '<div class="btn-group-vertical btn-group-sm"><button type="button" data-id="' + row.id + '" class="btn btn-sm btn-danger delete">Delete</button><button type="button" data-id="' + row.mobile + '"  class="btn btn-sm btn-success edit" data-toggle="modal" data-target="#login-register" >EDIT</button></div></div>';
                        }
                    },
                ]
            });
        });
    </script>
@endsection
