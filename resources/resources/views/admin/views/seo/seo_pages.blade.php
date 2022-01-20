@extends("admin.views.layouts.master")
@section("title")
    <title>armanmask.ir | تنظیمات سایت</title>
@endsection
@section("extra_css")
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

                <div class="container-fluid">
                    {{--Home Page Seo--}}
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card mt-5">
                                    <div class="card-header text-right">
                                        مدیریت سئو صفحه اصلی
                                    </div>
                                    <div class="card-body admin-rtl">
                                        @if (Session::has("errors"))
                                            <div class="alert alert-danger mb-2">
                                                <ul class="mb-0 text-center">
                                                    <li>{{ Session::get("errors") }}</li>
                                                </ul>
                                            </div>
                                        @endif
                                        @if(Session::has("status"))
                                            <div class="alert alert-success text-center mb-2">{{ Session::get("status") }}</div>
                                        @endif
                                        <form action="{{route('home_page_seo')}}" method="POST" enctype="multipart/form-data">
                                            <div class="row text-right">
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3">
                                                        <label for="home_page_title" class="form-label ">Home Page Title</label>
                                                        <input value="{{$setting->home_page_title ?? ""}}" type="text" name="home_page_title" class="form-control text-right" placeholder="مثلا : فروشگاه آنلاین">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3">
                                                        <label for="home_page_description" class="form-label ">Home Page Description</label>
                                                        <input value="{{$setting->home_page_description ?? ""}}" type="text" name="home_page_description" class="form-control text-right" placeholder="مثلا : فروشگاه آرمان ماسک ... ">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="main_text" class="form-label ">متن صفحه اول</label>
                                                        <textarea class="form-control textarea-editor" name="main_text" rows="10" aria-hidden="true" wfd-invisible="true">{{$setting->main_text ?? ""}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12 buttons text-right">
                                                    <button class="btn btn-success btn-sm" type="submit">انجام تغییرات</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Home Page Seo--}}


                    {{--about / contact Page Seo--}}
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card mt-5">
                                    <div class="card-header text-right">
                                        سئو صفحه تماس با ما و درباره ما
                                    </div>
                                    <div class="card-body admin-rtl">
                                        <form action="{{route('extra_page_seo')}}" method="POST" enctype="multipart/form-data">
                                                {{--AboutUs--}}
                                            <div class="row text-right">
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3">
                                                        <label for="aboutus_page_title" class="form-label ">About us Page Title</label>
                                                        <input value="{{$setting->aboutus_page_title ?? ""}}" type="text" name="aboutus_page_title" class="form-control text-right" placeholder="مثلا : فروشگاه آنلاین">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3">
                                                        <label for="aboutus_page_description" class="form-label ">About us Page Description</label>
                                                        <input value="{{$setting->aboutus_page_description ?? ""}}" type="text" name="aboutus_page_description" class="form-control text-right" placeholder="مثلا : فروشگاه آرمان ماسک ... ">
                                                    </div>
                                                </div>
                                                {{--AboutUs--}}


                                                {{--ContactUs--}}
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3">
                                                        <label for="contactus_page_title" class="form-label ">Contact us Page Title</label>
                                                        <input value="{{$setting->contactus_page_title ?? ""}}" type="text" name="contactus_page_title" class="form-control text-right" placeholder="مثلا : فروشگاه آنلاین">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3">
                                                        <label for="contactus_page_description" class="form-label ">Contact us Page Description</label>
                                                        <input value="{{$setting->contactus_page_description ?? ""}}" type="text" name="contactus_page_description" class="form-control text-right" placeholder="مثلا : فروشگاه آرمان ماسک ... ">
                                                    </div>
                                                </div>
                                                {{--ContactUs--}}

                                                {{--MAG--}}
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3">
                                                        <label for="mag_title" class="form-label ">MAG Title</label>
                                                        <input value="{{$setting->mag_title ?? ""}}" type="text" name="mag_title" class="form-control text-right" placeholder="مثلا : فروشگاه آنلاین ...">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="my-3">
                                                        <label for="mag_description" class="form-label ">MAG Description</label>
                                                        <input value="{{$setting->mag_description ?? ""}}" type="text" name="mag_description" class="form-control text-right" placeholder="مثلا : فروشگاه آرمان ماسک ... ">
                                                    </div>
                                                </div>
                                                {{--MAG--}}


                                                    <div class="col-12 buttons text-right mt-3">
                                                    <button class="btn btn-success btn-sm" type="submit">انجام تغییرات</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--about / contact Page Seo--}}

                    {{--Make Time--}}
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card mt-5">
                                    <div class="card-header text-right">
                                        تنظیم زمان جشنواره
                                    </div>
                                    <div class="card-body admin-rtl">
                                        <form action="{{route('festival')}}" method="POST" enctype="multipart/form-data">
                                                {{--AboutUs--}}
                                            <div class="row text-right">
                                                <div class="col-6 col-md-4 col-lg-4">
                                                    <div class="my-3">
                                                        <label for="end_festival" class="form-label">ماه</label>
                                                        <select name="end_festival[]" class="form-control" required>
                                                            @foreach(\App\Models\Setting::Month() as $key => $month)
                                                                <option value="{{$key}}">{{$key}}</option>
                                                            @endforeach
{{--                                                            <option value="January" selected>فروردین</option>--}}
{{--                                                            <option value="February">اردیبهشت</option>--}}
{{--                                                            <option value="March">خرداد</option>--}}
{{--                                                            <option value="April">تیر</option>--}}
{{--                                                            <option value="May">مرداد</option>--}}
{{--                                                            <option value="June">شهریور</option>--}}
{{--                                                            <option value="July">مهر</option>--}}
{{--                                                            <option value="August">آبان</option>--}}
{{--                                                            <option value="September">آذر</option>--}}
{{--                                                            <option value="October">دی</option>--}}
{{--                                                            <option value="November">بهمن</option>--}}
{{--                                                            <option value="December">اسفند</option>--}}
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4 col-lg-4">
                                                    <div class="my-3">
                                                        <label for="end_festival" class="form-label ">روز</label>
                                                        <select name="end_festival[]" class="form-control" required>
                                                            @for($i = 1 ; $i <= 31 ; $i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4 col-lg-4">
                                                    <div class="my-3">
                                                        <label for="end_festival" class="form-label">ساعت (1 الی 24)</label>
                                                        <input name="end_festival[]" class="form-control" type="number" min="1" max="24" placeholder="1 - 24" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 buttons text-right mt-3">
                                                    <button class="btn btn-success btn-sm" type="submit">انجام تغییرات</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Make Time--}}



                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section("extra_js")
        @include('admin.views.tinymce')
        <script src="/admin/js/admin_jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script>
            $(".select2").select2({
                tags:true,
            })
        </script>
        <script>
            tinyMCE.triggerSave(true, true);
            var dataForm = new FormData($("#make_product")[0]);
        </script>
    @endsection
