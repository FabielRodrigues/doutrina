<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('Nome') !!}
    {!! Form::text('name', null, array('class' => 'form-control' )) !!}
    @if ($errors->has('name'))
        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
    @endif
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    {!! Form::label('Descrição') !!}
    {!! Form::text('description', null, array('class' => 'form-control' )) !!}
    @if ($errors->has('description'))
        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
    @endif
</div>

<div class="form-group">
    {!! Form::submit('Enviar', array('class'=> 'btn btn-success')) !!} &nbsp;|&nbsp;
    {!! Form::button('Voltar', array('class'=> 'btn btn-info','onclick'=>'history.back(-1)')) !!}
</div>