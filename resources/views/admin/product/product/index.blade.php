@extends('admin/layouts/master')
@section('content')
    <section class="content-header">
        <h1>{{ trans('common.title_form.product_head') }}</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        @include('admin/notice')
                        <div class="pull-left">
                            <h3 class="box-title">{{ trans('common.title_form.product_title') }}</h3>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div id="header" view="header">
                                        <div class="main">
                                            {!! Form::open(['route' => 'search_product', 'method' => 'get', 'class ' => 'form-signin']) !!}
                                            <div class="search-bar">
                                                {!! Form::text('key', null, ['id' => 'tags', 'onkeyup' => 'autoComplete()', 'placeholder' => trans('common.tag.search')]) !!}
                                                {!! Form::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'fa fa-search', 'id' => 'tag' ]) !!}
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        {!! Form::open(['route' => ['mul_del_product', 'method' => 'post', 'class' => 'form-signin']]) !!}
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                {!! Form::button(trans('common.button.delete'), ['type' => 'submit', 'class' => 'btn btn-default', 'id' => 'confirmation']) !!}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                {{ trans('common.product.name') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                {{ __('User Name') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                {{ trans('common.product.category') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                                {{ trans('common.product.price') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                                {{ trans('common.product.qty_image') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                {{ trans('common.product.image') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                {{ trans('common.product.status') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                {{ trans('common.product.action') }}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {!! Form::hidden('qty', count($products), ['id' => 'qty_pro']) !!}
                                        @foreach($products as $row)
                                            <tr role="row" class="odd">
                                                <td>{!! Form::checkbox('check[]', $row->id) !!}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->user->name }}</td>
                                                <td>{{ $row->category->name }}</td>
                                                <td>{{ number_format($row->price) }}</td>
                                                <td>{{ count($row->images) }}</td>
                                                @php $image = $row->images->first() @endphp
                                                <td>
                                                    <img src="{{ url(config('app.productUrl')) }}/{{ $row->id }}/{{ $image['image'] }}" width="150px" height="170px">
                                                </td>
                                                <td>

                                                    @if ($row->status == 0)
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
                                                    @elseif ($row->status == 1)
                                                        <i class="fa fa-check-circle" id="status-accepted">
                                                            {{ trans('common.product.accepted') }}
                                                        </i>
                                                    @elseif ($row->status == 2)
                                                        <i class="fa fa-minus-square" id="status-rejected">
                                                            <b>{{ trans('common.respond.rejected') }}</b>
                                                        </i><br>
                                                        <span id="reason">{{ $row->check }}</span>
                                                        <br><br>
                                                        <a href="{{ route('accept_product', $row->id) }}" onclick="return confirm({{ trans('common.form.confirm') }})">
                                                            <span id="status-accept">{{ trans('common.product.accept_now') }}</span>
                                                        </a>
                                                    @endif
                                                </td>
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
                        '                      <b>{{ trans('common.respond.rejected') }}</b>' +
                        '                      </i><br>');
                    $('.hidd').hide();
                    $('.reject-0' + a).hide();
                });

            });
    </script>
@endsection

