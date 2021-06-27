<div class="row">
    <div class="col-md-12 center-column " id="content">
        <div class="post">
            <div class="post-entry">
                @if (!empty($questionDetail))
                    <h1 class="post-title">
                        {!! $questionDetail->title !!}
                    </h1>
                    <div class="post-description">
                        {!! $questionDetail->question !!}
                    </div>
                    <div class="post-content">
                        {!! $questionDetail->answer !!}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
            </div>
        </div>
    </div>
</div>
