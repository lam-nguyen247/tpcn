<div class="hst fadeIn"><div class="box blog-module blog-categories">
        <div class="box-heading"></div>
        <div class="strip-line"></div>
        <div class="box-content box-category">
            <ul class="accordion" id="accordion-category">
                <li class="lbl">Các vấn đề sức khỏe<br>cần quan tâm</li>
                @if(!empty($categoryPost))
                    @foreach($categoryPost as $item)
                        <li class="panels">
                            <a href="#">{{ $item->name }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
