<div class="row">
    <div class="col-md-12 center-column " id="content">
        <div class="posts ">
            <h1 class="title_cat"><span>{{ count($postList) ? ($postList->first()->category()->first()->name ?? '') : '' }}</span></h1>
        </div>
        @if (count($postList))
            @foreach($postList as $val)
            <div class="post-content">
                <div class="post_box row">
                    <div class="col-xs-12 col-sm-4">
                        <a href="{{ route('home.detail-post', $val->id) }}" class="title" title="{{ $val->name }}">
                            <img alt="{{ $val->name }}" title="{{ $val->name }}" src="{{ url($val->image) }}">
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <h2 class="post-title">
                            <a href="{{ route('home.detail-post', $val->id) }}" class="title" title="{{ $val->name }}">
                                {{ $val->name }}
                            </a>
                        </h2>
                        <div class="post-description">
                            <p style="text-align: justify; ">
                                {!! shorter($val->content, 100) !!}
                            </p>
                        </div>
                        <a href="{{ route('home.detail-post', $val->id) }}" title="{{ $val->name }}" class=" more">Xem tiếp </a>
                    </div>
                    <div class="line_n"><span></span></div>
                </div>
            </div>
        @endforeach
        {!! $postList->appends(['categoryPost' => isset($_GET['categoryPost']) ? $_GET['categoryPost'] : ''])->render('home.includes.pagination') !!}
        @else
            <div>
                Không có sản phẩm thỏa điều kiện tìm kiếm.
            </div>
        @endif
    </div>
</div>
