@extends("layouts.master")
@section("title")
    <title>دسته بندی ها | آرمان</title>
    <meta name="description" content="دسته بندی ها">
    <meta name="robots" content="all">
@endsection

@section("content")

    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>دسته بندی ها</h1>
                <ul>
                    <li><a href="{{route('home')}}">خانه</a></li>
                    <li>آرمان</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start Gallery Area -->
    @if(isset($thecategory) && isset($thecategory[0]))
        <section class="gallery-area pt-70 pb-40">
            <div class="container">
                <div class="row">
                    @foreach($thecategory as $item)
                    <div class="col-lg-4 col-md-6 col-sm-6 text-center">
                        <div class="single-gallery-item text-center">
                            <a href="{{route('single_category',["slug" => $item->slug])}}">
                                <img src="/uploads/category/{{$item->image}}" alt="{{$item->name}}">
                                <p class="mt-3">{{$item->name}}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- End Gallery Area -->

@endsection
