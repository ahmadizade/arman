@extends("layouts.master")

@section("title")
        <title>سی و سه | صاحب این سایت کیه</title>
        <meta name="description" content="پیدا کردن صاحب وبسایت،این وب سایت مال کیه؟ آدرس سایت بنویس و اطلاعات صاحبشو بگیر،ایمیلاشو پیدا کن">
        <meta name="robots" content="all">
        <meta property="og:title" content="سی و سه | صاحب این سایت کیه؟">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:site_name" content="پیدا کردن صاحب وبسایت،این وب سایت مال کیه؟ آدرس سایت بنویس و اطلاعات صاحبشو بگیر،ایمیلاشو پیدا کن">
        <meta property="og:image" content="/img/home/logo.png">
@endsection

@section("content")
<!-- Start main-content -->
    <main class="main-content dt-sl mb-3">
        <div class="page-cover mb-2">
            <div class="page-cover-title">
                <h1>پیدا کردن صاحب سایت</h1>
                <p>این بخش صرفاً در جهت افزایش کارایی و رشد ارتباطات وب سایت شما ایجاد گردیده است</p>
                <div class="form-ui">
                    <form action="{{route('domain_search_action')}}" method="post">
                        <div class="form-row">
                            <input id="domain" name="domain" type="text" class="input-ui pr-2" placeholder="آدرس سایت خود را اینجا وارد کنید">
                            <button id="domain_search_btn" class="btn btn-info">جستجو</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container main-container">
            <div class="row">
                    <div class="page info-page-cats dt-sl dt-sn pt-3 pb-2">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="section-title title-wide no-title-wide-before mb-1 no-after-title-wide mt-5">
                                    <img src="/img/faq/question.svg" width="30" alt="">
                                    <h2 class="font-weight-bold">چطور میتونم صاحب سایت و ارتباطش با سایت های دیگرو پیدا کنم؟</h2>
                                    <p>فقط کافیه که آدرس سایت خودتو تو کادر بالا بنویسی و دکمه جستجو رو بزنی</p>
                                </div>
                                <div class="content-faq-question">
                                    <p class="text-justify">همچنین در این بخش می توانید ایمیل های اصلی سایت جستجو شده را ببینید و متوجه شوید که این ایمیل ها در چه سایت هایی عضو هستند، درواقع شما متوجه ارتباطات آن سایت با دیگر وب سایت ها و کمپانی ها می شوید، اینجوری تو هم می تونی از اون سایت ها و روابط اونا برای رشد کسب و کار خودت استفاده کنی.</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <img src="/img/banner/wat-is-een-domeinnaam.png">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <img src="/img/banner/afloopt.png">
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="section-title title-wide no-title-wide-before mb-1 no-after-title-wide mt-5">
                                    <img src="/img/faq/question.svg" width="30" alt="">
                                    <h2 class="font-weight-bold">بدست آوردن نام و نام خانوادگی صاحب وب سایت؟</h2>
                                    <p>بدست آوردن ارتباط سایت ها با یکدیگر</p>
                                </div>
                                <div class="content-faq-question">
                                    <p class="text-justify">برای بدست آوردن نام و نام خانوادگی صاحب وب سایت شما باید عضو سایت شوید و امتیاز شما در وب سایت ما بیش از 400 امتیاز باشد، درضمن زمانی که صاحب آن سایت اطلاعات شخصی خود را در بانک دامنه های ملی ثبت کرده باشد ما قادر به دریافت اطلاعات وی خواهیم بود، در غیر اینصورت می توانیم اطلاعاتی مثل ایمیل های اصلی آن وب سایت و اینکه با آن ایمیل ها در چه سایت هایی عضو شده اند را برای شما بدست آورده و نمایش دهیم.</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="section-title title-wide no-title-wide-before mb-1 no-after-title-wide mt-5">
                                    <img src="/img/faq/question.svg" width="30" alt="">
                                    <h2 class="font-weight-bold">پیدا کردن نام و نام خانوادگی صاحب ایمیل؟</h2>
                                    <p>فقط کافیه که به صفحه جستجوی صاحب ایمیل رفته و ایمیل را وارد کنید</p>
                                </div>
                                <div class="content-faq-question">
                                    <p class="text-justify">ما اطلاعاتی نظیر نام و نام خانوادگی صاحب ایمیل، ارتباطات وی در دنیای مجازی و... را به شما نمایش خواهیم داد، البته که برای روعیت نام و نام خانوادگی با عضو سایت ما باشید و امتیاز شما در سایت ما بالای 400 امتیاز باشد، این بدین معناست که شما همراه همره ما و ما نیز خدمتگذار شما هستیم.</p>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-6">
                                <img src="/img/banner/registratie.png">
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </main>
<!-- End main-content -->

@endsection

@section('extra_js')
{{--    <script>--}}
{{--        $('#domain_search_btn').click(function(e){--}}
{{--            e.preventDefault();--}}
{{--           $.ajax({--}}
{{--               url : "{{route('domain_search_action')}}",--}}
{{--               type : "POST",--}}
{{--               data : {"domain" : $('#domain').val()},--}}
{{--               success : function (data){--}}
{{--                   console.log(data);--}}
{{--                   if (data.status == "0") {--}}
{{--                       Swal.fire({--}}
{{--                           position: 'top-end',--}}
{{--                           toast: true,--}}
{{--                           icon: 'error',--}}
{{--                           title : "Support-Team",--}}
{{--                           text: data.desc,--}}
{{--                           footer : 'احتمالا آدرس وب سایت مورد نظر خود را به اشتباه وارد کرده اید',--}}
{{--                           showConfirmButton: false,--}}
{{--                           timer: 5000--}}
{{--                       });--}}
{{--                   }--}}
{{--                   if (data.status == "1") {--}}

{{--                       // if (data.result !== null) {--}}
{{--                       //--}}
{{--                       // }--}}
{{--                   }--}}
{{--               }--}}
{{--           });--}}
{{--        });--}}
{{--    </script>--}}
@endsection
