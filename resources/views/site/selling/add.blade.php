@extends('site/layouts/master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        @include('site/notice')
    </section>
    <section class="content">
        <div class="require">
            <h2>Requires the product to be accepted</h2>
            <ol>
                <li><span>{{ trans('common.sell.correct_photo') }}</span></li>
                <li><span>{{ trans('common.sell.resonable_price') }}</span></li>
                <li><span>{{ trans('common.sell.resonable_name') }}</span></li>
                <li><span>{{ trans('common.sell.resonable_name') }}</span></li>
            </ol>
        </div>
        <div class="cart" view="sell">
            {!! Form::open(['route' => 'sell.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true]) !!}
            <fieldset>
                <!-- Form Name -->
                <h1 class="tittle">{{ trans('common.product.info') }}</h1>
                <hr>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="product_name">{{ trans('common.product.name') }}*</label>
                    <div class="col-md-4">
                        {!! Form::text('name', null, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.name') ])!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"
                           for="product_categorie">{{ trans('common.product.category') }}</label>
                    <div class="col-md-4">
                        {!! Form::select('category_id', $categories, null, ['class' => 'form-control select2 select2-hidden-accessible']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"
                           for="product_categorie">{{ trans('common.product.manufacture') }}</label>
                    <div class="col-md-4">
                        {!! Form::select('manufacture_id', $manufactures, null, ['class' => 'form-control select2 select2-hidden-accessible']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="product_name_fr">{{ trans('common.product.price') }}
                        *</label>
                    <div class="col-md-4">
                        {!! Form::number('price', null, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.price')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"
                           for="product_name_fr">{{ trans('common.product.promotion') }}</label>
                    <div class="col-md-4">
                        {!! Form::number('promotion', null, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.promotion')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"
                           for="product_description">{{ trans('common.product.description') }}</label>
                    <div class="col-md-4">
                        {!! Form::textarea('description', null, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.description')]) !!}
                    </div>
                </div>
                <hr>
                <h2>{{ trans('common.product.config') }}</h2>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="product_name_fr">{{ trans('common.product.os') }}</label>
                    <div class="col-md-4">
                        {!! Form::text('os', null, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.os')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"
                           for="percentage_discount">{{ trans('common.product.screen') }}</label>
                    <div class="col-md-4">
                        {!! Form::text('screen', null, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.screen')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"
                           for="stock_alert">{{ trans('common.product.front_camera') }}</label>
                    <div class="col-md-4">
                        {!! Form::number('front_camera', null, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.front_camera')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"
                           for="stock_critical">{{ trans('common.product.back_camera') }}</label>
                    <div class="col-md-4">
                        {!! Form::number('back_camera', null, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.back_camera')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="tutorial">{{ trans('common.product.ram') }}</label>
                    <div class="col-md-4">
                        {!! Form::number('ram', null, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.ram')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="tutorial_fr">{{ trans('common.product.cpu') }}</label>
                    <div class="col-md-4">
                        {!! Form::text('cpu', null, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.cpu')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="online_date">{{ trans('common.product.memory') }}</label>
                    <div class="col-md-4">
                        {!! Form::number('memory', null, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.memory')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="author">{{ trans('common.product.sim') }}</label>
                    <div class="col-md-4">
                        {!! Form::text('sim', null, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.sim')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"
                           for="enable_display">{{ trans('common.product.battery') }}</label>
                    <div class="col-md-4">
                        {!! Form::number('battery', null, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.battery')]) !!}
                    </div>
                </div>

                <div class="plus-custom" style="margin-top: 15px;margin-bottom:10px;color:red">
                    {{ __(' Add more properties') }}
                    <span class="fa fa-plus-square" id="plus"></span>
                </div>

                <div class="prop" id="custom-prop" style="display: none;border-bottom-style: ridge;border-top-style: ridge;margin-bottom: 15px">
                    <div style="margin-top: 10px;margin-bottom: 10px;">
                        <label>{{ __('Add your new properties') }}</label>
                        <div class="form-group">
                            <label class="col-md-4 control-label"
                                   for="filebutton">{{ __('Property') }}</label>
                            <div class="col-md-4">
                                {!! Form::text('property', null, ['class' => 'form-control input-md']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"
                                   for="filebutton">{{ __('Detail') }}</label>
                            <div class="col-md-4">
                                {!! Form::textarea('detail', null, ['class' => 'form-control input-md']) !!}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">{{ trans('common.product.image') }}</label>
                    <div class="col-md-4">
                        {!! Form::file('image[]', ['class' => 'form-control input-md', 'multiple' => true]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"></label>
                    <div class="col-md-4">
                        {!! Form::button(trans('common.button.add'), ['type' => 'submit', 'class' => 'btn-sell']) !!}
                    </div>
                </div>
            </fieldset>
            {!! Form::close() !!}
        </div>
    </section>
    <!-- /.content -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('.plus-custom').click(function () {
                $('#custom-prop').show();
            });
        });
    </script>
@endsection

