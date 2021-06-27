<div id="giaohang_thanhtoan" class="tab-content">
    <div class="col-md-12">
        @if (count($page))
            {!! $page->where('slug', 'giao-hang')->first()->content !!}
        @endif
    </div>
    <div class="product-info">
        <div class="cart">
            <div class="add-to-cart clearfix">
                <p>Số lượng</p>
                <div class="quantity">
                    <input type="text" name="quantity" disabled="" id="quantity_wanted" size="2" value="1">
                </div>
                <input type="hidden" name="product_id" size="2" value="28">
                <input type="button" value="Mua hàng" class="button button-cart" rel="28" data-loading-text="Đang Xử lý...">
            </div>
        </div>
    </div>
</div>
