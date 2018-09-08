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
                <hr>
                <div class="row omb_row-sm-offset-3 omb_socialButtons">
                    <div class="col-xs-4 col-sm-5 social-login">
                        <a href="{{ url('login/facebook') }}" class="btn btn-lg btn-block omb_btn-facebook loginBtn loginBtn--facebook">
                            <i class="fa fa-facebook visible-xs"></i>
                            <span class="hidden-xs">Login use facebook</span>
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                    </div>
                    <div class="col-xs-6 col-sm-5 social-login">
                        <a href="{{ url('login/google') }}" class="btn btn-lg btn-block omb_btn-google loginBtn loginBtn--google">
                            <i class="fa fa-google-plus visible-xs"></i>
                            <span class="hidden-xs">Login use google+</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .btn-lg{

        font-size: 15px!important;
    }
    .loginBtn {
        box-sizing: border-box;
        position: relative;
        /* width: 13em;  - apply for fixed size */
        margin: 0.2em;
        padding: 0 15px 0 46px;
        border: none;
        text-align: left;
        line-height: 34px;
        white-space: nowrap;
        border-radius: 0.2em;
        font-size: 16px;
        color: #FFF;
    }
    .loginBtn:before {
        content: "";
        box-sizing: border-box;
        position: absolute;
        top: 0;
        left: 0;
        width: 34px;
        height: 100%;
    }
    .loginBtn:focus {
        outline: none;
    }
    .loginBtn:active {
        box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
    }


    /* Facebook */
    .loginBtn--facebook {
        background-color: #4C69BA;
        background-image: linear-gradient(#4C69BA, #3B55A0);
        /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
        text-shadow: 0 -1px 0 #354C8C;
    }
    .loginBtn--facebook:before {
        border-right: #364e92 1px solid;
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
    }
    .loginBtn--facebook:hover,
    .loginBtn--facebook:focus {
        background-color: #5B7BD5;
        background-image: linear-gradient(#5B7BD5, #4864B1);
    }


    /* Google */
    .loginBtn--google {
        /*font-family: "Roboto", Roboto, arial, sans-serif;*/
        background: #DD4B39;
    }
    .loginBtn--google:before {
        border-right: #BB3F30 1px solid;
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
    }
    .loginBtn--google:hover,
    .loginBtn--google:focus {
        background: #E74B37;
    }


    @media (min-width: 768px) {
        .omb_row-sm-offset-3 div:first-child[class*="col-"] {
            margin-left: 25%;
        }
    }

    .omb_login .omb_authTitle {
        text-align: center;
        line-height: 300%;
    }

    .omb_login .omb_socialButtons a {
        color: white; // In yourUse @body-bg
    opacity:0.9;
    }
    .omb_login .omb_socialButtons a:hover {
        color: white;
        opacity:1;
    }
    .omb_login .omb_socialButtons .omb_btn-facebook {background: #3b5998;}
    .omb_login .omb_socialButtons .omb_btn-twitter {background: #00aced;}
    .omb_login .omb_socialButtons .omb_btn-google {background: #c32f10;}


    .omb_login .omb_loginOr {
        position: relative;
        font-size: 1.5em;
        color: #aaa;
        margin-top: 1em;
        margin-bottom: 1em;
        padding-top: 0.5em;
        padding-bottom: 0.5em;
    }
    .omb_login .omb_loginOr .omb_hrOr {
        background-color: #cdcdcd;
        height: 1px;
        margin-top: 0px !important;
        margin-bottom: 0px !important;
    }
    .omb_login .omb_loginOr .omb_spanOr {
        display: block;
        position: absolute;
        left: 50%;
        top: -0.6em;
        margin-left: -1.5em;
        background-color: white;
        width: 3em;
        text-align: center;
    }

    .omb_login .omb_loginForm .input-group.i {
        width: 2em;
    }
    .omb_login .omb_loginForm  .help-block {
        color: red;
    }
    .omb_login{
        margin-bottom: 100px;
    }

    @media (min-width: 768px) {
        .omb_login .omb_forgotPwd {
            text-align: right;
            margin-top:10px;
        }
    }
</style>

