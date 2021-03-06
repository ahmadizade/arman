<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="font-family: iranyekan, icomoon, sans-serif !important;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">armanmask <sup>S.T</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('armanmask')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User Manager
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('home')}}" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span class="font-weight-bolder">سامانه مدیریت وب سایت</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Management:</h6>
                <a class="collapse-item font-weight-bolder" href="{{route('Admin_Users')}}">مدیریت کاربران</a>
                <a class="collapse-item font-weight-bolder" href="{{route('Contact_Us')}}">تماس با ما</a>
                <a class="collapse-item font-weight-bolder" href="{{route('dynamic_home_page')}}">صفحه نخست</a>
                <a class="collapse-item font-weight-bolder" href="{{route('dynamic_about_contact_us')}}">محتوای درباره / تماس با ما</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('home')}}" data-toggle="collapse" data-target="#collapseSeo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span class="font-weight-bolder">Seo</span>
        </a>
        <div id="collapseSeo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Management:</h6>
                <a class="collapse-item font-weight-bolder" href="{{route('seo_pages')}}">مدیریت صفحات</a>
{{--                <a class="collapse-item font-weight-bolder" href="{{route('Contact_Us')}}">تماس با ما</a>--}}
{{--                <a class="collapse-item font-weight-bolder" href="">مدیریت فروشگاه ها</a>--}}
            </div>
        </div>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        Product Manager
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('home')}}" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span class="font-weight-bolder">مدیریت محصولات</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Product Management:</h6>
{{--                <a class="collapse-item font-weight-bolder" href="{{route('Store')}}">فروشگاه ها</a>--}}
                <a class="collapse-item font-weight-bolder" href="{{route('Product')}}">افزودن محصول</a>
                <a class="collapse-item font-weight-bolder" href="{{route('show_product')}}">محصولات ثبت شده</a>
                <a class="collapse-item font-weight-bolder" href="{{route('add_category_page')}}">دسته بندی</a>
                <a class="collapse-item font-weight-bolder" href="{{route('add_tag_page')}}">برچسب ها</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('home')}}" data-toggle="collapse" data-target="#collapseblog"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span class="font-weight-bolder">خبرنامه</span>
        </a>
        <div id="collapseblog" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Blog Manager</h6>
                <a class="collapse-item font-weight-bolder" href="{{route('category_mag_page')}}">دسته بندی مطالب</a>
                <a class="collapse-item font-weight-bolder" href="{{route('tag_mag_page')}}">مدیریت برچسب ها</a>
                <a class="collapse-item font-weight-bolder" href="{{route('new_single_mag')}}">نوشتن مطلب</a>
                <a class="collapse-item font-weight-bolder" href="{{route('show_single_mag')}}">مطالب ثبت شده</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('home')}}" data-toggle="collapse" data-target="#collapsePages"
           aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>سفارشات</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Order Management</h6>
                <a class="collapse-item" href="{{route('orders_management')}}">مشاهده سفارشات</a>
{{--                <a class="collapse-item" href="#">ارسال شده</a>--}}
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
