@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Új kérdés beküldése</h4></div>
					<div class="panel-body">
						@include('layouts.messages')
						{!! Form::open(['url' => route('user.question.store'), 'method' => 'POST']) !!}
						<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
							{!! Form::label('title', 'Cím:') !!}
							{!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
							{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
							{!! Form::label('content', 'Tartalom') !!}
							{!! Form::textarea('content', old('content'), ['class' => 'form-control']) !!}
							{!! $errors->first('content', '<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group">
							{!! Form::submit('Beküldés', ['class' => 'btn btn-primary']) !!}
						</div>
						{!! Form::close() !!}
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection
