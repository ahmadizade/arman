<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#f7858d">
    <meta name="msapplication-navbutton-color" content="#f7858d">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f7858d">
    <title>Index Page</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/css/vendor/sweetalert2.all.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="/css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/vendor/jquery.horizontalmenu.css">
    <!-- Font Icon -->
    <link rel="stylesheet" href="/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="/css/vendor/materialdesignicons.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/colors/default.css" id="colorswitch">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    @yield("extra_css")
    @yield("title")
</head>
<body>
    <div class="wrapper">
        @include("partials.header")
        @yield("content")
        @include("partials.footer")

        <script src="/js/vendor/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/fa.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/mahmoud-eskandari/NumToPersian/dist/num2persian-min.js"></script>
        <script>
            $('.number-format').on('keyup', function () {
                $price = accounting.formatNumber($(this).val());
                $(this).val($price);
                $(".words").val(Num2persian($(this).val()) + " ریال ");
            });
        </script>

        <!-- Core JS Files -->
        <script src="/js/vendor/popper.min.js"></script>
        <script src="/js/vendor/bootstrap.min.js"></script>
        <!-- Plugins -->
        <script src="/js/vendor/owl.carousel.min.js"></script>
        <script src="/js/vendor/sweetalert2.all.min.js"></script>
        <script src="/js/vendor/jquery.nicescroll.min.js"></script>
        <script src="/js/vendor/jquery.horizontalmenu.js"></script>
        <script src="/js/vendor/jQuery.headroom.js"></script>
        <script src="/js/vendor/headroom.min.js"></script>
        <!-- Main JS File -->
        <script src="/js/main.js"></script>

        @yield('extra_js')

    </div>
</body>
</html>
