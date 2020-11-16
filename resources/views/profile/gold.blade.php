@extends("layouts.master")

@section("title")
    <title>کاربر طلایی | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container">
        <div class="row">
           @include("profile.sidebar")
            <div class="col-12 col-lg-9">
                <div class="card shadow mt-3">
                    <div class="card-header p-3">
                        <h3 class="mb-0 font-14 float-right">کاربر طلایی</h3>
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
                                <h2 class="text-center text-primary py-3">کلیک کن طلایی شو</h2>
                                <p>با پرداخت 44 هزار تومان از مزایای کاربر طلایی بهره مند شوید. </p>
                                <ul>
                                    <li>دریافت شارژ طلایی</li>
                                    <li>شرکت در قرعه کشی</li>
                                    <li>حمایت از تیم مورد علاقه</li>
                                </ul>
                                @if(Auth::check() && Auth::user()->user_mode == "gold")
                                    <hr>
                                    @if(isset($payment->reference_id))
                                        <div class="text-center alert alert-success mb-2">کد رهگیری: <span class="font-weight-bold font-14">{{ $payment->reference_id }}</span></div>
                                    @endif
                                    <p class="text-center alert alert-warning font-16"><i class="fas fa-gem font-20 pl-2"></i> شما عضو طلایی هستید </p>
                                @elseif(Auth::check() && Auth::user()->user_mode == "normal")
                                    <form action="{{ route("profile_gold_online_action") }}" method="post">
                                        <p class="text-center">
                                            <button id="online-payment-gold" class="btn btn-primary">پرداخت آنلاین</button>
                                        </p>
                                    </form>
                                @endif
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

/*            $("#online-payment-gold").on("click",function(e){
                $(this).append("<span class='fa fa-spinner fa-spin font-16 mr-2'></span>");
                $.ajax({
                    type: "POST",
                    url: "{{ route("profile_gold_online_action") }}",
                    success: function (result) {
                        if(result.errors == 1){
                            $("#online-payment-gold").html("پرداخت آنلاین");
                        }else if(result.errors == 0){
                            //samanBankPayment({MID:12291850,CellNumber:"{{ Auth::user()->mobile ?? '' }}",ResNum:result.ref,Amount:result.total,RedirectURL:"{{ request()->root() }}/shop/verify-online-payment"});
                        }
                    }
                });
                e.preventDefault();
            });*/

        });
    </script>
@endsection
