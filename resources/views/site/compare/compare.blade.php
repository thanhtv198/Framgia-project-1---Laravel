@extends('site/layouts/master')
@section('content')
    <div view="compare">
        <div class="main">
            <h1>{{ trans('common.tag.compare_product') }}</h1>
            @include('site.notice')
            <div class="products">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>{{ trans('common.product.name') }}</th>
                        <th><a href="{{ route('detail_product', $products[0]->id) }}">{{  $products[0]->name }}</a></th>
                        <th><a href="{{ route('detail_product', $products[1]->id) }}">{{  $products[1]->name }}</a></th>
                    </tr>
                    </thead>
                    <tr>
                        <td>{{ trans('common.product.image') }}</td>
                        <td>
                            <img src="{{ url(config('app.productUrl')) }}/{{ $products[0]['id'] }}/{{ $image0['image'] }}"
                                 width="200px" height="250px">
                        </td>
                        <td>
                            <img src="{{ url(config('app.productUrl')) }}/{{ $products[1]['id'] }}/{{ $image1['image'] }}"
                                 width="200px" height="250px">
                        </td>
                    </tr>
                    <tr>
                        <td>{{ trans('common.product.screen') }}</td>
                        <td>{{ $products[0]->screen }}</td>
                        <td>{{ $products[1]->screen }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('common.product.os') }}</td>
                        <td>{{ $products[0]->os }}</td>
                        <td>{{ $products[1]->os }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('common.product.front_camera') }}</td>
                        <td>{{ $products[0]->front_camera }}</td>
                        <td>{{ $products[1]->front_camera }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('common.product.back_camera') }}</td>
                        <td>{{ $products[0]->back_camera }}</td>
                        <td>{{ $products[1]->back_camera }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('common.product.cpu') }}</td>
                        <td>{{ $products[0]->cpu }}</td>
                        <td>{{ $products[1]->cpu }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('common.product.ram') }}</td>
                        <td>{{ $products[0]->ram }}</td>
                        <td>{{ $products[1]->ram }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('common.product.memory') }}</td>
                        <td>{{ $products[0]->memory }}</td>
                        <td>{{ $products[1]->memory }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('common.product.sim') }}</td>
                        <td>{{ $products[0]->sim }}</td>
                        <td>{{ $products[1]->sim }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('common.product.battery') }}</td>
                        <td>{{ $products[0]->battery }}</td>
                        <td>{{ $products[1]->battery }}</td>
                    </tr>
                    @if(isset($products[0]->customizeProducts))
                        <tr>
                            <td>{{ __('More Information') }}</td>
                            <td>
                                @foreach($products[0]->customizeProducts as $p)
                                    {{ json_decode($p->property) }}: {{ $p->detail }}<br>
                                @endforeach
                            </td>
                            <td>
                                @foreach($products[1]->customizeProducts as $p)
                                    {{ json_decode($p->property) }}: {{ $p->detail }}<br>
                                @endforeach
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td>{{ trans('common.product.address_sell') }}</td>
                        <td>{{ $products[0]->user->local->name . ', '. $products[0]->user->address }}</td>
                        <td>{{ $products[1]->user->local->name . ', '. $products[1]->user->address }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('common.product.action') }}</td>
                        <td>
                            <div class="line">
                                <div class="product-icon-container" id="cart_compare">
                                    <a href="{{ route('add_cart', $products[0]->id) }}" onclick="addToCart()">
                                        <button class="btn btn-info"
                                                id="btn-cart">{{ trans('common.button.add_cart') }}</button>
                                    </a>
                                </div>
                                <a href="{{ route('delete_compare', $rowId[0]) }}">
                                    <button class="btn btn-danger">{{ trans('common.button.remove') }}</button>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="line">
                                <div class="product-icon-container" id="cart_compare">
                                    <a href="{{ route('add_cart', $products[1]->id) }}" onclick="addToCart()">
                                        <button class="btn btn-info"
                                                id="btn-cart">{{ trans('common.button.add_cart') }}</button>
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('delete_compare', $rowId[1]) }}">
                                        <button class="btn btn-danger">{{ trans('common.button.remove') }}</button>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <thead>
                </table>
            </div>
        </div>
    </div>
@endsection

