@extends('admin/layouts/master')
@section('content')
    <section class="content-header">
        <h1>{{ trans('common.tag.content_admin_dashboard') }}</h1>
    </section>
    <section class="content">
        @include('admin/notice')
        <div class="row">
            <div class="col-xs-8">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-left">
                            <h3 class="box-title">{{ trans('common.title_form.common_qty') }}</h3>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                {{ trans('common.form.qty_product') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                {{ trans('common.form.qyt_member') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                {{ trans('common.form.qty_news') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                {{ trans('common.form.slide') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                                {{ trans('common.form.qty_respond') }}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr role="row" class="odd">
                                            <td><a href="{{ route('get_product') }}">{{ $product }}</a></td>
                                            <td><a href="{{ route('get_member') }}">{{ $member }}</a></td>
                                            <td><a href="{{ route('news.index') }}">{{ $news }}</a></td>
                                            <td><a href="{{ route('news.index') }}">{{ $slide }}</a></td>
                                            <td><a href="{{ route('get_respond') }}">{{ $respond }}</a></td>
                                        </tr>
                                        </tbody>
                                        {!! Form::close() !!}
                                    </table>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
            <!-- table 2 -->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-left">
                            <h3 class="box-title">{{ trans('common.title_form.check_product') }}</h3>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                {{ trans('common.product.name') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                                {{ trans('common.product.price') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                {{ trans('common.product.image') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                {{ trans('common.product.status') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                {{ trans('common.product.created_at') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                {{ trans('common.product.action') }}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $row)
                                            <tr role="row" class="odd">
                                                <td>{{ $row->name }}</td>
                                                <td>{{ number_format($row->price) }}</td>
                                                @php $image = $row->images->first() @endphp
                                                <td>
                                                    <img src="{{ url(config('app.productUrl')) }}/{{ $row->id }}/{{ $image['image'] }}" width="150px" height="170px">
                                                </td>
                                                <td>
                                                        <a href="{{ route('accept_product', $row->id) }}" }})>
                                                            <span id="status-accept">{{ trans('common.product.accept_now') }}</span>
                                                        </a><br><br>
                                                        <i class="fa fa-minus-square reject-0{{ $row->id }}" id="status-reject-now">
                                                            <a class="show_input" id="reject{{ $row->id }}" href="" style="font-size: 20px;cursor: pointer">reject</a>
                                                        </i>
                                                        <div id="show{{ $row->id }}" class="hidd" style="display: none; ">
                                                            {!! Form::text('reason', null, ['id' => "rea$row->id"]) !!}
                                                            {!! Form::hidden('_token', csrf_token(), ['id' => 'token']) !!}
                                                            {!! Form::hidden('url', config('app.url_base'), ['id' => 'url']) !!}
                                                            <br>
                                                            <a href="javascript:void(0)" data-url="{{ route('reject_product') }}" class="reject" id="re{{ $row->id }}">
                                                                Send
                                                            </a>
                                                        </div>
                                                        <div id="text-show{{ $row->id }}">
                                                        </div>
                                                </td>
                                                <td>{{ $row->created_at->diffForHumans() }}</td>
                                                <td class="textC">
                                                    <a href="{{ route('delete_product', $row->id) }}" onclick="return confirm({{ trans('common.form.confirm') }})">
                                                        <i id="trash" class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        {!! Form::close() !!}
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
    <script type="text/javascript">
        $(document).ready(
            function () {
                $(".show_input").click(function (e) {
                    e.preventDefault();
                    var a = $(this).attr('id').substring(6);
                    $('.hidd').hide();
                    $("#show" + a).show("slow");

                });

            });

        $(document).ready(
            function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $(".reject").click(function (e) {
                    e.preventDefault();
                    var a = $(this).attr('id').substring(2);
                    var href = ($(this).attr('data-url'));
                    var reason = $('#rea' + a).val();
//                        window.location.href = href + '/' + reason;
//                        alert($(".text-show").attr('id'));
//                        alert(reason);
                    var token = $('#token').val();
                    $.ajax({
                        type: 'POST',
                        url: href,
                        data: {reason: reason, id: a, _token: token},
                        dataType: 'json',
                        success: function () {
//                                alert(data.content)
                        }
                    });
                    $("#text-show" + a).html(reason);
                    $("#text-show" + a).before(' <i class="fa fa-minus-square" id="status-rejected">' +
                                                    '<b>{{ trans('common.respond.rejected') }}</b>' +
                                                    '</i><br>');
                    $('.hidd').hide();
                    $('.reject-0' + a).hide();
                });
            });
    </script>
@endsection

