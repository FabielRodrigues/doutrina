<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            Informações complementares
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Alunos</a> </li>
            <li class="active">Cadastrar aluno menor</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->

        <div class="box-body">

            <?php echo Form::model($criancas, array('url' => array('/aluno/updatecrianca', $criancas->id), 'method'=>'get')); ?>


            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Informações a respeito da criança</h3>
                </div>
                <div class="box-body">
                    <?php echo $__env->make('aluno._crianca', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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