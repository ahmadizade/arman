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
                                <p id="current-credit" class="myfont text-white bg-gradient-success"
                                   style="font-size: 17px;"></p>
                            </div>
                            <form id="save-user-form" class="modal-body text-center">
                                <div class="admin-rtl my-1 text-white font-weight-bolder">
                                    <p id="error_box" class="myfont bg-gradient-danger" style="font-size: 17px;"></p>
                                    <p id="res_msg" class="myfont bg-gradient-success" style="font-size: 17px;"></p>
                                </div>
                                <div class="col-12">
                                    <select class="itemName form-control bg-muted" name="itemName"></select>
                                </div>
                            </form>
                            <h5 id="test"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section("extra_js")
    <script type="text/javascript">
        $('.itemName').select2({
            placeholder: 'Select an item',
            language: "fa",
            dir: "rtl",
            ajax: {
                url: '{{route('suggestion_action')}}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    // $('#test').html(data[0].name);
                    // console.log(data[0].name);
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name + "  /  " + "شماره همراه : " + "  " + item.mobile + "  /  " + "اعتبار = " + item.credit,
                                id: item.id,
                            }
                        })
                    };

                },
                cache: true
            }
        });
        // $('#test').select2('data');
        // $('.itemName').find(':selected');
        // console.log($('.itemName').find(':selected'));
    </script>


@endsection
