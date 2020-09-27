@extends("layouts.master")

@section("title")
    <title>کاربر طلایی | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container" style="margin-top: 80px">
        <div class="row">
           @include("profile.sidebar")
            <div class="col-12 col-lg-9">
                <div class="card mt-3">
                    <div class="card-header bg-secondary text-white p-2">
                        <h3 class="mt-1 mb-0 font-14 float-right">کاربر طلایی</h3>
                    </div>
                    <div class="card-body p-2">
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
                            <div class="alert alert-success mb-2">{{ Session::get("status") }}</div>
                        @endif
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <h2 class="text-warning">کلیک کن طلایی شو                                 44 بریز  15درصد شارژ طلایی بردار </h2>
                                <p class="text-center"><button id="online-payment-gold" class="btn btn-primary">پرداخت</button></p>
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
            $("#online-payment-gold").on("click",function(e){
                $(this).append("<span class='fa fa-spinner fa-spin font-16 mr-2'></span>");
                $.ajax({
                    type: "POST",
                    url: "{{ route("profile_gold_action") }}",
                    success: function (result) {
                        if(result.errors == 1){
                            $("#online-payment-gold").html("پرداخت");
                        }else if(result.errors == 0){
                            //samanBankPayment({MID:12291850,CellNumber:"{{ Auth::user()->mobile ?? '' }}",ResNum:result.ref,Amount:result.total,RedirectURL:"{{ request()->root() }}/shop/verify-online-payment"});
                        }
                    }
                });
                e.preventDefault();
            });
        });
    </script>
@endsection
