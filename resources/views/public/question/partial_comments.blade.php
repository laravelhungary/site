<hr>
<div class="media">
    <div class="media-left">
        <a href="#">
            <img class="media-object" src="{{ $comment->user->avatar }}"
                 alt="{{ $comment->user->name }}" width="75px">
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading">{{ $comment->user->name }}</h4>
        <p><i>{{ $comment->created_at->diffForHumans() }}</i></p>
        <p>{{ $comment->body }}</p>
        <p>
            <?php $checkLike = $comment->likes->contains('user_id', auth()->user()->id); ?>
            <a href="#" data-action="{{ route('user.question.comment.like') }}" data-comment="{{ $comment->id }}"
               class="btn btn-default btn-sm like @if ($checkLike) active @endif"
               data-toggle="tooltip" data-placement="bottom"
               title="@if ($checkLike) Mégsem tetszik a hozzászólás. @else Tetszik a hozzászólás. @endif"><i class="fa fa-thumbs-o-up"></i></a>
            <a href="#" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ez volt a megoldás, köszönöm."><i class="fa fa-check"></i></a>
        </p>
    </div>
</div>
@section('js')
    <script src="{{ asset('js/modul/like.js') }}"></script>
@endsection
