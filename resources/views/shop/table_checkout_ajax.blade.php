@foreach($cart as $item)
    <div class="col-12 p-0">
        <div class="card mt-3">
            <div class="card-header p-2">
                <h3 class="mb-0 font-14">{{ $item['product_name'] }}</h3>
            </div>
            <div class="card-body p-2">
                <div class="row align-items-center">
                    <div class="col-12 text-center col-md-6">
                        <span class="text-muted font-12"> قیمت اصلی: </span><span class="font-15">{{ number_format($item['price']) }} <span class="font-11">ریال</span></span>
                    </div>
                    <div class="col-12 text-center col-md-6">
                        <div class="add-minus">
                            <span class="minus"><i class="fa fa-minus"></i></span>
                            <input type="tel" data-id="{{ $item['id'] }}" data-value="{{ $item['count'] }}" value="{{ $item['count'] }}">
                            <span class="plus"><i class="fa fa-plus"></i></span>
                        </div>
                    </div>
                    <div class="col-12 text-center col-md-6">
                        <span class="text-muted font-12"> قیمت کل: </span><span class="font-15">{{ number_format($item['total']) }} <span class="font-11">ریال</span></span>
                    </div>
                    <div class="col-12 col-md-6 text-center">
                        <div class="text-danger remove-cart pt-1" data-id="{{ $item['id'] }}" style="cursor:pointer;"><i class="fa fa-trash-alt"></i> حذف </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<div class="col-12 mt-3 text-center">
    <a class="btn bg-secondary text-white font-12" href="/">افزودن محصولات دیگر به سبد خرید</a>
</div>
