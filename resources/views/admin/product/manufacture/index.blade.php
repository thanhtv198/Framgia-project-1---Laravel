@extends('admin/layouts/master')
@section('content')
    <section class="content-header">
        <h1>{{ trans('common.title_form.manufacture_head') }}</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        @include('admin/notice')
                        <div class="pull-left">
                            <h3 class="box-title">{{ trans('common.title_form.manufacture_title') }}</h3>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('manufacture.create') }}"  role="button">
                                {{ trans('common.button.add') }}
                            </a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div id="header" view="header">
                                        <div class="main">
                                            {!! Form::open(['route' => 'search_manufacture', 'method' => 'get', 'class' => 'form-signin']) !!}
                                            <div class="search-bar">
                                                {!! Form::text('key', null, ['placeholder' => trans('common.tag.search')]) !!}
                                                <button type="submit" class="fa fa-search"></button>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                                {{ trans('common.product.code') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                {{ trans('common.product.name') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                {{ trans('common.product.action') }}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($manufactures as $row)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $row->id }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td class="textC">
                                                    <a href="{{ route('manufacture.show', $row->id) }}">
                                                        <i class="fa fa-eye" aria-hidden="true" id="eye"></i>
                                                    </a>|
                                                    <a href="{{ route('manufacture.delete', $row->id) }}" onclick="return confirm({{ trans('common.form.confirm') }})">
                                                        <i id="trash" class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

