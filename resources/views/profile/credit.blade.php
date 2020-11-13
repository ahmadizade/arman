@extends("layouts.master")

@section("title")
    <title>بیوگرافی فروشگاه | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container">
        <div class="row">
           @include("profile.sidebar")
            <div class="col-12 col-lg-9">
                <div class="card shadow mt-3">
                    <div class="card-header p-3">
                        <h3 class="mb-0 font-14 float-right">خرید اعتبار</h3>
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
                            <div class="alert alert-success text-center mb-2">{{ Session::get("status") }}</div>
                        @endif
                            @if(Session::has("error"))
                            <div class="alert alert-danger text-center mb-2">{{ Session::get("error") }}</div>
                        @endif
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <form action="{{ route("profile_credit_action") }}" method="post">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text font-12"><span
                                                                class="text-danger line-height-0 pl-1 font-15">*</span>مبلغ اعتبار</span>
                                            </div>
                                            <input name="credit" type="number" class="form-control"
                                                   value="{{ old("credit") }}">
                                        </div>
                                    <div class="form-group mt-4 text-left">
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
