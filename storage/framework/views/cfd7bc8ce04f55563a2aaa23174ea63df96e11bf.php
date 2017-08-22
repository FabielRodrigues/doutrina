<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Permissões
            <small>Lista de permissões no sistema.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Permissões</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">
                    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('Cadastrar permissões')): ?>
                        <a href="<?php echo e(url('permissions/create')); ?>" class="btn btn-success btn-sm">CADASTRAR</a>
                    <?php endif; ?>
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
                    <div class="alert alert-info">
                        <strong><?php echo e(session('status')); ?></strong>
                    </div>
                <?php endif; ?>
                <table class="table table-striped table-bordered" id="tabela">
                    <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Descrição</td>
                        <td>Ações</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($permission as $id): ?>
                        <tr>
                            <td><?php echo e($id->name); ?></td>
                            <td><?php echo e($id->description); ?></td>
                            <td>
                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('Editar permissões')): ?>
                                    <a href='<?php echo e(url("/permissions/edit/$id->id")); ?>' class="btn btn-warning btn-sm">Editar</a> &nbsp; | &nbsp;
                                <?php endif; ?>
                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('Deletar permissões')): ?>
                                    <a href='<?php echo e(url("/permissions/destroy/$id->id")); ?>' class="btn btn-danger btn-sm">Excluir</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>