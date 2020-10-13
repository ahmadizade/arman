@extends("layouts.master")

@section("title")
    <title>کاربر طلایی | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container-fluid">
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
                                class="far fa-address-card font-weight-bold pt-1 text-primary"></span> فرم ثبت درخواست و پشتیبانی </h3>
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
                            <div class="alert alert-success mb-2">{{ Session::get("status") }}</div>
                        @endif
                        <div class="row">
                            <div class="col-12 col-lg-12">

                                <div class="row">
                                    <div class="col-12 col-lg-3 mb-2 text-center bg-success border-bottom-1 pb-2">
                                        <img src="/images/icon/download (1).png" class="bti-icon img-fluid" title="Bazarti-link">
                                        <span>ثمین سایت ها</span>
                                    </div>
                                    <div class="col-12 col-lg-3 mb-2 text-center border-bottom-1 pb-2">
                                        <img src="/images/icon/support.png" class="bti-icon img-fluid" title="Bazarti-link">
                                        <span>پشتیبانی فنی</span>
                                    </div>


                                    <div class="col-12 col-lg-3 mb-2 text-center border-bottom-1 pb-2">
                                        <img src="/images/icon/tel.png" class="bti-icon img-fluid" title="Bazarti-link">
                                        <span>021-83976232</span>
                                    </div>
                                    <div class="col-12 col-lg-3 mb-2 text-center border-bottom-1 pb-2">
                                        <img src="/images/icon/instagram.png" class="bti-icon img-fluid" title="Bazarti-link">
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
                                            <input id="name" name="name" class="form-control" value="نام و نام خانوادگی">
                                        </div>
                                        <div class="col-12 col-lg-6 mt-2">
                                            <input id="mobile" name="mobile" class="form-control" value="شماره تماس">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-12 mt-2">
                                        <div class="form-group">
                                            <textarea name="desc" id="" cols="30" rows="10" class="form-control myfont font-12" placeholder="شرح درخواست"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="contact_btn" id=",contact-btn" class="btn btn-primary btn-sm">ارسال درخواست</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
