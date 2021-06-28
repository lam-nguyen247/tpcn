@extends('home.layouts.app')

@section('title', "UC")
@section('description', null)
@section('css')
    <link href="/css/home/blog.css" rel="stylesheet">
    <style>
        .title_f a:before {
            margin-right: 7px !important;
        }
        .title_f a:after {
            margin-left: 7px !important;
        }
        .title_f a{
            display: flex;
        }
    </style>
@endsection

@section('breadcrumb')
    <div class="breadcrumb full-width">
        <div class="background-breadcrumb"></div>
        <div class="background">
            <div class="shadow"></div>
            <div class="pattern">
                <div class="container">
                    <div class="clearfix">
                        <ul>
                            <li class="item ">
                                <a href="/">Trang chủ</a>
                            </li>
                            @if (isset($page))
                                <li class="item ">
                                    <a href="{{ route('home.page-slug', $page->slug) }}">{!! ucfirst($page->name) !!}</a>
                                </li>
                            @endif
                            @if (isset($questionCategory))
                                <li class="item ">
                                    <a href="{{ route('home.group-post-category') }}">Tin Tức</a>
                                </li>
                                <li class="item ">
                                    <a href="{{ route('question.list-question').'/?search='.isset($_GET['search']) ? $_GET['search'] : '' }}">Hỏi về {!! isset($_GET['search']) ? ucfirst($_GET['search']) : '' !!}</a>
                                </li>
                            @endif
                            @if (isset($questionDetail))
                                <li class="item ">
                                    <a href="{{ route('home.group-post-category') }}">Tin Tức</a>
                                </li>
                                <li class="item ">
                                    <a href="{{ route('question.list-question').'/?search='. $questionDetail->productCategory->slug}}">Hỏi về {!! ucfirst($questionDetail->productCategory->name) !!}</a>
                                </li>
                                <li class="item ">
                                    <a href="{{ route('question.question-detail', $questionDetail->id)}}">{!! ucfirst($questionDetail->title) !!}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            <div class="row">
                                <div class="col-md-12 center-column " id="content">
                                    @includeWhen(isset($questionCategory), 'home.page.list-question')
                                    @includeWhen(isset($questionDetail), 'home.page.question-category-detail')
                                    @if (isset($page))
                                        {!! $page->content !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
