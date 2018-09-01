@extends('site/layouts/master')
@section('content')
    <div class="error" id="404-error">
        <h1>{{ trans('common.tag.404') }}</h1>
    </div>
{{--DB_CONNECTION=mysql--}}
{{--DB_HOST=localhost--}}
{{--DB_PORT=3306--}}
{{--DB_DATABASE=oneline_smart--}}
{{--DB_USERNAME=root--}}
{{--DB_PASSWORD=root--}}

{{--DB_CONNECTION=pgsql--}}
{{--DB_HOST=ec2-50-17-250-38.compute-1.amazonaws.com--}}
{{--DB_PORT=5432--}}
{{--DB_DATABASE=d2mlphjpm0ekin--}}
{{--DB_USERNAME=tglcucbnxhotoa--}}
{{--DB_PASSWORD=f78996c405412488c5a7b99c4d183cc0c18cedc63f729fe60a22b7d5a8993367--}}
@endsection
