@extends("layouts.master")

@section("title")
    <title>وب سرویس های من | armanmask.ir</title>
@endsection

@section("content")

    <!-- Start main-content -->
        <main class="main-content dt-sl mb-3">
            <div class="container main-container">
                <div class="row">
                    @include('profile.sidebar')
                    <!-- Start Content -->
                    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                        <div class="col-12 mt-3">
                            <div
                                class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                <h2>وب سرویس های من</h2>
                            </div>
                            <div class="row">
                                @if(isset($api[0]))
                                    @foreach($api as $item)
                                <div class="col-lg-6 col-md-12 mt-4 mt-lg-0 mt-md-0">
                                    <div class="card-horizontal-product mb-0 webservice-box">
                                        <div class="card-horizontal-product-thumb">
                                            <a href="{{ route("single_product",["slug" => $item->webservice->product_slug]) }}">
                                                <img src="/uploads/thumbnail/{{$item->webservice->thumbnail ?? "noimage_200.jpg"}}" alt="{{$item->webservice->product_name ?? "بدون نام"}}">
                                            </a>
                                            <small class="font-weight-bold d-block mt-2">تاریخ اتمام</small>
                                            <div class="rating-stars mt-1">
                                                <small>{{\Morilog\Jalali\Jalalian::forge($item->expire_date)->format("Y/m/d")}}</small>
                                            </div>
                                        </div>
                                        <div class="card-horizontal-product-content">
                                            <div class="label-status-comment">تایید شده</div>
                                            <div class="card-horizontal-comment-title">
                                                <a href="#">
                                                    <h3>{{$item->webservice->product_name ?? "بدون نام"}}</h3>
                                                </a>
                                            </div>
                                            <div class="card-horizontal-comment">
                                                <p>دسته بندی : <a href="{{route('single_category',["slug" => $item->webservice->category->slug])}}">{{$item->webservice->category->name}}</a></p>
                                                <p>پکیج : {{$item->paid_type}}</p>
                                                <p>تعداد درخواست : {{$item->count}} عدد</p>
                                            </div>
                                            <div class="card-horizontal-product-buttons">
                                                <div class="float-right">
                                                    <span class="count-like">
                                                        <i class="mdi mdi-thumb-up-outline"></i>{{$item->webservice->view}}
                                                    </span>
                                                    <span class="count-like">
                                                        <i class="mdi mdi-thumb-down-outline"></i>0
                                                    </span>
                                                </div>
                                                <button data-id="{{$item->id}}" class="btn btn-light token-btn">Token</button>
                                                <button data-id="{{$item->id}}" class="btn btn-light delete-btn" data-toggle="modal" data-target="#deleteModal">Archive</button>
                                            </div>
                                        </div>
                                    </div>
                                    @if($item->payment_type !== null && $item->payment_type !== "FREE")
                                        <span class="d-none btn btn-under-box-token mt-0 w-100"><input class="w-75 text-center border-0" type="text" value="{{$item->token}}"></span>
                                    @else
                                        <span class="d-none btn btn-under-box-token text-danger mt-0 w-100">همچنان توکن دریافت نکرده‌اید</span>
                                    @endif
                                    <a href="{{route('subscribe', ['id' => $item->webservice->id])}}" class="btn btn-under-box mt-0 w-100">خرید و تمدید</a>
                                </div>
                                    @endforeach
                                @else
                                    <div class="col-12">
                                        <div class="dt sl dt-sn dt-sn--box pt-3 pb-5">
                                            <div class="cart-page cart-empty">
                                                <div class="circle-box-icon">
                                                    <i class="mdi mdi-cart-remove"></i>
                                                </div>
                                                <p class="cart-empty-title">چرا وب سرویس نداری!</p>
                                                <p>بابا این همه وب سرویس <a href="{{route('home')}}">اینجا</a> داریم، برو خودت ببین!</p>
                                                <div class="cart-empty-links mb-5">
                                                    <a href="{{route('single_category',['slug' => "وب-سرویس"])}}" class="border-bottom-dt">وب سرویس های رایگان</a>
                                                    <a href="{{route('single_category',['slug' => "وب-سرویس"])}}" class="border-bottom-dt">پربازدیدترین ها</a>
                                                    <a href="{{route('single_category',['slug' => "وب-سرویس"])}}" class="border-bottom-dt">وب سرویس های پرفروش</a>
                                                </div>
                                                <a href="{{route('home')}}" class="btn-primary-cm">بازگشت به صفحه اصلی</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{--ADD Domain--}}
                        <div class="row">
                            <div class="col-12 mt-4">
                                <div
                                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                    <h2>افزودن و ویرایش دامنه</h2>
                                </div>
                                <div class="form-ui additional-info dt-sl dt-sn pt-4">
                                    @include('partials.condition')
                                    <form action="{{ route("add_domain") }}" method="post">

                                        @if(\Illuminate\Support\Facades\Auth::user()->domain !== null )
                                            <p class="font-13 pb-3"><b class="text-success">دامنه </b> شما : {{\Illuminate\Support\Facades\Auth::user()->domain}}</p>
                                        @else
                                            <p class="font-13 pb-3"><b class="text-danger">اخطار : </b><u>{{\Illuminate\Support\Facades\Auth::user()->name}}</u> عزیز، شما همچنان دامنه خود را ثبت نکرده اید.</p>
                                        @endif
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-6 mb-3">
                                                <div class="pt-2 pb-2 mb-3 dt-sl">
                                                    <div class="form-row-title mb-2">
                                                        <h3>آدرس دامنه</h3>
                                                    </div>
                                                    <div class="form-row">
                                                        <input readonly type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                                        <input name="domain" type="text" class="input-ui text-left dir-ltr p-3"
                                                               placeholder="www.armanmask.ir">
                                                        <button type="submit" class="btn btn-success float-left mt-3">ثبت / ویرایش دامنه</button>
                                                    </div>
                                                </div>
                                                <b class="text-danger">توجه : </b>برای خرید وب سرویس حتما نیاز به ثبت دامنه وب سایت شما می باشد، چرا که وب سرویس فقط به <b class="text-success">دامنه </b> که شما ثبت کرده اید پاسخ می دهد.</p>
                                                <p>در استفاده از وب سرویس های <b class="text-danger">رایگان </b> نیازی به ثبت دامنه وجود ندارد و بدون ثبت دامنه هم می توانید توکن مربوطه را دریافت کنید.</p>

                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6 mb-3">
                                                <div class="pt-2 pb-2 mb-3 dt-sl text-center text-md-left text-lg-left">
                                                    <img class="img-fluid w-50" src="/img/extra/Internet-Domain.jpg">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--ADD Domain--}}
                    </div>
                    <!-- End Content -->
                </div>
            </div>
        </main>
        <!-- End main-content -->

    {{--Save MODAL--}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="del"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-danger modal-shop myfont" id="del">حذف وب سرویس</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-right">
                    آیا از انجام این عملیات اطمینان دارید؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
                    <button data-id="" type="button" id="delete_confirm" class="btn btn-success mr-2" data-dismiss="modal">
                        پاک کن
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--Save MODAL--}}

@endsection

@section('extra_js')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.delete-btn', function() {
                $id = $(this).attr('data-id');
                $('#delete_confirm').attr('data-id', $id);
            });

            $(document).on('click', '#delete_confirm', function(e) {
                e.preventDefault();
                $.ajax({
                    url : "{{route('delete_my_webservice')}}",
                    type : "POST",
                    data : {"id" : $(this).attr('data-id')},
                    success : function (data) {
                        if (data.status == "0") {
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'error',
                                text: data.desc,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                        if (data.status == "1") {
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'success',
                                text: data.desc,
                                title: 'armanmask.ir',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            window.location.reload();
                        }
                    }
                });
            });

            $(document).on('click', '.token-btn', function() {
                if ($(this).parent().parent().parent().parent().find('.btn-under-box-token').hasClass('d-none')) {
                    $(this).parent().parent().parent().parent().find('.btn-under-box-token').removeClass('d-none');
                }else {
                    $(this).parent().parent().parent().parent().find('.btn-under-box-token').addClass('d-none');
                }
            });

        });
    </script>
@endsection
