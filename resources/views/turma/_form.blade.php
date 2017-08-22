<div class="form-group{{ $errors->has('ciclos_id') ? ' has-error' : '' }}">
    <label>Escolha o ciclo desta turma</label>
    <select name="ciclos_id" class="form-control" id="ciclos_id">
        <option disabled selected>Selecione...</option>
        @foreach($listarciclos as $ciclos)
            <option value="{{ $ciclos->id }}">{{ $ciclos->curso }} - {{ $ciclos->ciclo }}</option>
        @endforeach
    </select>
</div>
<div class="form-group{{ $errors->has('turma') ? ' has-error' : '' }}">
    {!! Form::label('Turma') !!}
    {!! Form::text('turma', null, array('class' => 'form-control', 'required' => 'required', 'id' => 'turma' )) !!}
    @if ($errors->has('turma'))
        <span class="help-block">
            <strong>{{ $errors->first('turma') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('dia') ? ' has-error' : '' }}">
    <label>Dia</label>
    <select name="dia" class="form-control" id="dia">
        <option disabled selected>Selecione...</option>
        <option value="Segunda-feira">Segunda-feira</option>
        <option value="Terça-feira">Terça-feira</option>
        <option value="Quarta-feira">Quarta-feira</option>
        <option value="Quinta-feira">Quinta-feira</option>
        <option value="Sexta-feira">Sexta-feira</option>
        <option value="Sábado">Sábado</option>
        <option value="Domingo">Domingo</option>
    </select>
</div>
<div class="form-group{{ $errors->has('horario') ? ' has-error' : '' }}">
    {!! Form::label('Horário') !!}
    {!! Form::text('horario', null, array('class' => 'form-control', 'required' => 'required', 'id' => 'horario' )) !!}
    @if ($errors->has('horario'))
        <span class="help-block">
            <strong>{{ $errors->first('horario') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('ano') ? ' has-error' : '' }}">
    {!! Form::label('Ano') !!}
    {!! Form::number('ano', null, array('class' => 'form-control', 'required' => 'required', 'min' => '1900', 'max' => '2099' )) !!}
    @if ($errors->has('ano'))
        <span class="help-block">
            <strong>{{ $errors->first('ano') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('sala') ? ' has-error' : '' }}">
    {!! Form::label('Sala') !!}
    {!! Form::text('sala', null, array('class' => 'form-control', 'required' => 'required')) !!}
    @if ($errors->has('sala'))
        <span class="help-block">
            <strong>{{ $errors->first('sala') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('vagas') ? ' has-error' : '' }}">
    {!! Form::label('Vagas') !!}
    {!! Form::number('vagas', null, array('class' => 'form-control', 'required' => 'required', 'min' => '1', 'max' => '999' )) !!}
    @if ($errors->has('vagas'))
        <span class="help-block">
            <strong>{{ $errors->first('vagas') }}</strong>
        </span>
    @endif
</div>
<hr>
<div class="form-group">
    {!! Form::submit('Enviar', array('class'=> 'btn btn-success')) !!} &nbsp;|&nbsp;
    {!! Form::button('Voltar', array('class'=> 'btn btn-info','onclick'=>'history.back(-1)')) !!}
</div>
@section('view.scripts')
    <script type="text/javascript">
        jQuery(function($) {

            $("#horario").mask("99:99hs");

        });
    </script>
@endsection