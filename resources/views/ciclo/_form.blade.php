<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('Nome') !!}
    {!! Form::text('name', null, array('class' => 'form-control', 'required' => 'required' )) !!}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('cursos_id') ? ' has-error' : '' }}">
    <label>Escolha o curso deste ciclo</label>
    <select name="cursos_id" class="form-control" id="cursos_id">
        <option disabled selected>Selecione...</option>
        @foreach($listadecursos as $curso)
            <option value="{{ $curso->id }}">{{ $curso->name }}</option>
        @endforeach
    </select>
</div>
<hr>
<div class="form-group">
    {!! Form::submit('Enviar', array('class'=> 'btn btn-success')) !!} &nbsp;|&nbsp;
    {!! Form::button('Voltar', array('class'=> 'btn btn-info','onclick'=>'history.back(-1)')) !!}
</div>