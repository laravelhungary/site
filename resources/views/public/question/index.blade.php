@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-8">
			<div class="panel">
				<a href="{{ route('user.question.create') }}" class="btn btn-primary">Új kérdés beküldése</a>
			</div>
			@foreach($questions as $question)
			<div class="panel">
				<div class="panel-body">
					<div class="media">
						<div class="media-body">
					  		<h4 class="media-heading">
								<a href="{{ route('page.question.show', [$question->public_id, $question->slug]) }}">{{ $question->title }}</a>
								@if ($question->solved)
									<span class="label label-success pull-right">Megoldva</span>
								@endif
							</h4>
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
