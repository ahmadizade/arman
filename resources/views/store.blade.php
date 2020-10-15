@extends("layouts.master")

@section("title")
    <title>فروشگاه {{ $result['title'] }}
        @if(Str::length($result['branch_slug']) > 0)
             شعبه {{ $result['branch'] }}
        @endif
        | ثمین تخفیف</title>
@endsection
@section("extra_css")
    <style>
        h1,h2,h3,h4,h5,h6{
            color: {{ $result['color'] }};
        }
        .logo_shop_bg{
            background-color:{{ $result['color'] }}
        }
    </style>
@endsection

@section("content")

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12 col-lg-2 logo_shop d-flex justify-content-center align-self-center">
                        <img @if(Str::length($result['logo'] ) > 0) src="/images/shop/logo/{{ $result['logo'] }}" @else src="/images/shop/logo/no-image.png" @endif class="img-fluid" style="max-width: 140px;max-height: 140px" alt="logo">
                    </div>
                    <div class="col-12 col-lg-10 logo_shop_bg">
                        <h1 class="mb-0 px-2 py-3 font-14 text-white">
                            <span class="font-19 nowrap"><i class="fa fa-shopping-basket pl-2"></i>فروشگاه {{ $result['title'] }}</span>
                            @if(Str::length($result['branch_slug']) > 0)
                                <sub><span class="nowrap font-12"><i class="fa fa-map-marker text-white pr-3 pl-1"></i> شعبه {{ $result['branch'] }} </span></sub>
                            @endif
                            <hr>
                             آدرس:<span class="font-13"> {{ $result['address'] }} </span>
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
                            <div class="alert text-center alert-success mb-2">{{ Session::get("status") }}</div>
                        @endif
                        <div class="row">
                            <div class="col-12 col-lg-12 store_desc">
                                {!! $result['desc'] !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
