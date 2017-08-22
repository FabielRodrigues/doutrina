<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Aluno
            <small>Visualizar perfil do aluno.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Listar alunos</a> </li>
            <li class="active">Visualizar perfil do aluno.</li>
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
                                <img class="profile-user-img img-responsive img-circle" src="<?php echo e(url('/')); ?>/uploads/avatars/<?php echo e($users->avatar); ?>" alt="User profile picture">
                            </a>
                            <h3 class="profile-username text-center"><?php echo e($users->name); ?></h3>

                            <p class="text-muted text-center">Aluno</p>
                            <p class="text-muted text-center"><strong><?php echo e($users->email); ?></strong></p>
                            <br />
                            <p class="text-center">
                                <a href='<?php echo e(url("aluno/edit/$users->id")); ?>' class="btn btn-primary btn-sm">Editar</a>
                            </p>
                            <p class="text-center">
                                <a href='<?php echo e(url("aluno/cursos/$users->id")); ?>' class="btn btn-default btn-sm">Cursos</a>
                            </p>
                            <p class="text-center">
                                <a href='<?php echo e(url("aluno/parentes/$users->id")); ?>' class="btn btn-primary btn-sm">Vincular parente</a>
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
                                <a href='<?php echo e(url("aluno/editcontato/$users->id")); ?>'>Editar</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <?php foreach($adultos as $adulto): ?>

                                <p><strong>CPF:</strong> <?php echo e($adulto->cpf); ?></p>
                                <p><strong>Telefone:</strong> <?php echo e($adulto->telefone); ?></p>
                                <p><strong>Celular:</strong> <?php echo e($adulto->celular); ?></p>
                                <p><strong>Sexo:</strong> <?php echo e($adulto->sexo); ?></p>
                                <p><strong>Nascimento:</strong> <?php echo $adulto->nascimento; ?></p>
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
                                    <a href='<?php echo e(url("aluno/editendereco/$users->id")); ?>'>Editar</a>
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
                                    <h4 class="box-title">Informações</h4>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <a href='<?php echo e(url("aluno/editcrianca/$users->id")); ?>'>Editar</a>
                                </div>
                            </div>

                            <div class="box-body">
                            <?php foreach($criancas as $crianca): ?>

                                <p><strong>Possui alguma alergia?:</strong> <?php echo e($crianca->alergia); ?></p>
                                <p><strong>Possui alguma restrição alimentar?:</strong> <?php echo e($crianca->restricao); ?></p>
                                <p><strong>Ligar pra quem em caso de emergência?</strong> <?php echo e($crianca->emergencia); ?></p>
                                <p><strong>Autorização para sair da sala?:</strong> <?php echo e($crianca->autorizacao); ?></p>
                                <p><strong>Assinou o termo de autorização?:</strong> <?php echo e($crianca->termo); ?></p>
                                <p><strong>Assinou o direito de uso de imagem?:</strong> <?php echo e($crianca->direito); ?></p>

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
            <?php foreach($parentes as $parente): ?>

            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">

                    <div class="box-body box-profile">

                        <img class="profile-user-img img-responsive img-circle" src="<?php echo e(url('/')); ?>/uploads/avatars/<?php echo e($parente->avatar); ?>" alt="User profile picture">

                        <h3 class="profile-username text-center"><?php echo e($parente->name); ?></h3>

                        <p class="text-muted text-center"><?php echo e($parente->parents); ?></p>

                        <p class="text-muted text-center"><strong><?php echo e($parente->email); ?></strong></p>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sobre</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                            <p><strong>CPF:</strong> <?php echo e($parente->cpf); ?></p>
                            <p><strong>Telefone:</strong> <?php echo e($parente->telefone); ?></p>
                            <p><strong>Celular:</strong> <?php echo e($parente->celular); ?></p>
                            <p><strong>Sexo:</strong> <?php echo e($parente->sexo); ?></p>
                            <p><strong>Nascimento:</strong> <?php echo $parente->nascimento; ?></p>
                            <p><strong>Formação:</strong> <?php echo e($parente->formacao); ?></p>
                            <p><strong>Profissão:</strong> <?php echo e($parente->profissao); ?></p>
                            <p><strong>Habilidade:</strong> <?php echo e($parente->habilidade); ?></p>

                        <hr>
                        <strong><i class="fa fa-map-marker margin-r-5"></i> Endereço</strong>
                        <hr>
                            <p><strong>Logradouro:</strong> <?php echo e($parente->endereco); ?></p>
                            <p><strong>Complemento:</strong> <?php echo e($parente->complemento); ?></p>
                            <p><strong>Cidade:</strong> <?php echo e($parente->cidade); ?></p>
                            <p><strong>Estado:</strong> <?php echo e($parente->estado); ?></p>
                            <p><strong>CEP:</strong> <?php echo e($parente->cep); ?></p>

                        <hr>
                        <strong><i class="fa fa-info margin-r-5"></i> Informações complementares</strong>
                        <hr >
                        <p><strong>Possui alguma alergia?:</strong> <?php echo e($parente->alergia); ?></p>
                        <p><strong>Possui alguma restrição alimentar?:</strong> <?php echo e($parente->restricao); ?></p>
                        <p><strong>Ligar pra quem em caso de emergência?</strong> <?php echo e($parente->emergencia); ?></p>
                        <p><strong>Autorização para sair da sala?:</strong> <?php echo e($parente->autorizacao); ?></p>
                        <p><strong>Assinou o termo de autorização?:</strong> <?php echo e($parente->termo); ?></p>
                        <p><strong>Assinou o direito de uso de imagem?:</strong> <?php echo e($parente->direito); ?></p>

                        <hr>

                    </div>

                </div>

            </div> <!-- .col-md-3 -->

            <?php endforeach; ?>

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

                        <img class="img-responsive img-circle avatar-view" src="<?php echo e(url('/')); ?>/uploads/avatars/<?php echo e($users->avatar); ?>" alt="Avatar" title="Change the avatar">
                        <br />
                        <?php /*<a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>*/ ?>
                        <form enctype="multipart/form-data" action="<?php echo e(url('users/update_avatar')); ?>" method="post">
                            <input type="file" name="avatar" class="form-control">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <input type="hidden" name="user_id" value="<?php echo e($users->id); ?>">
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