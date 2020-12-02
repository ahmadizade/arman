@extends("layouts.master")

@section("title")
    <title>کاربر طلایی | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container">
        <div class="row">
            <div class="col-12">
                <img src="/images/bg/contact.jpg" class="img-fluid" alt="contact">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card shadow mt-3">
                    <div class="card-header p-3">
                        <h3 class="mb-0 font-14 float-right"> فرم ثبت درخواست و پشتیبانی </h3>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <p class="mb-0">
                                            <a href="tel:02172473"><img src="/images/icon/phone-contact.png" alt="phone-contact" class="pl-2">
                                                <span class="pr-1 font-weight-bold font-14">02172473</span>
                                            </a>
                                        </p>
                                        <p style="line-height: 5px"><span class="pr-5">امور اعضا</span></p>
                                        <hr class="mt-4">
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <p class="mb-0">
                                            <a href="tel:02140225160"><img src="/images/icon/phone-contact.png" alt="phone-contact" class="pl-2">
                                                <span class="pr-1 font-weight-bold font-14">02140225160</span>
                                            </a>
                                        </p>
                                        <p style="line-height: 5px"><span class="pr-5">بازرگانی , بازاریابی , حقوقی</span></p>
                                        <hr class="mt-4">
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <p class="mb-0">
                                            <a href="tel:02126205777"><img src="/images/icon/phone-contact.png" alt="phone-contact" class="pl-2">
                                                <span class="pr-1 font-weight-bold font-14">02126205777</span>
                                            </a>
                                        </p>
                                        <p style="line-height: 5px"><span class="pr-5">روابط عمومی , امور مالی</span></p>
                                        <hr class="mt-4">
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <p class="mb-0">
                                            <a href="mailto:info@bazarti.com"><img src="/images/icon/email.png" alt="phone-contact" class="pl-2">
                                                <span class="pr-1 font-weight-bold font-14">info@bazarti.com</span>
                                            </a>
                                        </p>
                                        <p style="line-height: 5px"><span class="pr-5">ایمیل پشتیبانی</span></p>
                                        <hr class="mt-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
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
                            </div>
                        </div>
                        <form method="post" action="{{ route("contact_action") }}">
                                <div class="row">
                                    <div class="input-group">
                                        <div class="col-12 col-lg-6 mt-2">
                                            <input id="name" name="name" value="{{ old("name") }}" class="form-control"
                                                   placeholder="نام و نام خانوادگی">
                                        </div>
                                        <div class="col-12 col-lg-6 mt-2">
                                            <input id="mobile" name="mobile" value="{{ old("mobile") }}" class="form-control"
                                                   placeholder="شماره تماس">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-12 mt-2">
                                        <div class="form-group">
                                            <textarea name="desc" id="desc" cols="30" rows="10"
                                                      class="form-control myfont font-12"
                                                      placeholder="شرح درخواست">{{ old("desc") }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-left">
                                    <button type="submit" name="contact_btn" id=",contact-btn"
                                            class="btn btn-primary btn-sm">ارسال درخواست
                                    </button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
