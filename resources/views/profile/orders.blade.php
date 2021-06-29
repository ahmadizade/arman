@extends("layouts.master")

@section("title")
    <title>وب سرویس های من | CioCe.ir</title>
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
                                <div class="col-12">
                                    <div
                                        class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                        <h2>سفارشات من</h2>
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
                                                        <th>جزییات</th>
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
                                                        <td class=@if($item->status == 0) notpaid @elseif($item->status == 1) paid @endif>{{App\Models\Orders::status($item->status)}}</td>
                                                        <td class="details-link">
                                                            <a href="{{route('order_details',['order_id' => $item->id])}}">
                                                                <i class="mdi mdi-chevron-left"></i>
                                                            </a>
                                                        </td>
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
        </main>
        <!-- End main-content -->


@endsection

@section('extra_js')

@endsection
