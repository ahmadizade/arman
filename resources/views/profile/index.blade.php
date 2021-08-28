@extends("layouts.master")

@section("title")
<title>پروفایل کاربری | armanmask.ir</title>
@endsection

@section("content")
    @if(isset($user) && \Illuminate\Support\Facades\Auth::check())


                    <!-- Start Page Title Area -->
                    <section class="page-title-area">
                        <div class="container">
                            <div class="page-title-content">
                                <h1>پروفایل کاربری</h1>
                                <ul>
                                    <li><a href="#">خانه</a></li>
                                    <li>{{$user->name ?? ""}}</li>
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
                                        <div class="article-content">
                                            <div class="entry-meta">
                                                <ul>
                                                    <li>
                                                        <i class="bx bx-folder-open"></i>
                                                        <span>کیف پول </span>
                                                        <a href="{{ route("profile_bookmark") }}">{{number_format($user->credit) ?? ""}} تومان</a>
                                                    </li>
                                                    <li>
                                                        <i class="bx bx-group"></i>
                                                        <span>نشان شده ها</span>
                                                        @if(isset($bookmark))
                                                            {{count($bookmark) ?? "0 عدد"}}
                                                        @else
                                                            0 عدد
                                                        @endif
                                                    </li>
                                                    <li>
                                                        <i class="bx bx-calendar"></i>
                                                        <span>سفارشات من</span>
                                                        @if(isset($orders[0]))
                                                            {{count($orders) ?? "0 عدد"}}
                                                        @else
                                                            0 عدد
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="comments-area">
                                                @include('partials.condition')

                                                <div class="comment-respond">
                                                    <p class="comment-reply-title">ویرایش اطلاعات کاربری</p>

                                                    <form id="profile_edit_form" class="comment-form">
                                                        <p class="comment-notes">
                                                            <span id="email-notes">از طریق فرم زیر می توانید اطلاعات خود را تکمیل فرمایید. </span>

                                                        </p>
                                                        <p class="comment-form-author">
                                                            <label>نام <span class="required">*</span></label>
                                                            <input type="text" placeholder="نام " name="name" value="{{$user->name ?? ""}}">
                                                        </p>
                                                        <p class="comment-form-author">
                                                            <label>نام خانوادگی <span class="required">*</span></label>
                                                            <input type="text" placeholder="نام خانوادگی" name="family" value="{{$user->family ?? ""}}">
                                                        </p>

                                                        <p class="comment-form-author">
                                                            <label>شماره همراه</label>
                                                            <input type="text" disabled placeholder="شماره همراه" name="url" value="{{$user->mobile ?? ""}}">
                                                        </p>

                                                         <p class="comment-form-author">
                                                            <label>شماره ثابت</label>
                                                            <input type="text" placeholder="شماره ثابت" name="phone" value="{{$user->profile->phone ?? ""}}">
                                                        </p>

                                                        <p class="comment-form-author">
                                                            <label>ایمیل <span class="required">*</span></label>
                                                            <input type="email" placeholder="رایانامه" name="email" value="{{$user->email ?? ""}}">
                                                        </p>

                                                        <p class="comment-form-author">
                                                            <label>کد ملی <span class="required">*</span></label>
                                                            <input type="text" placeholder="کد ملی" name="national_code" value="{{$user->profile->national_code ?? ""}}">
                                                        </p>


                                                        <p class="comment-form-comment">
                                                            <label>آدرس</label>
                                                            <textarea name="comment" id="comment" cols="45" placeholder="آدرس..." rows="5" maxlength="65525" ></textarea>
                                                        </p>
                                                        <p class="form-submit">
                                                            <input type="submit" name="submit" id="product_edit_btn" class="submit" value="ویرایش اطلاعات">
                                                        </p>
                                                    </form>
                                                </div>
                                            </div>

                                            <ul class="wp-block-gallery columns-3">
                                                <li class="blocks-gallery-item">
                                                    <figure>
                                                        <img src="/img/blog/blog-img4.jpg" alt="تصویر">
                                                    </figure>
                                                </li>

                                                <li class="blocks-gallery-item">
                                                    <figure>
                                                        <img src="/img/blog/blog-img5.jpg" alt="تصویر">
                                                    </figure>
                                                </li>

                                                <li class="blocks-gallery-item">
                                                    <figure>
                                                        <img src="/img/blog/blog-img6.jpg" alt="تصویر">
                                                    </figure>
                                                </li>
                                            </ul>


                                        </div>

                                    </div>
                                </div>
                                @include('profile.sidebar')

                            </div>
                        </div>
                    </section>
                    <!-- End Blog Details Area -->
    @endif
@endsection


@section('extra_js')
    <script>
        $( document ).ready(function() {
            $('body').on('click','.delete_bookmark i',function (e){
                e.preventDefault();
                $.ajax({
                   url : '{{route('profile_bookmark_delete')}}',
                   type : 'POST',
                   data : {'id' : $(this).attr("data-id")},
                    success : function (data){
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
                                showConfirmButton: false,
                                timer: 3000
                            });
                            location.reload();
                        }
                    }
                });
            });

            $('body').on('click','#product_edit_btn',function (e){
                e.preventDefault();
                $.ajax({
                   url : "{{route('profile_edit_action')}}",
                    type : "POST",
                    data : $('#profile_edit_form').serialize(),
                    success : function (data) {
                       console.log(data);
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
                                showConfirmButton: false,
                                timer: 3000
                            });
                            location.reload();
                        }
                    }
                });

            });
        });
    </script>
@endsection
