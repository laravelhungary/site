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
		</div>
	</div>
</div>
@endsection