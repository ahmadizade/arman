@extends("layouts.master")

@section("title")
    <title>وب سرویس های من | CioCe.ir</title>
@endsection

@section("content")

    <!-- Start main-content -->
        <main class="main-content dt-sl mb-3">
            <div class="container main-container">
                <div class="row">
                    @include('profile.sidebar')
                    <!-- Start Content -->
                    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="px-3 px-res-0">
                                    <div
                                        class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                        <h2>افزودن و ویرایش دامنه</h2>
                                    </div>
                                    <div class="form-ui additional-info dt-sl dt-sn pt-4">
                                        @include('partials.condition')
                                        <form action="{{ route("profile_edit_action") }}" method="post">
                                            <h2 class="font-13 pb-3"><b class="text-danger">توجه :</b> در این بخش اطلاعت صاحب <b class="text-success">دامنه</b> را وارد کنید</h2>
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-6 mb-3">
                                                    <div class="pt-2 pb-2 mb-3 dt-sl">
                                                        <div class="form-row-title mb-2">
                                                            <h3>آدرس دامنه</h3>
                                                        </div>
                                                        <div class="form-row">
                                                            <input name="domain" type="text" class="input-ui text-left dir-ltr p-3"
                                                                   placeholder="Http://">
                                                            <button type="submit" class="btn btn-success float-left mt-3">بررسی
                                                                اطلاعات</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-6 mb-3">
                                                    <div class="pt-2 pb-2 mb-3 dt-sl text-center text-md-left text-lg-left">
                                                        <img class="img-fluid w-50" src="/img/extra/Internet-Domain.jpg">
                                                    </div>
                                                </div>
{{--                                                <div class="col-12 mb-3">--}}
{{--                                                    <div class="form-row mt-2">--}}
{{--                                                        <div class="custom-control custom-checkbox float-right mt-2">--}}
{{--                                                            <input type="checkbox" class="custom-control-input"--}}
{{--                                                                   id="customCheck3">--}}
{{--                                                            <label class="custom-control-label text-justify"--}}
{{--                                                                   for="customCheck3">--}}
{{--                                                                تبعه خارجی فاقد کد ملی هستم--}}
{{--                                                            </label>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-row mt-2">--}}
{{--                                                        <div class="custom-control custom-checkbox float-right mt-2">--}}
{{--                                                            <input type="checkbox" class="custom-control-input"--}}
{{--                                                                   id="customCheck4">--}}
{{--                                                            <label class="custom-control-label text-justify"--}}
{{--                                                                   for="customCheck4">--}}
{{--                                                                قبلا از خدمات سی و سه استفاده کرده ام--}}
{{--                                                            </label>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>







                        <div class="col-12 mt-3">
                            <div
                                class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                <h2>وب سرویس های من</h2>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="card-horizontal-product">
                                        <div class="card-horizontal-product-thumb">
                                            <a href="#">
                                                <img src="./assets/img/products/017.jpg" alt="">
                                            </a>
                                            <small class="font-weight-bold">امتیاز وب سرویس</small>
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                        </div>
                                        <div class="card-horizontal-product-content">
                                            <div class="label-status-comment">تایید شده</div>
                                            <div class="card-horizontal-comment-title">
                                                <a href="#">
                                                    <h3>عالیه</h3>
                                                </a>
                                            </div>
                                            <div class="card-horizontal-comment">
                                                <p>من اینو 6 ماه پیش خریدم واقعا عالیه،هم جنسش و هم وقتی میپوشی
                                                    عالیه..یکی دیگم گرفتم ازش دوباره..واقعا پیشنهادش میکنم.من
                                                    اینو 6 ماه پیش خریدم واقعا عالیه،هم جنسش و هم وقتی میپوشی
                                                    عالیه..یکی دیگم گرفتم ازش دوباره..واقعا پیشنهادش میکنم.من
                                                    اینو 6 ماه پیش خریدم واقعا عالیه،هم جنسش و هم وقتی میپوشی
                                                    عالیه..یکی دیگم گرفتم ازش دوباره..واقعا پیشنهادش میکنم.من
                                                    اینو 6 ماه پیش خریدم واقعا عالیه،هم جنسش و هم وقتی میپوشی
                                                    عالیه..یکی دیگم گرفتم ازش دوباره..واقعا پیشنهادش میکنم.من
                                                    اینو 6 ماه پیش خریدم واقعا عالیه،هم جنسش و هم وقتی میپوشی
                                                    عالیه..یکی دیگم گرفتم ازش دوباره..واقعا پیشنهادش میکنم.</p>
                                            </div>
                                            <div class="card-horizontal-product-buttons">
                                                <div class="float-right">
                                                    <span class="count-like">
                                                        <i class="mdi mdi-thumb-up-outline"></i>11
                                                    </span>
                                                    <span class="count-like">
                                                        <i class="mdi mdi-thumb-down-outline"></i>2
                                                    </span>
                                                </div>
                                                <button class="btn btn-light">حذف</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card-horizontal-product">
                                        <div class="card-horizontal-product-thumb">
                                            <a href="#">
                                                <img src="./assets/img/products/019.jpg" alt="">
                                            </a>
                                            <small class="font-weight-bold">امتیاز من به محصول</small>
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                        </div>
                                        <div class="card-horizontal-product-content">
                                            <div class="label-status-comment">تایید شده</div>
                                            <div class="card-horizontal-comment-title">
                                                <a href="#">
                                                    <h3>خوب نیست</h3>
                                                </a>
                                            </div>
                                            <div class="card-horizontal-comment">
                                                <p>جنسش خوب نیست..چسبم هست..</p>
                                            </div>
                                            <div class="card-horizontal-product-buttons">
                                                <div class="float-right">
                                                    <span class="count-like">
                                                        <i class="mdi mdi-thumb-up-outline"></i>31
                                                    </span>
                                                    <span class="count-like">
                                                        <i class="mdi mdi-thumb-down-outline"></i>0
                                                    </span>
                                                </div>
                                                <button class="btn btn-light">حذف</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Content -->
                </div>
            </div>
        </main>
        <!-- End main-content -->
@endsection

@section('extra_js')

@endsection
