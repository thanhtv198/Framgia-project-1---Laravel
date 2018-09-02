<div class="head">
    <div class="header-bot">
        <div class="header-bot_inner_wthreeinfo_header_mid">
            <!-- header-bot-->
            <div class="col-md-4 logo_agile">
                <h1>
                    <a href="{{ route('home_page') }}">
                    <span>
                        <img src="{{ asset('image/framgia-logo-black-1.png') }}" alt="">
                    </span>
                        <span>{{ trans('common.tag.shop') }}</span>
                    </a>
                </h1>
            </div>
            <!-- header-bot -->
            <div class="col-md-8 header">
                <!-- header lists -->
                <ul view="head">
                    @if ((Auth::user() == null))
                        <li>
                            <a href="{{ route('get_signin') }}" data-toggle="">
                                <span class="fa fa-unlock-alt" aria-hidden="true"></span>
                                {{ trans('common.header.sign_in') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('get_signup') }}" data-toggle="">
                                <span class="fa fa-pencil-square-o" aria-hidden="true"></span>
                                {{ trans('common.header.sign_up') }}
                            </a>
                        </li>
                        <li>
                            <a view="cart" href="{{ route('cart') }}">
                                <span class="fa fa-cart-arrow-down" aria-hidden="true"></span>
                                {{ trans('common.header.cart') }}(<span
                                        id="count_cart">{{ Cart::instance('default')->count() }}</span>)
                            </a>
                        </li>
                        <li>
                            <a view="compare" href="{{ route('get_compare') }}">
                                <span class="fa fa-balance-scale" aria-hidden="true"></span>
                                {{ trans('common.header.compare') }}(<span
                                        id="count_compare">{{ Cart::instance('compare')->count() }}</span>)
                            </a>
                        </li>
                    @else
                        <li>
                            <div view="dropdown" class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                    <b class="fa fa-bell-o count_notify"></b>
                                    (<span>{{ count(auth()->user()->unreadNotifications) }}</span>)
                                    <span class="caret"></span>
                                </a>

                                @if(auth()->user()->unreadNotifications->count())
                                    <ul class="dropdown-menu notify" style="width:300px">
                                        @foreach(auth()->user()->unreadNotifications as $no)
                                            @if(isset($no->data['product_name']))
                                                <li style="cursor: pointer">
                                                    <div class="read read1" id="{{ $no->data['product_name'] }}">
                                                        <a id="{{ $no->id }}"
                                                           class="pro">
                                                            You have order with {{ $no->data['qty'] }} product
                                                            <b>{!! ($no->data['product_name']) !!}</b><span style="font-size: 15px;color:black">{{ $no->created_at->diffForHumans()  }}</span>
                                                        </a>
                                                    </div>
                                                </li>
                                            @endif

                                            @if(isset($no->data['sender_name']))
                                                <li style="cursor: pointer">
                                                    <div class="read read2" id="{{ $no->data['sender_id'] }}">
                                                        <a class="user" id="{{ $no->id }}">
                                                            You have message from
                                                            <b>{!! ($no->data['sender_name']) !!}</b> <span style="font-size: 12px;color: black">{{ $no->created_at->diffForHumans()  }}</span>
                                                        </a>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @else
                                    <ul class="dropdown-menu notify" style="width:300px">
                                        <li>
                                            <div>
                                                <a>
                                                    {{ __('No notification') }}
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                        </li>
                        <li>
                            <a view="cart" href="{{ route('cart') }}">
                                <span class="fa fa-cart-arrow-down" aria-hidden="true"></span>
                                                                {{ trans('common.header.cart') }}
                                (<span id="count_cart">{{ Cart::instance('default')->count() }}</span>)
                            </a>
                        </li>
                        <li>
                            <a view="compare" href="{{ route('get_compare') }}">
                                <span class="fa fa-balance-scale" aria-hidden="true"></span>
                                                                {{ trans('common.header.compare') }}
                                (<span id="count_compare">{{ Cart::instance('compare')->count() }}</span>)
                            </a>
                        </li>
                        <li>
                            <div view="dropdown" class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu notify">
                                    <li>
                                        <a href="{{ route('get_profile', Auth::user()->id) }}">
                                            <span class="fa fa-user-md" aria-hidden="true"></span>
                                            {{ trans('common.header.profile') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('sell.index') }}">
                                            <span class="fa  fa-joomla" aria-hidden="true"></span>
                                            {{ trans('common.header.sell_product') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('logout')}}">
                                            <span class="fa fa-sign-out" aria-hidden="true"></span>
                                            {{ trans('common.header.sign_out') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- sub-header-->
    <div view="sub-header">
        <nav class="menu">
            <div class="tab">
                <span>
                    <a href="{{ route('home_page') }}">
                        {{ trans('common.header.home') }}
                    </a>
                </span>
            </div>
            <div class="tab">
                <div class="tab-content">
                    {{ trans('common.header.category') }}
                </div>
                <div class="sub-menu">
                    @foreach($categoriesHeader as $row)
                        <a href="{{ route('site_category', $row->id) }}">
                            <div class="item">{{ $row->name }}</div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="tab">
                <div class="tab-content">
                    {{ trans('common.header.manufacture') }}
                </div>
                <div class="sub-menu">
                    @foreach($manufacturesHeader as $row)
                        <a href="{{ route('site_manufacture', $row->id) }}">
                            <div class="item">{{ $row->name }}</div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="search-tab">
                <div id="header" view="header">
                    <div class="main">
                        <div class="search-bar">
                            {!! Form::text('key', null, ['id' => 'tags', 'onkeyup' => 'autoComplete()', 'placeholder' => trans('common.tag.search')]) !!}
                            {!! Form::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'fa fa-search search_name', 'id' => 'tag' ]) !!}
                            {!! Form::hidden('url', config('app.url_base'), ['id' => 'url']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.read a').click(function () {
            var key = $(this).attr('id');
            var url = $('#url').val();
            var sender = $('.read2').attr('id');
            var product = $('.read1').attr('id');

            if (sender) {
                window.location.href = url + 'send' + '/' + sender + '/' + key;
            }

            if (product) {
                window.location.href = url + 'interact/sold' + '/' + key;
            }
        });
    });
</script>