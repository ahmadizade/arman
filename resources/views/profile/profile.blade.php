@extends("layouts.master")

@section("title")
    <title>پروفایل کاربری | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container mt-3">
        <div class="row">
            @include("profile.sidebar")
            <div class="col-12 col-lg-9">
                <div class="card shadow mt-3">
                    <div class="card-header p-3">
                        <h3 class="mt-1 mb-0 font-14 float-right">تنظیمات کاربری</h3>
                        <div class="float-left">تاریخ ثبت
                            نام: {{ \Morilog\Jalali\Jalalian::forge($user->created_at)->format("Y/m/d ساعت H:i:s") }}</div>
                    </div>
                    <div class="card-body p-3">
                        <h5 class="my-3 text-success">اعتبار فعلی {{ number_format($user->credit) }} ریال</h5>
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
                        <form action="{{ route("profile_edit_action") }}" method="post">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">موبایل</span>
                                        </div>
                                        <input type="text" class="form-control disabled bg-muted" disabled
                                               value="{{ $user->mobile }}">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">نوع کاربری</span>
                                        </div>
                                        @if($user->user_mode == "gold")
                                            <input type="text" class="form-control disabled bg-warning" disabled
                                                   value="کاربر طلایی">
                                        @else
                                            <input type="text" class="form-control disabled bg-muted" disabled
                                                   value="کاربر عادی">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">ایمیل</span>
                                        </div>
                                        <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">جنسیت</span>
                                        </div>
                                        <select class="form-control" name="sex" id="sex">
                                            <option @if($user->profile->gender == "m") selected @endif value="m">آقا
                                            </option>
                                            <option @if($user->profile->gender == "f") selected @endif value="f">خانم
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-5">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">نام و نام خانوادگی</span>
                                        </div>
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">تلفن ثابت</span>
                                        </div>
                                        <input type="text" name="phone" class="form-control"
                                               value="{{ $user->profile->phone }}">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">استان</span>
                                        </div>
                                        <select style="height: 34px;" class="form-control font-12" name="state"
                                                onchange="cities(this.value);">
                                            <option @if($user->profile->city_code == 0) selected @endif value="0">لطفا
                                                استان را انتخاب نمایید
                                            </option>
                                            <option @if($user->profile->city_code == 1) selected @endif value="1">
                                                تهران
                                            </option>
                                            <option @if($user->profile->city_code == 2) selected @endif value="2">
                                                گیلان
                                            </option>
                                            <option @if($user->profile->city_code == 3) selected @endif value="3">
                                                آذربایجان شرقی
                                            </option>
                                            <option @if($user->profile->city_code == 4) selected @endif value="4">
                                                خوزستان
                                            </option>
                                            <option @if($user->profile->city_code == 5) selected @endif value="5">فارس
                                            </option>
                                            <option @if($user->profile->city_code == 6) selected @endif value="6">
                                                اصفهان
                                            </option>
                                            <option @if($user->profile->city_code == 7) selected @endif value="7">خراسان
                                                رضوی
                                            </option>
                                            <option @if($user->profile->city_code == 8) selected @endif value="8">
                                                قزوین
                                            </option>
                                            <option @if($user->profile->city_code == 9) selected @endif value="9">
                                                سمنان
                                            </option>
                                            <option @if($user->profile->city_code == 10) selected @endif value="10">قم
                                            </option>
                                            <option @if($user->profile->city_code == 11) selected @endif value="11">
                                                مرکزی
                                            </option>
                                            <option @if($user->profile->city_code == 12) selected @endif value="12">
                                                زنجان
                                            </option>
                                            <option @if($user->profile->city_code == 13) selected @endif value="13">
                                                مازندران
                                            </option>
                                            <option @if($user->profile->city_code == 14) selected @endif value="14">
                                                گلستان
                                            </option>
                                            <option @if($user->profile->city_code == 15) selected @endif value="15">
                                                اردبیل
                                            </option>
                                            <option @if($user->profile->city_code == 16) selected @endif value="16">
                                                آذربایجان غربی
                                            </option>
                                            <option @if($user->profile->city_code == 17) selected @endif value="17">
                                                همدان
                                            </option>
                                            <option @if($user->profile->city_code == 18) selected @endif value="18">
                                                کردستان
                                            </option>
                                            <option @if($user->profile->city_code == 19) selected @endif value="19">
                                                کرمانشاه
                                            </option>
                                            <option @if($user->profile->city_code == 20) selected @endif value="20">
                                                لرستان
                                            </option>
                                            <option @if($user->profile->city_code == 21) selected @endif value="21">
                                                بوشهر
                                            </option>
                                            <option @if($user->profile->city_code == 22) selected @endif value="22">
                                                کرمان
                                            </option>
                                            <option @if($user->profile->city_code == 23) selected @endif value="23">
                                                هرمزگان
                                            </option>
                                            <option @if($user->profile->city_code == 24) selected @endif value="24">
                                                چهارمحال و بختیاری
                                            </option>
                                            <option @if($user->profile->city_code == 25) selected @endif value="25">
                                                یزد
                                            </option>
                                            <option @if($user->profile->city_code == 26) selected @endif value="26">
                                                سیستان و بلوچستان
                                            </option>
                                            <option @if($user->profile->city_code == 27) selected @endif value="27">
                                                ایلام
                                            </option>
                                            <option @if($user->profile->city_code == 28) selected @endif value="28">
                                                کهگلویه و بویراحمد
                                            </option>
                                            <option @if($user->profile->city_code == 29) selected @endif value="29">
                                                خراسان شمالی
                                            </option>
                                            <option @if($user->profile->city_code == 30) selected @endif value="30">
                                                خراسان جنوبی
                                            </option>
                                            <option @if($user->profile->city_code == 31) selected @endif value="31">
                                                البرز
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">شماره کارت</span>
                                        </div>
                                        <input type="text" name="bank_cart_number" class="form-control"
                                               value="{{ $user->profile->bank_cart_number }}">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">شبا بدون IR</span>
                                        </div>
                                        <input type="text" name="sheba" class="form-control"
                                               value="{{ $user->profile->sheba }}">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12">
                                    <p class="mb-0 my-2"><a id="change-password" href="">تغیییر رمز عبور</a></p>
                                    <div id="change-password-input" class="input-group my-2 d-none">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">رمز عبور</span>
                                        </div>
                                        <input type="text" name="password" autocomplete="off"
                                               class="form-control ltr text-center"
                                               placeholder="رمز عبور درخواستی خود را وارد نمایید">
                                    </div>
                                </div>
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
    <script>
        $("#change-password").on("click", function (e) {
            $(this).remove();
            $("#change-password-input").removeClass("d-none");
            e.preventDefault();
        })
    </script>
@endsection
