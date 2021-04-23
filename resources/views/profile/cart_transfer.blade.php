@extends("layouts.master")

@section("title")
    <title>فرم پرداخت کارت به کارت | فروشگاه سیوسه</title>
@endsection

@section("content")

    <div class="container">
        <div class="row">
           @include("profile.sidebar")
            <div class="col-12 col-lg-9">
                <div class="card shadow mt-3">
                    <div class="card-header p-3">
                        <h3 class="mb-0 font-14 float-right">فرم پرداخت کارت به کارت</h3>
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
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <p>پس از واریز مبلغ دلخواه به یکی از حساب های زیر , فرم را پر نمایید</p>
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <p class="mb-0">
                                            <a href="tel:02126205777"><img src="/images/logo/shahr-bank.png" alt="phone-contact" class="pl-2">
                                                <span class="pr-1 font-weight-bold font-14">02126205777</span>
                                            </a>
                                        </p>
                                        <p style="line-height: 5px"><span class="pr-5">به نام CioCe.ir</span></p>
                                        <hr class="mt-4">
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <p class="mb-0">
                                            <a href="tel:02126205777"><img src="/images/logo/mellat-bank.png" alt="phone-contact" class="pl-2">
                                                <span class="pr-1 font-weight-bold font-14">02126205777</span>
                                            </a>
                                        </p>
                                        <p style="line-height: 5px"><span class="pr-5">به نام CioCe.ir</span></p>
                                        <hr class="mt-4">
                                    </div>
                                </div>
                                <form action="{{ route("profile_cart_transfer_action") }}" method="post">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <select name="bank" class="form-control">
                                                    <option selected disabled value="0">انتخاب بانک</option>
                                                    <option @if(old("bank") == "shahr") selected @endif value="shahr">بانک شهر</option>
                                                    <option @if(old("bank") == "mellat") selected @endif value="mellat">بانک ملت</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="tracking" value="{{ old("tracking") }}" placeholder="شماره رسید">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="amount" value="{{ old("amount") }}" placeholder="مبلغ واریزی به ریال">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="date" value="{{ old("date") }}" placeholder="تاریخ پرداخت مثال 1399/10/10">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="time" value="{{ old("time") }}" placeholder="ساعت پرداخت مثال 12:55">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-12">
                                            <div class="form-group">
                                                <textarea type="text" rows="10" class="form-control" value="{{ old("desc") }}" name="desc" placeholder="توضیحات"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 text-left">
                                            <button class="btn btn-primary">ارسال</button>
                                        </div>
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
