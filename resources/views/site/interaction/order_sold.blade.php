@extends('site/layouts/master')
@section('content')
    <section class="content-header">
        @include('site/notice')
    </section>
    <div class="privacy">
        <div class="container" view="cart">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">
                {{ trans('common.sold.order_sold') }}
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
                            <th>{{ trans('common.product.code') }}</th>
                            <th>{{ trans('common.form.name') }}</th>
                            <th>{{ trans('common.form.email') }}</th>
                            <th>{{ trans('common.form.phone_number') }}</th>
                            <th>{{ trans('common.form.address') }}</th>
                            <th>{{ trans('common.product.product') }}</th>
                            <th>{{ trans('common.product.qty') }}</th>
                            <th>{{ trans('common.product.price') }}</th>
                            <th>{{ trans('common.product.created_at') }}</th>
                            <th>{{ trans('common.form.status') }}</th>
                            <th>{{ trans('common.form.action') }}</th>
                        </tr>
                        </thead>
                        <tbody id="cart_table">
                        @foreach ($orderdetails as $row)
                            <tr class="rem1">
                                <td class="invert">{{ $row->id }}</td>
                                <td class="invert">{{ $row->order->name }}</td>
                                <td class="invert">{{ $row->order->email }}</td>
                                <td class="invert">{{ $row->order->phone_number }}</td>
                                <td class="invert">{{ $row->order->address . ", " . $row->order->local->name }}</td>
                                <td class="invert"><a href="{{ route('detail_product', $row->id) }}">{{ $row->product->name }}</a></td>
                                <td class="invert">{{ $row->quantity }}</td>
                                <td class="invert">
                                    <span class="item_price" id="pendding">{{ number_format($row->price) }}  </span>
                                </td>
                                <td class="invert">
                                    {{ date('d-m-Y', strtotime($row->created_at)) }}
                                    <h6>{{ $row->created_at->diffForHumans() }}</h6>
                                </td>
                                <td class="invert">
                                    @if ($row->status == 0)
                                        <span>
                                            <a href="{{ route('handle_sold', $row->id) }}" id="pendding">
                                                {{ trans('common.respond.handle_now') }}
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
                                <td class="invert">
                                    <div class="rem">
                                        <a href="{{ route('delete_order_sold', $row->id) }}" class="delete delele-order"
                                           onclick="deleteSold(this)">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                    <br>
                    <div class="export">
                        <a href="{{ route('export') }}" class="btn btn-info export" id="export-button">
                            {{ trans('common.sold.export') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection

