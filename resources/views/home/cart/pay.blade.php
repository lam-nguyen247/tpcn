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
                                <form id="update" action="#" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="table-responsive cart-info">
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
                                            <td class="text-right"><span class="bk-cart-subtotal-price"></span><sup>đ</sup>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Tổng cộng
                                            </td>
                                            <td class="text-right"><span class="bk-cart-subtotal-price"></span><sup>đ</sup>
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
        // Account
        initCheckout();
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
                success: function(json) {
                    // if (json['redirect']) {
                    //     alert('redirect');
                    //     location = json['redirect'];
                    // } else {
                    //     $('#ar-step-account').find('.fa-stack').addClass('checkout-pointer');
                    //     $('#ar-step-account').find('.fa-title').addClass('checkout-pointer');
                    //     //$('#ar-step-account').removeClass('text-primary');
                    //     $('#ar-step-account').addClass('text-muted');
                    //     $('#ar-step-address').removeClass('text-muted');
                    //     $('#ar-step-address').addClass('text-primary');
                    //
                    //     $('#ar-account-select').parent().hide();
                    //
                    //     $('#ar-left-1').parent().show();
                    //
                    //     $('#ar-right-1').parent().find('.panel-heading .panel-title').html('Thông tin giao hàng');
                    //
                    //     loadAddress();
                    //
                    //     $('html, body').animate({ scrollTop: 0 }, 'slow');
                    // }
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

        function initCheckout() {
            var step = localStorage.getItem('checkout-step');
            if (step !== null) {
                if (step == 2) {
                    hiddenModal();
                    $('#address-form').removeClass('hidden');
                    $('#ar-step-address').removeClass('text-muted').after().addClass('text-primary');
                }

                if (step == 3) {
                    // ToDo
                }
            }
        }
//
//         // Address save
//         $(document).on('click', '#button-address', function() {
//             $.ajax({
//                 url: 'index.php?route=checkout/address/save',
//                 type: 'post',
//                 data: $('#ar-left-1 input[type=\'radio\']:checked, #ar-right-1 input[type=\'text\'], #ar-right-1 input[type=\'date\'], #ar-right-1 input[type=\'datetime-local\'], #ar-right-1 input[type=\'time\'], #ar-right-1 input[type=\'password\'], #ar-right-1 input[type=\'checkbox\']:checked, #ar-right-1 input[type=\'radio\']:checked, #ar-right-1 input[type=\'hidden\'], #ar-right-1 textarea, #ar-right-1 select'),
//                 dataType: 'json',
//                 beforeSend: function() {
//                     $('#button-address').button('loading');
//                 },
//                 complete: function() {
//                     $('#button-address').button('reset');
//                 },
//                 success: function(json) {
//                     $('.alert, .text-danger').remove();
//
//                     if (json['redirect']) {
//                         location = json['redirect'];
//                     } else if (json['error']) {
//                         if (json['error']['warning']) {
//                             $('#ar-right-1 .panel-body').prepend('<div class="alert alert-warning">' + json['error']['warning'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
//                         }
//
//                         for (i in json['error']) {
//                             var element = $('#input-' + i.replace(/_/g, '-'));
//
//                             if ($(element).parent().hasClass('input-group')) {
//                                 $(element).parent().after('<div class="text-danger">' + json['error'][i] + '</div>');
//                             } else {
//                                 $(element).after('<div class="text-danger">' + json['error'][i] + '</div>');
//                             }
//                         }
//
//                         // Highlight any found errors
//                         $('.text-danger').parent().addClass('has-error');
//                     } else {
// //                $('#ar-left-2').parent().parent().hide();
// //                $('#ar-left-1').parent().parent().removeClass('col-sm-8');
// //                $('#ar-left-1').parent().parent().addClass('col-sm-12');
//                         $('#ar-step-address').find('.fa-stack').addClass('checkout-pointer');
//                         $('#ar-step-address').find('.fa-title').addClass('checkout-pointer');
//                         $('#ar-step-account').addClass('text-muted');
//                         // $('#ar-step-address').removeClass('text-primary');
//                         $('#ar-step-address').addClass('text-muted');
//                         $('#ar-step-payment').addClass('text-primary');
//
//                         $('#ar-right-1').parent().find('.panel-heading .panel-title').html('Xác nhận đơn hàng');
//                         $('#ar-left-1').parent().find('.panel-heading .panel-title').html('Phương thức thanh toán');
//
//                         $('#ar-right-1 .panel-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin checkout-spin"></i></div>');
//
//                         $('#ar-left-1').parent().show();
//
//                         loadTotalsByAddressFields();
//                         //$('#ar-left-2').parent().hide();
//
//                         loadPaymentMethodsByAddressId($('select[name=\'address_id\']').val());
//
//                         $('html, body').animate({ scrollTop: 0 }, 'slow');
//                     }
//                 },
//                 error: function(xhr, ajaxOptions, thrownError) {
//                     alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//                 }
//             });
//         });
//
//         // ToS control
//         $(document).on('submit', '#ar-right-1 form', function(event) {
//             if (!checkTerms()) {
//                 event.preventDefault();
//                 event.stopPropagation();
//                 return false;
//             }
//         });
//
//         $(document).on('click', '#button-confirm', function(event) {
//             if (!checkTerms()) {
//                 event.preventDefault();
//                 event.stopPropagation();
//                 return false;
//             }
//         });
//
//         // Steps
//         $(document).on('click', '.checkout-pointer', function() {
//             var checkout_step = $(this).parent().attr('id');
//             if (checkout_step == 'ar-step-account_s') {
//                 $('#ar-step-payment').removeClass('text-primary');
//                 $('#ar-step-payment').addClass('text-muted');
//                 $('#ar-step-address').removeClass('text-muted');
//                 $('#ar-step-address').removeClass('text-primary');
//                 $('#ar-step-address').addClass('text-muted');
//                 $('#ar-step-address').find('.fa-stack').removeClass('checkout-pointer');
//                 $('#ar-step-address').find('.fa-title').removeClass('checkout-pointer');
//                 $('#ar-step-account').removeClass('text-muted');
//                 $('#ar-step-account').addClass('text-primary');
//                 $('#ar-step-account').find('.fa-stack').removeClass('checkout-pointer');
//                 $('#ar-step-account').find('.fa-title').removeClass('checkout-pointer');
//
//                 $('#ar-account-select').parent().show();
//                 $('#ar-left-1').parent().hide();
//                 $('#ar-left-2').parent().find('.panel-heading .panel-title').html('Giỏ hàng');
//
//                 $('input[name=\'ar-account-name\']:checked').trigger('change');
//
//                 loadTotals();
//             }
//             else if (checkout_step == 'ar-step-address_s') {
//                 $('#ar-step-address').find('.fa-stack').removeClass('checkout-pointer');
//                 $('#ar-step-address').find('.fa-title').removeClass('checkout-pointer');
//                 $('#ar-step-address').removeClass('text-muted');
//                 $('#ar-step-address').addClass('text-primary');
//                 $('#ar-step-payment').removeClass('text-primary');
//                 $('#ar-step-payment').addClass('text-muted');
//
//                 $('#ar-right-1').parent().find('.panel-heading .panel-title').html('Thông tin giao hàng');
//
//
//                 $('#ar-left-2').parent().find('.panel-heading .panel-title').html('Giỏ hàng');
//                 $('#ar-left-2').parent().show();
//
//                 loadAddress();
//             }
//         });
//
//         // Check ToS box
//         function checkTerms() {
//             return true;
//
//             if (!$('input[name=\'agree\']').is(':checked')) {
//                 if(!$('.alert').length) {
//                     $('#ar-right-1 .panel-body').prepend('<div class="alert alert-danger">Lỗi: Bạn phải đồng ý với điều khoản Điều khoản sử dụng!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
//                 }
//
//                 return false;
//             }
//             else {
//                 $('.alert').remove();
//
//                 return true;
//             }
//         }
//
//         // Load totals
//         function loadTotals() {
//             $.ajax({
//                 url: 'index.php?route=checkout/totals',
//                 type: 'post',
//                 dataType: 'html',
//                 cache: false,
//                 beforeSend: function() {
//                     $('#ar-left-2 .panel-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin checkout-spin"></i></div>');
//                 },
//                 success: function(html) {
//                     $('#ar-left-2 .panel-body').html(html);
//                 },
//                 error: function(xhr, ajaxOptions, thrownError) {
//                     alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//                 }
//             });
//         }
//
//         // Load totals by address id
//         function loadTotalsByAddressId(address_id) {
//             $.ajax({
//                 url: 'index.php?route=checkout/totals',
//                 type: 'post',
//                 data: {address_id: address_id},
//                 dataType: 'html',
//                 cache: false,
//                 beforeSend: function() {
//                     $('#ar-left-2 .panel-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin checkout-spin"></i></div>');
//                 },
//                 success: function(html) {
//                     $('#ar-left-2 .panel-body').html(html);
//                 },
//                 error: function(xhr, ajaxOptions, thrownError) {
//                     alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//                 }
//             });
//         }
//
//         // Load totals by new address fields
//         function loadTotalsByAddressFields(address_type, address_country_id, address_zone_id, address_city, address_postcode) {
//             $.ajax({
//                 url: 'index.php?route=checkout/totals',
//                 type: 'post',
//                 data: {address_type: address_type, address_country_id: address_country_id, address_zone_id: address_zone_id, address_city: address_city, address_postcode: address_postcode},
//                 dataType: 'html',
//                 cache: false,
//                 beforeSend: function() {
//                     $('#ar-left-2 .panel-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin checkout-spin"></i></div>');
//                 },
//                 success: function(html) {
//                     $('#ar-left-2 .panel-body').html(html);
//                 },
//                 error: function(xhr, ajaxOptions, thrownError) {
//                     alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//                 }
//             });
//         }
//
//         // Load address
//         function loadAddress() {
//             $.ajax({
//                 url: 'index.php?route=checkout/address',
//                 type: 'post',
//                 dataType: 'html',
//                 cache: false,
//                 beforeSend: function() {
//                     $('#ar-right-1 .panel-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin checkout-spin"></i></div>');
//                 },
//                 success: function(html) {
//                     $('#ar-right-1 .panel-body').html(html);
//                 },
//                 error: function(xhr, ajaxOptions, thrownError) {
//                     alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//                 }
//             });
//         }
//
//         // Methods related with shipping
//
//         // Load shipping methods
//         function loadShippingMethods() {
//             $.ajax({
//                 url: 'index.php?route=checkout/shipping_method',
//                 type: 'post',
//                 dataType: 'html',
//                 cache: false,
//                 beforeSend: function() {
//                     $('#ar-left-1 .panel-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin checkout-spin"></i></div>');
//                 },
//                 success: function(html) {
//                     $('#ar-left-1 .panel-body').html(html);
//                     saveShippingMethod();
//                 },
//                 error: function(xhr, ajaxOptions, thrownError) {
//                     alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//                 }
//             });
//         }
//
//         // Load shipping methods by addresss id
//         function loadShippingMethodsByAddressId(address_id) {
//             $.ajax({
//                 url: 'index.php?route=checkout/shipping_method',
//                 type: 'post',
//                 data: {address_id: address_id},
//                 dataType: 'html',
//                 cache: false,
//                 beforeSend: function() {
//                     $('#ar-left-1 .panel-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin checkout-spin"></i></div>');
//                 },
//                 success: function(html) {
//                     $('#ar-left-1 .panel-body').html(html);
//                     saveShippingMethod();
//                 },
//                 error: function(xhr, ajaxOptions, thrownError) {
//                     alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//                 }
//             });
//         }
//
//         // Load shipping methods by new address fields
//         function loadShippingMethodsByAddressFields(address_type, address_country_id, address_zone_id, address_city, address_postcode) {
//             $.ajax({
//                 url: 'index.php?route=checkout/shipping_method',
//                 type: 'post',
//                 data: {address_type: address_type, address_country_id: address_country_id, address_zone_id: address_zone_id, address_city: address_city, address_postcode: address_postcode},
//                 dataType: 'html',
//                 cache: false,
//                 beforeSend: function() {
//                     $('#ar-left-1 .panel-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin checkout-spin"></i></div>');
//                 },
//                 success: function(html) {
//                     $('#ar-left-1 .panel-body').html(html);
//                     saveShippingMethod();
//                 },
//                 error: function(xhr, ajaxOptions, thrownError) {
//                     alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//                 }
//             });
//         }
//
//         // Save the selected shipping method
//         function saveShippingMethod() {
//             var shipping_method = $('input[name=\'shipping_method\']:checked').attr('value');
//
//             if (shipping_method == undefined) {
//                 shipping_method = 0;
//             }
//
//             $.ajax({
//                 url: 'index.php?route=checkout/shipping_method/save',
//                 type: 'post',
//                 data: {shipping_method: shipping_method},
//                 dataType: 'html',
//                 cache: false,
//                 success: function(json) {
//                     if (json['redirect']) {
//                         location = json['redirect'];
//                     } else if (json['error']) {
//                         if (json['error']['warning']) {
//                             $('#ar-left-1 .panel-body').prepend('<div class="alert alert-warning">' + json['error']['warning'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
//                         }
//                     } else {
//                         loadTotals();
//                     }
//                 },
//                 error: function(xhr, ajaxOptions, thrownError) {
//                     alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//                 }
//             });
//         }
//
//         // Load payment methods
//         function loadPaymentMethods() {
//             $.ajax({
//                 url: 'index.php?route=checkout/payment_method',
//                 type: 'post',
//                 dataType: 'html',
//                 cache: false,
//                 beforeSend: function() {
//                     $('#ar-left-1 .panel-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin checkout-spin"></i></div>');
//                 },
//                 success: function(html) {
//                     $('#ar-left-1 .panel-body').html(html);
//                     savePaymentMethod();
//                 },
//                 error: function(xhr, ajaxOptions, thrownError) {
//                     alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//                 }
//             });
//         }
//
//         // Load payment methods by addresss id
//         function loadPaymentMethodsByAddressId(address_id) {
//             $.ajax({
//                 url: 'index.php?route=checkout/payment_method',
//                 type: 'post',
//                 data: {address_id: address_id},
//                 dataType: 'html',
//                 cache: false,
//                 beforeSend: function() {
//                     $('#ar-left-1 .panel-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin checkout-spin"></i></div>');
//                 },
//                 success: function(html) {
//                     $('#ar-left-1 .panel-body').html(html);
//                     savePaymentMethod();
//                 },
//                 error: function(xhr, ajaxOptions, thrownError) {
//                     alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//                 }
//             });
//         }
//
//         // Save the selected payment method
//         function savePaymentMethod() {
//             var payment_method = $('input[name=\'payment_method\']:checked').attr('value');
//
//             if (payment_method == undefined) {
//                 payment_method = 0;
//             }
//
//             $.ajax({
//                 url: 'index.php?route=checkout/payment_method/save',
//                 type: 'post',
//                 data: {payment_method: payment_method},
//                 dataType: 'html',
//                 cache: false,
//                 beforeSend: function() {
//                     $('#ar-right-1 .panel-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin checkout-spin"></i></div>');
//                 },
//                 success: function(json) {
//                     if (json['redirect']) {
//                         location = json['redirect'];
//                     } else if (json['error']) {
//                         if (json['error']['warning']) {
//                             $('#ar-left-1 .panel-body').prepend('<div class="alert alert-warning">' + json['error']['warning'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
//                         }
//                     } else {
//                         loadConfirm();
//                     }
//                 },
//                 error: function(xhr, ajaxOptions, thrownError) {
//                     alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//                 }
//             });
//         }
//
//         // Load confirm page
//         function loadConfirm() {
//             $.ajax({
//                 url: 'index.php?route=checkout/confirm',
//                 type: 'post',
//                 dataType: 'html',
//                 cache: false,
//                 success: function(html) {
//                     $('#ar-right-1 .panel-body').html(html);
//                 },
//                 error: function(xhr, ajaxOptions, thrownError) {
//                     alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//                 }
//             });
//         }
//
//         // Initial actions
//         $('#ar-left-1').parent().hide();
//
//         $('#ar-step-account').addClass('text-primary');
//         $('#ar-step-address').addClass('text-muted');
//         $('#ar-step-payment').addClass('text-muted');
//
//         $('input[name=\'ar-account-name\']:checked').trigger('change');
//
//         loadTotals();

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
                          <input class="upc_popup" type="text" name="product[${item.product_id}][quantity]" value="${item.qty}" size="1">
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
        $(".bk-cart-subtotal-price").attr('data-val',sum)

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
                $(".bk-cart-subtotal-price").html(formatMoney(sum,0));
                $(".bk-cart-subtotal-price").attr('data-val',sum)
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
