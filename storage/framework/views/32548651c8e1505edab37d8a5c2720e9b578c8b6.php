

<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Monitores
            <small>Lista de monitores.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Lista de monitores.</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>

            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered" id="tabela">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Nascimento</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Curso</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($monitores as $mt): ?>
                        <?php
                                $curso = $mt->listarMonitores($mt->id);


                        ?>
                        <tr>
                            <td><?php echo e($mt->name); ?></td>
                            <td><?php echo e($mt->nascimento); ?></td>
                            <td><?php echo e($mt->email); ?></td>
                            <td><?php echo e($mt->telefone); ?></td>
                            <td>
                                <?php foreach($curso as $cs): ?>
                                    <?php echo e($cs->sigla); ?> - <?php echo e($cs->ciclo_name); ?> <?php echo e($cs->curso_name); ?> - <?php echo e($cs->turma); ?> <br />
                                <?php endforeach; ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>