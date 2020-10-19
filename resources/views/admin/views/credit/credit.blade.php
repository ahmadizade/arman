@extends("admin.views.layouts.master")
@section("title")
    <title>بازار تهاتر ایرانیان | اعتبارات</title>
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
            font-family: iranyekan, sans-serif !important;
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
                                <div class="card-body myfont">
                                    @if ($errors->any())
                                        <div class="alert alert-danger mb-2">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if(Session::has("status"))
                                        <div class="alert text-white bg-success mb-2">{{ Session::get("status") }}</div>
                                    @elseif(Session::has("error"))
                                        <div class="alert text-white bg-danger mb-2">{{ Session::get("error") }}</div>
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
                                            <select name="user_id" id="user_id"
                                                    class="user_id text-right form-control bg-muted"></select>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-12 col-lg-3 text-right">
                                                <button type="button" data-toggle="modal" data-target="#confirm-minus"
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
                                                <button type="button" data-toggle="modal" data-target="#confirm-sum"
                                                        class="text-white w-100 btn btn-sm bg-gradient-success mt-2">
                                                    افزایش
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--SUM MODAL--}}
                        <div class="modal fade" id="confirm-sum" tabindex="-1" role="dialog" aria-labelledby="Finance"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="text-danger modal-title myfont" id="Finance">افزایش اعتبار</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-right">
                                        آیا از انجام این عملیات اطمینان دارید؟
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="button" id="sum" class="btn btn-success" data-dismiss="modal">
                                            Approve
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--SUM MODAL--}}

                        {{--MINUS MODAL--}}
                        <div class="modal fade" id="confirm-minus" tabindex="-1" role="dialog"
                             aria-labelledby="Finance-sum" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="text-danger modal-title myfont" id="Finance-minus">کسر از اعتبار</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-right">
                                        آیا از انجام این عملیات اطمینان دارید؟
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="button" id="minus" class="btn btn-success" data-dismiss="modal">
                                            Approve
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--MINUS MODAL--}}
                    </div>
                    <div>
                    </div>
{{--                    <img src="" id="qr-code-png" style="width:200px;height: 200px;">--}}
{{--                    <div id="curl"></div>--}}
                </div>
                <div class="container-fluid">
                    <div class="row">
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
                                                           class="itemName form-control-sm w-100 bg-muted" required
                                                           autofocus>
                                                </div>
                                                <button id="qr-data-btn" type="submit"
                                                        class="btn btn-sm text-white bg-gradient-success my-2">
                                                    Check Service
                                                    test
                                                </button>
                                            </div>
                                        </form>
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
    <script type="text/javascript">
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
    </script>
@endsection
