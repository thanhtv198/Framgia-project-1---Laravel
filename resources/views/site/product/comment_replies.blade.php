@foreach ($comments as $comment)
    @if($comment->parent_id == null)
        <div class="display-comment">
            <strong>{{ $comment->user->name }}</strong>
            <span>({{ count($comment->replies) }} {{ trans('common.product_detail.replies') }})</span></br>
            @if ($comment->user->id == $seller)
                <div id="comment-admin">
                    <b id="b-admin">{{ trans('common.product_detail.seller') }}</b>
                </div>
            @endif
            <p id="time-comment">{{$comment->updated_at->diffForHumans() }} </p>
            <span id="content-comment">{{ $comment->content }}</span>
            @if (Auth::user())
                {!! Form::open(['route' => ['reply_add', 'method' => 'post', 'class' => 'form-comment']]) !!}
                <div class="form-group">
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                    {!! Form::hidden('product_id', $product->id ) !!}
                    {!! Form::hidden('comment_id', $comment->id ) !!}
                </div>
                {!! Form::button(trans('common.product_detail.replies'), ['type' => 'submit', 'class' => 'btn btn-info']) !!}
                {!! Form::close() !!}
            @endif
            <div class="wrap-rep">
                @foreach ($comment->replies as $row)
                    <div class="rep-comment">
                        <strong>{{ $row->user->name }}</strong></br>
                        @if ($row->user->id == $seller)
                            <div id="comment-admin">
                                <b id="b-admin">{{ trans('common.product_detail.seller') }}</b>
                            </div>
                        @endif
                        <p id="time-comment">{{ $row->updated_at->diffForHumans() }} </p>
                        <span id="content-comment">{{ $row->content}}</span>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endforeach

