<?php $__env->startSection('content'); ?>
    <!--contact start here-->
    <div class="contact" style="background: #FFF;">
        <div class="container">
            <div class="contact-main">
                <div class="contact-top">
                    <h2>Área de estudo doutrinário do Gaeeb</h2>
                    <p>Acesse o sistema para atualizar as informações e fazer donwload do material referente ao seu curso.</p>
                </div>
                <div class="contact-block1 center">
                    <div class="login-box container col-lg-offset-3 col-md-offset-3 col-xs-6">
                        <div class="login-box-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>">

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                            <label for="password-confirm" class="col-md-4 control-label">Confirma Senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                <?php if($errors->has('password_confirmation')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('telefone') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input id="telefone" type="telefone" class="form-control" name="telefone">

                                <?php if($errors->has('telefone')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('telefone')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('endereco') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">Endereço</label>

                            <div class="col-md-6">
                                <input id="endereco" type="endereco" class="form-control" name="endereco">

                                <?php if($errors->has('endereco')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('endereco')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('complemento') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">Complemento</label>

                            <div class="col-md-6">
                                <input id="complemento" type="complemento" class="form-control" name="complemento">

                                <?php if($errors->has('complemento')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('complemento')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('cidade') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">Cidade</label>

                            <div class="col-md-6">
                                <input id="cidade" type="cidade" class="form-control" name="cidade">

                                <?php if($errors->has('cidade')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('cidade')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('estado') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">Estado</label>

                            <div class="col-md-6">
                                <select name="estado" class="form-control">
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF" selected>Distrito Federal</option>
                                    <option value="ES">Espirito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>

                                <?php if($errors->has('estado')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('estado')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('cep') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">CEP</label>

                            <div class="col-md-6">
                                <input id="cep" type="cep" class="form-control" name="cep">

                                <?php if($errors->has('cep')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('cep')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('cep') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">Curso</label>

                            <div class="col-md-6">
                               <select name="curso" class="form-control">
                                   <option selected disabled>Selecione um curso...</option>
                                   <?php foreach($cursos as $curso): ?>
                                       <option value="<?php echo e($curso->name); ?>"><?php echo e($curso->name); ?></option>
                                   <?php endforeach; ?>
                               </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('view.scripts'); ?>
    <script type="text/javascript">
        jQuery(function($) {
            $("#cep").mask("99.999-999");
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>