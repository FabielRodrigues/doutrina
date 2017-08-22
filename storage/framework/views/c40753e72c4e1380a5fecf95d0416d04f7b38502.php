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

                            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                                <?php echo e(csrf_field()); ?>


                                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <label for="email" class="col-md-4 control-label">E-mail</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="<?php echo e(old('email')); ?>">

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

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Me lembrar
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-sign-in"></i> Login
                                        </button>
                                        <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">Esqueceu sua
                                            senha?</a>
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

<?php echo $__env->make('layouts.site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>