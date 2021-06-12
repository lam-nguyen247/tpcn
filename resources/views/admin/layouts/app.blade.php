<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="@yield('title')">
    <meta name="message" content="{{ session('success') }}">
    <meta name="description" content="@yield('title') - {{config('app.name')}}">
    <meta name="author" content="duongvalo">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/admin/favicon.png">
    <title>@yield('title') - {{config('app.name')}}</title>
    <link rel="canonical" href="{{request()->url()}}" />
    <link href="/css/admin/toastr.min.css" rel="stylesheet">
    <link href="/css/admin/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="/css/admin/responsive.dataTables.min.css" rel="stylesheet">
    <link href="/css/admin/dropify.min.css" rel="stylesheet">
    <link href="/css/admin/dropzone.min.css" rel="stylesheet">
    <link href="/css/admin/dragula.min.css" rel="stylesheet">
    <link href="/css/admin/style.min.css" rel="stylesheet">
    <link href="/css/admin/summernote-bs4.css" rel="stylesheet">
    <link href="/css/admin/sweetalert2.min.css" rel="stylesheet">
    <link href="/css/admin/app.min.css" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i></a>
                    <a class="navbar-brand" href="/admin">
                        <b class="logo-icon"></b>
                        <span class="logo-text">{{config('app.name')}}</span>
                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="ti-more"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto float-left">
                        <li class="nav-item">
                            <a class="nav-link sidebartoggler d-none d-md-block waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img @src="/images/admin/user-white.svg" alt="user" width="30" class="profile-pic rounded-circle" />
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                                <ul class="dropdown-user list-style-none">
                                    <li>
                                        <div class="dw-user-box p-3 d-flex">
                                            <div class="u-img"><img @src="/images/admin/user-black.svg" alt="user" class="rounded" width="80"></div>
                                            <div class="u-text ml-2">
                                                <h4 class="mb-0">{{auth()->user()->name}}</h4>
                                                <p class="text-muted mb-1 font-14">{{auth()->user()->email}}</p>
                                                <a href="{{route('profile.index')}}" class="btn btn-rounded btn-danger btn-sm text-white d-inline-block">@lang('My Profile')</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="dropdown-divider"></li>
                                    <li class="user-list">
                                        <a class="px-3 py-2" href="{{route('change-password.index')}}"><i class="ti-settings"></i> @lang('Change Password')</a>
                                    </li>
                                    <li role="separator" class="dropdown-divider"></li>
                                    <li class="user-list">
                                        <a class="px-3 py-2" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-power-off"></i> @lang('Logout')</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @if(Route::has('locale'))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flag-icon flag-icon-{{app()->getLocale()}}"></i></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <a class="dropdown-item" href="/vi"><i class="flag-icon flag-icon-vi"></i> @lang('Vietnamese')</a>
                                <a class="dropdown-item" href="/en"><i class="flag-icon flag-icon-en"></i> @lang('English')</a>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <div class="user-profile position-relative">
                    <div class="profile-img"> <img @src="/images/admin/user-white.svg" alt="user" class="w-100" /> </div>
                    <div class="profile-text pt-1">
                        <a href="#" class="dropdown-toggle u-dropdown w-100 text-white d-block position-relative" data-toggle="dropdown"
                           role="button" aria-haspopup="true" aria-expanded="true">{{auth()->user()->name}}</a>
                        <div class="dropdown-menu animated flipInY">
                            <a href="{{route('profile.index')}}" class="dropdown-item"><i class="ti-user"></i> @lang('My Profile')</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('change-password.index')}}" class="dropdown-item"><i class="ti-settings"></i> @lang('Change Password')</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> @lang('Logout')</a>
                        </div>
                    </div>
                </div>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        @if(url()->current() == route('profile.index') || url()->current() == route('change-password.index'))
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti-user"></i><span class="hide-menu">@lang('My Account')</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="{{route('profile.index')}}" class="sidebar-link">
                                    <i class="mdi mdi-octagram"></i><span class="hide-menu">@lang('My Profile')</span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{route('change-password.index')}}" class="sidebar-link">
                                    <i class="mdi mdi-octagram"></i><span class="hide-menu">@lang('Change Password')</span></a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(Route::has('customer.index'))
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="{{route('customer.index')}}" aria-expanded="false">
                                <i class="ti-receipt"></i><span class="hide-menu">@lang('Customer')</span>
                            </a>
                        </li>
                        @endif
                        {{-- @if(Route::has('slide.index'))
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark" href="{{route('slide.index')}}" aria-expanded="false">
                                    <i class="ti-layout-slider-alt"></i><span class="hide-menu">@lang('Slide')</span>
                                </a>
                            </li>
                        @endif --}}
                        @if(Route::has('post.index'))
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark has-arrow" href="javascript:void(0)" aria-expanded="false">
                                    <i class="ti-layout-cta-left"></i><span class="hide-menu">@lang('Posts')</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item"><a href="{{route('post.index')}}" class="sidebar-link">
                                        <i class="mdi mdi-octagram"></i><span class="hide-menu">@lang('All Posts')</span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="{{route('post.create')}}" class="sidebar-link">
                                        <i class="mdi mdi-octagram"></i><span class="hide-menu">@lang('Add New')</span></a>
                                    </li>
                                    @if(Route::has('category.index'))
                                    <li class="sidebar-item"><a href="{{route('master.category', 'posts')}}" class="sidebar-link">
                                        <i class="mdi mdi-octagram"></i><span class="hide-menu">@lang('Categories')</span></a>
                                    </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(Route::has('page.index'))
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark has-arrow" href="javascript:void(0)" aria-expanded="false">
                                    <i class="ti-layout-cta-left"></i><span class="hide-menu">@lang('Pages')</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item"><a href="{{route('page.index')}}" class="sidebar-link">
                                        <i class="mdi mdi-octagram"></i><span class="hide-menu">@lang('All Pages')</span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="{{route('page.create')}}" class="sidebar-link">
                                        <i class="mdi mdi-octagram"></i><span class="hide-menu">@lang('Add New')</span></a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="{{route('cms.index')}}" aria-expanded="false">
                                <i class="ti-write"></i><span class="hide-menu">@lang('CMS')</span>
                            </a>
                        </li>
                        {{-- @if(Route::has('visitor.index'))
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="{{route('visitor.index')}}" aria-expanded="false">
                                <i class="ti-world"></i><span class="hide-menu">@lang('Visitor')</span>
                            </a>
                        </li>
                        @endif --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark has-arrow" href="javascript:void(0)">
                                <i class="ti-settings"></i><span class="hide-menu">@lang('Account Setting')</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="{{route('configuration.index', 'contact')}}" class="sidebar-link">
                                    <i class="mdi mdi-octagram"></i><span class="hide-menu">@lang('Contact')</span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{route('configuration.index', 'social')}}" class="sidebar-link">
                                    <i class="mdi mdi-octagram"></i><span class="hide-menu">@lang('Social Network')</span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{route('configuration.index', 'website')}}" class="sidebar-link">
                                    <i class="mdi mdi-octagram"></i><span class="hide-menu">@lang('Website')</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0">@yield('title')</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="/admin">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">@yield('content')</div>
            <footer class="footer">© 2020 {{config('app.name')}}</footer>
        </div>
    </div>
    <div class="chat-windows"></div>
    @include('admin.common.language')
    <script src="/js/admin/jquery.min.js"></script>
    <script src="/js/admin/popper.min.js"></script>
    <script src="/js/admin/bootstrap.min.js"></script>
    <script src="/js/admin/app.min.js"></script>
    <script src="/js/admin/app.init.js"></script>
    <script src="/js/admin/app-style-switcher.js"></script>
    <script src="/js/admin/perfect-scrollbar.jquery.min.js"></script>
    <script src="/js/admin/sparkline.js"></script>
    <script src="/js/admin/waves.js"></script>
    <script src="/js/admin/sidebarmenu.js"></script>
    <script src="/js/admin/custom.min.js"></script>
    <script src="/js/admin/toastr.min.js"></script>
    <script src="/js/admin/summernote-bs4.min.js"></script>
    <script src="/js/admin/jquery.dataTables.min.js"></script>
    <script src="/js/admin/dataTables.responsive.min.js"></script>
    <script src="/js/admin/custom-datatable.js"></script>
    <script src="/js/admin/dropify.min.js"></script>
    <script src="/js/admin/dropzone.min.js"></script>
    <script src="/js/admin/sweetalert2.all.min.js"></script>
    <script src="/js/admin/dragula.min.js"></script>
    <script src="/js/admin/common.min.js"></script>
    @yield('js')
</body>
</html>
