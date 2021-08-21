@extends("admin.views.layouts.master")
@section("shop")
    <shop>سامانه ثبت مطلب | فروشگاه سی وسه</shop>
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

        /*td*/
        /*{*/
        /*    height: 50px;*/
        /*    width: 50px;*/
        /*    text-align: center;*/
        /*    vertical-align: middle;*/
        /*}*/
    </style>
@endsection
@section("content")
    <div id="wrapper">
        @include("admin.views.partials.sidebar")
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Make New Content -->
                @if(isset($tag))
                    <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header text-right">
                                    ویرایش برچسب
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
                                    @if(Session::has("status"))
                                        <div class="alert alert-success text-center mb-2">{{ Session::get("status") }}</div>
                                    @endif
                                    <form action="{{route('edit_blog_tag_action')}}" method="POST" enctype="multipart/form-data">
                                        <div class="row text-right">
                                            <input name="id" class="d-none" type="hidden" value="{{$tag->id}}">
                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="name" class="form-label ">نام</label>
                                                    <input type="text" name="name" value="{{$tag->name ?? ""}}" class="form-control text-right">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="seo_title" class="form-label ">seo_title</label>
                                                    <input type="text" name="seo_title" value="{{$tag->seo_title ?? ""}}" class="form-control text-right">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="seo_description" class="form-label ">seo_description</label>
                                                    <input type="text" name="seo_description" value="{{$tag->seo_description ?? ""}}" class="form-control text-right">
                                                </div>
                                            </div>
                                            <div class="col-12 buttons text-right">
                                                <button class="btn btn-success btn-sm" type="submit">ویرایش برچسب</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
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
