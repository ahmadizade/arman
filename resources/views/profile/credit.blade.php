@extends("layouts.master")

@section("title")
    <title>خرید اعتبار | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container">
        <div class="row">
            @include("profile.sidebar")
            <div class="col-12 col-lg-9">
                <div class="card shadow mt-3">
                    <div class="card-header p-3">
                        <h3 class="mb-0 font-14 float-right"><i class="text-primary fas fa-gifts"></i> اعتبار فعلی شما
                            : {{number_format(Auth::user()->credit)}}</h3>
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
                            {!! Session::get("status") !!}
                        @endif
                        @if(Session::has("error"))
                            {!! Session::get("error") !!}
                        @endif
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <form action="{{ route("profile_credit_action") }}" method="post">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12"><span
                                                    class="text-primary line-height-0 pl-1 font-15"></span>مبلغ افزایش اعتبار</span>
                                        </div>
                                        <input id="credit" name="credit" type="text" class="form-control number-format"
                                               placeholder="برای مثال  :  1,000,000 ریال"
                                               value="{{ old("credit") }}">
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-8">
                                            <div class="input-group mt-2">
                                                <input type="text" class="form-control words no-outline">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group mt-2 text-left">
                                                <button class="btn btn-sm btn-primary">پرداخت</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if(isset($payments))
                        @foreach($payments as $item)
                            <div class="col-12 col-lg-12">
                                <div class="card shadow mt-3">
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-3 text-center">
                                                <i class="fa fa-credit-card line-height-1 text-primary font-16" aria-hidden="true"></i> مبلغ: {{number_format($item->amount)}} ریال
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3 text-center">
                                                <p class="mb-0"><i class="fa fa-calendar text-primary"></i> تاریخ:
                                                    <span>{{$item->created_at}}</span></p>
                                            </div>
                                            @if($item->status == "SUCCESS")
                                                <div class="col-12 col-md-6 col-lg-3 text-center">
                                                    <p class="mb-0"><i class="fas fa-check text-success"></i><span class="text-success"> موفق </span></p>
                                                </div>
                                            @elseif($item->status == "PENDING")
                                                <div class="col-12 col-md-6 col-lg-3 text-center">
                                                    <p class="mb-0"><i class="fas fa-exclamation-triangle text-danger"></i><span class="text-danger"> نا موفق </span></p>
                                                </div>
                                            @elseif($item->status == "UNVERIFY")
                                                <div class="col-12 col-md-6 col-lg-3 text-center">
                                                    <p class="mb-0"><i class="fas fa-exclamation-triangle text-warning"></i><span class="text-warning"> در انتظار تایید </span></p>
                                                </div>
                                            @endif
                                            <div class="col-12 col-md-6 col-lg-3 text-center">
                                                <p class="mb-0"><i class="fas fa-check text-success"></i> پیگیری: <span class="text-success">{{$item->invoice_number}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="col-12 mt-4 justify-content-center d-flex">
                        {{ $payments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
