<div class="hst fadeIn">
    <div class="box box-with-categories hidden-xs">
        <div class="box-heading">Danh mục sản phẩm</div>
        <div class="strip-line"></div>
        <div class="box-content box-category ">
            <ul class="accordion " id="accordion-category">
                @if (!empty($productCategory))
                    @foreach($productCategory as $item)
                        <li class="panels">
                            <a href="#">{{ \Illuminate\Support\Str::upper($item->name) }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
