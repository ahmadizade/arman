@extends("layouts.master")

@section("title")
    <title>پیشخوان | ثمین تخفیف</title>
@endsection
@section("extra_css")
    <link rel="stylesheet" href="/css/chart.css">
@endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <img src="/images/banner/samin-bag.png" class="img-fluid" alt="about" style="background-position: left">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @include("profile.sidebar")
            <div class="col-12 col-lg-9 mt-3">
                <div class="card shadow">
                    <div class="card-header p-3 bg-primary text-white">
                        <h3 class="mb-0 font-14 float-right"><i class="text-white fas fa-gifts"></i> فروشگاه :
                            @if (isset($store))
                            {{$store->shop}}
                            @else
                            متاسفانه فروشگاهی ثبت نشده
                            @endif
                        </h3>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-12 col-lg-3 text-center mt-2">
                                <div>
                                    <p class="font-13 font-weight-bold border-top pt-2">پسند شده</p>

                                    <p class="font-16 font-weight-bold border-bottom pb-2">{{$like ?? "0"}} <i class="fas fa-heart font-12" aria-hidden="true"></i></p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 text-center mt-2">
                                <div>
                                    <p class="font-13 font-weight-bold border-top pt-2">
                                        دیده شده</p>
                                    <p class="font-16 font-weight-bold border-bottom pb-2">120 <i class="fa fa-eye font-14" aria-hidden="true"></i>
                                    </p></div>
                            </div>
                            <div class="col-12 col-lg-3 text-center mt-2">
                                <div>
                                    <p class="font-13 font-weight-bold border-top pt-2">تخفیف فروشگاه</p>
                                    <p class="font-16 font-weight-bold border-bottom pb-2">{{$store->discount ?? "0"}} <i class="fa fa-percent font-13" aria-hidden="true"></i></p></div>
                            </div>
                            <div class="col-12 col-lg-3 text-center mt-2">
                                <div>
                                        <p class="font-13 font-weight-bold border-top pt-2">وضعیت من</p>
                                    @if($user->user_mode == "gold")
                                        <p class="font-14 border-bottom pb-2 font-weight-bold">کاربر طلایی <i class="far fa-smile font-15 text-warning" aria-hidden="true"></i></p></div>
                                    @elseif($user->user_mode == "normal")
                                        <p class="font-14 border-bottom pb-2 font-weight-bold">کاربر معمولی <i class="far fa-meh font-15" aria-hidden="true"></i></p></div>
                                    @endif
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mt-3">
                    <div class="card-header p-3 bg-primary text-white">
                        <h3 class="mb-0 font-14 float-right"><i class="fa fa-credit-card" aria-hidden="true"></i> مالی و اعتبارات
                        </h3>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-12 col-lg-3 text-center mt-2">
                                <div>
                                    <p class="font-13 font-weight-bold border-top pt-2">مبلغ آخرین پرداخت من</p>

                                    <p class="font-16 font-weight-bold border-bottom pb-2">{{number_format($user->credit) ?? "0"}} <i class="fas fa-credit-card font-12" aria-hidden="true"></i></p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 text-center mt-2">
                                <div>
                                    <p class="font-13 font-weight-bold border-top pt-2">
                                        فاکتورها</p>
                                    <p class="font-16 font-weight-bold border-bottom pb-2">120 <i class="fas fa-mail-bulk font-14" aria-hidden="true"></i>
                                    </p></div>
                            </div>
                            <div class="col-12 col-lg-3 text-center mt-2">
                                <div>
                                    <p class="font-13 font-weight-bold border-top pt-2">تخفیف فروشگاه</p>
                                    <p class="font-16 font-weight-bold border-bottom pb-2">{{$store->discount ?? "0"}} <i class="fa fa-percent font-13" aria-hidden="true"></i></p></div>
                            </div>
                            <div class="col-12 col-lg-3 text-center mt-2">
                                <div>
                                    <p class="font-13 font-weight-bold border-top pt-2">اعتبار من</p>
                                    <p class="font-16 font-weight-bold border-bottom pb-2 text-success">{{number_format($user->credit) ?? "0"}} <i class="fa fa-credit-card font-13" aria-hidden="true"></i></p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row flex-column justify-content-center align-items-center h-100 py-3"
             style="background: fixed center center url('/images/home/pattern-off.jpg'); height: 250px;">
            <span class="font-30 font-weight-bold py-3 px-5 rounded-sm mt-3 ">
                <img src="{{ asset('images/logo/logo_100_50.png') }}" alt="logo"
                     class="img-fluid d-block d-md-inline mx-a">
                <span class="d-block d-md-inline text-center">بازار تهاتر ایرانیان</span>
                <div class="font-20 text-orange font-weight-bold bg-white py-1 px-5 rounded-sm mt-2 shadow-sm">اولین و تنها بازار تهاتری در ایران</div>
            </span>
        </div>
    </div>
@endsection
