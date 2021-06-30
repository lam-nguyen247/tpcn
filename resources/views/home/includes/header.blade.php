<header>
<div class="background-header"></div>
<div class="slider-header">
    <!-- Top Bar -->
    <!-- Top of pages -->
    <div id="top" class="full-width">
        <div class="background-top"></div>
        <div class="background">
            <div class="shadow"></div>
            <div class="pattern">
                <div class="container">
                    <div class="row">
                        <!-- Header Left -->
                        <div class="col-xs-12 col-sm-2 col-md-3 noright" id="header-left">
                            <!-- Logo -->
                                <div class="logo vvv"><a href="{{ route('home.index') }}"><img src="{{url('/images/home/logo.png')}}" title="EcoShop" alt="EcoShop" /></a></div>
                        </div>

                        <!-- Header Center -->
                        <div class="col-xs-12 col-ipad-12 col-sm-4 col-md-4 no-margin" id="header-center">
                            <!-- Search -->
                            <div class="search_form">
                                <div class="search_box">
                                    <div class="button-search"></div>
                                    <form method="GET" action="{{ route('home.search') }}" class="form-search mt-2">
                                        <input type="text" class="input-block-level search-query" name="name" placeholder="Tìm kiếm sản phẩm" id="search_query" value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}" />
                                    </form>
                                </div>
                                <div id="autocomplete-results" class="autocomplete-results"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- Header Right -->
                        <div class="col-xs-12 col-ipad-12 col-sm-6 col-md-5 " id="header-right">

                            <div id="megamenu_68405778" class="container container-megamenu container horizontal mobile-disabled">
                                <div class="megaMenuToggle">
                                    <div class="megamenuToogle-wrapper">
                                        <div class="megamenuToogle-pattern">
                                            <div class="container">
                                                <div><span></span><span></span><span></span></div>
                                                Tiện ích
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="megamenu-wrapper">
                                    <div class="megamenu-pattern">
                                        <div class="container">
                                            <ul class="megamenu none">
{{--                                                <li class='mnu_acc' >--}}
{{--                                                    <p class='close-menu'></p>--}}
{{--                                                    <p class='open-menu'></p>--}}
{{--                                                    <a href='#' class='clearfix' >--}}
{{--                                                        <span>--}}
{{--                                                            <strong>--}}
{{--                                                                <img src="{{url('/images/home/ico-login.png')}}" alt="">--}}
{{--                                                                Tài khoản--}}
{{--                                                            </strong>--}}
{{--                                                        </span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class='mnu_login'>--}}
{{--                                                    <p class='close-menu'></p>--}}
{{--                                                    <p class='open-menu'></p>--}}
{{--                                                    <a href='#' class='clearfix' >--}}
{{--                                                        <span>--}}
{{--                                                            <strong>--}}
{{--                                                                <img src="{{url('/images/home/ico-login.png')}}" alt="">Đăng nhập--}}
{{--                                                            </strong>--}}
{{--                                                        </span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
                                                <li class='mnu_tuvan'>
                                                    <p class='close-menu'></p>
                                                    <p class='open-menu'></p>
                                                    <a href='#' class='clearfix'>
                                                        <span>
                                                            <strong>
                                                                <img src="{{url('/images/home/ico-faq.png')}}" alt="">Giúp đỡ
                                                            </strong>
                                                        </span>
                                                    </a>
                                                </li>
{{--                                                <li class='mnu_trochuyen' >--}}
{{--                                                    <p class='close-menu'></p>--}}
{{--                                                    <p class='open-menu'></p>--}}
{{--                                                    <a href='#' class='clearfix' >--}}
{{--                                                        <span>--}}
{{--                                                            <strong>--}}
{{--                                                                <img src="{{url('/images/home/ico-chat.png')}}" alt="">Trò chuyện--}}
{{--                                                            </strong>--}}
{{--                                                        </span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
                                                <li class='mnu_muahang' >
                                                    <p class='close-menu'></p>
                                                    <p class='open-menu'></p>
                                                    <a href='{{ route('home.cart') }}' class='clearfix' >
                                                        <span>
                                                            <strong>
                                                                <img src="{{url('/images/home/ico-order.png')}}" alt="">Giỏ hàng
                                                            </strong>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="top-cart-row-container ">
                            <!-- Cart block -->
                            <div id="cart_block" class="dropdown">
                                <div class="cart-heading dropdown-toogle" data-toggle="dropdown">
                                    <div class="basket-item-count">
                                        <span id="cart_count_ajax">
                                            <span class="count" id="cart_count">0</span>
                                        </span>
                                        <img src="{{url('/images/home/icon-cart.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="dropdown-menu" id="cart_content">
                                    <div id="cart_content_ajax">
                                        <div class="mini-cart-info">
                                            <table>
                                                <tbody>
{{--                                                <tr>--}}
{{--                                                    <td class="image">--}}
{{--                                                        <a href="https://www.ecogreen.com.vn/ritana-60v.html"><img src="image/cache/catalog/product/eco-ritana-47x47.jpg" alt="Viên uống hỗ trợ trắng da RiTANA 60V" title="Viên uống hỗ trợ trắng da RiTANA 60V"></a>--}}
{{--                                                    </td>--}}
{{--                                                    <td class="name">--}}
{{--                                                        <span class="quantity">1&nbsp;x&nbsp;</span>--}}
{{--                                                        <a href="https://www.ecogreen.com.vn/ritana-60v.html">Viên uống hỗ trợ trắng da RiTANA 60V</a>--}}
{{--                                                        <div>--}}
{{--                                                            <div class="price">650.000<sup>đ</sup></div>--}}
{{--                                                        </div>--}}
{{--                                                    </td>--}}
{{--                                                    <td class="remove"><a href="javascript:;" onclick="cart.remove('599466');" title="Loại bỏ"></a></td>--}}
{{--                                                </tr>--}}
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="checkout">
                                            <a href="{{ route('home.cart') }}" class="button btn-checkout">Giỏ hàng</a>
                                            <a href="{{ route('home.pay') }}" class="button btn-checkout">Thanh toán</a>
                                        </div>
                                    </div>
                                    <div id="cart_content_empty" class="hidden">
                                        <div class="empty">Không có sản phẩm trong Đơn hàng!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main_menu">
                    <div id="megamenu_77651154" class="container container-megamenu  horizontal">
                        <div class="megaMenuToggle">
                            <div class="megamenuToogle-wrapper">
                                <div class="megamenuToogle-pattern">
                                    <div class="container">
                                        <div><span></span><span></span><span></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="megamenu-wrapper">
                            <div class="megamenu-pattern">
                                <div class="container">
                                    <ul class="megamenu shift-down">
                                        <li class='mnu_home' >
                                            <p class='close-menu'></p>
                                            <p class='open-menu'></p>
                                            <a href="{{ route('home.index') }}" class='clearfix' >
                                                <span><strong>Trang chủ</strong></span>
                                            </a>
                                        </li>
                                        <li class='mnu_about' >
                                            <p class='close-menu'></p>
                                            <p class='open-menu'></p>
                                            <a href='{{ isset($page[0]) ? route('home.page-slug', $page[0]->slug) : '#' }}' class='clearfix' >
                                                <span><strong>Về Ecogreen</strong>
                                                </span>
                                            </a>
                                        </li>
                                        <li class='mnu_product with-sub-menu hover' >
                                            <p class='close-menu'></p>
                                            <p class='open-menu'></p>
                                            <a href='#' class='clearfix' >
                                                <span><strong>Sản phẩm</strong></span>
                                            </a>
                                            <div class="sub-menu" style="width:250px;right: auto">
                                                <div class="content" >
                                                    @if (!empty($productCategory))
                                                        @foreach($productCategory as $item)
                                                                @if ($item->parent_id == 0)
                                                                <div class="row">
                                                                    <div class="col-sm-12  mobile-enabled">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 hover-menu">
                                                                                <div class="menu">
                                                                                    <ul>
                                                                                        <li>
                                                                                            <a href="{{ route('home.search') .'?category='.$item->slug  }}" class="main-menu ">{{ \Illuminate\Support\Str::upper($item->name) }}</a>
                                                                                            <a target="_blank" class="spicon" href="#">
                                                                                                <img src="{{ url($item->image) }}">
                                                                                            </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="border">
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        <li class='mnu_pro' >
                                            <p class='close-menu'></p>
                                            <p class='open-menu'></p>
                                            <a href='{{ isset($page[1]) ? route('home.page-slug', $page[1]->slug) : '#' }}' class='clearfix' >
                                                <span><strong>Khuyến mãi</strong>
                                                </span>
                                            </a>
                                        </li>
                                        <li class='mnu_faq with-sub-menu hover' >
                                            <p class='close-menu'></p>
                                            <p class='open-menu'></p>
                                            <a href='#' class='clearfix' >
                                                <span>
                                                    <strong>Tư vấn sức khỏe</strong>
                                                </span>
                                            </a>
                                            <div class="sub-menu" style="width:250px;right:auto">
                                                <div class="content" >
                                                    <div class="row">
                                                        <div class="col-sm-12  mobile-enabled">
                                                            <a href="{{ route('home.question') }}">Hỏi đáp - Tư vấn</a>
                                                        </div>
                                                    </div>
                                                    <div class="border"></div>
                                                    <div class="row">
                                                        <div class="col-sm-12  mobile-enabled">
                                                            <a href="{{ route('question.question-often') }}">Câu hỏi thường gặp</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class='mnu_news with-sub-menu hover' >
                                            <p class='close-menu'></p>
                                            <p class='open-menu'></p>
                                            <a href='{{ route('home.group-post-category') }}' class='clearfix' >
                                                <span>
                                                    <strong>Chủ đề sức khỏe</strong>
                                                </span>
                                            </a>
                                            <div class="sub-menu" style="width:250px;right:auto">
                                                <div class="content" >
                                                    @if(!empty($categoryPost))
                                                        @foreach($categoryPost as $item)
                                                            <div class="row">
                                                                <div class="col-sm-12  mobile-enabled">
                                                                    <a href="{{ route('home.category-post'). '?categoryPost='.$item->slug }}">{{  \Illuminate\Support\Str::upper($item->name) }}</a>
                                                                </div>
                                                            </div>
                                                            <div class="border"></div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                        <li class='' >
                                            <p class='close-menu'></p>
                                            <p class='open-menu'></p>
                                            <a href='tel:+84325793433' class='clearfix' >
                                                <span><strong>HOTLINE: 0325 793 433</strong></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>
