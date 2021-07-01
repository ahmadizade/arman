<!-- Start Sidebar -->
<div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 sticky-sidebar">
<div class="profile-sidebar dt-sl">
@if(isset($user) && \Illuminate\Support\Facades\Auth::check())
    <div class="dt-sl dt-sn mb-3">
    <div class="profile-sidebar-header dt-sl">
    <div class="d-flex align-items-center">
    <div class="profile-avatar">
        <img src="/img/theme/avatar.png" alt="">
    </div>
    <div class="profile-header-content mr-3 mt-2">
        <span class="d-block profile-username">{{$user->name ?? ""}} {{$user->family ?? ""}}</span>
        <span class="d-block profile-phone">{{$user->mobile ?? "ثبت نشده"}}</span>
    </div>
    </div>
    <div class="profile-point mt-3 mb-2 dt-sl">
    <span class="label-profile-point">امتیاز شما:</span>
    <span class="float-left value-profile-point">120</span>
    </div>
    <div class="profile-link mt-2 dt-sl">
    <div class="row">
        <div class="col-6 text-center">
            <a href="{{route('change_password')}}">
                <i class="mdi mdi-lock-reset"></i>
                <span class="d-block">تغییر رمز</span>
            </a>
        </div>
        <div class="col-6 text-center">
            <a href="{{route('logout')}}">
                <i class="mdi mdi-logout-variant"></i>
                <span class="d-block">خروج از حساب</span>
            </a>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="dt-sl dt-sn mb-3 text-center">
    <a href="#">
    <img src="/img/banner/sidebar-banner-3.png" class="img-fluid" alt="">
    </a>
    </div>
    <div class="dt-sl dt-sn mb-3">
    <div class="profile-menu-section dt-sl">
    <div class="label-profile-menu mt-2 mb-2">
    <span>حساب کاربری شما</span>
    </div>
    <div class="profile-menu">
    <ul>
        <li>
            <a href="{{ route("profile_index") }}" class="@if($menu == "index") active @endif">
                <i class="mdi mdi-account-circle-outline"></i>
                پروفایل
            </a>
        </li>
        <li>
            <a href="{{ route("profile_edit") }}" class="@if($menu == "profile") active @endif">
                <i class="mdi mdi-account-edit-outline"></i>
                تنظیمات کاربری
            </a>
        </li>
        <li>
            <a href="{{route('my_webservice')}}" class="@if($menu == "webservice") active @endif">
                <i class="mdi mdi-basket"></i>
                وب سرویس ها
            </a>
        </li>
        <li>
            <a href="{{route('orders')}}" class="@if($menu == "orders") active @endif">
                <i class="mdi mdi-basket"></i>
                سفارشات من
            </a>
        </li>
{{--        <li>--}}
{{--            <a href="{{ route("profile_store") }}">--}}
{{--                <i class="mdi mdi-backburger @if($menu == "store") active @endif"></i>--}}
{{--                فروشگاه من--}}
{{--            </a>--}}
{{--        </li>--}}
        <li>
            <a href="{{ route("profile_bookmark") }}" class="@if($menu == "bookmark") active @endif">
                <i class="mdi mdi-heart-outline"></i>
                نشان شده ها
            </a>
        </li>
{{--        <li>--}}
{{--            <a href="{{ route("profile_products") }}">--}}
{{--                <i class="mdi mdi-glasses @if($menu == "products") active @endif"></i>--}}
{{--                محصولات من--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="#">--}}
{{--                <i class="mdi mdi-sign-direction"></i>--}}
{{--                آدرس ها--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{ route("profile_add_product") }}">--}}
{{--                <i class="mdi mdi-eye-outline @if($menu == "add_product") active @endif"></i>--}}
{{--                افزودن محصول--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
    </div>
    </div>
    </div>
@endif
</div>
</div>
<!-- End Sidebar -->
