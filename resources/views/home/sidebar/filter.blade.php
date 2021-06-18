<div class="hst fadeIn"><div class="box_filter">
        <div class="btn-group">
            <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TÌM THEO THƯƠNG HIỆU <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                @if (!empty($productCategory))
                    @foreach($productCategory as $item)
                        <li>
                            <a href="#">{{ \Illuminate\Support\Str::upper($item->name) }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="btn-group">
            <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TÌM THEO BỆNH<span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a href="sinh-ly-nu.html">SỨC KHỎE PHỤ NỮ</a>
                </li>
                <li><a href="sinh-ly-nu.html">TĂNG CƯỜNG SINH LÝ NỮ </a></li>
                <li><a href="sinh-ly-nu.html">CHĂM SÓC DA LÃO HÓA</a></li>
                <li><a href="sinh-ly-nu.html">TIỀN MÃN KINH - MÃN KINH</a></li>
                <li><a href="Qik-nu.html">RỤNG TÓC - HÓI ĐẦU</a></li>
                <li><a href="sinh-ly-nu.html">PHÒNG LOÃNG XƯƠNG</a></li>
                <li><a href="alipas-moi.html">SỨC KHỎE NAM GIỚI</a></li>
                <li><a href="alipas-moi.html">TĂNG CƯỜNG SINH LÝ NAM</a></li>
                <li><a href="alipas-moi.html">VÔ SINH, HIẾM MUỘN</a></li>
                <li><a href="lic.html">GIẢM CÂN AN TOÀN</a></li>
                <li><a href="lic.html">GIẢM MỠ BỤNG, ĐÙI</a></li>
                <li><a href="lic.html">GIỮ GÌN VÓC DÁNG</a></li>
                <li><a href="xuong-chac-khoe.html">THOÁI HÓA KHỚP</a></li>
                <li><a href="xuong-chac-khoe.html">VIÊM KHỚP</a></li>
                <li><a href="xuong-chac-khoe.html">ÐAU NHỨC XƯƠNG KHỚP</a></li>
                <li><a href="xuong-chac-khoe.html">THOÁI HÓA CỘT SỐNG </a></li>
                <li><a href="bao-ve-gan.html">GIẢI ĐỘC GAN</a></li>
                <li><a href="bao-ve-gan.html">BẢO VỆ GAN KHỎE </a></li>
                <li><a href="bao-ve-gan.html">GAN NHIỄM MỠ</a></li>
                <li><a href="bao-ve-gan.html">PHÒNG VIÊM GAN</a></li>
                <li><a href="bao-ve-gan.html">NGỪA XƠ GAN, UNG THƯ GAN</a></li>
                <li><a href="tang-cuong-tri-nho.html">ÐAU ĐẦU - ĐAU NỬA ĐẦU</a></li>
                <li><a href="tang-cuong-tri-nho.html">MẤT NGỦ - KHÓ NGỦ</a></li>
                <li><a href="tang-cuong-tri-nho.html">PHÒNG NGỪA ĐỘT QUỴ</a></li>
                <li><a href="tang-cuong-tri-nho.html">SUY GIẢM TRÍ NHỚ - HAY QUÊN</a></li>
                <li><a href="bao-ve-mat.html">MỜ, NHỨC, MỎI, KHÔ MẮT</a></li>
                <li><a href="bao-ve-mat.html">BỆNH VỀ VÕNG MẠC</a></li>
                <li><a href="bao-ve-mat.html">ÐỤC THỦY TINH THỂ</a></li>
                <li><a href="bao-ve-mat.html">CÁC TẬT KHÚC XẠ</a></li>
                <li><a href="giam-mo-mau.html">ÐIỀU HÒA MỠ MÁU</a></li>
                <li><a href="giam-mo-mau.html">TĂNG HUYẾT ÁP</a></li>
                <li><a href="giam-mo-mau.html">PHÒNG BỆNH TIM MẠCH</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TÌM THEO GIÁ<span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="gia-140-230.html">140.000 đ - 230.000 đ</a></li>
                <li><a href="gia-240-300.html">240.000 đ - 300.000 đ</a></li>
                <li><a href="gia-300-400.html">330.000 đ - 400.000 đ</a></li>
                <li><a href="lic.html">450.000 đ - 675.000 đ</a></li>
                <li><a href="gia-680-720.html">680.000 đ - 720.000 đ</a></li>
            </ul>
        </div>
    </div>
</div>
