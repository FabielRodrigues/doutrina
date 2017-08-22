<input type="hidden" name="users_id" value="{{ $id }}" />
<div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
    {!! Form::label('CPF') !!}
    {!! Form::text('cpf', null, array('class' => 'form-control', 'id' => 'cpf' )) !!}
    @if ($errors->has('cpf'))
        <span class="help-block">
            <strong>{{ $errors->first('cpf') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
    {!! Form::label('Telefone') !!}
    {!! Form::text('telefone', null, array('class' => 'form-control', 'id' => 'telefone' )) !!}
    @if ($errors->has('telefone'))
        <span class="help-block">
            <strong>{{ $errors->first('telefone') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
    {!! Form::label('Celular') !!}
    {!! Form::text('celular', null, array('class' => 'form-control', 'id' => 'celular' )) !!}
    @if ($errors->has('celular'))
        <span class="help-block">
            <strong>{{ $errors->first('celular') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
    <label>Sexo</label>
    <select name="sexo" class="form-control">
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
    </select>
</div>
<div class="form-group{{ $errors->has('nascimento') ? ' has-error' : '' }}">
    {!! Form::label('Data de nascimento') !!}
    {!! Form::text('nascimento', null, array('class' => 'form-control', 'id' => 'date' )) !!}
    @if ($errors->has('nascimento'))
        <span class="help-block">
            <strong>{{ $errors->first('nascimento') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('formacao') ? ' has-error' : '' }}">
    {!! Form::label('Formação') !!}
    {!! Form::text('formacao', null, array('class' => 'form-control' )) !!}
    @if ($errors->has('formacao'))
        <span class="help-block">
            <strong>{{ $errors->first('formacao') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('profissao') ? ' has-error' : '' }}">
    {!! Form::label('Profissão') !!}
    {!! Form::text('profissao', null, array('class' => 'form-control' )) !!}
    @if ($errors->has('profissao'))
        <span class="help-block">
            <strong>{{ $errors->first('profissao') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('habilidade') ? ' has-error' : '' }}">
    {!! Form::label('Habilidade') !!}
    {!! Form::text('habilidade', null, array('class' => 'form-control' )) !!}
    @if ($errors->has('habilidade'))
        <span class="help-block">
            <strong>{{ $errors->first('habilidade') }}</strong>
        </span>
    @endif
</div>
@section('view.scripts')
    <script type="text/javascript">
        jQuery(function($) {
            $("#cep").mask("99.999-999");

            $("#date").mask("99/99/9999");

            $("#cpf").mask("999.999.999-99");

            $("#telefone").mask("(99) 9999-9999");

            $("#celular").mask("(99) 99999-9999");
        });
    </script>
@endsection