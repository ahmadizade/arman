@extends("layouts.master")

@section("title")
    <title>پیشخوان | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container" style="margin-top: 80px">
        <div class="row">
            @include("profile.sidebar")
            <div class="col-12 col-lg-9 mt-3">
                <p class="mb-0 text-center">
                    <img src="/images/profile/logo.png" class="img-fluid w-25" alt="">
                </p>
                <hr>
                <h2 class="text-center">به بازار تهاتر ایرانیان خوش آمدید</h2>
            </div>
        </div>
    </div>

@endsection

@section('extra_js')
    <script src="{{url('/js/app_jquery.js')}}"></script>
@endsection
