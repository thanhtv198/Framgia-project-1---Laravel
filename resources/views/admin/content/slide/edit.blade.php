@extends('admin/layouts/master')
@section('content')
<section class="content-header">
    <h1>{{ trans('common.title_form.slide_head') }}</h1>
</section>
<div class="content">
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('common.title_form.slide_title') }}</h3>
            @include('admin.notice')
        </div>
        <!-- /.box-header -->
        {!! Form::open(['route' => ['slide.update', $slide->id], 'method' => 'put', 'class' => 'form-signin', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-9">
                <!-- iCheck -->
                <div class="box box-info">
                    <div class="box-body">
                        <!-- Color Picker -->
                        <div class="form-group">
                            <label>{{ trans('common.news.title') }}</label>
                            {!! Form::text('title', $slide->title, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                        </div>
                        <div class="form-group">
                            <label>{{ trans('common.news.image') }}</label>
                            {!! Form::file('image', null, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                            <div style="float:left">
                                <img src="{{ url(config('app.slideUrl')) }}/{{ $slide->avatar }}" class="img_slide" width="500px">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="add">
            {{ Form::submit(trans('common.button.save'), ['class' =>'btn btn-primary']) }}
        </div>
        <!-- /.row -->
        {!! Form::close() !!}
    </div>
</section>
</div>
@endsection

