@extends('site/layouts/master')
@section('content')
    <style>
        .rating {
            width: 200px;

        }
    </style>
    @include('site.notice')
    <div view="detail">
        <h3 class="tittle-w3l">
            {{ trans('common.product_detail.head') }}
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <div class="row">
            <div class="pull-left">
                <div class="image-top">
                    <img src="{{ url(config('app.productUrl')) }}/{{ $product->id }}/{{ $images[0]['image'] }}">
                </div>
                <div class="image-bot d-flex justify-content-center">
                    @foreach ($images->take(4) as $item)
                        <div class="image-bot-container border">
                            <img src="{{ url(config('app.productUrl')) }}/{{ $product->id }}/{{ $item->image }}">
                        </div>
                    @endforeach
                </div>
                <div class="seller_info">
                    <h2>{{ trans('common.product.seller_info') }}</h2>
                    <div style="text-align: left;">
                        <span>{{ __('Send message') }}</span>
                        <a href="{{ route('send_message', $product->user->id) }}">
                            <i class="fa fa-comments message"></i>
                        </a>
                    </div>

                    <table class="table table-hover">
                        <thead>
                        <thead>
                        <tr>
                            <th class="th1">{{ trans('common.product_detail.info') }}</th>
                            <th>{{ trans('common.product_detail.detail') }}</th>
                        </tr>
                        </thead>
                        <tr>
                            <th class="th1"><b>{{ trans('common.form.name') }}</b></th>
                            <th> {{ $product->user->name }}</th>
                        </tr>
                        <tr>
                            <th class="th1"><b>{{ trans('common.form.email') }}</b></th>
                            <th>{{ $product->user->email }}</th>
                        </tr>
                        <tr>
                            <th class="th1"><b>{{ trans('common.form.phone_number') }}</b></th>
                            <th>{{ $product->user->phone_number }}</th>
                        </tr>
                        <tr>
                            <th class="th1"><b>{{ trans('common.form.address') }}</b></th>
                            <th>{{ $product->user->address . ' , ' . $product->user->local->name }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="pull-right">
                <h1>{{ $product->name }} </h1>
                <div>
                    <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5"
                           data-step="0.5" value="{{ $product->averageRating }}" data-size="xs">
                </div>
                <div class="info-product-price">
                    @php $price_new = $product->price - $product->promotion @endphp
                    @if ($product->promotion > 0)
                        <span class="item_price">{{ number_format($price_new) }}đ</span>
                        <del>{{ number_format($product->price) }}đ</del>
                    @else
                        <span class="item_price">
                            {{ number_format($price_new) }}đ
                        </span>
                    @endif
                </div>
                <p>
                    <b>{{ trans('common.product_detail.views') }}</b>
                    {{ $product->views }}
                </p>
                <p>
                    <b>{{ trans('common.product_detail.manufacture') }}</b>
                    {{$product->manufacture['name']}}
                </p>
                <p>
                    <b>{{ trans('common.product_detail.category') }}</b>
                    {{$product->category['name']}}
                </p>
                <p>
                    <b>{{ trans('common.product_detail.date_manufacture') }}</b>
                    {{$product->date_manufacture}}
                </p>
                <hr>
                <h2>{{ trans('common.product_detail.detail_head') }}</h2>
                <table class="table table-hover table-bordered">
                    <thead>
                    <thead>
                    <tr>
                        <th class="th1">{{ trans('common.product_detail.info') }}</th>
                        <th>{{ trans('common.product_detail.detail') }}</th>
                    </tr>
                    </thead>
                    <tr>
                        <td>{{ trans('common.product.screen') }}</td>
                        <td>{{ $product->screen }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('common.product.os') }}</td>
                        <td>{{ $product->os }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('common.product.front_camera') }}</td>
                        <td>{{ $product->front_camera }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('common.product.back_camera') }}</td>
                        <td>{{ $product->back_camera }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('common.product.cpu') }}</td>
                        <td>{{ $product->cpu }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('common.product.ram') }}</td>
                        <td>{{ $product->ram }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('common.product.memory') }}</td>
                        <td>{{ $product->memory }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('common.product.sim') }}</td>
                        <td>{{ $product->sim }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('common.product.battery') }}</td>
                        <td>{{ $product->battery }}</td>
                    </tr>
                    @if(isset($product->customizeProducts))
                        @foreach($product->customizeProducts as $p)
                            <tr>
                                <td>{{ json_decode($p->property) }}</td>
                                <td>{{ $p->detail }}</td>
                            </tr>
                        @endforeach
                    @endif
                    <thead>
                </table>
                <div class="product-icon-container">
                    <a href={{ route( 'add_cart', $product->id) }} onclick="addToCart()">
                        {{ Form::submit(trans('common.button.add_cart'), ['class' => 'submit check_out']) }}
                    </a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="cmt" style="margin-left:70px;">
            <div>
                <div style="margin-left:20px;width:80%" class="des">
                    <h2>{{ trans('common.product_detail.description') }}</h2>
                    <h4>{!! $product->description !!}</h4>
                    <hr>
                </div>
            </div>
            <div>
                <div style="margin-left:20px;width:80%">
                    <h2>{{ __('Leave your rating') }}</h2>
                        <div style="">
                            {!! Form::open(['route' => ['rating', $product->id], 'method' => 'post']) !!}
                            <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5"
                                   data-step="1" value="{{ $product->userAverageRating}}" data-size="xs">
                            <input type="hidden" name="id" required="" value="{{ $product->id }}">
                            @if(Auth::user())
                            <button type="submit" class="btn btn-warning">{{ __('Rate') }}</button>
                            @else
                                <br>
                                <h5>{{ trans('common.product_detail.login_to_rate') }}</h5>
                            @endif
                            {!! Form::close() !!}
                        </div>
                    <hr>
                </div>
            </div>
            <br>
            <div class="container">
                <h2>{{ __('Leave your comment') }}</h2>
                @if(Auth::user())
                    {!! Form::open(['route' => ['cmt_add', 'method' => 'post']]) !!}
                    <div class="form-group">
                        {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'comment']) !!}
                        {!! Form::hidden('product_id', $product->id ) !!}
                    </div>
                    {!! Form::button(trans('common.product_detail.comment'), ['type' => 'submit', 'class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                    <br>
                    <h3>{{ count($comments) }} {{ trans('common.product_detail.comment1') }}</h3>
                @else
                    <h3>{{ count($comments) }} {{ trans('common.product_detail.comment1') }}</h3>
                    <br>
                    <h5>{{ trans('common.product_detail.login_to_comment') }}</h5>
                @endif
                <hr>
                @include('site.product.comment_replies', ['comments' => $comments, 'product_id' => $product->id, 'seller' => $product->user->id])
            </div>
        </div>
    </div>
@endsection