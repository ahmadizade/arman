@extends("layouts.master")


@section("title")
<title>ارتباطات وب سایت / سی و سه</title>
<meta name="description" content="پیدا کردن نام و نام خانوادگی صاحب سایت-پیدا کردن نام و نام خانوادگی صاحب ایمیل"/>
<meta name="robots" content="all">
@endsection

@section("content")
{{--    {{dd($finder)}}--}}
    <!-- Start main-content -->
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            @if(isset($finder))
            <div class="container">
                <div class="row">
                    <h1 class="text-center">اطلاعات صاحب سایت</h1>
                    <div class="col-12 mt-4 mb-4">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                    <h2>ایمیل هایی که وب سایت <b class="text-success">{{$finder->data->domain ?? ""}}</b> برای ارتباطات خود استفاده می کند :</h2>
                                </div>
                                <p class="text-justify" style="line-height:30px;"><span class="font-weight-bold text-danger">توجه: </span> ایمیل هایی که در جدول زیر به شما نشان داده می شود، ایمیل هایی هستند که این وب سایت ها از آنها به عنوان ایمیل های اصلی خود استفاده می کنند و با آن ایمیل ها در سایت هایی عضو می شوند و با دیگر سایت ها و کمپانی ها ارتباط دارند. وب سایت سی و سه با هدف افزایش ارتباطات کسب و کار تجاری شما این ایمیل ها و آدرس سایت هایی که در آنها عضو شده اند را به شما نمایش می دهد. توجه داشته باشید که نمایش نام و نام خانوادگی ایمیل یا وب سایت فقط با داشتن اکانت طلایی امکان پذیر می باشد. </p>
                                <p class="font-weight-bold">نتیجه جستجو : {{$finder->meta->results ?? 0}} عدد</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 text-center text-md-left text-lg-left">
                                <img src="/img/extra/unnamed.png" class="img-fluid">
                            </div>
                        </div>





                            <div class="dt-sl mt-5">
                            <div class="table-responsive">
                                <form id="process" action="#" method="get">
                                    <table class="table table-order">
                                    <thead>
                                    @php
                                        $i = 1;
                                    @endphp
                                    <tr>
                                        <th>#</th>
                                        <th>EMAIL</th>
                                        <th>میزان استفاده</th>
                                        <th>TYPE</th>
                                        <th>عضو شده در سایت های</th>
                                        <th>نام و نام خانوادگی</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($finder->data->emails as $item)
                                        <tr class="site-sign" >
                                            <td>{{$i++}}</td>
                                            <td>{{$item->value}}</td>
                                            <td>{{$item->confidence}}</td>
                                            <td>{{$item->type}}</td>
                                            <td>
                                                <div class="site-sign">
                                                    @foreach($item->sources as $email)
                                                        <p>{{$email->domain}}</p>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td class="details-link">
                                                <a id="owner" href="javascript:void(0)" onclick="document.getElementById('process').submit()">
                                                    <i class="mdi mdi-chevron-left"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </main>
    <!-- End main-content -->

@endsection

@section('extra_js')
    <script>
        $('#owner').click(function(){
            Swal.fire({
                position: 'center-center',
                toast: true,
                icon: 'error',
                title : "Support-Team",
                text: "این بخش فقط مختص به اعضای طلایی می باشد",
                footer : 'با خرید بیش از 400 هزارتومان به عضو طلایی تبدیل شوید',
                showConfirmButton: false,
                timer: 5000
            });
        });
    </script>

@endsection
