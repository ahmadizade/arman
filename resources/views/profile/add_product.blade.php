@extends("layouts.master")

@section("title")
    <title>بازار تهاتر ایرانیان | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container" style="margin-top: 80px">
        <div class="row">
            @include("profile.sidebar")
            <div class="col-12 col-lg-9">
                <div class="col-12">
                    <p><span class="">نام و نام خانوادگی :</span> <span>{{$user->name}}</span></p>

                    <textarea name="desc" id="desc" cols="30" rows="7"
                              class="form-control"
                              placeholder="توضیحات..."></textarea>
                </div>
            </div>
            @endsection

            @section('extra_js')
                <script src="{{url('/js/app_jquery.js')}}"></script>
                <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace('content');
                </script>

@stop

