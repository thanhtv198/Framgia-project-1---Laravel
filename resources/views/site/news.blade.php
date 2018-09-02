@extends('site/layouts/master')
@section('content')
    <!-- top Products -->
    <div class="ads-grid">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">
                {{ trans('common.home_page.news_detail') }}
                <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </h3>
            <div class="side-bar col-md-3" id="side-bar-cus">
                @include('site/layouts/sidebar')
            </div>
            <!-- product right -->
            <div class="agileinfo-ads-display col-md-9">
                <div class="wrapper" id="wrap-cus">
                    <!-- first section (nuts) -->
                    <div class="product-sec1">
                        <h3 class="heading-tittle">{{ $news->title }}</h3>
                        <br>
                        <div class="clearfix"></div>
                        <div class="image">
                            <img src="{{ url(config('app.newsUrl')) }}/{{ $news->avatar }}" id="news-image">
                        </div>
                        <div class="clearfix"></div>
                        <br><br>
                        <div id="news-content">
                            {!! $news->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

