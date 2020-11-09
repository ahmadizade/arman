<div class="col-12 col-lg-3">
    <div class="list-group mt-3">
        <a href="{{ route("profile_index") }}" class="list-group-item list-group-item-action @if($menu == "index") active @endif">پیشخوان</a>
        <a href="{{ route("profile_store") }}" class="list-group-item list-group-item-action @if($menu == "store") active @endif">فروشگاه شما</a>
        <a href="{{ route("profile_products") }}" class="list-group-item list-group-item-action @if($menu == "products") active @endif">همه محصولات</a>
        <a href="{{ route("profile_add_product") }}" class="list-group-item list-group-item-action @if($menu == "add_product") active @endif">افزودن محصول</a>
        <a href="{{ route("profile_bio") }}" class="list-group-item list-group-item-action @if($menu == "bio") active @endif">بیوگرافی فروشگاه</a>
        <a href="{{ route("profile_bookmark") }}" class="list-group-item list-group-item-action @if($menu == "bookmark") active @endif">نشان شده ها</a>
        <a href="{{ route("profile_edit") }}" class="list-group-item list-group-item-action @if($menu == "profile") active @endif">تنظیمات کاربری</a>
        <a href="{{ route("profile_gold") }}" class="list-group-item list-group-item-action @if($menu == "gold") active @endif">عضو طلایی</a>
        <a href="{{ route("profile_qrcode") }}" class="list-group-item list-group-item-action @if($menu == "qrcode") active @endif"><i class="fa fa-qrcode font-20 pl-2"></i>نشان پرداخت</a>
        <a href="{{ route("logout") }}" class="list-group-item list-group-item-action">خروج</a>
    </div>
</div>
