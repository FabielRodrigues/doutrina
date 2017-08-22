<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>Área de estudo doutrinário - GAEEB</title>
    <link href="<?php echo e(url('css/bootstrap.css')); ?>" rel="stylesheet" type="text/css" media="all">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Custom Theme files -->
    <link href="<?php echo e(url('css/style.css')); ?>" rel="stylesheet" type="text/css" media="all"/>
    <link href="<?php echo e(url('css/style1.css')); ?>" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="DEF, DIJ, DAS" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Marvel:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900' rel='stylesheet' type='text/css'>
    <!--google fonts-->
    <script src="<?php echo e(url('js/jquery-1.11.0.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(url('css/flexslider.css')); ?>" type="text/css" media="screen" />

</head>
<body>
<!--header strat here-->
<div class="banner agileits">
    <div class="header">
        <div class="container">
            <div class="header-main">
                <div class="logo">
                    <h1><span class="books"></span> <a href="<?php echo e(url('/')); ?>">Estudo Doutrinário Gaeeb</a></h1>
                </div>
                <div class="top-nav">
                    <span class="menu"> <img src="images/icon.png" alt=""></span>
                    <nav class="cl-effect-21" id="cl-effect-21">
                        <ul class="res">
                            <li><a href="<?php echo e(url('/')); ?>" class="active">Home</a></li>
                            <li><a href="<?php echo e(url('/contato')); ?>">Contato</a></li>
                            <?php if(Auth::guest()): ?>
                                <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                                <li><a href="<?php echo e(url('/register')); ?>">Cadastrar</a></li>
                            <?php else: ?>
                                <li><a href="#"><?php echo e(Auth::user()->name); ?></a></li>
                                <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-angle-down"></i>Sistema </a> </li>
                                <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                    <!-- script-for-menu -->
                    <script>
                        $( "span.menu" ).click(function() {
                            $( "ul.res" ).slideToggle( 300, function() {
                                // Animation complete.
                            });
                        });
                    </script>
                    <!-- /script-for-menu -->

                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
<?php echo $__env->yieldContent('content'); ?>
        <!--footer start here-->
            <div class="footer w3ls">
                <div class="container">
                    <div class="footer-main">
                        <div class="footer-top">
                            <div class="col-md-4 ftr-grid">
                                <h3>Sobre</h3>
                                <p style="text-align: justify;">O Estudo Sistematizado da Doutrina Espírita (ESDE); promove seminários, encontros, simpósios etc.; planeja, dirige e coordena todas as atividades afetas ao ESDE, inclusive o plano pedagógico; programa e coordena a realização de eventos de natureza evangélico-doutrinária em conjunto com os demais departamentos.</p>
                            </div>
                            <div class="col-md-4 ftr-grid">
                                <h3>Endereço</h3>
                                <div class="ftr-address">
                                    <div class="local">
                                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                    </div>
                                    <div class="ftr-text">
                                        <p>Setor D Sul, Área Especial nº 18, Taguatinga Brasília - DF</p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="ftr-address">
                                    <div class="local">
                                        <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                                    </div>
                                    <div class="ftr-text">
                                        <p>(61) 3562-4681</p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="col-md-4 ftr-grid">
                                <h3>Newsletter</h3>
                                <form action="#" method="post">
                                    <input type="text" placeholder="Digite seu E-mail"  name="Enter Email" required="">
                                    <input type="submit" value="">
                                </form>
                                <ul class="ftr-social-icons">
                                    <li><a class="fa" href="#"> </a></li>
                                    <li><a class="tw" href="#"> </a></li>
                                    <li><a class="dri" href="#"> </a></li>
                                    <li><a class="p" href="#"> </a></li>

                                </ul>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
            <div class="footer-bottom">
                <div class="col-md-6 ftr-navg">
                    <ul>
                        <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                        <li><a href="<?php echo e(url('/contato')); ?>">Contato</a></li>
                        <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(url('/register')); ?>">Cadastrar</a></li>
                        <?php else: ?>
                            <li><a href="#"><?php echo e(Auth::user()->name); ?></a></li>
                            <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-angle-down"></i>Sistema </a> </li>
                            <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-md-6 copyrights">
                    <p>© 2017 Gaeeb. Todos os direitos reservados | <a href="http://www.gaeeb.org.br/" target="_blank">GAEEB</a> </p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
<!--footer end here-->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>