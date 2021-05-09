@extends("admin.views.layouts.master")
@section("title")
    <title>سامانه مدیریت کاربر | فروشگاه سیوسه</title>
@endsection
@section("extra_css")
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
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

                </div>
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 myfont font-weight-bold text-primary">
                                پاسخ به پیام کاربران
                            </h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="{{route('home')}}" role="button" id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                     aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="{{route('home')}}">Action</a>
                                    <a class="dropdown-item" href="{{route('home')}}">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('home')}}">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <table id="user_table"
                                   class="table table-responsive-xl table-responsive-sm text-center border-bottom-primary bg-gradient-info text-white table-sm table-borderless table-striped"
                                   width="100%">
                                <thead class="bg-gradient-primary text-white shadow">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">User_Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Created_at</th>
                                    <th scope="col">Answer_at</th>
                                    <th scope="col">Message</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Bootstrap Modal User Info-->
                <div class="modal fade" id="edit" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-gradient-light">
                            <div class="modal-header bg-gradient-info border-bottom-info">
                                <h5 class="text-white" style="font-size: 15px">www.CioCe.ir</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <form id="save-user-form" class="modal-body text-center">
                                <div class="admin-rtl my-1 text-white font-weight-bolder">
                                    <p id="error_box" class="myfont text-danger" style="font-size: 14px;"></p>
                                    <p id="res_msg" class="myfont text-success" style="font-size: 14px;"></p>
                                </div>
                                {{--<//Mobile\\>--}}
                                <div class="col-12">
                                    <div class="input-group my-2">
                                        <input id="res-mobile" name="res_mobile" type="number"
                                               class="form-control bg-muted" readonly required autofocus>
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
                                        <select id="res-role" name="res_role"
                                                class="input-group-text form-control font-12" required autofocus>
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                            <option value="supplier">Supplier</option>
                                        </select>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">Role</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group my-2">
                                        <select id="res-verified" name="res_verified"
                                                class="input-group-text form-control font-12" required autofocus>
                                            <option value="0">Not Approved</option>
                                            <option value="1">Accepted</option>
                                        </select>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">Verified</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group my-2">
                                        <select id="res-user_mode" name="res_user_mode"
                                                class="input-group-text form-control font-12" required autofocus>
                                            <option value="normal">Normal</option>
                                            <option value="golden">Golden</option>
                                        </select>
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
                                        <input id="res-credit" name="res_credit" type="text"
                                               class="form-control bg-muted" readonly autofocus>
                                        <div class="input-group-prepend">
                                            <a href="{{route('credit')}}" id="credit-btn" type="button"
                                               class="input-group-text text-white bg-gradient-success font-12">Credit</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group my-2">
                                        <input id="res-password" name="res_password" type="text"
                                               class="form-control bg-muted" autofocus>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-white bg-gradient-danger font-12">Password</span>
                                        </div>
                                    </div>
                                </div>
                                {{--                                <//Mobile\\>--}}
                                <button type="button"
                                        class="btn font-weight-bolder text-white myfont bg-gradient-info my-2"
                                        id="save-user-data">
                                    ذخیره اطلاعات
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Bootstrap Modal User Info-->

            </div>
        </div>
    </div>
    {{--DELETE MODAL--}}
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="del"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-danger modal-title myfont" id="del">افزایش اعتبار</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-right">
                    آیا از انجام این عملیات اطمینان دارید؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" data-id="' + row.id + '" id="sum" class="btn btn-success delete"
                            data-dismiss="modal">
                        Approve
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--DELETE MODAL--}}

    {{--SMS MODAL--}}
    <div class="modal fade" id="sms" tabindex="-1" role="dialog" aria-labelledby="sms-area"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-info">
                    <p class="text-white modal-title myfont" id="sms-area">SEND SMS TO USERS</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-right">
                    <form>
                        <p>همکار گرامی، پیام ارسالی شما در پنل مدیریت نمایش داده میشود</p>
                        <div class="form-group text-right">
                            <input id="sms-mobile" name="sms_mobile" type="hidden">
                            <label class="" for="myTextarea" id="counter"></label>
                            <i class="fas fa-pencil-alt prefix"></i>
                            <textarea id="sms_content" name="sms_content" class="text-right form-control" rows="3"
                                      placeholder="...SMS"></textarea>
                        </div>
                    </form>
                </div>
                <!--Textarea Counter-->
                <script type="text/javascript">
                    $('#sms_content').keyup(function () {
                        var left = 41 - $(this).val().length;
                        if (left < 0) {
                            left = "صفحه دوم";
                        }
                        $('#counter').text('حروف باقیمانده: ' + left);
                    });
                </script>
                <!--Textarea Counter-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
                    <button type="button" id="send-sms" class="btn btn-success"
                            data-dismiss="modal">
                        ارسال
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--SMS MODAL--}}


    {{--EMAIL MODAL--}}
    <div class="modal fade" id="reply-email" tabindex="-1" role="dialog" aria-labelledby="email-area"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-info">
                    <p class="text-white modal-title myfont" id="email-area">SEND Email TO USERS</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-right">
                    <form>
                        <p>همکار گرامی، پیام ارسالی شما در پنل مدیریت نمایش داده میشود</p>
                        <div class="form-group text-right">
                            <input id="send_id" name="send_id" type="hidden">
                            <input id="send_mail" name="send_mail" type="hidden">
                            <i class="fas fa-pencil-alt prefix"></i>
                            <textarea id="email_content" name="email_content" class="text-right form-control" rows="3"
                                      placeholder="...Email"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
                    <button type="button" id="reply-email-btn" class="btn btn-success"
                            data-dismiss="modal">
                        ارسال
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--EMAIL MODAL--}}




