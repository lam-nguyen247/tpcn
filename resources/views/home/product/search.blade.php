@extends('home.layouts.app')

@section('title', 'ECOGREEN')
@section('description', null)
@section('css')
    <link href="/css/home/settings.css" rel="stylesheet">
    <link href="/css/home/static-captions.css" rel="stylesheet">
    <link href="/css/home/dynamic-captions.css" rel="stylesheet">
    <link href="/css/home/captions.css" rel="stylesheet">
    <link href="/css/home/slider.css" rel="stylesheet">
@endsection

@section('breadcrumb')
@endsection

@section('content')
    <div class="main-content full-width home">
        <div class="background-content"></div>
        <div class="background">
            <div class="shadow"></div>
            <div class="pattern">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3" id="column_left">
                            @includeIf('home.sidebar.filter')
                            @includeIf('home.sidebar.register-memership')
                        </div>
                        <div class="col-md-9">
                            @includeIf('home.product.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="/js/home/jquery.themepunch.tools.min.js" crossorigin="anonymous"></script>
    <script src="/js/home/jquery.themepunch.revolution.min.js" crossorigin="anonymous"></script>
    <script src="/js/home/slide.js" crossorigin="anonymous"></script>
@endsection
