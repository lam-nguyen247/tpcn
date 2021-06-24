<div class="panel panel-default div-payments hidden">
    <div id="ar-left-1">
        <div class="panel-body">
            <div class="box_payment">
                <p>Vui lòng chọn phương thức thanh toán cho đơn hàng này.</p>
                <div class="radio row">
                    <label class="paybox cod col-xs-12">
                        <div class="col-xs-1 text-right shipleft">
                            <div class="shipradio">
                                <input class="payment" type="radio" name="payment_method" value="1" checked="checked">
                            </div>
                        </div>
                        <div class="col-xs-11 pay_icon">
                          <span>
                            <b>Thanh toán khi nhận hàng (COD)</b><br>Quý khách sẽ thanh toán bằng tiền mặt khi nhận hàng.
                          </span>
                        </div>
                    </label>
                </div>
                <div class="radio row">
                    <label class="paybox onepay_atm col-xs-12">
                        <div class="col-xs-1 text-right shipleft">
                            <div class="shipradio">
                                <input class="payment" type="radio" name="payment_method" value="2">
                            </div>
                        </div>
                        <div class="col-xs-11 pay_icon">
                            <span>
                                <b>Thanh toán bằng Internet Banking</b><br>Thẻ ATM có đăng ký sử dụng dịch vụ Internet Banking.
                            </span>
                        </div>
                    </label>
                </div>
                <div class="radio row">
                    <label class="paybox onepay_credit col-xs-12">
                        <div class="col-xs-1 text-right shipleft">
                            <div class="shipradio">
                                <input class="payment" type="radio" name="payment_method" value="3">
                            </div>
                        </div>
                        <div class="col-xs-11 pay_icon">
                            <span>
                                <b>Thanh toán bằng thẻ thanh toán quốc tế (VISA, MASTERCARD)</b>
                            </span>
                            <b></b>
                        </div>
                        <b></b>
                    </label>
                    <b></b>
                </div><b>
                    <div class="radio row">
                        <label class="paybox cheque col-xs-12">
                            <div class="col-xs-1 text-right shipleft">
                                <div class="shipradio">
                                    <input class="payment" type="radio" name="payment_method" value="4">
                                </div>
                            </div>
                            <div class="col-xs-11 pay_icon">
                                <span>
                                    <b>Chuyển khoản trực tiếp tại các ngân hàng</b><br><br><b>
                                        1. Đơn vị thụ hưởng: </b>
                                    Chi Nhánh Công ty Cổ phần Dược phẩm ECO (TP.Hà Nội)
                                    <br><b>Số tài khoản:</b> 14022044090011<br>
                                    Tại Ngân hàng Techcombank - CN Đông Sài Gòn, TP.HCM<br><br><b>
                                        2. Đơn vị thụ hưởng:</b>
                                    Chi Nhánh Công ty Cổ phần Dược phẩm ECO (TP.Hà Nội)<br><b>
                                        Số tài khoản:</b> 1151100225001<br>
                                    Tại Ngân hàng TMCP Quân Đội - CN Sở Giao Dịch 2, TP.HCM<br><br><i>Khi thanh toán tiền, Quý Khách hàng vui lòng ghi rõ nội dung chuyển khoản như sau:<br><b>"Tên người mua hàng, Tỉnh/thành phố" chuyển tiền cho đơn hàng ngày...tháng...năm...</b></i>
                                </span>
                            </div>
                        </label>
                    </div>
{{--                    <script type="text/javascript"><!----}}
{{--                        $(document).on('change', 'input[name=\'payment_method\']:checked', function () {--}}
{{--                            savePaymentMethod();--}}
{{--                        });--}}
{{--                        //--></script>--}}
                </b>
            </div><b>
            </b>
        </div>
    </div>

    <div class="buttons col-sm-12">
        <div class="pull-right">
            <input type="button" value="Xác nhận đơn hàng" id="button-confirm" class="btn btn-primary" data-loading-text="Đang Xử lý...">
        </div>
    </div>
</div>
