@extends('home.layouts.app')

@section('title', env('NAME_LOGO'))
@section('description', 'asdfasdf')
@section('css')
    <link href="/css/home/settings.css" rel="stylesheet">
    <link href="/css/home/static-captions.css" rel="stylesheet">
    <link href="/css/home/dynamic-captions.css" rel="stylesheet">
    <link href="/css/home/captions.css" rel="stylesheet">
    <link href="/css/home/slider.css" rel="stylesheet">
    <style>
        .image-right-slider {
            width: 100%;
            max-height: 149px;
        }
    </style>
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
                        @php
                            $isCheckBanner = $banner->filter(function ($item) {
                                return in_array($item->name, ['banner_left', 'banner_left2']);
                            });
                        @endphp
                        <div class="col-sm-12 col-md-9">
                            @includeIf('home.includes.slide')
                        </div>
                        <div class="col-sm-12 col-md-3 noleft10">
                            <div class="hst fadeIn"><div class="hidden-xs hidden-sm">
                                    <a href="#"><img class="image-right-slider" src="{{ isset($isCheckBanner[2]) ? url($isCheckBanner[2]->image) : defaultImage()}}" alt="ship" style="margin-bottom:10px;"></a>
                                    <a href="#"><img class="image-right-slider" src="{{ isset($isCheckBanner[3]) ? url($isCheckBanner[3]->image) : defaultImage()}}" alt="sale"></a>
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
@endsection

@section('modal')
    @includeIf('home.includes.modal-order')
@endsection

@section('js')
    <script src="/js/home/jquery.themepunch.tools.min.js" crossorigin="anonymous"></script>
    <script src="/js/home/jquery.themepunch.revolution.min.js" crossorigin="anonymous"></script>
    <script src="/js/home/slide.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
                $('.add-product').click(function(){
                var productId = $(this).attr('data-id');
                $('#form-order .modal-header .head_c .title').text($(`.product_title_${productId}`).val());
                $('#form-order .modal-header .head_c .title').attr('href', $(`.product_url_${productId}`).val());
                add(productId);
                $('#form-order').modal('show');
            });
        });
        function add(productId){
            addToCart($(`.product_id_${productId}`).val(),
                $(`.product_url_${productId}`).val(),
                $(`.product_code_${productId}`).val(),
                $(`.product_price_${productId}`).val(),
                $(`.product_image_${productId}`).val(),
                1,
                $(`.product_title_${productId}`).val(),
                null, $(`.product_max_${productId}`).val());
        }
    </script>
@endsection
