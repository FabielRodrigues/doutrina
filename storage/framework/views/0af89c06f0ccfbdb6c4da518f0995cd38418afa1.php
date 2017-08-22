

<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            Editar informações pessoais
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Meu perfil</a> </li>
            <li class="active">Editar informações pessoais</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->

        <div class="box-body">

            <?php echo Form::model($adultos, array('url' => array('/perfil/updatesobre'))); ?>


            <input type="hidden" name="id" value="<?php echo e($adultos->id); ?>" />
            <div class="box box-primary">
                <div class="box-body">
                    <?php echo $__env->make('aluno._adulto', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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