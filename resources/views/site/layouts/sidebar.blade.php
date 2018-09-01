<div class="range">
    <h3 class="agileits-sear-head">{{ trans('common.aside.search_price') }}</h3>
    <div view="sidebar">
        <div class="input">
            {!! Form::number('from', null, ['placeholder' => trans('common.aside.from'), 'id' => 'from']) !!}
            <div class="bottom-line"></div>
        </div>
        <div class="input">
            {!! Form::number('to', null, ['placeholder' => trans('common.aside.to'), 'id' => 'to']) !!}
        </div>
        {!! Form::button(trans('common.tag.search'), ['type' => 'submit', 'class' => 'search_price']) !!}
    </div>
</div>
<div class="range">
    <h3 class="agileits-sear-head">{{ trans('common.aside.search_local') }}</h3>
    <div view="sidebar">
        {!! Form::select('address', $address, null, ['class' => 'span2 col-md-2 form-control address1', 'placeholder' => 'Choose location']) !!}
        {!! Form::button(trans('common.tag.search'), ['type' => 'submit', 'class' => 'btn-address']) !!}
        {!! Form::hidden('url', config('app.url_base'), ['id' => 'url']) !!}
    </div>
</div>
<div class="left-side">
    <h3 class="agileits-sear-head">{{ trans('common.aside.news') }}</h3>
    <ul>
        @foreach($newsSidebar as $row)
            <div class="news">
                <div class="image">
                    <a href="{{ route('news_detail', $row->id) }}">
                        <img src="{{ url(config('app.newsUrl')) }}/{{ $row->avatar }}">
                    </a>
                </div>
                <div class="info">
                    <div class="em">
                        <a href="{{ route('news_detail', $row->id) }}">
                            {{ $row->title }}
                        </a>
                    </div>

                    <div>
                        <a href="{{ route('news_detail', $row->id) }}" style="height: 2em">
                            <button>{{ trans('common.tag.view_news') }}</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </ul>
</div>

