<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <?php echo Form::label('Nome'); ?>

    <?php echo Form::text('name', null, array('class' => 'form-control' )); ?>

    <?php if($errors->has('name')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('name')); ?></strong>
        </span>
    <?php endif; ?>
</div>
