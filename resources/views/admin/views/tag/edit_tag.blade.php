@extends("admin.views.layouts.master")
@section("shop")
    <shop>سامانه ویرایش برچسب | فروشگاه آرمان</shop>
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

        .border-none {
            border-top-style: hidden;
            border-right-style: hidden;
            border-left-style: hidden;
            border-bottom-style: hidden;
            background-color: transparent;
            /*height: 50px;*/
            width: 50px;
            text-align: center;
            vertical-align: middle;

        }

        .border-none:focus {
            outline: none;
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
                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card admin-rtl">
                                        <div class="card-header text-right">
                                            ویرایش برچسب
                                        </div>
                                        <div class="card-body">
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
                                            @if (isset($sltag))
                                                <form action="{{route('edit_tag_action')}}" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" readonly value="{{$sltag->id}}">
                                                    <input type="hidden" name="user_id" readonly value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                                    <div class="row text-right">
                                                            <div class="col-12 col-md-6 col-lg-6">
                                                                <div class="my-3">
                                                                    <label for="name" class="form-label ">نام فارسی برچسب</label>
                                                                    <input type="text" name="name" class="form-control text-right" value="{{$sltag->name}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 col-lg-6">
                                                                <div class="my-3">
                                                                    <label for="english_name" class="form-label ">نام اینگلیسی برچسب</label>
                                                                    <input type="text" name="english_name" class="form-control text-right" value="{{$sltag->english_name}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 col-lg-6">
                                                                <div class="my-3">
                                                                    <label for="seo_title" class="form-label ">SEO Title</label>
                                                                    <input type="text" name="seo_title" class="form-control text-right" value="{{$sltag->seo_title}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 col-lg-6">
                                                                <div class="my-3">
                                                                    <label for="seo_description" class="form-label ">SEO Discription</label>
                                                                    <input type="text" name="seo_description" class="form-control text-right" value="{{$sltag->seo_description}}">
                                                                </div>
                                                            </div>
{{--                                                            <div class="col-12">--}}
{{--                                                                <div class="my-3">--}}
{{--                                                                    <label for="seo_canonical" class="form-label ">SECO Canonical</label>--}}
{{--                                                                    <input type="text" name="seo_canonical" class="form-control text-right" value="{{$sltag->seo_canonical}}">--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
                                                            <div class="col-12">
                                                                <div class="my-3">
                                                                    <label for="description" class="form-label ">توضیحات برچسب</label>
                                                                    <input type="text" name="description" class="form-control text-right textarea-editor" value="{{$sltag->description}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 buttons text-right">
                                                                <button class="btn btn-success btn-sm" type="submit">ویرایش برچسب</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                            @endif
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
