<div class="custom-footer full-width">
    <div class="background-custom-footer"></div>
    <div class="background">
        <div class="shadow"></div>
        <div class="pattern">
            <div class="container">
                @if (isset($banner[0]) && !is_null($banner[0]))
                <a href="#" target="_blank">
                    <img src="{{isset($banner[0]) ? url($banner[0]->image) : ''}}" alt="banner">
                </a>
                @endif
                <div class="col-xs-12 col-sm-8 home_news noleft">
                    <div class="box blog-module box-no-advanced">
                        <div class="box-heading">Thông tin mới</div>
                        <div class="strip-line"></div>
                        <div class="box-content">
                            <div class="news v2 row">
                                @if (count($postNew))
                                    @foreach($postNew as $val)
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="article_media">
                                                <div class="thumb-article">
                                                    <a class="article_img" title="{{ $val->name }}" href="{{ $val->name }}">
                                                        <img width="100%" height="auto" alt="" src="{{ !is_null($val->image) ? url($val->image) : defaultImage() }}">
                                                    </a>
                                                </div>
                                                <div class="article-body">
                                                    <div class="content_p">
                                                        <div><a class="article_title" title="{{ $val->name }}"
                                                                href="{{ route('home.detail-post', $val->id) }}">{{ $val->name }}</a></div>
                                                        <div class="article_description">{{ $val->sort_description }}</div>
                                                        <a class="article_more" title="{{ $val->name }}" href="{{ route('home.detail-post', $val->id) }}">Xem tiếp </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 noright box_face">
                    <h4>FOLLOW FANPAGE ĐỂ CÓ NHIỀU THÔNG TIN HƠN</h4>
                    <div class="strip-line"></div>
                    <div class="fb-page" data-href="https://www.facebook.com/HealthyLifeEcogreen/" data-tabs="timeline" data-width="375" data-height="375" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/HealthyLifeEcogreen/" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/HealthyLifeEcogreen/">Ecogreen - Nhà thuốc Online</a>
                        </blockquote>
                    </div>
                </div>
                <div class="row vv"></div>
                <div class="home_bottom_box">
                    <div class="box blog-module box-no-advanced">
                        <div class="box-heading">Blog sức khỏe</div>
                        <div class="strip-line"></div>
                        <div class="box-content">
                            <div class="news v2 row">
                                @if (count($post))
                                    @foreach($post as $val)
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="pop_home row">
                                                <div class="col-xs-5 col-sm-5 noright">
                                                    <a class="pop_img" title="{{ $val->name }}" href="{{ route('home.detail-post', $val->id) }}">
                                                        <img alt="" src="{{ url($val->image) }}">
                                                    </a>
                                                </div>

                                                <div class="col-xs-7 col-sm-7 noleft">
                                                    <a class="article_title"
                                                       title="{{ $val->name }}" href="{{ route('home.detail-post', $val->id) }}">{{ $val->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
