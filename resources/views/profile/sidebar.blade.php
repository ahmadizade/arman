<div class="col-12 col-lg-3">
    <div class="list-group mt-3">
        <a href="{{ route("profile_index") }}" class="list-group-item list-group-item-action @if($menu == "index") active @endif">پیشخوان</a>
        <a href="{{ route("profile_add_product") }}" class="list-group-item list-group-item-action @if($menu == "add_product") active @endif">افزودن محصول</a>
        <a href="{{ route("profile_edit") }}" class="list-group-item list-group-item-action @if($menu == "profile") active @endif">تنظیمات کاربری</a>
        <a href="{{ route("profile_edit") }}" class="list-group-item list-group-item-action @if($menu == "gold") active @endif">عضو طلایی</a>
        <a href="{{ route("profile_edit") }}" class="list-group-item list-group-item-action @if($menu == "") active @endif">شارژ ثمین تخفیف</a>
        <a href="{{ route("profile_edit") }}" class="list-group-item list-group-item-action @if($menu == "") active @endif">ثبت فروشگاه</a>
        <a href="{{ route("profile_edit") }}" class="list-group-item list-group-item-action @if($menu == "") active @endif">من هوادارم</a>
        <a href="{{ route("profile_edit") }}" class="list-group-item list-group-item-action @if($menu == "") active @endif">من هواندارم</a>
        <a href="{{ route("logout") }}" class="list-group-item list-group-item-action">خروج</a>
    </div>
</div>
