<div class="col-12 col-lg-3">
    <div class="list-group mt-3">
        <a href="{{ route("profile_index") }}" class="list-group-item list-group-item-action @if($menu == "index") active @endif">پیشخوان</a>
        <a href="{{ route("profile_store") }}" class="list-group-item list-group-item-action @if($menu == "store") active @endif"><i class="fas fa-cash-register text-blue font-17 pl-2"></i>فروشگاه من</a>
        <a href="{{ route("profile_credit") }}" class="list-group-item list-group-item-action @if($menu == "credit") active @endif"><i class="fas text-danger fa-credit-card font-14 pl-2"></i>دریافت اعتبار</a>
        <a href="{{ route("profile_products") }}" class="list-group-item list-group-item-action @if($menu == "products") active @endif"><i class="fas fa-shopping-cart text-blue font-14 pl-2"></i>محصولات من</a>
        <a href="{{ route("profile_add_product") }}" class="list-group-item list-group-item-action @if($menu == "add_product") active @endif"><i class="fas fa-cart-plus text-blue font-14 pl-2"></i>افزودن محصول</a>
        <a href="{{ route("profile_bio") }}" class="list-group-item list-group-item-action @if($menu == "bio") active @endif"><i class="fas fa-file-alt text-blue font-14 pl-2"></i>بیوگرافی فروشگاه</a>
        <a href="{{ route("profile_bookmark") }}" class="list-group-item list-group-item-action @if($menu == "bookmark") active @endif"><i class="far fa-bookmark text-blue font-14 pl-2"></i>نشان شده ها</a>
        <a href="{{ route("profile_edit") }}" class="list-group-item list-group-item-action @if($menu == "profile") active @endif"><i class="fas fa-user-cog text-blue font-14 pl-2"></i>تنظیمات کاربری</a>
        <a href="{{ route("profile_gold") }}" class="list-group-item list-group-item-action @if($menu == "gold") active @endif"><i class="fas fa-gem text-warning font-17 pl-2"></i>عضو طلایی</a>
        <a href="{{ route("profile_qrcode") }}" class="list-group-item list-group-item-action @if($menu == "qrcode") active @endif"><i class="fa text-blue fa-qrcode font-17 pl-2"></i>نشان پرداخت</a>
        <a href="{{ route("logout") }}" class="list-group-item list-group-item-action"><i class="icon-exit_to_app text-blue font-17 pl-2"></i>خروج</a>
    </div>
</div>
