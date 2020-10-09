@extends("admin.layouts.master")
@section("title")
    <title>بازار تهاتر ایرانیان | ثمین تخفیف</title>
@endsection
@section("extra_css")
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

                </div>
                <div class="row justify-content-around">
                    <div class="col-xl-4 col-lg-4 my-2">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                    class="card-header bg-gradient-info py-3 d-flex flex-row align-items-center justify-content-between">
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
                                <h6 class="m-0 myfont text-white">مدیریت حساب ها و اعتبارات</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="col-12">
                                    <p id="error_box" class="myfont admin-rtl" style="font-size: 15px"></p>
                                    <p id="current-credit-left" class="" style="font-size: 15px"></p>
                                <select name="itemName" id="itemName"
                                        class="itemName form-control bg-muted"></select>
                                <button id="credit-charge-btn" type="submit"
                                        class="btn btn-sm text-white bg-gradient-success my-2">
                                    Show User
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 my-2">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                                class="card-header bg-gradient-info py-3 d-flex flex-row align-items-center justify-content-between">
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
                            <h6 class="m-0 myfont text-white">کنترل سرویس کیو آر کد</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="col-12">
                                <form method="get" action="{{route('code_generator')}}">
                                    <div class="col-12">
                                        <div class="input-group my-2">
                                            <input type="hidden" name="user_id" value="{{Auth()->id()}}">
                                            <input id="qr-data" name="qr_data" type="text"
                                                   class="form-control bg-muted" required autofocus>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-white bg-gradient-info">Message</span>
                                            </div>
                                        </div>
                                        <button id="qr-data-btn" type="submit"
                                                class="btn btn-sm text-white bg-gradient-success my-2">
                                            Check Service
                                        </button>
                                    </div>

                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div>
                <p id="test"></p>
            </div>
        </div>
    </div>
    </div>
@endsection
@section("extra_js")
    <script type="text/javascript">
        $(document).ready(function () {

            $('.itemName').select2({
                placeholder: 'Select an item',
                language: "fa",
                dir: "rtl",
                ajax: {
                    url: '{{route('suggestion_action')}}',
                    dataType: 'json',
                    delay: 250,
                    success(response) {
                        $('#test').html(response);
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name + "  /  " + "شماره همراه : " + "  " + item.mobile + "  /  " + "اعتبار = " + item.credit,
                                    id: item.id,
                                }
                            })
                        };
                    },
                    cache: true,
                }
            });

            $('#itemName').change(function () {
                $.ajax({
                    type: 'post',
                    url: '{{route('credit_show_action')}}',
                    data: {'id': $('#itemName').select2().val()},
                    success(response) {
                        if (response['credit'] !== 0) {
                            console.log(response);
                            $('#current-credit-left').html('Credit : ' + response['credit'] + "</br>" + 'Name : ' + response['name'] + "</br>" + 'Mobile : ' + response['mobile'] + "</br>" + 'Status : ' + response['status']);
                        } else {
                            console.log(0);
                            $('#error_box').html("اعتباری ثبت نشده است")
                        }
                    }
                });
            });
        });
    </script>

@endsection
