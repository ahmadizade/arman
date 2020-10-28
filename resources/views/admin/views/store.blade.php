@extends("admin.views.layouts.master")
@section("shop")
    <shop>سامانه مدیریت کاربر | ثمین تخفیف</shop>
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
                                سامانه مدیریت فروشگاه
                            </h6>
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
                            <table id="user_table"
                                   class="table table-responsive-xl table-responsive-sm text-center border-bottom-primary bg-gradient-info text-white table-sm table-borderless table-striped"
                                   width="100%">
                                <thead class="bg-gradient-primary text-white shadow">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">User_Id</th>
                                    <th scope="col">shop</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Melli_Code</th>
                                    <th scope="col">Category</th>
                                    {{--                                    <th scope="col">Description</th>--}}
                                    <th scope="col">Shenase_Melli</th>
                                    <th scope="col">Nature</th>
                                    <th scope="col">branch</th>
                                    <th scope="col">date</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">verify</th>
                                    <th scope="col">shop_slug</th>
                                    <th scope="col">branch_slug</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Message</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 myfont font-weight-bold text-primary">
                                مشاهده گزارشات تخلف فروشگاه
                            </h6>
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
                            <table id="report_table"
                                   class="table table-responsive-xl table-responsive-sm text-center border-bottom-primary bg-gradient-info text-white table-sm table-borderless table-striped"
                                   width="100%">
                                <thead class="bg-gradient-primary text-white shadow">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">User_Id</th>
                                    <th scope="col">Store_Id</th>
                                    <th scope="col">Report_Id</th>
                                    <th scope="col">Created_at</th>
                                    <th scope="col">Answer</th>
                                    <th scope="col">Answer_at</th>
                                    <th scope="col">EDIT</th>
                                    <th scope="col">MESSAGE</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--DELETE MODAL--}}
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="del"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-danger modal-shop myfont" id="del">افزایش اعتبار</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-right">
                    آیا از انجام این عملیات اطمینان دارید؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" id="del_store" name="del_store" class="btn btn-success delete"
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
                    <p class="text-white modal-shop myfont" id="sms-area">SEND SMS TO USERS</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-right">
                    <form>
                        <p>همکار گرامی، پیام ارسالی شما در پنل مدیریت نمایش داده میشود</p>
                        <div class="form-group text-right">
                            <input id="sms-mobile" name="sms_mobile" type="hidden">
                            <input id="sms-user_id" name="sms_user_id" type="hidden">
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

    <!-- Bootstrap Modal User Info-->
    <div class="modal fade" id="view" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-gradient-light">
                <div class="modal-header bg-gradient-info border-bottom-info">
                    <h5 class="text-white" style="font-size: 15px">REPORT VIEW</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <form id="save-store-form" class="modal-body text-center">
                    <div class="admin-rtl my-1 text-white font-weight-bolder">
                        <p id="error_box" class="myfont text-danger" style="font-size: 14px;"></p>
                        <p id="res_msg" class="myfont text-success" style="font-size: 14px;"></p>
                    </div>
                    {{--<//Mobile\\>--}}
                    <input id="res-id" name="res_id" type="hidden">
                    <div class="col-12">
                        <div class="input-group my-2">
                            <input id="res-shop" name="res_shop" type="text"
                                   class="form-control bg-muted" required autofocus>
                            <div class="input-group-prepend">
                                <span class="input-group-text font-12">عنوان</span>
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
                            <input id="res-melli_code" name="res_melli_code" type="text"
                                   class="form-control bg-muted" required autofocus>
                            <div class="input-group-prepend">
                                <span class="input-group-text font-12">کد ملی</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group my-2">
                            <select name="res_category" id="res-category" class="form-control">
                                <option value="0" selected disabled>انتخاب دسته بندی</option>
                                @foreach($category as $item)
                                    <option @if(old("category") == $item['id']) selected
                                            @endif value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-prepend">
                                <span class="input-group-text font-12">دسته بندی</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group my-2">
                            <input id="res-desc" name="res_desc" type="text"
                                   class="form-control bg-muted"
                                   required autofocus>
                            <div class="input-group-prepend">
                                <span class="input-group-text font-12">توضیحات</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group my-2">
                            <input id="res-shenase_melli" name="res_shenase_melli" type="text"
                                   class="form-control bg-muted"
                                   required autofocus>
                            <div class="input-group-prepend">
                                <span class="input-group-text font-12">شناسه ملی</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group my-2">
                            <select id="res-nature" name="res_nature"
                                    class="input-group-text form-control font-12" required autofocus>
                                <option value="0" selected disabled>انتخاب ماهیت</option>
                                <option @if(old("nature") == 1) selected @endif value="1">شخصی (حقیقی)</option>
                                <option @if(old("nature") == 2) selected @endif value="2">دولتی یا عمومی</option>
                                <option @if(old("nature") == 3) selected @endif value="3">خصوصی</option>
                                <option @if(old("nature") == 4) selected @endif value="4">تعاونی</option>
                            </select>

                            <div class="input-group-prepend">
                                <span class="input-group-text font-12">ماهیت</span>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="input-group my-2">
                            <input id="res-branch" name="res_branch" type="text"
                                   class="form-control bg-muted"
                                   required autofocus>
                            <div class="input-group-prepend">
                                <span class="input-group-text font-12">زیر شاخه</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group my-2">
                            <input id="res-date" name="res_date" type="text"
                                   class="form-control bg-muted"
                                   readonly required autofocus>
                            <div class="input-group-prepend">
                                <span class="input-group-text font-12">تاریخ ثبت</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group my-2">
                            <input id="res-address" name="res_address" type="text"
                                   class="form-control bg-muted"
                                   required autofocus>
                            <div class="input-group-prepend">
                                <span class="input-group-text font-12">آدرس</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group my-2">
                            <select id="res-status" name="res_status"
                                    class="input-group-text form-control font-12" required autofocus>
                                <option value="0">غیرفعال</option>
                                <option value="1">فعال</option>
                            </select>
                            <div class="input-group-prepend">
                                <span class="input-group-text font-12">وضعیت</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group my-2">
                            <select id="res-verify" name="res_verify"
                                    class="input-group-text form-control font-12" required autofocus>
                                <option value="0">عدم تایید</option>
                                <option value="1">تایید</option>
                            </select>
                            <div class="input-group-prepend">
                                <span class="input-group-text font-12">تاییدیه</span>
                            </div>
                        </div>
                    </div>

                    <button type="button"
                            class="btn font-weight-bolder text-white myfont bg-gradient-info my-2"
                            id="save-store-data">
                        ذخیره اطلاعات
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap Modal User Info-->

    {{--DELETE MODAL--}}
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="del"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-danger modal-shop myfont" id="del">افزایش اعتبار</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-right">
                    آیا از انجام این عملیات اطمینان دارید؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" id="del_store" name="del_store" class="btn btn-success" data-dismiss="modal">
                        Approve
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--DELETE MODAL--}}

    {{--EMAIL MODAL--}}
    <div class="modal fade" id="reply-email" tabindex="-1" role="dialog" aria-labelledby="email-area"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-info">
                    <p class="text-white modal-shop myfont" id="email-area">SEND Email TO USERS</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-right">
                    <form>
                        <p>همکار گرامی، پیام ارسالی شما در پنل مدیریت نمایش داده میشود</p>
                        <div class="form-group text-right">
                            <input id="send_id" name="send_id" type="hidden">
                            <input id="send_user_id" name="send_user_id" type="hidden">
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

    {{--    <--- Bootstrap Modal Report View -->--}}
    <div class="modal fade" id="view-report" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-gradient-light">
                <div class="modal-header bg-gradient-info border-bottom-info">
                    <h5 class="text-white" style="font-size: 15px">REPORT VIEW</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <form id="save-report-form" class="modal-body text-center">
                    <div class="admin-rtl my-1 text-white font-weight-bolder">
                        <p id="error_box" class="myfont text-danger" style="font-size: 14px;"></p>
                        <p id="res_msg" class="myfont text-success" style="font-size: 14px;"></p>
                    </div>
                    <div class="col-12">
                        <div class="input-group my-2">
                            <input id="res_report_id" name="res_report_id" type="text"
                                   class="form-control bg-muted" required autofocus>
                            <div class="input-group-prepend">
                                <span class="input-group-text font-12">ID</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group my-2">
                            <input id="res_user_id" name="res_user_id" type="text"
                                   class="form-control bg-muted" required autofocus>
                            <div class="input-group-prepend">
                                <span class="input-group-text font-12">کاربر</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group my-2">
                            <input id="res_store_id" name="res_store_id" type="text"
                                   class="form-control bg-muted" required autofocus>
                            <div class="input-group-prepend">
                                <span class="input-group-text font-12">فروشگاه</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group my-2">
                            <input id="res_created_at" name="res_created_at" type="text"
                                   class="form-control bg-muted"
                                   required autofocus>
                            <div class="input-group-prepend">
                                <span class="input-group-text font-12">زمان ثبت</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group my-2">
                            <input id="res_desc" name="res_desc" type="text"
                                   class="form-control bg-muted"
                                   required autofocus>
                            <div class="input-group-prepend">
                                <span class="input-group-text font-12">متن شکایت</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group my-2">
                            <input id="res_answer" name="res_answer" type="text"
                                   class="form-control bg-muted"
                                   required autofocus>
                            <div class="input-group-prepend">
                                <span class="input-group-text font-12">متن پاسخ</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group my-2">
                            <input id="res_answer_at" name="res_answer_at" type="text"
                                   class="form-control bg-muted"
                                   required autofocus>
                            <div class="input-group-prepend">
                                <span class="input-group-text font-12">زمان پاسخ</span>
                            </div>
                        </div>
                    </div>

                    <button type="button"
                            class="btn font-weight-bolder text-white myfont bg-gradient-info my-2"
                            id="save-report-data">
                        ذخیره اطلاعات
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap Modal User Info-->



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
        //Edit Store
        $("body").on("click", ".view", function (e) {
            let id = $(this).attr("data-id");
            $.ajax({
                type: 'post',
                url: '{{ route("Store_view_store") }}',
                data: {"id": id},
                success: function (response) {
                    {
                        $("#res-id").val(response.id);
                        $("#res-shop").val(response.shop);
                        $("#res-name").val(response.name);
                        $("#res-melli_code").val(response.melli_code);
                        $("#res-category").val(response.category);
                        $("#res-desc").val(response.desc);
                        $("#res-shenase_melli").val(response.shenase_melli);
                        $("#res-nature").val(response.nature);
                        $("#res-branch").val(response.branch);
                        $("#res-date").val(response.created_at);
                        $("#res-address").val(response.address);
                        $("#res-status").val(response.status);
                        $("#res-verify").val(response.verify);
                    }
                    e.preventDefault();
                }
            });
        });
        //Edit Store

        //Edit Store Save Data
        $("#save-store-data").click(function (e) {
            $.ajax({
                type: "POST",
                url: '{{route('Save_store_Data_Action')}}',
                data: $("#save-store-form").serialize(),
                success: function (res) {
                    if (res.status == 1) {
                        $("#error_box").fadeOut();
                        $("#res_msg").html(res.description).fadeIn();
                    } else {
                        $.each(res.errors, function (i, item) {
                            $("#res_msg").fadeOut();
                            $("#error_box").html('<p class="text-danger">' + res.errors[i] + '</p>').fadeIn();
                        });
                    }
                }
            });
            e.preventDefault(e);
        });
        //Edit Store Save Data

        //Delete Store
        $("body").on("click", ".delete", function () {
            let id = $(this).attr("data-id");
            $('#del_store').val(id);
        });
        $('#del_store').click(function (e) {
            $.ajax({
                type: 'post',
                url: "{{ route("delete_store_action") }}",
                data: {"id": $('#del_store').val()},
                success: function (result) {
                    if (result == "DONE") {
                        alert('حذف کاربر با موفقیت انجام شد');
                    } else {
                        alert('متاسفانه مشکلی پیش آمده، با واحد آی تی تماس بگیرید');
                    }
                }
            });
            e.preventDefault(e);
        });
        //Delete Store

        //SMS TO User
        $("body").on("click", ".sms", function () {
            let id = $(this).attr("data-id");
            let user_id = $(this).attr("data-user_id");
            $('#sms-mobile').val(id);
            $('#sms-user_id').val(user_id);
        });
        $('#send-sms').click(function (e) {
            $.ajax({
                type: "post",
                url: "{{route('Contact_Us_Sms_User')}}",
                data: {
                    'id': $('#sms-mobile').val(),
                    'user_id': $('#sms-user_id').val(),
                    'sms_content': $('#sms_content').val()
                },
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
            let user_id = $(this).attr("data-user_id");
            $('#send_id').val(id);
            $('#send_user_id').val(user_id);
        });
        $('#reply-email-btn').click(function (e) {
            $.ajax({
                type: "post",
                url: "{{route('Contact_Us_Email_User')}}",
                data: {
                    'id': $('#send_id').val(),
                    'user_id': $('#send_user_id').val(),
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
                url: '{{route('Store_GetUser')}}',
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
                {data: 'shop', name: 'shop'},
                {data: 'name', name: 'name'},
                {data: 'melli_code', name: 'melli_code'},
                {data: 'category', name: 'category'},
                {data: 'shenase_melli', name: 'shenase_melli'},
                {data: 'nature', name: 'nature'},
                {data: 'branch', name: 'branch'},
                {data: 'created_at', name: 'created_at'},
                {data: 'address', name: 'address'},
                {data: 'status', name: 'status'},
                {data: 'verify', name: 'verify'},
                {data: 'shop_slug', name: 'shop_slug'},
                {data: 'branch_slug', name: 'branch_slug'},
                {
                    className: "ltr text-center", data: "id", render: function (data, type, row) {
                        return '<div class="btn-group-vertical btn-group-sm"><button type="button" data-id="' + row.id + '" class="btn btn-sm text-white bg-gradient-danger delete" data-toggle="modal" data-target="#delete">Delete</button><button type="button" data-id="' + row.id + '"  class="btn btn-sm text-white bg-gradient-success view" data-toggle="modal" data-target="#view">VIEW</button></div></div>';
                    }
                },
                {
                    className: "ltr text-center", data: "id", render: function (data, type, row) {
                        return '<div class="btn-group-vertical btn-group-sm"><button type="button" data-id="' + row.id + '" data-user_id="' + row.user_id + '" class="btn btn-sm text-white bg-gradient-info sms" data-toggle="modal" data-target="#sms">SMS</button><button type="button" data-id="' + row.id + '" data-user_id="' + row.user_id + '" class="btn btn-sm text-white bg-gradient-primary reply" data-toggle="modal" data-target="#reply-email" >Email</button></div></div>';
                    },
                },
            ]
        });
        //DataTable

        //DataTable REPORT
        $('#report_table').DataTable({
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
                url: '{{route('Store_GetReport')}}',
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
                {data: 'store_id', name: 'store_id'},
                {data: 'report_id', name: 'report_id'},
                {data: 'created_at', name: 'created_at'},
                {data: 'answer', name: 'answer'},
                {data: 'answer_at', name: 'answer_at'},
                {
                    className: "ltr text-center", data: "id", render: function (data, type, row) {
                        return '<div class="btn-group-vertical btn-group-sm"><button type="button" data-id="' + row.id + '" class="btn btn-sm text-white bg-gradient-danger delete" data-toggle="modal" data-target="#delete">Delete</button><button type="button" data-id="' + row.id + '"  class="btn btn-sm text-white bg-gradient-success view-report" data-toggle="modal" data-target="#view-report">VIEW</button></div></div>';
                    }
                },
                {
                    className: "ltr text-center", data: "id", render: function (data, type, row) {
                        return '<div class="btn-group-vertical btn-group-sm"><button type="button" data-id="' + row.id + '" data-user_id="' + row.user_id + '" class="btn btn-sm text-white bg-gradient-info sms" data-toggle="modal" data-target="#sms">SMS</button><button type="button" data-id="' + row.id + '" data-user_id="' + row.user_id + '" class="btn btn-sm text-white bg-gradient-primary reply" data-toggle="modal" data-target="#reply-email" >Email</button></div></div>';
                    },
                },
            ]
        });
        //DataTable REPORT

        //Edit Report View
        $("body").on("click", ".view-report", function (e) {
            let id = $(this).attr("data-id");
            $.ajax({
                type: 'post',
                url: '{{ route("Store_view_report") }}',
                data: {"id": id},
                success: function (response) {
                    {
                        $("#res_report_id").val(response.id);
                        $("#res_user_id").val(response.user_id);
                        $("#res_store_id").val(response.store_id);
                        $("#res_report_id").val(response.report_id);
                        $("#res_desc").val(response.desc);
                        $("#res_created_at").val(response.created_at);
                        $("#res_answer").val(response.answer);
                        $("#res_answer_at").val(response.answer_at);
                    }
                    e.preventDefault();
                }
            });
        });
        //Edit Report View

        //Edit Report Save Data
        $("#save-report-data").click(function (e) {
            $.ajax({
                type: "POST",
                url: '{{route('Save_report_Data_Action')}}',
                data: $("#save-store-form").serialize(),
                success: function (res) {
                    if (res.status == 1) {
                        $("#error_box").fadeOut();
                        $("#res_msg").html(res.description).fadeIn();
                    } else {
                        $.each(res.errors, function (i, item) {
                            $("#res_msg").fadeOut();
                            $("#error_box").html('<p class="text-danger">' + res.errors[i] + '</p>').fadeIn();
                        });
                    }
                }
            });
            e.preventDefault(e);
        });
        //Edit Report Save Data


    </script>
@endsection
