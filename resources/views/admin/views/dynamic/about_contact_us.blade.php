@extends("admin.views.layouts.master")
@section("title")
    <title>مدیریت صفخات | فروشگاه آرمان</title>
@endsection
@section("extra_css")
    <link rel="stylesheet" href="/admin/css/sweetalert2.all.css">
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
                <div class="col-xl-12 col-md-12 col-lg-12 mt-4">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            About & Contact Us
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            @include("admin.views.partials.condition")

{{--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}

                            <div class="row justify-content-center mt-5">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header text-right">
                                            Contact Us
                                        </div>
                                        <div class="card-body text-right">
                                            <form id="contact_us_form" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="contact_us_address">نشانی</label>
                                                    <input type="text" name="contact_us_address" value="{{$setting->contact_us_address ?? ""}}" class="form-control text-right">
                                                </div>

                                                <div class="form-group">
                                                    <label for="contact_us_phone">تلفن</label>
                                                    <input type="text" name="contact_us_phone" value="{{$setting->contact_us_phone ?? ""}}" class="form-control text-right">
                                                </div>

                                                <div class="form-group">
                                                    <label for="contact_us_email">پست الکترونیک</label>
                                                    <input type="text" name="contact_us_email" value="{{$setting->contact_us_email ?? ""}}" class="form-control text-right">
                                                </div>

                                                <div class="form-group">
                                                    <label for="contact_us_time">ساعات کاری</label>
                                                    <input type="text" name="contact_us_time" value="{{$setting->contact_us_time ?? ""}}" class="form-control text-right">
                                                </div>

                                                <div class="form-group">
                                                    <button id="contact_us_btn" type="submit" class="btn btn-success">ذخیره</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header text-right">
                                            About Us
                                        </div>
                                        <div class="card-body text-right">
                                            <form id="about_us_form" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="about_us_title">تیتر</label>
                                                    <input type="text" name="about_us_title" value="{{$setting->about_us_title ?? ""}}" class="form-control text-right">
                                                </div>
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="about_us_desc" class="form-label ">متن</label>
                                                        <textarea class="form-control textarea-editor text-right" name="about_us_desc" rows="10" aria-hidden="true" wfd-invisible="true">{{$setting->about_us_desc ?? ""}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <button id="about_us_btn" type="submit" class="btn btn-success">ذخیره</button>
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
        </div>
    </div>
@endsection
@section("extra_js")
    <script src="/admin/js/admin_jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script async type="text/javascript" src="/admin/js/sweetalert2.all.min.js"></script>
    @include('admin.views.tinymce')

    <script>
        tinyMCE.triggerSave(true, true);
        var dataForm = new FormData($("#make_product")[0]);
    </script>

    <script>
        $('#about_us_btn').click(function (e){
            tinyMCE.triggerSave(true, true);

            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '{{ route("about_contact_us_action") }}',
                data: $("#about_us_form").serialize(),
                success: function (data) {
                    console.log(data)
                    if(data.status == '0'){
                        Swal.fire({
                            position: 'top-end',
                            toast: true,
                            icon: 'error',
                            text: data.desc,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }else if(data.status == '1'){
                        Swal.fire({
                            position: 'top-end',
                            toast: true,
                            icon: 'success',
                            text: data.desc,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        location.reload();
                    }
                }
            });
        });
    </script>

    <script>
        $('#contact_us_btn').click(function (e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '{{ route("about_contact_us") }}',
                data: $("#contact_us_form").serialize(),
                success: function (data) {
                    console.log(data)
                    if(data.status == '0'){
                        Swal.fire({
                            position: 'top-end',
                            toast: true,
                            icon: 'error',
                            text: data.desc,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }else if(data.status == '1'){
                        Swal.fire({
                            position: 'top-end',
                            toast: true,
                            icon: 'success',
                            text: data.desc,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        location.reload();
                    }
                }
            });
        });
    </script>
@endsection
