<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('Nome') !!}
    {!! Form::text('name', null, array('class' => 'form-control' )) !!}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
