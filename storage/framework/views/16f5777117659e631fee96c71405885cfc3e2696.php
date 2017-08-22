<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <?php echo Form::label('Nome'); ?>

    <?php echo Form::text('name', null, array('class' => 'form-control', 'required' => 'required' )); ?>

    <?php if($errors->has('name')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('name')); ?></strong>
        </span>
    <?php endif; ?>
</div>

<div class="form-group<?php echo e($errors->has('sigla') ? ' has-error' : ''); ?>">
    <label>Departamento</label>
    <select name="departamentos_id" class="form-control">
        <option disabled selected>Selecione...</option>
        <?php foreach($listarDepartamentos as $ld): ?>
            <option value="<?php echo e($ld->id); ?>"><?php echo e($ld->name); ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
    <label>Ativo no formulário de inscrição?</label>
    <select name="status" class="form-control">
        <option disabled selected>Selecione...</option>
        <option value="1">Sim</option>
        <option value="0">Não</option>
    </select>
</div>

<hr>
<div class="form-group">
    <?php echo Form::submit('Enviar', array('class'=> 'btn btn-success')); ?> &nbsp;|&nbsp;
    <?php echo Form::button('Voltar', array('class'=> 'btn btn-info','onclick'=>'history.back(-1)')); ?>

</div>