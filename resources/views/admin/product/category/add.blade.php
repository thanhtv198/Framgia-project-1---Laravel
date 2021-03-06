@extends('admin/layouts/master')
@section('content')
    <section class="content-header">
        <h1>{{ trans('common.title_form.category_head') }}</h1>
    </section>
    <div class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('common.title_form.category_title') }}</h3>
                @include('admin.notice')
            </div>
            <!-- /.box-header -->
            {!! Form::open(['route' => 'category.store', 'method' => 'post', 'class' => 'form-signin']) !!}
            <div class="row">
                <div class="col-md-6">
                    <!-- iCheck -->
                    <div class="box box-info">
                        <div class="box-body">
                            <!-- Color Picker -->
                            <div class="form-group">
                                <label>{{ trans('common.form.name') }}</label>
                                {!! Form::text('name', null, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{ trans('common.form.parent_category') }}</label>
                                {!! Form::select('parent_id', $categories, null, ['class' => 'span2 col-md-2 form-control', 'placeholder' => ' ']) !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="add">
                {{ Form::submit(trans('common.button.add'), ['class' => 'btn btn-primary']) }}
            </div>
            <!-- /.row -->
            {!! Form::close() !!}
        </div>
        </section>
    </div>
@endsection

