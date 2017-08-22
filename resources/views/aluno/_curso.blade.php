<div class="form-group{{ $errors->has('ciclos_id') ? ' has-error' : '' }}">
    <label>Escolha o ciclo desta turma</label>
    <select name="turmas_id" class="form-control" id="ciclos_id">
        <option disabled selected>Selecione...</option>
        @foreach($listarciclos as $ciclos)
            <option value="{{ $ciclos->turma_id }}">{{ $ciclos->curso }} - {{ $ciclos->ciclo }} - {{ $ciclos->turma }}</option>
        @endforeach
    </select>
</div>