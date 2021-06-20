@extends('home.layouts.app')

@section('title', 'Sức Khỏe')
@section('description', null)
@section('css')
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
                        <div class="col-sm-12">
                            <a href="chu-de-suc-khoe.html" title="blog">
                                <img src="image/catalog/blog/blog.jpg" style="margin:0px 0 25px;" alt="banner">
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3" id="column_left">
                            @includeIf('home.sidebar.filter')
                            @includeIf('home.sidebar.category-post')
                            @includeIf('home.sidebar.register-memership')
                        </div>
                        <div class="col-md-9">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
