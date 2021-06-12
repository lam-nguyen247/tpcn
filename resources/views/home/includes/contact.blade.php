<div class="grid-contact" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="grid-contact__form">
                    <div class="grid-head">
                        <h2 class="title" data-cms="{{app()->getLocale()}}-includes-contact-195">NEED CONSULTANCY?</h2>
                        <div class="sapo">
                            <p data-cms="{{app()->getLocale()}}-includes-contact-197">Stop hesitating and increase your sales with YoutubeStore!</p>
                            <p><span data-cms="{{app()->getLocale()}}-includes-contact-199">Fill out our form below or</span> <a href="mailto:{{$config->email}}" target="_blank" data-cms="{{app()->getLocale()}}-includes-contact-200">send us an email</a><span data-cms="{{app()->getLocale()}}-includes-contact-201">.</span></p>
                        </div>
                    </div>
                    <form class="form js-form">
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="@lang('Full name')">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <input type="text" name="phone" class="form-control" placeholder="@lang('Phone number / Email')">
                            </div>
                            <div class="form-group col-12">
                                <textarea name="content" class="form-control" rows="8" placeholder="@lang('Tell us about your project')"></textarea>
                            </div>
                            <div class="form-group col-12">
                                <div class="btn-normal">
                                    <button class="btn button-submit" type="submit">
                                        <span class="btn-normal__title">@lang('Get Started')</span>
                                        <svg class="icon"><use xlink:href="#icon-arrow"></use></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
                <div class="grid-contact__img">
                    <img @src="/images/home/img-contact-form.png" alt="img contact form" data-cms="{{app()->getLocale()}}-includes-contact-218">
                </div>
            </div>
        </div>
    </div>
</div>
