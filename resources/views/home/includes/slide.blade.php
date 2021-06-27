<div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:350px;">
    <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;max-height:350px;height:350px;">
        <ul>
            @if (count($slide))
                @foreach($slide as $val)
                        <!-- SLIDE  -->
                        <li data-transition="random" data-slotamount="7" data-masterspeed="300" data-link="{{ $val->url  }}"   data-saveperformance="off" >
                            <!-- MAIN IMAGE -->
                            <img src="{{ $val->image ? url($val->image) : defaultImage() }}"  alt="sap-3t1"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                            <!-- LAYERS -->
                        </li>
                @endforeach
            @endif
        </ul>
        <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
    </div>
</div><!-- END REVOLUTION SLIDER -->
