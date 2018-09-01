@extends('site/layouts/master')
@section('content')
    <!-- Modal content-->
    <div class="modalcontent">
        <div class="checkout-left" view="sign_up">
            <div class="address_form_agile">
                <h4>{{ trans('common.site.sign_up') }}</h4>
                @include('site/notice')
                {!! Form::open(['route' => 'post_signup', 'method' => 'post', 'class' => 'creditly-card-form agileinfo_form']) !!}
                <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                    <div class="information-wrapper">
                        <div class="first-row">
                            <div class="w3_agileits_card_number_grids">
                                <div class="form-group">
                                    <label>{{ trans('common.form.name') }}</label>
                                    {!! Form::text('name', null, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.form.email') }}</label>
                                    {!! Form::text('email', null, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                                </div>
                                <div class="form-group" view="city">
                                    <label>{{ trans('common.form.city') }}</label><br>
                                    {!! Form::select('local_id', $local, null, ['class' => 'my-colorpicker1colorpicker-element select-checkout-a', 'placeholder' => 'Choose location']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.form.address') }}</label>
                                    {!! Form::text('address', null, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.form.phone_number') }}</label>
                                    {!! Form::number('phone_number', null, ['class' => 'span2 col-md-2 form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.form.birthday') }}</label>
                                    {!! Form::date('birthday', null, ['class' => 'span2 col-md-2 form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.form.password') }}</label>
                                    {!! Form::password('password', ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.form.repassword') }}</label>
                                    {!! Form::password('password_confirmation', ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        {{ Form::submit(trans('common.button.sign_up'), ['class' =>'btn btn-success']) }}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection

