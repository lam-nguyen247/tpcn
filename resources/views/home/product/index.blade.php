<div class="row">
    <div class="col-md-12">
        <div class="hst fadeIn">
            <div class="box clearfix box-with-products ">
                <div class="box-heading">Sản phẩm</div>
                <div class="strip-line"></div>
                <div class="box-content products">
                    <div class="box-product">
                        <div id="myCarousel3898486">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="active item">
                                    <div class="product-grid">
                                        <div class="row">
                                            <div class="block col-sm-3 col-xs-6 col-mobile-12  ">
                                                <!-- Product -->
                                                @if (!empty($products))
                                                    @foreach($products as $product)
                                                        <div id="idpr_{{ $product->id }}" class="product product_wg clearfix product-hover">
                                                            <div class="left">
                                                                <div class="image ">
                                                                    <a class="sss" href="{{ route('home.product', $product->id) }}">
                                                                        <img src="{{ url($product->image) }}" title="{{ $product->title }}" alt="{{ $product->title }}" class="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="right">
                                                                <div class="price">
                                                                    {{number_format($product->price,0,",",".")}}<sup>đ</sup>
                                                                </div>
                                                                <div class="name" style="height: 50px;">
                                                                    <div class="label-discount green saleclear">
                                                                    </div>
                                                                    <a href="#">{{ $product->title }}</a>
                                                                    <div class="row"><div class="row"><div class="prnote"></div></div></div>
{{--                                                                    <div class="brand">Giá 450 - 675</div>--}}
                                                                </div>
                                                                <div class="only-hover">
                                                                    <a class="button add-product">Mua hàng</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                {{ $products->links('home.includes.pagination') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
