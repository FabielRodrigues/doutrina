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
    <label>Departamento</label>
    <select name="departamentos_id" class="form-control">
        <option disabled selected>Selecione...</option>
        @foreach($listarDepartamentos as $ld)
            <option value="{{ $ld->id }}">{{ $ld->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    <label>Ativo no formulário de inscrição?</label>
    <select name="status" class="form-control">
        <option disabled selected>Selecione...</option>
        <option value="1">Sim</option>
        <option value="0">Não</option>
    </select>
</div>

<hr>
<div class="form-group">
    {!! Form::submit('Enviar', array('class'=> 'btn btn-success')) !!} &nbsp;|&nbsp;
    {!! Form::button('Voltar', array('class'=> 'btn btn-info','onclick'=>'history.back(-1)')) !!}
</div>