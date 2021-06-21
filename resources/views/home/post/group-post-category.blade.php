<div class="row">
    <div class="col-md-12 center-column " id="content">
        <div class="col-xs-12">
            @if (count($groupPostCategory))
                @foreach($groupPostCategory->chunk(2) as $category)
                    <div class="row">
                        @foreach($category as $k => $val)
                            <div class="col-xs-12 col-sm-6 catid_62 item-cat cat_home{{++$k}}">
                                <div class="boxs1">
                                    <div class="box_imgs">
                                        <a title="{{ $val->name }}" href="{{ route('home.category-post').'/?categoryPost='.$val->slug }}" class="tit_cat"><h3>{{ $val->name }}</h3></a>
                                        <a href="{{ route('home.category-post').'/?categoryPost='.$val->slug }}" class="imgs">
                                            <img src="{{ $val->banner ? asset($val->banner) : defaultImage() }}">
                                        </a>
                                    </div>
                                </div>
                                @if (count($val->postList))
                                    @foreach($val->postList as $key => $item)
                                        @if ($key < 5)
                                            <div class="boxs{{++$key}}">
                                                <a href="{{ route('home.detail-post', $item->id) }}"
                                                   class="title" title="{{ $item->name }}">
                                                    {{ $item->name }}
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
