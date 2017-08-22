

<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            Editar informações de endereço
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Meu perfil</a> </li>
            <li class="active">Editar informações de endereço</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->

        <div class="box-body">

            <?php echo Form::model($enderecos, array('url' => array('/perfil/updateendereco'), 'method'=>'get')); ?>


            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="id" value="<?php echo e($enderecos->id); ?>" />
            <div class="box box-primary">
                <div class="box-body">
                    <?php echo $__env->make('aluno._endereco', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>

            <div class="box box-body">
                <div class="form-group">
                    <?php echo Form::submit('Enviar', array('class'=> 'btn btn-success')); ?> &nbsp;|&nbsp;
                    <?php echo Form::button('Voltar', array('class'=> 'btn btn-info','onclick'=>'history.back(-1)')); ?>

                </div>
            </div>

            <?php echo Form::close(); ?>


        </div>


    </section><!-- /.content -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>