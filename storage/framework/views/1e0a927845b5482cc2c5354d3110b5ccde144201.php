

<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Meu perfil
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#"> Meu perfil</a> </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if(session('status')): ?>
            <div class="alert alert-info">
                <strong><?php echo e(session('status')); ?></strong>
            </div>
    <?php endif; ?>
    <!-- Default box -->
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">

                    <div class="box-body box-profile">

                        <a href="#" data-toggle="modal" data-target="#myModal" alt="Clique para atualizar a foto.">
                            <img class="profile-user-img img-responsive img-circle" src='<?php echo e(url("/uploads/avatars/$user->avatar")); ?>' title="Editar foto" alt="User profile picture">
                        </a>
                        <h3 class="profile-username text-center"><?php echo e($user->name); ?></h3>

                        <p class="text-muted text-center"><?php echo Auth::user()->roles[0]['name']; ?></p>
                        <p class="text-muted text-center"><strong><?php echo e($user->email); ?></strong></p>
                        <br />
                        <p class="text-center">
                            <a href='<?php echo e(url("perfil/editaremail")); ?>' class="btn btn-info btn-sm">Editar e-mail</a>
                        </p>
                        <p class="text-center">
                            <a href='<?php echo e(url("perfil/alterarsenha")); ?>' class="btn btn-warning btn-sm">Alterar Senha</a>
                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="col-xs-6">
                            <h3 class="box-title">Sobre</h3>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a href='<?php echo e(route('perfil.editarsobre')); ?>'>Editar</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <?php foreach($adultos as $adulto): ?>

                            <p><strong>CPF:</strong> <?php echo e($adulto->cpf); ?></p>
                            <p><strong>Telefone:</strong> <?php echo e($adulto->telefone); ?></p>
                            <p><strong>Celular:</strong> <?php echo e($adulto->celular); ?></p>
                            <p><strong>Sexo:</strong> <?php echo e($adulto->sexo); ?></p>
                            <p><strong>Nascimento:</strong><?php echo e($adulto->nascimento); ?></p>
                            <p><strong>Formação:</strong> <?php echo e($adulto->formacao); ?></p>
                            <p><strong>Profissão:</strong> <?php echo e($adulto->profissao); ?></p>
                            <p><strong>Habilidade:</strong> <?php echo e($adulto->habilidade); ?></p>

                        <?php endforeach; ?>

                    </div>

                </div>

                <div class="box box-primary">

                    <div class="box-header with-border">
                        <div class="col-xs-6">
                            <h3 class="box-title">Endereço</h3>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a href='<?php echo e(route('perfil.editarendereco')); ?>'>Editar</a>
                        </div>
                    </div>

                    <div class="box-body">

                        <?php foreach($enderecos as $endereco): ?>

                            <p><strong>Logradouro:</strong> <?php echo e($endereco->endereco); ?></p>
                            <p><strong>Complemento:</strong> <?php echo e($endereco->complemento); ?></p>
                            <p><strong>Cidade:</strong> <?php echo e($endereco->cidade); ?></p>
                            <p><strong>Estado:</strong> <?php echo e($endereco->estado); ?></p>
                            <p><strong>CEP:</strong> <?php echo e($endereco->cep); ?></p>

                        <?php endforeach; ?>

                    </div>

                </div>

                <div class="box box-primary">

                    <div class="box-header with-border">
                        <div class="col-xs-8">
                            <h4 class="box-title">Cursos</h4>
                        </div>
                    </div>

                    <div class="box-body">

                        <?php foreach($cursos as $c): ?>
                            <p>
                                <span class="label label-danger"><?php echo e($c->name_curso); ?></span>
                                <span class="label label-success"><?php echo e($c->name_ciclo); ?></span>
                                <span class="label label-info"><?php echo e($c->turma); ?> - <?php echo e($c->ano); ?></span><br />
                            </p>
                        <?php endforeach; ?>

                    </div>

                </div>
                <a href="#" onclick="window.history.back()" class="btn btn-sm btn-info">Voltar</a>

            </div> <!-- .col-md-3 -->
        </div>
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
                        <form enctype="multipart/form-data" action="<?php echo e(url('users/update_avatar')); ?>" method="post">
                            <input type="file" name="avatar" class="form-control">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
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

    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>