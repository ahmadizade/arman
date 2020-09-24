@extends("layouts.master")

@section("title")
    <title>بازار تهاتر ایرانیان | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container" style="margin-top: 80px">
        <div class="row">
           @include("profile.sidebar")
            <div class="col-12 col-lg-9">
                <div class="card mt-3">
                    <div class="card-header bg-secondary text-white p-2">
                        <h3 class="mt-1 mb-0 font-14 float-right">تنظیمات کاربری</h3>
                        <div class="float-left">تاریخ ثبت نام: {{ \Morilog\Jalali\Jalalian::forge($user->created_at)->format("Y/m/d ساعت H:i:s") }}</div>
                    </div>
                    <div class="card-body p-2">
                        <h5 class="my-3 text-success">اعتبار فعلی {{ number_format($user->credit) }} ریال</h5>
                        <form action="{{ route("profile_edit") }}" method="post">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                   <div class="input-group my-2">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text font-12">شماره تماس</span>
                                       </div>
                                       <input type="text" class="form-control disabled bg-muted" disabled value="{{ $user->mobile }}">
                                   </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">نوع کاربری</span>
                                        </div>
                                        @if($user->user_mode == "normal")
                                            <input type="text" class="form-control disabled bg-muted" disabled value="کاربر عادی -@if($user->status == "active") فعال @else غیر فعال @endif">
                                        @elseif($user->user_mode == "gold")
                                            <input type="text" class="form-control disabled bg-warning" disabled value="کاربر طلایی -@if($user->status == "active") فعال @else غیر فعال @endif">
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
                                            <option @if($user->profile->gender == "m") selected @endif value="m">آقا</option>
                                            <option @if($user->profile->gender == "f") selected @endif value="f">خانم</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-5">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">نام و نام خانوادگی</span>
                                        </div>
                                        <input type="text" name="name" class="form-control" placeholder="نام و نام خانوادگی" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <input type="text" name="phone" class="form-control my-2" placeholder="شماره تماس" value="{{ $user->profile->phone }}">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <select style="height: 34px;" class="form-control font-12 my-2" name="state" onchange="cities(this.value);">
                                    <option value="0">لطفا استان را انتخاب نمایید</option>
                                    <option selected="" value="1">تهران</option>
                                    <option value="2">گیلان</option>
                                    <option value="3">آذربایجان شرقی</option>
                                    <option value="4">خوزستان</option>
                                    <option value="5">فارس</option>
                                    <option value="6">اصفهان</option>
                                    <option value="7">خراسان رضوی</option>
                                    <option value="8">قزوین</option>
                                    <option value="9">سمنان</option>
                                    <option value="10">قم</option>
                                    <option value="11">مرکزی</option>
                                    <option value="12">زنجان</option>
                                    <option value="13">مازندران</option>
                                    <option value="14">گلستان</option>
                                    <option value="15">اردبیل</option>
                                    <option value="16">آذربایجان غربی</option>
                                    <option value="17">همدان</option>
                                    <option value="18">کردستان</option>
                                    <option value="19">کرمانشاه</option>
                                    <option value="20">لرستان</option>
                                    <option value="21">بوشهر</option>
                                    <option value="22">کرمان</option>
                                    <option value="23">هرمزگان</option>
                                    <option value="24">چهارمحال و بختیاری</option>
                                    <option value="25">یزد</option>
                                    <option value="26">سیستان و بلوچستان</option>
                                    <option value="27">ایلام</option>
                                    <option value="28">کهگلویه و بویراحمد</option>
                                    <option value="29">خراسان شمالی</option>
                                    <option value="30">خراسان جنوبی</option>
                                    <option value="31">البرز</option>
                                </select>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">شماره کارت</span>
                                        </div>
                                        <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="input-group my-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">شبا</span>
                                        </div>
                                        <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                                    </div>
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
    <script src="{{url('/js/app_jquery.js')}}"></script>
@stop
