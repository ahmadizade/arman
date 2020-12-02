@extends("layouts.master")

@section("title")
    <title>لیست همه محصولات شما | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container">
        <div class="row">
            @include("profile.sidebar")
            <div class="col-12 col-lg-9">
                <div class="card border-0 mt-3">
                    <div class="card-header card-header p-3">
                        @if($count == 0)
                            <h5 class="mt-1 mb-0 font-14 float-right">برای ثبت محصول <span> <a href="{{route('profile_add_product')}}">اینجا</a></span> کلیک کنید</h5>
                        @elseif($count > 0)
                        <h3 class="mt-1 mb-0 font-14 float-right">محصولات من :   <span class="text-white badge badge-primary">{{$count}}</span><span> عدد</span></h3>
                        @endif
                    </div>
                    @include('profile.my_products')
                </div>
            </div>
        </div>
    </div>

@endsection


@section("extra_js")
    <script>
        $(".delete").on("click",function(e){
            Swal.fire({
                text: "آیا اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله حذف میکنم',
                cancelButtonText: 'خیر',
            }).then((result) => {
                if(result.value) {
                    $.ajax({
                        url: '{{ route("delete_product_action") }}',
                        type: 'POST',
                        data: {"id":$(this).attr("data-id")},
                        success: function(data) {
                            console.log(data);
                            if(data.errors == "1"){
                                alert(data.desc);
                            }else if(data.errors == "0"){
                                window.location.reload();
                            }
                        },
                    });
                }
            });
            e.preventDefault();
        });
    </script>
@endsection
