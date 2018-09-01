@extends('site/layouts/master')
@section('content')
    @include('site/layouts/banner')
    @include('site/notice')
    <div class="ads-grid">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">
                {{ trans('common.home_page.head') }}
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
                        <h3 class="heading-tittle">{{ trans('common.home_page.search_result') }}</h3>
                        <hr>
                        <div>
                            <span>{{ trans('common.home_page.result_quantity') }}({{ count($products) }})</span>
                        </div>
                        @foreach($products as $row)
                            <div class="col-md-4 product-men">
                                <div class="men-pro-item simpleCart_shelfItem box-pro">
                                    <div class="men-thumb-item">
                                        <img src="{{ url(config('app.productUrl')) }}/{{$row->id}}/{{ $row->images[0]['image'] }}" alt="{{ $row->name }}  " class="pro_img">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{ route('detail_product', $row->id) }}" class="link-product-add-cart">
                                                    {{ trans('common.home_page.view_product') }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="compare_count">
                                            <a href="{{ route('add_compare', $row->id) }}" onclick="addCompare()" class="product-new-top fa fa-balance-scale" id="compare"></a>
                                        </div>
                                    </div>
                                    <div class="item-info-product ">
                                        <h4>
                                            <a href="{{ route('detail_product', $row->id) }}">{{ $row->name }}</a>
                                        </h4>
                                        <div class="info-product-price">
                                            <span class="item_price">{{ number_format($row->price) }}đ</span>
                                            <del>{{ number_format($row->promotion) }}đ</del>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                            <div class="product-icon-container">
                                                <a href="{{ route('add_cart', $row->id) }}" onclick="addToCart()">
                                                    {{ Form::submit(trans('common.button.add_cart'), ['class' => 'button']) }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="clearfix"></div>
                        <div align="center">
                            @if(count($products) > 0)
                            {{ $products->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

