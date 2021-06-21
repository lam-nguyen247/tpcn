<div class="row">
    <div class="col-md-12 center-column " id="content">
        <div class="post">
            <div class="post-entry">
                @if (!empty($detailPost))
                    <h1 class="post-title">
                       {{ $detailPost->name }}
                    </h1>
                    {!! $detailPost->content !!}
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
            </div>
        </div>
    </div>
</div>
