<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
           Editar o aluno <?php echo e($alunos->name); ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Cursos</a> </li>
            <li class="active">Editar cursos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <div class="box box-warning">
            <div class="box-body">
                <?php echo Form::model($alunos, array('url' => array('/aluno/update', $alunos->id), 'method'=>'get')); ?>


                <?php echo $__env->make('aluno._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="box box-body">
                    <div class="form-group">
                        <?php echo Form::submit('Enviar', array('class'=> 'btn btn-success')); ?> &nbsp;|&nbsp;
                        <?php echo Form::button('Voltar', array('class'=> 'btn btn-info','onclick'=>'history.back(-1)')); ?>

                    </div>
                </div>

                <?php echo Form::close(); ?>

            </div>
        </div>

    </section><!-- /.content -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>