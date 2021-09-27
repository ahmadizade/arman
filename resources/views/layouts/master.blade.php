<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,follow"/>
    <meta name="googlebot" content="noindex, nofollow">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
@yield("title")
<!-- Links of CSS files -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/flaticon.css">
    <link rel="stylesheet" href="/css/animate.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/meanmenu.min.css">
    <link rel="stylesheet" href="/css/nice-select.min.css">
    <link rel="stylesheet" href="/css/fancybox.min.css">
    <link rel="stylesheet" href="/css/rangeSlider.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link rel="stylesheet" href="/css/sweetalert2.all.css">


    <link rel="icon" type="image/png" href="/img/favicon.png">

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3RHYEWL1XJ"></script>
    @yield("extra_css")
</head>
<body>

        @include("partials.header")
        @include('sweetalert::alert')
        @yield("content")



        <!-- Start QuickView Modal Area -->
        <div class="modal fade productsQuickView" id="productsQuickView" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div id="modal-content" class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="نزدیک">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>
                    {{--CONTENT WITH AJAX--}}
                </div>
            </div>
        </div>
        <!-- End QuickView Modal Area -->

        <!-- Start Shopping Cart Modal -->
        <div class="modal right fade shoppingCartModal" id="shoppingCartModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="نزدیک">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>

                    <div class="modal-body">
                        @if(!empty(Illuminate\Support\Facades\Session::has('product') && count(Illuminate\Support\Facades\Session::get('product')) > 0))
                            <h3>سبد خرید من ({{count(Illuminate\Support\Facades\Session::get('product'))}})</h3>
                        @else
                            <h3>سبد خرید من (0)</h3>
                        @endif

                        <div class="products-cart-content">
                            @if(!empty(Illuminate\Support\Facades\Session::has('product') && count(Illuminate\Support\Facades\Session::get('product')) > 0))
                                @php
                                    $price = 0;
                                @endphp
                                @foreach(Illuminate\Support\Facades\Session::get('product') as $key => $item)
                                @php
                                    $price = $price + $item['price'];
                                @endphp
                                    <div class="products-cart d-flex align-items-center">
                                    <div class="products-image">
                                        <img src="/uploads/thumbnail/{{$item['thumbnail'] ?? "noimage_64.jpg"}}" alt="{{$item['product_name'] ?? "نا معلوم"}}">
                                    </div>
                                    <div class="products-content">
                                        <h3>{{ $item['product_name'] }}</h3>
                                        <div class="products-price">
                                            <span class="price">{{number_format($item['price'])}} تومان</span>
                                        </div>
                                    </div>
                                    <a href="#" data-id="{{ $item['id'] }}" class="remove-cart remove-btn"><i class="bx bx-trash"></i></a>
                                </div>
                                @endforeach
                            @else
                                <div class="products-cart d-flex align-items-center">
                                    <div class="products-content">
                                        <h3><a href="#">سبد خرید خالی میباشد! </a></h3>
                                        <div class="products-price">
                                            <span class="price">ابتدا محصول مورد نظر خود را انتخاب کنید</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if(!empty(Illuminate\Support\Facades\Session::has('product') && count(Illuminate\Support\Facades\Session::get('product')) > 0))
                     {{--       <div class="products-cart-subtotal">
                                <span>جمع </span>

                                <span class="subtotal">{{number_format($price ?? 0)}} تومان</span>
                            </div>--}}
                            <div class="products-cart-btn">
                                <a href="{{route('cart_page')}}" class="default-btn">سبد خرید</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- End Shopping Cart Modal -->

        <!-- Start Shopping Cart Modal -->
{{--        <div class="modal right fade shoppingWishlistModal" id="shoppingWishlistModal" tabindex="-1" role="dialog">--}}
{{--            <div class="modal-dialog" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="نزدیک">--}}
{{--                        <span aria-hidden="true"><i class="bx bx-x"></i></span>--}}
{{--                    </button>--}}

{{--                    <div class="modal-body">--}}
{{--                        <h3>لیست خواسته های من (3)</h3>--}}

{{--                        <div class="products-cart-content">--}}
{{--                            <div class="products-cart d-flex align-items-center">--}}
{{--                                <div class="products-image">--}}
{{--                                    <a href="#"><img src="/img/products/products-img1.jpg" alt="تصویر"></a>--}}
{{--                                </div>--}}

