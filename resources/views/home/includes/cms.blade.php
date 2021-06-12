{{--Put @cms after <title></title>--}}
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    [data-cms], [data-cms-background] {
        visibility: hidden;
    }

    [data-cms-clone] {
    }

    @auth
        [data-cms]:hover, [data-cms-background]:hover, [data-cms-listener]:hover {
        border: 1px dotted #3498db;
    }
    @endauth
</style>
{!! $config->css !!}
{!! $config->js !!}
<script src="/js/home/cms.min.js"></script>
@include('home.includes.language')
@auth
    <script src="/js/admin/cms.min.js"></script>
@endauth
