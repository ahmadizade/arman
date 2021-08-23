@extends("admin.views.layouts.master")
@section("shop")
    <shop>سامانه ثبت مطلب | فروشگاه آرمان ماسک</shop>
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
                    <!-- Last Content -->
                    <div class="card">
                        <div class="card-header text-right">
                            آخرین پست های افزوده شده
                        </div>
                        <div class="card-body admin-rtl">
                            @if (isset($lastPost))
                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead class="table-light">
                                        <tr>
                                            <th>عکس</th>
                                            <th>نام محصول</th>
                                            <th>تاریخ</th>
                                            <th>پاک شده</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody class="border">
                                        @foreach($lastPost as $item)
                                            <tr>
                                                <td><img class="img-fluid" src="/uploads/blog/thumbnail/{{$item->thumbnail}}" style="max-width: 60px"></td>
                                                <td>{{$item->title}}</td>
                                                <td>{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format("Y/m/d") }}</td>
                                                <td>
                                                    @if ($item->delete == 1)
                                                        بله
                                                    @else
                                                        خیر
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('delete_mag_action' , ['post_id'=> $item->id])}}" class="btn btn-danger btn-sm">حذف</a>
                                                    <a href="{{route('edit_mag_page' , ['post_id' => $item->id])}}" class="btn btn-success btn-sm">ویرایش</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{$lastPost->links()}}
                                </div>
                            @else
                                <div class="text-center">
                                    <p>مطلبی ثبت نشده است</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- Last Content -->
                </div>
                <!-- Make New Content -->
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
