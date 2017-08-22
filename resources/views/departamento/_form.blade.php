<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('Nome') !!}
    {!! Form::text('name', null, array('class' => 'form-control', 'required' => 'required' )) !!}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('sigla') ? ' has-error' : '' }}">
    {!! Form::label('Sigla') !!}
    {!! Form::text('sigla', null, array('class' => 'form-control', 'required' => 'required' )) !!}
    @if ($errors->has('sigla'))
        <span class="help-block">
            <strong>{{ $errors->first('sigla') }}</strong>
        </span>
    @endif
</div>
<hr>
<div class="form-group">
    {!! Form::submit('Enviar', array('class'=> 'btn btn-success')) !!} &nbsp;|&nbsp;
    {!! Form::button('Voltar', array('class'=> 'btn btn-info','onclick'=>'history.back(-1)')) !!}
</div>