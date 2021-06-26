<div class="modal fade " id="form-order">
    <div class="modal-content modal-dialog mw-100 w-75">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title"> <i class="fa fa-shopping-cart"></i>
                <span class="head_c">Bạn đã thêm
                    <a class="title" href="#">1</a> vào
                        <a href="{{ route('home.cart') }}">giỏ hàng</a>!</span>
            </h4>
        </div>
        <div class="modal-body">
            <div class="cmd_m">
                <header>
                </header>
                <form id="update" action="#" method="post" enctype="multipart/form-data">
                    <div class="table-responsive cart-info" id="detail-roder-modal">
                        <table class="cart-i">
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </form>
                <div class="cart-total">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td class="text-left">
                                Thành tiền
                            </td>
                            <td class="text-right"><span class="total-modal"></span><sup>đ</sup></td>
                        </tr>
                        <tr>
                            <td class="text-left">
                                Tổng cộng
                            </td>
                            <td class="text-right"><span class="total-modal"></span><sup>đ</sup></td>
                        </tr>
                        </tbody>
                    </table>

                    <br clear="all">
                    <div class="panel-group">
                        <div class="panel panel-default hidden">
                            <div id="collapse-coupon" class="panel-collapse collapse_ hidden">
                                <div class="panel-body hidden">
                                    <div class="input-group">
                                        <input type="text" name="coupon" value="" placeholder="Nhập mã khuyến mãi ở đây:" id="input-coupon" class="form-control">
                                        <span class="input-group-btn">
                                                <input style="font-size: 13px; padding-left: 5px; padding-right: 5px;" type="button" value="Áp dụng khuyến mãi" id="button-coupon" data-loading-text="Đang Xử lý..." class="btn btn-primary">
                                            </span>
                                    </div>
                                    <div class="input-group"><br>
                                        <div id="error_gg"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cmd_t"></div>
            <div class="cmd_b">
                <div class="buttons" style="min-height: 15px">
                    <a class="hidden-xs" href="{{ route('home.index') }}">
                        <strong><i class="fa fa-caret-left"></i> Tiếp tục mua hàng</strong>
                    </a>
                    <div class="pull-right">&nbsp;&nbsp;&nbsp;
                        <a href="{{ route('home.pay') }}">
                            <strong><i class="fa fa-share"></i> Thanh toán</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
