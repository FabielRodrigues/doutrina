<div class="form-group<?php echo e($errors->has('ciclos_id') ? ' has-error' : ''); ?>">
    <label>Escolha o ciclo desta turma</label>
    <select name="turmas_id" class="form-control" id="ciclos_id">
        <option disabled selected>Selecione...</option>
        <?php foreach($listarciclos as $ciclos): ?>
            <option value="<?php echo e($ciclos->turma_id); ?>"><?php echo e($ciclos->curso); ?> - <?php echo e($ciclos->ciclo); ?> - <?php echo e($ciclos->turma); ?></option>
        <?php endforeach; ?>
    </select>
</div>