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
						<a href="#" id="would_like_to_answer">Szeretnék válaszolni neki</a>
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
					@each('public.question.partial_comments', $comments, 'comment')
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('js')
	<script src="{{ asset('js/modul/like.js') }}"></script>
	<script>
		$(document).on('click', 'a#would_like_to_answer', function (event) {
			console.log('okokok');
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
@endpush
