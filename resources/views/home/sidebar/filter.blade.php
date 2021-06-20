<div class="hst fadeIn"><div class="box_filter">
        <div class="btn-group">
            <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ isset($_GET['category']) ?  \Illuminate\Support\Str::upper($_GET['category']) : 'TÌM THEO THƯƠNG HIỆU' }}<span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                @if (!empty($productCategory))
                    @foreach($productCategory as $item)
                        @if ($item->parent_id == 0)
                            <li>
                                <a href="{{ route('home.search') .'?category='.$item->slug  }}">{{ \Illuminate\Support\Str::upper($item->name) }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="btn-group">
            <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ isset($_GET['sick']) ?  \Illuminate\Support\Str::upper($_GET['sick']) : 'TÌM THEO BỆNH' }}<span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                @if (!empty($disease))
                    @foreach($disease as $value)
                        <li>
                            <a href="{{ route('home.search') .'?sick='.$item->slug  }}">{{ \Illuminate\Support\Str::upper($value->name) }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="btn-group">
            <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TÌM THEO GIÁ<span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="gia-140-230.html">140.000 đ - 230.000 đ</a></li>
                <li><a href="gia-240-300.html">240.000 đ - 300.000 đ</a></li>
                <li><a href="gia-300-400.html">330.000 đ - 400.000 đ</a></li>
                <li><a href="lic.html">450.000 đ - 675.000 đ</a></li>
                <li><a href="gia-680-720.html">680.000 đ - 720.000 đ</a></li>
            </ul>
        </div>
    </div>
</div>
