<div class="row">
    <div class="col-md-12 center-column " id="content">
        <div class="posts ">
            <h1 class="title_cat"><span>Hỏi về {!! isset($_GET['search']) ? ucfirst($_GET['search']) : '' !!}</span></h1>
        </div>
        @if (count($questionCategory))
            @foreach($questionCategory as $val)
                <div class="post-content">
                    <div class="post_box row">
                        <div class="col-xs-12 col-sm-4">
                            <a href="{{ route('question.question-detail', $val->id)}}" class="title" title="{!! $val->title !!}">
                                <img src="{{ $val->image ? asset($val->image) : defaultImage() }}">
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                            <h2 class="post-title">
                                <a href="{{ route('question.question-detail', $val->id)}}" class="title" title="{!! $val->title !!}">
                                    {!! $val->title !!}
                                </a>
                            </h2>
                            <div class="post-description">
                                <p style="text-align: justify; ">
                                    {!! $val->question !!}
                                </p>
                            </div>
                            <a href="{{ route('question.question-detail', $val->id)}}" title="{!! $val->title !!}" class=" more">Xem tiếp </a>
                        </div>
                        <div class="line_n"><span></span></div>
                    </div>
                </div>
            @endforeach
            {!! $questionCategory->appends(['search' => isset($_GET['search']) ? $_GET['search'] : ''])->render('home.includes.pagination') !!}
        @else
            <div>
                Không có sản phẩm thỏa điều kiện tìm kiếm.
            </div>
        @endif
    </div>
</div>
