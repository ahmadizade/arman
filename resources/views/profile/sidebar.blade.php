<!-- Start Sidebar -->
@if(isset($user) && \Illuminate\Support\Facades\Auth::check())
        <div class="col-lg-3 col-md-12">
            <aside class="widget-area">

                <section class="widget widget_drodo_posts_thumb">
                    <img class="widget-title" src="/img/logo.png" alt="لوگو">
                    <div class="sidebar-sidebar-item">
                        <div class="info">
                            <p class="title usmall @if($menu == "index") active @endif"><a href="{{ route("profile_index") }}"><i class="bx bx-group"></i> پروفایل</a></p>
                        </div>

                        <div class="clear"></div>
                    </div>

                    <div class="sidebar-item">
                        <div class="info">
                            <p class="title usmall"><a href="{{route('change_password')}}">تغییر رمز عبور</a></p>
                        </div>

                        <div class="clear"></div>
                    </div>


                    <article class="sidebar-item">
                        <div class="info">
                            <p class="title usmall"><a href="{{route('logout')}}">خروج از حساب</a></p>
                        </div>

                        <div class="clear"></div>
                    </article>


                    <article class="sidebar-item">
                        <div class="info">
                            <p class="title usmall @if($menu == "orders") active @endif"><a href="{{route('orders')}}"><i class="bx bx-calendar"></i> سفارشات من</a></p>
                        </div>

                        <div class="clear"></div>
                    </article>

                     <article class="sidebar-item">
                        <div class="info">
                            <p class="title usmall @if($menu == "credit") active @endif"><a href="{{route('profile_credit')}}"><i class="bx bx-folder-open"></i> کیف پول من</a></p>
                        </div>

                        <div class="clear"></div>
                    </article>


                    <article class="sidebar-item">
                        <div class="info">
                            <p class="title usmall @if($menu == "bookmark") active @endif"><a href="{{ route("profile_bookmark") }}">نشان شده ها</a></p>
                        </div>

                        <div class="clear"></div>
                    </article>





                </section>




                <section class="widget widget_categories">
                    <h3 class="widget-title">دسته بندی ها</h3>

                    <ul>
                        <li><a href="#">طراحی <span class="post-count">(03)</span></a></li>
                        <li><a href="#">سبک زندگی <span class="post-count">(05)</span></a></li>
                        <li><a href="#">متن <span class="post-count">(10)</span></a></li>
                        <li><a href="#">دستگاه <span class="post-count">(08)</span></a></li>
                        <li><a href="#">نکات <span class="post-count">(01)</span></a></li>
                    </ul>
                </section>

                <section class="widget widget_tag_cloud">
                    <h3 class="widget-title">برچسب های محبوب</h3>

                    <div class="tagcloud">
                        <a href="#">تجارت <span class="tag-link-count">(3)</span></a>
                        <a href="#"> طراحی <span class="tag-link-count">(3)</span></a>
                        <a href="#">متن<span class="tag-link-count">(2)</span></a>
                        <a href="#"> مد <span class="tag-link-count">(2)</span></a>
                        <a href="#"> مسافرت <span class="tag-link-count">(1)</span></a>
                        <a href="#"> هوشمند <span class="tag-link-count">(1)</span></a>
                        <a href="#"> بازاریابی <span class="tag-link-count">(1)</span></a>
                        <a href="#"> نکات <span class="tag-link-count">(2)</span></a>
                    </div>
                </section>
            </aside>
        </div>
@endif
<!-- End Sidebar -->
