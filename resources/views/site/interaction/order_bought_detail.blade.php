@extends('site/layouts/master')
@section('content')
    <section class="content-header">
        @include('site/notice')
    </section>
    <div class="privacy">
        <div class="container" view="cart">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">
                {{ trans('common.bought.order_bought') }}
                <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
            </h3>
            <div class="checkout-right">
                <h4>{{ trans('common.sold.your_product_sold') }}</h4>
                <div class="table-responsive">
                    <table class="timetable_sub">
                        <thead>
                        <tr>
                            <th>{{ trans('common.product.order_id') }}</th>
                            <th>{{ trans('common.product.name') }}</th>
                            <th>{{ trans('common.product.qty') }}</th>
                            <th>{{ trans('common.product.price_one') }}</th>
                            <th>{{ trans('common.form.status') }}</th>
                        </tr>
                        </thead>
                        <tbody id="cart_table">
                        @foreach ($orderdetails as $row)
                            <tr class="rem">
                                <td class="invert">{{$row->order_id}}</td>
                                <td class="invert"><a href="{{ route('detail_product', $row->id) }}">{{ $row->product->name }}</a></td>
                                <td class="invert">{{$row->quantity}}</td>
                                <td class="invert">
                                    <div class="info-product-price">
                                        <span class="item_price">{{number_format($row->price)}}  </span>
                                    </div>
                                </td>
                                <td class="invert">
                                    @if ($row->status == 0)
                                        <span id="pendding">
                                            {{ trans('common.respond.uncheck') }}
                                        </span>
                                    <br>
                                        <span>
                                            <a href="{{ route('cancel', $row->id) }}">
                                                {{ __('Cancel order') }}
                                            </a>
                                        </span>
                                    @elseif ($row->status == 1)
                                        <i class="fa fa-check-circle">
                                            {{ trans('common.respond.handled') }}
                                        </i>
                                    @elseif ($row->status == 2)
                                        <i class="fa fa-remove" id="pendding">
                                            {{ __('Order is Canceled') }}
                                        </i>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
@endsection