<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#f7858d">
    <meta name="msapplication-navbutton-color" content="#f7858d">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f7858d">
    <title>Shopping Page</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/vendor/bootstrap.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="/css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/vendor/jquery.horizontalmenu.css">
    <link rel="stylesheet" href="/css/vendor/nice-select.css">
    <link rel="stylesheet" href="/css/vendor/nouislider.min.css">
    <!-- Font Icon -->
    <link rel="stylesheet" href="/css/vendor/materialdesignicons.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/colors/default.css" id="colorswitch">
</head>

<body>

<div class="wrapper shopping-page">

    <!-- Start header-shopping -->
    <header class="header-shopping dt-sl">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center pt-2">
                    <div class="header-shopping-logo dt-sl">
                        <a href="#">
                            <img src="/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <ul class="checkout-steps">
                        <li>
                            <a href="#" class="active">
                                <span>اطلاعات ارسال</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>پرداخت</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>اتمام خرید و ارسال</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- End header-shopping -->

    <!-- Start main-content -->
    <main class="main-content dt-sl mt-4 mb-3">
        <div class="container main-container">
            <div class="row">
                <div class="cart-page-content col-xl-9 col-lg-8 col-12 px-0">
                    <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                        <h2>انتخاب آدرس تحویل سفارش</h2>
                    </div>
                    <section class="page-content dt-sl">
                        @if(isset($user))
                            <div class="address-section">
                            <div class="checkout-contact dt-sn dt-sn--box px-0 pt-0 pb-0">
                                <div class="checkout-contact-content">
                                    <ul class="checkout-contact-items">
                                        <li class="checkout-contact-item">
                                            گیرنده:
                                            <span class="full-name"></span>
                                            <a class="checkout-contact-btn-edit">اصلاح این آدرس</a>
                                        </li>
                                        <li class="checkout-contact-item">
                                            <div class="checkout-contact-item checkout-contact-item-mobile">
                                                شماره تماس:
                                                <span class="mobile-phone">۰۹۰۳۰۸۱۳۷۴۲</span>
                                            </div>
                                            <div class="checkout-contact-item-message">
                                                کد پستی:
                                                <span class="post-code">۹۹۹۹۹۹۹۹۹۹</span>
                                            </div>
                                            <br>
                                            استان
                                            <span class="state">خراسان شمالی</span>
                                            ، ‌شهر
                                            <span class="city">بجنورد</span>
                                            ،
                                            <span class="address-part">خراسان شمالی-بجنورد</span>
                                        </li>
                                    </ul>
                                    <a class="checkout-contact-location" id="btn-checkout-contact-location">تغییر
                                        آدرس
                                        ارسال</a>
                                    <div class="checkout-contact-badge">
                                        <i class="mdi mdi-check-bold"></i>
                                    </div>
                                </div>
                                <div class="checkout-address dt-sn px-0 pt-0 pb-0" id="user-address-list-container">
                                    <div class="checkout-address-content">
                                        <div class="checkout-address-headline">آدرس مورد نظر خود را جهت تحویل
                                            انتخاب فرمایید:</div>
                                        <div class="checkout-address-row">
                                            <div class="checkout-address-col">
                                                <button class="checkout-address-location" data-toggle="modal"
                                                        data-target="#modal-location">
                                                    <strong>ایجاد آدرس جدید</strong>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="checkout-address-row">
                                            <div class="checkout-address-col">
                                                <div class="checkout-address-box is-selected">
                                                    <h5 class="checkout-address-title">جلال بهرامی راد</h5>
                                                    <p class="checkout-address-text">
                                                            <span>خراسان شمالی، بجنورد،خراسان شمالی-بجنورد-طالقانی
                                                                غربی</span>
                                                    </p>
                                                    <ul class="checkout-address-list">
                                                        <li>
                                                            <ul class="checkout-address-contact-info">
                                                                <li class="">کدپستی: <span>۹۹۹۹۹۹۹۹۹۹</span></li>
                                                                <li>شماره همراه: <span>۰۹۰۳۰۸۱۳۷۴۲</span>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <ul>
                                                                <li>
                                                                    <button class="checkout-address-btn-edit"
                                                                            data-toggle="modal"
                                                                            data-target="#modal-location-edit">ویرایش</button>
                                                                </li>
                                                                <li>
                                                                    <button class="checkout-address-btn-remove"
                                                                            data-toggle="modal"
                                                                            data-target="#remove-location">حذف</button>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <button class="checkout-address-btn-submit">سفارش به این آدرس
                                                        ارسال می‌شود.</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="checkout-address-row">
                                            <div class="checkout-address-col">
                                                <div class="checkout-address-box">
                                                    <h5 class="checkout-address-title">جلال بهرامی راد</h5>
                                                    <p class="checkout-address-text">
                                                        <span>خراسان شمالی، بجنورد،خراسان شمالی-بجنورد</span>
                                                    </p>
                                                    <ul class="checkout-address-list">
                                                        <li>
                                                            <ul class="checkout-address-contact-info">
                                                                <li>کدپستی: <span>۹۹۹۹۹۹۹۹۹۹</span>
                                                                </li>
                                                                <li>شماره همراه: <span>۰۹۰۳۰۸۱۳۷۴۲</span>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <ul>
                                                                <li>
                                                                    <button class="checkout-address-btn-edit"
                                                                            data-toggle="modal"
                                                                            data-target="#modal-location-edit">ویرایش</button>
                                                                </li>
                                                                <li>
                                                                    <button class="checkout-address-btn-remove"
                                                                            data-toggle="modal"
                                                                            data-target="#remove-location">حذف</button>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <button class="checkout-address-btn-submit">ارسال سفارش به این
                                                        آدرس</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="checkout-address-cancel" id="cancel-change-address-btn"></button>
                                </div>
                                <!-- Start Modal location new -->
                                <div class="modal fade" id="modal-location" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg send-info modal-dialog-centered"
                                         role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                                    <i class="now-ui-icons location_pin"></i>
                                                    افزودن آدرس جدید
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
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
                                                                            <input class="input-ui pr-2 text-right"
                                                                                   type="text"
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
                                                                            <input
                                                                                class="input-ui pl-2 dir-ltr text-left"
                                                                                type="text"
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
                                                                                <textarea
                                                                                    class="input-ui pr-2 text-right"
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
                                                                            <input
                                                                                class="input-ui pl-2 dir-ltr text-left placeholder-right"
                                                                                type="text"
                                                                                placeholder=" کد پستی را بدون خط تیره بنویسید">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 pr-4 pl-4">
                                                                        <button type="button"
                                                                                class="btn btn-sm btn-primary btn-submit-form">ثبت
                                                                            و
                                                                            ارسال به این آدرس</button>
                                                                        <button type="button"
                                                                                class="btn-link-border float-left mt-2">انصراف
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
                                <div class="modal fade" id="modal-location-edit" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg send-info modal-dialog-centered"
                                         role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                                    <i class="now-ui-icons location_pin"></i>
                                                    ویرایش آدرس
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
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
                                                                            <input class="input-ui pr-2 text-right"
                                                                                   type="text"
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
                                                                            <input
                                                                                class="input-ui pl-2 dir-ltr text-left"
                                                                                type="text"
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
                                                                                <textarea
                                                                                    class="input-ui pr-2 text-right"
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
                                                                            <input
                                                                                class="input-ui pl-2 dir-ltr text-left placeholder-right"
                                                                                type="text"
                                                                                placeholder=" کد پستی را بدون خط تیره بنویسید">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 pr-4 pl-4">
                                                                        <button type="button"
                                                                                class="btn btn-sm btn-primary btn-submit-form">ثبت
                                                                            و
                                                                            ارسال به این آدرس</button>
                                                                        <button type="button"
                                                                                class="btn-link-border float-left mt-2">انصراف
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
                                <div class="modal fade" id="remove-location" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mb-3" id="exampleModalLabel">آیا مطمئنید که
                                                    این آدرس حذف شود؟</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"
                                                        class="remodal-general-alert-button remodal-general-alert-button--cancel"
                                                        data-dismiss="modal">خیر</button>
                                                <button type="button"
                                                        class="remodal-general-alert-button remodal-general-alert-button--approve">بله</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal remove-location -->
                            </div>
                        </div>
                        @endif
                        <form method="post" id="shipping-data-form" class="dt-sn dt-sn--box pt-3 pb-3">
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                                <h2>انتخاب نحوه ارسال</h2>
                            </div>
                            <div class="checkout-shipment mb-4">
                                <div class="custom-control custom-radio pl-0 pr-3">
                                    <input type="radio" class="custom-control-input" name="radio1" id="radio1"
                                           value="option1" checked>
                                    <label for="radio1" class="custom-control-label">
                                        عادی
                                    </label>
                                </div>
                                <div class="custom-control custom-radio  pl-0 pr-3">
                                    <input type="radio" class="custom-control-input" name="radio1" id="radio2"
                                           value="option2">
                                    <label for="radio2" class="custom-control-label">
                                        سریع‌ (مرسوله‌ها در سریع‌ترین زمان ممکن ارسال می‌شوند)
                                    </label>
                                </div>
                            </div>
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                                <h2>مرسوله ۱ از ۱</h2>
                            </div>
                            <div class="checkout-pack">
                                <section class="products-compact">
                                    <!-- Start Product-Slider -->
                                    <div class="col-12">
                                        <div class="products-compact-slider carousel-md owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="product-card mb-3">
                                                    <a class="product-thumb" href="shop-single.html">
                                                        <img src="/img/products/07.jpg"
                                                             alt="Product Thumbnail">
                                                    </a>
                                                    <div class="product-card-body">
                                                        <h5 class="product-title">
                                                            <a href="shop-single.html">مانتو زنانه</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-card mb-3">
                                                    <a class="product-thumb" href="shop-single.html">
                                                        <img src="/img/products/017.jpg"
                                                             alt="Product Thumbnail">
                                                    </a>
                                                    <div class="product-card-body">
                                                        <h5 class="product-title">
                                                            <a href="shop-single.html">کت مردانه</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-card mb-3">
                                                    <a class="product-thumb" href="shop-single.html">
                                                        <img src="/img/products/013.jpg"
                                                             alt="Product Thumbnail">
                                                    </a>
                                                    <div class="product-card-body">
                                                        <h5 class="product-title">
                                                            <a href="shop-single.html">مانتو زنانه مدل هودی تیک
                                                                تین</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-card mb-3">
                                                    <a class="product-thumb" href="shop-single.html">
                                                        <img src="/img/products/09.jpg"
                                                             alt="Product Thumbnail">
                                                    </a>
                                                    <div class="product-card-body">
                                                        <h5 class="product-title">
                                                            <a href="shop-single.html">مانتو زنانه</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-card mb-3">
                                                    <a class="product-thumb" href="shop-single.html">
                                                        <img src="/img/products/010.jpg"
                                                             alt="Product Thumbnail">
                                                    </a>
                                                    <div class="product-card-body">
                                                        <h5 class="product-title">
                                                            <a href="shop-single.html">مانتو زنانه</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-card mb-3">
                                                    <a class="product-thumb" href="shop-single.html">
                                                        <img src="/img/products/011.jpg"
                                                             alt="Product Thumbnail">
                                                    </a>
                                                    <div class="product-card-body">
                                                        <h5 class="product-title">
                                                            <a href="shop-single.html">مانتو زنانه</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-card mb-3">
                                                    <a class="product-thumb" href="shop-single.html">
                                                        <img src="/img/products/019.jpg"
                                                             alt="Product Thumbnail">
                                                    </a>
                                                    <div class="product-card-body">
                                                        <h5 class="product-title">
                                                            <a href="shop-single.html">تیشرت مردانه</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Product-Slider -->
                                </section>
                                <hr>
                                <div class="row mx-0">
                                    <div class="col-12">
                                        <div class="checkout-tab-times dt-sl">
                                            <ul class="nav nav-tabs dt-sl" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                       href="#home" role="tab" aria-controls="home"
                                                       aria-selected="true">
                                                        سه شنبه
                                                        <span>26 شهریور</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab"
                                                       href="#profile" role="tab" aria-controls="profile"
                                                       aria-selected="false">
                                                        چهارشنبه
                                                        <span>27 شهریور</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link disabled" id="contact-tab" data-toggle="tab"
                                                       href="#contact" role="tab" aria-controls="contact"
                                                       aria-selected="false">
                                                        پنج شنبه
                                                        <span>28 شهریور</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content dt-sl" id="myTabContent">
                                                <div class="tab-pane px-2 pt-2 fade show active" id="home"
                                                     role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="custom-control custom-radio pl-0 pr-3">
                                                        <input type="radio" class="custom-control-input"
                                                               name="radio2" id="radio4" value="option1">
                                                        <label for="radio4" class="custom-control-label">
                                                            ساعت 11 تا 13
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-radio pl-0 pr-3">
                                                        <input type="radio" class="custom-control-input"
                                                               name="radio2" id="radio5" value="option2" checked="">
                                                        <label for="radio5" class="custom-control-label">
                                                            ساعت 13 تا 15
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane px-2 pt-2 fade" id="profile" role="tabpanel"
                                                     aria-labelledby="profile-tab">
                                                    <div class="custom-control custom-radio pl-0 pr-3">
                                                        <input type="radio" class="custom-control-input"
                                                               name="radio3" id="radio6" value="option1">
                                                        <label for="radio6" class="custom-control-label">
                                                            ساعت 11 تا 13
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-radio pl-0 pr-3">
                                                        <input type="radio" class="custom-control-input"
                                                               name="radio3" id="radio7" value="option2" checked="">
                                                        <label for="radio7" class="custom-control-label">
                                                            ساعت 13 تا 15
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane px-2 pt-2 fade" id="contact" role="tabpanel"
                                                     aria-labelledby="contact-tab">...</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="checkout-time-table checkout-time-table-time">
                                        <div class="col-12">
                                            <div class="radio-box custom-control custom-radio pl-0 pr-3">
                                                <input type="radio" class="custom-control-input" name="post-pishtaz"
                                                       id="1" value="1" checked>
                                                <label for="1" class="custom-control-label">
                                                    <img src="/img/svg/d86ea8ec.svg"
                                                         class="checkout-additional-options-checkbox-image" />
                                                    <div class="content-box">
                                                        <div
                                                            class="checkout-time-table-title-bar checkout-time-table-title-bar-city">
                                                            بازه تحویل سفارش: زمان تقریبی تحویل از
                                                            <span>۱۳ خرداد</span>
                                                            تا
                                                            <span>۲۰ خرداد</span>
                                                        </div>
                                                        <ul class="checkout-time-table-subtitle-bar">
                                                            <li>
                                                                شیوه ارسال : پست پیشتاز با ظرفیت اختصاصی برای دیجی
                                                                کالا
                                                            </li>
                                                            <li>
                                                                هزینه ارسال:
                                                                <span class="">رایگان</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="radio-box custom-control custom-radio pl-0 pr-3">
                                                <input type="radio" class="custom-control-input" name="post-pishtaz"
                                                       id="2" value="2">
                                                <label for="2" class="custom-control-label">
                                                    <img src="/img/svg/d86ea8ec.svg"
                                                         class="checkout-additional-options-checkbox-image" />
                                                    <div class="content-box">
                                                        <div
                                                            class="checkout-time-table-title-bar checkout-time-table-title-bar-city">
                                                            بازه تحویل سفارش: زمان تقریبی تحویل از
                                                            <span>۱۳ خرداد</span>
                                                            تا
                                                            <span>۲۰ خرداد</span>
                                                        </div>
                                                        <ul class="checkout-time-table-subtitle-bar">
                                                            <li>
                                                                شیوه ارسال : پست پیشتاز با ظرفیت اختصاصی برای دیجی
                                                                کالا
                                                            </li>
                                                            <li>
                                                                هزینه ارسال:
                                                                <span class="">رایگان</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                                <h2>صدور فاکتور</h2>
                            </div>
                            <div class="checkout-invoice">
                                <div class="checkout-invoice-headline">
                                    <div class="custom-control custom-checkbox pl-0 pr-3">
                                        <input type="checkbox" class="custom-control-input" checked>
                                        <label class="custom-control-label">درخواست ارسال فاکتور خرید</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="mt-5">
                            <a href="#" class="float-right border-bottom-dt"><i
                                    class="mdi mdi-chevron-double-right"></i>بازگشت به سبد خرید</a>
                            <a href="#" class="float-left border-bottom-dt">تایید و ادامه ثبت سفارش<i
                                    class="mdi mdi-chevron-double-left"></i></a>
                        </div>
                    </section>
                </div>
                <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
                    <div class="dt-sn dt-sn--box mb-2">
                        <ul class="checkout-summary-summary">
                            <li>
                                <span>مبلغ کل (۲ کالا)</span><span>۱۶,۸۹۷,۰۰۰ تومان</span>
                            </li>
                            <li class="checkout-summary-discount">
                                <span>سود شما از خرید</span><span><span>(۱٪)</span>۲۰۰,۰۰۰
                                        تومان</span>
                            </li>
                            <li>
                                    <span>هزینه ارسال<span class="help-sn" data-toggle="tooltip" data-html="true"
                                                           data-placement="bottom"
                                                           title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>هزینه ارسال مرسولات می‌تواند وابسته به شهر و آدرس گیرنده متفاوت باشد. در صورتی که هر یک از مرسولات حداقل ارزشی برابر با ۱۵۰هزار تومان داشته باشد، آن مرسوله بصورت رایگان ارسال می‌شود.<br>'حداقل ارزش هر مرسوله برای ارسال رایگان، می تواند متغیر باشد.'</p></div>">
                                            <span class="mdi mdi-information-outline"></span>
                                        </span></span><span>وابسته به آدرس</span>
                            </li>
                            <li class="checkout-club-container">
                                    <span>دیدیکلاب<span class="help-sn" data-toggle="tooltip" data-html="true"
                                                        data-placement="bottom"
                                                        title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>با امتیازهای خود در باشگاه مشتریان دیجی کالا (دیجی کلاب) از بین جوایز متنوع انتخاب کنید.</p></div>">
                                            <span class="mdi mdi-information-outline"></span>
                                        </span></span><span><span>۱۵۰+</span><span> امتیاز</span></span>
                            </li>
                        </ul>
                        <div class="checkout-summary-devider">
                            <div></div>
                        </div>
                        <div class="checkout-summary-content">
                            <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                            <div class="checkout-summary-price-value">
                                <span class="checkout-summary-price-value-amount">۱۶,۶۹۷,۰۰۰</span>
                                تومان
                            </div>
                            <a href="#" class="mb-2 d-block">
                                <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0 pl-0">
                                    <i class="mdi mdi-arrow-left"></i>
                                    تایید و ادامه ثبت سفارش
                                </button>
                            </a>
                            <div>
                                    <span>
                                        کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش
                                        مراحل بعدی را تکمیل کنید.
                                    </span><span class="help-sn" data-toggle="tooltip" data-html="true"
                                                 data-placement="bottom"
                                                 title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش برای شما رزرو می‌شوند. در صورت عدم ثبت سفارش، دیجی‌کالا هیچگونه مسئولیتی در قبال تغییر قیمت یا موجودی این کالاها ندارد.</p></div>">
                                        <span class="mdi mdi-information-outline"></span>
                                    </span></div>
                        </div>
                    </div>
                    <div class="dt-sn dt-sn--box checkout-feature-aside pt-4">
                        <ul>
                            <li class="checkout-feature-aside-item">
                                <img src="/img/svg/return-policy.svg" alt="">
                                هفت روز ضمانت تعویض
                            </li>
                            <li class="checkout-feature-aside-item">
                                <img src="/img/svg/payment-terms.svg" alt="">
                                پرداخت در محل با کارت بانکی
                            </li>
                            <li class="checkout-feature-aside-item">
                                <img src="/img/svg/delivery.svg" alt="">
                                تحویل اکسپرس
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <!-- End main-content -->

    <!-- Start mini-footer -->
    <footer class="mini-footer dt-sl">
        <div class="container main-container">
            <div class="row">
                <div class="col-md-6 col-sm-12 text-left">
                    <i class="mdi mdi-phone-outline"></i>
                    شماره تماس : <a href="#">
                        ۶۱۹۳۰۰۰۰
                        - ۰۲۱
                    </a>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <i class="mdi mdi-email-outline"></i>
                    آدرس ایمیل : <a href="#">info@gmail.com</a>
                </div>
                <div class="col-12 text-center mt-2">
                    <p class="text-secondary text-footer">
                        استفاده از کارت هدیه یا کد تخفیف، درصفحه ی پرداخت امکان پذیر است.
                    </p>
                </div>
                <div class="col-12 text-center">
                    <div class="copy-right-mini-footer">
                        Copyright © 2019 Didikala
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End mini-footer -->

</div>

<!-- Core JS Files -->
<script src="/js/vendor/jquery-3.4.1.min.js"></script>
<script src="/js/vendor/popper.min.js"></script>
<script src="/js/vendor/bootstrap.min.js"></script>
<!-- Plugins -->
<script src="/js/vendor/owl.carousel.min.js"></script>
<script src="/js/vendor/jquery.horizontalmenu.js"></script>
<script src="/js/vendor/jquery.nice-select.min.js"></script>
<script src="/js/vendor/nouislider.min.js"></script>
<script src="/js/vendor/wNumb.js"></script>
<script src="/js/vendor/ResizeSensor.min.js"></script>
<script src="/js/vendor/theia-sticky-sidebar.min.js"></script>
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
</body>

</html>
