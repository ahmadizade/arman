@extends("layouts.master")

@section("title")
    <title>ثبت محصول جدید | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container mt-3">
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
                                            <span class="input-group-text font-12">نام کالا</span>
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
                                            <span class="input-group-text font-12">نوع کالا</span>
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
                @if(isset($products))
                    <div class="row">
                        <div class="col-12">
                            <h2 class="mt-5">آخرین محصولات اضافه شده به سایت توسط شما</h2>
                            <hr class="my-2">
                        </div>
                        @foreach($products as $product)
                            <div class="col-12 @if(count($products) == 1) col-lg-12 @else col-lg-6 @endif">
                                <div class="card shadow-sm mt-3">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 d-flex align-self-center">
                                            @if(is_null($product->image))
                                                <img src="/images/no-image2.png" class="card-img"
                                                     alt="No Image">
                                            @else
                                                <img src="{{ Storage::disk('vms')->url($product['image']) }}"
                                                     class="card-img"
                                                     alt="...">
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title mb-1 font-15 nowrap">@if($product->stock == 1) <span
                                                        class="badge badge-secondary font-weight-normal">نو</span>  @else
                                                        <span
                                                            class="badge badge-secondary font-weight-normal">کارکرده</span>  @endif
                                                    | {{ $product->product_name }}</h5>
                                                <p class="card-text mb-1"><span
                                                        class="text-muted font-12">قیمت:</span>
                                                    <span class="font-18">{{ number_format($product->price) }}</span>
                                                    @if($product->discount > 20) |
                                                        <span class="badge badge-danger font-14 font-weight-normal">%{{$product->discount - 20}} تخفیف </span>
                                                    @endif
                                                </p>
                                                <p class="card-text"><span
                                                        class="text-muted font-12">موجودی:</span> {{$product->quantity}}
                                                    عدد |
                                                    <span
                                                        class="text-muted font-12">تاریخ:</span><span> {{ \Morilog\Jalali\Jalalian::forge($product->created_at)->format("Y/m/d") }} </span>
                                                </p>
                                            </div>
                                            <div class="card-footer">
                                                <a href="#"
                                                   class="text-danger pl-3 delete" data-id="{{ $product->id }}">حذف</a>
                                                <a href="{{route('profile_edit_product',["id" => $product->id])}}"
                                                   class="text-warning pl-3">ویرایش</a>
                                                <a href=""
                                                   class="text-success pl-3">مشاهده</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
