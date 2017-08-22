<input type="hidden" name="users_id" value="{{ $id }}" />
<div class="form-group{{ $errors->has('alergia') ? ' has-error' : '' }}">
    {!! Form::label('Possui alguma alergia?') !!}
    {!! Form::text('alergia', null, array('class' => 'form-control' )) !!}
    @if ($errors->has('alergia'))
        <span class="help-block">
            <strong>{{ $errors->first('alergia') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('restricao') ? ' has-error' : '' }}">
    {!! Form::label('Possui alguma restrição alimentar?') !!}
    {!! Form::text('restricao', null, array('class' => 'form-control' )) !!}
    @if ($errors->has('restricao'))
        <span class="help-block">
            <strong>{{ $errors->first('restricao') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('emergencia') ? ' has-error' : '' }}">
    {!! Form::label('Ligar pra quem em caso de emergência?') !!}
    {!! Form::text('emergencia', null, array('class' => 'form-control' )) !!}
    @if ($errors->has('emergencia'))
        <span class="help-block">
            <strong>{{ $errors->first('emergencia') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    <label>Autorização pra sair da sala?</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="autorizacao" value="SIM">
            SIM
        </label>
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox" name="autorizacao" value="NÃO">
            NÃO
        </label>
    </div>

</div>
<div class="form-group">
    <label>Assinou o termo de autorização?</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="termo" value="SIM">
            SIM
        </label>
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox" name="termo" value="NÃO">
            NÃO
        </label>
    </div>
</div>
<div class="form-group">
    <label>Assinou o direito de uso de imagem?</label>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="direito" value="SIM">
            SIM
        </label>
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox" name="direito" value="NÃO">
            NÃO
        </label>
    </div>
</div>


