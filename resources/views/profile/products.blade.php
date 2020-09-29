@extends("layouts.master")

@section("title")
    <title>لیست همه محصولات شما | ثمین تخفیف</title>
@endsection

@section("content")

    <div class="container" style="margin-top: 80px">
        <div class="row">
            @include("profile.sidebar")
            <div class="col-12 col-lg-9">
                <div class="card border-0 mt-3">
                    <div class="card-header card-header p-3">
                        <h3 class="mt-1 mb-0 font-14 float-right">همه محصولات</h3>
                    </div>
                    <div class="card-body p-0 pb-2">
                        <div class="row">
                            @if(isset($product))
                                @foreach($product as $item)
                                <div class="col-12 @if(count($product) == 1) col-lg-12 @else col-lg-6 @endif">
                                    <div class="card shadow-sm mt-3">
                                        <div class="row no-gutters">
                                            <div class="col-md-4 d-flex align-self-center">
                                                @if(is_null($item->image))
                                                    <img src="{{ url('/images/no-image2.png') }}" class="card-img"
                                                         alt="No Image">
                                                @else
                                                    <img src="{{ Storage::disk('vms')->url($item['image']) }}"
                                                         class="card-img"
                                                         alt="...">
                                                @endif
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-1 font-15 nowrap">@if($item->stock == 1) <span
                                                            class="badge badge-secondary font-weight-normal">نو</span>  @else
                                                            <span
                                                                class="badge badge-secondary font-weight-normal">کارکرده</span>  @endif
                                                        | {{ $item->product_name }}</h5>
                                                    0 <p class="card-text mb-1"><span
                                                            class="text-muted font-12">قیمت:</span>
                                                        <span class="font-18">{{ number_format($item->price) }}</span> |
                                                        <span
                                                            class="badge badge-danger font-14 font-weight-normal">%{{$item->discount}} تخفیف </span>
                                                    </p>
                                                    <p class="card-text"><span
                                                            class="text-muted font-12">موجودی:</span> {{$item->quantity}}
                                                        عدد |
                                                        <span
                                                            class="text-muted font-12">تاریخ:</span><span> {{ \Morilog\Jalali\Jalalian::forge($item->created_at)->format("Y/m/d") }} </span>
                                                    </p>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="#"
                                                       class="text-danger pl-3 delete" data-id="{{ $item->id }}">حذف</a>
                                                    <a href="{{route('profile_edit_product',["id" => $item->id])}}"
                                                       class="text-warning pl-3">ویرایش</a>
                                                    <a href=""
                                                       class="text-success pl-3">مشاهده</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                <div class="col-12 mt-5 text-center d-flex justify-content-center">
                                    {{ $product->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
