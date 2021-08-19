@extends("layouts.master")

@section("title")
    <title>آرمان | تماس با ما</title>
@endsection

@section("content")
    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>با ما تماس بگیرید</h1>
                <ul>
                    <li><a href="{{route('home')}}">خانه</a></li>
                    <li>با ما تماس بگیرید</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start Contact Area -->
    <section class="contact-info-area pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-contact-info-box">
                        <div class="icon">
                            <i class="flaticon-placeholder"></i>
                        </div>
                        <h3>نشانی</h3>
                        <p><a href="javascript:void(0)">ایران - تهران</a></p>
                        <p><a href="javascript:void(0)">خیابان فاطمی</a></p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-contact-info-box">
                        <div class="icon">
                            <i class="flaticon-phone-ringing"></i>
                        </div>
                        <h3>تلفن</h3>
                        <p><a href="tel:55656644">خط تلفن: 55656644</a></p>
                        <p><a href="tel:+1234567898">پشتیبانی فنی: 22407239-021</a></p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-contact-info-box">
                        <div class="icon">
                            <i class="flaticon-email"></i>
                        </div>
                        <h3>پست الکترونیک</h3>
                        <p><a href="mailto:hello@drodo.com">info@arman.com</a></p>
                        <p><a href="#">اسکایپ: آرمان</a></p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-contact-info-box">
                        <div class="icon">
                            <i class="flaticon-clock"></i>
                        </div>
                        <h3>ساعات کاری</h3>
                        <p>شنبه - جمعه</p>
                        <p>8:00 صبح - 16:00 ظهر</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="contact-form">
                        <span class="sub-title">در تماس باشید</span>
                        <h2>ما می خواهیم یک تجربه عالی را برای شما فراهم کنیم</h2>
                        <form id="contact_us">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>نام و نام خانوادگی</label>
                                        <input type="text" name="name" class="form-control" id="name" required="" data-error="لطفا نام خود را وارد کنید">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>آدرس ایمیل</label>
                                        <input type="email" name="email" class="form-control" id="email" required="" data-error="لطفا ایمیل خود را وارد کن">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>موبایل</label>
                                        <input type="text" name="mobile" class="form-control" id="mobile" required="" data-error="لطفا شماره تلفن خود را وارد کنید">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>موضوع</label>
                                        <input type="text" name="subject" class="form-control" id="subject">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>پیام</label>
                                        <textarea name="desc" id="desc" class="form-control" cols="30" rows="6" required="" data-error="لطفا پیام خود را وارد کنید"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button id="contact_btn" type="submit" class="default-btn pb-3">ارسال پیام</button>
                                    <div id="msgSubmit" class="h3 text-center hidden mt-3"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="contact-image text-center">
                        <img src="/img/contact.png" alt="تصویر">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="maps">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46660.669043361966!2d-76.17429939609431!3d43.03529129888566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d9f3b8019f2991%3A0x58d5929e21a62e5!2sDinosaur%20Bar-B-Que!5e0!3m2!1sen!2sbd!4v1593527523138!5m2!1sen!2sbd"></iframe>
    </div>
    <!-- End Contact Area -->
@endsection

@section("extra_js")
    <script>
        $(document).on('click','#contact_btn', function (e){
            e.preventDefault();
            $.ajax({
                'url' : '{{route('contact_action')}}',
                'type' : 'POST',
                'data' : $('#contact_us').serialize(),
                success : function (data){
                    console.log(data)
                    if(data.status == "0") {
                        Swal.fire({
                            position: 'top-end',
                            toast: true,
                            icon: 'error',
                            text: data.desc,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                    if(data.status == "1") {
                        Swal.fire({
                            position: 'top-end',
                            toast: true,
                            icon: 'success',
                            text: data.desc,
                            title: 'CioCe.ir',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                }
            });
        });
    </script>
@endsection
