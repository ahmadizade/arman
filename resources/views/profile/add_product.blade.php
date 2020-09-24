@extends("layouts.master")

@section("title")
    <title>بازار تهاتر ایرانیان | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container" style="margin-top: 80px">
        <div class="row">
            @include("profile.sidebar")
            <div class="col-12 col-lg-9">
                <div class="card mt-3">
                    <div class="card-header bg-secondary text-white p-2">
                        <h3 class="mt-1 mb-0 font-14 float-right"> ثبت کالا</h3>
                        {{--                        <div class="float-left">تاریخ ثبت نام: {{ \Morilog\Jalali\Jalalian::forge($user->created_at)->format("Y/m/d ساعت H:i:s") }}</div>--}}
                    </div>
                    <div class="card-body p-2">
                        {{--                        <h5 class="my-3 text-success">اعتبار فعلی {{ number_format($user->credit) }} ریال</h5>--}}
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
                            <div class="alert alert-success mb-2">{{ Session::get("status") }}</div>
                        @elseif(Session::has("error"))
                            <div class="alert alert-danger mb-2">{{ Session::get("error") }}</div>
                        @endif
                        <form action="{{route('add_product_action')}}" method="post" enctype="multipart/form-data">>
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">نام کالا</span>
                                        </div>
                                        <input id="product_name" name="name" type="text" class="form-control"
                                               value="">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">قیمت</span>
                                        </div>
                                        <input type="number" id="product_price" name="price"
                                               class="form-control" value="">
                                    </div>
                                </div>


                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">موبایل</span>
                                        </div>
                                        <input type="number" id="product_mobile" name="mobile"
                                               class="form-control"
                                               value="">
                                    </div>
                                </div>


                                <div class="col-12">
                                            <textarea name="desc" id="product_desc" cols="30" rows="7"
                                                      class="form-control"
                                                      placeholder="پیام خود را اینجا وارد کنید..."
                                            ></textarea>
                                </div>


                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">تخفیف</span>
                                        </div>
                                        <input type="text" name="discount" id="product_discount"
                                               class="form-control" value="">
                                    </div>
                                </div>


                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">تعداد</span>
                                        </div>
                                        <input type="text" name="quantity" id="product_quantity"
                                               class="form-control"
                                               value="">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">نوع کالا</span>
                                        </div>
                                        <select class="form-control" name="stock" id="product_stock">
                                            <option value="1">نو</option>
                                            <option value="0">کارکرده</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="file"
                                           class="col-md-2 col-form-label text-md-right">فایل</label>
                                    <div class="col-md-4">
                                        <input type="file" name="file" id="file">
                                    </div>
                                </div>

                                {{--                                <div class="col-12 col-lg-4">--}}
                                {{--                                    <div class="input-group">--}}
                                {{--                                        <div class="custom-file">--}}
                                {{--                                            <input type="file" class="custom-file-input" name="picture" id="picture"--}}
                                {{--                                                   aria-describedby="inputGroupFileAddon01">--}}
                                {{--                                            <label class="custom-file-label text-left" for="inputGroupFile01">عکس--}}
                                {{--                                                کالا</label>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                            </div>


                            <div class="row">
                                <div class="col-12 text-left">
                                    <button class="btn btn-primary my-2">تایید</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra_js')
    <script src="{{url('/js/app_jquery.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('product_desc');
    </script>

@stop


{{--<img src="{{Storage::disk('vms')->url($ticket['file'])}}">--}}

{{--                                        @if ($errors->has('file'))--}}
{{--                                            <span class="text-danger">{{ $errors->first('file') }}</span>--}}
{{--                                        @endif--}}

{{--                                        @error('file')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                        @enderror--}}
