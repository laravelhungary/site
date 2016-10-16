<hr>
<div class="media @if ($comment->commentable->solved == $comment->id) solved-background @endif">
    <div class="media-left">
        <a href="#">
            <img class="media-object" src="{{ $comment->user->avatar }}"
                 alt="{{ $comment->user->name }}" width="75px">
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading">{{ $comment->user->name }} <small>- <i>{{ $comment->created_at->diffForHumans() }}</i></small></h4>
        <p>{{ $comment->body }}</p>
        @if (auth()->check())
            <p>
                <?php $checkLike = $comment->likes->contains('user_id', auth()->user()->id); ?>
                <a href="#" data-action="{{ route('user.question.comment.like') }}" data-comment="{{ $comment->id }}"
                   class="btn btn-default btn-sm like @if ($checkLike) active @endif"
                   data-toggle="tooltip" data-placement="bottom"
                   title="@if ($checkLike) Mégsem tetszik a hozzászólás. @else Tetszik a hozzászólás. @endif"><i class="fa fa-thumbs-o-up"></i></a>

                @if (is_null($comment->commentable->solved))
                <a href="#" class="btn btn-success btn-sm solved"
                   data-action="{{ route('user.question.comment.solved') }}"
                   data-comment="{{ $comment->id }}" data-question="{{ $comment->commentable->id }}"
                   data-toggle="tooltip" data-placement="bottom"
                   title="Ez volt a megoldás, köszönöm."><i class="fa fa-check"></i></a>
                @endif
            </p>
        @endif
    </div>
</div>
