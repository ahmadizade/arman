@extends("layouts.master")

@section("title")
<title>کیف پول من | armanmask.ir</title>
@endsection

@section("content")

    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>شارژ کیف پول</h1>
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
                                    <p class="comment-reply-title mt-5">اعتبار فعلی شما :
                                        @if(\Illuminate\Support\Facades\Auth::user()->credit > 0)
                                            {{number_format(\Illuminate\Support\Facades\Auth::user()->credit)}} تومان
                                        @else
                                            0 تومان
                                        @endif

                                    </p>

                                    <form action="{{ route("profile_credit_action") }}" class="comment-form" method="post">
                                        <p class="comment-notes">
                                            <span id="email-notes">از طریق فرم زیر می توانید اعتبار کیف پول خود را افزایش دهید. </span>
                                        </p>


                                        <div class="input-group">
                                            <label>اعتبار</label>
                                            <input class="number-format" type="text" id="credit" placeholder="برای مثال  :  1,000,000 ریال" name="credit" value="{{ old("credit") }}">
                                        </div>


                                        <div class="input-group mt-2">
                                            <input type="text" class="form-control words no-outline">
                                        </div>

                                        <p class="form-submit">
                                            <input type="submit" name="submit" class="submit" value="انتقال به بانک">
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
    <script src="/js/accounting.js"></script>
    <script>
        $( document ).ready(function() {
            $('.number-format').on('keyup', function () {
                $price = accounting.formatNumber($(this).val());
                $(this).val($price);
                $(".words").val(Num2persian($(this).val()) + " ریال ");
            });
        });
    </script>
@endsection
