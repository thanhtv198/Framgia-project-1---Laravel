@extends('site/layouts/master')
@section('content')
    <div class="error" id="404-error">
        <h1>{{ trans('common.tag.404') }}</h1>
    </div>
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=framgia_project
    DB_USERNAME=root
    DB_PASSWORD=55555555

    DB_CONNECTION=pgsql
    DB_HOST=ec2-184-72-247-70.compute-1.amazonaws.com
    DB_PORT=5432
    DB_DATABASE=d632blsmq9qc5a
    DB_USERNAME=joxssaerxscnsy
    DB_PASSWORD=c4a7769282ceaeb80e3fed6f6b95db61ce58bc658ec456f2e76c1f708b287cd7
@endsection
