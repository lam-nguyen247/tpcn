function addToCart(product_id, url, code, price, image, qty, title, slug, max){
    let count_item = parseInt($('#cart_count').text());
    price = parseInt(price);

    let item =  {
        product_id: product_id,
        price: price,
        url: url,
        code: code,
        image:image,
        qty: qty,
        title: title,
        slug: slug,
        max: max,
    };

    let cart = JSON.parse(localStorage.getItem('cart'));

    if(Array.isArray(cart)){
        let check = getIndexByProductIdAndPropertyId(cart, product_id);
        if(check != -1){
            if(cart[check].qty + qty <= max){
                cart[check].qty += qty;
                count_item += qty;
            }else{
                alert('Sản phẩm này chỉ còn '+ max + ' sản phẩm ');
            }
            $(`#item_${product_id} .quantity`).html(cart[check].qty);
            $(`#detail-roder-modal #item_${product_id} #qty_${product_id}`).val(cart[check].qty);
            $(`#detail-roder-modal #item_${product_id} #total_${product_id}`).attr('data-total', cart[check].qty * cart[check].price);
            totalPriceModal();
        }else{
            let li = `<tr id="item_${product_id}">
                  <td class="image">
                      <a href="${url}"><img src="${image}" alt="${title}" title="${title}"></a>
                  </td>
                  <td class="name">
                      <span class="quantity">1<span>&nbsp;x&nbsp;</span></span>
                      <a href="${url}">${title}</a>
                      <div>
                          <div class="price">${formatMoney(price,0)}<sup>đ</sup></div>
                      </div>
                  </td>
                  <td class="remove"><a href="javascript:;" onclick="removeItem(${product_id});" title="Loại bỏ"></a></td>
              </tr>`;
            $(".mini-cart-info table tbody").prepend(li);
            renderProductOrder(product_id, url, code, price, image, qty, title, slug, max);
            totalPriceModal();
            $('#cart_content_ajax').removeClass('hidden');
            $('#cart_content_empty').addClass('hidden');
            count_item += qty;
            cart.push(item);
        }
    }else{
        cart = new Array();
        let li = `<tr id="item_${product_id}">
                  <td class="image">
                      <a href="${url}"><img src="${image}" alt="${title}" title="${title}"></a>
                  </td>
                  <td class="name">
                      <span class="quantity">${qty}<span>&nbsp;x&nbsp;</span></span>
                      <a href="${url}">${title}</a>
                      <div>
                          <div class="price">${formatMoney(price,0)}<sup>đ</sup></div>
                      </div>
                  </td>
                  <td class="remove"><a href="javascript:;" onclick="removeItem(${product_id});" title="Loại bỏ"></a></td>
              </tr>`;
        renderProductOrder(product_id, url, code, price, image, qty, title, slug, max);
        totalPriceModal();
        $(".mini-cart-info table tbody").prepend(li);
        $('#cart_content_ajax').removeClass('hidden');
        $('#cart_content_empty').addClass('hidden');
        cart.push(item);
        count_item += qty;
    }
    localStorage.setItem('cart',JSON.stringify(cart))
    $('#cart_count').html(count_item);
    $('.button-cart').button('reset');
}

function getIndexByProductIdAndPropertyId(cart, product_id){
    for(i = 0 ; i< cart.length; i++){
        if(cart[i].product_id == product_id){
            return i;
        }
    }
    return -1;
}
function removeItem(product_id){
    let cart = JSON.parse(localStorage.getItem('cart'));
    let index = getIndexByProductIdAndPropertyId(cart, product_id);

    let count_item = parseInt($('#cart_count').text());
    count_item -= cart[index].qty;
    $('#cart_count').html(count_item);

    cart.splice(index, 1);
    localStorage.setItem('cart',JSON.stringify(cart));
    $(`#item_${product_id}`).remove();
    if(cart.length == 0){
        localStorage.setItem('checkout-step', 0);
        location.reload();
    }
}

