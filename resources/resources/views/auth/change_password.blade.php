@extends("layouts.master")

@section("title")
    <title>تنظیمات کاربری | armanmask.ir</title>
@endsection

@section("content")

    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>ویرایش رمز عبور</h1>
                <ul>
                    <li><a href="{{route('home')}}">خانه</a></li>
                    <li>{{$user->name ?? ""}} {{$user->family ?? ""}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start Blog Details Area -->
    <section class="blog-details-area ptb-70">
        <div class="container">
            <div class="row">

                <div class="col-lg-9 col-md-12">
                    <div class="blog-details-desc">
                        <div class="article-content text-center">
                            <div class="comments-area">
                                @include('partials.condition')

                                <div class="comment-respond">
                                    <p class="comment-reply-title mt-5">ویرایش رمز عبور</p>
                                    <form action="{{route('change_password_action')}}" class="comment-form" method="POST">
                                        <p class="comment-notes">
                                            <span id="email-notes">از طریق فرم زیر می توانید رمز عبور خود را ایجاد و یا ویرایش کنید. </span>
                                        </p>
                                        <p class="comment-form-author">
                                            <label>شماره همراه شما <span class="required">*</span></label>
                                            <input type="text" disabled placeholder="شماره همراه " value="{{$user->mobile}}">
                                        </p>
                                        <p class="comment-form-author">
                                            <label>رمز عبور فعلی <span class="required">*</span></label>
                                            <input type="password" placeholder="رمز عبور فعلی " name="old_password">
                                        </p>
                                        <p class="comment-form-author">
                                            <label>رمز عبور جدید <span class="required">*</span></label>
                                            <input type="password" placeholder="رمز عبور جدید" name="password">
                                        </p>

                                        <p class="comment-form-author">
                                            <label>تکرار رمز عبور جدید</label>
                                            <input type="password" placeholder="تکرار رمز عبور جدید" name="confirm_password">
                                        </p>

                                        <p class="form-submit">
                                            <input type="submit" name="submit" id="product_edit_btn" class="submit" value="ویرایش رمز عبور">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('profile.sidebar')

            </div>
        </div>
    </section>
    <!-- End Blog Details Area -->



@endsection

@section('extra_js')

@endsection
