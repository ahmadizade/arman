@extends("layouts.master")

@section("title")
    <title>سبد خرید | CioCe</title>
@endsection

@section("content")
    <!-- Banner Fixed Background 2-->
    <div class="container">
        <div class="row flex-column rounded justify-content-center align-items-center mx-1"
             style="background: center center url('/images/banner/tablet and others.webp'); height: 250px;background-repeat: no-repeat;background-size: cover;">
            <span class="font-30 text-center mt-3">
                <span class="d-block text-black d-md-inline text-center">CioCe</span>
                <div class="font-15 text-black-50 font-weight-bold">CioCe Web Pack For Everyone</div>
            </span>
        </div>
        <!--< mid shape>-->
        <div class="col-12">
            <div class="mid-shape">
                <div class="mid-shapemask"></div>
                <span><i><a href="index.html"><img class="logo-shape" src="{{url('images/logo/logo50px.png')}}" alt=""></a></i></span>
            </div>
        </div>
        <!--< mid shape>-->
    </div>

    <!-- Main -->
    <div class="container">
        <div class="row">
            @include('profile.sidebar')
            <div class="col-12 col-lg-9">
                @if(Illuminate\Support\Facades\Session::has('product') && !empty(Illuminate\Support\Facades\Session::get('product')))
                    <div class="card shadow mt-3">
                        <div class="card-header bg-primary text-right text-white">
                            سبد خرید شما
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
                                        <div class="col-lg-4 text-md-right text-lg-right">
                                            <p class="font-weight-bold"> مبلغ قابل پرداخت : <span
                                                    class="badge badge-success font-14 font-weight-normal">{{number_format($total_prices) ?? "0 ریال"}} ریال</span>
                                            </p>
                                            <p class=""> موجودی کیف پول : <span
                                                    class="badge badge-danger font-14 font-weight-normal">{{number_format(Auth::user()->credit) ?? "0 ریال"}} ریال</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-4 text-md-center text-lg-center">
                                            <p class="p-0 m-0"><span>تعداد کالا : </span>
                                                <span>{{count(Illuminate\Support\Facades\Session::get('product'))}}</span>
                                                عدد
                                            </p>
                                            <i class="fa fa-shield font-19 text-success" aria-hidden="true"></i>
                                            <p class="m-0 p-0">به همراه گارانتی سلامت فیزیکی</p>
                                        </div>
                                        <div class="col-lg-4 text-md-left text-lg-left">
                                            <a href="{{route('before_buying')}}" class="btn btn-success btn-sm"
                                               type="button"><i
                                                    class="fas fa-shopping-cart text-white font-14 pl-1"></i>تکمیل
                                                فرایند خرید</a>
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
                                                <div class="col-12 col-lg-4">
                                                    <h5 class="card-title mb-1 font-15 nowrap">@if($item->stock == 1)
                                                            <span
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
                                                    <p class="card-text"><span class="text-muted font-12">موجودی:</span> {{$item->quantity}}                                                   عدد |
                                                        <span class="text-muted font-12">تاریخ:</span><span> {{ \Morilog\Jalali\Jalalian::forge($item->created_at)->format("Y/m/d") }} </span>
                                                    </p>
                                                    <p>مبلغ قابل پرداخت :
                                                        <span class="badge badge-success font-14 font-weight-normal">{{number_format($item->price - (($item->price * $item->discount) / 100))}} ریال</span>
                                                    </p>
                                                </div>
                                                <div class="col-12 col-lg-4 text-right">
                                                    <a href="{{route('cart_product_delete' , ['key' => $key])}}" class="badge badge-danger font-14 font-weight-normal p-1"><i class="fa fa-trash" aria-hidden="true"></i>  حذف از سبد خرید</a>
                                                    <p class="mt-1">امتیاز خریدار : {{$item->view}} عدد</p>
                                                    <p>تعداد خرید : {{$item->view}} </p>
                                                    <p>هزینه ارسال : رایگان</p>
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
                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="col-12 text-center">
                                    <img class="img-fluid" src="/images/home/empty-cart.png" alt="سبد خرید خالی است">
                                    <p class="font-16">سبد خرید شما خالی است!</p>
                                    <p>می‌توانید برای مشاهده محصولات بیشتر به صفحات زیر بروید</p>
                                    <p><a class="text-blue-light" href="#">پربازدید ترین ها</a> | <a
                                            class="text-blue-light" href="#">پرفروش ترین ها</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

@endsection
