<input type="hidden" name="users_id" value="{{ $id }}" />
<div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
    {!! Form::label('Endereço') !!}
    {!! Form::text('endereco', null, array('class' => 'form-control' )) !!}
    @if ($errors->has('endereco'))
        <span class="help-block">
            <strong>{{ $errors->first('endereco') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('complemento') ? ' has-error' : '' }}">
    {!! Form::label('Complemento') !!}
    {!! Form::text('complemento', null, array('class' => 'form-control' )) !!}
    @if ($errors->has('complemento'))
        <span class="help-block">
            <strong>{{ $errors->first('complemento') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('cidade') ? ' has-error' : '' }}">
    {!! Form::label('Cidade') !!}
    {!! Form::text('cidade', null, array('class' => 'form-control' )) !!}
    @if ($errors->has('cidade'))
        <span class="help-block">
            <strong>{{ $errors->first('cidade') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
    <label>Estado</label>
    <select name="estado" class="form-control">
        <option value="AC">Acre</option>
        <option value="AL">Alagoas</option>
        <option value="AP">Amapá</option>
        <option value="AM">Amazonas</option>
        <option value="BA">Bahia</option>
        <option value="CE">Ceará</option>
        <option value="DF" selected>Distrito Federal</option>
        <option value="ES">Espirito Santo</option>
        <option value="GO">Goiás</option>
        <option value="MA">Maranhão</option>
        <option value="MS">Mato Grosso do Sul</option>
        <option value="MT">Mato Grosso</option>
        <option value="MG">Minas Gerais</option>
        <option value="PA">Pará</option>
        <option value="PB">Paraíba</option>
        <option value="PR">Paraná</option>
        <option value="PE">Pernambuco</option>
        <option value="PI">Piauí</option>
        <option value="RJ">Rio de Janeiro</option>
        <option value="RN">Rio Grande do Norte</option>
        <option value="RS">Rio Grande do Sul</option>
        <option value="RO">Rondônia</option>
        <option value="RR">Roraima</option>
        <option value="SC">Santa Catarina</option>
        <option value="SP">São Paulo</option>
        <option value="SE">Sergipe</option>
        <option value="TO">Tocantins</option>
    </select>
</div>
<div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
    {!! Form::label('CEP') !!}
    {!! Form::text('cep', null, array('class' => 'form-control', 'id' => 'cep' )) !!}
    @if ($errors->has('cep'))
        <span class="help-block">
            <strong>{{ $errors->first('cep') }}</strong>
        </span>
    @endif
</div>
@section('view.scripts')
    <script type="text/javascript">
        jQuery(function($) {
            $("#cep").mask("99.999-999");
        });
    </script>
@endsection