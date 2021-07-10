@extends("layouts.master")

@section("title")
    <title>علاقمندی های من | CioCe.ir</title>
@endsection

@section("content")

    <!-- Start main-content -->
        <main class="main-content dt-sl mb-3">
            <div class="container main-container">
                <div class="row">

                    <!-- Start Sidebar -->
                        @include('profile.sidebar')
                    <!-- End Sidebar -->

                    <!-- Start Content -->
                    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col-12">
                                <div
                                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                    <h2>آدرس ها</h2>
                                </div>
                                <div class="dt-sl">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="card-horizontal-address text-center px-4">
                                                <button class="checkout-address-location" data-toggle="modal"
                                                    data-target="#modal-location">
                                                    <strong>ایجاد آدرس جدید</strong>
                                                    <i class="mdi mdi-map-marker-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="card-horizontal-address">
                                                <div class="card-horizontal-address-desc">
                                                    <h4 class="card-horizontal-address-full-name">جلال بهرامی راد</h4>
                                                    <p>
                                                        خراسان شمالی، بجنورد، خراسان شمالی-بجنورد
                                                    </p>
                                                </div>
                                                <div class="card-horizontal-address-data">
                                                    <ul class="card-horizontal-address-methods float-right">
                                                        <li class="card-horizontal-address-method">
                                                            <i class="mdi mdi-email-outline"></i>
                                                            کدپستی : <span>۹۹۹۹۹۹۹۹۹۹</span>
                                                        </li>
                                                        <li class="card-horizontal-address-method">
                                                            <i class="mdi mdi-cellphone-iphone"></i>
                                                            تلفن همراه : <span>۰۹۰۳۰۸۱۳۷۴۲</span>
                                                        </li>
                                                    </ul>
                                                    <div class="card-horizontal-address-actions">
                                                        <button class="btn-note" data-toggle="modal"
                                                            data-target="#modal-location-edit">ویرایش</button>
                                                        <button class="btn-note" data-toggle="modal"
                                                            data-target="#remove-location">حذف</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="card-horizontal-address">
                                                <div class="card-horizontal-address-desc">
                                                    <h4 class="card-horizontal-address-full-name">جلال بهرامی راد</h4>
                                                    <p>
                                                        خراسان شمالی، بجنورد، خراسان شمالی-بجنورد
                                                    </p>
                                                </div>
                                                <div class="card-horizontal-address-data">
                                                    <ul class="card-horizontal-address-methods float-right">
                                                        <li class="card-horizontal-address-method">
                                                            <i class="mdi mdi-email-outline"></i>
                                                            کدپستی : <span>۹۹۹۹۹۹۹۹۹۹</span>
                                                        </li>
                                                        <li class="card-horizontal-address-method">
                                                            <i class="mdi mdi-cellphone-iphone"></i>
                                                            تلفن همراه : <span>۰۹۰۳۰۸۱۳۷۴۲</span>
                                                        </li>
                                                    </ul>
                                                    <div class="card-horizontal-address-actions">
                                                        <button class="btn-note" data-toggle="modal"
                                                            data-target="#modal-location-edit">ویرایش</button>
                                                        <button class="btn-note" data-toggle="modal"
                                                            data-target="#remove-location">حذف</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Content -->

                </div>
                <!-- Start Product-Slider -->
                <section class="slider-section dt-sl mt-5 mb-5">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="section-title text-sm-title title-wide no-after-title-wide">
                                <h2>محصولات پیشنهادی برای شما</h2>
                                <a href="#">مشاهده همه</a>
                            </div>
                        </div>

                        <!-- Start Product-Slider -->
                        <div class="col-12 px-res-0">
                            <div class="product-carousel carousel-lg owl-carousel owl-theme">
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                            <div class="discount">
                                                <span>20%</span>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="/img/products/07.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">157,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="/img/products/017.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">کت مردانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                            <span class="product-price">199,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="/img/products/013.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه مدل هودی تیک تین</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">135,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="/img/products/09.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">145,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="/img/products/010.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">170,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                            <div class="discount">
                                                <span>20%</span>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="/img/products/011.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">185,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="/img/products/019.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">تیشرت مردانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                            <span class="product-price">54,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Product-Slider -->

                    </div>
                </section>
                <!-- End Product-Slider -->
            </div>
        </main>
        <!-- End main-content -->

        <!-- Start Modal location new -->
        <div class="modal fade" id="modal-location" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-lg send-info modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">
                            <i class="now-ui-icons location_pin"></i>
                            افزودن آدرس جدید
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-ui dt-sl">
                                    <form class="form-account" action="">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 mb-2">
                                                <div class="form-row-title">
                                                    <h4>
                                                        نام و نام خانوادگی
                                                    </h4>
                                                </div>
                                                <div class="form-row">
                                                    <input class="input-ui pr-2 text-right" type="text"
                                                        placeholder="نام خود را وارد نمایید">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 mb-2">
                                                <div class="form-row-title">
                                                    <h4>
                                                        شماره موبایل
                                                    </h4>
                                                </div>
                                                <div class="form-row">
                                                    <input class="input-ui pl-2 dir-ltr text-left" type="text"
                                                        placeholder="09xxxxxxxxx">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 mb-2">
                                                <div class="form-row-title">
                                                    <h4>
                                                        استان
                                                    </h4>
                                                </div>
                                                <div class="form-row">
                                                    <div class="custom-select-ui">
                                                        <select class="right">
                                                            <option value="khrasan-north">
                                                                خراسان شمالی
                                                            </option>
                                                            <option value="tehran">
                                                                تهران
                                                            </option>
                                                            <option value="esfahan">
                                                                اصفهان
                                                            </option>
                                                            <option value="shiraz">
                                                                شیراز
                                                            </option>
                                                            <option value="tabriz">
                                                                تبریز
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 mb-2">
                                                <div class="form-row-title">
                                                    <h4>
                                                        شهر
                                                    </h4>
                                                </div>
                                                <div class="form-row">
                                                    <div class="custom-select-ui">
                                                        <select class="right">
                                                            <option value="bojnourd">
                                                                بجنورد
                                                            </option>
                                                            <option value="garme">
                                                                گرمه
                                                            </option>
                                                            <option value="shirvan">
                                                                شیروان
                                                            </option>
                                                            <option value="mane">
                                                                مانه و سملقان
                                                            </option>
                                                            <option value="esfarayen">
                                                                اسفراین
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="form-row-title">
                                                    <h4>
                                                        آدرس پستی
                                                    </h4>
                                                </div>
                                                <div class="form-row">
                                                    <textarea class="input-ui pr-2 text-right"
                                                        placeholder=" آدرس تحویل گیرنده را وارد نمایید"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="form-row-title">
                                                    <h4>
                                                        کد پستی
                                                    </h4>
                                                </div>
                                                <div class="form-row">
                                                    <input class="input-ui pl-2 dir-ltr text-left placeholder-right"
                                                        type="text" placeholder=" کد پستی را بدون خط تیره بنویسید">
                                                </div>
                                            </div>
                                            <div class="col-12 pr-4 pl-4">
                                                <button type="button" class="btn btn-sm btn-primary btn-submit-form">ثبت
                                                    و
                                                    ارسال به این آدرس</button>
                                                <button type="button" class="btn-link-border float-left mt-2">انصراف
                                                    و بازگشت</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <!-- Google Map Start -->
                                <div class="goole-map">
                                    <div id="map" style="height:440px"></div>
                                </div>
                                <!-- Google Map End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal location new -->

        <!-- Start Modal location edit -->
        <div class="modal fade" id="modal-location-edit" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-lg send-info modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">
                            <i class="now-ui-icons location_pin"></i>
                            ویرایش آدرس
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-ui dt-sl">
                                    <form class="form-account" action="">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 mb-2">
                                                <div class="form-row-title">
                                                    <h4>
                                                        نام و نام خانوادگی
                                                    </h4>
                                                </div>
                                                <div class="form-row">
                                                    <input class="input-ui pr-2 text-right" type="text"
                                                        placeholder="نام خود را وارد نمایید">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 mb-2">
                                                <div class="form-row-title">
                                                    <h4>
                                                        شماره موبایل
                                                    </h4>
                                                </div>
                                                <div class="form-row">
                                                    <input class="input-ui pl-2 dir-ltr text-left" type="text"
                                                        placeholder="09xxxxxxxxx">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 mb-2">
                                                <div class="form-row-title">
                                                    <h4>
                                                        استان
                                                    </h4>
                                                </div>
                                                <div class="form-row">
                                                    <div class="custom-select-ui">
                                                        <select class="right">
                                                            <option value="khrasan-north">
                                                                خراسان شمالی
                                                            </option>
                                                            <option value="tehran">
                                                                تهران
                                                            </option>
                                                            <option value="esfahan">
                                                                اصفهان
                                                            </option>
                                                            <option value="shiraz">
                                                                شیراز
                                                            </option>
                                                            <option value="tabriz">
                                                                تبریز
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 mb-2">
                                                <div class="form-row-title">
                                                    <h4>
                                                        شهر
                                                    </h4>
                                                </div>
                                                <div class="form-row">
                                                    <div class="custom-select-ui">
                                                        <select class="right">
                                                            <option value="bojnourd">
                                                                بجنورد
                                                            </option>
                                                            <option value="garme">
                                                                گرمه
                                                            </option>
                                                            <option value="shirvan">
                                                                شیروان
                                                            </option>
                                                            <option value="mane">
                                                                مانه و سملقان
                                                            </option>
                                                            <option value="esfarayen">
                                                                اسفراین
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="form-row-title">
                                                    <h4>
                                                        آدرس پستی
                                                    </h4>
                                                </div>
                                                <div class="form-row">
                                                    <textarea class="input-ui pr-2 text-right"
                                                        placeholder=" آدرس تحویل گیرنده را وارد نمایید"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="form-row-title">
                                                    <h4>
                                                        کد پستی
                                                    </h4>
                                                </div>
                                                <div class="form-row">
                                                    <input class="input-ui pl-2 dir-ltr text-left placeholder-right"
                                                        type="text" placeholder=" کد پستی را بدون خط تیره بنویسید">
                                                </div>
                                            </div>
                                            <div class="col-12 pr-4 pl-4">
                                                <button type="button" class="btn btn-sm btn-primary btn-submit-form">ثبت
                                                    و
                                                    ارسال به این آدرس</button>
                                                <button type="button" class="btn-link-border float-left mt-2">انصراف
                                                    و بازگشت</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <!-- Google Map Start -->
                                <div class="goole-map">
                                    <div id="map-edit" style="height:440px"></div>
                                </div>
                                <!-- Google Map End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal location edit -->

        <!-- Start Modal remove-location -->
        <div class="modal fade" id="remove-location" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mb-3" id="exampleModalLabel">آیا مطمئنید که
                            این آدرس حذف شود؟</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="remodal-general-alert-button remodal-general-alert-button--cancel"
                            data-dismiss="modal">خیر</button>
                        <button type="button"
                            class="remodal-general-alert-button remodal-general-alert-button--approve">بله</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal remove-location -->


