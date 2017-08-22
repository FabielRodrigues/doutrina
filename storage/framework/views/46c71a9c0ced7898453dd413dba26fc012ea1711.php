<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cursos
            <small>Lista de cursos.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Lista de cursos.</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">
                        <a href="<?php echo e(url('curso/create')); ?>" class="btn btn-success btn-sm">CADASTRAR</a>
                </h3>

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
                        <th>Nome</th>
                        <th>Departamento</th>
                        <th>Formulário de inscrição?</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($listarCursos as $cr): ?>

                        <tr>
                            <td><?php echo e($cr->name); ?></td>
                            <td><?php echo e($cr->departamento->name); ?></td>
                            <td class="text-center">
                                <?php if($cr->status == 1): ?>
                                    <i class="fa fa-check-square-o"></i> SIM
                                <?php else: ?>
                                    <i class="fa fa-square-o"></i> NÃO
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href='<?php echo e(url("curso/edit/$cr->id")); ?>' class="btn btn-warning btn-sm">Editar</a>
                                &nbsp; | &nbsp;
                                <a href='<?php echo e(url("curso/destroy/$cr->id")); ?>' class="btn btn-danger btn-sm">Excluir</a>
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