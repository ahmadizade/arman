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
                                    <div class="col-12">
                                        <select name="itemName" id="itemName" class="itemName form-control bg-muted"></select>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <button type="button"
                                                    class="quantity-left-minus text-white btn btn-sm bg-gradient-danger mt-2"
                                                    data-type="minus" data-field="">
                                                Decrease
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" id="quantity" name="quantity"
                                                   class="form-control-sm mt-2" value="0" min="1"
                                                   max="100">
                                        </div>
                                        <div class="col-3">
                                            <button type="button"
                                                    class="quantity-right-plus text-white btn btn-sm bg-gradient-success mt-2"
                                                    data-type="plus" data-field="">
                                                Increase
                                            </button>
                                        </div>
                                    </div>
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
                                    <form id="code-generate-form">
                                        <div class="col-12">
                                            <div class="input-group my-2">
                                                <input type="hidden" name="user_id" value="{{Auth()->id()}}">
                                                <input id="qr-data" name="qr_data" type="text"
                                                       class="itemName form-control-sm w-100 bg-muted" required autofocus>
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
                <img src="" id="qr-code-png" style="width:200px;height: 200px;">
                <div id="curl"></div>
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

            $('#qr-data-btn').click(function (e) {
                $.ajax({
                    type: 'get',
                    url: '{{route('code_generator')}}',
                    data: $('#code-generate-form').serialize(),
                    success(response) {
                        $('#curl').html('<img' + " " + 'src=' + response + '>');
                        $('#qr-code-png').attr('src', response);
                    }
                });
                e.preventDefault();
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function () {
            console.log('ON');
            var quantitiy = 0;
            $('.quantity-right-plus').click(function (e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                // If is not undefined
                $('#quantity').val(quantity + 1);
                // Increment
            });
            $('.quantity-left-minus').click(function (e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                // If is not undefined
                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });
        });
    </script>
@endsection
