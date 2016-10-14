@if(auth()->check())
    {!! Form::open(['url' => route('user.question.comment.store'), 'method' => 'POST']) !!}
    {!! Form::hidden('commentable_id', $commentableId) !!}
    <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
        {!! Form::label('body', 'Válasz') !!}
        {!! Form::textarea('body', old('body'), ['class' => 'form-control']) !!}
        {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Küldés', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

@endif
