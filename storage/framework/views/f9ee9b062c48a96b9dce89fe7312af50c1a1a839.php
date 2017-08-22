<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            CURSOS
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
                <?php echo Form::model($curso, array('url' => array('/curso/update', $curso->id), 'method'=>'get')); ?>


                <?php echo $__env->make('curso._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo Form::close(); ?>

            </div>
        </div>

    </section><!-- /.content -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>