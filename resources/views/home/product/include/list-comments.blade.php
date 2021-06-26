@if (count($commens))
    @foreach($commens as $val)
        <div class="review-list">
            <div class="author"><b>{{ $val->name }}</b> <span>{!! \Carbon\Carbon::parse($val->created_at)->format('d/m/Y') !!}</span></div>
            <div class="rating">
                <i class="fa fa-star {{ in_array($val->score, [1,2,3,4,5]) ? 'active' : '' }} "></i>
                <i class="fa fa-star {{ in_array($val->score, [1,2,3,4]) ? 'active' : '' }}"></i>
                <i class="fa fa-star {{ in_array($val->score, [1,2,3,]) ? 'active' : '' }}"></i>
                <i class="fa fa-star {{ in_array($val->score, [1,2,]) ? 'active' : '' }}"></i>
                <i class="fa fa-star {{ in_array($val->score, [1]) ? 'active' : '' }}"></i>
            </div>
            <div class="text">{{ $val->content }}</div>
        </div>
    @endforeach
    {!! $commens->render('home.includes.pagination') !!}
@endif
