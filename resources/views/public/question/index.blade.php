@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-8">
			@foreach($questions as $question)
			<div class="panel">
				<div class="panel-body">
					<div class="media">
						<div class="media-body">
					  		<h4 class="media-heading"><a href="{{ route('page.question.show', [$question->public_id, $question->slug]) }}">{{ $question->title }}</a></h4>
					    	<p><small>
					    		<i class="glyphicon glyphicon-time"></i> kérdezte {{ $question->created_at->diffForHumans() }} - 
					    		<a href="#">{{ $question->user->name }}</a>
				    		</small></p>
					  	</div>
					</div>
				</div>
			</div>
			@endforeach
			{!! $questions->links() !!}
		</div>
	</div>
</div>

@endsection