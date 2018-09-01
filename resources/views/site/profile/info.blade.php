@extends('site/layouts/master')
@section('content')
    <section class="content-header">
        @include('site/notice')
    </section>
    <!-- Main content -->
    <body>
    <div class="interact" view="info">
        <h2>{{ trans('common.info.head') }}</h2>
        <div class="pull-left">
            <a href="{{ route('get_order_bought') }}">{{ trans('common.info.buy_history') }}</a></br>
            <a href="{{ route('get_order_sold') }}">{{ trans('common.info.order') }}</a>
        </div>
        <div class="pull-right">
            <p>{{ trans('common.info.info_config') }}</p>
            <div class="checkout-left">
                <div class="address_form_agile">
                        {!! Form::open(['route' => ['post_profile', Auth::user()->id, 'method' => 'post', 'class' => 'form-signin']]) !!}
                        <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                            <div class="information-wrapper">
                                <div class="first-row">
                                    <div class="form-group">
                                        <h3>{{ trans('common.form.name') }}</h3>
                                        {!! Form::text('name', Auth::user()->name, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                                    </div>
                                    <div class="form-group">
                                        <h3>{{ trans('common.form.email') }}</h3>
                                        {!! Form::text('email', Auth::user()->email, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                                    </div>
                                    <div class="form-group">
                                        <h3>{{ trans('common.form.city') }}</h3>
                                        {!! Form::select('local_id', $local, "$user->local_id", ['class' => 'my-colorpicker1colorpicker-element select-info']) !!}
                                    </div>
                                    <div class="form-group">
                                        <h3>{{ trans('common.form.address') }}</h3>
                                        {!! Form::text('address', Auth::user()->address, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                                    </div>
                                    <div class="form-group">
                                        <h3>{{ trans('common.form.phone_number') }}</h3>
                                        {!! Form::number('phone_number', Auth::user()->phone_number, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                                    </div>
                                    <div class="form-group">
                                        <h3>{{ trans('common.form.birthday') }}</h3>
                                        {!! Form::date('birthday', Auth::user()->birthday, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                                    </div>
                                    <div class="form-group">
                                        <h3>{{ trans('common.form.password') }}</h3>
                                        {!! Form::input('password', 'password', Auth::user()->password, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                                    </div>
                                    <div class="form-group">
                                        <h3>{{ trans('common.form.repassword') }}</h3>
                                        {!! Form::input('password', 'password_confirmation', Auth::user()->password, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <p>{!! Form::button(trans('common.button.save'), ['type' => 'submit', 'class' => 'check-out']) !!}<p>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    </body>
@endsection

