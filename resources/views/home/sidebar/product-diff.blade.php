<div class="hst fadeIn">
    <div class="box clearfix box-with-products ">
        <div class="box-heading">SẢN PHẨM KHÁC</div>
        <div class="strip-line"></div>
        <div class="box-content products">
            <div class="box-product">
                <div id="myCarousel103087725">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item">
                            <div class="product-grid">
                                <div class="row">
                                    @if (count($productDiff))
                                        @foreach($productDiff as $val)
                                            <div class="block col-sm-3 col-xs-6 col-mobile-12">
                                                <!-- Product -->
                                                <div id="idpr_92" class="product product_wg clearfix product-hover">
                                                    <div class="left">
                                                        <div class="image ">
                                                            <a class="sss" href="{{ route('home.product', $val->id) }}">
                                                                <img src="{{ url($val->image) }}"
                                                                     title="{{ $val->title }}"
                                                                     class="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="right">
                                                        <div class="price">
                                                            {{number_format($val->price,0,",",".")}}<sup>đ</sup>
                                                        </div>
                                                        <div class="name" style="">
                                                            <div class="label-discount green saleclear">
                                                            </div>
                                                            <a href="{{ route('home.product', $val->id) }}">{{ $val->title }}</a>
                                                            <div class="row">
                                                                <div class="row">
                                                                    <div class="prnote"></div>
                                                                </div>
                                                            </div>
        {{--                                                    <div class="brand">Giá 450 - 675</div>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
