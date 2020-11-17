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
                        <h3 class="mb-0 font-14 float-right"><i class="text-primary fas fa-gifts"></i> اعتبار فعلی شما : {{number_format(Auth::user()->credit)}}</h3>
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
                                        <input name="credit" type="number" class="form-control"
                                               placeholder="برای مثال  :  1.000.000 ریال"
                                               value="{{ old("credit") }}">
                                    </div>
                                    <div class="form-group mt-2 text-left">
                                        <button class="btn btn-sm btn-primary">پرداخت</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
