<input type="hidden" name="users_id" value="<?php echo e($id); ?>" />
<div class="form-group<?php echo e($errors->has('alergia') ? ' has-error' : ''); ?>">
    <?php echo Form::label('Possui alguma alergia?'); ?>

    <?php echo Form::text('alergia', null, array('class' => 'form-control' )); ?>

    <?php if($errors->has('alergia')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('alergia')); ?></strong>
        </span>
    <?php endif; ?>
</div>
<div class="form-group<?php echo e($errors->has('restricao') ? ' has-error' : ''); ?>">
    <?php echo Form::label('Possui alguma restrição alimentar?'); ?>

    <?php echo Form::text('restricao', null, array('class' => 'form-control' )); ?>

    <?php if($errors->has('restricao')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('restricao')); ?></strong>
        </span>
    <?php endif; ?>
</div>
<div class="form-group<?php echo e($errors->has('emergencia') ? ' has-error' : ''); ?>">
    <?php echo Form::label('Ligar pra quem em caso de emergência?'); ?>

    <?php echo Form::text('emergencia', null, array('class' => 'form-control' )); ?>

    <?php if($errors->has('emergencia')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('emergencia')); ?></strong>
        </span>
    <?php endif; ?>
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


