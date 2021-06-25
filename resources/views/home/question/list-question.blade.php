<h2 class="title_faq"><span>Gửi câu hỏi của bạn</span></h2>
<div id="accordion" class="panel-group" role="tablist" aria-multiselectable="true">
    @if (count($questions))
        @foreach($questions as $key => $val)
            @if ($key == 0)
                <div class="panel panel-default_">
                    <h4 id="head1" class="panel-heading_ title_f" role="tab">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#faq{{$key}}" aria-expanded="true" aria-controls="faq1">
                            {!! $val->question !!}
                        </a>
                    </h4>
                    <div class="panel-collapse collapse in" id="faq{{$key}}">
                        <div class="panel-body">
                            <div class="answer_ques">
                                {!! $val->answer !!}
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="panel panel-default_">
                    <h4 id="head1" class="panel-heading_ title_f" role="tab">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#faq{{$key}}" aria-expanded="true" aria-controls="faq2">
                            {!! $val->question !!}
                        </a>
                    </h4>
                    <div class="panel-collapse collapse " id="faq{{$key}}">
                        <div class="panel-body">
                            <div class="answer_ques">
                                {!! $val->answer !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
</div>
