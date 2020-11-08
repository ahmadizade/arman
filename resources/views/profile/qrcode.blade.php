@extends("layouts.master")

@section("title")
    <title>نشان پرداخت | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container mt-3">
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
                                <span class="text-muted d-block font-12 mb-2">با پر کردن فرم زیر میتوانید در وب سایت ثمین تخفیف انتقال وجه کنید</span>
                                <hr>
                                <form action="{{ route("profile_qrcode_action") }}" method="post">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <input name="membership_number" class="form-control text-center" placeholder="کد یکتای فروشنده">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <input name="amount" class="form-control text-center" placeholder="مبلغ به ریال">
                                        </div>
                                        <div class="col-12 col-lg-12">
                                            <textarea name="desc" class="form-control mt-2" cols="30" rows="5" placeholder="توضیحات (اختیاری)"></textarea>
                                        </div>
                                    </div>
                                    <p class="text-center"><button class="btn btn-success mt-3">تایید</button></p>
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

        });
    </script>
@endsection
