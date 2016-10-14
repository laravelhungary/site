@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-8">
			<div class="panel">
				<div class="panel-body">
					<div class="media">
						<div class="media-body">
					  		<h4 class="media-heading">{{ $question->title }}</h4>
					    	<p><small>
					    		<i class="glyphicon glyphicon-time"></i> kérdezte {{ $question->created_at->diffForHumans() }} - 
					    		<a href="#">{{ $question->user->name }}</a>
				    		</small></p>
					  	</div>
					</div>
					<div class="media">
						<div class="media-body">
						{{ $question->content }}
						</div>
					</div>
				</div>
			</div>

			<div class="panel">
				<div class="panel-body">
					@if (auth()->check())
						<a href="#" id="like_to_answer">Szeretnék válaszolni neki</a>
						<div id="answer_form" class="hidden">
							@include('user.question.partial_comment', ['commentableId' => $question->id])
						</div>
					@else
						<div class="alert alert-warning text-center">
							Ha válaszolni szeretnél erre a kérdésre, akkor kérlek <a href="{{ url('login') }}">jelentkezz be</a>.
						</div>
					@endif
				</div>
				<div class="panel-body">
					@foreach($comments as $comment)
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
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
	<script>
		$(document).on('click', 'a#like_to_answer', function (event) {
			event.preventDefault();
			var event_link = $(this);
			if ($('#answer_form').hasClass('hidden')) {
				$('#answer_form').removeClass('hidden');
				event_link.html('Űrlap elrejtése');
				return;
			}
			$('#answer_form').addClass('hidden');
			event_link.html('Szeretnék válaszolni neki');

		})
	</script>
@endsection
