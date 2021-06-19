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
                                                                    <span class="price-new"><span id="price-old">
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
                                                                            <input type="text" name="quantity" id="quantity_wanted" size="2" value="1">
                                                                            <a href="#" id="q_up"><i class="fa fa-plus"></i></a>
                                                                            <a href="#" id="q_down"><i class="fa fa-minus"></i></a>
                                                                        </div>
                                                                        <input type="hidden" name="product_id" size="2" value="30">
                                                                        <input type="button" value="Mua hàng" id="button-cart" rel="30" data-loading-text="Đang Xử lý..." class="button">
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
@endsection

@section('js')
    <script src="/js/home/jquery.themepunch.tools.min.js" crossorigin="anonymous"></script>
    <script src="/js/home/jquery.themepunch.revolution.min.js" crossorigin="anonymous"></script>
    <script src="/js/home/jquery.elevateZoom-3.0.3.min.js" crossorigin="anonymous"></script>
    <script>
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
        } else {
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
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
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
        })

        $('.set-rating i').click(function(){
          $('input[name="rating"]:nth('+ ($(this).data('value')-1) +')').prop('checked', true);
        });
      });
    </script>
@endsection
