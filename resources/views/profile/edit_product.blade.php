@extends("layouts.master")

@section("title")
    <title>ویرایش پست | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container mt-3">
        <div class="row">
            @include("profile.sidebar")
            <div class="col-12 col-lg-9">
                <div class="card shadow mt-3">
                    <div class="card-header bg-secondary text-white p-2">
                        <h3 class="mt-1 mb-0 font-14 float-right"> ویرایش محصولات</h3>
                    </div>
                    <div class="card-body p-3">
                        @if ($errors->any())
                            <div class="alert alert-danger mt-2 mb-2">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has("status"))
                            <div class="alert alert-success mt-2 mb-2">{{ Session::get("status") }}</div>
                        @elseif(Session::has("error"))
                            <div class="alert alert-danger mt-2 mb-2">{{ Session::get("error") }}</div>
                        @endif
                        <form action="{{route('edit_product_action',["id"=> $product->id ])}}" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-12 col-lg-12">
                                    <div class="input-group mt-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">نام کالا</span>
                                        </div>
                                        <input id="product_name" name="name" type="text" class="form-control"
                                               value="{{ $product->product_name }}">
                                    </div>
                                </div>

                                <div class="col-12">
                                <textarea name="desc" id="product_desc" cols="30" rows="7"
                                          class="form-control font-13 mt-2"
                                          placeholder="توضیحات">{{ $product->product_desc }}</textarea>
                                </div>


                                <div class="col-12 col-lg-4">
                                    <div class="input-group mt-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">قیمت (ریال)</span>
                                        </div>
                                        <input type="number" id="product_price" name="price" class="form-control"
                                               value="{{ $product->price }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="input-group mt-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">موبایل</span>
                                        </div>
                                        <input type="number" id="product_mobile" name="mobile" class="form-control"
                                               value="{{ $product->mobile }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="input-group mt-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-12">تخفیف</span>
                                        </div>
                                        <select name="discount" id="product_discount" class="form-control">
                                            @for($i=20;$i<=100;$i++)
                                                <option @if($product->discount == $i) selected @endif value="{{ $i }}">{{ $i }} درصد </option>
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
                                                <option @if($product->quantity == $i) selected
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
                                            <option @if($product->stock != null && $product->stock == 1) selected
                                                    @endif value="1">نو
                                            </option>
                                            <option @if($product->stock != null && $product->stock == 0) selected
                                                    @endif value="0">کارکرده
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="input-group mt-2">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file" id="file">
                                            <label class="custom-file-label text-left" for="inputGroupFile01">+ افزودن
                                                عکس</label>
                                        </div>
                                    </div>
                                    <span class="text-muted font-11">در صورت عدم تمایل تعویض عکس, فیلد را خالی بگذارید</span>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12 text-left">
                                    <button class="btn btn-primary my-2">ویرایش محصول</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
