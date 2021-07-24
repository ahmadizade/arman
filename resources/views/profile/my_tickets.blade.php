@extends("layouts.master")

@section("title")
    <title>علاقمندی های من | CioCe.ir</title>
@endsection

@section("content")

    <!-- Start main-content -->
        <main class="main-content dt-sl mb-3">
            <div class="container main-container">
                <div class="row">

                    <!-- Start Sidebar -->
                        @include('profile.sidebar')
                    <!-- End Sidebar -->

                    <!-- Start Content -->
                    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col-12">
                                <div
                                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                    <h2>آدرس ها</h2>
                                </div>
                                <div class="dt-sl">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="card-horizontal-address text-center px-4">
                                                <button class="checkout-address-location" data-toggle="modal"
                                                    data-target="#modal-location">
                                                    <strong>ایجاد تیکت جدید</strong>
                                                    <i class="mdi mdi-email-mark-as-unread"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="card-horizontal-address">
                                                <div class="card-horizontal-address-desc">
                                                    <h4 class="card-horizontal-address-full-name">واحد پشتیبانی فنی</h4>
                                                    <p>
                                                        همراه عزیز، ما به صورت 24 ساعته در هفت روز هفته پاسخگوی شما هستیم.
                                                    </p>
                                                    <p>خدمت به شما عزیزان افتخار ماست</p>
                                                </div>
                                                <div class="card-horizontal-address-data">
                                                    <ul class="card-horizontal-address-methods float-right">
                                                        <li class="card-horizontal-address-method">
                                                            <i class="mdi mdi-email-outline"></i>
                                                            رایانامه : <span>Support@cioce.ir</span>
                                                        </li>
                                                        <li class="card-horizontal-address-method">
                                                            <i class="mdi mdi-cellphone-iphone"></i>
                                                            تلفن همراه : <span class="rtl">26808264-021</span>
                                                        </li>
                                                    </ul>
{{--                                                    <div class="card-horizontal-address-actions">--}}
{{--                                                        <button class="btn-note" data-toggle="modal"--}}
{{--                                                            data-target="#modal-location-edit">ویرایش</button>--}}
{{--                                                        <button class="btn-note" data-toggle="modal"--}}
{{--                                                            data-target="#remove-location">حذف</button>--}}
{{--                                                    </div>--}}
                                                </div>
                                            </div>
                                        </div>

                                        @if (isset($ticket))
                                            @foreach($ticket as $item)
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card-horizontal-address">
                                                    <div class="card-horizontal-address-desc">
                                                        <h4 class="card-horizontal-address-full-name">{{$item->subject}}</h4>
                                                        <p>
                                                            {{$item->message}}
                                                        </p>
                                                    </div>
                                                    <div class="card-horizontal-address-data">
                                                        <ul class="card-horizontal-address-methods float-right">
                                                            <li class="card-horizontal-address-method">
                                                                <i class="mdi mdi-email-check-outline"></i>
                                                                وضعیت تیکت :
                                                                <span class="@if ($item->status == 2) text-success @elseif ($item->status == 3) text-warning @endif">{{\App\Models\Ticket::Status($item->status)}}</span>
                                                            </li>
                                                            <li class="card-horizontal-address-method">
                                                                <i class="mdi mdi-clock-alert-outline"></i>
                                                                تاریخ ساخت : <span>{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format("Y/m/d") }}</span>
                                                            </li>
                                                        </ul>
                                                        <div class="card-horizontal-address-actions">
                                                            <button class="btn-note get_answer" data-id="{{$item->id}}">مشاهده</button>
{{--                                                            <button class="btn-note get_answer" data-id="{{$item->id}}" data-toggle="modal" data-target="#modal-location-edit">مشاهده</button>--}}
                                                            <button data-id="{{$item->id}}" class="btn-note delete_btn" data-toggle="modal" data-target="#remove-location">حذف</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Content -->

                </div>
            </div>
        </main>
        <!-- End main-content -->

        <!-- Start Modal location new -->
        <div class="modal fade" id="modal-location" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg send-info modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">
                            <i class="now-ui-icons location_pin"></i>
                            تیکت جدید
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-ui dt-sl">
                                    <form id="new_ticket_form" class="form-account" action="">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 mb-2">
                                                <div class="form-row-title">
                                                    <h4>
                                                        موضوع پیام
                                                    </h4>
                                                </div>
                                                <div class="form-row">
                                                    <input class="input-ui pr-2 text-right" type="text" name="subject"
                                                        placeholder="موضوع پیام را وارد نمایید">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mb-3">
                                                <div class="form-row-title">
                                                    <h4>
                                                        واحد
                                                    </h4>
                                                </div>
                                                <div class="form-row">
                                                        <select class="right form-control font-14" name="unit">
                                                            <option value="1">
                                                                پشتیبانی فنی
                                                            </option>
                                                            <option value="2">
                                                                پشتیبانی فروش
                                                            </option>
                                                            <option value="3">
                                                                مدیریت
                                                            </option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="form-row-title">
                                                    <h4>
                                                        متن پیام
                                                    </h4>
                                                </div>
                                                <div class="form-row">
                                                    <textarea class="input-ui pr-2 text-right" name="message"
                                                        placeholder=" متن پیام را وارد کنید"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mb-3">
                                                <div class="form-row-title">
                                                    <h4>
                                                        الویت رسیدگی
                                                    </h4>
                                                </div>
                                                <div class="form-row">
                                                    <select class="right form-control font-14" name="priority">
                                                        <option class="text-danger" value="1">
                                                            زیاد
                                                        </option>
                                                        <option class="text-warning" value="2">
                                                            متوسط
                                                        </option>
                                                        <option selected class="text-success" value="3">
                                                            کم
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 pr-4 pl-4">
                                                <button id="new_ticket_btn" type="button" class="btn btn-sm btn-primary btn-submit-form">ثبت و ارسال پیام</button>
                                                <button type="button" class="btn-link-border float-left mt-2">انصراف و بازگشت</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="goole-map">
                                    <img src="/img/icon/mosalas-400.png" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal ticket new -->

        <!-- Start Modal ticket edit -->
        <div class="modal fade" id="modal-location-edit" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        </div>
        <!-- End Modal ticket edit -->











        <!-- Start Modal remove-ticket -->
        <div class="modal fade" id="remove-location" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mb-3" id="exampleModalLabel">آیا مطمئنید که
                            این پیام حذف شود؟</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="remodal-general-alert-button remodal-general-alert-button--cancel"
                            data-dismiss="modal">خیر</button>
                        <button type="button" id="confirm_delete" data-id=""
                            class="remodal-general-alert-button remodal-general-alert-button--approve">بله</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal remove-ticket -->