@endsection
@section('extra_js')

    <!-- Plugins -->
    <script src="/js/vendor/jquery.nice-select.min.js"></script>
    <script src="/js/vendor/nouislider.min.js"></script>
    <script src="/js/vendor/wNumb.js"></script>
    <script src="/js/vendor/ResizeSensor.min.js"></script>
    <!-- google map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAq7MrCR1A2qIShmjbtLHSKjcEIEBEEwM"></script>
    <script>
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 11,

                scrollwheel: false,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(23.761226, 90.420766), // New York

                // How you would like to style the map.
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#444444"
                    }]
                },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [{
                            "color": "#f2f2f2"
                        }]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [{
                            "saturation": -100
                        },
                            {
                                "lightness": 45
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "simplified"
                        }]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [{
                            "color": "#314453"
                        },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "lightness": "-12"
                        },
                            {
                                "saturation": "0"
                            },
                            {
                                "color": "#4bc7e9"
                            }
                        ]
                    }
                ]
            };

            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapNew = document.getElementById('map');
            var mapEdit = document.getElementById('map-edit');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapNew, mapOptions);
            var mapEdit = new google.maps.Map(mapEdit, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(23.761226, 90.420766),
                map: map,
                title: 'Snazzy!'
            });
        }
    </script>
    <!-- Main JS File -->
    <script src="/js/main.js"></script>

@endsection
