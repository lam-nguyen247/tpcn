<div class="row hidden" id="address-form">
    <form action="#" id="form-customer">
        <div class="col-sm-12">
            <div class="panel-heading">
                <h4 class="panel-title">Địa chỉ thanh toán</h4>
            </div>
            <fieldset id="payment-address">
                <div id="payment-new" class="row" style="display: block;">
                    <div class="form-group col-sm-12 required">
                        <label class="control-label" for="input-payment-firstname">Họ và tên:</label>
                        <input type="text" name="payment_firstname" value="" placeholder="Họ và tên:" id="input-payment-firstname" class="form-control" required="" autocomplete="billing given-name">
                    </div>

                    <div class="form-group col-sm-12 required custom-field" data-sort="2">
                        <label class="control-label" for="input-payment-custom-field1">Điện thoại:</label>
                        <input type="text" name="payment_custom_field[1]" value="" placeholder="Điện thoại:" id="input-payment-custom-field1" class="form-control">
                    </div>

                    <div class="form-group col-sm-12 required">
                        <label class="control-label" for="input-payment-country">Tỉnh:</label>
                        <select name="payment_country_id" id="input-payment-country" class="form-control" required="" autocomplete="billing country">
                            <option value=""> --- Chọn --- </option>
                            @foreach(config('constants.country') as $key => $val)
                                <option value="{{ $key }}" {{ $key == 30 ? 'selected' : '' }}>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-12">
                        <label class="control-label" for="input-payment-address-1">Địa chỉ:</label>
                        <input type="text" name="payment_address_1" value="" placeholder="Địa chỉ:" id="input-payment-address-1" class="form-control" required="" autocomplete="billing street-address">
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="col-sm-6" style="display: none;">
            <div class="panel-heading">
                <h4 class="panel-title">Địa chỉ nhận hàng</h4>
            </div>
            <fieldset id="shipping-address">
                <div id="shipping-new" style="display: block;">
                    <div class="form-group col-sm-12 required">
                        <label class="control-label" for="input-shipping-firstname">Họ và tên:</label>
                        <input type="text" name="shipping_firstname" value="" placeholder="Họ và tên:" id="input-shipping-firstname" class="form-control" required="" autocomplete="shipping given-name">
                    </div>

                    <div class="form-group col-sm-12 required custom-field" data-sort="2">
                        <label class="control-label" for="input-shipping-custom-field1">Điện thoại:</label>
                        <input type="text" name="shipping_custom_field[1]" value="" placeholder="Điện thoại:" id="input-shipping-custom-field1" class="form-control">
                    </div>

                    <div class="form-group col-sm-12 required">
                        <label class="control-label" for="input-shipping-country">Tỉnh:</label>
                        <select name="shipping_country_id" id="input-shipping-country" class="form-control" required="" autocomplete="shipping country">
                            <option value=""> --- Chọn --- </option>
                            @foreach(config('constants.country') as $key => $val)
                                <option value="{{ $key }}" {{ $key == 30 ? 'selected' : '' }}>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
{{--                    <div class="form-group col-sm-12 required">--}}
{{--                        <label class="control-label" for="input-shipping-zone">Quận / Huyện:</label>--}}
{{--                        <select name="shipping_zone_id" id="input-shipping-zone" class="form-control" required="" autocomplete="shipping region"><option value=""> --- Chọn --- </option><option value="0" selected="selected"> --- Không --- </option></select>--}}
{{--                    </div>--}}
                    <div class="form-group col-sm-12 required">
                        <label class="control-label" for="input-shipping-address-1">Địa chỉ:</label>
                        <input type="text" name="shipping_address_1" value="" placeholder="Địa chỉ:" id="input-shipping-address-1" class="form-control" required="" autocomplete="shipping street-address">
                    </div>
                    <div class="form-group col-sm-12 hidden">
                        <label class="control-label" for="input-shipping-address-2">Địa chỉ khác:</label>
                        <input type="text" name="shipping_address_2" value="" placeholder="Địa chỉ khác:" id="input-shipping-address-2" class="form-control">
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="checkbox col-sm-12">
            <label>
                <input type="checkbox" name="same_address" value="1" checked="checked">
                <b>Địa chỉ thanh toán và địa chỉ nhận hàng của tôi giống nhau</b>.    </label>
        </div>
        <div class="hidden-xs_ col-sm-12">
            <p><strong>Thêm ghi chú cho đơn hàng của bạn</strong></p>
            <p><textarea name="comment" rows="3" id="textarea-note" class="form-control"></textarea></p>
        </div>
    </form>

    <div class="buttons col-sm-12">
        <div class="pull-right">
            <input type="button" value="Tiếp tục" id="button-address" data-loading-text="Đang Xử lý..." class="btn btn-primary">
        </div>
    </div>
</div>


