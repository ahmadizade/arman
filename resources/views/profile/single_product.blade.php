@extends("layouts.master")

@section("title")
    <title>خرید محصول | CioCe</title>
@endsection

@section("content")

    <!-- Header -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img src="/images/bg/contact.jpg" class="img-fluid" alt="about">
            </div>
        </div>
    </div>

    <!-- Main -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card shadow mt-3">
                    @if(isset($product))
                        <div class="card-header text-right">
                            <p class="p-0 m-0">{{$product->product_name ?? "بدون نام"}} /
                                <span>دسته بندی : </span><span>{{$product->category->name}}</span></p>
                        </div>
                        <div class="card-body p-3 text-justify">
                            @if(Session::has("status"))
                                <div class="alert text-center alert-success mb-2">{{ Session::get("status") }}</div>
                            @elseif(Session::has("error"))
                                <div class="alert text-center alert-danger mb-2">{{ Session::get("error") }}</div>
                        @endif
                        <!-- Content -->
                            <div class="row">
                                <div class="col-12 col-lg-3 text-center">
                                    <img style="max-width: 200px;" class="img-fluid"
                                         src="/uploads/thumbnail/{{$product->thumbnail}}">
                                    <div class="col-12 pt-1 text-center">
                                        <a href="#" class="font-12 badge badge-secondary py-1 px-1" title="LIKE"><i
                                                class="fa fa-thumbs-up font-15" aria-hidden="true"></i></a>
                                        <a href="#" class="font-12 badge badge-secondary py-1 px-1 mr-1"
                                           title="Bookmark"><i class="fa fa-heart font-15" aria-hidden="true"></i></a>
                                        <a href="#" class="font-12 badge badge-secondary py-1 px-1 mr-1"
                                           title="Email"><i class="fa fa-envelope font-15" aria-hidden="true"></i></a>
                                        <a href="#" class="font-12 badge badge-secondary py-1 px-1 mr-1"
                                           title="Share"><i class="fa fa-share-alt font-15" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-9">
                                    <div class="row">
                                        <div class="col-12 col-md-4 col-lg-4">
                                            @if($product->quantity > 0)
                                                <p>وضعیت کالا : <span class="text-danger">موجود</span></p>
                                            @else
                                                <p>وضعیت کالا : <span class="text-danger">ناموجود</span></p>
                                            @endif
                                            <p>تخفیف : <span class="text-white badge badge-danger font-12">{{$product->discount}} %</span>
                                            </p>
                                            <p>تعداد بازدید : <span>{{$product->view}} </span>نفر</p>
                                            @if($product->discount > 0)
                                                <p>قیمت :
                                                    <del
                                                        class=" nowrap text-muted">  {{ number_format($product->price) }}</del>
                                                    <span class="text-danger mt-1 nowrap">{{ number_format($product->price - ($product->price * $product->discount / 100)) }}<span>  ریال</span></span>
                                                </p>
                                            @elseif($product->discount == "" || $product->discount == 0)
                                                <span>قیمت : <span
                                                        class="text-success">{{number_format($product->price) ?? "رایگان"}} </span>ریال</span>
                                            @endif
                                            <p>پشتیبانی طلایی</p>
                                        </div>

                                        <div class="col-12 col-md-8 col-lg-8">
                                            <div class="row text-right">
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <p class=" font-weight-bold m-0 p-0"><i class="fas fa-users"></i>

                                                         فروشنده :</p>
                                                    <p class="mt-1 pt-0">
                                                        @if(strlen($product->user->name > 0))
                                                            <span>{{$product->user->name ?? ""}}</span>
                                                        @else
                                                            <span>فروشگاه اینترنتی سیوسه</span>
                                                        @endif
                                                    </p>

                                                    <p class=" font-weight-bold m-0 p-0"><i class="fa fa-phone-square" aria-hidden="true"></i>
                                                         شماره تماس : </p>
                                                    <p class="mt-1 pt-0">{{$product->user->phone ?? "26808264-021"}}</p>

                                                    <p class=" font-weight-bold m-0 p-0"><i class="fa fa-envelope" aria-hidden="true"></i>
                                                         رایانامه :</p>
                                                    <p class="mt-1 pt-0">
                                                        @if(strlen($product->user->email > 0))
                                                            <span>{{$product->user->email}}</span>
                                                        @else
                                                            <span>Support@CioCe.ir</span>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6 text-center">
                                                    <img class="img-fluid" src="/images/logo/cioce-tet-logo.png"
                                                         alt="افزودن به سبد خرید" title="add-to-cart">
                                                    <p>شما هم میتوانید یک <b><a href="{{route('profile_store')}}">فروشگاه</a></b> باشید</p>
                                                    <a href="{{route('card', ['id' => $product->id])}}" type="button"
                                                       class="btn btn-sm btn-primary"> <i
                                                            class="fa fa-shopping-basket font-12"
                                                            aria-hidden="true"></i> افزودن به سبد خرید </a>
                                                    <p class="mt-4"><a href="#" class="font-11 text-muted">گزارش تخلف و خرابی لینک</a></p>
                                                </div>
                                                {{--                                                <div class="text-center">--}}
                                                {{--                                                    <div class="col-12 pt-1 text-center">--}}
                                                {{--                                                        <i class="fa fa-handshake-o text-primary"></i> <span> پشتیبانی 24 ساعته</span>--}}
                                                {{--                                                        <i class="fa fa-truck text-primary"></i> <span> تحویل در لحظه</span>--}}
                                                {{--                                                        <i class="fa fa-gift text-primary"></i> <span> نصب رایگان</span>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                </div>
                @include('/product.popular_products')
            </div>

@endsection
