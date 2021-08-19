@extends("layouts.master")
@section("title")
    @if(\Illuminate\Support\Str::length($singleCategory->seo_title) > 1)
        <title>{{ $singleCategory->seo_title }} - آرمان</title>
    @else
        <title>{{ $singleCategory->name ?? '' }} - آرمان</title>
    @endif
    @if(\Illuminate\Support\Str::length($singleCategory->seo_description) > 1)
        <meta name="description" content="{{ $singleCategory->seo_description }}">
    @endif
    <meta name="robots" content="all">
    @if(\Illuminate\Support\Str::length($singleCategory->seo_canonical) > 1)
        <link rel="canonical" href="{{ $singleCategory->seo_canonical }}">
    @else
        <link rel="canonical" href="{{ route("single_category" , ["slug" => $singleCategory->slug]) }}">
    @endif
    @if(\Illuminate\Support\Str::length($singleCategory->seo_title) > 1)
        <meta property="og:title" content="{{ $singleCategory->seo_title }} - آرمان">
    @else
        <meta property="og:title" content="{{ $singleCategory->name ?? '' }} - آرمان">
    @endif
    <meta property="og:url" content="{{ url()->current() }}">
    @if(\Illuminate\Support\Str::length($singleCategory->seo_description) > 1)
        <meta property="og:site_name" content="{{ $singleCategory->seo_description }}">
    @endif
    <meta property="og:image" content="{{ request()->getSchemeAndHttpHost() . '/img/uploads/category/' . $singleCategory->image ?? '/img/home/logo.png'}}">
@endsection

@section("content")


    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>{{$singleCategory->name}}</h1>
                <ul>
                    <li><a href="{{route('home')}}">خانه</a></li>
                    <li>{{$singleCategory->english_name}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start Customer Service Area -->
    <section class="customer-service-area ptb-70">
        <div class="container">
            <div class="customer-service-content mt-3">
                <div class="text-center">
                    <img class="img-fluid" src="/uploads/category/{{$singleCategory->image}}">
                    <p class="font-weight-bold my-4">{{$singleCategory->name ?? "ثبت نشده"}} / {{$singleCategory->english_name ?? ""}}</p>
                </div>
                {{$singleCategory->description}}
            </div>
        </div>
    </section>
    <!-- End Customer Service Area -->


    <!-- Start Products Area -->
    @if(isset($mostVisited) && isset($mostVisited[0]))
        @include('partials.most_visited')
    @endif
    <!-- End Products Area -->


    <!-- Start Products Area -->
    @if(isset($lastProduct) && isset($lastProduct[0]))
        @include('partials.last_product')
    @endif
    <!-- End Products Area -->


@endsection
