@extends("layouts.master")

@section("title")
    <title>armanmask.ir | سبد خرید</title>
@endsection

@section("content")

    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>تکمیل سفارش</h1>
                <ul>
                    <li><a href="{{route('home')}}">خانه</a></li>
                    <li>سبد خرید</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start Track Order Area -->
    <section class="track-order-area ptb-70">
        <div class="container">
            @if(\Illuminate\Support\Facades\Session::has('shipping') && count(\Illuminate\Support\Facades\Session::get('shipping')) > 0)
                @auth()
                    <div class="track-order-content">
                        <form id="shipping_form">
                            <div class="form-group">
                                <label>شماره تماس</label>
                                <input readonly type="text" name="mobile" value="{{\Illuminate\Support\Facades\Auth::user()->mobile ?? ""}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>آدرس</label>
                                <input type="text" name="address" value="{{\Illuminate\Support\Facades\Auth::user()->profile->address ?? ""}}" class="form-control">
                            </div>

                            <button id="shipping_form_btn" type="submit" class="default-btn">انتقال به بانک</button>
                        </form>
                    </div>
               @endauth
                @guest()
                    <div class="track-order-content mb-5">
                        <div class="row">
                            <div class="col-4 position-relative">
                                <span id="mobile_img" class="steps step-active">
                                    <img src="/img/extra/mobile.png" class="img-fluid" title="mobile">
                                </span>
                                <span class="line1 d-none"></span>
                            </div>
                            <div class="col-4 position-relative">
                                <span id="user_img" class="steps">
                                    <img src="/img/extra/user.png" class="img-fluid" title="user">
                                </span>
                                <span class="line2 d-none"></span>
                            </div>
                            <div class="col-4 position-relative">
                                <span id="address_img" class="steps">
                                    <img src="/img/extra/address.png" class="img-fluid" title="address">
                                </span>
                            </div>
                        </div>
                        <div class="mt-5">
                             <form id="get_auth_code">
                                <div class="form-group">
                                    <label>شماره همراه<span class="text-danger px-2">*</span></label>
                                    <input type="text" id="mobile" name="mobile" placeholder="شماره موبایل خود را وارد نمایید" class="form-control">
                                </div>
                                <button id="get_auth_code_btn" type="submit" class="default-btn">دریافت کد</button>
                            </form>

                             <form id="check_auth_code" class="d-none">
                                <div class="form-group">
                                    <label>ارسال کد 5 رقمی<span class="text-danger px-2">*</span></label>
                                    <input type="text" id="code" name="code" placeholder="کد ارسال شده به موبایل خود را وارد نمایید" class="form-control">
                                </div>
                                <button id="check_auth_code_btn" type="submit" class="default-btn">تایید کد</button>
                            </form>

                             <form id="user_information_form" class="d-none">
                                <div class="form-group">
                                    <label>نام<span class="text-danger px-2">*</span></label>
                                    <input type="text" id="name" name="name" placeholder="نام خود را وارد نمایید" class="form-control">
                                </div>
                                 <div class="form-group mt-3">
                                    <label>نام خانوادگی<span class="text-danger px-2">*</span></label>
                                    <input type="text" id="family" name="family" placeholder="نام خانوادگی خود را وارد نمایید" class="form-control">
                                 </div>
                                 <div class="form-group mt-3">
                                    <label>آدرس<span class="text-danger px-2">*</span></label>
                                    <input type="text" id="address" name="address" placeholder="محصول شما به این آدرس ارسال خواهد شد" class="form-control">
                                 </div>
                                <button id="user_information_btn" type="submit" class="default-btn mt-3">ورود به درگاه بانک</button>
                            </form>
                        </div>
                    </div>
               @endguest
            @endif
        </div>
    </section>
    <!-- End Track Order Area -->

    @include('partials.loader')
