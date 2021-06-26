<div id="tab-review" class="tab-content">
    <form class="form-horizontal" id="form-review">
        <div id="review">
        </div>
        <div class="col-md-12">
            <div class="row">
                <h2 id="review-title">Viết đánh giá</h2>
            </div>
        </div>
        <div class="form-group required">
            <div class="col-xs-12 col-sm-8">
                <label class="control-label" for="input-name">Tên bạn:</label>
                <input type="text" name="name" value="" id="input-name" class="form-control">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
            </div>
        </div>
        <div class="form-group required">
            <div class="col-xs-12 col-sm-8">
                <label class="control-label">Bình chọn:</label>

                <div class="rating set-rating">
                    <i class="fa fa-star" data-value="1"></i>
                    <i class="fa fa-star" data-value="2"></i>
                    <i class="fa fa-star" data-value="3"></i>
                    <i class="fa fa-star" data-value="4"></i>
                    <i class="fa fa-star" data-value="5"></i>
                </div>
                <div class="hidden">
                    &nbsp;&nbsp;&nbsp; Xấu&nbsp;
                    <div class="iradio" style="position: relative;"><input type="radio" name="rating" value="1" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                    &nbsp;
                    <div class="iradio" style="position: relative;"><input type="radio" name="rating" value="2" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                    &nbsp;
                    <div class="iradio" style="position: relative;"><input type="radio" name="rating" value="3" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                    &nbsp;
                    <div class="iradio" style="position: relative;"><input type="radio" name="rating" value="4" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                    &nbsp;
                    <div class="iradio" style="position: relative;"><input type="radio" name="rating" value="5" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                    &nbsp;Tốt				</div>
            </div>
        </div>
        <div class="form-group required">
            <div class="col-xs-12 col-sm-8">
                <label class="control-label" for="input-review">Đánh giá của bạn:</label>
                <textarea name="comments" rows="5" id="input-review" class="form-control"></textarea>
                <div class="help-block"><span style="color: #FF0000;">Lưu ý:</span> không hỗ trợ HTML!</div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12 col-sm-8 ">
                <div class="pull-right">
                    <button type="button" id="button-review" data-loading-text="Đang Xử lý..." class="btn btn-primary">Tiếp tục</button>
                </div>
            </div>
        </div>
    </form>
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
