
<div class="form-group<?php echo e($errors->has('endereco') ? ' has-error' : ''); ?>">
    <?php echo Form::label('Endereço'); ?>

    <?php echo Form::text('endereco', null, array('class' => 'form-control' )); ?>

    <?php if($errors->has('endereco')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('endereco')); ?></strong>
        </span>
    <?php endif; ?>
</div>
<div class="form-group<?php echo e($errors->has('complemento') ? ' has-error' : ''); ?>">
    <?php echo Form::label('Complemento'); ?>

    <?php echo Form::text('complemento', null, array('class' => 'form-control' )); ?>

    <?php if($errors->has('complemento')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('complemento')); ?></strong>
        </span>
    <?php endif; ?>
</div>
<div class="form-group<?php echo e($errors->has('cidade') ? ' has-error' : ''); ?>">
    <?php echo Form::label('Cidade'); ?>

    <?php echo Form::text('cidade', null, array('class' => 'form-control' )); ?>

    <?php if($errors->has('cidade')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('cidade')); ?></strong>
        </span>
    <?php endif; ?>
</div>
<div class="form-group<?php echo e($errors->has('estado') ? ' has-error' : ''); ?>">
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
<div class="form-group<?php echo e($errors->has('cep') ? ' has-error' : ''); ?>">
    <?php echo Form::label('CEP'); ?>

    <?php echo Form::text('cep', null, array('class' => 'form-control', 'id' => 'cep' )); ?>

    <?php if($errors->has('cep')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('cep')); ?></strong>
        </span>
    <?php endif; ?>
</div>
<?php $__env->startSection('view.scripts'); ?>
    <script type="text/javascript">
        jQuery(function($) {
            $("#cep").mask("99.999-999");
        });
    </script>
<?php $__env->stopSection(); ?>