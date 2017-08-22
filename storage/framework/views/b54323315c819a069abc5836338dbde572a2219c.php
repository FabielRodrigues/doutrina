<?php $__env->startSection('content'); ?>
    <?php
            // Contagem de Alunos
            $i = 0;
            foreach ($alunos as $al) :
                $i++;
            endforeach;
            // Contagem de cursos
            $f = 0;
            foreach ($cursos as $cu) :
                $f++;
            endforeach;
            // Contagem de turmas
            $j = 0;
            foreach ($turmas as $tu) :
                $j++;
            endforeach;
    ?>
    <section class="content-header">
        <h1>
            Painel de controle
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Painel de controle</li>
        </ol>
    </section>
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $i; ?></h3>

                        <p>Alunos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?php echo e(url('/aluno')); ?>" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $f; ?></h3>

                        <p>Cursos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo e(url('/curso')); ?>" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $j; ?></h3>

                        <p>Turmas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?php echo e(url('/turma')); ?>" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $frequencia ?></h3>

                        <p>Frenquência</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="<?php echo e(url('/frequencia')); ?>" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <div class="col-lg-12 col-xs-12">
                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('view.scripts'); ?>
    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Relatório Presencial de Alunos'
            },
            subtitle: {
                text: 'www.gaeeb.org.br'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Abr',
                    'Mai',
                    'Jun',
                    'Jul',
                    'Ago',
                    'Set',
                    'Out',
                    'Nov',
                    'Dez'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Quantidade (qt)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Presentes',
                data: [29, 27, 30, 22, 24, 27, 13, 24, 21, 29, 19,15]

            }, {
                name: 'Faltas',
                data: [18, 17, 19, 19, 20, 18, 20, 21, 19, 18, 20, 19]

            }, {
                name: 'Falta Justificada',
                data: [8, 3, 9, 4, 7, 8, 9, 9, 5, 6, 9, 5]

            }/*, {
                name: 'Berlin',
                data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

            }*/]
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>