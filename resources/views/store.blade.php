@extends("layouts.master")

@section("title")
    <title>فروشگاه | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 col-lg-12 logo_shop_bg">
                <div class="row">
                    <div class="col-12 col-lg-2 logo_shop d-flex justify-content-center align-self-center">
                        <img @if(Str::length($result['logo'] ) > 0) src="/images/shop/logo/{{ $result['logo'] }}" @else src="/images/shop/logo/no-image.png" @endif class="img-fluid" style="max-width: 120px;max-height: 120px" alt="logo">
                    </div>
                    <div class="col-12 col-lg-10">
                        <h1 class="mb-0 px-2 py-3 font-14 text-white">
                            <span class="font-18 nowrap"><i class="fa fa-shopping-basket pl-2"></i>فروشگاه {{ $result['title'] }}</span>
                            @if(Str::length($result['branch_slug']) > 0)
                                <hr>
                                <span class="nowrap font-13"><i class="fa fa-map-marker-alt text-white pl-2"></i> شعبه {{ $result['branch'] }} </span>
                            @endif
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <div class="card shadow border-0 mt-3">
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
                                {!! $result['desc'] !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
