@extends("layouts.master")

@section("title")
    <title>بازار تهاتر ایرانیان | ثمین تخفیف</title>
@endsection

@section("content")
    <div class="container" style="margin-top: 80px">
        <div class="row">
            @include("profile.sidebar")
            <div class="col-12 col-lg-9">
                <div class="card shadow mt-3">
                    <div class="card-header bg-secondary text-white p-2">
                        <h3 class="mt-1 mb-0 font-14 float-right"><span class="fa-product-hunt text-success"></span> ثبت
                            محصولات</h3>
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
                        <form action="{{route('add_product_action')}}" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">نام کالا</span>
                                        </div>
                                        <input id="product_name" name="name" type="text" class="form-control" value="{{ old("name") }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">قیمت</span>
                                        </div>
                                        <input type="number" id="product_price" name="price" class="form-control" value="{{ old("price") }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">موبایل</span>
                                        </div>
                                        <input type="number" id="product_mobile" name="mobile" class="form-control" value="{{ old("mobile") }}">
                                    </div>
                                </div>


                                <div class="col-12">
                                    <textarea name="desc" id="product_desc" cols="30" rows="7" class="form-control" placeholder="پیام خود را اینجا وارد کنید...">{{ old("product_desc") }}</textarea>
                                </div>


                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">تخفیف</span>
                                        </div>
                                        <input type="text" name="discount" id="product_discount" class="form-control" value="{{ old("discount") }}">
                                    </div>
                                </div>


                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">تعداد</span>
                                        </div>
                                        <input type="text" name="quantity" id="product_quantity" class="form-control" value="{{ old("quantity") }}">
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

                                <div class="col-12 col-lg-4">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file" id="file"
                                                   aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label text-left" for="inputGroupFile01">+ افزودن
                                                عکس</label>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-12 text-left">
                                    <button class="btn btn-primary my-2">ثبت محصول</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                @if(isset($product))
                    <div class="row">
                        <div class="col-12">
                            <h2 class="mt-5">محصولات اخیر</h2>
                            <hr class="my-2">
                        </div>
                            @foreach($product as $item)
                                <div class="col-12 col-lg-6">
                                    <div class="card shadow mt-3">
                                        <div class="row no-gutters">
                                            <div class="col-md-4 d-flex align-self-center">
                                                @if(is_null($item->image))
                                                    <img src="{{ url('/images/about.jpg') }}" class="card-img" alt="No Image">
                                                @else
                                                    <img src="{{ Storage::disk('vms')->url($item['image']) }}" class="card-img" alt="...">
                                                @endif
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-1 font-15 nowrap">@if($item->stock == 1) <span class="badge badge-secondary font-weight-normal">نو</span>  @else <span class="badge badge-secondary font-weight-normal">کارکرده</span>  @endif | {{ $item->product_name }}</h5>
                                                    <p class="card-text mb-1 nowrap">{{ mb_strimwidth($item->product_desc, 0, 30, "...") }}</p>
                                                    <p class="card-text mb-1"><span class="text-muted font-12">قیمت:</span> <span class="font-18">{{ number_format($item->price) }}</span> | <span class="badge badge-danger font-14 font-weight-normal">%{{$item->discount}} تخفیف </span></p>
                                                    <p class="card-text"><span class="text-muted font-12">موجودی:</span> {{$item->quantity}} عدد | <span class="text-muted font-12">تاریخ:</span><span>{{ \Morilog\Jalali\Jalalian::forge($item->created_at)->format("Y/m/d") }}</span></p>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="{{route('delete_product_action' ,$item->id)}}" class="text-danger pl-3">حذف</a>
                                                    <a href="{{route('edit_product' ,$item->id)}}" class="text-warning pl-3">ویرایش</a>
                                                    <a href="{{route('view_product_single' ,$item->id)}}" class="text-success pl-3">مشاهده</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                @endif
            </div>
        </div>
    </div>


@endsection

@section('extra_js')
    <script src="{{url('/js/app_jquery.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('product_desc');
        CKEDITOR.config.autoParagraph = false;
    </script>
@endsection
