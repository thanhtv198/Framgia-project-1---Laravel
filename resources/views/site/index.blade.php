@extends('site/layouts/master')
@section('content')
    @include('site/layouts/banner')
    <!-- top Products -->
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
            <div class="side-bar col-md-4" id="side-bar-cus">
                @include('site/layouts/sidebar')
            </div>
            <!-- product right -->
            <div class="agileinfo-ads-display col-md-9">
                <div class="wrapper" id="wrap-cus">
                    <!-- first section (nuts) -->
                    <div class="product-sec1">
                        <h3 class="heading-tittle">{{ trans('common.home_page.title11') }}</h3>
                        @foreach($new_products as $row)
                            <div class="col-md-4 product-men">
                                <div class="men-pro-item simpleCart_shelfItem box-pro">
                                    <div class="men-thumb-item">
                                        <img src="{{ url(config('app.productUrl')) }}/{{$row->id}}/{{ $row->images[0]['image'] }}"
                                             alt="{{ $row->name }}  " class="pro_img">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{ route('detail_product', $row->id) }}"
                                                   class="link-product-add-cart">
                                                    {{ trans('common.home_page.view_product') }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="compare_count">
                                            <a href="{{ route('add_compare', $row->id) }}" onclick="addCompare()"
                                               class="product-new-top fa fa-balance-scale" id="compare"></a>
                                        </div>
                                    </div>
                                    <div class="item-info-product ">
                                        <h4>
                                            <a href="{{ route('detail_product', $row->id) }}">{{ $row->name }}</a>
                                        </h4>
                                        <div class="info-product-price">
                                            @php $price_new = $row->price - $row->promotion @endphp
                                            @if ($row->promotion > 0)
                                                <span class="item_price">{{ number_format($price_new) }}đ</span>
                                                <del>{{ number_format($row->price) }}đ</del>
                                            @else
                                                <span class="item_price">
                                                    {{ number_format($price_new) }}đ
                                                </span>
                                            @endif
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
                            {{ $new_products->links() }}
                        </div>
                    </div>
                    <!-- second section (nuts special) -->
                    <div class="product-sec1 product-sec2">
                        <div class="col-xs-7 effect-bg">
                            <h3 class="">{{ trans('common.home_page.title12') }}</h3>
                            <h6>{{ trans('common.home_page.title13') }}</h6>
                            <p>{{ trans('common.home_page.title14') }}</p>
                        </div>
                        <div class="col-xs-5 bg-right-nut">
                            <img src="" alt="">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- //second section (nuts special) -->
                    <div class="product-sec1">
                        <h3 class="heading-tittle">{{ trans('common.home_page.title22') }}</h3>
                        @foreach($viewsProducts as $row)
                            <div class="col-md-4 product-men">
                                <div class="men-pro-item simpleCart_shelfItem box-pro">
                                    <div class="men-thumb-item">
                                        <img src="{{ url(config('app.productUrl')) }}/{{$row->id}}/{{ $row->images[0]['image'] }}"
                                             alt="{{ $row->name }}  " class="pro_img">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href=" {{ route('detail_product', $row->id) }}"
                                                   class="link-product-add-cart">
                                                    {{ trans('common.home_page.view_product') }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="compare_count">
                                            <a href="{{ route('add_compare', $row->id) }}" onclick="addCompare()"
                                               class="product-new-top fa fa-balance-scale" id="compare"></a>
                                        </div>
                                    </div>
                                    <div class="item-info-product ">
                                        <h4>
                                            <a href="{{ route('detail_product', $row->id) }}">{{ $row->name }}</a>
                                        </h4>
                                        <div class="info-product-price">
                                            @php $priceNew = $row->price - $row->promotion @endphp
                                            @if ($row->promotion > 0)
                                                <span class="item_price">{{ number_format($priceNew) }}đ</span>
                                                <del>{{ number_format($row->price) }}đ</del>
                                            @else
                                                <span class="item_price">
                                                    {{ number_format($priceNew) }}đ
                                                </span>
                                            @endif
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
                        </div>
                    </div>
                    <!-- //fourth section (noodles) -->
                </div>
            </div>
        </div>
    </div>
@endsection

