@extends('admin/layouts/master')
@section('content')
    <section class="content-header">
        <h1>{{ trans('common.title_form.account_manager_head') }}</h1>
    </section>
    <div class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('common.title_form.account_manager_title') }}</h3>
                @include('admin.notice')
            </div>
            <!-- /.box-header -->
            {!! Form::open(['route' => 'postAdd_manager', 'method' => 'post', 'class' => 'form-signin']) !!}
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
                                <label>{{ trans('common.form.email') }}</label>
                                {!! Form::text('email', null, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{ trans('common.form.address') }}</label>
                                {!! Form::text('address', null, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{ trans('common.form.password') }}</label>
                                {!! Form::password('password', ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{ trans('common.form.repassword') }}</label>
                                {!! Form::password('password_confirmation', ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="col-md-6">
                    <div class="box box-danger" view="user-manage">
                        <div class="box-body">
                            <div class="form-group">
                                <label>{{ trans('common.form.birthday') }}</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    {!! Form::date('birthday', null, ['class' => 'span2 col-md-2 form-control']) !!}
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>{{ trans('common.form.phone_number') }}</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    {!! Form::number('phone_number', null, ['class' => 'span2 col-md-2 form-control']) !!}
                                </div>
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>{{ trans('common.form.city') }}</label>
                                {!! Form::select('local_id', $local, null, ['class' => 'span2 col-md-2 form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{ trans('common.form.role') }}</label>
                                {!! Form::select('level_id', $level, null, ['class' => 'span2 col-md-2 form-control']) !!}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.col (right) -->
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

