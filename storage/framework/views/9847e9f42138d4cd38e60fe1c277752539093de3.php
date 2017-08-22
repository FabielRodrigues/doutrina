<?php $__env->startSection('content'); ?>

                <div class="banner-main">
                    <section class="slider">
                        <div class="flexslider">
                            <ul class="slides">
                                <li>
                                    <div class="banner-main">
                                        <h3>Lavradores</h3>
                                        <p>Ninguém logrará o resultado excelente, sem es- forçar-se, conferindo à obra do bem o melhor de si mesmo.</p>
                                        <div class="clearfix"> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="banner-main">
                                        <h3>Conquista da compaixão</h3>
                                        <p>Compaixão é a porta que se nos abre no sentimento para a luz do verdadeiro amor, entretanto, notemos: ninguém adquire a piedade sem construí-la.</p>
                                        <div class="clearfix"> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="banner-main">
                                        <h3>Meninos espirituais</h3>
                                        <p>Os discípulos de boa­ vontade necessitam da sincera atitude de observação e tolerância. É natural que se regozijem com o alimento rico e substancioso com que lhes é dado nutrir a alma; no entanto, não desprezem outros irmãos, cujo organismo espiritual ainda não tolera senão o leite simples dos primeiros conhecimentos.</p>
                                        <div class="clearfix"> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="banner-main">
                                        <h3>Serve e confia</h3>
                                        <p>Se repontam horas de crise nos encargos que te competem, mantém-te firme no lugar de trabalho em que o mundo te colocou e cultiva a certeza de que não te faltará auxílio para a concretização do bem a que te dedicas.</p>
                                        <div class="clearfix"> </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"> </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!--header end here-->
    <!-- FlexSlider -->
    <script defer src="js/jquery.flexslider.js"></script>
    <script type="text/javascript">
        $(function(){
        });
        $(window).load(function(){
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider){
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
    <!-- FlexSlider -->
    <!--banner end here-->
    <!--educate logos start here-->
    <div class="educate">
        <div class="container">
            <div class="education-main">
                <ul class="ch-grid">
                    <div class="col-md-4 w3agile">
                        <li>
                            <div class="ch-item">
                                <div class="ch-info">
                                    <div class="ch-info-front ch-img-1">
                                        <span class="glyphicon glyphicon-grain" aria-hidden="true"> </span>
                                        <h5>DEF</h5>
                                    </div>
                                    <div class="ch-info-back">
                                        <h3>DEF</h3>
                                        <p>Departamento de Estudo e Formação Doutrinária</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                    <div class="col-md-4 w3agile">
                        <li>
                            <div class="ch-item">
                                <div class="ch-info">
                                    <div class="ch-info-front ch-img-2">
                                        <span class="glyphicon glyphicon-education" aria-hidden="true"> </span>
                                        <h5>DIJ</h5>
                                    </div>
                                    <div class="ch-info-back">
                                        <h3>DIJ</h3>
                                        <p>
                                            Mocidade
                                        </p>
                                        <p>
                                            Evangelização
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                    <div class="col-md-4 w3agile">
                        <li>
                            <div class="ch-item">
                                <div class="ch-info">
                                    <div class="ch-info-front ch-img-3">
                                        <span class="glyphicon glyphicon-hourglass" aria-hidden="true"> </span>
                                        <h5>DAS</h5>
                                    </div>
                                    <div class="ch-info-back">
                                        <h3>DAS</h3>
                                        <p>Departamento de Assistência e Promoção Social</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>

                    <div class="clearfix"> </div>
                </ul>
            </div>
        </div>
    </div>
    <!--educate logos end here-->
    <!--pop-up-box-->
    <script type="text/javascript" src="js/modernizr.custom.53451.js"></script>
    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
    <!--pop-up-box-->

    <!--watch start here-->
    <div class="watch-video">
        <div class="container">
            <div class="watch-video-main">
                <div class="video-bottom">
                    <a class="play-icon popup-with-zoom-anim" href="#small-dialog5"> <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"> </span> </a>
                    <!--video-->
                    <div id="small-dialog5" class="mfp-hide">
                        <iframe width="640" height="361" src="https://www.youtube.com/embed/yDZk-gcp_KE?ecver=1" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('.popup-with-zoom-anim').magnificPopup({
                                type: 'inline',
                                fixedContentPos: false,
                                fixedBgPos: true,
                                overflowY: 'auto',
                                closeBtnInside: true,
                                preloader: false,
                                midClick: true,
                                removalDelay: 300,
                                mainClass: 'my-mfp-zoom-in'
                            });

                        });
                    </script>
                </div>


                <h3>Assista nosso vídeo</h3>
            </div>
        </div>
    </div>
    <!--watch end here-->

    <script src="js/responsiveslides.min.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            $("#slider2").responsiveSlides({
                auto: true,
                pager: true,
                speed: 300,
                namespace: "callbacks",
            });
        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>