@endsection
@section('extra_js')
    <script>
        $( document ).ready(function() {

            $('body').on('click','#shipping_form_btn',function (e){
                e.preventDefault();

                    $ .ajax({
                        url : "{{route('shipping_action')}}",
                        type : "POST",
                        data : $('#shipping_form').serialize(),
                        success : function (data) {
                            console.log(data);
                            if(data.status == "0") {
                                Swal.fire({
                                    position: 'top-end',
                                    toast: true,
                                    icon: 'error',
                                    title: 'فروشگاه آرمان ماسک',
                                    text: data.desc,
                                    showConfirmButton: false,
                                    timer: 6000
                                });
                            };

                            if(data.status == "1") {
                                Swal.fire({
                                    position: 'top-end',
                                    toast: true,
                                    icon: 'success',
                                    title: 'فروشگاه آرمان ماسک',
                                    text: data.desc,
                                    footer: 'همکاران ما در کوتاه ترین زمان با شما تماس خواهند گرفت',
                                    showConfirmButton: false,
                                    timer: 4000
                                });
                            };
                        }
                    });

            });

            $('body').on('click','#get_auth_code_btn',function (e) {
                e.preventDefault();
                $("#get_auth_code_btn").html("<span class='fas fa-spinner fa-pulse'></span>درحال ارسال ");

                $.ajax({
                    url: "{{route('shipping_register_action')}}",
                    type: "POST",
                    data: $('#get_auth_code').serialize(),
                    success: function (data) {

                        console.log(data);
                        if(data.status == "0") {
                            $("#get_auth_code_btn").html("<span  class='fa fa-exclamation-triangle'></span> ارسال نشد");
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'error',
                                title: 'فروشگاه آرمان ماسک',
                                text: data.desc,
                                footer: "لطفا ابتدا وارد حساب کاربری خود شوید",
                                showConfirmButton: false,
                                timer: 6000
                            });
                        };

                        if(data.status == "1") {
                            $("#get_auth_code").addClass('d-none');
                            $("#check_auth_code").removeClass('d-none');
                            $(".line1").removeClass('d-none');
                            $("#mobile_img").removeClass('step-active');
                            $("#user_img").addClass('step-active');
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'success',
                                text: data.desc,
                                showConfirmButton: false,
                                timer: 4000
                            });
                        };

                    }
                });
                $("#get_auth_code_btn").html("دریافت کد");
            });


            $(function(){
                var number=0;
                $('body').on('keyup','#code',function () {
                    number++;
                    if(number==4){
                        $.ajax({
                            url: "{{route('shipping_verified_code_action')}}",
                            type: "POST",
                            data: {'code' : $('#code').val() , 'mobile' : $('#mobile').val()},
                            success: function (data) {

                                console.log(data);
                                if(data.status == "0") {
                                    $("#check_auth_code_btn").html("<span  class='fa fa-exclamation-triangle'></span> تایید نشد");
                                    Swal.fire({
                                        position: 'top-end',
                                        toast: true,
                                        icon: 'error',
                                        title: 'فروشگاه آرمان ماسک',
                                        text: data.desc,
                                        showConfirmButton: false,
                                        timer: 6000
                                    });
                                };

                                if(data.status == "1") {
                                    $("#check_auth_code").addClass('d-none');
                                    $("#user_information_form").removeClass('d-none');
                                    $(".line2").removeClass('d-none');
                                    $("#user_img").removeClass('step-active');
                                    $("#address_img").addClass('step-active');
                                    Swal.fire({
                                        position: 'top-end',
                                        toast: true,
                                        icon: 'success',
                                        text: data.desc,
                                        showConfirmButton: false,
                                        timer: 4000
                                    });
                                };

                            }
                        });
                    }
                });
            });


            $('body').on('click','#check_auth_code_btn',function (e) {
                e.preventDefault();
                $("#check_auth_code_btn").html("<span class='fas fa-spinner fa-pulse'></span>درحال بررسی ");

                $.ajax({
                    url: "{{route('shipping_verified_code_action')}}",
                    type: "POST",
                    data: {'code' : $('#code').val() , 'mobile' : $('#mobile').val()},
                    success: function (data) {

                        console.log(data);
                        if(data.status == "0") {
                            $("#check_auth_code_btn").html("<span  class='fa fa-exclamation-triangle'></span> تایید نشد");
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'error',
                                title: 'فروشگاه آرمان ماسک',
                                text: data.desc,
                                showConfirmButton: false,
                                timer: 6000
                            });
                        };

                        if(data.status == "1") {
                            $("#check_auth_code").addClass('d-none');
                            $("#user_information_form").removeClass('d-none');
                            $(".line2").removeClass('d-none');
                            $("#user_img").removeClass('step-active');
                            $("#address_img").addClass('step-active');
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'success',
                                text: data.desc,
                                showConfirmButton: false,
                                timer: 4000
                            });
                        };

                    }
                });
                $("#check_auth_code_btn").html("تایید کد");
            });


            $('body').on('click','#user_information_btn',function (e) {
                e.preventDefault();
                $("#user_information_btn").html("<span class='fas fa-spinner fa-pulse'></span>درحال بررسی ");

                $.ajax({
                    url: "{{route('shipping_signup')}}",
                    type: "POST",
                    data: {'mobile' : $('#mobile').val(), 'name' : $('#name').val(), 'family' : $('#family').val(), 'address' : $('#address').val(), },
                    success: function (data) {

                        console.log(data);
                        if(data.status == "0") {
                            $("#user_information_btn").html("<span  class='fa fa-exclamation-triangle'></span> ثبت نشد");
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'error',
                                title: 'فروشگاه آرمان ماسک',
                                text: data.desc,
                                footer : "اطلاعات خود را با دقت وارد فرمایید",
                                showConfirmButton: false,
                                timer: 6000
                            });
                        };

                        if(data.status == "1") {
                            $("#user_information_form").addClass('d-none');
                            $("#user_information_form").removeClass('d-none');
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'success',
                                text: data.desc,
                                showConfirmButton: false,
                                timer: 4000
                            });
                        };

                    }
                });
                $("#user_information_btn").html("<span class='fas fa-spinner fa-pulse'></span>در حال انتقال ");

            });


        });
    </script>
@endsection
