@extends("layouts.master")

@section("title")
    <title>بازار تهاتر ایرانیان | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container" style="margin-top: 80px">
        <div class="row">
            @include("profile.sidebar")
            <div class="col-12 col-lg-9">

            </div>
        </div>
    </div>

@endsection

@section('extra_js')
    <script src="{{url('/js/app_jquery.js')}}"></script>
@stop
