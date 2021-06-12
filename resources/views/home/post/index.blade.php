@extends('home.layouts.app')

@section('title', __('News'))

@section('content')
@section('css')
<style>
    .page-wrapper, .grid-hero, .grid-hero__wrapp {
        height: auto !important;
    }
</style>
@endsection
<div class="page-wrapper page-news">
    {{-- Block hero --}}
    <div class="grid-hero" id="grid-hero">
        <div class="container">
            <div class="grid-hero-bg">
                <div class="row">
                    <div class="col-11 col-md-8 col-lg-6 col-lx-6">
                        <div class="grid-hero__wrapp" >
                            <div class="grid-hero__content">
                                <div class="box-hero">
                                    <h2 class="title" data-cms="{{app()->getLocale()}}-news-index-9">NEWS</h2>
                                    <h4 class="sub" data-cms="{{app()->getLocale()}}-news-index-10">Our thoughts on creativity, digital, and branding.</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid-news">
        <div class="container">
            <div class="masonry">
               @forelse($postList as $post)
                <div class="box-news">
                    <div class="box-images">
                        <a href="{{$post->href}}">
                            <img class="img-fluid" @src="{{$post->image}}" alt="{{$post->name}}">
                        </a>
                    </div>
                    <div class="box-content">
                        <h4 class="box-subtitle">
                            @php($category = $post->category->first())
                            <a href="javascript:void(0)" title="{{$category->name}}">{{$category->name}}</a>
                        </h4>
                        <h3 class="box-title">
                            <a href="{{$post->href}}" title="{{$post->name}}">{{$post->name}}</a>
                        </h3>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
            {{ $postList->links('home.includes.pagination') }}
        </div>
    </div>

    {{-- Block action --}}
    @include('home.includes.consultation')
</div>
@endsection
