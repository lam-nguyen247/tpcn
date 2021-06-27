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
                                <a href="{{ route('home.index') }}">Trang chủ</a>
                            </li>
                            <li class="item ">
                                <a href="{{ route('home.question') }}">{!! ucfirst($page->name) !!}</a>
                            </li>
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
                                    {!! $page->content !!}
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
