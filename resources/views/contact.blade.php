@extends("layouts.master")

@section("title")
    <title>کاربر طلایی | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container">
        <div class="row">
            <div class="col-12">
                <img src="/images/bg/contact_banner_dsk.jpg" class="img-fluid shadow" alt="">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card shadow mt-3">
                    <div class="card-header p-3">
                        <h3 class="mb-0 font-14 float-right"><span
                                class="far fa-address-card font-weight-bold pt-1 text-primary"></span> فرم ثبت درخواست و
                            پشتیبانی </h3>
                    </div>
                    <div class="card-body p-3">
                        @if ($errors->any())
                            <div class="alert alert-danger mb-2">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has("status"))
                            <div class="alert alert-success text-center mb-2">{{ Session::get("status") }}</div>
                        @endif
                        <div class="row">
                            <div class="col-12 col-lg-12">

                                <div class="row">

                                    <div class="col-12 col-lg-3 mb-2 text-center border-bottom-1 pb-2">
                                        <img src="/images/icon/download (1).png" class="bti-icon img-fluid"
                                             title="Bazarti-link">
                                        <span>ثمین سایت ها</span>
                                    </div>
                                    <div class="col-12 col-lg-3 mb-2 text-center border-bottom-1 pb-2">
                                        <img src="/images/icon/support.png" class="bti-icon img-fluid"
                                             title="Bazarti-link">
                                        <span>پشتیبانی فنی</span>
                                    </div>

                                    <div class="col-12 col-lg-3 mb-2 text-center border-bottom-1 pb-2">
                                        <img src="/images/icon/tel.png" class="bti-icon img-fluid" title="Bazarti-link">
                                        <span>021-83976232</span>
                                    </div>
                                    <div class="col-12 col-lg-3 mb-2 text-center border-bottom-1 pb-2">
                                        <img src="/images/icon/instagram.png" class="bti-icon img-fluid"
                                             title="Bazarti-link">
                                        <span>www.Bazarti.com</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <form>
                                <div class="row">
                                    <div class="input-group">
                                        <div class="col-12 col-lg-6 mt-2">
                                            <input id="name" name="name" class="form-control"
                                                   placeholder="نام و نام خانوادگی">
                                        </div>
                                        <div class="col-12 col-lg-6 mt-2">
                                            <input id="mobile" name="mobile" class="form-control"
                                                   placeholder="شماره تماس">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-12 mt-2">
                                        <div class="form-group">
                                            <textarea name="desc" id="" cols="30" rows="10"
                                                      class="form-control myfont font-12"
                                                      placeholder="شرح درخواست"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-left">
                                    <button type="submit" name="contact_btn" id=",contact-btn"
                                            class="btn btn-primary btn-sm">ارسال درخواست
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12 col-lg-4">--}}
{{--                <iframe width="460" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"--}}
{{--                        id="gmap_canvas"--}}
{{--                        src="https://maps.google.com/maps?width=460&amp;height=300&amp;hl=en&amp;q=%20%D8%AA%D9%87%D8%B1%D8%A7%D9%86+(%D9%86%D8%B4%D8%A7%D9%86%DB%8C%20%D9%85%D8%A7)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>--}}
{{--                <a href='https://addmap.net/'>how to add google maps to a website</a>--}}
{{--                <script type='text/javascript'--}}
{{--                        src='https://maps-generator.com/google-maps-authorization/script.js?id=2d5fc4cb127e2ac6f3c4abfab5246aba5dee27e6'></script>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
