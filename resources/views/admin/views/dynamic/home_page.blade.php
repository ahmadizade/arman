@extends("admin.views.layouts.master")
@section("title")
    <title>مدیریت صفحه اصلی | فروشگاه آرمان</title>
@endsection
@section("extra_css")
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    {{--    <link rel="stylesheet" type="text/css" href="/admin/css/buttons.dataTables.min.css">--}}
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
                            Slider Management
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            @include("admin.views.partials.condition")
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header text-right">
                                            Header Slider
                                        </div>
                                        <div class="card-body text-right">
                                            <form method="post" action="{{route('slider_product')}}">
                                                <div class="form-group">
                                                    <label for="slide_head">Slide Head</label>
                                                    <input type="text" name="slide_head" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="slide_title">Slide Title</label>
                                                    <input type="text" name="slide_title" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="slide_text">Slide Text</label>
                                                    <textarea cols="5" rows="2" type="text" name="slide_text" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="slide_price">Slide Price</label>
                                                    <input type="text" name="slide_price" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="slide_link">Slide Link</label>
                                                    <input type="text" name="slide_link" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success">ذخیره</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        @if (isset($result) && isset($result->home_page_slider) && isset($result->home_page_slider[0]))
                                            @foreach(json_decode($result->home_page_slider) as $key => $item)
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="card">
                                                        <div class="card-header text-right">
                                                            Slider-{{$key+1}}
                                                        </div>
                                                        <div class="card-body">
                                                            <form method="post" action="{{route('slider_product_edit')}}">
                                                                <input type="hidden" value="{{$key}}" name="index">
                                                                <div class="form-group">
                                                                    <label for="slide_head">Slide Head</label>
                                                                    <input type="text" name="slide_head" class="form-control" value="{{$item->slide_head ?? ""}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="slide_title">Slide Title</label>
                                                                    <input type="text" name="slide_title" class="form-control" value="{{$item->slide_title ?? ""}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="slide_text">Slide Text</label>
                                                                    <textarea cols="5" rows="2" type="text" name="slide_text" class="form-control">{{$item->slide_text ?? ""}}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="slide_price">Slide Price</label>
                                                                    <input type="text" name="slide_price" class="form-control" value="{{$item->slide_price ?? ""}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="slide_link">Slide Link</label>
                                                                    <input type="text" name="slide_link" class="form-control" value="{{$item->slide_link ?? ""}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-primary">ویرایش</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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
    {{--DELETE MODAL--}}
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="del"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-danger modal-title myfont" id="del">افزایش اعتبار</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-right">
                    آیا از انجام این عملیات اطمینان دارید؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" data-id="' + row.id + '" id="sum" class="btn btn-success delete"
                            data-dismiss="modal">
                        Approve
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--DELETE MODAL--}}

@endsection
@section("extra_js")
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@endsection
