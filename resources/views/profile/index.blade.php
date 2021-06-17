@extends("layouts.master")

@section("title")
<title>پروفایل کاربری | CioCe.ir</title>
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
                                                <span>پست الکترونیک:</span>
                                            </div>
                                            <div class="value-info">
                                                <span>{{$user->email ?? ""}}</span>
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
                                        <div class="col-md-6 col-sm-12">
                                            <div class="label-info">
                                                <span>دریافت خبرنامه:</span>
                                            </div>
                                            <div class="value-info">
                                                <span>خیر</span>
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
                                    </div>
                                    <div class="profile-section-link">
                                        <a href="#" class="border-bottom-dt">
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
                                                    <a href="{{ route("single_product",["slug" => $item->product->product_slug]) }}">
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
                    <div class="row mt-5">
                        <div class="col-12">
                            <div
                                class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                <h2>آخرین سفارش‌ها</h2>
                            </div>
                            <div class="dt-sl">
                                <div class="table-responsive">
                                    <table class="table table-order">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>شماره سفارش</th>
                                                <th>تاریخ ثبت سفارش</th>
                                                <th>مبلغ قابل پرداخت</th>
                                                <th>مبلغ کل</th>
                                                <th>عملیات پرداخت</th>
                                                <th>جزییات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>DDC-57456951</td>
                                                <td>۳۱ مرداد ۱۳۹۸</td>
                                                <td>۰</td>
                                                <td>۹,۹۸۹,۰۰۰ تومان</td>
                                                <td>لغو شده</td>
                                                <td class="details-link">
                                                    <a href="#">
                                                        <i class="mdi mdi-chevron-left"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>DKC-45173498</td>
                                                <td>۱۰ خرداد ۱۳۹۸</td>
                                                <td>۰</td>
                                                <td>۱۸,۰۴۹,۰۰۰ تومان</td>
                                                <td>لغو شده</td>
                                                <td class="details-link">
                                                    <a href="#">
                                                        <i class="mdi mdi-chevron-left"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>DDC-58976951</td>
                                                <td>۲۱ مرداد ۱۳۹۸</td>
                                                <td>۰</td>
                                                <td>۹,۱۸۹,۰۰۰ تومان</td>
                                                <td>لغو شده</td>
                                                <td class="details-link">
                                                    <a href="#">
                                                        <i class="mdi mdi-chevron-left"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="link-to-orders" colspan="7"><a href="#">مشاهده لیست سفارش
                                                        ها</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
