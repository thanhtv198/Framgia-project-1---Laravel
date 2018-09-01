@extends('site/layouts/master')
@section('content')
    <section class="content-header">
        @include('site/notice')
    </section>
    <section class="content">
        <div class="privacy">
            <div view="sell" class="container" >
                <!-- tittle heading -->
                <h3 class="tittle-w3l">
                    {{ trans('common.sell.your_product') }}
                    <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
                </h3>
                <!-- //tittle heading -->
                <div class="checkout-right">
                    <h4>
                        {{ trans('common.sell.your_sold') }}
                        <a href="{{ route('sell.create') }}">
                            <span class="fa fa-plus-square" id="plus"></span>
                        </a>
                    </h4>
                    <div class="table-responsive">
                        <table class="timetable_sub">
                            <thead>
                            <tr>
                                <th>{{ trans('common.product.name') }}</th>
                                <th>{{ trans('common.sell.price_promotion') }}</th>
                                <th>{{ trans('common.form.status') }}</th>
                                <th>{{ trans('common.sell.date_create') }}</th>
                                <th>{{ trans('common.form.action') }}</th>
                            </tr>
                            </thead>
                            <tbody id="cart_table">
                            @foreach ($products as $row)
                                <tr class="rem1">
                                    <td class="invert">
                                        <a href="{{ route('detail_product', $row->id) }}">
                                            {{ $row->name }}
                                        </a>
                                    </td>
                                    <td class="invert">
                                        <div class="info-product-price">
                                            <span class="item_price">{{ number_format($row->price) }}đ</span>
                                            - <span>{{ number_format($row->promotion) }}đ</span>
                                        </div>
                                    </td>
                                    <td class="invert">
                                        @if ($row->status == 0)
                                            <span id="pendding">{{ trans('common.respond.pendding') }}</span>
                                        @elseif ($row->status == 1)
                                            <i class="fa fa-check-circle">{{ trans('common.respond.checked') }}</i>
                                        @elseif ($row->status == 2)
                                            <i class="fa fa-minus-square" id="status-rejected">
                                                <b>{{ trans('common.respond.rejected') }}</b><br><br>
                                                <span id="reason" style="color:Red">{{ $row->check }}</span>
                                            </i>
                                        @endif
                                    </td>
                                    <td class="invert">{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                    <td class="invert">
                                        <div class="rem">
                                            <a href="{{ route('sell.show', $row->id) }}">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a> |
                                            <a href="{{ route('delete_sell_product', $row->id) }}" class="delete" onclick="deleteSell(this)">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </div>
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
    </section>
@endsection
