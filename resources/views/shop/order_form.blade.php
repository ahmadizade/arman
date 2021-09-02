@extends("master._master")

@section("title")
    <title>فرم آنلاین سفارش قطعه {{ $result['part_id'] }} | یدکیجات</title>
    <meta name="description" content="فرم آنلاین سفارش قطعه {{ $result['part_id'] }} یدکیجات دات کام , خرید لوازم یدکی ماشین های تویوتا و لکسوس">
@endsection

@section("body")

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 mt-4">
                <h1><span class="text-muted font-11">فرم سفارش قطعه:</span> @if(isset($dictionary[Str::upper($result->part_name)])) {{ $dictionary[Str::upper($result->part_name)] }} / @endif {{ $result->part_name }}</h1>
                <h2><span class="text-muted font-11">کد قطعه:</span> {{ $result['part_id'] }} </h2>
                <hr>
                @if(Auth::check())
                    <form id="order-form" method="post">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="font-12 mb-0">قطعه مورد نظر برای سفارش</label>
                                <input id="product" type="text" class="form-control form-control-sm" disabled="disabled" value="{{ $result->part_name }} / {{ $result->part_id }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="font-12 mb-0">تعداد</label>
                                <input name="count" type="number" class="form-control form-control-sm" min="1" max="{{ $result['quantity']  }}" value="1">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label class="font-12 mb-0">توضیحات</label>
                                <textarea name="desc" type="text" rows="10" class="form-control form-control-sm"></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group text-left">
                                <button id="order-form-submit" class="btn text-white btn-normal-width primary-color font-13">ثبت سفارش</button>
                            </div>
                        </div>
                    </div>
                </form>
                    <div id="result"></div>
                @else
                    <div class="text-center">
                        <p class="text-danger">برای ارسال سفارش ابتدا باید ثبت نام / ورود انجام دهید</p>
                        <div class="btn-group">
                            <a href="#" data-toggle="modal" data-target="#login">
                                <svg width="27px" height="27px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="mx-1 text-muted"><g fill="currentColor" fill-rule="nonzero"><path d="M12,10.5 C14.6233526,10.5 16.75,8.37335256 16.75,5.75 C16.75,3.12664744 14.6233526,1 12,1 C9.37664744,1 7.25,3.12664744 7.25,5.75 C7.25,8.37335256 9.37664744,10.5 12,10.5 Z M12,11.5 C8.82436269,11.5 6.25,8.92563731 6.25,5.75 C6.25,2.57436269 8.82436269,0 12,0 C15.1756373,0 17.75,2.57436269 17.75,5.75 C17.75,8.92563731 15.1756373,11.5 12,11.5 Z M22,24 C22,18.4771525 17.5228475,14 12,14 C6.4771525,14 2,18.4771525 2,24 L1,24 C1,17.9248678 5.92486775,13 12,13 C18.0751322,13 23,17.9248678 23,24 L22.5,24 L22,24 Z"></path></g></svg>
                                ورود / ثبت نام
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection


@section("js")

    <script>
        $(document).ready(function(){
            $("#order-form-submit").on("click",function(e){
                $data = $("#order-form").serialize();
                $(this).append("<span class='fa fa-spinner fa-spin font-16 mr-2'></span>");
                $("#order-form").css("filter","blur(3px)");
                $("#order-form input,#order-form textarea,#order-form button").prop("disabled",true);
                $.ajax({
                    type: "POST",
                    url: "{{ route("order_form_send" , ["brand" => $brand , "part_id" => $result['part_id']]) }}",
                    data: $data,
                    success: function (result) {
                        if(result.errors == 1){
                            $("#result").empty();
                            result.result.forEach(function(value,key) {
                                $("#result").append('<div class="mb-0 text-danger">* '+value+'</div>');
                                if(key == result.length - 1){
                                    $("#result").prepend('<hr>');
                                }
                            });
                            setTimeout(function(){
                                $("#order-form").css("filter","blur(0px)");
                                $("#order-form input,#order-form textarea,#order-form button").not("#product").prop("disabled",false);
                                $("#order-form-submit").html("ثبت سفارش");
                                $("#result").empty();
                            },3000);
                        }else if(result.errors == 0){
                            $("#order-form").hide();
                            $("#result").html('<div class="mb-4 mt-5 p-2 text-center alert alert-success">'+result.result+'</div>');
                        }
                    }
                });
                e.preventDefault();
            });
        });
    </script>

@endsection
