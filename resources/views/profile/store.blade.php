@extends("layouts.master")

@section("title")
    <title>فروشگاه | ثمین تخفیف</title>
@endsection

@section('extra_css')
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
@endsection

@section("content")

    <div class="container mt-3">
        <div class="row">
            @include("profile.sidebar")
            <div class="col-12 col-lg-9">
                <div class="card shadow mt-3">
                    <div class="card-header card-header p-3">
                        <h3 class="mt-1 mb-0 font-14 float-right">فروشگاه</h3>
                    </div>
                    <div class="card-body p-3">
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
                            <div class="alert text-center alert-success mb-2">{{ Session::get("status") }}</div>
                        @elseif(Session::has("error"))
                            <div class="alert text-white alert-danger mb-2">{{ Session::get("error") }}</div>
                        @endif
                        @if(!isset($result['id']))
                            <hr>
                            <h2 class="text-center text-warning">فروشگاه خود را ثبت کنید</h2>
                            <hr>
                            <form action="{{route('store_action')}}" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-12"><span class="text-danger line-height-0 pl-1 font-15">*</span>نام فروشگاه</span>
                                            </div>
                                            <input name="shop" type="text" class="form-control"
                                                   value="{{ old("shop") }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-12">شعبه</span>
                                            </div>
                                            <input name="branch" type="text" placeholder="در صورت نداشتن شعبه خالی بزارید" class="form-control"
                                                   value="{{ old("branch") }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-12"><span class="text-danger line-height-0 pl-1 font-15">*</span>ماهیت</span>
                                            </div>
                                            <select name="nature" class="form-control">
                                                <option value="0" selected disabled>انتخاب ماهیت</option>
                                                <option @if(old("nature") == 1) selected @endif value="1">شخصی (حقیقی)</option>
                                                <option @if(old("nature") == 2) selected @endif value="2">دولتی یا عمومی</option>
{{--                                                <option @if(old("nature") == 3) selected @endif value="3">خصوصی</option>--}}
{{--                                                <option @if(old("nature") == 4) selected @endif value="4">تعاونی</option>--}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-12">شناسه ملی</span>
                                            </div>
                                            <input type="text" name="shenase_melli" placeholder="در صورت نداشتن شناسه ملی خالی بزارید" class="form-control"
                                                   value="{{ old("shenase_melli") }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-12"><span class="text-danger line-height-0 pl-1 font-15">*</span>نام و نام خانوادگی صاحب فروشگاه</span>
                                            </div>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{ old("name") }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-12"><span class="text-danger line-height-0 pl-1 font-15">*</span>کد ملی صاحب فروشگاه</span>
                                            </div>
                                            <input type="text" name="melli_code" maxlength="11" class="form-control"
                                                   value="{{ old("melli_code") }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-12"><span class="text-danger line-height-0 pl-1 font-15">*</span>نوع خدمات</span>
                                            </div>
                                            <select name="category" class="form-control">
                                                <option value="0" selected disabled>انتخاب دسته بندی</option>
                                                @foreach($category as $item)
                                                    <option @if(old("category") == $item['id']) selected @endif value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="input-group mt-2">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="file">
                                                <label class="custom-file-label text-left">+ افزودن
                                                    لوگو</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-12">رنگ فروشگاه</span>
                                            </div>
                                            <input type="color" name="color" class="form-control"
                                                   value="{{ old("color") ?? "#3498db" }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-12"><span class="text-danger line-height-0 pl-1 font-15">*</span>آدرس</span>
                                            </div>
                                            <input type="text" name="address" class="form-control"
                                                   value="{{ old("address") }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-left">
                                        <button class="btn btn-primary my-2">ثبت فروشگاه</button>
                                    </div>
                                </div>
                            </form>
                        @elseif(isset($result['id']) && $result['verify'] == 0)
                            <div class="alert alert-danger mb-0 text-center">لطفا تا زمان احراز هویت صبر کنید</div>
                            <form action="{{route('store_edit_action')}}" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="input-group mt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-12"><span class="text-danger line-height-0 pl-1 font-15">*</span>نام فروشگاه</span>
                                                </div>
                                                <input name="shop" type="text" class="form-control"
                                                       value="{{ $result['shop'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 d-none legal">
                                            <div class="input-group mt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-12">شعبه</span>
                                                </div>
                                                <input name="branch" type="text" placeholder="در صورت نداشتن شعبه خالی بزارید" class="form-control"
                                                       value="{{ $result['branch'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="input-group mt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-12"><span class="text-danger line-height-0 pl-1 font-15">*</span>ماهیت</span>
                                                </div>
                                                <select name="nature" class="form-control">
                                                    <option value="0" selected disabled>انتخاب ماهیت</option>
                                                    <option @if($result['nature'] == 1) selected @endif value="1">شخصی (حقیقی)</option>
                                                    <option @if($result['nature'] == 2) selected @endif value="2">حقوقی</option>
{{--                                                    <option @if($result['nature'] == 3) selected @endif value="3">خصوصی</option>--}}
{{--                                                    <option @if($result['nature'] == 4) selected @endif value="4">تعاونی</option>--}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 d-none legal">
                                            <div class="input-group mt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-12">شناسه ملی</span>
                                                </div>
                                                <input type="text" name="shenase_melli" placeholder="در صورت نداشتن شناسه ملی خالی بزارید" class="form-control"
                                                       value="{{ $result['shenase_melli'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="input-group mt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-12"><span class="text-danger line-height-0 pl-1 font-15">*</span>نام و نام خانوادگی صاحب فروشگاه</span>
                                                </div>
                                                <input type="text" name="name" class="form-control"
                                                       value="{{ $result['name'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="input-group mt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-12"><span class="text-danger line-height-0 pl-1 font-15">*</span>کد ملی صاحب فروشگاه</span>
                                                </div>
                                                <input type="text" name="melli_code" maxlength="11" class="form-control"
                                                       value="{{ $result['melli_code'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="input-group mt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-12"><span class="text-danger line-height-0 pl-1 font-15">*</span>نوع خدمات</span>
                                                </div>
                                                <select name="category" class="form-control">
                                                    <option value="0" selected disabled>انتخاب دسته بندی</option>
                                                    @foreach($category as $item)
                                                        <option @if($result['category'] == $item['id']) selected @endif value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="input-group mt-2">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file">
                                                    <label class="custom-file-label text-left">+ افزودن
                                                        لوگو</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <div class="input-group mt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-12">رنگ فروشگاه</span>
                                                </div>
                                                <input type="color" name="color" class="form-control"
                                                       value="{{ $result["color"] }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-9">
                                            <div class="input-group mt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-12"><span class="text-danger line-height-0 pl-1 font-15">*</span>آدرس</span>
                                                </div>
                                                <input type="text" name="address" class="form-control"
                                                       value="{{ $result['address'] }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-left">
                                            <button class="btn btn-primary my-2">ویرایش اطلاعات</button>
                                        </div>
                                    </div>
                                </form>
                        @elseif(isset($result['id']) && $result['verify'] == 1)
                            <div class="alert alert-success mb-0 text-center">فروشگاه شما ( <a target="_blank" href="{{ route("single_shop",["shop" => $result['shop_slug'] ,"branch" => $result['branch_slug']]) }}">{{$result['shop']}}</a> ) احراز هویت شده</div>
                            <div class="row">
                                    <div class="col-12 col-lg-12">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-12">نام فروشگاه</span>
                                            </div>
                                            <input disabled class="form-control"
                                                   value="{{ $result["shop"] }}">
                                        </div>
                                    </div>
                                    <div id="branch" class="col-12 col-lg-6 legal">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-12">شعبه</span>
                                            </div>
                                            <input disabled class="form-control"
                                                   value="{{ $result["branch"] }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-12">ماهیت</span>
                                            </div>
                                            <select id="nature" disabled class="form-control">
                                                <option @if($result["branch"] == 1) selected @endif>شخصی (حقیقی)</option>
                                                <option @if($result["branch"] == 2) selected @endif>حقوقی</option>
{{--                                                <option @if($result["branch"] == 3) selected @endif>خصوصی</option>--}}
{{--                                                <option @if($result["branch"] == 4) selected @endif>تعاونی</option>--}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 legal">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-12">شناسه ملی</span>
                                            </div>
                                            <input disabled class="form-control"
                                                   value="{{ $result["shenase_melli"] }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-12">نام و نام خانوادگی صاحب فروشگاه</span>
                                            </div>
                                            <input disabled class="form-control"
                                                   value="{{ $result["name"] }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-12">کد ملی صاحب فروشگاه</span>
                                            </div>
                                            <input disabled maxlength="11" class="form-control"
                                                   value="{{ $result["melli_code"] }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-12">نوع خدمات</span>
                                            </div>
                                            <select disabled class="form-control">
                                                @foreach($category as $item)
                                                    <option @if($result["category"] == $item['id']) disabled selected @endif value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-12">آدرس</span>
                                            </div>
                                            <input disabled name="address" class="form-control"
                                                   value="{{ $result["address"] }}">
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="col-12 text-center">
                                        <img src="/images/shop/logo/{{ $result['logo'] }}" class="img-fluid" style="max-width: 250px" alt="logo">
                                    </div>
                                </div>
                            <form action="{{ route("store_desc_action") }}" method="post" enctype="multipart/form-data">
                                <div class="row mt-3">
                                    <div class="col-12 col-lg-6">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-12">رنگ فروشگاه</span>
                                            </div>
                                            <input type="color" name="color" class="form-control"
                                                   value="{{ $result["color"] }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="input-group mt-2">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="file">
                                                <label class="custom-file-label text-left">+ افزودن
                                                    لوگو</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <textarea name="desc" id="desc" rows="10"
                                                  class="form-control font-13"
                                                  placeholder="توضیحات">{!! $result["desc"] !!}</textarea>
                                    </div>
                                    <div class="col-12 text-left">
                                        <button class="btn btn-primary mt-2">ویرایش</button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra_js')

    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/translations/fa.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#desc' ), {
                language: {
                    ui: 'fa',
                    content: 'fa',
                }
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>

@endsection
