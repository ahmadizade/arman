@extends("layouts.master")

@section("title")
<title>armanmask.ir | سبد خرید</title>
@endsection

@section('extra_css')
    <link rel="stylesheet" href="/css/vendor/nouislider.min.css">
@endsection

@section("content")


    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>پرداخت</h1>
                <ul>
                    <li><a href="{{route('home')}}">خانه</a></li>
                    <li>پرداخت</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start Checkout Area -->
    <section class="checkout-area ptb-70">
        <div class="container">
            <div class="user-actions">
                <i class="bx bx-log-in"></i>
                <span>حساب ندارید؟ <a href="profile-authentication.html">برای ورود اینجا کلیک کنید</a></span>
            </div>

            <form>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="billing-details">
                            <h3 class="title">جزئیات صورتحساب</h3>

                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>کشور <span class="required">*</span></label>

                                        <div class="select-box">
                                            <select>
                                                <option>امارات متحده عربی</option>
                                                <option>چین</option>
                                                <option>انگلستان</option>
                                                <option>آلمان</option>
                                                <option>فرانسه</option>
                                                <option>ژاپن</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>نام <span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>نام خانوادگی <span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>نام شرکت</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>آدرس <span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>شهر <span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>  شهرستان <span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label> کدپستی<span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>آدرس ایمیل <span class="required">*</span></label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>تلفن <span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="create-an-account">
                                        <label class="form-check-label" for="create-an-account">حساب ایجاد می کنید؟</label>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="ship-different-address">
                                        <label class="form-check-label" for="ship-different-address">به آدرس دیگری ارسال شود؟</label>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="notes" id="notes" cols="30" rows="5" placeholder="یادداشت های سفارش" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="order-details">
                            <h3 class="title">سفارش شما</h3>

                            <div class="order-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">نام محصول</th>
                                        <th scope="col">جمع</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <tr>
                                        <td class="product-name">
                                            <a href="#">ظروف آرایشی</a>
                                        </td>

                                        <td class="product-total">
                                            <span class="subtotal-amount">139000 تومان</span>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="payment-box">
                                <div class="payment-method">
                                    <p>
                                        <input type="radio" id="direct-bank-transfer" name="radio-group" checked="">
                                        <label for="direct-bank-transfer">انتقال مستقیم بانکی</label>
                                        پرداخت خود را مستقیماً به حساب بانکی ما انجام دهید. لطفاً از شناسه سفارش خود به عنوان مرجع پرداخت استفاده کنید. تا زمانی که وجه در حساب ما پاک نشود ، سفارش شما ارسال نمی شود.
                                    </p>
                                    <p>
                                        <input type="radio" id="paypal" name="radio-group">
                                        <label for="paypal">پی پال</label>
                                    </p>
                                    <p>
                                        <input type="radio" id="cash-on-delivery" name="radio-group">
                                        <label for="cash-on-delivery">پرداخت نقدی هنگام تحویل</label>
                                    </p>
                                </div>
                                <a href="#" class="default-btn"><i class="flaticon-tick"></i>سفارش دهید<span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Checkout Area -->


@endsection
@section('extra_js')

@endsection
