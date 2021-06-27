<div class="footer full-width">
    <div class="background-footer"></div>
    <div class="background">
        <div class="shadow"></div>
        <div class="pattern">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 ">
                        <!-- Information -->
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 noleft">
                                <ul>
                                    @if (count($pageList))
                                        @foreach($pageList as $val)
                                            <li><a href="{{ route('home.page-slug', $val->slug) }}">{!! ucfirst($val->name) !!}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-4 noright">
                                <h4></h4>
                                <div class="strip-line"></div>
                                <table class="">
                                    <tbody>
                                    <tr>
                                        <td colspan="3">
                                            <a href="#">
                                                <img src="{{ url('/images/home/i-master.png') }}" alt="login">
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="box carousel-brands col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                            <!-- Carousel nav -->
                            <a class="next" href="#carousel1" id="carousel1_next"><span></span></a>
                            <a class="prev" href="#carousel1" id="carousel1_prev"><span></span></a>
                            <div class="box-heading">Đối tác</div>
                            <div class="strip-line"></div>
                            <div id="carousel1" class="owl-carousel owl-theme">
                                <div class="item text-center">
                                    <a href="">
                                        <img src="{{ url('/images/home/manufacturer/qik-f-182x52.p') }}ng" alt="Qik" class="img-responsive">
                                    </a>
                                </div>
                                <div class="item text-center">
                                    <a href="">
                                        <img src="{{ url('/images/home/manufacturer/logo-ritana-18') }}2x52.jpg" alt="RiTANA" class="img-responsive">
                                    </a>
                                </div>
                                <div class="owl-item">
                                    <div class="item text-center">
                                        <a href="">
                                            <img src="{{ url('/images/home/manufacturer/otiv-182x52.png') }}" alt="Otiv" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item">
                                    <div class="item text-center">
                                        <a href="">
                                            <img src="{{ url('/images/home/manufacturer/lic-182x52.png') }}" alt="Lic" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item">
                                    <div class="item text-center">
                                        <a href="">
                                            <img src="{{ url('/images/home/manufacturer/fn_sag-182x52.jpg') }}" alt="Angela Gold" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item">
                                    <div class="item text-center">
                                        <a href="">
                                            <img src="{{ url('/images/home/manufacturer/jexmax-182x52.png') }}" alt="JexMax" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item">
                                    <div class="item text-center">
                                        <a href="">
                                            <img src="{{ url('/images/home/manufacturer/fs_sap-182x52.jpg') }}" alt="Alipasplatinum" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item">
                                    <div class="item text-center">
                                        <a href="">
                                            <img src="{{ url('/images/home/manufacturer/hewel-182x52.png') }}" alt="Hewel" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item">
                                    <div class="item text-center">
                                        <a href="">
                                            <img src="{{ url('/images/home/manufacturer/wit-182x52.png') }}" alt="Wit" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item">
                                    <div class="item text-center">
                                        <a href="">
                                            <img src="{{ url('/images/home/manufacturer/faz-182x52.png') }}" alt="Fax" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right noright box-note" style="font-family:'Times New Roman'; margin-top:2px; font-size:12px; opacity:0.3;"><i>Thực phẩm bảo vệ sức khỏe. Thực phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh</i></div>
            </div>
        </div>
    </div>
</div>