@endsection
@section("extra_js")
    {{--    <script src="/admin/js/dataTables.buttons.min.js"></script>--}}
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    {{--    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>--}}
    {{--    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>--}}
    {{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>--}}
    {{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>--}}
    {{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>--}}
    {{--    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>--}}
    {{--    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>--}}

    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        //SMS TO User
        $("body").on("click", ".sms", function () {
            let id = $(this).attr("data-id");
            $('#sms-mobile').val(id);
        });
        $('#send-sms').click(function (e) {
            $.ajax({
                type: "post",
                url: "{{route('Contact_Us_Sms_User')}}",
                data: {'id': $('#sms-mobile').val(), 'sms_content': $('#sms_content').val()},
                success: function (response) {
                    console.log(response);
                }
            });
            e.preventDefault(e);
        });
        //SMS TO User

        //Email TO User
        $("body").on("click", ".reply", function () {
            let id = $(this).attr("data-id");
            let mobile = $(this).attr("data-mobile");
            $('#send_id').val(id);
            $('#send_mail').val(mobile);
        });
        $('#reply-email-btn').click(function (e) {
            $.ajax({
                type: "post",
                url: "{{route('Contact_Us_Email_User')}}",
                data: {
                    'id': $('#send_id').val(),
                    'mobile': $('#send_mail').val(),
                    'email_content': $('#email_content').val()
                },
                success: function (response) {
                    alert(response['status']);
                }
            });
            e.preventDefault(e);
        });
        //Email TO User

        //DataTable
        $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            dom: 'Bfrtip',
            bLengthChange: false,
            pageLength: 5,
            "searching": true,
            "scrollCollapse": true,
            ajax: {
                dataType: 'json',
                type: 'GET',
                url: '/cioce/contact-us/get-user',
            },
            buttons: [
                // 'copy', 'csv', 'excel', 'pdf', 'print'
                //     {extend: 'create', editor: myEditor},
                //     {extend: 'edit', editor: myEditor},
                //     {extend: 'remove', editor: myEditor}
            ],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'user_id', name: 'user_id'},
                {data: 'name', name: 'name'},
                {data: 'mobile', name: 'mobile'},
                {data: 'body', name: 'body'},
                {data: 'created_at', name: 'created_at'},
                {data: 'answer_at', name: 'answer_at'},
                {
                    className: "ltr text-center", data: "id", render: function (data, type, row) {
                        return '<div class="btn-group-vertical btn-group-sm"><button type="button" data-id="' + row.id + '" class="btn btn-sm text-white bg-gradient-info sms" data-toggle="modal" data-target="#sms">SMS</button><button type="button" data-id="' + row.id + '"  data-mobile="' + row.mobile + '"  class="btn btn-sm text-white bg-gradient-primary reply" data-toggle="modal" data-target="#reply-email" >Reply</button></div></div>';
                    },
                },
            ]
        });
    </script>
@endsection
