@extends('site/layouts/master')
@section('content')
    <section class="content-header">
        @include('site/notice')
    </section>
    <div class="privacy">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">
                {{ trans('common.checkout.checkout') }}
                <span class="heading-style">
				<i></i>
				<i></i>
				<i></i>
			</span>
            </h3>
            <div class="checkout-left" view="checkout">
                <div class="address_form_agile">
                    <h3>{{ trans('common.checkout.confirm') }}</h3>
                    <hr>
                    <h4>{{ trans('common.checkout.total') }}{{(Cart::subtotal())}}đ</h4>
                    @if( Cart::count() != 0)
                        <hr>
                        {!! Form::open(['route' => ['post_checkout', 'method' => 'post', 'class' => 'form-signin']]) !!}
                        <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                            <div class="information-wrapper">
                                <div class="first-row">
                                    <div class="w3_agileits_card_number_grids">
                                        <div class="form-group">
                                            <h3>{{ trans('common.form.name') }}</h3>
                                            {!! Form::text('name', isset(Auth::user()->name) ? Auth::user()->name :'', ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                                        </div>
                                        <div class="form-group">
                                            <h3>{{ trans('common.form.email') }}</h3>
                                            {!! Form::text('email', isset(Auth::user()->name) ? Auth::user()->email :'', ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                                        </div>
                                        <div class="form-group">
                                            <h3>{{ trans('common.form.city') }}</h3>
                                            {!! Form::select('local_id', $local, isset(Auth::user()->local_id) ? Auth::user()->local->id  :'', ['class' => 'my-colorpicker1colorpicker-element select-checkout']) !!}
                                        </div>
                                        <div class="form-group">
                                            <h3>{{ trans('common.form.address') }}</h3>
                                            {!! Form::text('address',isset(Auth::user()->name) ? Auth::user()->address :'', ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                                        </div>
                                        <div class="form-group">
                                            <h3>{{ trans('common.form.phone_number') }}</h3>
                                            {!! Form::number('phone_number',isset(Auth::user()->name) ? Auth::user()->phone_number :'', ['class' => 'form-control my-colorpicker1colorpicker-element'])
                                            !!}
                                        </div>
                                        <div class="form-group">
                                            <h3>{{ trans('common.form.note') }}</h3>
                                            {!! Form::textarea('note', null, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                {!! Form::button(trans('common.checkout.deliver'), ['type' => 'submit', 'class' => 'submit check_out']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    @else
                        <h4>{{ trans('common.checkout.cart_empty') }}</h4>
                    @endif
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection