@extends("admin.views.layouts.master")
@section("shop")
    <shop>سامانه ایجاد دسته بندی | فروشگاه آرمان</shop>
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
    <div id="wrapper">
    @include("admin.views.partials.sidebar")
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Make New Category -->
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header text-right">
                                    ساخت دسته بندی جدید
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
                                    <form action="{{route('new_blog_category_action')}}" method="POST" enctype="multipart/form-data">
                                        <div class="row text-right">
                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="name" class="form-label ">نام</label>
                                                    <input type="text" name="name" class="form-control text-right" placeholder="مثلا : آموزش لاراول">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="seo_title" class="form-label ">seo_title</label>
                                                    <input type="text" name="seo_title" class="form-control text-right">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="seo_description" class="form-label ">seo_description</label>
                                                    <input type="text" name="seo_description" class="form-control text-right">
                                                </div>
                                            </div>
                                            <div class="col-12 buttons text-right">
                                                <button class="btn btn-success btn-sm" type="submit">افزودن دسته</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Last Category -->
                    <div class="card mt-4">
                        <div class="card-header text-right">
                            آخرین دسته بندی های افزوده شده
                        </div>
                        <div class="card-body admin-rtl">
                            @if (isset($lastCategory))
                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>نام دسته</th>
                                            <th>تاریخ</th>
                                            <th>پاک شده</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody class="border">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach($lastCategory as $item)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format("Y/m/d") }}</td>
                                                <td>
                                                    @if ($item->delete == 1)
                                                        بله
                                                    @else
                                                        خیر
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('delete_category_action' , ['id'=> $item->id])}}" class="btn btn-danger btn-sm">حذف</a>
                                                    <a href="{{route('edit_category_mag_page' , ['id' => $item->id])}}" class="btn btn-success btn-sm">ویرایش</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{$lastCategory->links()}}
                                </div>
                                @else
                                <div class="text-center">
                                    <p>همچنان دسته ای ثبت نشده است</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- Last Category -->
                </div>
                <!-- Make New Category -->
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
