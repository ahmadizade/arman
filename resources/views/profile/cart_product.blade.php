@extends("layouts.master")

@section("title")
    <title>سبد خرید | CioCe</title>
@endsection

@section("content")

    <!-- Header -->
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                <img src="/images/bg/about.jpg" class="img-fluid" alt="about">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- Main -->
    <div class="container">
        <div class="row">
            @include('profile.sidebar')
            <div class="col-12 col-lg-9">
                @if(Illuminate\Support\Facades\Session::has('product') && !empty(Illuminate\Support\Facades\Session::get('product')))
                    <div class="card shadow mt-3">
                        <div class="card-header bg-primary text-right text-white">
                            <p class="p-0 m-0"><span>تعداد کالا : </span>
                                <span>
                                    {{count(Illuminate\Support\Facades\Session::get('product'))}}
                                </span>
                                 عدد
                            </p>
                        </div>
                        <div class="card-body p-3 text-justify">
                            @if(Session::has("status"))
                                <div class="alert text-center alert-success mb-2">{{ Session::get("status") }}</div>
                            @elseif(Session::has("error"))
                                <div class="alert text-center alert-danger mb-2">{{ Session::get("error") }}</div>
                            @endif
                            <!-- Content -->
                                <div class="col-12">
                                    <div class="card shadow-sm mt-3">
                                        <div class="card-body row">
                                            <div class="col-lg-4">
{{--                                                <div style="display: none">--}}
{{--                                                    {{ $price = 0 }}--}}
{{--                                                </div>--}}
{{--                                                <div style="display: none">{{$price += $item->price}}</div>--}}
                                                <p class="font-weight-bold">  مبلغ قابل پرداخت : <span class="badge badge-danger font-14 font-weight-normal">{{number_format($total_prices) ?? "0 ریال"}} ریال</span></p>
                                                <p class="">  موجودی من : <span class="badge font-14 font-weight-normal">{{number_format(Auth::user()->credit) ?? "0 ریال"}} ریال</span></p>
                                                <button class="btn btn-success btn-sm" type="button"><i class="fas fa-shopping-cart text-white font-14 pl-1"></i>تکمیل فرایند خرید</button>
                                            </div>
                                            <div class="col-lg-4">

                                            </div>
                                            <div class="col-lg-4">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            @foreach(Illuminate\Support\Facades\Session::get('product') as $key => $item)
                                    <div class="col-12 col-lg-12">
                                            <div class="card shadow-sm mt-3">
                                                    <div class="col-12">
                                                        <div class="card-body row">
                                                            <div class="col-12 col-lg-4">
                                                                @if(is_null($item->image))
                                                                    <img src="/images/no-image2.png" class="card-img"
                                                                         alt="No Image">
                                                                @else
                                                                    <img src="{{ Storage::disk('vms')->url($item['image']) }}"
                                                                         class="img-fluid"
                                                                         alt="...">
                                                                @endif
                                                            </div>
                                                            <div class="col-12 col-lg-8">
                                                                <h5 class="card-title mb-1 font-15 nowrap">@if($item->stock == 1) <span
                                                                            class="badge badge-secondary font-weight-normal">نو</span>  @else
                                                                        <span
                                                                                class="badge badge-secondary font-weight-normal">کارکرده</span>  @endif
                                                                    | {{ $item->product_name }}</h5>
                                                                <p class="card-text mb-1"><span
                                                                            class="text-muted font-12">قیمت:</span>
                                                                    <span class="font-18">{{ number_format($item->price) }}</span>
                                                                    @if($item->discount > 20) |
                                                                    <span class="badge badge-danger font-14 font-weight-normal">%{{$item->discount - 20}} تخفیف </span>
                                                                    @endif
                                                                </p>
                                                                <p class="card-text"><span
                                                                            class="text-muted font-12">موجودی:</span> {{$item->quantity}}
                                                                    عدد |
                                                                    <span
                                                                            class="text-muted font-12">تاریخ:</span><span> {{ \Morilog\Jalali\Jalalian::forge($item->created_at)->format("Y/m/d") }} </span>
                                                                </p>
                                                                    <a href="{{route('cart_product_delete' , ['key' => $key])}}" type="button" class="btn btn-danger btn-sm">حذف</a>
                                                                    <a href="#" type="button" class="btn btn-success btn-sm">مشاهده</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                               </div>
                                            </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="card shadow mt-3">
                        <img style="max-height: 400px;" class="img-fluid" src="{{url('/images/banner/Retainful-plugin-8.png')}}">
                    </div>
                @endif

            </div>
        </div>
    </div>

@endsection
