@extends('home.layouts.app')

@section('title', 'Giỏ Hàng')
@section('description', null)
@section('css')
    <style>
        .img-thumbnail {
            max-width: 50% !important;
        }
    </style>
@endsection

@section('breadcrumb')
    <div class="breadcrumb full-width">
        <div class="background-breadcrumb"></div>
        <div class="background">
            <div class="shadow"></div>
            <div class="pattern">
                <div class="container">
                    <div class="clearfix">
                        <ul>
                            <li class="item ">
                                <a href="{{ route('home.index') }}">Trang chủ</a>
                            </li>
                            <li class="item ">
                                <a href="{{ route('home.cart') }}">Giỏ hàng của bạn</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="main-content full-width home">
        <div class="background-content"></div>
        <div class="background">
            <div class="shadow"></div>
            <div class="pattern">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 center-column " id="content">
                                    <form id="update" action="#" method="post" enctype="multipart/form-data">
                                        <div class="table-responsive cart-info">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <td class="text-center" style="width:10%;">Hình ảnh</td>
                                                    <td class="text-center hidden-xs">Tên sản phẩm</td>
                                                    <td class="text-center hidden-xs">Mã hàng</td>
                                                    <td class="text-center">Số lượng</td>
                                                    <td class="text-right hidden-xs">Đơn Giá</td>
                                                    <td class="text-right">Tổng cộng</td>
                                                </tr>
                                                </thead>
                                                <tbody class="body-card">

                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                    <div class="cart-total">
                                        <table>
                                            <tbody>
                                            <tr>
                                                <td class="text-right"><strong>Thành tiền:</strong></td>
                                                <td class="text-right"><span class="bk-cart-subtotal-price">1.300.000</span><sup>đ</sup></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>Tổng cộng :</strong></td>
                                                <td class="text-right"><span class="bk-cart-subtotal-price">1.300.000</span><sup>đ</sup></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="buttons">
                                        <div class="pull-left"><a href="{{ route('home.index') }}" class="btn btn-default">Tiếp tục mua hàng</a></div>
                                        <div class="pull-right"><a href="{{ route('home.pay') }}" class="btn btn-primary">Thanh toán</a></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
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
@endsection

@section('js')
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
                html += '<tr id="item_'+ item.product_id + '">\n' +
                    '    <td class="text-center">\n' +
                    '        <a href="'+ item.url +'">\n' +
                    '            <img class="img-thumbnail" src="'+ item.image +'"\n' +
                    '                 alt="'+ item.title +'\n' +
                    '                 title="'+ item.title +'">\n' +
                    '        </a>\n' +
                    '        <div class="visible-xs">\n' +
                    '            <a href="'+ item.url +'">'+ item.title +'\n' +
                    '                <div>\n' +
                    '                </div>\n' +
                    '            </a>\n' +
                    '        </div>\n' +
                    '    </td>\n' +
                    '    <td class="text-center hidden-xs">\n' +
                    '        <a class="npr_cart" href="'+ item.url +'">'+ item.title +'</a>\n' +
                    '    </td>\n' +
                    '    <td class="text-center hidden-xs">'+ item.code +'</td>\n' +
                    '    <td class="text-center">\n' +
                    '        <input type="text" pattern="[0-9]*" onblur="updateCart('+ item.product_id +');" id="qty_'+ item.product_id + '" data-max="' + item.max +'" value="'+ item.qty +'" size="1">\n' +
                    '        &nbsp;\n' +
                    '        &nbsp;<a class="rmc_cart" onclick="deleteItem(this,'+ item.product_id +','+ item.price +');">\n' +
                    '            <img src="' +__urlRemove +'" alt="Loại bỏ" title="Loại bỏ"></a>\n' +
                    '    </td>\n' +
                    '    <td class="text-right hidden-xs">'+ formatMoney(item.price,0) +'<sup>đ</sup></td>\n' +
                    '    <td class="text-right" id="total_'+ item.product_id + '">'+ formatMoney(item.price * item.qty,0) +'<sup>đ</sup></td>\n' +
                    '</tr>';
            });
            $('#content .body-card').prepend(html);
        } else {
            html +='<div class="col-md-12">\n' +
                '       <div class="row">\n' +
                '          <div class="col-md-12 center-column " id="content">\n' +
                '            <div class="">\n' +
                '            </div>\n' +
                '            <div class="text-center">Giỏ hàng của bạn đang trống!</div>\n' +
                '            <br>\n' +
                '            <div class="row">\n' +
                '               <div class="col-sm-12">\n' +
                '              </div>\n' +
                '          </div>\n' +
                '       </div>\n' +
                '    </div>\n' +
                '</div>';
            $('#content').children().remove();
            $('#content').prepend(html);
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
