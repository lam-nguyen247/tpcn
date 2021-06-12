@extends('home.layouts.app')

@section('title', $page->name)

@section('content')
    <div class="page-wrapper new-detail">
        {{-- Block hero --}}
        <section class="tour" id="grid-hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 tour-content">
                        <h2>{{$page->name}}</h2>
                        {{-- <div>
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingSubTitle">
                                        <h5 class="mb-0 collapse-header">
                                            <button class="btn btn-link collapsed collapse-menu">
                                                <img @src="/images/home/burger.png" alt="burger icon" />
                                                <img @src="/images/home/triangle.png" alt="triangle icon" style="padding-top: 4px" />
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseSubtitle" class="collapse">
                                        <ul class="card-body collapse-content">
                                            <li><a href="#sub_1">Subtitle 1</a></li>
                                            <li><a href="#sub_2">Subtitle 2</a></li>
                                            <li><a href="#sub_3">Subtitle 3</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="tour-subtitle-wrapper wrapper-content">
                            {!!$page->content!!}
                            {{-- <h3 id="sub_1">Subtitle 1</h3>
                            <p>
                                Ultrices congue diam posuere mus ut ridiculus euismod. Pretium
                                nibh amet nisi, molestie nulla amet. Est posuere aliquam molestie
                                lorem orci elementum, posuere. A sit felis, aliquam proin. Sed sit
                                pretium at posuere. Vulputate odio non sit habitant duis leo
                                facilisis. Proin cras odio vitae lectus consequat et integer eget.
                                Tristique aliquet lobortis ac adipiscing urna. Tellus ipsum
                                aliquam consequat venenatis cras. In ut duis mauris ac
                                suspendisse.
                            </p>
                            <h3 id="sub_2">Subtitle 2</h3>
                            <p>
                                Molestie sem quis massa sem arcu tincidunt. Bibendum massa quisque
                                dolor faucibus amet, fringilla ultrices. Sed sollicitudin
                                sollicitudin phasellus bibendum parturient vel tortor, porttitor
                                adipiscing. Sit dui ac elit cras eget. Pellentesque faucibus amet
                                sapien, sed condimentum. Donec pulvinar nisl lorem id ut purus,
                                ligula. Volutpat maecenas facilisi in tincidunt auctor. Sit mauris
                                sit sit morbi turpis ultrices at. Aliquet amet lacus diam
                                pellentesque ac orci feugiat nec aliquam. Tincidunt eget nisl, ut
                                accumsan, mollis risus purus. Lorem id nunc leo, consectetur morbi
                                arcu enim. Tellus ullamcorper sed at vel aliquam id elit eget.
                                Bibendum neque, magna donec et consequat. Lorem lectus eget augue
                                enim volutpat fringilla nam.
                            </p>
                            <h3 id="sub_3">Subtitle 3</h3>
                            <p>
                                Tristique lectus aliquam nunc lacus et in vel. Nulla sit amet,
                                pellentesque urna lorem pulvinar. Volutpat dapibus sit amet aenean
                                arcu augue dui risus, ultrices. Mi rutrum in viverra nulla. Et
                                enim vel vitae nisl massa non integer tortor. Purus commodo,
                                neque, suspendisse volutpat pharetra consequat quis et. Lacinia
                                justo nunc etiam rhoncus. Aliquam sed eget bibendum nibh
                                suspendisse blandit elementum tincidunt at. Enim, quis in ante
                                cras leo ut. Quam libero sit at nam bibendum malesuada. Amet ut
                                pulvinar in id aliquam. Quis vestibulum, in id elementum dolor
                                lacus.
                            </p> --}}
                        </div>
                        <div class="tour-contact-wrapper">
                            <img @src="/images/home/full-red-circle.png" alt="circle" class="tour-contact-circle" />
                            <div>
                                <a href="/@lang('contact')" class="tour-contact-direct">@lang('Contact')</a>
                                <img @src="/images/home/arrow_forward_24px.png" alt="arrow direct" class="tour-contact-arrow" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 tour-list-item">
                        <h4 style="text-transform: uppercase">HOME / {{$page->name}}</h4>
                        <div class="tour-search-wrapper">
                            <img @src="/images/home/icon-search.png" alt="icon-search" class="tour-search-icon" />
                            <input type="text" name="search" id="search" placeholder="Search now" class="tour-search" />
                        </div>
                        <div class="tour-suggest-wrapper">
                            <h4>Gợi ý cho bạn</h4>
                            @foreach ($postList as $item)
                                <a href="{{$item->href}}" class="tour-suggest-item">
                                    <img @src="{{$item->image}}" alt="{{$item->name}}" class="tour-image-item" />
                                    <div>
                                        <h6 class="tour-suggest-title">{{$item->name}}</h6>
                                        <p class="tour-suggest-description">{{$item->excerpt}}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Block action --}}
        @include('home.includes.consultation')
    </div>

@endsection