@endsection
@section('extra_js')

    <!-- Plugins -->
    <script src="/js/vendor/jquery.nice-select.min.js"></script>
    <script src="/js/vendor/nouislider.min.js"></script>
    <script src="/js/vendor/wNumb.js"></script>
    <script src="/js/vendor/ResizeSensor.min.js"></script>

    <!-- Main JS File -->
    <script src="/js/main.js"></script>

    <script>
        $(document ).ready(function(){

            $('#new_ticket_btn').click(function () {
                $.ajax({
                    url : "{{route('new_ticket')}}",
                    type : "POST",
                    data : $('#new_ticket_form').serialize(),
                    success : function (data) {
                        console.log(data);
                        if (data.status == "0") {
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'error',
                                title : "Support-Team",
                                text: data.desc,
                                footer : '<a href="{{route('login')}}" class="mt-2 text-success">ورود به سایت</a>',
                                showConfirmButton: false,
                                timer: 5000
                            });
                        }
                        if (data.status == "1") {
                            Swal.fire({
                                position: 'top-end',
                                toast: true,
                                icon: 'success',
                                title: 'CioCe',
                                text: data.desc,
                                footer:"پس از مشاهده توسط کارشناسان ما،پاسخ در همین صفحه درج میگردد",
                                showConfirmButton: false,
                                timer: 9000
                            });
                            $('#modal-location').modal('hide')
                            window.location.reload();

                        }
                    }
                });
            });

            $('body').on('click','.get_answer',function (){
               $.ajax({
                  url : "{{route('get_answer')}}",
                  type : "post",
                  data : {'id' : $(this).attr('data-id')},
                   success : function (data) {
                       console.log(data);
                       if (data.status == "0") {
                           Swal.fire({
                               position: 'top-end',
                               toast: true,
                               icon: 'error',
                               title : "Support-Team",
                               text: data.desc,
                               {{--footer : '<a href="{{route('login')}}" class="mt-2 text-success">ورود به سایت</a>',--}}
                               showConfirmButton: false,
                               timer: 5000
                           });
                       }
                       if (data.status == "1") {
                           $('#modal-location-edit').modal('show');
                           $('#modal-location-edit').html(data);
                       }
                  }
               });
            });

            $('body').on('click','.close-modal',function (){
                $(this).modal('dispose');
            });

            $('body').on('click','.delete_btn',function (){
                $id = $(this).attr('data-id');
                $('#confirm_delete').attr('data-id', $id);
            });

            $('body').on('click','#confirm_delete',function (e){
                e.preventDefault();
                $id = $(this).attr('data-id');
                $.ajax({
                   url : "{{route('delete_ticket')}}",
                   type : "post",
                   data : {"id" : $id},
                   success : function (data) {
                       console.log(data);
                       if (data.status == "0") {
                           Swal.fire({
                               position: 'top-end',
                               toast: true,
                               icon: 'error',
                               title : "Support-Team",
                               text: data.desc,
                               {{--footer : '<a href="{{route('login')}}" class="mt-2 text-success">ورود به سایت</a>',--}}
                               showConfirmButton: false,
                               timer: 5000
                           });
                       }
                       if (data.status == "1") {
                           Swal.fire({
                               position: 'top-end',
                               toast: true,
                               icon: 'success',
                               title: 'CioCe',
                               text: data.desc,
                               footer:"جهت بازیابی به قسمت آرشیوها مراجعه فرمایید",
                               showConfirmButton: false,
                               timer: 9000
                           });
                           $('#remove-location').modal('hide');
                           window.location.reload();
                       }
                   }
                })
            });


        });
    </script>
@endsection
