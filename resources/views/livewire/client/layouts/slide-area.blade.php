<!-- slider_area_start -->
@if(request()->is('/'))
<div class="slider_area">
    <div class="single_slider slider_bg_1 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="slider_text">
                        <h3>@lang('messages.slide-area.we_care') <br> <span>@lang('messages.slide-area.your_pets')</span></h3>
                        <p class="col-md-12">@lang('messages.slide-area.main_text_first') <br> <span class="font-weight-bold">@lang('messages.slide-area.main_text_second')</span> </p>
                        <a href="{{ route('client.contact_us') }}" class="boxed-btn4" style="margin-left: 6rem;">@lang('messages.slide-area.contact_us')</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="dog_thumb d-none d-lg-block">
            <img src="client/img/banner/dog.png" alt="">
        </div>
    </div>
</div>
@elseif(request()->is('contact-us'))
    <div class="bradcam_area breadcam_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcam_text text-center">
                        <h3>@lang('messages.slide-area.contact')</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- slider_area_end -->
