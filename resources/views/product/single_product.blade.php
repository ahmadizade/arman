@extends("layouts.master")

@section("title")
    @if (isset($product))
        <title>{{$product->product_name}} | CioCe.ir</title>
    @endif
@endsection

@section("content")
    @if(isset($product))
    <!-- Start main-content -->
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <!-- Start title - breadcrumb -->
            <div class="title-breadcrumb-special dt-sl mb-3">
                <div class="breadcrumb dt-sl">
                    <nav>
                        <a href="#">{{$product->category->name}}</a>
                        <a href="#">{{$product->product_name}}</a>
                        <a href="#">{{$product->slug}}</a>
                    </nav>
                </div>
            </div>
            <!-- End title - breadcrumb -->

            <!-- Start Product -->
            <div class="dt-sn mb-5 dt-sl">
                <div class="row">
                    <!-- Product Gallery-->
                    <div class="col-lg-4 col-md-6 ps-relative">
                        <!-- Product Options-->
                        <ul class="gallery-options">
                            <li>
                                <button class="add-favorites"><i class="mdi mdi-heart"></i></button>
                                <span class="tooltip-option">افزودن به علاقمندی</span>
                            </li>
                        </ul>
                        <div class="product-timeout position-relative pt-5 mb-3">
                            <div class="promotion-badge">
                                کالای ویژه
                            </div>
{{--                            <div class="countdown-timer" countdown data-date="10 24 2019 20:20:22">--}}
{{--                                <span data-days>0</span>:--}}
{{--                                <span data-hours>0</span>:--}}
{{--                                <span data-minutes>0</span>:--}}
{{--                                <span data-seconds>0</span>--}}
{{--                            </div>--}}
                        </div>
                        <div class="product-gallery">
                            <span class="badge">پر فروش</span>
                            <div class="product-carousel owl-carousel">
                                <div class="item">
                                    <a class="gallery-item" href="/img/single-product/thumbnail-1.jpg"
                                        data-fancybox="gallery1" data-hash="one">
                                        <img src="/uploads/thumbnail/{{$product->thumbnail}}" alt="Product">
                                    </a>
                                </div>
                                <div class="item">
                                    <a class="gallery-item" href="/img/single-product/thumbnail-2.jpg"
                                        data-fancybox="gallery1" data-hash="two">
                                        <img src="/img/single-product/thumbnail-2.jpg" alt="Product">
                                    </a>
                                </div>
                                <div class="item">
                                    <a class="gallery-item" href="/img/single-product/thumbnail-3.jpg"
                                        data-fancybox="gallery1" data-hash="three">
                                        <img src="/img/single-product/thumbnail-3.jpg" alt="Product">
                                    </a>
                                </div>
                                <div class="item">
                                    <a class="gallery-item" href="/img/single-product/thumbnail-4.jpg"
                                        data-fancybox="gallery1" data-hash="four">
                                        <img src="/img/single-product/thumbnail-4.jpg" alt="Product">
                                    </a>
                                </div>
                            </div>
                            <ul class="product-thumbnails">
                                <li class="active">
                                    <a href="#one">
                                        <img src="/img/single-product/thumbnail-1.jpg" alt="Product">
                                    </a>
                                </li>
                                <li>
                                    <a href="#two">
                                        <img src="/img/single-product/thumbnail-2.jpg" alt="Product">
                                    </a>
                                </li>
                                <li>
                                    <a href="#three">
                                        <img src="/img/single-product/thumbnail-3.jpg" alt="Product">
                                    </a>
                                </li>
                                <li>
                                    <a href="#four">
                                        <img src="/img/single-product/thumbnail-4.jpg" alt="Product">
                                    </a>
                                </li>
                                <li>
                                    <a class="navi-link text-sm" href="/video/download.mp4" data-fancybox
                                        data-width="960" data-height="640">
                                        <i class="mdi mdi-video text-lg d-block mb-1"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Product Info -->
                    <div class="col-lg-8 col-md-6 py-2">
                        <div class="product-info dt-sl">
                            <div class="product-title dt-sl">
                                <h1>{{$product->product_name ?? ""}}</h1>
                                <h3>{{$product->slug ?? ""}}</h3>
                            </div>
                            <div class="product-variant dt-sl">
                                <div class="section-title text-sm-title title-wide no-after-title-wide mb-0">
                                    <h2>گارانتی Cioce</h2>
                                </div>
{{--                                <ul class="product-variants float-right ml-3">--}}
{{--                                    <li class="ui-variant">--}}
{{--                                        <label class="ui-variant ui-variant--color">--}}
{{--                                            <span class="ui-variant-shape" style="background-color: #212121"></span>--}}
{{--                                            <input type="radio" value="1" name="color" class="variant-selector"--}}
{{--                                                checked>--}}
{{--                                            <span class="ui-variant--check">مشکی</span>--}}
{{--                                        </label>--}}
{{--                                    </li>--}}
{{--                                    <li class="ui-variant">--}}
{{--                                        <label class="ui-variant ui-variant--color">--}}
{{--                                            <span class="ui-variant-shape" style="background-color: #f6f6f6"></span>--}}
{{--                                            <input type="radio" value="3" name="color" class="variant-selector">--}}
{{--                                            <span class="ui-variant--check">سفید</span>--}}
{{--                                        </label>--}}
{{--                                    </li>--}}
{{--                                    <li class="ui-variant">--}}
{{--                                        <label class="ui-variant ui-variant--color">--}}
{{--                                            <span class="ui-variant-shape" style="background-color: #2196f3"></span>--}}
{{--                                            <input type="radio" value="4" name="color" class="variant-selector">--}}
{{--                                            <span class="ui-variant--check">آبی</span>--}}
{{--                                        </label>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
                            </div>
                            <div class="product-params dt-sl">
                                <ul data-title="ویژگی‌های محصول">
                                    <li>
                                        <span>حافظه داخلی: </span>
                                        <span> 256 گیگابایت </span>
                                    </li>
                                    <li>
                                        <span>شبکه های ارتباطی: </span>
                                        <span> 2G,3G,4G </span>
                                    </li>
                                    <li>
                                        <span>رزولوشن عکس: </span>
                                        <span> 12.0 مگاپیکسل</span>
                                    </li>
                                    <li>
                                        <span>تعداد سیم کارت: </span>
                                        <span> تک </span>
                                    </li>
                                    <li>
                                        <span>ویژگی‌های خاص: </span>
                                        <span> مقاوم در برابر آب
                                            مناسب عکاسی
                                            مناسب عکاسی سلفی
                                            مناسب بازی
                                            مجهز به حس‌گر تشخیص چهره
                                        </span>
                                    </li>
                                </ul>
                                <div class="sum-more">
                                    <span class="show-more btn-link-border">
                                        + موارد بیشتر
                                    </span>
                                    <span class="show-less btn-link-border">
                                        - بستن
                                    </span>
                                </div>
                            </div>
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                <h2>کد محصول:{{$product->id}}</h2>
                            </div>
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                <h2>قیمت : <span class="price">{{number_format($product->price)}} تومان</span> </h2>
                            </div>
                            <div class="dt-sl mt-4">
                                <a href="#" class="btn-primary-cm btn-with-icon">
                                    <img src="/img/theme/shopping-cart.png" alt="">
                                    افزودن به سبد خرید
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-add-to-cart-btn-wrapper">
                    <a href="#" class="mb-add-to-cart-btn">افزودن به سبد خرید</a>
                </div>
            </div>
            <div class="dt-sn mb-5 px-0 dt-sl pt-0">
                <!-- Start tabs -->
                <section class="tabs-product-info mb-3 dt-sl">
                    <div class="ah-tab-wrapper dt-sl">
                        <div class="ah-tab dt-sl">
                            <a class="ah-tab-item" data-ah-tab-active="true" href=""><i
                                    class="mdi mdi-glasses"></i>نقد و بررسی</a>
                            <a class="ah-tab-item" href=""><i class="mdi mdi-format-list-checks"></i>مشخصات</a>
                            <a class="ah-tab-item" href=""><i
                                    class="mdi mdi-comment-text-multiple-outline"></i>نظرات کاربران</a>
                            <a class="ah-tab-item" href=""><i class="mdi mdi-comment-question-outline"></i>پرسش و
                                پاسخ</a>
                        </div>
                    </div>
                    <div class="ah-tab-content-wrapper product-info px-4 dt-sl">
                        <div class="ah-tab-content dt-sl" data-ah-tab-active="true">
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                <h2>نقد و بررسی</h2>
                            </div>
                            <div class="product-title dt-sl">
                                <h1>گوشی موبایل سامسونگ مدل Galaxy A50 SM-A505F/DS دو سیم کارت ظرفیت 128گیگابایت
                                </h1>
                                <h3>Samsung Galaxy A50 SM-A505F/DS Dual SIM 128GB Mobile Phone</h3>
                            </div>
                            <div class="description-product dt-sl mt-3 mb-3">
                                <div class="container">
                                    <p>سامسونگ سال 2019 را با متنوع کردن هرچند بیشتر سری گوشی‌های A خود آغاز کرد.
                                        این سری از تولیدات سامسونگ به داشتن صفحه‌نمایش بسیار با کیفیت AMOLED و
                                        دوربین‌هایی با امکانات بالا شهرت دارند. در این میان به نظر می‌رسد گوشی
                                        «Galaxy A50» حرف‌های زیادی در هر دوی این زمینه‌ها داشته باشد. گوشی موبایل
                                        Galaxy A50 با صفحه‌نمایش سوپر آمولد طراحی شده است و ظاهر زیبایی دارد.
                                        سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این
                                        گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته
                                        جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با جدیدترین نسخه از
                                        سیستم‌عامل اندروید (Pie) روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب
                                        بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچ با رزولوشن FullHD+ است که
                                        با استفاده از فناوری Super AMOLED و پنل OLED تصاویر شفاف و بی‌نظیری را به
                                        نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 403 پیکسل را نشان می‌دهد که این
                                        یعنی جزئیات و وضوح تصویر عالی است. همچنین روکش این نمایشگر لایه‌ی محافظ
                                        Corning Gorilla Glass است که از خط‌وخش و ضربه جلوگیری می‌کند. تراشه‌ی این
                                        محصول، Exynos 9610 از تراشه‌های 10 نانومتری سامسونگ است که به همراه 4
                                        گیگابایت رم عرضه می‌شود. این تراشه یکی از قوی‌ترین تراشه‌های موجود در حال
                                        حاضر است و برای انجام بازی‌های سنگین و بازکردن چندین برنامه به صورت هم‌زمان
                                        و تماشای ویدئو کاملا مناسب است و کم نمی‌آورد. تراشه‌ی گرافیکی Mali-G72 MP3
                                        هم برای پخش ویدئو و بازی مناسب است. این گوشی در دو ظرفیت 64 و 128 گیگابایتی
                                        عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه
                                        داخلی را تا یک ترابایت دیگر هم افزایش دهید. دوربین اصلی A50 سنسور
                                        25مگاپیکسلی دارد و از نوع عریض (Wide) است. دو سنسور 8 و 5 مگاپیکسلی دیگر هم
                                        در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A50 را تشکیل داده‌اند.
                                        دوربین سلفی 25مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری
                                        4000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C
                                        و حسگر اثرانگشت در زیر قاب اصلی هم از دیگر ویژگی‌های این تازه‌وارد است.
                                        سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است
                                        تا میان‌رده‌ای با قابلیت‌های نزدیک به یک بالارده خوش‌ساخت را روانه بازار
                                        کند.</p>
                                </div>
                            </div>
                            <div class="accordion dt-sl accordion-product" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="false"
                                                aria-controls="collapseOne">
                                                Face ID (کسی به‌غیراز تو را نمی‌شناسم)
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <img src="assets/img/single-product/1406986.jpg" alt="">
                                            <p>
                                                در فناوری تشخیص چهره‌ی اپل، یک دوربین و
                                                فرستنده‌ی مادون‌قرمز در بالای نمایشگر قرار داده
                                                ‌شده‌ است؛ هنگامی‌که آیفون
                                                می‌خواهد چهره‌ی شما را تشخیص دهد، فرستنده‌ی نوری
                                                نامرئی را به ‌صورت شما می‌تاباند. دوربین
                                                مادون‌قرمز، این نور را تشخیص
                                                داده و با الگویی که قبلا از صورت شما ثبت کرده،
                                                مطابقت می‌دهد و در صورت یکی‌بودن، قفل گوشی را
                                                باز می‌کند. اپل ادعا کرده،
                                                الگوی صورت را با استفاده از سی هزار نقطه ذخیره
                                                می‌کند که دورزدن آن اصلا کار ساده‌ای نیست.
                                                استفاده از ماسک، عکس یا موارد
                                                مشابه نمی‌تواند امنیت اطلاعات شما را به خطر
                                                اندازد؛ اما اگر برادر یا خواهر دوقلو دارید، باید
                                                برای امنیت اطلاعاتتان نگران
                                                باشید.
                                            </p>
                                            <img src="assets/img/single-product/1431842.jpg" alt="">
                                            <p>
                                                فقط یک نکته‌ی مثبت در مورد Face ID وجود ندارد؛
                                                بلکه موارد زیادی هستند که دانستن آن‌ها ضروری به
                                                نظر می‌رسد. آیفون 10 فقط
                                                چهره‌ی یک نفر را می‌شناسد و نمی‌توانید مثل
                                                اثرانگشت، چند چهره را به آیفون معرفی کنید تا از
                                                آن‌ها برای بازکردنش استفاده
                                                کنید. اگر آیفون در تلاش اول، صورت شما را نشناسد،
                                                باید نمایشگر را برای شناختن مجدد خاموش و روشن
                                                کنید یا اینکه آن را پایین
                                                ببرید و دوباره روبه‌روی صورتتان قرار دهید. این
                                                تمام ماجرا نیست؛ اگر آیفون 10 بین افراد زیادی که
                                                چهره‌شان را نمی‌شناسد
                                                دست‌به‌دست شود، دیگر به شناخت چهره عکس‌العمل
                                                نشان نمی‌دهد و حتما باید از پین یا پسوورد برای
                                                بازکردن آن استفاده کنید تا
                                                دوباره صورتتان را بشناسد.
                                            </p>
                                            <img src="assets/img/single-product/1439653.jpg" alt="">
                                            <p>
                                                اپل سعی کرده نهایت استفاده را از این فناوری جدید
                                                بکند؛ استفاده از آن برای ثبت تصاویر پرتره با
                                                دوربین سلفی، استفاده برای
                                                ساختن شکلک‌های بامزه که آن‌ها را Animoji نامیده
                                                است و همچنین استفاده برای روشن نگه‌داشتن گوشی
                                                زمانی که کاربر به آن نگاه
                                                می‌کند، مواردی هستند که iPhone X به کمک حسگر
                                                اینفرارد، بدون نقص آن‌ها را انجام می‌دهد.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                نمایش‌گر (رنگی‌تر از همیشه)
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <img src="assets/img/single-product/1429172.jpg" alt="">
                                            <p>
                                                اولین تجربه‌ی استفاده از پنل‌های اولد سامسونگ
                                                روی گوشی‌های اپل، نتیجه‌ای جذاب برای همه به
                                                همراه آورده است. مهندسی
                                                افزوده‌ی اپل روی این پنل‌ها باعث شده تا غلظت
                                                رنگ‌ها کاملا متعادل باشد، نه مثل آیفون 8 کم باشد
                                                و نه مثل گلکسی S8 اشباع
                                                باشد تا از حد تعادل خارج شود. اپل این نمایشگر را
                                                Super Retina نامیده تا ثابت کند، بهترین نمایشگر
                                                موجود در دنیا را طراحی
                                                کرده و از آن روی iPhone X استفاده کرده است.
                                            </p>
                                            <img src="assets/img/single-product/1436228.jpg" alt="">
                                            <p>
                                                این نمایشگر در مقایسه با پنل‌های معمولی، مصرف
                                                انرژی کمتری دارد و این به خاطر استفاده از
                                                پنل‌های اولد است؛ اما این مشخصه
                                                باعث نشده تا نور نمایشگر مثل محصولات دیگری که
                                                پنل اولد دارند کم باشد؛ بلکه این پنل در هر
                                                شرایطی بهترین بازده‌ی ممکن را
                                                دارد. استفاده زیر نور شدید خورشید یا تاریکی مطلق
                                                فرقی ندارد، آیفون 10 خود را با شرایط تطبیق
                                                می‌دهد. این تمام ماجرا نیست.
                                                در نمایشگر آیفون 10 نقطه‌ی حساس به تراز سفیدی
                                                نور محیط قرار داده ‌شده‌اند تا آیفون 10 را با
                                                شرایط نوری محیطی که از آن
                                                استفاده می‌کنید، هماهنگ کند و تراز سفیدی نمایشگر
                                                را به‌صورت خودکار تغییر دهد. این فناوری که با
                                                نام True-Tone نام‌گذاری
                                                شده، کمک می‌کند رنگ‌های نمایشگر در هر نوری
                                                نزدیک‌ترین غلظت و تراز سفیدی ممکن را به رنگ‌های
                                                طبیعی داشته باشد.
                                            </p>
                                            <img src="assets/img/single-product/1406339.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                                طراحی و ساخت (قربانی کردن سنت برای امروزی شدن)
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <img src="assets/img/single-product/1398679.jpg" alt="">
                                            <p>
                                                اپل پا جای پای سامسونگ گذاشته و برای داشتن ظاهری
                                                امروزی و استفاده از جدیدترین فناوری‌های روز، سنت
                                                ده‌ساله‌ی طراحی
                                                گوشی‌هایش را شکسته است. دیگر کلید خانه‌ای وجود
                                                ندارد و تمام قاب جلویی را نمایشگر پر کرده است.
                                                حتی نمایشگر هم برای
                                                استفاده از فناوری تشخیص چهره قربانی شده و قسمت
                                                بالایی آن بریده ‌شده است و لبه‌ی بالایی آن در
                                                مقایسه با هر گوشی دیگری که
                                                تا به امروز دیده بودیم، حالت متفاوتی دارد. ابعاد
                                                iPhone X کمی بزرگ‌تر از ابعاد آیفون 6 است؛ اما
                                                نمایشگرش حدود یک اینچ
                                                بزرگ‌تر از آیفون 6 است. این نشان می‌دهد، فاصله‌ی
                                                لبه‌ها تا نمایشگر تا جای ممکن از طراحی جدیدترین
                                                آیفون اپل حذف‌ شده‌
                                                است.
                                            </p>
                                            <img src="assets/img/single-product/1441226.jpg" alt="">
                                            <p>
                                                زبان طراحی جدید، آیفون 10 را به‌طور عجیبی به سمت
                                                تبدیل‌شدنش به یک کالای لوکس پیش برده است. نگاه
                                                کلی به طراحی این گوشی
                                                نشان می‌دهد، اپل سنت‌شکنی کرده و کالایی تولید
                                                کرده تا از هر نظر با نسخه‌های قبلی آیفون متفاوت
                                                باشد. استفاده از شیشه برای
                                                قاب پشتی، فلزی براق برای قاب اصلی، حذف کلید خانه
                                                و در انتها استفاده از نمایشگری بزرگ مواردی هستند
                                                که نشان‌دهنده‌ی تفاوت
                                                iPhone X با نسخه‌های قبلی آیفون است. تمام سطوح
                                                آیفون براق و صیقلی طراحی ‌شده‌اند و تنها برآمدگی
                                                آیفون جدید مربوط به
                                                مجموعه‌ی دوربین آن می‌شود که حدود یک میلی‌متری
                                                از قاب پشتی بیرون زده است. برخلاف آیفون 8پلاس،
                                                دوربین‌های روی قاب پشتی به
                                                حالت عمودی روی قاب پشتی قرار گرفته‌اند.
                                            </p>
                                            <img src="assets/img/single-product/1418947.jpg" alt="">
                                            <p>
                                                آیفون جدید در دو رنگ خاکستری و نقره‌ای راهی
                                                بازار شده که در هر دو مدل قاب جلویی به رنگ مشکی
                                                است و این بابت استفاده از
                                                سنسورهای متعدد در بخش بالایی نمایشگر است. برخلاف
                                                تمام آیفون‌های فلزی که تا امروز ساخته‌ شده‌اند،
                                                قاب اصلی از فلزی براق
                                                ساخته ‌شده تا زیر نور خودنمایی کند.

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ah-tab-content params dt-sl">
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                <h2>مشخصات فنی</h2>
                            </div>
                            <div class="product-title dt-sl mb-3">
                                <h1>گوشی موبایل سامسونگ مدل Galaxy A50 SM-A505F/DS دو سیم کارت ظرفیت 128گیگابایت
                                </h1>
                                <h3>Samsung Galaxy A50 SM-A505F/DS Dual SIM 128GB Mobile Phone</h3>
                            </div>
                            <section>
                                <h3 class="params-title">مشخصات کلی</h3>
                                <ul class="params-list">
                                    <li>
                                        <div class="params-list-key">
                                            <span class="d-block">ابعاد</span>
                                        </div>
                                        <div class="params-list-value">
                                            <span class="d-block">
                                                7.7 × 70.9 × 143.6 میلی‌متر
                                            </span>
                                        </div>
                                        <div class="params-list-value">
                                            <span class="d-block">
                                                7.7 × 70.9 × 143.6 میلی‌متر
                                            </span>
                                        </div>
                                        <div class="params-list-value">
                                            <span class="d-block">
                                                7.7 × 70.9 × 143.6 میلی‌متر
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="params-list-key">
                                            <span class="d-block">توضیحات سیم کارت</span>
                                        </div>
                                        <div class="params-list-value">
                                            <span class="d-block">
                                                سایز نانو (8.8 × 12.3 میلی‌متر)
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="params-list-key">
                                            <span class="d-block">وزن</span>
                                        </div>
                                        <div class="params-list-value">
                                            <span class="d-block">
                                                174 گرم
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="params-list-key">
                                            <span class="d-block">ویژگی‌های خاص</span>
                                        </div>
                                        <div class="params-list-value">
                                            <span class="d-block">
                                                مقاوم در برابر آب , مناسب عکاسی , مناسب عکاسی
                                                سلفی , مناسب بازی , مجهز به حس‌گر تشخیص چهره
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="params-list-key">
                                            <span class="d-block">تعداد سیم کارت</span>
                                        </div>
                                        <div class="params-list-value">
                                            <span class="d-block">
                                                تک سیم کارت
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </section>
                            <section>
                                <h3 class="params-title">پردازنده</h3>
                                <ul class="params-list">
                                    <li>
                                        <div class="params-list-key">
                                            <span class="d-block">تراشه</span>
                                        </div>
                                        <div class="params-list-value">
                                            <span class="d-block">
                                                Apple A11 Bionic Chipset
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="params-list-key">
                                            <span class="d-block">نوع پردازنده</span>
                                        </div>
                                        <div class="params-list-value">
                                            <span class="d-block">
                                                64 بیت
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </section>
                        </div>
                        <div class="ah-tab-content comments-tab dt-sl">
                            <div class="section-title title-wide no-after-title-wide mb-0 dt-sl">
                                <h2>امتیاز کاربران به:</h2>
                            </div>
                            <div class="product-title dt-sl mb-3">
                                <h1>گوشی موبایل سامسونگ مدل Galaxy A50 SM-A505F/DS دو سیم کارت ظرفیت 128گیگابایت
                                </h1>
                                <h3>Samsung Galaxy A50 SM-A505F/DS Dual SIM 128GB Mobile Phone<span
                                        class="rate-product">(4 از 5 | 15 نفر)</span></h3>
                            </div>
                            <div class="dt-sl">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <ul class="content-expert-rating">
                                            <li>
                                                <div class="cell">طراحی</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate" data-rate-value="100%"
                                                            style="width: 70%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">ارزش خرید</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate" data-rate-value="100%"
                                                            style="width: 20%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">کیفیت ساخت</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate" data-rate-value="100%"
                                                            style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">صدای مزاحم</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate" data-rate-value="100%"
                                                            style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">مصرف انرژی و آب</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate" data-rate-value="100%"
                                                            style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">امکانات و قابلیت ها</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate" data-rate-value="100%"
                                                            style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="comments-summary-note">
                                            <span>شما هم می‌توانید در مورد این کالا نظر
                                                بدهید.</span>
                                            <p>برای ثبت نظر، لازم است ابتدا وارد حساب کاربری خود
                                                شوید. اگر این محصول را قبلا از دیجی‌کالا خریده
                                                باشید، نظر
                                                شما به عنوان مالک محصول ثبت خواهد شد.
                                            </p>
                                            <div class="dt-sl mt-2">
                                                <a href="#" class="btn-primary-cm btn-with-icon">
                                                    <i class="mdi mdi-comment-text-outline"></i>
                                                    افزودن نظر جدید
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="comments-area dt-sl">
                                    <div
                                        class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                        <h2>نظرات کاربران</h2>
                                        <p class="count-comment">123 نظر</p>
                                    </div>
                                    <ol class="comment-list">
                                        <!-- #comment-## -->
                                        <li>
                                            <div class="comment-body">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-12">
                                                        <div class="message-light message-light--purchased">
                                                            خریدار این محصول</div>
                                                        <ul class="comments-user-shopping">
                                                            <li>
                                                                <div class="cell">رنگ خریداری
                                                                    شده:</div>
                                                                <div class="cell color-cell">
                                                                    <span class="shopping-color-value"
                                                                        style="background-color: #FFFFFF; border: 1px solid rgba(0, 0, 0, 0.25)"></span>سفید
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="cell">خریداری شده
                                                                    از:</div>
                                                                <div class="cell seller-cell">
                                                                    <span class="o-text-blue">دیجی‌کالا</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="message-light message-light--opinion-positive">
                                                            خرید این محصول را توصیه می‌کنم</div>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12 comment-content">
                                                        <div class="comment-title">
                                                            لباسشویی سامسونگ
                                                        </div>
                                                        <div class="comment-author">
                                                            توسط مجید سجادی فرد در تاریخ ۵ مهر ۱۳۹۵
                                                        </div>

                                                        <p>لورم ایپسوم متن ساختگی</p>

                                                        <div class="footer">
                                                            <div class="comments-likes">
                                                                آیا این نظر برایتان مفید بود؟
                                                                <button class="btn-like" data-counter="۱۱">بله
                                                                </button>
                                                                <button class="btn-like" data-counter="۶">خیر
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- #comment-## -->
                                        <li>
                                            <div class="comment-body">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-12">
                                                        <div class="message-light message-light--purchased">
                                                            خریدار این محصول</div>
                                                        <ul class="comments-user-shopping">
                                                            <li>
                                                                <div class="cell">رنگ خریداری
                                                                    شده:</div>
                                                                <div class="cell color-cell">
                                                                    <span class="shopping-color-value"
                                                                        style="background-color: #FFFFFF; border: 1px solid rgba(0, 0, 0, 0.25)"></span>سفید
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="cell">خریداری شده
                                                                    از:</div>
                                                                <div class="cell seller-cell">
                                                                    <span class="o-text-blue">دیجی‌کالا</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="message-light message-light--opinion-positive">
                                                            خرید این محصول را توصیه می‌کنم</div>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12 comment-content">
                                                        <div class="comment-title">
                                                            لباسشویی سامسونگ
                                                        </div>
                                                        <div class="comment-author">
                                                            توسط مجید سجادی فرد در تاریخ ۵ مهر ۱۳۹۵
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-6 col-12">
                                                                <div class="content-expert-evaluation-positive">
                                                                    <span>نقاط قوت</span>
                                                                    <ul>
                                                                        <li>دوربین‌های 4گانه پرقدرت
                                                                        </li>
                                                                        <li>باتری باظرفیت بالا</li>
                                                                        <li>حسگر اثرانگشت زیر قاب
                                                                            جلویی</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-12">
                                                                <div class="content-expert-evaluation-negative">
                                                                    <span>نقاط ضعف</span>
                                                                    <ul>
                                                                        <li>نرم‌افزار دوربین</li>
                                                                        <li>نبودن Nano SD در بازار
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>
                                                            بعد از چندین هفته بررسی تصمیم به خرید
                                                            این مدل از ماشین لباسشویی گرفتم ولی
                                                            متاسفانه نتونست انتظارات منو برآورده کنه
                                                            .
                                                            دو تا ایراد داره یکی اینکه حدودا تا 20
                                                            دقیقه اول شستشو یه صدایی شبیه به صدای
                                                            پمپ تخلیه همش به گوش میاد که رو مخه یکی
                                                            هم با اینکه خشک کنش تا 1400 دور در دقیقه
                                                            میچرخه، ولی اون طوری که دوستان تعریف
                                                            میکردن لباسها رو خشک نمیکنه .ضمنا برای
                                                            این صدایی که گفتم زنگ زدم نمایندگی اومدن
                                                            دیدن، وتعمیرکار گفتش که این صدا طبیعیه و
                                                            تا چند دقیقه اول شستشو عادیه.بدجوری خورد
                                                            تو ذوقم. اگه بیشتر پول میذاشتم میتونستم
                                                            یه مدل میان رده از مارکهای بوش یا آ ا گ
                                                            میخریدم که خیلی بهتر از جنس مونتاژی کره
                                                            ای هستش.
                                                        </p>

                                                        <div class="footer">
                                                            <div class="comments-likes">
                                                                آیا این نظر برایتان مفید بود؟
                                                                <button class="btn-like" data-counter="۱۱">بله
                                                                </button>
                                                                <button class="btn-like" data-counter="۶">خیر
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- #comment-## -->
                                        <li>
                                            <div class="comment-body">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-12">
                                                        <div class="message-light message-light--purchased">
                                                            خریدار این محصول</div>
                                                        <ul class="comments-user-shopping">
                                                            <li>
                                                                <div class="cell">رنگ خریداری
                                                                    شده:</div>
                                                                <div class="cell color-cell">
                                                                    <span class="shopping-color-value"
                                                                        style="background-color: #FFFFFF; border: 1px solid rgba(0, 0, 0, 0.25)"></span>سفید
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="cell">خریداری شده
                                                                    از:</div>
                                                                <div class="cell seller-cell">
                                                                    <span class="o-text-blue">دیجی‌کالا</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="message-light message-light--opinion-positive">
                                                            خرید این محصول را توصیه می‌کنم</div>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12 comment-content">
                                                        <div class="comment-title">
                                                            لباسشویی سامسونگ
                                                        </div>
                                                        <div class="comment-author">
                                                            توسط مجید سجادی فرد در تاریخ ۵ مهر ۱۳۹۵
                                                        </div>

                                                        <p>لورم ایپسوم متن ساختگی</p>

                                                        <div class="footer">
                                                            <div class="comments-likes">
                                                                آیا این نظر برایتان مفید بود؟
                                                                <button class="btn-like" data-counter="۱۱">بله
                                                                </button>
                                                                <button class="btn-like" data-counter="۶">خیر
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- #comment-## -->
                                        <li>
                                            <div class="comment-body">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-12">
                                                        <div class="message-light message-light--purchased">
                                                            خریدار این محصول</div>
                                                        <ul class="comments-user-shopping">
                                                            <li>
                                                                <div class="cell">رنگ خریداری
                                                                    شده:</div>
                                                                <div class="cell color-cell">
                                                                    <span class="shopping-color-value"
                                                                        style="background-color: #FFFFFF; border: 1px solid rgba(0, 0, 0, 0.25)"></span>سفید
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="cell">خریداری شده
                                                                    از:</div>
                                                                <div class="cell seller-cell">
                                                                    <span class="o-text-blue">دیجی‌کالا</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="message-light message-light--opinion-positive">
                                                            خرید این محصول را توصیه می‌کنم</div>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12 comment-content">
                                                        <div class="comment-title">
                                                            لباسشویی سامسونگ
                                                        </div>
                                                        <div class="comment-author">
                                                            توسط مجید سجادی فرد در تاریخ ۵ مهر ۱۳۹۵
                                                        </div>

                                                        <p>لورم ایپسوم متن ساختگی</p>

                                                        <div class="footer">
                                                            <div class="comments-likes">
                                                                آیا این نظر برایتان مفید بود؟
                                                                <button class="btn-like" data-counter="۱۱">بله
                                                                </button>
                                                                <button class="btn-like" data-counter="۶">خیر
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- #comment-## -->
                                        <li>
                                            <div class="comment-body">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-12">
                                                        <div class="message-light message-light--purchased">
                                                            خریدار این محصول</div>
                                                        <ul class="comments-user-shopping">
                                                            <li>
                                                                <div class="cell">رنگ خریداری
                                                                    شده:</div>
                                                                <div class="cell color-cell">
                                                                    <span class="shopping-color-value"
                                                                        style="background-color: #FFFFFF; border: 1px solid rgba(0, 0, 0, 0.25)"></span>سفید
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="cell">خریداری شده
                                                                    از:</div>
                                                                <div class="cell seller-cell">
                                                                    <span class="o-text-blue">دیجی‌کالا</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="message-light message-light--opinion-positive">
                                                            خرید این محصول را توصیه می‌کنم</div>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12 comment-content">
                                                        <div class="comment-title">
                                                            لباسشویی سامسونگ
                                                        </div>
                                                        <div class="comment-author">
                                                            توسط مجید سجادی فرد در تاریخ ۵ مهر ۱۳۹۵
                                                        </div>

                                                        <p>لورم ایپسوم متن ساختگی</p>

                                                        <div class="footer">
                                                            <div class="comments-likes">
                                                                آیا این نظر برایتان مفید بود؟
                                                                <button class="btn-like" data-counter="۱۱">بله
                                                                </button>
                                                                <button class="btn-like" data-counter="۶">خیر
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="ah-tab-content dt-sl">
                            <div class="section-title title-wide no-after-title-wide dt-sl">
                                <h2>پرسش و پاسخ</h2>
                                <p class="count-comment">پرسش خود را در مورد محصول مطرح نمایید</p>
                            </div>
                            <div class="form-question-answer dt-sl mb-3">
                                <form action="">
                                    <textarea class="form-control mb-3" rows="5"></textarea>
                                    <button class="btn btn-dark float-right ml-3" disabled="">ثبت پرسش</button>
                                    <div class="custom-control custom-checkbox float-right mt-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">اولین پاسخی که به
                                            پرسش من داده شد، از طریق ایمیل به من اطلاع دهید.</label>
                                    </div>
                                </form>
                            </div>
                            <div class="comments-area default">
                                <div
                                    class="section-title text-sm-title title-wide no-after-title-wide mt-5 mb-0 dt-sl">
                                    <h2>پرسش ها و پاسخ ها</h2>
                                    <p class="count-comment">123 پرسش</p>
                                </div>
                                <ol class="comment-list">
                                    <!-- #comment-## -->
                                    <li>
                                        <div class="comment-body">
                                            <div class="comment-author">
                                                <span class="icon-comment">?</span>
                                                <cite class="fn">حسن</cite>
                                                <span class="says">گفت:</span>
                                                <div class="commentmetadata">
                                                    <a href="#">
                                                        اسفند ۲۰, ۱۳۹۶ در ۹:۴۱ ب.ظ
                                                    </a>
                                                </div>
                                            </div>



                                            <p>لورم ایپسوم متن ساختگی</p>

                                            <div class="reply"><a class="comment-reply-link" href="#">پاسخ</a></div>
                                        </div>
                                    </li>
                                    <!-- #comment-## -->
                                    <li>
                                        <div class="comment-body">
                                            <div class="comment-author">
                                                <span class="icon-comment">?</span>
                                                <cite class="fn">رضا</cite>
                                                <span class="says">گفت:</span>
                                                <div class="commentmetadata">
                                                    <a href="#">
                                                        اسفند ۲۰, ۱۳۹۶ در ۹:۴۲ ب.ظ
                                                    </a>
                                                </div>
                                            </div>
                                            <p>
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                صنعت چاپ و با استفاده از طراحان گرافیک است.
                                            </p>

                                            <div class="reply"><a class="comment-reply-link" href="#">پاسخ</a></div>
                                        </div>
                                        <ol class="children">
                                            <li>
                                                <div class="comment-body">
                                                    <div class="comment-author">
                                                        <span
                                                            class="icon-comment mdi mdi-lightbulb-on-outline"></span>
                                                        <cite class="fn">بهرامی راد</cite> <span
                                                            class="says">گفت:</span>
                                                        <div class="commentmetadata">
                                                            <a href="#">
                                                                اسفند ۲۰, ۱۳۹۶ در ۹:۴۷ ب.ظ
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی
                                                        نامفهوم از صنعت چاپ و با استفاده از
                                                        طراحان گرافیک است.
                                                        چاپگرها و متون بلکه روزنامه و مجله در
                                                        ستون و سطرآنچنان که لازم است و برای
                                                        شرایط فعلی تکنولوژی
                                                        مورد نیاز و کاربردهای متنوع با هدف بهبود
                                                        ابزارهای کاربردی می باشد.</p>

                                                    <div class="reply"><a class="comment-reply-link"
                                                            href="#">پاسخ</a></div>
                                                </div>
                                                <ol class="children">
                                                    <li>
                                                        <div class="comment-body">
                                                            <div class="comment-author">
                                                                <span class="icon-comment">?</span>
                                                                <cite class="fn">محمد</cite>
                                                                <span class="says">گفت:</span>
                                                                <div class="commentmetadata">
                                                                    <a href="#">
                                                                        خرداد ۳۰, ۱۳۹۷ در ۸:۵۳ ق.ظ
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <p>عالیه</p>

                                                            <div class="reply"><a class="comment-reply-link"
                                                                    href="#">پاسخ</a></div>
                                                        </div>
                                                        <ol class="children">
                                                            <li>
                                                                <div class="comment-body">
                                                                    <div class="comment-author">
                                                                        <span
                                                                            class="icon-comment mdi mdi-lightbulb-on-outline"></span>
                                                                        <cite class="fn">اشکان</cite>
                                                                        <span class="says">گفت:</span>
                                                                        <div class="commentmetadata">
                                                                            <a href="#">
                                                                                خرداد ۳۰, ۱۳۹۷ در ۸:۵۳ ق.ظ
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <p>لورم ایپسوم متن ساختگی با
                                                                        تولید سادگی نامفهوم از
                                                                        صنعت چاپ و با استفاده از
                                                                        طراحان
                                                                        گرافیک است. چاپگرها و
                                                                        متون بلکه روزنامه و مجله
                                                                        در ستون و سطرآنچنان که
                                                                        لازم است و
                                                                        برای شرایط فعلی تکنولوژی
                                                                        مورد نیاز و کاربردهای
                                                                        متنوع با هدف بهبود
                                                                        ابزارهای
                                                                        کاربردی می باشد.</p>

                                                                    <div class="reply"><a class="comment-reply-link"
                                                                            href="#">پاسخ</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <!-- #comment-## -->
                                                        </ol>
                                                        <!-- .children -->
                                                    </li>
                                                    <!-- #comment-## -->
                                                </ol>
                                                <!-- .children -->
                                            </li>
                                            <!-- #comment-## -->
                                        </ol>
                                        <!-- .children -->
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End tabs -->
            </div>
            <!-- End Product -->

            <!-- Start Product-Slider -->
            @include('partials.popular_products')
            <!-- End Product-Slider -->

        </div>
    </main>
    <!-- End main-content -->
    @endif
@endsection

@section('extra_js')

@endsection
