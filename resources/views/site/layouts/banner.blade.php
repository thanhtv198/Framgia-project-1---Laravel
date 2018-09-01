<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Carousel indicators -->
    <ol class="carousel-indicators">
        @php $i = 0 @endphp
        @foreach($slideSidebar as $slide)
            <li data-target="#myCarousel" data-slide-to="{{ $i }}"
                @if ($i == 0)
                class="active"
                    @endif
            >
            </li>
            @php $i++ @endphp
        @endforeach
    </ol>
    <div class="carousel-inner" role="listbox">
        @php $i = 0; @endphp
        @foreach($slideSidebar as $slide)
            <div
                    @if ($i == 0)
                    class="item active"
                    @else
                    class="item item{{ $i }}"
                    @endif
            >
                @php $i++ ; @endphp
                <img class="img_news" src="{{ url(config('app.slideUrl')) }}/{{ $slide->avatar }}"/>
            </div>
        @endforeach
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </a>
</div>

