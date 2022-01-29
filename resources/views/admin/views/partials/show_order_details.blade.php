@if (isset($details) && isset($details[0]))
    <table id="user_table" class="table table-responsive-xl table-responsive-sm text-center border-bottom-primary bg-gradient-info text-white table-sm table-borderless table-striped" width="100%" style="direction:rtl!important;">
        <thead class="bg-gradient-primary text-white shadow">
        <tr class="text-center">
            <th scope="col">شناسه</th>
            <th scope="col">نام محصول</th>
            <th scope="col">قیمت</th>
            <th scope="col">تعداد</th>
            <th scope="col">تخفیف</th>
            <th scope="col">ثبت سفارش</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($details as $item)
                <tr class="text-center">
                    <td>{{$item->id}}</td>
                    <td>{{$item->product_name}}</td>
                    <td>{{number_format($item->product_price)}} تومان</td>
                    <td>{{$item->product_quantity}} عدد</td>
                    <td>
                        @if ($item->product_discount == 0)
                            <span class="text-danger">ندارد</span>
                        @elseif ($item->product_discount > 0)
                            {{$item->product_discount}}%
                        @endif
                    </td>
                    <td>{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('Y/m/d')}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

