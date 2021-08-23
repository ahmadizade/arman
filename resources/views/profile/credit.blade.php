@extends("layouts.master")

@section("title")
<title>کیف پول من | armanmask.ir</title>
@endsection

@section("content")
    <!-- Start main-content -->
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <div class="row">

                @include('profile.sidebar')

                <!-- Start Content -->
                <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                   <div class="col-12">
                       <div
                           class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                           <h2>شارژ کیف پول</h2>
                       </div>
                       <div class="card shadow">
                           <div class="card-header p-3">
                               <h3 class="mb-0 font-14 float-right"><i class="fas fa-gifts" style="color: #00BFD6;"></i> اعتبار فعلی شما
                                   : {{number_format(\Illuminate\Support\Facades\Auth::user()->credit)}}</h3>
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
                                   {!! Session::get("status") !!}
                               @endif
                               @if(Session::has("error"))
                                   {!! Session::get("error") !!}
                               @endif
                               <div class="row">
                                   <div class="col-12 col-lg-12">
                                       <form action="{{ route("profile_credit_action") }}" method="post">
                                           <div class="input-group mt-3">
                                               <div class="input-group-prepend">
                                            <span class="input-group-text font-12"><span
                                                    class="text-primary line-height-0 pl-1 font-15"></span>مبلغ افزایش اعتبار</span>
                                               </div>
                                               <input id="credit" name="credit" type="text" class="form-control number-format"
                                                      placeholder="برای مثال  :  1,000,000 ریال"
                                                      value="{{ old("credit") }}">
                                           </div>
                                           <div class="row">
                                               <div class="col-12 col-lg-8">
                                                   <div class="input-group mt-2">
                                                       <input type="text" class="form-control words no-outline">
                                                   </div>
                                               </div>
                                               <div class="col-12 col-lg-4">
                                                   <div class="mt-4 text-left">
                                                       <button class="btn btn-sm btn-success" style="color: #2a2a2a">انتقال به بانک</button>
                                                   </div>
                                               </div>
                                           </div>
                                       </form>
                                   </div>
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
@endsection

@section('extra_js')
    <script src="/js/vendor/accounting.js"></script>

    <script>
        $( document ).ready(function() {
            $('.number-format').on('keyup', function () {
                $price = accounting.formatNumber($(this).val());
                $(this).val($price);
                $(".words").val(Num2persian($(this).val()) + " ریال ");
            });
        });
    </script>
@endsection
