@extends('home.layouts.paypal')

@section('title', 'Thanh Toán')
@section('description', null)
@section('css')
    <style>
        .img-thumbnail {
            max-width: 50% !important;
        }
    </style>
@endsection

@section('content')
    <header>
        <div class="background-header"></div>
        <div class="slider-header">
            <!-- Top Bar -->
            <!-- Top of pages -->
            <div id="top" class="full-width">
                <div class="background-top"></div>
                <div class="background">
                    <div class="shadow"></div>
                    <div class="pattern"></div>
                    <div class="container">
                        <div class="row">
                            <!-- Header Left -->
                            <div class="col-xs-12 col-sm-2 col-md-3 noright" id="header-left">
                                <!-- Logo -->
                                <div class="logo vvv"><a href="https://ecogreen.com.vn"><img src="image/catalog/logo.png" title="EcoShop" alt="EcoShop"></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div id="content" class="row"><br>
                <div class="lead text-center col-sm-12 checkout-wizard">
                    <div id="ar-step-account" class="col-xs-4 checkout-step text-primary" data-checkout-step="1">
                        <div class="fa-title">
                            <span>1. Đăng nhập</span>
                        </div>
                    </div>
                    <div id="ar-step-address" class="col-xs-4 checkout-step text-muted" data-checkout-step="2">
                        <div class="fa-title">
                            <span>2. Thông tin giao hàng</span>
                        </div>
                    </div>
                    <div id="ar-step-payment" class="col-xs-4 checkout-step text-muted" data-checkout-step="3">
                        <div class="fa-title">
                            <span>3. Hình thức thanh toán</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-xs-12 panel-np-left pull-right">
                    <div class="cartmini panel-cartmini">
                        <div class="panel-heading">
                            <h4 class="panel-title">Giỏ hàng</h4>
                        </div>
                        <div id="ar-left-2">
                            <div class="panel-body"><header>
                                </header>
                                <form id="products-form" action="#" method="post" enctype="multipart/form-data">
                                    <div class="table-responsive cart-info">
                                        <table class="cart-i">
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                                <div class="cart-total">
                                    <table class="table" id="info-paypal">
                                        <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Thành tiền
                                            </td>
                                            <td class="text-right"><span class="bk-cart-subtotal-price"></span><sup>đ</sup>
                                            </td>
                                        </tr>
                                        <tr class="hidden">
                                            <td class="text-left">
                                                Phí vận chuyển giao hàng
                                                <button type="button" class="note_ship_cmd" data-toggle="modal" data-target=".bs-example-modal-sm"><span>(?)</span></button>

                                                <div class="modal box_note_ship_cmd fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                                    <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                                                            - Phí ship chỉ 10k.<br>
                                                            - Miễn phí giao hàng cho đơn hàng sử dụng Mã khuyến mãi.
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right">10.000<sup>đ</sup></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Tổng cộng
                                            </td>
                                            <td class="text-right"><span class="bk-cart-subtotal-price total-add-ship"></span><sup>đ</sup>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8  col-xs-12 panel-np-right">
                    <div class="panel panel-default" style="display: none;">
                        <div id="ar-left-1">
                            <div class="panel-body"></div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"></h4>
                        </div>
                        <div id="ar-account-select">
                            <div class="panel-body">
                                <div class="radio">
                                    <label class="">
                                        <input type="radio" id="ar-account-guest" value="guest" name="ar-account-name" style="position: absolute; opacity: 0;" checked="checked">
                                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        Mua hàng không cần đăng nhập.
                                    </label>
                                </div>
                                <div class="radio">
                                    <label class="">
                                            <input type="radio" id="ar-account-register" value="register" name="ar-account-name" style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        Đăng kí thành viên <i>(để được nhận ưu đãi).</i>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label class="">
                                        <input type="radio" id="ar-account-login" value="login" name="ar-account-name" style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        Đăng nhập <i>(nếu bạn đã đăng ký thành viên)</i>.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading hidden">
                            <h4 class="panel-title">Thông tin khách hàng</h4>
                        </div>
                        <div id="ar-right-1">
                            <div class="panel-body">
                                <div id="guest">
                                    <div class="col-sm-12">
                                        <div class="pull-left">
                                            <input type="button" value="Tiếp tục" id="button-guest" data-loading-text="Đang Xử lý..." class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                                @includeIf('home.cart.include.resgister-member')
                                @includeIf('home.cart.include.login')
                                @includeIf('home.cart.include.address-pay')
                                @includeIf('home.cart.include.payments')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        // same address
        $('input[name=same_address]').on('change', function() {
            var same_address = $(this).is(':checked');

            if (same_address) {
                $('#payment-address legend').html('Địa chỉ nhận hàng & thanh toán');

                $('#payment-address').parent().removeClass('col-sm-6');
                $('#payment-address').parent().addClass('col-sm-12');
                $('#shipping-address').parent().removeClass('col-sm-6');
                $('#shipping-address').parent().hide();
            }
            else {
                $('#payment-address legend').html('Địa chỉ thanh toán');

                $('#payment-address').parent().removeClass('col-sm-12');
                $('#payment-address').parent().addClass('col-sm-6');
                $('#shipping-address').parent().addClass('col-sm-6');
                $('#shipping-address').parent().show();
            }
        });
        // Account
        $(document).on('change', 'input[name=ar-account-name]:checked', function() {
            var checkout_select = $(this).attr('value');

            if (checkout_select == 'register') {
                $('#ar-right-1').parent().find('.panel-heading .panel-title').html('Thông tin thanh toán');
                $('#ar-right-1 #guest,#form-login').addClass('hidden');
                $('#ar-right-1 #register-member').removeClass('hidden');

            } else if (checkout_select == 'guest') {
                $('#ar-right-1').parent().find('.panel-heading .panel-title').html('Thông tin khách hàng');
                $('#ar-right-1 #guest').removeClass('hidden');
                $('#ar-right-1 #register-member,#form-login').addClass('hidden');
            }
            else if (checkout_select == 'login') {
                $('#ar-right-1').parent().find('.panel-heading .panel-title').html('Đăng nhập <i>(nếu bạn đã đăng ký thành viên)</i>.');
                $('#ar-right-1 #form-login').removeClass('hidden');
                $('#ar-right-1 #register-member,#guest').addClass('hidden');
            }
        });

        // Login save
        $(document).on('click', '#button-login', function() {
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route('home.register-member')}}',
                type: 'post',
                data: JSON.stringify($('#form-register').serialize()),
                dataType: 'json',
                beforeSend: function() {
                    $('#button-login').button('loading');
                },
                complete: function() {
                    $('#button-login').button('reset');
                },
                success: function(json) {
                    $('.alert, .text-danger').remove();
                    $('.form-group').removeClass('has-error');

                    if (json['redirect']) {
                        location = json['redirect'];
                    } else if (json['error']) {
                        $('#ar-right-1 .panel-body').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error']['warning'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');

                        // Highlight any found errors
                        $('input[name=\'email\']').parent().addClass('has-error');
                        $('input[name=\'password\']').parent().addClass('has-error');
                    }
                    else {
                        $('#ar-step-account').find('.fa-stack').addClass('checkout-pointer');
                        $('#ar-step-account').find('.fa-title').addClass('checkout-pointer');
                        $('#ar-step-account').removeClass('text-primary');
                        //$('#ar-step-account').addClass('text-muted');
                        $('#ar-step-address').removeClass('text-muted');
                        $('#ar-step-address').addClass('text-primary');

                        $('#ar-account-select').parent().hide();

                        $('#ar-left-1').parent().show();

                        $('#ar-right-1').parent().find('.panel-heading .panel-title').html('Thông tin giao hàng');


                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                }
            });
        });

        // Register save
        $(document).on('click', '#button-register', function() {
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route('home.register-member')}}',
                type: 'post',
                data: $('#form-register').serialize(),
                dataType: 'json',
                beforeSend: function() {
                    $('#button-register').button('loading');
                },
                complete: function() {
                    $('#button-register').button('reset');
                },
                success: function(res) {
                   if (res.success) {
                       setStepAddress();
                   }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $('.alert, .text-danger').remove();
                    $('.form-group').removeClass('has-error');
                    $error = xhr.responseJSON.errors;
                    for (i in $error) {
                        console.log($error[i])
                        var element = $('#input-register-' + i.replace(/_/g, '-'));

                        if ($(element).parent().hasClass('input-group')) {
                            $(element).parent().after('<div class="text-danger">' +$error[i][0] + '</div>');
                        } else {
                            $(element).after('<div class="text-danger">' + $error[i][0] + '</div>');
                        }
                    }
                }
            });
        });
        
        // Guest save
        $(document).on('click', '#button-guest', function() {
            $('#button-guest').button('loading');
            setStepAddress();
            $('#button-guest').button('reset');
        });

        $(document).on('click', '#button-address', function() {
            $('#button-address').button('loading');
            var phone1 = $('#input-payment-custom-field1').val().trim();
            var name1 = $('#input-payment-firstname').val().trim();
            if ($('.icheckbox input[name=same_address]:checked').length < 1) {
                var nameShipping = $('#input-shipping-firstname').val().trim();
                var phoneShipping = $('#input-shipping-custom-field1').val().trim();
                if (nameShipping == "" || phoneShipping == "") {
                    alert('Vui lòng nhập đầy đủ thông tin');
                    $('#button-address').button('reset');
                    return;
                }
            }
            if (phone1 == "" || name1 == "") {
                alert('Vui lòng nhập đầy đủ thông tin');
            } else {
                saveAddressMethod();
                setStepPayments();
            }
            $('#button-address').button('reset');
        });

        function hiddenModal()
        {
            $('#ar-right-1 #register-member,#guest,#form-login').addClass('hidden');
            $('#ar-account-select').addClass('hidden');
        }

        function setStepAddress()
        {
            hiddenModal();
            $('#address-form').removeClass('hidden');
            $('#ar-step-address').removeClass('text-muted').after().addClass('text-primary');
            localStorage.setItem('checkout-step', 2);
        }

        function setStepPayments()
        {
            hiddenModal();
            $('#address-form').addClass('hidden');
            $('.div-payments').removeClass('hidden');
            $('#ar-step-payment').removeClass('text-muted').after().addClass('text-primary');
            localStorage.setItem('checkout-step', 3);
        }

        function initCheckout() {
            var step = localStorage.getItem('checkout-step');
            if (step !== null) {
                if (step == 2) {
                    hiddenModal();
                    $('#address-form').removeClass('hidden');
                    $('#ar-step-address').removeClass('text-muted').after().addClass('text-primary');
                    $('#info-paypal tr').eq(1).removeClass('hidden');
                    var price = parseInt($('.bk-cart-subtotal-price').attr('data-addShip'));
                    $('.total-add-ship').html(formatMoney(price,0));
                }

                if (step == 3) {
                    hiddenModal();
                    $('.div-payments').removeClass('hidden');
                    $('#ar-step-address').removeClass('text-muted').after().addClass('text-primary');
                    $('#ar-step-payment').removeClass('text-muted').after().addClass('text-primary');
                    $('#info-paypal tr').eq(1).removeClass('hidden');
                    var price = parseInt($('.bk-cart-subtotal-price').attr('data-addShip'));
                    $('.total-add-ship').html(formatMoney(price,0));
                }
            }
        }

        // Save the address method
        function saveAddressMethod() {
            let item =  {
                payment_name: $('#input-payment-firstname').val(),
                payment_phone: $('#input-payment-custom-field1').val(),
                payment_city: $('#input-payment-country').val(),
                payment_address: $("#input-payment-address-1").val(),
                shipping_same_payment: $('.icheckbox input[name=same_address]:checked').length < 1 ? 0 : 1,
                shipping_name: $('#input-shipping-firstname').val(),
                shipping_phone: $('#input-shipping-custom-field1').val(),
                shipping_city: $('#input-shipping-country').val(),
                shipping_zone: $('#input-shipping-zone').val(),
                shipping_address: $('#input-shipping-address-1').val(),
                note: $('#textarea-note').val()
            };
            localStorage.setItem('info-address',JSON.stringify(item))
        }

        $(document).on('click', '#button-confirm', function(event) {
            if (!checkTerms()) {
                event.preventDefault();
                event.stopPropagation();
                return false;
            }
            $('#button-confirm').button('loading');
            submitOrderProducts();
        });

        // Check ToS box
        function checkTerms() {
            return true;

            if (!$('input[name=agree]').is(':checked')) {
                if(!$('.alert').length) {
                    $('#ar-right-1 .panel-body').prepend('<div class="alert alert-danger">Lỗi: Bạn phải đồng ý với điều khoản Điều khoản sử dụng!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                }
                return false;
            }
            else {
                $('.alert').remove();
                return true;
            }
        }

        // submit ajax orderProduct
        function submitOrderProducts() {
            var dataCustomer = JSON.parse(localStorage.getItem('info-address'));
            dataCustomer.products = localStorage.getItem('cart');
            dataCustomer.payment = $('.payment').val();
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route('pay.create-pay')}}',
                type: 'post',
                data: dataCustomer,
                dataType: 'json',
                cache: false,
                beforeSend: function() {
                    $('#ar-left-2 .panel-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin checkout-spin"></i></div>');
                },
                success: function(respone) {
                    if (respone.success) {
                        alert('Cảm ơn quý khác đã mua sản phẩm');
                        localStorage.removeItem('checkout-step');
                        localStorage.removeItem('info-address');
                        localStorage.removeItem('cart');
                        window.location.href = '{{ route('home.index') }}';
                    }
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }

        // Initial actions
        $('#ar-left-1').parent().hide();

        $('#ar-step-account').addClass('text-primary');
        $('#ar-step-address').addClass('text-muted');
        $('#ar-step-payment').addClass('text-muted');

    </script>
    <script>
        var __urlRemove = '{{ url('/images/home/remove.png') }}';
        var __urlUpdate = '{{ url('/images/home/update.png') }}';
        let sum = 0;
        var cart = null;
        if (localStorage.getItem("cart") !== null) {
            cart = JSON.parse(localStorage.getItem('cart'));
        }
        var html = '';
        if(Array.isArray(cart) && cart.length > 0){
            cart.forEach(item=> {
                sum += item.price * item.qty;
                html +=`<tr id="item_${item.product_id}">
                      <td class="text-center" width="100">
                            <a href="${item.url}">
                            <img src="${item.image}"
                                alt="${item.title}"
                                title="${item.title}" class="img-thumbnail">
                            </a>
                            <div class="visible-xs">
                                <a href="${item.title}">${item.title}
                                    <div>
                                        <input type="hidden" name="product[${item.product_id}][product_id]" value="${item.product_id}" />
                                    </div>
                                </a>
                            </div>
                      </td>
                      <td width="100" class="text-center hidden-xs">
                          <a class="npr_popup" href="${item.title}">${item.title}
                          </a>
                      </td>
                      <td class="text-center">
                          <input class="upc_popup" type="text" id="qty_${item.product_id }" data-max="${item.max}"  onblur="updateCart(${item.product_id});" name="product[${item.product_id}][quantity]" value="${item.qty}" size="1">
                          &nbsp;
                          &nbsp;<a class="rmc_popup" onclick="deleteItem(this,${item.product_id},${item.price});">
                            <img src="${__urlRemove}" alt="Loại bỏ" title="Loại bỏ">
                            </a>
                      </td>
                      <td class="text-right">${formatMoney(item.price * item.qty,0)}<sup>đ</sup></td>
                    </tr>`;
            });
            $('.cart-i tbody').prepend(html);
        }

        $(".bk-cart-subtotal-price").html(formatMoney(sum,0));
        $(".bk-cart-subtotal-price").attr('data-val',sum);
        $(".bk-cart-subtotal-price").attr('data-addShip',(sum + 10000));
        initCheckout();

        function updateQty(product_id){
            if($(`#qty_${product_id}`).val() <= parseInt($(`#qty_${product_id}`).attr('data-max'))){
                cart = JSON.parse(localStorage.getItem('cart'));
                let index = getIndexByProductIdAndPropertyId(cart, product_id);
                cart[index].qty = $(`#qty_${product_id}`).val();
                let sum = 0;
                cart.forEach(item=>{
                    sum+= item.price*item.qty;
                });

                $(`#total_${product_id}`).text(formatMoney(cart[index].price*cart[index].qty,0));
                var step = localStorage.getItem('checkout-step');
                $(".bk-cart-subtotal-price").html(formatMoney(sum,0));
                if (step !== null) {
                    if (step > 1)
                    {
                        $(".bk-cart-subtotal-price").html(formatMoney(sum + 10000,0));
                    }
                }
                $(".bk-cart-subtotal-price").attr('data-val',sum)
                $(".bk-cart-subtotal-price").attr('data-addShip',(sum + 10000));
                localStorage.setItem("cart",JSON.stringify(cart));
                reset();
                init();
            }else{
                alert('Sản phẩm này chỉ còn '+ $(`#qty_${product_id}_${property_id}`).attr('data-max') + ' sản phẩm ');
            }
        }

        function deleteItem(ele, product_id, price){
            if(confirm("Bạn muốn xóa sản phẩm trong giỏ hàng?")){
                $(`#item_${product_id}`).remove();
                let rs = parseInt($(".bk-cart-subtotal-price").attr('data-val'))-(price*$(`#qty_${product_id}`).val());
                $(".bk-cart-subtotal-price").html(formatMoney(rs,0));
                $(".bk-cart-subtotal-price").attr('data-val',rs)
                removeItem(product_id);
                $(ele).parent().parent().remove();
            }
            else {
                return false;
            }
        }

        function updateCart(product_id){
            var pattern = /^\d+$/;
            if (parseInt($(`#qty_${product_id}`).val()) <= 0 || !pattern.test($(`#qty_${product_id}`).val())) {
                $(`#qty_${product_id}`).val(1);
            }
            if(parseInt($(`#qty_${product_id}`).val()) <= parseInt($(`#qty_${product_id}`).attr('data-max'))){
                updateQty(product_id);
            }else{
                alert('Sản phẩm này chỉ còn '+ $(`#qty_${product_id}`).attr('data-max') + ' sản phẩm ');
            }
        }
    </script>
@endsection
