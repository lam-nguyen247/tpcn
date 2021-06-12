@extends('home.layouts.app')

@section('title', __('Contact'))

@section('content')
<div class="page-wrapper page-contact">
    {{-- Block contact --}}
    <div class="grid-contact" id="grid-hero">
        <div class="container">
            <div class="grid-head">
                <h2 class="title" data-cms="{{app()->getLocale()}}-contact-index-4">Hi. Please tell us <br> about your request!</h2>
                <div class="sapo">
                    <p data-cms="{{app()->getLocale()}}-contact-index-6">Fill out our form below or send us an email.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="grid-contact__form">
                        <form class="form js-form">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="" data-cms="{{app()->getLocale()}}-contact-index-13">Company name</label>
                                    <input required type="text" name="company" class="form-control">
                                </div>
                                <div class="form-group col-12">
                                    <label for="" data-cms="{{app()->getLocale()}}-contact-index-16">Your name</label>
                                    <input required type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group col-12">
                                    <label for="" data-cms="{{app()->getLocale()}}-contact-index-19">Phone number</label>
                                    <input required type="number" name="phone" class="form-control">
                                </div>
                                <div class="form-group col-12">
                                    <label for="" data-cms="{{app()->getLocale()}}-contact-index-22">Email address</label>
                                    <input required type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group col-12">
                                    <label for="" data-cms="{{app()->getLocale()}}-contact-index-25">Tell us about your request</label>
                                    <textarea name="content" class="form-control" rows="8"></textarea>
                                </div>
                                <div class="form-group col-12">
                                    <div class="btn-normal">
                                        <button class="btn button-submit" type="submit">
                                            <span class="btn-normal__title" data-cms="{{app()->getLocale()}}-contact-index-30">GET started</span>
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
                        <img @src="/images/home/img-contact-form.png" alt="img contact form" data-cms="{{app()->getLocale()}}-contact-index-35">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Block action --}}
    @include('home.includes.consultation')
</div>
@endsection
