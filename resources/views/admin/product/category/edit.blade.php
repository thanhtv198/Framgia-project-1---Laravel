@extends('admin/layouts/master')
@section('content')
    <section class="content-header">
        <h1>{{ trans('common.title_form.category_head') }}</h1>
    </section>
    <div class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('common.title_form.category_title') }}</h3>
                @include('admin.notice')
            </div>
            {!! Form::open(['route' => ['category.update', $category->id], 'method' => 'put', 'class' => 'form-signin']) !!}
            <div class="row">
                <div class="col-md-6">
                    <!-- iCheck -->
                    <div class="box box-info">
                        <div class="box-body">
                            <!-- Color Picker -->
                            <div class="form-group">
                                <label>{{ trans('common.form.name') }}</label>
                                {!! Form::text('name', $category->name, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{ trans('common.product.parent_category') }}</label>
                                {!! Form::select('parent_id', $categories, "$category->parent_id", ['class' => 'span2 col-md-2 form-control', 'placeholder' => ' ']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add">
                {{ Form::submit(trans('common.button.save'), ['class' => 'btn btn-primary']) }}
            </div>
            <!-- /.row -->
            {!! Form::close() !!}
        </div>
    </div>
    </section>
@endsection

