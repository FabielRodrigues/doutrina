<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Usuários
            <small>Usuários do sistema.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Usuários</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('Editar usuários')): ?>
                    <h3 class="box-title"><a href="<?php echo e(url('users/create')); ?>" class="btn btn-success btn-sm">CADASTRAR</a></h3>
                <?php endif; ?>
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
                        <td>E-mail</td>
                        <td>Ações</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td>
                                <?php if(Auth::user()->id != $user->id): ?>
                                <?php else: ?>
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal">Foto</button>
                                    &nbsp;|&nbsp;
                                    <a href="<?php echo e(url("users/password/$user->id")); ?>" class="btn btn-success btn-sm">Alterar senha</a>
                                    &nbsp;|&nbsp;
                                <?php endif; ?>
                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('Editar usuários')): ?>
                                    <a href='<?php echo e(url("users/edit/$user->id")); ?>' class="btn btn-primary btn-sm">Editar</a>
                                    &nbsp;|&nbsp;
                                <?php endif; ?>
                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('Deletar usuários')): ?>
                                    <a href="<?php echo e(url("users/destroy/$user->id")); ?>" class="btn btn-danger btn-sm">Excluir</a>
                                &nbsp;|&nbsp;
                                <?php endif; ?>
                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('Menu funções')): ?>
                                    <a href="<?php echo e(url("users/roles/$user->id")); ?>" class="btn btn-default btn-sm">Funções</a>
                                <?php endif; ?>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade modal-primary" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Atualizar foto do perfil</h4>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Current avatar -->

                                        <img class="img-responsive img-circle avatar-view" src="<?php echo e(url('/')); ?>/uploads/avatars/<?php echo e($user->avatar); ?>" alt="Avatar" title="Change the avatar">
                                        <br />
                                        <?php /*<a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>*/ ?>
                                        <form enctype="multipart/form-data" action="<?php echo e(url('users/profile')); ?>" method="post">
                                            <input type="file" name="avatar" class="form-control">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                            <br />
                                            <input type="submit" class="pull-right btn btn-sm btn-success">
                                        </form>
                                        <br />

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fim Modal -->

                            <?php endforeach; ?>
                            </tbody>
                </table>

            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>