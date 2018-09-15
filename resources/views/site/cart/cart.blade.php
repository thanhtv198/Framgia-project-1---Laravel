@extends('site/layouts/master')
@section('content')
    <section class="content-header">
        @include('site/notice')
    </section>
    <div class="privacy">
        <div class="container" view="cart">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">
                {{ trans('common.cart.cart') }}
                <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
            </h3>
            @if(Cart::count() != 0)
                <div class="checkout-right">
                    <h4>{{ trans('common.cart.product_in_cart') }}</h4>
                    {!! Form::open(['route' => ['update_cart', 'method' => 'post', 'class' => 'form-signin']]) !!}
                    <div class="table-responsive">
                        <table class="timetable_sub">
                            <thead>
                            <tr>
                                <th>{{ trans('common.product.name') }}</th>
                                <th>{{ trans('common.product.qty') }}</th>
                                <th>{{ trans('common.product.price') }}</th>
                                <th>{{ trans('common.form.action') }}</th>
                            </tr>
                            </thead>
                            <tbody id="cart_table">
                            @foreach ($cart as $row)
                                <tr class="rem1">
                                    <td class="invert">
                                        <a href="{{ route('detail_product', $row->id) }}">
                                            {{ $row->name }}
                                        </a>
                                    </td>
                                    <td class="invert">
                                        <input type="number" id="number-in-cart" min="1" name="qty{{ $row->rowId }}" value={{ $row->qty }} />
                                    </td>
                                    <td class="invert">{{ number_format(($row->price) * $row->qty) }}</td>
                                    <td class="invert">
                                        <div class="rem">
                                            <a href="{{ route('delete_cart', $row->rowId) }}" class="delete"
                                               onclick="deleteRow(this)">
                                                <div class="close1"></div>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="button-bottom">
                            <ul class="pull-left">
                                {!! Form::button(trans('common.button.update'), ['type' => 'submit', 'class' => 'submit check_out']) !!}
                            </ul>
                            <ul class="pull-right">
                                <a href={{route('checkout')}}>
                                    {!! Form::button(trans('common.button.order'), ['class' => 'submit check_out']) !!}
                                </a>
                            </ul>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <div class="clearfix"></div>
                </div>
            @else
                <h3>{{ __('Your cart is empty') }}</h3>
            @endif
        </div>
    </div>
@endsection