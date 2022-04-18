<section class="contact-section">
    <div class="container">
        <div class="d-none d-sm-block mb-5 pb-4">

            {{--<div id="map" style="height: 480px; position: relative; overflow: hidden";></div>--}}

            <script>
                // Initialize and add the map
                function initMap() {
                    // The location of Uluru
                    const uluru = { lat: 36.364462, lng: 59.538447 };
                    // The map, centered at Uluru
                    const map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 4,
                        center: uluru,
                    });
                    // The marker, positioned at Uluru
                    const marker = new google.maps.Marker({
                        position: uluru,
                        map: map,
                    });
                }
            </script>
            <script
                src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly"
                async
            ></script>


        </div>


        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">@lang('messages.contact_us.contact_title')</h2>
            </div>
            <div class="col-lg-8">
                <form wire:submit.prevent="register" class="form-contact contact_form " id="">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea wire:model.defer="message" class="form-control w-100 style_rtl"  cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = '@lang('messages.contact_us.input.message')'" placeholder=" @lang('messages.contact_us.input.message')"></textarea>
                                @error('message') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input wire:model.defer="mobile" class="form-control valid style_rtl" type="tel" maxlength="11" onfocus="this.placeholder = ''" onblur="this.placeholder = '@lang('messages.contact_us.input.email')'" placeholder="@lang('messages.contact_us.input.mobile')">
                                @error('mobile') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input wire:model.defer="name" class="form-control valid style_rtl" type="text" maxlength="100" onfocus="this.placeholder = ''" onblur="this.placeholder = '@lang('messages.contact_us.input.name')'" placeholder="@lang('messages.contact_us.input.name')">
                                @error('name') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm boxed-btn">@lang('messages.contact_us.input.send')</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>@lang('messages.contact_us.address')</h3>
                        <p>@lang('messages.contact_us.address_second')</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3>@lang('messages.contact_us.tel')</h3>
                        <p>@lang('messages.contact_us.title_tel')</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3>@lang('messages.contact_us.mail')</h3>
                        <p>@lang('messages.contact_us.mail_title')</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{ mix('/js/app.js') }}"></script>
