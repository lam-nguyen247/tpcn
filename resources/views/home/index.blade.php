@extends('home.layouts.app')

@section('title', 'ECOGREEN')
@section('description', 'asdfasdf')
@section('css')
    <link href="/css/home/settings.css" rel="stylesheet">
    <link href="/css/home/static-captions.css" rel="stylesheet">
    <link href="/css/home/dynamic-captions.css" rel="stylesheet">
    <link href="/css/home/captions.css" rel="stylesheet">
    <link href="/css/home/slider.css" rel="stylesheet">
@endsection

@section('breadcrumb')
@endsection

@section('content')
    <div class="main-content full-width home">
        <div class="background-content"></div>
        <div class="background">
            <div class="shadow"></div>
            <div class="pattern">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-9">
                            @includeIf('home.includes.slide')
                        </div>
                        <div class="col-sm-12 col-md-3 noleft10">
                            <div class="hst fadeIn"><div class="hidden-xs hidden-sm">
                                    <a href="#"><img src="{{url('/images/home/giaohang/banner_ship.jpg')}}" alt="ship" style="margin-bottom:10px;"></a>
                                    <a href="#"><img src="{{url('/images/home/giaohang/banner_sale3860.jpg')}}" alt="sale"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 preface_full">
                            <div class="hst fadeIn">
                                <div class="box">
                                    <div class="box-heading"></div>
                                    <div class="strip-line"></div>
                                    <div class="box-content">
                                        <table class="table ">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <img src="{{url('/images/home/giaohang/i32_giaohang.png')}}" alt="đăng nhập"> GIAO HÀNG TRONG NGÀY<br>
                                                </td>
                                                <td>
                                                    <img src="{{url('/images/home/giaohang/i32-money.png')}}" alt="đăng nhập"> ĐÚNG GIÁ NHÀ THUỐC<br>
                                                </td>
                                                <td>
                                                    <img src="{{url('/images/home/giaohang/i32-doctor.png')}}" alt="đăng nhập"> CHUYÊN GIA TƯ VẤN<br>
                                                </td>
                                                <td>
                                                    <img src="{{url('/images/home/giaohang/i-support.png')}}" alt="đăng nhập"> HỖ TRỢ ĐẶT HÀNG<br>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3" id="column_left">
                            @includeIf('home.sidebar.filter')
                            @includeIf('home.sidebar.register-memership')
                        </div>
                        <div class="col-md-9">
                            @includeIf('home.product.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @includeIf('home.footer.index')
    @includeIf('home.footer.info-question')
    @includeIf('home.footer.copy-right')
@endsection

@section('js')
    <script src="/js/home/jquery.themepunch.tools.min.js" crossorigin="anonymous"></script>
    <script src="/js/home/jquery.themepunch.revolution.min.js" crossorigin="anonymous"></script>
    <script src="/js/home/slide.js" crossorigin="anonymous"></script>
@endsection
