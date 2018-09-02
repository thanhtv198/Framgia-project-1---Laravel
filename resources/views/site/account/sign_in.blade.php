@extends('site/layouts/master')
@section('content')
    <div class="checkout-left" id="checkout-left" view="sign_in">
        <div class="modal-body modal-body-sub_agile">
            <div class="main-mailposi">
                <span class="fa fa-envelope-o" aria-hidden="true"></span>
            </div>
            <div class="modal_body_left modal_body_left1">
                <h3 class="agileinfo_sign">{{ trans('common.tag.sign_in') }}</h3>
                <p>{{ trans('common.tag.welcome_login') }}</p>
                @include('site/notice')
                {!! Form::open(['route' => 'post_signin', 'method' => 'post', 'class' => 'creditly-card-form agileinfo_form']) !!}
                <div class="form-group">
                    <h3>{{ trans('common.form.email') }}</h3>
                    {!! Form::text('email', null, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                </div>
                <div class="form-group">
                    <h3>{{ trans('common.form.password') }}</h3>
                    {!! Form::password('password', ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                </div>
                {{ Form::submit(trans('common.tag.sign_in')) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

