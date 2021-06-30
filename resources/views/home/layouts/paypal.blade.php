<!DOCTYPE html>
<html lang="{{session('locale', $config->locale)}}" data-theme="{{session('theme', $config->theme)}}" class="responsive">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="sp55spD2C7qqScAArM8ME4KG2Y-mkT0zYAu9GLJOMQA" />
    @isset($seo)
        <title>{{$seo->title}}</title>
        <meta name="description" content="{{$seo->description}}">
        <meta name="robots" content="{{$seo->robots}}" />
    @else
        <title>@yield('title') </title>
        <meta name="description" content="@yield('description') ">
    @endif
    @cms
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/images/admin/favicon.png">
    <link rel="canonical" href="{{request()->url()}}">
    <!-- Custom CSS -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:800,700,600,500,400,300" rel="stylesheet" type="text/css">
    <link href="/css/home/bootstrap.min.css" rel="stylesheet">
    <link href="/css/home/animate.css" rel="stylesheet">
    <link href="/css/home/stylesheet0ff5.css" rel="stylesheet">
    <link href="/css/home/menu.css" rel="stylesheet">
    <link href="/css/home/owl.carousel.css" rel="stylesheet">
    <link href="/css/home/font-awesome.min.css" rel="stylesheet">
    <link href="/css/home/icheck.css" rel="stylesheet">
    <link href="/css/home/filter_product.css" rel="stylesheet">
    <link href="/css/home/responsive.css" rel="stylesheet">
    <link href="/css/home/wide-grid.css" rel="stylesheet">
    <link href="/css/home/wide-grid.css" rel="stylesheet">
    <link href="/css/home/default3860.css" rel="stylesheet">
    <link href="/css/home/magnific-popup.css" rel="stylesheet">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PZ6T4PS');</script>
    <!-- End Google Tag Manager -->
    <script type="text/javascript">
        var responsive_design = 'yes';
    </script>
    @yield('css')
</head>
<body class="checkout-checkout">
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PZ6T4PS"
            height="0" width="0" style="display:none;visibility:hidden">
    </iframe>
</noscript>
<div class="standard-body">
    <div id="main" rel="mediacenter" class="header-type-2">
    <!-- MAIN CONTENT ================================================== -->
        @yield('content')
    </div>
    <div class="copyright full-width">
        <div class="background-copyright"></div>
        <div class="background">
            <div class="shadow"></div>
            <div class="pattern">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-9">
                            CÔNG TY CỔ PHẦN DƯỢC PHẨM QUỐC TẾ EU.ECOPHARMA<br>
                            Giấy chứng nhận ĐKKD số 0109551460 do sở Kế hoạch và Đầu tư TP. Hà Nội cấp ngày 15.03.2021<br>
                            Địa chỉ: Xóm Đình, Đội 7, Xã ngọc Hồi, Huyện Thanh Trì, Thành phố Hà Nội, Việt Nam<br>
                            Điện thoại: 0325793433 - Email: euecopharma@gmail.com<br>
                        </div>
                        <div class="col-sm-3 text-right">
                            <br>Bản quyền © 2021 thuộc về EU-ECOPHARMA</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/home/jquery-2.1.1.min.js" crossorigin="anonymous"></script>
<script src="/js/home/jquery-migrate-1.2.1.min.js" crossorigin="anonymous"></script>
<script src="/js/home/jquery.easing.1.3.js" crossorigin="anonymous"></script>
<script src="/js/home/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="/js/home/echo.min.js" crossorigin="anonymous"></script>
<script src="/js/home/common.js" crossorigin="anonymous"></script>
<script src="/js/home/bootstrap-notify.min.js" crossorigin="anonymous"></script>
<script src="/js/home/jquery.matchHeight.min.js" crossorigin="anonymous"></script>
<script src="/js/home/icheck.min.js" crossorigin="anonymous"></script>
<script src="/js/home/hst.min.js" crossorigin="anonymous"></script>
<script src="/js/home/owl.carousel.min.js" crossorigin="anonymous"></script>
<script src="/js/home/jquery-ui-1.10.4.custom.min.js" crossorigin="anonymous"></script>
<script src="/js/home/jquery.magnific-popup.min.js" crossorigin="anonymous"></script>
<script src="/js/home/order.js" crossorigin="anonymous"></script>
@yield('js')
</body>
</html>
