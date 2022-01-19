@extends("layouts.master")

@section("title")
    <title>آرمان | ثبت سفارش در وب سایت</title>
    <style>
        .nice-select{
            width: 100% !important;
        }
        #order-form-blur{
            direction: rtl !important;
            text-align: right !important;
        }
    </style>
@endsection

@section("content")
    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>تسویه حساب</h1>
                <ul>
                    <li><a href="{{route('home')}}">خانه</a></li>
                    <li><a href="{{route('checkout')}}">تسویه حساب</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start About Area -->
    <section class="about-area ptb-70">
        <div class="container">
            @guest
                <div class="row">
                    <div id="table-checkout" class="col-12 col-lg-6 offset-lg-3 mt-2"></div>
                    <div class="col-12 col-lg-12 mt-4 text-center">
                        <a class="btn btn-sm btn-secondary btn-normal-width text-white font-13" href="{{ route("login") }}">ورود / ثبت نام</a>
                    </div>
                </div>
            @else
                <div class="row">
                    <div id="table-checkout" class="col-12 col-lg-7 mt-2"></div>
                    <div class="col-12 col-lg-5 mt-4 text-right">
                        <form id="order-form" class="position-relative">
                            <div class="position-absolute w-100" style="z-index:5" id="result"></div>
                            <div class="row" id="order-form-blur">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="font-12 mb-0">استان<sup class="text-danger font-14">*</sup></label>
                                        <div class="clearfix"></div>
                                        <select style="height: 34px" class="form-control font-12" name="state" onChange="cities(this.value);">
                                            <option @if(isset($profile['profile']['state']) && ($profile['profile']['state'] == "" || $profile['profile']['state'] == 0)) selected @endif value="0">لطفا استان را انتخاب نمایید</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 1) selected @endif value="1">تهران</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 2) selected @endif value="2">گیلان</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 3) selected @endif value="3">آذربایجان شرقی</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 4) selected @endif value="4">خوزستان</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 5) selected @endif value="5">فارس</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 6) selected @endif value="6">اصفهان</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 7) selected @endif value="7">خراسان رضوی</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 8) selected @endif value="8">قزوین</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 9) selected @endif value="9">سمنان</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 10) selected @endif value="10">قم</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 11) selected @endif value="11">مرکزی</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 12) selected @endif value="12">زنجان</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 13) selected @endif value="13">مازندران</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 14) selected @endif value="14">گلستان</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 15) selected @endif value="15">اردبیل</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 16) selected @endif value="16">آذربایجان غربی</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 17) selected @endif value="17">همدان</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 18) selected @endif value="18">کردستان</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 19) selected @endif value="19">کرمانشاه</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 20) selected @endif value="20">لرستان</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 21) selected @endif value="21">بوشهر</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 22) selected @endif value="22">کرمان</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 23) selected @endif value="23">هرمزگان</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 24) selected @endif value="24">چهارمحال و بختیاری</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 25) selected @endif value="25">یزد</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 26) selected @endif value="26">سیستان و بلوچستان</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 27) selected @endif value="27">ایلام</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 28) selected @endif value="28">کهگلویه و بویراحمد</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 29) selected @endif value="29">خراسان شمالی</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 30) selected @endif value="30">خراسان جنوبی</option>
                                            <option @if(isset($profile['profile']['state']) && $profile['profile']['state'] == 31) selected @endif value="31">البرز</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="font-12 mb-0">کد پستی<sup class="text-danger font-14">*</sup></label>
                                        <input name="postal_code" type="text" value="{{ $profile->postal_code ?? '' }}" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="font-12 mb-0">نام<sup class="text-danger font-14">*</sup></label>
                                        <input name="name" type="text" value="{{ $profile->profile->name ?? '' }}" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="font-12 mb-0">نام خانوادگی<sup class="text-danger font-14">*</sup></label>
                                        <input name="family" type="text" value="{{ $profile->profile->family ?? '' }}" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label class="font-12 mb-0">آدرس کامل<sup class="text-danger font-14">*</sup></label>
                                        <textarea name="address" type="text" rows="8" class="form-control form-control-sm">{{ $profile->profile->address ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button id="order-form-submit" class="mr-3 font-13 px-4 py-2">ثبت سفارش</button>
                                    <button id="order-form-submit-online" disabled class="mr-3 font-13 px-4 py-2">ثبت و پرداخت آنلاین سفارش</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </section>
    <!-- End About Area -->

@endsection


@section("extra_js")
    <script src="/js/saman.js"></script>
    <script>
        $(document).ready(function(){

            $("#order-form-submit-online").on("click",function(e){
                $data = $("#order-form").serialize();
                $(this).append("<span class='fa fa-spinner fa-spin font-16 mr-2'></span>");
                $("#order-form-blur").css("filter","blur(3px)");
                $("#order-form input,#order-form textarea,#order-form button,#order-form select").prop("disabled",true);
                $.ajax({
                    type: "POST",
                    url: "{{ route("checkout_order" , ["type" => "online"]) }}",
                    data: $data,
                    success: function (result) {
                        if(result.errors == 1){
                            $("#result").empty();
                            result.result.forEach(function(value,key) {
                                $("#result").append('<div class="mb-1 p-1 alert alert-danger">* '+value+'</div>');
                                if(key == result.length - 1){
                                    $("#result").prepend('<hr>');
                                }
                            });
                            setTimeout(function(){
                                $("#order-form-blur").css("filter","blur(0px)");
                                $("#order-form input,#order-form textarea,#order-form button,#order-form select").prop("disabled",false);
                                $("#order-form-submit").html("ثبت سفارش");
                                $("#result").empty();
                            },3000);
                        }else if(result.errors == 2){
                            alert(result.result);
                            window.location.reload();
                        }else if(result.errors == 0){
                            samanBankPayment(result.result);
                        }
                    }
                });
                e.preventDefault();
            });

            $("#order-form-submit").on("click",function(e){
                $data = $("#order-form").serialize();
                $(this).append("<span class='fa fa-spinner fa-spin font-16 mr-2'></span>");
                $("#order-form-blur").css("filter","blur(3px)");
                $("#order-form input,#order-form textarea,#order-form button,#order-form select").prop("disabled",true);
                $.ajax({
                    type: "POST",
                    url: "{{ route("checkout_order" , ["type" => "offline"]) }}",
                    data: $data,
                    success: function (result) {
                        if(result.errors == 1){
                            $("#result").empty();
                            result.result.forEach(function(value,key) {
                                $("#result").append('<div class="mb-1 p-1 alert alert-danger">* '+value+'</div>');
                                if(key == result.length - 1){
                                    $("#result").prepend('<hr>');
                                }
                            });
                            setTimeout(function(){
                                $("#order-form-blur").css("filter","blur(0px)");
                                $("#order-form input,#order-form textarea,#order-form button,#order-form select").prop("disabled",false);
                                $("#order-form-submit").html("ثبت سفارش");
                                $("#result").empty();
                            },3000);
                        }else if(result.errors == 2){
                            alert(result.result);
                            window.location.reload();
                        }else if(result.errors == 0){
                            window.location.href = "/profile/orders";
                        }
                    }
                });
                e.preventDefault();
            });


            $("body").on("click",".add-minus .plus",function(){
                correctNumber = $(this).parents(".add-minus").children("input").val();
                $(this).parents(".add-minus").children("input").attr("data-value",Number(correctNumber) + 1);
                $.ajax({
                    type: "POST",
                    url: "{{ route("edit_cart")}}",
                    data: {"id": $(this).parents(".add-minus").children("input").attr("data-id"),"count":$(this).parents(".add-minus").children("input").attr("data-value")},
                    success: function (result) {
                        if(result.error == true){
                            alert(result.desc);
                        }
                        showCart();
                    },
                });
            });

            $("body").on("click",".add-minus .minus",function(){
                correctNumber = $(this).parents(".add-minus").children("input").attr("data-value");
                if(correctNumber > 1){
                    $(this).parents(".add-minus").children("input").attr("data-value",Number(correctNumber) - 1);
                    $.ajax({
                        type: "POST",
                        url: "{{ route("edit_cart")}}",
                        data: {"id": $(this).parents(".add-minus").children("input").attr("data-id"),"count":$(this).parents(".add-minus").children("input").attr("data-value")},
                        success: function (result) {
                            if(result.error == true){
                                alert(result.desc);
                            }
                            showCart();
                        },
                    });
                }
            });

            function showCart(){
                $("#table-checkout").html(' <p class="text-center mt-5"><span class="fa fa-spinner fa-spin fa-3x text-danger"></span><br>لطفا صبر کنید</p> ');
                $.ajax({
                    type: "POST",
                    url: "{{ route("show_cart")}}",
                    success: function (result) {
                        $("#table-checkout").html(result);
                    },
                });
            };
            showCart();

        });
    </script>

@endsection
