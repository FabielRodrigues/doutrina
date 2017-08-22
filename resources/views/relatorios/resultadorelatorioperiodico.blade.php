@extends('layouts.admin_template')

@section('content')
    <?php
    $presenca              = 0;
    $falta                 = 0;
    $faltaJustificada      = 0;
    $totalpresenca              = 0;
    $totalfalta                 = 0;
    $totalfaltaJustificada      = 0;
    $td                         = 0;

    //Total frequencia
    foreach ($grafico as $gr) :

        if ($gr->presente == 1) {
            $totalpresenca++;
        }
        if ($gr->falta == 1) {
            $totalfalta++;
        }
        if ($gr->falta_justificada == 1) {
            $totalfaltaJustificada++;
        }
    endforeach;

    //Total de dias letivos
    foreach ($totaldias as $t) :   $td++;  endforeach;
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- <div class="box-header with-border">
                       <!--<h3 class="box-title">Bordered Table</h3>
                     </div>--><!-- /.box-header -->
                    <div class="box-body">
                        <legend>
                            <h5>
                                <strong>RESULTADO</strong> -
                                <a href="#" onclick="window.print()">IMPRIMIR <span class="glyphicon glyphicon-print"></span></a>
                            </h5>
                        </legend>

                        <div class="container" id="section-to-print">

                            <div id="columnchart_values" class="row" align="center"></div>
                            <table class="table table-responsive table-striped table-bordered">
                                <thead>
                                <tr>
                                    <td>Nome</td>
                                    <td>Presente</td>
                                    <td>Falta</td>
                                    <td>Justificada</td>
                                    <td>Resultado</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($frequencias as $frequencia)

                                    <tr>
                                        <td>
                                            {{ $frequencia->users->name }}
                                        </td>
                                        <td align="center">
                                           {{$frequencia->total_presente}}
                                        </td>
                                        <td align="center">
                                            {{$frequencia->total_falta}}
                                        </td>
                                        <td class="center">
                                            {{ $frequencia->total_faltas_justificadas }}
                                        </td>
                                            <?php
                                                $metadedias = $td / 2;
                                                if ($frequencia->total_falta <= $metadedias) {
                                                    echo "<td class='bg-green'>Aprovado</td>";
                                                } else {
                                                    echo "<td class='bg-red'>Reprovado</td>";
                                                }

                                            ?>
                                @endforeach

                                </tbody>
                            </table>

                        </div>

                    </div>

                </div><!-- .box-body -->

            </div><!-- .col-md-12 -->

        </div><!-- .row -->

    </section><!-- .content -->
@endsection

@section('view.scripts')
    <!-- Gráficos do google -->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Element", "Quantidade", { role: "style" } ],
                ["Presenças",  <?php echo $totalpresenca; ?>, "#336699"],
                ["Faltas", <?php echo $totalfalta; ?>, "red"],
                ["Faltas Justificadas", <?php echo $totalfaltaJustificada; ?>, "yellow"],
            ]);


            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "Relatório de frequência periódica da turma <?php echo $nometurma; ?> entre às datas <?php echo $novadatainicial; ?> e <?php  echo $novadatafinal; ?>, no total de <?php echo $td; ?> dias letivos.",
                width: 1000,
                height: 600,
                bar: {groupWidth: "80%"},
                legend: { position: "none" }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
        }
    </script>
@endsection