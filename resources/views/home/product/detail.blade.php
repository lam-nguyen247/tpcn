@extends('home.layouts.app')

@section('title', null)
@section('description',null)
@section('css')
    <link href="/css/home/settings.css" rel="stylesheet">
    <link href="/css/home/static-captions.css" rel="stylesheet">
    <link href="/css/home/dynamic-captions.css" rel="stylesheet">
    <link href="/css/home/captions.css" rel="stylesheet">
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
                        <div class="col-md-9">
                            <div class="col-md-12 center-column " id="content">
                                <div class="prbox_detail" >
                                    <span  class="hidden">Viên uống hỗ trợ trắng da RiTANA 30V</span>
                                    <div class="product-info">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="row" id="quickview_product">
                                                    <div class="col-sm-6 popup-gallery">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="product-image cloud-zoom">
                                                                    <div class="ribbon blue latest">
                                                                        <span>New</span>
                                                                    </div>
                                                                    <a href="" title="{{ $product->title  }}" id="ex1" class="open-popup-image_">
                                                                        <img src="{{ url($product->image)  }}" title="{{ $product->title  }}" alt="{{ $product->title  }}" id="image"
                                                                             data-zoom-image="{{ url($product->image) }}"/>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="overflow-thumbnails-carousel">
                                                                    <div class="thumbnails-carousel owl-carousel">
                                                                        <?php
                                                                            $album = json_decode($product->album);
                                                                        ?>
                                                                        @if(!empty($album))
                                                                            @foreach($album as $val)
                                                                                <div class="item">
                                                                                    <a href="{{ url($product->image)  }}" class="popup-image" data-image="{{ url($product->image)  }}" data-zoom-image="{{ url($product->image)  }}">
                                                                                        <img src="{{ url($product->image)  }}"/>
                                                                                    </a>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 product-center clearfix">
                                                        <div>
                                                            <div class="product-name">
                                                                {{ $product->title }}
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-5 col-md-6">
                                                                    <div class="availability">
                                                                        Tình trạng: <span class="available">{{ $product->qty == 0 ? 'Hết Hàng' : 'Còn hàng' }}</span>
                                                                    </div>
                                                                </div>

                                                                <hr class="hidden">
                                                                <label class="short_desc">Mô tả chung :</label>
                                                                <p></p>
                                                                <div class="col-md-12">
                                                                    <p>{!! $product->sort_description !!}</p>
                                                                </div>
                                                                <div class="price">
                                                                    <label>Giá:</label>
                                                                    <span class="price-new"><span id="price-old" data-val="{{$product->sale>0?$product->sale:$product->price}}">
                                                                            {{number_format($product->price,0,",",".")}}<sup>đ</sup>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div id="product">
                                                                <div class="cart">
                                                                    <div class="add-to-cart clearfix">
                                                                        <p>Số lượng</p>
                                                                        <div class="quantity">
                                                                            <input type="text" name="quantity" id="quantity_wanted" size="2" data-max="{{$product->qty}}" value="1">
                                                                            <a href="#" id="q_up"><i class="fa fa-plus"></i></a>
                                                                            <a href="#" id="q_down"><i class="fa fa-minus"></i></a>
                                                                        </div>
                                                                        <input type="hidden" name="product_id" size="2" value="{{ $product->id }}">
                                                                        <input type="button" value="Mua hàng" rel="30" data-loading-text="Đang Xử lý..." class="button button-cart">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tabs" class=" htabs">
                                        <a href="#tab-description" class="selected">Chi tiết sản phẩm</a>
                                        <a href="#giaohang_thanhtoan">Giao hàng - Thanh toán</a>
                                        <a href="#camket">Cam kết từ Ecogreen</a>
                                        <a href="#tab-review">Đánh giá {{ count($product->comments) ? count($product->comments) : '' }}</a>
                                    </div>
                                    <div id="tab-description" class="tab-content">
                                        <div class="col-md-12">
                                            {!! $product->description !!}
                                        </div>
                                        <div class="product-info">
                                            <div class="cart">
                                                <div class="add-to-cart clearfix">
                                                    <p>Số lượng</p>
                                                    <div class="quantity">
                                                        <input type="text" name="quantity" disabled="" id="quantity_wanted" size="2" value="1">
                                                    </div>
                                                    <input type="hidden" name="product_id" size="2" value="30">
                                                    <input type="button" value="Mua hàng" class="button button-cart" rel="30" data-loading-text="Đang Xử lý...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @includeIf('home.product.include.paypal')
                                    @includeIf('home.product.include.commit')
                                    @includeIf('home.product.include.comments')
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" id="column_left">
                            @includeIf('home.sidebar.filter')
                            @includeIf('home.sidebar.register-memership')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>--}}
{{--                <h4 class="modal-title">--}}
{{--                    <i class="fa fa-shopping-cart"></i>--}}
{{--                    <span class="head_c">Bạn đã thêm--}}
{{--                        <a href="https://ecogreen.com.vn/ritana-60v.html">--}}
{{--                            Viên uống hỗ trợ trắng da RiTANA 60V</a> vào--}}
{{--                        <a href="https://ecogreen.com.vn/gio-hang.html">giỏ hàng</a>!</span>--}}
{{--                </h4>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <div class="cmd_m">--}}
{{--                    <header>--}}
{{--                    </header>--}}
{{--                    <form id="update" action="https://ecogreen.com.vn/index.php?route=checkout/totals/edit" method="post" enctype="multipart/form-data">--}}
{{--                        <div class="table-responsive cart-info" data-gtm-vis-recent-on-screen-6169862_154="4783" data-gtm-vis-first-on-screen-6169862_154="4783" data-gtm-vis-total-visible-time-6169862_154="100" data-gtm-vis-has-fired-6169862_154="1">--}}
{{--                            <table class="cart-i">--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <td class="text-center">--}}
{{--                                        <a href="https://ecogreen.com.vn/ritana-60v.html">--}}
{{--                                            <img src="image/cache/catalog/product/eco-ritana-47x47.jpg"--}}
{{--                                                 alt="Viên uống hỗ trợ trắng da RiTANA 60V"--}}
{{--                                                 title="Viên uống hỗ trợ trắng da RiTANA 60V" class="img-thumbnail">--}}
{{--                                        </a>--}}
{{--                                        <div class="visible-xs">--}}
{{--                                            <a href="https://ecogreen.com.vn/ritana-60v.html">--}}
{{--                                                Viên uống hỗ trợ trắng da RiTANA 60V--}}
{{--                                                <div>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td width="100" class="text-center hidden-xs">--}}
{{--                                        <a class="npr_popup" href="https://ecogreen.com.vn/ritana-60v.html">Viên uống hỗ trợ trắng da RiTANA 60V</a>--}}
{{--                                    </td>--}}
{{--                                    <td class="text-center">--}}
{{--                                        <input class="upc_popup" type="text" onblur="updateCart();" name="quantity[599278]" value="3" size="1">--}}
{{--                                        &nbsp;--}}
{{--                                        <input type="image" src="catalog/view/theme/mediacenter/img/update.png" alt="Cập nhật" title="Cập nhật">--}}
{{--                                        &nbsp;<a class="rmc_popup" onclick="cart.remove('599278');"><img src="catalog/view/theme/mediacenter/img/remove.png" alt="Loại bỏ" title="Loại bỏ"></a>--}}
{{--                                    </td>--}}
{{--                                    <td class="text-right">1.950.000<sup>đ</sup></td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                    <div class="cart-total">--}}
{{--                        <table class="table">--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <td class="text-left">--}}
{{--                                    Thành tiền--}}
{{--                                </td>--}}
{{--                                <td class="text-right">1.950.000<sup>đ</sup>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td class="text-left">--}}
{{--                                    Tổng cộng--}}
{{--                                </td>--}}
{{--                                <td class="text-right">1.950.000<sup>đ</sup>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}

{{--                        <br clear="all">--}}
{{--                        <div class="panel-group">--}}
{{--                            <div class="panel panel-default hidden">--}}
{{--                                <div id="collapse-coupon" class="panel-collapse collapse_ hidden">--}}
{{--                                    <div class="panel-body hidden">--}}
{{--                                        <div class="input-group">--}}
{{--                                            <input type="text" name="coupon" value="" placeholder="Nhập mã khuyến mãi ở đây:" id="input-coupon" class="form-control">--}}
{{--                                            <span class="input-group-btn">--}}
{{--                                                <input style="font-size: 13px; padding-left: 5px; padding-right: 5px;" type="button" value="Áp dụng khuyến mãi" id="button-coupon" data-loading-text="Đang Xử lý..." class="btn btn-primary">--}}
{{--                                            </span>--}}
{{--                                        </div>--}}
{{--                                        <div class="input-group"><br>--}}
{{--                                            <div id="error_gg">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="cmd_t">--}}
{{--                </div>--}}
{{--                <div class="cmd_b">--}}
{{--                    <div class="buttons" style="min-height: 15px">--}}
{{--                        <a class="hidden-xs" href="https://ecogreen.com.vn/index.html">--}}
{{--                            <strong>--}}
{{--                                <i class="fa fa-caret-left"></i> Tiếp tục mua hàng--}}
{{--                            </strong>--}}
{{--                        </a>--}}
{{--                        <div class="pull-right">&nbsp;&nbsp;&nbsp;--}}
{{--                            <a href="https://ecogreen.com.vn/thanh-toan-don-hang.html">--}}
{{--                                <strong><i class="fa fa-share"></i> Thanh toán</strong>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

@section('js')
    <script src="/js/home/jquery.themepunch.tools.min.js" crossorigin="anonymous"></script>
    <script src="/js/home/jquery.themepunch.revolution.min.js" crossorigin="anonymous"></script>
    <script src="/js/home/jquery.elevateZoom-3.0.3.min.js" crossorigin="anonymous"></script>
    <script>
        let currentItem = {
            product_id: '{{$product->id}}',
            url : '{{ route('home.detail-post', $product->id) }}',
            qty: 1,
            code: {{ $product->code }},
            title: '{{$product->title}}',
            image: '{{url($product->image)}}',
            price:  parseInt('{{$product->sale}}'),
            slug: '{{$product->slug}}',
            max: {{$product->qty}},
        };
      function initZoom(){
        $('.zoomContainer').remove();
        $('#image').removeData('elevateZoom');
        $('#image').removeData('zoomImage');


        $('#image').elevateZoom({
          tint: true,
          tintOpacity: 0.5,
          zoomTintFadeIn: 500,
          zoomTintFadeOut: 500,
          zoomWindowFadeIn: 500,
          zoomWindowFadeOut: 500,
          zoomWindowOffetx: 20,
          zoomWindowOffety: -1,
          easing : true,
        });

        setTimeout(function(){$('.rtl .zoomContainer').addClass('zoom-left')}, 500);
      }
      $(document).ready(function() {
        if($(window).width() > 992) {
          initZoom();
          var z_index = 0;

          $('.thumbnails a, .thumbnails-carousel a').click(function() {
            var smallImage = $(this).attr('data-image');
            var largeImage = $(this).attr('data-zoom-image');
            var ez =   $('#image').data('elevateZoom');
            $('#ex1').attr('href', largeImage);
            ez.swaptheimage(smallImage, largeImage);
            $('#image').attr('data-zoom-image', largeImage);
            z_index = $(this).index('.thumbnails a, .thumbnails-carousel a');
            initZoom();
            return false;
          });
        }

        $(".thumbnails-carousel").owlCarousel({
          autoPlay: 6000, //Set AutoPlay to 3 seconds
          navigation: true,
          navigationText: ['', ''],
          itemsCustom : [
            [0, 3],
            [450, 3],
            [550, 3],
            [768, 3],
            [1200, 3]
          ],
        });

        $.fn.tabs = function() {
          var selector = this;
          this.each(function() {
            var obj = $(this);
            $(obj.attr('href')).hide();
            $(obj).click(function() {
              $(selector).removeClass('selected');
              $(selector).each(function(i, element) {
                $($(element).attr('href')).hide();
              });

              $(this).addClass('selected');

              $($(this).attr('href')).show();
              return false;
            });
          });
          $(this).show();
          $(this).first().click();
        };
        $('#tabs a').tabs();

        $('.set-rating i').hover(function(){
          var rate = $(this).data('value');
          var i = 0;
          $('.set-rating i').each(function(){
              i++;
              if(i <= rate){
                  $(this).addClass('active');
              }else{
                  $(this).removeClass('active');
              }
          })
        })

        $('.set-rating i').mouseleave(function(){
          var rate = $('input[name="rating"]:checked').val();
          rate = parseInt(rate);
          i = 0;
          $('.set-rating i').each(function(){
              i++;
              if(i <= rate){
                  $(this).addClass('active');
              }else{
                  $(this).removeClass('active');
              }
          })
        });

        $('.set-rating i').click(function(){
          $('input[name="rating"]:nth('+ ($(this).data('value')-1) +')').prop('checked', true);
        });

        $('.button-cart').click(function () {
           add();
        });
      });
    </script>
    <script type="text/javascript">
      function add(){
          if($("#quantity_wanted").val()> parseInt($("#quantity_wanted").attr('data-max'))){
              alert('Sản phẩm này chỉ còn '+ $("#qty").attr('data-max') + ' sản phẩm ');
          }else{
              let qty = parseInt($("#quantity_wanted").val());
              currentItem.quantity = qty;
              currentItem.price = $("#price-old").attr('data-val');
              addToCart(currentItem.product_id, currentItem.url, currentItem.code, currentItem.price, currentItem.image,  currentItem.quantity, currentItem.title, currentItem.slug, currentItem.max);
          }
      }
    </script>
@endsection
