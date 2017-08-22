<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Relatórios
            <small>Lista as turmas para realização da um relatório.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Relatórios.</li>
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
                <?php if(session('status')): ?>
                    <div class="alert alert-danger">
                        <strong><?php echo e(session('status')); ?></strong>
                    </div>
                <?php endif; ?>
                <table class="table table-striped table-bordered" id="tabela">
                    <thead>
                    <tr>
                        <th>Turma</th>
                        <th>Ciclo</th>
                        <th>Curso</th>
                        <th>Vagas</th>
                        <th>Dia</th>
                        <th>Horário</th>
                        <th>Ano</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($listar as $cr): ?>

                        <tr>
                            <td><?php echo e($cr->turma); ?></td>
                            <td><?php echo e($cr->ciclo_name); ?></td>
                            <td><?php echo e($cr->curso_name); ?></td>
                            <td><?php echo e($cr->vagas); ?></td>
                            <td><?php echo e($cr->dia); ?></td>
                            <td><?php echo e($cr->horario); ?></td>
                            <td><?php echo e($cr->ano); ?></td>
                            <td>
                                <a href='<?php echo e(url("relatorios/relatorioperiodico/$cr->id")); ?>' class="btn btn-default btn-sm">Periódico</a> &nbsp;|&nbsp;
                                <a href='<?php echo e(url("relatorios/listaralunos/$cr->id")); ?>' class="btn btn-default btn-sm">Por Turma</a>
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