function initToCart(product_id, url, code, price, image, qty, title){
    let count_item = 0;
    price = parseInt(price);
    let cart = JSON.parse(localStorage.getItem('cart'));
    let li = `<tr id="item_${product_id}">
                  <td class="image">
                      <a href="${url}"><img src="${image}" alt="${title}" title="${title}"></a>
                  </td>
                  <td class="name">
                      <span class="quantity">${qty}<span>&nbsp;x&nbsp;</span></span>
                      <a href="${url}">${title}</a>
                      <div>
                          <div class="price">${formatMoney(price,0)}<sup>đ</sup></div>
                      </div>
                  </td>
                  <td class="remove"><a href="javascript:;" onclick="removeItem(${product_id});" title="Loại bỏ"></a></td>
              </tr>`;

    $(".mini-cart-info table tbody").prepend(li);
    renderProductOrder(product_id, url, code, price, image, qty, title);
    totalPriceModal();
}

function reset(){
    $('#cart_count').html(0);
}

function init(){
    let cart = JSON.parse(localStorage.getItem('cart'));
    let count_item = 0;
    if(Array.isArray(cart)){
        $(".no-items").css('display','none');
        for( i = 0 ; i<cart.length; i++){
            count_item += parseInt(cart[i].qty);
            initToCart(cart[i].product_id, cart[i].url, cart[i].code, cart[i].price, cart[i].image, cart[i].qty, cart[i].title);
        }
        $(".has-items").css('display','block');
    }

    $('#cart_count').html(count_item);
}

$(document).ready(function(){
    init();
})

function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ",") {
    try {
      decimalCount = Math.abs(decimalCount);
      decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

      const negativeSign = amount < 0 ? "-" : "";

      let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
      let j = (i.length > 3) ? i.length % 3 : 0;

      return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
    } catch (e) {
      console.log(e)
    }
};

function renderProductOrder(product_id, url, code, price, image, qty, title, slug, max) {
    let li =  `<tr id="item_${product_id}">
        <td class="text-center" width="100">
            <a href="${url}">
                <img src="${image}" alt="${title}" title="${title}" class="img-thumbnail"></a>
            <div class="visible-xs">
                <a href="${url}">${title}
                    <div>
                    </div>
                </a>
            </div>
        </td>
        <td width="100" class="text-center hidden-xs">
            <a class="npr_popup" href="${url}">${title}</a>
        </td>
        <td class="text-center">
            <input type="text" pattern="[0-9]*" disabled id="qty_${product_id}" data-max="${max}" value="${qty}" size="1">
            &nbsp;<a class="rmc_popup" onclick="removeItem(${product_id});">
            <img src="${__urlRemove}" alt="Loại bỏ" title="Loại bỏ"></a>
        </td>
        <td class="text-right price-total" id="total_${product_id}" data-total="${price*qty}">${formatMoney(price,0)}<sup>đ</sup></td>
    </tr>`;

    $("#detail-roder-modal table tbody").prepend(li);
}

// function updateQty($this, product_id){
//     cart = JSON.parse(localStorage.getItem('cart'));
//     let index = getIndexByProductIdAndPropertyId(cart, product_id);
//     cart[index].qty = $this.find(`#qty_${product_id}`).val();
//     $this.find(`#total_${product_id}`).attr('data-total', cart[index].price*cart[index].qty);
//     var sum = 0;
//
//     $("#detail-roder-modal table tbody .price-total").each(function () {
//         var priceTotal = parseInt($(this).attr('data-total'));
//         sum += priceTotal;
//     });
//     $('.cart-total .total-modal').html(formatMoney(sum,0));
//     localStorage.setItem("cart",JSON.stringify(cart));
//     // reset();
//     // init();
// }

// function updateCart(product_id){
//     var $this  = $(`#detail-roder-modal table tbody`);
//     var pattern = /^\d+$/;
//
//     if (parseInt($this.find(`#qty_${product_id}`).val()) <= 0 || !pattern.test($this.find(`#qty_${product_id}`).val())) {
//         $this.find(`#qty_${product_id}`).val(1);
//     }
//     updateQty($this, product_id);
// }

function totalPriceModal()
{
    var sum = 0;
    $("#detail-roder-modal table tbody .price-total").each(function () {
        var priceTotal = parseInt($(this).attr('data-total'));
        sum += priceTotal;
    });
    $('.cart-total .total-modal').html(formatMoney(sum,0))
}
