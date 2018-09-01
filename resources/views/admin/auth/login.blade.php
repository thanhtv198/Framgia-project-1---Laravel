@extends('admin/layouts/head')
<body>
<div class="container">
    <div class="wrappers">
        {!! Form::open(['route' => 'login_admin', 'method' => 'post', 'class' => 'form-signin-login']) !!}
        <h3 class="form-signin-heading">{{ trans('common.tag.welcome_login') }}</h3>
        @include('admin.notice')
        <hr class="colorgraph">
        <br>
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
        {{ Form::submit(trans('common.button.login'), ['class' => 'btn btn-lg btn-primary btn-block']) }}
        {!! Form::close() !!}
    </div>
</div>
</body>

