@extends("layouts.master")

@section("title")
    <title>علاقمندی های من | armanmask.ir</title>
@endsection

@section("content")

    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>علاقه مندی ها</h1>
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
                                                <!-- Start Categories Area -->
                                    <section class="categories-area pt-70 pb-40">
                                        <div class="container">
                                            <div class="section-title">
                                                <h5>علاقه مندی ها</h5>
                                            </div>
                                                <div class="row">
                                                    @if (isset($bookmark[0]))
                                                        @foreach($bookmark as $item)
                                                        <div class="col-lg-3 col-sm-4 col-md-4">
                                                            <div class="single-categories-box">
                                                                <a href="{{ route("single_product",["slug" => $item->product->product_slug]) }}">
                                                                    <img style="max-width:150px;max-height: 130px" class="img-fluid" src="/uploads/thumbnail/{{$item->product->thumbnail ?? "noimage_64.jpg"}}" alt="{{$item->product_name}}">
                                                                </a>
                                                                <h3>
                                                                    <a href="{{ route("single_product",["slug" => $item->product->product_slug]) }}">
                                                                        <p>{{$item->product->product_name ?? ""}}</p>
                                                                    </a>
                                                                </h3>
                                                                <button data-id="{{$item->id}}" type="button" class="btn btn-sm btn-danger delete_bookmark">حذف کن!</button>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    @else
                                                        <div class="col-12">
                                                                <div class="dt sl dt-sn dt-sn--box pt-3 pb-5">
                                                                    <div class="cart-page cart-empty">
                                                                        <div class="circle-box-icon">
                                                                            <i class="mdi mdi-cart-remove"></i>
                                                                        </div>
                                                                        <p class="cart-empty-title">متاسفانه محصولی موجود نیست!</p>
                                                                        <a href="{{route('home')}}" class="btn-primary-cm">بازگشت به صفحه اصلی</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </section>
                                    <!-- End Categories Area -->
                                    </div>
                                </div>
                            </div>
                        </div>
        @include('profile.sidebar')
    </section>
    <!-- End Blog Details Area -->
@endsection
@section('extra_js')
    <script>
        $( document ).ready(function() {
            $('body').on('click','.delete_bookmark',function (e){
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
                                title: "armanmask",
                                text: data.desc,
                                footer: "www.armanmask.ir",
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                        if(data.status == "1") {
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'success',
                                title: "armanmask",
                                text: data.desc,
                                footer: "www.armanmask.ir",
                                showConfirmButton: false,
                                timer: 3000
                            });
                            window.location.reload();
                        }
                    }
                });
            });
        });
    </script>

    <script>
        $( document ).ready(function() {
            $('body').on('click','.delete_like i',function (e){
                e.preventDefault();
                $.ajax({
                    url : '{{route('profile_like_delete')}}',
                    type : 'POST',
                    data : {'id' : $(this).attr("data-id")},
                    success : function (data){
                        if(data.status == "0") {
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'error',
                                title: "armanmask",
                                text: data.desc,
                                footer: "www.armanmask.ir",
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                        if(data.status == "1") {
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'success',
                                title: "armanmask",
                                text: data.desc,
                                footer: "www.armanmask.ir",
                                showConfirmButton: false,
                                timer: 3000
                            });
                            window.location.reload();
                        }
                    }
                });
            });
        });
    </script>
@endsection
