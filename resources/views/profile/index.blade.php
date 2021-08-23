@extends("layouts.master")

@section("title")
<title>پروفایل کاربری | armanmask.ir</title>
@endsection

@section("content")
    <!-- Start main-content -->
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <div class="row">

                @include('profile.sidebar')

                <!-- Start Content -->
                <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12">
                            <div class="px-3">
                                <div
                                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2">
                                    <h2>اطلاعات شخصی</h2>
                                </div>
                                <div class="profile-section dt-sl">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="label-info">
                                                <span>نام و نام خانوادگی:</span>
                                            </div>
                                            <div class="value-info">
                                                <span>{{$user->name ?? "" . $user->family ?? ""}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="label-info">
                                                <span>شماره کارت:</span>
                                            </div>
                                            <div class="value-info">
                                                <span>{{$user->profile->bank_cart_number ?? "_"}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="label-info">
                                                <span>شماره تلفن همراه:</span>
                                            </div>
                                            <div class="value-info">
                                                <span>{{$user->mobile ?? ""}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="label-info">
                                                <span>کد ملی:</span>
                                            </div>
                                            <div class="value-info">
                                                <span>{{$user->profile->national_code ?? "_"}}</span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="label-info">
                                                <span>پست الکترونیک:</span>
                                            </div>
                                            <div class="value-info">
                                                <span>{{$user->email ?? ""}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-section-link">
                                        <a href="{{route('profile_edit')}}" class="border-bottom-dt">
                                            <i class="mdi mdi-account-edit-outline"></i>
                                            ویرایش اطلاعات شخصی
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12">
                            <div class="px-3">
                                <div
                                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2">
                                    <h2>لیست آخرین علاقه‌مندی‌ها</h2>
                                </div>
                                <div class="profile-section dt-sl">
                                    @if (isset($bookmark))
                                        <ul class="list-favorites">
                                            @foreach($bookmark as $item)
                                                <li>
                                                    <a href="{{ route("single_product",["slug" => $item->product->product_slug ?? "404"]) }}">
                                                        <img src="/uploads/thumbnail/{{$item->product->thumbnail ?? "noimage_64.jpg"}}" alt="{{$item->product_name}}">
                                                        <span>{{$item->product->product_name ?? "بدون نام"}}</span>
                                                    </a>
                                                    <button class="delete_bookmark">
                                                        <i data-id="{{$item->id}}" class="mdi mdi-trash-can-outline"></i>
                                                    </button>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="profile-section-link">
                                            <a href="#" class="border-bottom-dt">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                                مشاهده دسته بندی محصولات
                                            </a>
                                        </div>
                                    @else
                                    <ul class="list-favorites">
                                        <li>
                                            <p>محصولی موجود نیست</p>
                                        </li>
                                    </ul>
                                    <div class="profile-section-link">
                                        <a disabled href="#" class="border-bottom-dt text-muted">
                                            <i class="mdi mdi-square-edit-outline"></i>
                                            مشاهده و ویرایش لیست مورد علاقه
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <div
                                class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                <h2>آخرین سفارش‌ها</h2>
                            </div>
                            @if(isset($orders[0]))
                                <div class="dt-sl">
                                    <div class="table-responsive">
                                        <table class="table table-order">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>شماره سفارش</th>
                                                <th>شماره پیگیری</th>
                                                <th>تاریخ ثبت سفارش</th>
                                                <th>مبلغ کل</th>
                                                <th>وضعیت پرداخت</th>
                                                <th>وضعیت سفارش</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $key => $item)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$item->order_number}}</td>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format("Y/m/d")}}</td>
                                                    <td>{{number_format($item->last_price)}} تومان</td>
                                                    <td>{{$item->status_payment}}</td>
                                                    <td class=@if($item->status == 0) notpaid @elseif($item->status == 1) paid @endif>{{App\Models\Orders::status($item->status)}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @else
                                        <div class="dt-sl dt-sn">
                                            <div class="order-return text-center pt-2 pb-2">
                                                <p class="text-center">در حال حاضر سفارشی برای شما ثبت نشده!</p>
                                                <a href="{{route('home')}}" class="border-bottom-dt">برای پیگیری مشکلات به واحد پشتیبانی تیکت بزنید</a>
                                            </div>
                                        </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- End Content -->

            </div>
        </div>
        </div>
    </main>
    <!-- End main-content -->
@endsection

@section('extra_js')
    <script>
        $( document ).ready(function() {
            $('body').on('click','.delete_bookmark i',function (e){
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
                                text: data.desc,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                        if(data.status == "1") {
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'success',
                                text: data.desc,
                                showConfirmButton: false,
                                timer: 3000
                            });
                            location.reload();
                        }
                    }
                });
            });
        });
    </script>
@endsection
