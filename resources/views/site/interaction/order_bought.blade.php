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
                <h4>{{ trans('common.bought.your_product_bought') }}</h4>
                <div class="table-responsive">
                    <table class="timetable_sub">
                        <thead>
                        <tr>
                            <th>{{ trans('common.product.code') }}</th>
                            <th>{{ trans('common.product.total') }}</th>
                            <th>{{ trans('common.form.note') }}</th>
                            <th>{{ trans('common.form.date_order') }}</th>
                            <th>{{ trans('common.form.action') }}</th>
                        </tr>
                        </thead>
                        <tbody id="cart_table">
                        @foreach ( $orders as $row )
                            <tr class="rem1">
                                <td class="invert">{{ $row->id }}</td>
                                <td class="invert">
                                    <div class="info-product-price">
                                        <span class="item_price">{{ number_format($row->total) }}</span>
                                    </div>
                                </td>
                                <td class="invert">{{ $row->note }}</td>
                                <td class="invert">{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                <td class="invert">
                                    <div class="rem">
                                        <a href="{{ route('get_order_bought_detail', $row->id) }}">
                                            <i class="fa fa-eye" aria-hidden="true"></i></a> |
                                        <a href="{{ route('delete_order_bought', $row->id) }}" class="delete" onclick="deleteSold(this)">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection

