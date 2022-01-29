@extends("admin.views.layouts.master")
@section("title")
    <title>armanmask.ir | مدیریت سفارشات</title>
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
                        <div class="card-body">
                            <table id="user_table" class="table table-responsive-xl table-responsive-sm text-center border-bottom-primary bg-gradient-info text-white table-sm table-borderless table-striped" width="100%" style="direction:rtl!important;">
                                <thead class="bg-gradient-primary text-white shadow">
                                <tr>
                                    <th scope="col">شناسه دیتا</th>
                                    <th scope="col">نام و نام خانوادگی</th>
                                    <th scope="col">شماره سفارش</th>
                                    <th scope="col">شماره تماس</th>
                                    <th scope="col">محصولات</th>
                                    <th scope="col">مبلغ کل</th>
                                    <th scope="col">تاریخ ثبت</th>
                                    <th scope="col">مشاهده کالا</th>
                                    <th scope="col">عملیات</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Bootstrap Modal Order Products info-->
                <div class="modal fade" id="order_details" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-gradient-light">
                            <div class="modal-header bg-gradient-info border-bottom-info">
                                <h5 class="text-white" style="font-size: 15px">مشاهده کالاهای سفارش</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div id="result_container" class="modal-body text-center">

                                <div class="admin-rtl my-1 text-white font-weight-bolder">
                                    <p id="error_box" class="myfont text-danger" style="font-size: 14px;"></p>
                                    <p id="res_msg" class="myfont text-success" style="font-size: 14px;"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bootstrap Modal Order Products info-->

            </div>
        </div>
    </div>
{{--    --}}{{--DELETE MODAL--}}
{{--    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="del"--}}
{{--         aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="text-danger modal-title myfont" id="del">افزایش اعتبار</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body text-right">--}}
{{--                    آیا از انجام این عملیات اطمینان دارید؟--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>--}}
{{--                    <button type="button" data-id="' + row.id + '" id="sum" class="btn btn-success delete"--}}
{{--                            data-dismiss="modal">--}}
{{--                        Approve--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    --}}{{--DELETE MODAL--}}

{{--    --}}{{--SMS MODAL--}}
{{--    <div class="modal fade" id="sms" tabindex="-1" role="dialog" aria-labelledby="sms-area"--}}
{{--         aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header bg-gradient-info">--}}
{{--                    <p class="text-white modal-title myfont" id="sms-area">SEND SMS TO USERS</p>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body text-right">--}}
{{--                    <form>--}}
{{--                        <p>همکار گرامی، پیام ارسالی شما در پنل مدیریت نمایش داده میشود</p>--}}
{{--                        <div class="form-group text-right">--}}
{{--                            <input id="sms-mobile" name="sms_mobile" type="hidden">--}}
{{--                            <label class="" for="myTextarea" id="counter"></label>--}}
{{--                            <i class="fas fa-pencil-alt prefix"></i>--}}
{{--                            <textarea id="sms_content" name="sms_content" class="text-right form-control" rows="3"--}}
{{--                                      placeholder="...SMS"></textarea>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                <!--Textarea Counter-->--}}
{{--                <script type="text/javascript">--}}
{{--                    $('#sms_content').keyup(function () {--}}
{{--                        var left = 41 - $(this).val().length;--}}
{{--                        if (left < 0) {--}}
{{--                            left = "صفحه دوم";--}}
{{--                        }--}}
{{--                        $('#counter').text('حروف باقیمانده: ' + left);--}}
{{--                    });--}}
{{--                </script>--}}
{{--                <!--Textarea Counter-->--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>--}}
{{--                    <button type="button" id="send-sms" class="btn btn-success"--}}
{{--                            data-dismiss="modal">--}}
{{--                        ارسال--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    --}}{{--SMS MODAL--}}


{{--    --}}{{--EMAIL MODAL--}}
{{--    <div class="modal fade" id="send-email" tabindex="-1" role="dialog" aria-labelledby="email-area"--}}
{{--         aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header bg-gradient-info">--}}
{{--                    <p class="text-white modal-title myfont" id="email-area">SEND Email TO USERS</p>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body text-right">--}}
{{--                    <form>--}}
{{--                        <p>همکار گرامی، پیام ارسالی شما در پنل مدیریت نمایش داده میشود</p>--}}
{{--                        <div class="form-group text-right">--}}
{{--                            <input id="send_mail" name="send_mail" type="hidden">--}}
{{--                            <i class="fas fa-pencil-alt prefix"></i>--}}
{{--                            <textarea id="email_content" name="email_content" class="text-right form-control" rows="3"--}}
{{--                                      placeholder="...Email"></textarea>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>--}}
{{--                    <button type="button" id="send-email-btn" class="btn btn-success"--}}
{{--                            data-dismiss="modal">--}}
{{--                        ارسال--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    --}}{{--EMAIL MODAL--}}


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

    <script src="/admin/js/moment.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
//Delete User
{{--            $("body").on("click", ".delete", function () {--}}
{{--                id = $(this).attr("data-id");--}}
{{--                $.ajax({--}}
{{--                    type: 'post',--}}
{{--                    url: "{{ route("delete_user_action") }}",--}}
{{--                    data: {"id": id},--}}
{{--                    success: function (result) {--}}
{{--                        if (result == "DONE") {--}}
{{--                            alert('حذف کاربر با موفقیت انجام شد');--}}
{{--                        } else {--}}
{{--                            alert('متاسفانه مشکلی پیش آمده، با واحد آی تی تماس بگیرید');--}}
{{--                        }--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
//Delete User

//Edit User
            $("body").on("click", ".order_details", function (e) {
                e.preventDefault();
                let id = $(this).attr("data-id");
                $.ajax({
                    type: 'post',
                    url: '{{ route("show_order_details") }}',
                    data: {"id": id},
                    success: function (response) {
                        $('#result_container').html(response);
                    }
                });
            });
//Edit User

{{--//SMS TO User--}}
{{--            $("body").on("click", ".sms", function () {--}}
{{--                let mobile = $(this).attr("data-id");--}}
{{--                $('#sms-mobile').val(mobile);--}}
{{--            });--}}
{{--            $('#send-sms').click(function (e) {0--}}
{{--                $.ajax({--}}
{{--                    type: "post",--}}
{{--                    url: "{{route('Sms_User')}}",--}}
{{--                    data: {'mobile': $('#sms-mobile').val(), 'sms_content': $('#sms_content').val()},--}}
{{--                    success: function (response) {--}}
{{--                        console.log(response);--}}
{{--                    }--}}
{{--                });--}}
{{--                e.preventDefault(e);--}}
{{--            });--}}
{{--//SMS TO User--}}

{{--//Email TO User--}}
{{--            $("body").on("click", ".email", function () {--}}
{{--                let email = $(this).attr("data-id");--}}
{{--                if (email == '') {--}}
{{--                    alert('برای این کاربر ایمیل ثبت نشده است');--}}
{{--                } else {--}}
{{--                    $('#send_mail').val(email);--}}
{{--                }--}}
{{--            });--}}
{{--            $('#send-email-btn').click(function (e) {--}}
{{--                $.ajax({--}}
{{--                    type: "post",--}}
{{--                    url: "{{route('Email_User')}}",--}}
{{--                    data: {'id': $('#send_mail').val(), 'email_content': $('#email_content').val()},--}}
{{--                    success: function (response) {--}}
{{--                        console.log(response);--}}
{{--                    }--}}
{{--                });--}}
{{--                e.preventDefault(e);--}}
{{--            });--}}
{{--//Email TO User--}}

{{--//Save User Data)--}}
{{--            $("#save-user-data").click(function (e) {--}}
{{--                $.ajax({--}}
{{--                    type: "POST",--}}
{{--                    url: '{{route('save_user')}}',--}}
{{--                    data: $("#save-user-form").serialize(),--}}
{{--                    success: function (res) {--}}
{{--                        if (res.status == 1) {--}}
{{--                            $("#error_box").fadeOut();--}}
{{--                            $("#res_msg").html(res.desc).fadeIn();--}}
{{--                        } else {--}}
{{--                            $.each(res.errors, function (i, item) {--}}
{{--                                $("#res_msg").fadeOut();--}}
{{--                                $("#error_box").html('<p class="text-danger">' + res.errors[i] + '</p>').fadeIn();--}}
{{--                            });--}}
{{--                        }--}}
{{--                    }--}}
{{--                });--}}
{{--                e.preventDefault(e);--}}
{{--            });--}}
{{--//Save User Data)--}}


            $('#user_table').DataTable({
                processing: true,
                serverSide: true,
                dom: 'Bfrtip',
                // pagingType: "numbers",
                bLengthChange: false,
                "ordering": false,
                pageLength: 10,
                language: {
                    "url": "/admin/js/persian.json"
                },
                // "pagingType":       "full_numbers",
                // "lengthMenu":   [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "searching": true,
                // "scrollY": 400,
                "scrollCollapse": true,
                // "jQueryUI":         true,
                ajax: {
                    dataType: 'json',
                    type: 'GET',
                    url: '/armanmask/orders/datatable-get-orders',
                },
                buttons: [
                    // 'copy', 'csv', 'excel', 'pdf', 'print'
                    //     {extend: 'create', editor: myEditor},
                    //     {extend: 'edit', editor: myEditor},
                    //     {extend: 'remove', editor: myEditor}
                ],
                columns: [
                    {data: 'id', name: 'id'},
                    {
                        data: 'id',
                        render: function ( data, type, row ) {
                            return row.name + ' ' + row.family;
                        }
                    },
                    {data: 'order_number', name: 'order_number'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'product_count', name: '$product_count'},
                    {
                        data: 'last_price',name:'last_price', render: function (data, type, row) {
                            return '<span class="price">' + row.last_price + '</span>';
                        },
                    },
                    {
                        data: 'created_at',name:'created_at', render: function (data, type, row) {
                            return moment(row.created_at).locale('fa').format('YYYY/M/D ساعت H:m');
                        },
                    },
                    {
                        className: "ltr text-center", data: "id", render: function (data, type, row) {
                            return '<div class="btn-group-vertical btn-group-sm"><button type="button" data-id="' + row.id + '" class="btn btn-sm text-white bg-gradient-danger" disabled data-toggle="modal" data-target="#delete">Delete</button><button type="button" data-id="' + row.id + '"  class="btn btn-sm text-white bg-gradient-success order_details" data-toggle="modal" data-target="#order_details">Order</button></div></div>';
                        }
                    },
                    {
                        className: "ltr text-center", data: "id", render: function (data, type, row) {
                            if(row.email == ""){
                                return '<div class="btn-group-vertical btn-group-sm"><button type="button" data-id="' + row.mobile + '" class="btn btn-sm text-white bg-gradient-info sms" disabled data-toggle="modal" data-target="#sms">SMS</button><button type="button" data-id="' + row.id + '"  disabled class="btn btn-sm text-white bg-gradient-primary disabled email">Email</button></div></div>';
                            }else{
                                return '<div class="btn-group-vertical btn-group-sm"><button type="button" data-id="' + row.mobile + '" class="btn btn-sm text-white bg-gradient-info sms" disabled data-toggle="modal" data-target="#sms">SMS</button><button type="button" data-id="' + row.id + '"  disabled class="btn btn-sm text-white bg-gradient-primary email" data-toggle="modal" data-target="#send-email" >Email</button></div></div>';
                            }
                        }
                    },
                ]
            });
        });
    </script>
@endsection
