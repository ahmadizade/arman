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
                <!-- Make New Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header text-right">
                                    ساخت محتوای جدید
                                </div>
                                <div class="card-body">
                                    @if (Session::has("errors"))
                                        <div class="alert alert-danger mb-2 admin-rtl">
                                            <ul class="mb-0 text-center">
                                                <li>{{ Session::get("errors") }}</li>
                                            </ul>
                                        </div>
                                    @endif
                                    @if(Session::has("status"))
                                        <div class="alert alert-success text-center mb-2">{{ Session::get("status") }}</div>
                                    @endif
                                    <form action="{{route('new_single_mag_action')}}" method="POST" enctype="multipart/form-data">
                                        <div class="row text-right">
                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="blog_category" class="form-label">دسته بندی</label>
                                                    <select style="width: 100%" name="blog_category" class="form-control select2">
                                                        <option selected>انتخاب دسته</option>
                                                        @if(isset($blog_category))
                                                            @foreach($blog_category as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="blog_tag" class="form-label">برچسب</label>
                                                    <select style="width: 100%" name="blog_tag[]" class="form-control select2" multiple>
                                                        @if(isset($blog_tag))
                                                            @foreach($blog_tag as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="title" class="form-label ">عنوان</label>
                                                    <input type="text" name="title" class="form-control text-right" placeholder="مثلا : آموزش لاراول">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="paragraph" class="form-label ">محتوا</label>
                                                    <textarea class="form-control textarea-editor" name="paragraph" rows="10" aria-hidden="true" wfd-invisible="true"></textarea>
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
                                            <div class="col-12">
                                                <div class="my-3">
                                                    <label for="seo_canonical" class="form-label ">seo_canonical</label>
                                                    <input type="text" name="seo_canonical" class="form-control text-right">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="my-3">
                                                        <label for="thumbnail" class="form-label ">Thumbnail (Width : 790 , Height : 600)</label>
                                                        <input type="file" class="form-control" name="thumbnail">
                                                    </div>
                                                </div>
{{--                                                <div class="col-6">--}}
{{--                                                    <div class="my-3">--}}

{{--                                                        <label for="image" class="form-label ">Image (Width : 790 , Height : 600)</label>--}}
{{--                                                        <input type="file" class="form-control" name="image">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div>
                                            <div class="col-12 buttons text-right">
                                                <button class="btn btn-success btn-sm" type="submit">افزودن محتوا</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Last Content -->
                    <div class="card">
                        <div class="card-header text-right">
                            آخرین محصولات افزوده شده
                        </div>
                        <div class="card-body">
                            @if (isset($lastPost))
                                <div class="table-responsive admin-rtl">
                                    <table class="table table-hover text-center">
                                        <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان مطلب</th>
                                            <th>تاریخ</th>
                                            <th>پاک شده</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody class="border">
                                        @php
                                          $i = 1;
                                        @endphp
                                        @foreach($lastPost as $item)
                                            <tr>
                                                <td>{{$i++}}</td>
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