{{--                                <div class="products-content">--}}
{{--                                    <h3><a href="#">ماسک صورت </a></h3>--}}
{{--                                    <div class="products-price">--}}
{{--                                        <span>1 </span>--}}
{{--                                        <span>X </span>--}}
{{--                                        <span class="price">39000 تومان</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <a href="#" class="remove-btn"><i class="bx bx-trash"></i></a>--}}
{{--                            </div>--}}

{{--                            <div class="products-cart d-flex align-items-center">--}}
{{--                                <div class="products-image">--}}
{{--                                    <a href="#"><img src="/img/products/products-img2.jpg" alt="تصویر"></a>--}}
{{--                                </div>--}}

{{--                                <div class="products-content">--}}
{{--                                    <h3><a href="#">دستکش محافظ</a></h3>--}}
{{--                                    <div class="products-price">--}}
{{--                                        <span>1 </span>--}}
{{--                                        <span>X </span>--}}
{{--                                        <span class="price">99000 تومان</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <a href="#" class="remove-btn"><i class="bx bx-trash"></i></a>--}}
{{--                            </div>--}}

{{--                            <div class="products-cart d-flex align-items-center">--}}
{{--                                <div class="products-image">--}}
{{--                                    <a href="#"><img src="/img/products/products-img3.jpg" alt="تصویر"></a>--}}
{{--                                </div>--}}

{{--                                <div class="products-content">--}}
{{--                                    <h3><a href="#">اسلحه دماسنج مادون قرمز</a></h3>--}}
{{--                                    <div class="products-price">--}}
{{--                                        <span>1 </span>--}}
{{--                                        <span>X </span>--}}
{{--                                        <span class="price">99000 تومان</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <a href="#" class="remove-btn"><i class="bx bx-trash"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="products-cart-subtotal">--}}
{{--                            <span>جمع </span>--}}

{{--                            <span class="subtotal">228000 تومان</span>--}}
{{--                        </div>--}}

