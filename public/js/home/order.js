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
        }else{
            let li = `<tr id="item_${product_id}">
                  <td class="image">
                      <a href="${url}"><img src="${image}" alt="${title}" title="${title}"></a>
                  </td>
                  <td class="name">
                      <span class="quantity">1<span>&nbsp;x&nbsp;</span></span>
                      <a href="${url}">${title}</a>
                      <div>
                          <div class="price">${price}<sup>đ</sup></div>
                      </div>
                  </td>
                  <td class="remove"><a href="javascript:;" onclick="removeItem(${product_id});" title="Loại bỏ"></a></td>
              </tr>`;
            $(".mini-cart-info table tbody").prepend(li);
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
                          <div class="price">${price}<sup>đ</sup></div>
                      </div>
                  </td>
                  <td class="remove"><a href="javascript:;" onclick="removeItem(${product_id});" title="Loại bỏ"></a></td>
              </tr>`;
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
