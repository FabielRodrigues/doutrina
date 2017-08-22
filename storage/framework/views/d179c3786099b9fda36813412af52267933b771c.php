<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Aluno
            <small>Lista de alunos.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Lista de alunos.</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">

                <h3 class="box-title">
                        <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">CADASTRAR</a>
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
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($alunos as $al): ?>

                        <tr>
                            <td><?php echo e($al->name); ?></td>
                            <td>
                                <a href='<?php echo e(url("aluno/profile/$al->id")); ?>' class="btn btn-info btn-sm">Visualizar</a>
                                &nbsp; | &nbsp;
                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('Excluir aluno')): ?>
                                <a href='<?php echo e(url("aluno/destroy/$al->id")); ?>' class="btn btn-danger btn-sm">Excluir</a>
                                <?php endif; ?>
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
        <!-- Modal -->
        <div class="modal fade modal-primary" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Qual é o tipo do aluno que você deseja cadastrar?</h4>
                    </div>
                    <div class="modal-body">
                        <a href="<?php echo e(url('aluno/createadulto')); ?>" class="btn-success btn-block btn">Aluno com e-mail</a><br />
                        <a href="<?php echo e(url('aluno/createcrianca')); ?>" class="btn-warning btn-block btn">Aluno sem e-mail</a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- fim Modal -->

    </section>
    <!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>