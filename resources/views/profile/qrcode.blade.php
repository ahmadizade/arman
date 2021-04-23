@extends("layouts.master")

@section("title")
    <title>نشان پرداخت | فروشگاه سیوسه</title>
@endsection

@section("content")

    <div class="container">
        <div class="row">
           @include("profile.sidebar")
            <div class="col-12 col-lg-9">
                <div class="card shadow mt-3">
                    <div class="card-header p-3">
                        <h3 class="mb-0 font-14 float-right">نشان پرداخت</h3>
                    </div>
                    <div class="card-body p-3">
                        @if ($errors->any())
                            <div class="alert alert-danger mb-2">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has("status"))
                            <div class="alert alert-success text-center mb-2">{{ Session::get("status") }}</div>
                        @endif
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <span class="text-muted d-block font-12 mb-2">با پر کردن فرم زیر میتوانید در وب سایت فروشگاه سیوسه انتقال وجه کنید</span>
                                <hr>
                                <form id="transaction" method="post">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <input name="membership_number" class="form-control text-center ltr mt-2" autocomplete="off" placeholder="کد یکتای فروشنده">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <input name="amount" class="form-control text-center ltr mt-2" autocomplete="off" placeholder="مبلغ به ریال">
                                        </div>
                                        <div class="col-12 col-lg-12">
                                            <textarea name="desc" class="form-control mt-2" cols="30" rows="5" placeholder="توضیحات (اختیاری)"></textarea>
                                        </div>
                                    </div>
                                    <p class="text-center"><button type="button" class="btn btn-success mt-3 submit-transaction">تایید</button></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra_js')
    <script>
        $(document).ready(function(){

            $(".submit-transaction").on("click",function(e){
                $(".submit-transaction").html(" <span class='fa fa-spinner fa-spin d-block mx-auto'></span> ");
                $.ajax({
                    url: '{{ route("profile_qrcode_action") }}',
                    type: 'POST',
                    data: $("#transaction").serialize(),
                    success: function(data) {
                        if(data.status == true){
                            Swal.fire({
                                text: "شما قصد انتقال وجه به مبلغ "+data.amount+" ریال به "+data.name+" را دارید",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'بله اطمینان دارم',
                                cancelButtonText: 'منصرف شدم',
                            }).then((result) => {
                                if(result.value) {
                                    Swal.fire({
                                        text: 'کد ارسالی به موبایل را وارد نمایید',
                                        input: 'text',
                                        inputAttributes: {
                                            autocapitalize: 'off'
                                        },
                                        showCancelButton: true,
                                        confirmButtonText: 'تایید',
                                        showLoaderOnConfirm: true,
                                        cancelButtonText: 'منصرف شدم',
                                    }).then((result) => {
                                        if (result.isConfirmed) {

                                            $.ajax({
                                                url: '{{ route("profile_qrcode_action_mobile") }}',
                                                type: 'POST',
                                                data: $("#code").serialize(),
                                                success: function (data) {
                                                    if(data.status == "0"){
                                                        Swal.fire({
                                                            position: 'center-center',
                                                            icon: 'success',
                                                            text: "عملیات با موفقیت انجام شد",
                                                            showConfirmButton: false,
                                                            timer: 3000
                                                        })
                                                    }else{

                                                    }
                                                }
                                            });

                                            Swal.fire({
                                                position: 'center-center',
                                                icon: 'success',
                                                text: "عملیات با موفقیت انجام شد",
                                                showConfirmButton: false,
                                                timer: 3000
                                            })

                                        }else{
                                            Swal.fire({
                                                position: 'center-center',
                                                icon: 'warning',
                                                text: "عملیات با شکست مواجه شد",
                                                showConfirmButton: false,
                                                timer: 3000
                                            })
                                        }
                                    })
                                }
                            });
                        }else{
                            Swal.fire({
                                position: 'center-center',
                                icon: 'warning',
                                text: "شماره عضویت و یا مبلغ وارد شده نامعتبر میباشد",
                                showConfirmButton: false,
                                timer: 3000
                            })
                        }

                        $(".submit-transaction").html("تایید");

                    },

                });

                e.preventDefault();

            });

        });
    </script>
@endsection
