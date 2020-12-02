@extends("layouts.master")

@section("title")
    <title>ثبت محصول جدید | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container">
        <div class="row">
            @include("profile.sidebar")
            <div class="col-12 col-lg-9">
                <div class="card shadow mt-3">
                    <div class="card-header card-header p-3">
                        <h3 class="mt-1 mb-0 font-14 float-right"> ثبت محصولات</h3>
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
                            <div class="alert text-center alert-success mb-2">{{ Session::get("status") }}</div>
                        @elseif(Session::has("error"))
                            <div class="alert text-center alert-danger mb-2">{{ Session::get("error") }}</div>
                        @endif
                        <form action="{{route('add_product_action')}}" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-12 col-lg-12">
                                    <div class="input-group mt-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">نام کالا یا خدمات</span>
                                        </div>
                                        <input id="product_name" name="name" type="text" class="form-control"
                                               value="{{ old("name") }}">
                                    </div>
                                </div>

                                <div class="col-12">
                                <textarea name="desc" id="product_desc" cols="30" rows="7"
                                          class="form-control font-13 mt-2"
                                          placeholder="توضیحات">{{ old("desc") }}</textarea>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="input-group mt-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">قیمت (ریال)</span>
                                        </div>
                                        <input type="number" id="product_price" name="price" class="form-control"
                                               value="{{ old("price") }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="input-group mt-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">موبایل</span>
                                        </div>
                                        <input type="number" id="product_mobile" name="mobile" class="form-control"
                                               value="{{ old("mobile") ?? Auth::user()->mobile }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="input-group mt-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">تخفیف</span>
                                        </div>
                                        <select name="discount" id="product_discount" class="form-control">
                                            @for($i=20;$i<=100;$i++)
                                                <option @if(old("discount") == $i) selected @endif value="{{ $i }}">{{ $i }} درصد </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="input-group mt-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">تعداد موجودی</span>
                                        </div>
                                        <select name="quantity" id="product_discount" class="form-control">
                                            @for($i=1;$i<=500;$i++)
                                                <option @if(old("quantity") == $i) selected
                                                        @endif value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="input-group mt-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">نوع کالا یا خدمات</span>
                                        </div>
                                        <select class="form-control" name="stock" id="product_stock">
                                            <option @if(old("stock") != null && old("stock") == 1) selected
                                                    @endif value="1">نو
                                            </option>
                                            <option @if(old("stock") != null && old("stock") == 0) selected
                                                    @endif value="0">کارکرده
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="input-group mt-2">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file" id="image">
                                            <label class="custom-file-label text-left" for="inputGroupFile01">+ افزودن
                                                عکس</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 text-left">
                                    <button class="btn btn-primary my-2">ثبت محصول</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                @if(isset($product))
                    <div class="row">
                        <div class="col-12">
                            <h2 class="mt-5">آخرین محصولات اضافه شده به سایت توسط شما</h2>
                            <hr class="my-2">
                        </div>
                        @include('profile.my_products')
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

@section('extra_js')

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
