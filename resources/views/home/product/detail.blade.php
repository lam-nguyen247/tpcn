@extends('home.layouts.app')

@section('title', null)
@section('description',null)
@section('css')
    <link href="/css/home/settings.css" rel="stylesheet">
    <link href="/css/home/static-captions.css" rel="stylesheet">
    <link href="/css/home/dynamic-captions.css" rel="stylesheet">
    <link href="/css/home/captions.css" rel="stylesheet">
    <style>
        .product-grid .product.product_wg img {
            border: none !important;
        }

        .box-with-products {
            margin-bottom: 20px;
            background: #fff;
            box-shadow: 0 0 2px 1px #ccc;
        }
    </style>
@endsection

@section('breadcrumb')
    <div class="breadcrumb full-width">
        <div class="background-breadcrumb"></div>
        <div class="background">
            <div class="shadow"></div>
            <div class="pattern">
                <div class="container">
                    <div class="clearfix">
                        <ul>
                            <li class="item ">
                                <a href="{{ route('home.index') }}">Trang chủ</a>
                            </li>
                            <li class="item ">
                                <a href="{{ route('home.product', $product->id) }}">{!! $product->title !!}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            <div class="row">
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
                                                                                        <a href="{{ url($val)  }}" class="popup-image" data-image="{{ url($val)  }}" data-zoom-image="{{ url($val)  }}">
                                                                                            <img src="{{ url($val)  }}"/>
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
                                            <a href="#tab-review">Đánh giá {{ $product->comments_count > 0 ? '(' .$product->comments_count .')' : '' }}</a>
                                        </div>
                                        <div id="tab-description" class="tab-content">
                                            <div class="col-md-12">
                                                {!! $product->information !!}
                                            </div>
                                            <div class="product-info">
                                                <div class="cart">
                                                    <div class="add-to-cart clearfix">
                                                        <p>Số lượng</p>
                                                        <div class="quantity">
                                                            <input type="text" name="quantity" disabled="" id="quantity_wanted" size="2" value="1">
                                                        </div>
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
                        </div>
                        <div class="col-md-3" id="column_left">
                            @includeIf('home.sidebar.filter')
                            @includeIf('home.sidebar.register-memership')
                            @includeIf('home.sidebar.product-diff')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    @includeIf('home.includes.modal-order')
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
            code: '{{ $product->code }}',
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
          fetch_data(1);
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
           $('.button-cart').button('loading');
           $('#form-order .modal-header .head_c .title').text(currentItem.title);
           $('#form-order .modal-header .head_c .title').attr('href', currentItem.url);
            add();
            $('#form-order').modal('show');
        });

        $('#button-review').click(function (e) {
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route('product.comments')}}',
                type: 'post',
                data: $('#form-review').serialize(),
                dataType: 'json',
                beforeSend: function() {
                    $('#button-review').button('loading');
                },
                complete: function() {
                    $('#button-review').button('reset');
                },
                success: function(res) {
                    $('.alert, .text-danger').remove();
                    $('.form-group').removeClass('has-error');

                    if (res.success) {
                        alert("Cảm ơn bạn đã đánh giá sản phẩm");
                    }
                },
                error: function(xhr) {
                    $('.alert, .text-danger').remove();
                    $('.form-group').removeClass('has-error');

                    $error = xhr.responseJSON.errors;
                    for (i in $error) {
                        var element = $('#review');
                        $(element).after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Lỗi:' + $error[i][0] + '</div>');
                    }
                }
            });
        });

        $(document).on('click', '.pagination li a', function(event){
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          fetch_data(page);
        });

        function fetch_data(page)
        {
          $.ajax({
              headers: {
                  'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
              },
              url:"{{ route('product.ajax-comments') }}",
              method:"POST",
              data:{page:page,product_id: currentItem.product_id},
              success:function(data)
              {
                  $('#review').html(data.html);
              }
          });
        }
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
