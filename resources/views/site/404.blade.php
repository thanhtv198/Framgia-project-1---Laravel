@extends('site/layouts/master')
@section('content')
    <div class="error" id="404-error">
        <h1>{{ trans('common.tag.404') }}</h1>
    </div>
    {{--DB_CONNECTION=mysql--}}
    {{--DB_HOST=127.0.0.1--}}
    {{--DB_PORT=3306--}}
    {{--DB_DATABASE=framgia_project--}}
    {{--DB_USERNAME=root--}}
    {{--DB_PASSWORD=55555555--}}

    {{--DB_CONNECTION=mysql--}}
    {{--DB_HOST=ec2-54-225-92-1.compute-1.amazonaws.com--}}
    {{--DB_PORT=5432--}}
    {{--DB_DATABASE=dc9r0bqbl3uj7o--}}
    {{--DB_USERNAME=scuaqnlsekflwu--}}
    {{--DB_PASSWORD=565c552f34ba6119d7949c14030eed67da9da298db5727a3547c6086d46e26df--}}
@endsection