{{--                        <div class="products-cart-btn">--}}
{{--                            <a href="#" class="default-btn">مشاهده سبد خرید</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- End Shopping Cart Modal -->

        <!-- Start Products Filter Modal Area -->
        <div class="modal left fade productsFilterModal" id="productsFilterModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="نزدیک">
                        <span aria-hidden="true"><i class="bx bx-x"></i> نزدیک</span>
                    </button>

                    <div class="modal-body">
                        <div class="woocommerce-widget-area">
                            <div class="woocommerce-widget price-list-widget">
                                <h3 class="woocommerce-widget-title">فیلتر با قیمت</h3>

                                <div class="collection-filter-by-price">
                                    <input class="js-range-of-price" type="text" data-min="0" data-max="1055" name="filter_by_price" data-step="10">
                                </div>
                            </div>

                            <div class="woocommerce-widget color-list-widget">
                                <h3 class="woocommerce-widget-title">رنگ</h3>

                                <ul class="color-list-row">
                                    <li class="active"><a href="#" title="سیاه" class="color-black"></a></li>
                                    <li><a href="#" title="قرمز" class="color-red"></a></li>
                                    <li><a href="#" title="زرد" class="color-yellow"></a></li>
                                    <li><a href="#" title="سفید" class="color-white"></a></li>
                                    <li><a href="#" title="آبی" class="color-blue"></a></li>
                                    <li><a href="#" title="سبز" class="color-green"></a></li>
                                    <li><a href="#" title="سبز زرد" class="color-yellowgreen"></a></li>
                                    <li><a href="#" title="رنگ صورتی" class="color-pink"></a></li>
                                    <li><a href="#" title="بنفشه" class="color-violet"></a></li>
                                    <li><a href="#" title="بنفش آبی" class="color-blueviolet"></a></li>
                                    <li><a href="#" title="اهک" class="color-lime"></a></li>
                                    <li><a href="#" title="آلو" class="color-plum"></a></li>
                                    <li><a href="#" title="چاله" class="color-teal"></a></li>
                                </ul>
                            </div>

                            <div class="woocommerce-widget brands-list-widget">
                                <h3 class="woocommerce-widget-title">مارک های تجاری</h3>

                                <ul class="brands-list-row">
                                    <li><a href="#">گوچی</a></li>
                                    <li><a href="#">ویرجیل ابلوح</a></li>
                                    <li><a href="#">بالنسیاگا</a></li>
                                    <li class="active"><a href="#">مونکلر</a></li>
                                    <li><a href="#">فندی</a></li>
                                    <li><a href="#">ورساچه</a></li>
                                </ul>
                            </div>

                            <div class="woocommerce-widget woocommerce-ads-widget">
                                <img src="/img/ads.jpg" alt="تصویر">

                                <div class="content">
                                    <span>تازه رسیده ها</span>
                                    <h3>دماسنج الکترونیکی مدرن</h3>
                                    <a href="#" class="default-btn"><i class="flaticon-trolley"></i> اکنون خرید کنید</a>
                                </div>


                            </div>

                            <div class="woocommerce-widget best-seller-widget">
                                <h3 class="woocommerce-widget-title">کتاب پرفروش</h3>

                                <article class="item">
                                    <a href="#" class="thumb">
                                        <span class="fullimage cover bg1" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <h4 class="title usmall"><a href="#">اسلحه دماسنج</a></h4>
                                        <span>65000 تومان</span>
                                        <div class="rating">
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </article>

                                <article class="item">
                                    <a href="#" class="thumb">
                                        <span class="fullimage cover bg2" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <h4 class="title usmall"><a href="#">دستکش محافظ</a></h4>
                                        <span>65000 تومان</span>
                                        <div class="rating">
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star-half"></i>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </article>

                                <article class="item">
                                    <a href="#" class="thumb">
                                        <span class="fullimage cover bg3" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <h4 class="title usmall"><a href="#">ظرف آرایشی و بهداشتی</a></h4>
                                        <span>139000 تومان</span>
                                        <div class="rating">
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bx-star"></i>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Products Filter Modal Area -->

        <div class="go-top"><i class="bx bx-up-arrow-alt"></i></div>


        @include("partials.footer")




        <script src="https://cdn.jsdelivr.net/gh/mahmoud-eskandari/NumToPersian/dist/num2persian-min.js"></script>
        <!-- Links of JS files -->
        <script src="/js/sweetalert2.all.min.js"></script>
        <script src="/js/accounting.js"></script>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/popper.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/magnific-popup.min.js"></script>
        <script src="/js/fancybox.min.js"></script>
        <script src="/js/owl.carousel.min.js"></script>
        <script src="/js/owl.carousel2.thumbs.min.js"></script>
        <script src="/js/meanmenu.min.js"></script>
        <script src="/js/nice-select.min.js"></script>
        <script src="/js/rangeSlider.min.js"></script>
        <script src="/js/sticky-sidebar.min.js"></script>
        <script src="/js/wow.min.js"></script>
        <script src="/js/form-validator.min.js"></script>
        <script src="/js/contact-form-script.js"></script>
        <script src="/js/ajaxchimp.min.js"></script>
        <script src="/js/main.js"></script>

        <script>

            $(".add-cart").on("click",function(e){
                $(this).append(' <span class="fa fa-spinner fa-spin"></span>');
                $.ajax({
                    type: "POST",
                    url: "{{ route("add_cart") }}",
                    data: {"id": $(this).attr("data-id")},
                    success: function (result) {
                        if(result.error == false){
                            window.location.reload();
                        }else{
                            alert(result.desc);
                            setTimeout(function(){
                                $("#add-cart button").html("<i class='flaticon-trolley'></i>افزودن به سبد خرید ");
                            },100)
                        }
                    },
                });
                e.preventDefault();
            });


            $("body").on("click",".remove-cart",function(e){
                $(this).append(' <span class="fa fa-spinner fa-spin"></span> ');
                $.ajax({
                    type: "POST",
                    url: "{{ route("remove_cart") }}",
                    data: {"id": $(this).attr("data-id")},
                    success: function (result) {
                        if(result.error = false){
                            alert("این محصول وجود ندارد");
                        }else{
                            window.location.reload();
                        }
                    },
                });
                e.preventDefault();
            });

            $( document ).ready(function() {
                $('body').on('click','.bookmark_btn',function (e){
                    e.preventDefault();
                    e.stopPropagation();
                    $.ajax({
                        url : '{{route('bookmark')}}',
                        type : 'POST',
                        data : {'product_id' : $(this).attr("data-id")},
                        success : function (data){
                            if(data.status == "0") {
                                Swal.fire({
                                    position: 'top-end',
                                    toast: true,
                                    icon: 'error',
                                    title: 'Bookmark Error!',
                                    text: data.desc,
                                    footer: 'ARMANMASK.ir',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            }
                            if(data.status == "1") {
                                Swal.fire({
                                    position: 'top-end',
                                    toast: true,
                                    icon: 'success',
                                    title: 'Successful',
                                    text: data.desc,
                                    footer: 'ARMANMASK.ir',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            }
                        }
                    });
                });
            });
        </script>
        <script>
            $( document ).ready(function() {
                $('body').on('click','.quick-view-btn',function (e){
                    e.preventDefault();
                    $.ajax({
                        url : '{{route('quick_view')}}',
                        type : 'POST',
                        data : {'product_id' : $(this).attr("data-id")},
                        success : function (data){
                            if(data.status == "0") {
                                Swal.fire({
                                    position: 'top-end',
                                    toast: true,
                                    icon: 'error',
                                    text: data.desc,
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            }
                            $('#modal-content').html(data);
                        }
                    });
                });
            });
        </script>

        <script>
            $( document ).ready(function() {
                $('.loader').click(function (){
                    $('.loader').removeClass('active');
                })
            });
        </script>

        <script>
            $( document ).ready(function() {
                $('body').on('click','.like_btn i',function (e){
                    e.preventDefault();
                    $.ajax({
                        url : '{{route('like')}}',
                        type : 'POST',
                        data : {'product_id' : $(this).attr("data-id")},
                        success : function (data){
                            if(data.status == "0") {
                                Swal.fire({
                                    position: 'top-end',
                                    toast: true,
                                    icon: 'error',
                                    text: data.desc,
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            }
                            if(data.status == "1") {
                                Swal.fire({
                                    position: 'top-end',
                                    toast: true,
                                    icon: 'success',
                                    text: data.desc,
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            }
                        }
                    });
                });
            });
        </script>

        <script>
            $( document ).ready(function() {
                $('body').on('click','.button-card',function (){
                    $(".loader").addClass('active');
                    var $input = $(this).parent().find('.count-buy');
                    var $priceBox = $(this).parent().parent().parent().find('.new-price');
                    $price = $priceBox.val().replace(/,/g, '');

                    if ($(this).hasClass('increment')) {
                        $price = $price / $input.val();
                        $input.val(parseInt($input.val()) + 1);
                        $price = parseFloat($price * $input.val());
                        $priceBox.val(accounting.formatMoney($price));
                    }
                    else if ($input.val()>=2){
                        $price = $price / $input.val();
                        $input.val(parseInt($input.val()) - 1);
                        $price = parseFloat($price * $input.val());
                        $priceBox.val(accounting.formatMoney($price));

                    }
                    $(".loader").removeClass('active');
                });

                $('body').on('change','.count-buy',function (){
                    $(".loader").addClass('active');
                    var $input = $(this).parent().find('.count-buy');
                    var $priceBox = $(this).parent().parent().parent().find('.new-price');
                    var $single_price = $(this).parent().parent().parent().find('.single_price').val().replace(/,/g, '');

                    $price = parseFloat($single_price * $input.val());
                    $priceBox.val(accounting.formatMoney($price));
                    $(".loader").removeClass('active');
                });

                $('body').on('click','.add_to_cart',function (){
                    $quantity = $('.count-buy').val();
                    $product_id = $('.product_id').val();
                    $price = $(this).parent().parent().parent().find('.new-price').val().replace(/,/g, '');

                    $.ajax({
                       url : '{{route('quick_add_cart')}}',
                       type : "POST",
                       data : {'quantity' : $quantity, "price" : $price, "product_id" : $product_id},
                        success : function (data){
                           console.log(data)
                            if(data.status == "0") {
                                $( '#productsQuickView' ).modal( 'hide' );
                                Swal.fire({
                                    position: 'top-end',
                                    toast: true,
                                    icon: 'error',
                                    text: data.desc,
                                    showConfirmButton: false,
                                    timer: 4000
                                });
                            }
                            if(data.status == "1") {
                                $( '#productsQuickView' ).modal( 'hide' );
                                Swal.fire({
                                    position: 'top-end',
                                    toast: true,
                                    icon: 'success',
                                    text: data.desc,
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                window.setTimeout(function(){
                                    location.reload()
                                },3000)
                            }
                        }
                    });
                });
            });
        </script>
        @yield('extra_js')
</body>
</html>
