<input type="hidden" name="users_id" value="<?php echo e($id); ?>" />
<div class="form-group<?php echo e($errors->has('cpf') ? ' has-error' : ''); ?>">
    <?php echo Form::label('CPF'); ?>

    <?php echo Form::text('cpf', null, array('class' => 'form-control', 'id' => 'cpf' )); ?>

    <?php if($errors->has('cpf')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('cpf')); ?></strong>
        </span>
    <?php endif; ?>
</div>
<div class="form-group<?php echo e($errors->has('telefone') ? ' has-error' : ''); ?>">
    <?php echo Form::label('Telefone'); ?>

    <?php echo Form::text('telefone', null, array('class' => 'form-control', 'id' => 'telefone' )); ?>

    <?php if($errors->has('telefone')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('telefone')); ?></strong>
        </span>
    <?php endif; ?>
</div>
<div class="form-group<?php echo e($errors->has('celular') ? ' has-error' : ''); ?>">
    <?php echo Form::label('Celular'); ?>

    <?php echo Form::text('celular', null, array('class' => 'form-control', 'id' => 'celular' )); ?>

    <?php if($errors->has('celular')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('celular')); ?></strong>
        </span>
    <?php endif; ?>
</div>
<div class="form-group<?php echo e($errors->has('sexo') ? ' has-error' : ''); ?>">
    <label>Sexo</label>
    <select name="sexo" class="form-control">
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
    </select>
</div>
<div class="form-group<?php echo e($errors->has('nascimento') ? ' has-error' : ''); ?>">
    <?php echo Form::label('Data de nascimento'); ?>

    <?php echo Form::text('nascimento', null, array('class' => 'form-control', 'id' => 'date' )); ?>

    <?php if($errors->has('nascimento')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('nascimento')); ?></strong>
        </span>
    <?php endif; ?>
</div>
<div class="form-group<?php echo e($errors->has('formacao') ? ' has-error' : ''); ?>">
    <?php echo Form::label('Formação'); ?>

    <?php echo Form::text('formacao', null, array('class' => 'form-control' )); ?>

    <?php if($errors->has('formacao')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('formacao')); ?></strong>
        </span>
    <?php endif; ?>
</div>

<div class="form-group<?php echo e($errors->has('profissao') ? ' has-error' : ''); ?>">
    <?php echo Form::label('Profissão'); ?>

    <?php echo Form::text('profissao', null, array('class' => 'form-control' )); ?>

    <?php if($errors->has('profissao')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('profissao')); ?></strong>
        </span>
    <?php endif; ?>
</div>

<div class="form-group<?php echo e($errors->has('habilidade') ? ' has-error' : ''); ?>">
    <?php echo Form::label('Habilidade'); ?>

    <?php echo Form::text('habilidade', null, array('class' => 'form-control' )); ?>

    <?php if($errors->has('habilidade')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('habilidade')); ?></strong>
        </span>
    <?php endif; ?>
</div>
<?php $__env->startSection('view.scripts'); ?>
    <script type="text/javascript">
        jQuery(function($) {
            $("#cep").mask("99.999-999");

            $("#date").mask("99/99/9999");

            $("#cpf").mask("999.999.999-99");

            $("#telefone").mask("(99) 9999-9999");

            $("#celular").mask("(99) 99999-9999");
        });
    </script>
<?php $__env->stopSection(); ?>