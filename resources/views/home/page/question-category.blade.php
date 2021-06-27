@extends('home.layouts.app')

@section('title', "UC")
@section('description', null)
@section('css')
    <link href="/css/home/blog.css" rel="stylesheet">
    <style>
        .box_imgs .tit_cat h3{
            color: #fff !important;
            padding : 0px !important;
        }
        .margin-mage {
            margin-top: -80px;
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
                                <a href="{{ route('home.group-post-category') }}">Tin Tức</a>
                            </li>
                            <li class="item ">
                                <a href="{{ route('question.question-often') }}">Câu Hỏi Thường Gặp</a>
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
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="#" title="blog">
                                    <img src="{{ isset($banner[1]) ? url($banner[1]->image) : '' }}" style="margin:0px 0 25px;" alt="banner">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3" id="column_left">
                            @includeIf('home.sidebar.filter')
                            @includeIf('home.sidebar.register-memership')
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12 center-column " id="content">
                                    <div class="row">
                                        <div class="col-md-12 center-column " id="content">
                                            <div class="col-xs-12">
                                                @if (count($questions))
                                                    @foreach($questions->chunk(2) as $question)
                                                        <div class="row">
                                                            @foreach($question as $k => $val)
                                                                <div class="col-xs-12 col-sm-6 catid_62 item-cat cat_home{{++$k}}">
                                                                    <div class="boxs1">
                                                                        <div class="box_imgs">
                                                                            <a title="{{ $val->name }}" href="{{ route('question.list-question').'/?search='.$val->slug }}" class="tit_cat"><h3>{{ 'Hỏi về ' .$val->name }}</h3></a>
                                                                            <a href="{{ route('question.list-question').'/?search='.$val->slug }}" class="imgs">
                                                                                <img class="{{ $val->banner ?  "" : 'margin-mage'}} " src="{{ $val->banner ? asset($val->banner) : defaultImage() }}">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    @if (count($val->question))
                                                                        @foreach($val->question as $key => $item)
                                                                            @if ($key < 5)
                                                                                <div class="boxs{{++$key}}">
                                                                                    <a href="{{ route('question.question-detail', $item->id)}}"
                                                                                       class="title" title="{!! $item->title !!} ">
                                                                                        {!! $item->title !!}
                                                                                    </a>
                                                                                </div>
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>

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
