@extends("admin.layouts.master")
@section("title")
    <title>بازار تهاتر ایرانیان | ثمین تخفیف</title>
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
    @include("admin.partials.sidebar")

    <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    {{--                    <div class="d-sm-flex align-items-center myfont justify-content-between mb-4">--}}
                    {{--                        <p class="mb-0 mt-2 font-weight-bold text-success">سامانه مدیریت سایت ثمین</p>--}}
                    {{--                                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
                    {{--                                                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
                    {{--                    </div>--}}
                    <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4">
                        <a href="bazarti.com" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-arrow-right fa-sm text-white-50"></i> Www.bazarti.com</a>

                        <a href="samintakhfif.com" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Www.samintakhfif.com</a>

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Daily) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold myfont text-info text-uppercase mb-1">
                                                تعداد کاربرانی که امروز ثبت نام کرده اند
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$today}}
                                                        %
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                             style="width: {{$today}}%"
                                                             aria-valuenow="{{$today}}" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Weekly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold myfont text-info text-uppercase mb-1">
                                                تعداد کاربرانی که در یک هفته گذشته ثبت نام کرده اند
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div
                                                        class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$lastweek}}
                                                        %
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                             style="width: {{$lastweek}}%"
                                                             aria-valuenow="{{$lastweek}}" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold myfont text-info text-uppercase mb-1">
                                                تعداد کاربرانی که در یک ماه گذشته ثبت نام کرده اند
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div
                                                        class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$lastmonth}}
                                                        %
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                             style="width: {{$lastmonth}}%"
                                                             aria-valuenow="{{$lastmonth}}" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Bootstrap Modal User Info-->
                        <div class="modal fade" id="login-register" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content bg-gradient-light">
                                    <div class="modal-header bg-gradient-info border-bottom-info">
                                        <h5 class="text-white" style="font-size: 15px">Www.Bazarti.com</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <form id="save-user-form" class="modal-body text-center">
                                        <div class="admin-rtl my-1 text-white font-weight-bolder">
                                            <p id="error_box" class="myfont bg-gradient-danger"
                                               style="font-size: 17px;"></p>
                                            <p id="res_msg" class="myfont bg-gradient-success"
                                               style="font-size: 17px;"></p>
                                        </div>
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
                                                <input id="res-credit" name="res_credit" type="text"
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


                        <!-- Search Users -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">USERS
                                            </div>
                                            @if (isset($user_count))
                                                <div
                                                    class="h5 mb-0 font-weight-bold text-gray-800">{{$user_count ?? "Loading..."}}</div>
                                            @endif
                                        </div>
                                        <div class="col-auto">
                                            <form id="search-user" class="form-inline mr-auto w-100 navbar-search">
                                                <div class="input-group">
                                                    <input id="search-mobile" type="text"
                                                           class="form-control bg-light border-0 small"
                                                           placeholder="User Mobile..." aria-label="Search"
                                                           aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                        <button id="search-user-btn" data-toggle="modal"
                                                                data-target="#login-register" class="btn btn-primary"
                                                                type="button">
                                                            <i class="fas fa-search fa-sm"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <script>
                                                $("#search-user-btn").click(function (e) {
                                                    $.ajax({
                                                        type: "POST",
                                                        url: '{{ route("search_user") }}',
                                                        data: {"mobile": $('#search-mobile').val()},
                                                        success: function (response) {
                                                            if (response.status == 0) {
                                                                $("#res_msg").html(response.desc);
                                                            } else {
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
                                                //Save User Data)
                                                $("#save-user-data").click(function (e) {
                                                    $.ajax({
                                                        type: "POST",
                                                        url: '{{route('save_user')}}',
                                                        data: $("#save-user-form").serialize(),
                                                        success: function (res) {
                                                            if (res.status == 1) {
                                                                $("#res_msg").html(res.desc);
                                                            } else {
                                                                $.each(res.errors, function (i, item) {
                                                                    $("#error_box").append('<p class="text-white">' + res.errors[i] + '</p>');
                                                                });
                                                            }
                                                        }
                                                    });
                                                    e.preventDefault();
                                                });
                                                //Save User Data)
                                            </script>
                                        </div>
                                        {{--                                    <div class="col-auto">--}}
                                        {{--                                        <i class="fas fa-search fa-2x text-gray-300"></i>--}}
                                        {{--                                    </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">نمودار عضویت کاربران در وب سایت
                                        به
                                        تفکیک ماههای سال</h6>
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
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold myfont text-primary">نمودار ثبت کالا</h6>
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
                                    <div class="chart-pie pt-4 pb-2">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                        <canvas id="myPieChart" width="486" height="245" class="chartjs-render-monitor"
                                                style="display: block; width: 486px; height: 245px;"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                                        <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Social
                    </span>
                                        <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-4 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header text-right py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">کنترل کالای ثبتی</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">تعداد تمام کالاهای ثبت شده تا به امروز <span
                                            class="float-right">{{$product_count}}</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar"
                                             style="width: {{$product_count}}%"
                                             aria-valuenow="{{$product_count}}" aria-valuemin="0"
                                             aria-valuemax="1000"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">تعداد کالاهای ثبت شده در یک ماه گذشته <span
                                            class="float-right">{{$product_month}}</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar"
                                             style="width: {{$product_month}}%"
                                             aria-valuenow="{{$product_month}}" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">تعداد کالاهای ثبت شده در یک هفته گذشته <span
                                            class="float-right">{{$product_week}}</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: {{$product_week}}%"
                                             aria-valuenow="{{$product_week}}"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">تعداد کل کالاهای ثبت شده امروز<span
                                            class="
                                                float-right">{{$product_today}}</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar"
                                             style="width: {{$product_today}}%"
                                             aria-valuenow="{{$product_today}}" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account Setup <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                             aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Color System -->
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primary
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Success
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Info
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Warning
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Danger
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Secondary
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <!-- Illustrations -->
                        <div class="col-lg-4 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header text-right py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">افزایش اعتبار</h6>
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
                                        <div class="row">
                                        <div class="col-12 col-lg-7 text-left">
                                            <p>Credit :
                                                <spam id="current-credit-credit"></spam>
                                            </p>
                                            <p>Name :
                                                <spam id="current-credit-Name"></spam>
                                            </p>
                                            <p>Mobile :
                                                <spam id="current-credit-Mobile"></spam>
                                            </p>
                                            <p>Status :
                                                <spam id="current-credit-Status"></spam>
                                            </p>
                                        </div>
                                        <div class="col-12 col-lg-5 admin-rtl my-1 text-right font-weight-bolder">
                                            <p id="result-error" class="myfont"></p>
                                            <p id="result-msg" class="text-success"></p>
                                        </div>
                                    </div>
                                    <form id="credit-charge-form" method="" action="">
                                        <div class="col-12">
                                            <select name="itemName" id="itemName"
                                                    class="itemName text-right form-control bg-muted"></select>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-12 col-lg-3 text-right">
                                                <button type="button" value="minus" id="minus" name="minus"
                                                        class="text-white w-100 btn btn-sm bg-gradient-danger mt-2">
                                                    کاهش
                                                </button>
                                            </div>
                                            <div class="col-12 col-lg-6 text-center">
                                                <input type="text" id="new-credit" name="new_credit"
                                                       class="form-control-sm w-100 mt-2 text-right"
                                                       placeholder="مقدار اعتبار">
                                            </div>
                                            <div class="col-12 col-lg-3 text-left">
                                                <button type="button" id="sum" name="sum" value="sum"
                                                        class="text-white w-100 btn btn-sm bg-gradient-success mt-2">
                                                    افزایش
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                        </div>
                        <div class="card-body">
                            <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                CSS
                                bloat and poor page performance. Custom CSS classes are used to create custom
                                components and custom utility classes.</p>
                            <p class="mb-0">Before working with this theme, you should become familiar with the
                                Bootstrap framework, especially the utility classes.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.blade.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

@endsection();

@section('extra_js')
    <script src="/admin/js/admin_jquery.js"></script>
    <script src="/admin/vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="/admin/js/demo/chart-area-demo.js"></script>
    <script src="/admin/js/demo/chart-bar-demo.js"></script>
    <script src="/admin/js/demo/chart-pie-demo.js"></script>
    <script src="/admin/js/demo/datatables-demo.js"></script>
@endsection
