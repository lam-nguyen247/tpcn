<div class="panel-body">
    <div class="row hidden" id="register-member">
        <fieldset id="account">
            <form id="form-register" action="#">
                @csrf
                <div class="form-group col-sm-6" style="display: none;">
                    <label class="control-label">Nhóm khách hàng</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="customer_group_id" value="1" checked="checked">
                            Default</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="clearfix form-group required">
                        <div class="col-xs-12 col-sm-2">
                            <label class="control-label" for="input-register-first-name">Tên:</label>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <input type="text" name="first_name" value="" placeholder="Họ và tên:" id="input-register-first-name" class="form-control" required="" autocomplete="given-name">
                        </div>
                    </div>
                </div>
                <div class="form-group required">
                    <div class="clearfix form-group ">
                        <div class="col-xs-12 col-sm-2">
                            <label class="control-label" for="input-register-last-name">Họ và tên lót:</label>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <input type="text" name="last_name" value="" placeholder="Họ và tên lót:" id="input-register-last-name" class="form-control" required="" autocomplete="family-name">
                        </div>
                    </div>
                </div>
                <div class="clearfix form-group required">
                    <div class="col-xs-12 col-sm-2">
                        <label class="control-label" for="input-register-password">Mật khẩu:</label>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <input type="password" name="password" value="" placeholder="Mật khẩu" id="input-register-password" class="form-control">
                    </div>
                </div>
                <div class="clearfix form-group required">
                    <div class="col-xs-12 col-sm-2">
                        <label class="control-label" for="input-register-password-confirmation">Nhập lại mật khẩu:</label>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <input type="password" name="password_confirmation" value="" placeholder="Nhập lại mật khẩu" id="input-register-password-confirmation" class="form-control">
                    </div>
                </div>
                <div class="form-group required ">
                    <div class="clearfix form-group ">
                        <div class="col-xs-12 col-sm-2">
                            <label class="control-label" for="input-register-phone">Điện thoại:</label>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <input type="text" name="phone" value="" placeholder="Điện thoại:" id="input-register-phone" class="form-control" required="" autocomplete="tel">
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="clearfix form-group required">
                        <div class="col-xs-12 col-sm-2">
                            <label class="control-label" for="input-register-email">E-Mail:</label>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <input type="text" name="email" value="" placeholder="E-Mail:" id="input-register-email" class="form-control" required="" autocomplete="email">
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12">
                    <div class="checkbox">
                        <label for="newsletter">
                            <input type="checkbox" name="is_news_letter" value="1" id="newsletter">
                            Tôi muốn đăng kí nhận bản tin EcoShop .
                        </label>
                    </div>
                    <div class="buttons clearfix">
                        <input type="checkbox" checked="" name="agree" value="1">
                        Tôi đã đọc và đồng ý với điều khoản
                        <a class="fancybox" href="#" alt="Chính sách bảo mật"><b>Chính sách bảo mật</b></a> &nbsp;
                    </div>
                    <input type="button" value="Tiếp tục" id="button-register" data-loading-text="Đang Xử lý..." class="btn btn-primary">
                </div>
            </form>
        </fieldset>
    </div>
</div>
