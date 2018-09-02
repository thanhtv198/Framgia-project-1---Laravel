@extends('site/layouts/master')
@section('content')
    <section class="content-header">
        @include('site/notice')
    </section>
    <div class="privacy">
        <div class="container" view="cart">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">
                {{ trans('common.respond.send_respond') }}
                <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
            </h3>
            <div class="respond-content">
                {!! Form::open(['route' => 'post_respond', 'method' => 'post', 'class' => 'form-signin']) !!}
                <div class="row">
                    <div class="col-md-9">
                        <!-- iCheck -->
                        <div class="box box-info">
                            <div class="box-body">
                                <!-- Color Picker -->
                                <div class="form-group">
                                    <label>{{ trans('common.news.title') }}</label>
                                    {!! Form::text('title', null, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.news.content') }}</label>
                                    {!! Form::textarea('content', null, ['class' => 'form-control input-md', 'id' => 'description']) !!}
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <div class="add">
                    {{ Form::submit(trans('common.button.send'), ['class' =>'btn btn-primary']) }}
                </div>
                <!-- /.row -->
                {!! Form::close() !!}
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection

