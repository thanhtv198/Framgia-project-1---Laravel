@extends('site/layouts/master')
@section('content')
    <section class="content-header">
        @include('site/notice')
    </section>
    <!-- Main content -->
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
            {!! Form::open(['route' => ['sell.update', $product->id], 'method' => 'put', 'class' => 'form-horizontal', 'files' => true]) !!}
            <fieldset>
                <!-- Form Name -->
                <h2 class="tittle">{{ trans('common.product.info') }}</h2>
                <hr>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="product_name">{{ trans('common.product.name') }}*</label>
                    <div class="col-md-4">
                        {!! Form::text('name', $product->name, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.name') ])!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="product_categorie">{{ trans('common.product.category') }}</label>
                    <div class="col-md-4">
                        {!! Form::select('category_id', $categories, null, ['class' => 'form-control select2 select2-hidden-accessible']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="product_categorie">{{ trans('common.product.manufacture') }}</label>
                    <div class="col-md-4">
                        {!! Form::select('manufacture_id', $manufactures, null, ['class' => 'form-control select2 select2-hidden-accessible']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="product_name_fr">{{ trans('common.product.price') }}*</label>
                    <div class="col-md-4">
                        {!! Form::number('price', $product->price, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.price')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="product_name_fr">{{ trans('common.product.promotion') }}</label>
                    <div class="col-md-4">
                        {!! Form::number('promotion', $product->promotion, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.promotion')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="product_description">{{ trans('common.product.description') }}</label>
                    <div class="col-md-4">
                        {!! Form::textarea('description', $product->description, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.description')]) !!}
                    </div>
                </div>
                <hr>
                <h2>{{ trans('common.product.config') }}</h2>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="product_name_fr">{{ trans('common.product.os') }}</label>
                    <div class="col-md-4">
                        {!! Form::text('os', $product->os, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.os')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="percentage_discount">{{ trans('common.product.screen') }}</label>
                    <div class="col-md-4">
                        {!! Form::text('screen', $product->screen, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.screen')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="stock_alert">{{ trans('common.product.front_camera') }}</label>
                    <div class="col-md-4">
                        {!! Form::number('front_camera', $product->front_camera, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.front_camera')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="stock_critical">{{ trans('common.product.back_camera') }}</label>
                    <div class="col-md-4">
                        {!! Form::number('back_camera', $product->back_camera, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.back_camera')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="tutorial">{{ trans('common.product.ram') }}</label>
                    <div class="col-md-4">
                        {!! Form::number('ram', $product->ram, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.ram')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="tutorial_fr">{{ trans('common.product.cpu') }}</label>
                    <div class="col-md-4">
                        {!! Form::text('cpu', $product->cpu, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.cpu')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="online_date">{{ trans('common.product.memory') }}</label>
                    <div class="col-md-4">
                        {!! Form::number('memory', $product->memory, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.memory')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="author">{{ trans('common.product.sim') }}</label>
                    <div class="col-md-4">
                        {!! Form::text('sim', $product->sim, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.sim')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="enable_display">{{ trans('common.product.battery') }}</label>
                    <div class="col-md-4">
                        {!! Form::number('battery', $product->battery, ['class' => 'form-control input-md', 'placeholder' => trans('common.product.battery')]) !!}
                    </div>
                </div>
                @if(!empty($custom))
                    @php $i =0 ; @endphp
                    @foreach($custom as $c)
                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="filebutton">{{ json_decode($c->property) }}</label>
                        <div class="col-md-4">
                            {!! Form::text("detail$i", $c->detail, ['class' => 'form-control input-md']) !!}
                        </div>
                    </div>
                        @php $i++ ; @endphp
                    @endforeach
                @endif

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
                                {!! Form::text('property_new', null, ['class' => 'form-control input-md']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"
                                   for="filebutton">{{ __('Detail') }}</label>
                            <div class="col-md-4">
                                {!! Form::textarea('detail_new', null, ['class' => 'form-control input-md']) !!}
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">{{ trans('common.product.image') }}</label>
                    <div class="col-md-4">
                        @php $images = $product->images->take(4) @endphp
                        @for($i = 0; $i < count($images); $i++)
                            {!! Form::file("image$i", ['class' => 'form-control input-md']) !!}
                            <td>
                                <img src="{{ url(config('app.productUrl')) }}/{{ $product->id }}/{{ $images[$i]->image }}" width="100px" height="100px" class="img_product">
                            </td>
                        @endfor
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"></label>
                    <div class="col-md-4">
                        {!! Form::button(trans('common.button.save'), ['type' => 'submit', 'class' => 'btn-sell']) !!}
                    </div>
                </div>
            </fieldset>
            {!! Form::close() !!}
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function () {
            CKEDITOR.replace( 'description' );
        });
    </script>
@endsection

